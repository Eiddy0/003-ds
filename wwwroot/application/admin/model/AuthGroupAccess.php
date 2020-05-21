<?php
namespace app\admin\model;
use think\Model;
class AuthGroupAccess extends Model
{
    
 public function admin()
   {
    return $this->hasOne('Admin','id','uid');
   }
    






}
