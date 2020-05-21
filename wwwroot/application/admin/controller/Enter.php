<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Member;
use app\admin\model\Material;
use app\admin\model\View1Material as MaterialModel;
use app\index\model\Record as recordModel;
class Enter extends Common
{

   public function teamlist($sch='0'){
  
    $school=db('school')->select();
    
    $ad=Model('Admin')->get(session('id'));
    $ad->access;
    if($ad['access']['group_id']==1)
    {
   
    if(request()->ispost()) 
      {
        $sch=input('school');
       // dump($sch);die;
        //Model('Message')->get(['school'=>$sch])->save(['reply'=>"您的通知已被确认"]);
        $ad['team']=Model('Team')->tschool($sch);
        if($sch=="0")
           {  $ad['team']=Model('Team')->tall();}
      }
      else
     { 
      if($sch!="0")
     {
          $ad['team']=Model('Team')->tschool($sch);
           $this->assign('app',1);
     }
     else
       $ad['team']=Model('Team')->tall();}

    }
    else
    $ad->team;

  
   
    foreach($ad['team'] as $t)
    {
     
       $t->member;
       $t->approval;
      
       foreach($t['member'] as $k=>$m)
       {
           if($m['role']==1)
            $t['teacher']=$m['name'];
          if($m['role']==2)
            $t['head']=$m['name'];
       }
       isset($t['teacher'])?"":$t['teacher']="";
        isset($t['head'])?"":$t['head']="";
       unset($t['member']);
    }
     $ad=$ad->toArray();
     $num=0;
     //dump($ad);die;
      foreach($ad['team'] as $key=>$t)
      {
          if($t['approval']['status']!=1||$t['approval']==null)
            unset($ad['team'][$key]);
            else $num++;
      }
     
     //dump($ad);die;
    $this->assign(array('team'=>$ad['team'],'num'=>$num,'school'=>$school,'sch'=>$sch));
    return view();
   }
   public function edit($id=''){
       $t=Model('Team');
      $team=$t->get(['team_id'=>$id]);
      $team->member;
      foreach($team['member'] as $m)
      {
          if($m['role']==1)
            $team['teacher']=$m['name'];
        if($m['role']==2)
            $team['head']=$m['name'];
      }
     // dump($team->toArray());
  if(request()->ispost()) 
  {
    $data=input('post.');//dump($data);die;
     $t=Model('Team');
      $team=$t->get(['team_id'=>$data['team_id']]);
      $team->member;
      foreach($team['member'] as $m)
      {
        if($m['name']==$data['teacher'])
        {
          $m->save(['role'=>1]);
          $teacher=1;
        }
        else if($m['name']==$data['head'])
        {
          $m->save(['role'=>2]);
          $head=1;
        }
        else
        {
          $m->save(['role'=>0]);
        }
      }
      if(!isset($teacher))
      {
        db('member')->insert(['role'=>1,'name'=>$data['teacher'],'team_id'=>$data['team_id']]);
      }
       if(!isset($head))
      {
        db('member')->insert(['role'=>2,'name'=>$data['head'],'team_id'=>$data['team_id']]);
      }
      unset($data['teacher']);
      unset($data['head']);
      
      $team->save($data);
      $this->success('修改成功！','teamlist');
      // dump($team->toArray());die;
  }


      $this->assign('team',$team->toArray());
      return view();
   }
   public function del($id=''){
      $t=Model('Team');
      $team=$t->get(['team_id'=>$id]);
      $team->member;
      $team->record;
      $team->material;
      $team->user;
      //dump($team['user']);die;
      $team->user->delete();
      $team->approval->delete();
      $team->mapproval->delete();
      foreach($team['member'] as $m)
      {
           $m->delete();
      }
      foreach($team['record'] as $m)
      {
           $m->delete();
      }
      foreach($team['material'] as $m)
      {
           $m->delete();
      }
     if( $team->delete())
        $this->success('删除成功');
     else
        $this->error('删除失败');
     
   }
   public function add(){
    if(request()->ispost()) 
    {
        $data=input('post.');
        $u=Model('User');
        $u->save(['name'=>$data['user_name'],'password'=>md5($data['user_password'])]);
        unset($data['user_name']);
        unset($data['user_password']);
        $data['user_id']=$u['user_id'];
        $t=Model('Team');
        $t->save($data);
        $m=Model('Member');
        $m->save(['role'=>1,'team_id'=>$t['team_id']]);
        $m=new Member();
       //dump($m);die;
         $m->save(['role'=>2,'team_id'=>$t['team_id']]);
         $material=new Material();
         $material->save(['title'=>"研究综述",'team_id'=>$t['team_id']]);
          $material=new Material();
         $material->save(['title'=>"竞赛设计及详细技术路线",'team_id'=>$t['team_id']]);
          $material=new Material();
         $material->save(['title'=>"论文",'team_id'=>$t['team_id']]);
       // dump($data);die;
         $this->success('添加成功！');
    }
     return view();
    
   }
   public function member($id='')
   {
    
     $t=Model('Team');
     $team=$t->get(['team_id'=>$id]);
     $team->member;
     //dump($team->toArray());die;
      $time=db('conf')->where('enname',"BMdeadline")->find();
     $this->assign('team',$team->toArray());
      $this->assign('time',strtotime($time['value']));
    return view();
   }
   public function medit($member_id=''){
     $m=Model('Member');
     $member=$m->get($member_id);
     $member->team;
      if(request()->ispost()) 
      {
        $data=input('post.');
        //dump($data);dump($member->toArray());die;
       if( $member->save($data))
        $this->success('修改成功',url('member',array('id'=>$member['team']['team_id'])));
      else
         $this->error('修改失败',url('member',array('id'=>$member['team']['team_id'])));
       // dump($data);die;
      }
     $this->assign('mem',$member->toArray());
    return view();
   }
   public function mdel($member_id='')
   {
        if(Member::destroy($member_id))
          $this->success('删除成功');
        else
          $this->error('删除失败');
   }
   public function materialedit()
     {
          $material_id=input("id");
          $team=MaterialModel::get(['material_id' => $material_id]);

          if(request()->isPost()){
            $data=input('post.');

            $data['material_id']=$material_id;
            $data['time']=time();
            session('material_id',$material_id);
            if(Model('View1Material')->get(['material_id'=>$material_id])->save($data)){
               session('material_id',null);
                $this->success('上传文件成功',url('materialcheck',array('id'=>$team['team_id'])));
            }else{
               session('material_id',null);
                $this->error('上传文件失败！');
            }
            return;
        }
         $cailiao = MaterialModel::get(['material_id' => $material_id]);
          $data=$cailiao->toArray();
          $this->assign(array(
               'data' => $data,
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
       //dump($data);die;
      foreach ($data['material'] as $key => $value) {
        $data['material'][$key]['time']=date("Y-m-d",$data['material'][$key]['time']);
      }
      foreach ($data['record'] as $key => $value) {
        $data['record'][$key]['time']=date("Y-m-d",$data['record'][$key]['time']);
      }
      $deadline=db('conf')->where('enname','Deadline')->find();
      //dump($deadline);die;
      $this->assign(array(
         'data' => $data,
         'deadline' => $deadline,
         'tid'=>$id,
       ));
      return view();
    }
      public function recordadd($id="") {
        if(request()->isPost()) {
      //    dump($_FILES['upload']['name']);die;
         // $_FILES['upload']['name']=input('upload');
          $data['time']=time();
          $data['team_id']=$id;
          $t=db('team')->where('team_id',$id)->find();
          session('user_id',$t['user_id']);
         // $data['presenter']=$userName;
          $record=new recordModel();
          $save=$record->save($data);
          if($save){
             session('user_id',null);
              $this->success('上传文件成功',url('materialcheck',array('id'=>$id)));
          }else{
            session('user_id',null);
              $this->error('上传文件失败！');
          }
        }
        return view();
     }
     public function export($sch='0')
     {
        $ad=Model('Admin')->get(session('id'));
        $ad->access;

        if($ad['access']['group_id']==1)
        {
      
          if($sch!="0")
         {
              $ad['team']=Model('Team')->tschool($sch);

               $this->assign('app',1);
         }
         else
           $ad['team']=Model('Team')->tall();
        
        }
        else
        $ad->team;

      
       
        foreach($ad['team'] as $t)
        {
         
           $t->member;
           $t->approval;

           foreach($t['member'] as $k=>$m)
           {
               if($m['role']==1)
                $t['teacher']=$m['name'];
              if($m['role']==2)
                $t['head']=$m['name'];
           }
           unset($t['member']);
        }

         $ad=$ad->toArray();
         $num=0;
          foreach($ad['team'] as $key=>$t)
          {
              if($t['approval']['status']!=1||$t['approval']==null)
                unset($ad['team'][$key]);
                else $num++;
          }
          
          $data = array();
          foreach ($ad['team'] as $a => $value) {
            $data[$a]['A'] = $value['name'];
            $data[$a]['B'] = $value['head'];
            $data[$a]['C'] = $value['teacher'];
            $data[$a]['D'] = $value['phone'];
            $data[$a]['E'] = $value['project'];
            $data[$a]['F'] = $value['school'];
          }
          // dump($data);die;
          $filename = "科技创新大赛队伍表";
          $this->getExcel($filename, $data);
     }
     private function getExcel($filename, $data)
     {
          //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
          require_once(ROOT_PATH . 'vendor/PHPExcel.php');//引入PHP EXCEL类
          require_once(ROOT_PATH . 'Vendor/PHPExcel/IOFactory.php');//引入PHP EXCEL类
          require_once(ROOT_PATH . 'Vendor/PHPExcel/Writer/Excel5.php');//引入PHP EXCEL类
          require_once(ROOT_PATH . 'Vendor/PHPExcel/Writer/PDF.php');//引入PHP EXCEL PDF类
          // require_once(ROOT_PATH . 'Vendor/PHPExcel/Writer/Excel2007.php');//引入PHP EXCEL类
          require_once(ROOT_PATH . 'Vendor/PHPExcel/Reader/Excel5.php');//引入PHP EXCEL类
          // require_once(ROOT_PATH . 'Vendor/PHPExcel/Reader/Excel2007.php');//引入PHP EXCEL类
          require_once(ROOT_PATH . 'Vendor/PHPExcel/style.php');//引入PHP EXCEL类

          
          

          //$date = date("Y_m_d", time());
          $filename .= ".xls";

          //创建PHPExcel对象，注意，不能少了\
          $objPHPExcel = new \PHPExcel();


          $column = 3;
          $objActSheet = $objPHPExcel->getActiveSheet();
          

          $objActSheet->mergeCells('A1:G1');      // A1:G1合并
          $objActSheet->setCellValue('A1', '科技创新大赛参赛队伍汇总');

          // $objActSheet->setCellValue('A2', '序号');
          $objActSheet->setCellValue('A2', '团队名称');
          $objActSheet->setCellValue('B2', '负责人');
          $objActSheet->setCellValue('C2', '指导老师');
          $objActSheet->setCellValue('D2', '联系方式');
          $objActSheet->setCellValue('E2', '项目名称');
          $objActSheet->setCellValue('F2', '学校');
          // $objActSheet->setCellValue('H2', '入党时间');
          // $objActSheet->setCellValue('I2', '学历');
          // $objActSheet->setCellValue('J2', '学位');
          // $objActSheet->setCellValue('K2', '职称');
          // $objActSheet->setCellValue('L2', 'ZC');
          // $objActSheet->setCellValue('M2', '专业或专长');
          // $objActSheet->setCellValue('N2', '任现职时间');
          // $objActSheet->setCellValue('O2', '任现级时间');
          // $objActSheet->setCellValue('P2', '备注');
          // $objActSheet->setCellValue('Q2', '职级');

          // $objActSheet->setCellValue('R2', '工号');
          // $objActSheet->setCellValue('S2', '出生地');
          // $objActSheet->setCellValue('T2', '政治面貌');
          // $objActSheet->setCellValue('U2', '健康状况');
          // $objActSheet->setCellValue('V2', '奖惩情况');
          // $objActSheet->setCellValue('W2', '考核结果');
          
          





          // $objPHPExcel->getActiveSheet()->getStyle('A2:E8')->getAlignment()->setWrapText(true);

//设置宽width
// Set column widths
          
          $objActSheet->getColumnDimension('A')->setWidth(25);
          $objActSheet->getColumnDimension('B')->setWidth(10);
          $objActSheet->getColumnDimension('C')->setWidth(10);
          $objActSheet->getColumnDimension('D')->setWidth(15);
          $objActSheet->getColumnDimension('E')->setWidth(55);
          $objActSheet->getColumnDimension('F')->setWidth(30);

// 设置单元格高度
// 所有单元格默认高度
          $objActSheet->getDefaultRowDimension()->setRowHeight(30);
// 第一行的默认高度
          $objActSheet->getRowDimension('2')->setRowHeight(36);
          $objActSheet->getRowDimension('1')->setRowHeight(40);

          //print_r($data);exit;
          foreach ($data as $key => $rows) { //行写入
               // $span = ord("A");
               // $j = chr($span);
               // $xuhao=$key+1;
               // $objActSheet->setCellValue($j . $column, $xuhao);
               $span = ord("A");
               foreach ($rows as $keyName => $value) {// 列写入
                    $j = chr($span);
                    $objActSheet->setCellValue($j . $column, $value);
                    $span++;
               }
               $column++;
          }

          // $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('黑体');
          // $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
          // $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setUnderline(\PHPExcel_Style_Font::UNDERLINE_SINGLE);
          // $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

         

          $styleThinBlackBorderOutline = array(
               'borders' => array(
                    'allborders' => array(
                         'style' => \PHPExcel_Style_Border::BORDER_THIN,   //设置border样式
                         //'style' => PHPExcel_Style_Border::BORDER_THICK,  另一种样式
                         'color' => array('argb' => 'FF000000'),          //设置border颜色
                    ),
               ),
          );

          // $objPHPExcel->getActiveSheet()->getStyle('A2:E3')->applyFromArray($styleThinBlackBorderOutline);
          // $objPHPExcel->getActiveSheet()->getStyle('A5:E6')->applyFromArray($styleThinBlackBorderOutline);
          // $objPHPExcel->getActiveSheet()->getStyle('A8:E9')->applyFromArray($styleThinBlackBorderOutline);
          // $objPHPExcel->getActiveSheet()->getStyle('A11:E14')->applyFromArray($styleThinBlackBorderOutline);

          $filename = iconv("utf-8", "gb2312", $filename);

          //重命名表
          //$objPHPExcel->getActiveSheet()->setTitle('test');
          //设置活动单指数到第一个表,所以Excel打开这是第一个表
          $objPHPExcel->setActiveSheetIndex(0);
          ob_end_clean();//清除缓冲区,避免乱码



            //EXCEL
       header('Content-Type: application/vnd.ms-excel');
       header("Content-Disposition: attachment;filename=\"$filename\"");
       header('Cache-Control: max-age=0');

          $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载


          //END


          //PDF
          // header('Content-Type: application/PDF');
          // header("Content-Disposition: attachment;filename=\"$filename\"");
          // header('Cache-Control: max-age=0');

          // $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
          // $objWriter->save('php://output'); //文件通过浏览器下载.

          // header('Content-Type: application/pdf');
          // header('Content-Disposition: attachment;filename="01simple.pdf"');
          // header('Cache-Control: max-age=0');
          // $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
          // $objWriter->save('php://output');



        //END


     }
}
