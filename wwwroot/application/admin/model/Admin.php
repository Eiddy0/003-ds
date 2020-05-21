<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model
{

   public function addadmin($data){
    if(empty($data) || !is_array($data)){
        return false;
    }
    if($data['password']){
        $data['password']=md5($data['password']);
    }
    $time=db('conf')->where('enname',"BMdeadline")->find();
    $adminData=array();
    $adminData['name']=$data['name'];
    $adminData['password']=$data['password'];
     $adminData['school']=$data['school'];
$adminData['time']=strtotime($time['value']);
    if($this->save($adminData)){
        $groupAccess['uid']=$this->id;
        $groupAccess['group_id']=$data['group_id'];
        db('auth_group_access')->insert($groupAccess);
        return true;
    }else{
        return false;
    }

   }

   public function getadmin(){
    return $this::paginate(20,false,[
        'type'=>'boot',
        'var_page' => 'page',
        ]);
   }

   public function saveadmin($data,$admins){
        if(!$data['name']){
            return 2;//管理员用户名为空
        }
        if(!$data['password']){
            $data['password']=$admins['password'];
        }else{
            $data['password']=md5($data['password']);
        }
        if(isset($data['group_id']))
        db('auth_group_access')->where(array('uid'=>$data['id']))->update(['group_id'=>$data['group_id']]);
        if(!isset($data['school']))
        {
            $s=db('admin')->where('id',$data['id'])->find();
            $data['school']=$s['school'];
        }
        if(!isset($data['time']))
        {
                $data['time']="1970-01-01";
        }
        return $this::update(['name'=>$data['name'],'password'=>$data['password'],'time'=>strtotime($data['time']),'school'=>$data['school']],['id'=>$data['id']]);
    
    }

    public function deladmin($id){
        if($this::destroy($id)){
            return 1;
        }else{
            return 2;
        }
    }

    public function login($data){
        $admin=Admin::getByName($data['name']);
        if($admin){
            if($admin['password']==md5($data['password'])){
                    for ($i = 0; $i < 9; $i++) 
              { 
                $rand[]=chr(mt_rand(48, 122)); 
              } 
               $rand=implode('',$rand);
               db('admin')->where('id',$admin['id'])->update(['rand'=>$rand]);
               db('login')->insert(['admin_id'=>$admin['id'],'time'=>Time()]);
                session('id', $admin['id']);
                session('name', $admin['name']);
                session('rand',$rand);
                return 2; //登录密码正确的情况
            }else{
                return 3; //登录密码错误
            }
        }else{
            return 1; //用户不存在的情况
        }

    }

 public function team()
    {
        return $this->hasMany('Team','school','school');
    }
     public function tapproval()
    {
        return $this->hasMany('Approval','school','school')->where('status','<>',-1)->where('type',1)->order('status');
    }
    public function mapproval()
    {
        return $this->hasMany('Approval','school','school')->where('status',0)->where('type',2);
    }
   public function access()
   {
    return $this->hasOne('AuthGroupAccess','uid','id');
   }
   public function message()
{
    return $this->hasMany('Message');
}
}
