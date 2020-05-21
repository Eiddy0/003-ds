<?php
namespace app\admin\model;
use think\Model;
class Member extends Model
{
   public function team()
   {
   	return  $this->belongsTo('Team');
   }
}
?>