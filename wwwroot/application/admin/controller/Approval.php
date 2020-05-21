<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Member;
use app\admin\model\Material;
use app\admin\model\Record;
use app\admin\model\Team;
use app\admin\model\View1Material as MaterialModel;
use app\admin\model\Approval as ApprovalModel;



class Approval extends Common
{
    public function taudit()  //团队
    {
        $ad=Model('Admin')->get(session('id'));
        // dump($ad);
        // printf($ad);
        $ad->access;
        // $as=time();
        // printf($as);
        // die;
        if($ad['access']['group_id']==1)
        {
             $ad['message']=Model('Message')->tall();
              
               $n=0;
               foreach( $ad['message'] as $m)
               {

                   $m->admin;
                   if($m['reply']=="0")
                   $n++;
               }
             //dump($ad->toArray());die;
               $admin=$ad->toArray();
             $this->assign(array('app'=>$admin['message'],'num'=>$n));
             return view('message');
        }
        else
        {
        $ad->tapproval;
        $n=0;
        foreach($ad['tapproval'] as $k=>$a)
        {
             $a->team->member;
             if($a['status']==0)
            $n++;
        }
        $admin=$ad->toArray();
        
        $this->assign(array('app'=>$admin['tapproval'],'num'=>$n));
      }
        //dump($ad->toArray());die;
      return view();
    }
     public function adtaudit()
     {
          $ad=Model('Approval')->where('status',0)->where('type',1)->select();
        $n=0;
        foreach($ad as $k=>$a)
        {
             //dump($a);
             $a->team->member; 
             if($a['status']==0)
            $n++;
        }
        //$admin=$ad->toArray();
        
        $this->assign(array('app'=>$ad,'num'=>$n));
        return view();
     }

      public function maudit()   //材料
    {
      $ad=Model('Admin')->get(session('id'));
        $ad->access;
         $maudit=Model('Team')->tall();

             foreach ($maudit as $key => $value) {
              $value->mapproval;
              if($value['mapproval']['type']==2)
              {
                        $data[$key]=$value->toArray();
                             $data[$key]['time']=date("Y-m-d",$data[$key]["mapproval"]['time']); 
              } 
             }

             //dump($data);die;
             $this->assign(array(
              'data'=>$data,
              ));
               return view();
    }

    public function materialcheck($id)   //材料查看
    {
      $id=input('id');
      $team=Model('Team')->get(['team_id'=>$id]);
      $team->material;
      $team->record;
      $data=$team->toArray();
      foreach ($data['material'] as $key => $value) {
        $data['material'][$key]['time']=date("Y-m-d",$data['material'][$key]['time']);
      }

      //dump($data);die;
      foreach ($data['record'] as $key => $value) {
        $data['record'][$key]['time']=date("Y-m-d",$data['record'][$key]['time']);
      }
      $deadline=db('conf')->where('enname','Deadline')->find();
      //dump($deadline);die;
      $this->assign(array(
         'data' => $data,
         'deadline' => $deadline,
       ));
      return view();
    }

    public function upload($record_id) {
          $record=new Record();
          $record->getFile($record_id);
          return view('upload');
      }
    public function upload_material($material_id) {
          $material=new MaterialModel();
          if(!$material->getFile($material_id))
            $this->error('文件未上传');
          //dump($material);die;
          return view('upload');
      }
  
    public function mcheck($id)   //成员查看
    {
        $m=Model('Member')->get(['member_id'=>$id]);
        $m->team;
        $this->assign(array('mem'=>$m->toArray()));
        return view();
    }
    public function tcheck($id)  //团队查看
    {
        $t=Model('Team')->get(['team_id'=>$id]);
        $t->member;
        foreach($t['member'] as $k=>$m)
       {
           if($m['role']==1)
            $t['teacher']=$m['name'];
          if($m['role']==2)
            $t['head']=$m['name'];
       }
       unset($t['member']);
    
         $this->assign(array('team'=>$t->toArray()));
         return view();
    }
    public function adopt($id='')//通过
    {
        if(Model('Approval')->get(['app_id'=>$id])->save(['status'=>1]))
     { 
        $this->redirect('reply',['id'=>$id,'type'=>1]);
        }
           else
         $this->error('操作失败！'); 
    }
    public function reject($id='')//驳回
    {
       if(Model('Approval')->get(['app_id'=>$id])->save(['status'=>2]))
       {
          $this->redirect('reply',['id'=>$id,'type'=>2]);
       }
           else
         $this->error('操作失败！'); 

    }
    public function madopt($id='')//通过
    {
        if(Model('Approval')->get(['app_id'=>$id])->save(['status'=>1]))
     { 
        $this->redirect('reply',['id'=>$id,'type'=>1]);
        }
           else
         $this->error('操作失败！'); 
    }
    public function mreject($id='')//驳回
    {
       if(Model('Approval')->get(['app_id'=>$id])->save(['status'=>2]))
       {
          $this->redirect('reply',['id'=>$id,'type'=>2]);
       }
           else
         $this->error('操作失败！'); 

    }
    public function reply($id='',$type='')
    {

        if(request()->ispost()) 
        {
          $message=input('message');
          if(Model('Approval')->get(['app_id'=>$id])->save(['message'=>$message]))
          {
               $this->success('发送成功！','taudit');
          }
           else
             $this->error('操作失败！','taudit'); 
        }
        $this->assign('id',$id);
         $this->assign('type',$type);
        return view();
    }
    public function send()
    {
       $ad=Model('Admin')->get(session('id'));
       $ad->team;
       foreach($ad['team'] as $t)
       {
            $t->approval;
       }
       $ad=$ad->toArray();
       $n=0;
      foreach($ad['team'] as $k=>$t)
       {
           if($t['approval']['status']!=1)
           {
               unset($ad['team'][$k]);
           }
           else
            $n++;
       }
       $mes=Model('Message')->get(['school'=>$ad['school']]);
       if(isset($mes['mes_id']))
          $save=$mes->save(['text'=>$n,'admin_id'=>session('id'),'time'=>Time(),'school'=>$ad['school'],'type'=>1,'reply'=>"0"]);
        else
           $save=Model('Message')->save(['text'=>$n,'admin_id'=>session('id'),'time'=>Time(),'school'=>$ad['school'],'type'=>1,'reply'=>"0"]);

       if($save)
        $this->success('发送成功！');
      else
         $this->error('发送失败！');
    }
    public function mescheck($sch='')
    {
          if(db('message')->where('school',$sch)->where('reply',"0")->update(['reply'=>"您的通知已被确认"]))
          $this->redirect('enter/teamlist',['sch'=>$sch]);
        else
          $this->error('操作失败');
    }


     public function delmaterial($material_id,$team_id){

        $material=new Material;

        if($material->save(['route'  => '','status'=>'未提交'],['material_id' => $material_id])){

            $this->success('删除材料成功！',url('materialcheck',['id'=>$team_id]));
        }else{
            $this->error('删除材料失败！');
        }

    }

public function delrecord($record_id,$team_id){

        if(Record::destroy($record_id)){
            $this->success('删除记录成功！',url('materialcheck',['id'=>$team_id]));
        }else{
            $this->error('删除记录失败！');
        }

    }

}
