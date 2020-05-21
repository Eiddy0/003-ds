<?php
namespace app\admin\model;
use think\Model;
class Approval extends Model
{
    public function member()
    {
    	return $this->hasMany('Member');
    }
    public function user()
    {
    	return $this->hasOne('User');
    }
    public function record()
    {
    	return $this->hasMany('Record');
    }
    public function material()
    {
    	return $this->hasMany('Material');
    }
}
?>