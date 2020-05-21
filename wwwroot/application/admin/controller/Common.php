<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Common extends Controller
{
    public function _initialize(){
        if(!session('id') || !session('name')){
           $this->error('您尚未登录系统',url('login/index')); 
        }
        $rand=db('admin')->where('id',session('id'))->find();
        if(session('rand')!=$rand['rand'])
         { $this->error('您已在别处登录',url('login/index'));}
        $access=db('auth_group_access')->where('uid',session('id'))->find();
        $time=db('conf')->where('enname',"BMdeadline")->find();
        //dump(strtotime($time['value']));die;
        $auth=new Auth();
        $request=Request::instance();
        $con=$request->controller();
        $action=$request->action();
        $name=$con.'/'.$action;
        $notCheck=array('Index/index','Admin/lst','Admin/logout');
       //  if(session('id')!=1){
       //  	if(!in_array($name, $notCheck)){
       //  		if(!$auth->check($name,session('id'))){
		    	// $this->error('没有权限',url('index/index')); 
		    	// }
       //  	}
        	
       //  }

        $school = db('admin')->field('school')->where('name',session('name'))->find();
        
        $this->assign('acc',$access);
        $this->assign('t',$time['value']);
        $this->assign('sc',$school);
    }


}
