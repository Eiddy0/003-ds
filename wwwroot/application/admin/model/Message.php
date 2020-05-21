<?php
namespace app\admin\model;
use think\Model;
class Message extends Model
{
    public function admin()
   {
   	 return $this->belongsTo('Admin');
   }
   public function tall()
   {
   	 return $this->where('type',1)->where('time',"<>",0)->order('reply')->order('time desc')->select();
   }
}
?>