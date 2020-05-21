<?php
namespace app\admin\model;
use think\Model;
class User extends Model
{
    public function team()
    {
    	return $this->hasOne('Team');
    }
}
?>