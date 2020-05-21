<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Index extends Common
{
    public function index()
    {
      $t=db('conf')->where('enname','BMdeadline')->find();
      //dump(strtotime($t['value']));die;
      $a=db('admin')->where('id<>1 and id<>52')->update(['time'=>strtotime($t['value'])]);
      //dump($a);die;
    	$ad=Model('Admin')->get(session("id"));
    	$news=db('news')->where('type',"通知")->limit(4)->order('time desc')->select();
    	$ad->access;
    	$tnum=0;
    	if($ad['access']['group_id']==1)
        {
             $ad['message']=Model('Message')->tall();
               foreach( $ad['message'] as $m)
               {
                   if($m['reply']=="0")
                   $tnum++;
               }
        }
        else
        {
          $ad->message;
        $ad->tapproval;
        foreach($ad['tapproval'] as $k=>$a)
        {
             if($a['status']==0)
            $tnum++;
        }
      }
    	$mnum=db('approval')->where('status',0)->where('type',2)->count();
    	//dump($ad['message']);die;
      if(!isset($ad['message'][0]))
         $mes['reply']="0";
       else
         $mes=$ad['message'][0]->toArray();
    	$this->assign(array('news'=>$news,'tnum'=>$tnum,'mnum'=>$mnum,'mes'=>$mes));
        return view();
    }
}
