<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Common;
class Admin extends Common
{

    public function lst()
    {   
        $auth=new Auth();
        $admin=new AdminModel();
        $adminres=$admin->getadmin();
        foreach ($adminres as $k => $v) {
            $_groupTitle=$auth->getGroups($v['id']);
            $groupTitle=$_groupTitle[0]['title'];
            $v['groupTitle']=$groupTitle;
            if($v['id']==1)
            {
                unset($adminres[$k]);
            }
            unset($v['password']);
        }
        $this->assign('adminres',$adminres);
        return view();
	}

	public function add()
    {
        $school=db('school')->select();
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $admin=new AdminModel();
            if($admin->addadmin($data)){
                $ad=db('admin')->where('name',$data['name'])->find();
                Model('Message')->save(['text'=>0,'admin_id'=>$ad['id'],'time'=>0,'school'=>$ad['school'],'type'=>1,'reply'=>"0"]);
                $this->success('添加管理员成功！',url('lst'));
            }else{
                $this->error('添加管理员失败！');
            }
            return;
        }
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes); $this->assign('school',$school);
        return view();
	}

	public function edit($id)
    {
        $school=db('school')->select();
        $admins=db('admin')->find($id);

        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $admin=new AdminModel();
            $savenum=$admin->saveadmin($data,$admins);
            if($savenum == '2'){
                $this->error('管理员用户名不得为空！');
            }
            if($savenum !== false){
                $this->success('修改成功！');
            }else{
                $this->error('修改失败！');
            }
            return;
        }
        
        if(!$admins){
            $this->error('该管理员不存在');
        }
        $authGroupAccess=db('auth_group_access')->where(array('uid'=>$id))->find();
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        $this->assign('admin',$admins);
        $this->assign('groupId',$authGroupAccess['group_id']);
        $this->assign('sch',$school);
        return view();
	}

    public function del($id){
        $admin=new AdminModel();
        
        $delnum=$admin->deladmin($id);
        if($delnum == '1'){
            $this->success('删除管理员成功！',url('lst'));
        }else{
            $this->error('删除管理员失败！');
        }
    }

    public function logout(){
        session(null); 
        $this->success('退出系统成功！',url('login/index'));
    }













}
