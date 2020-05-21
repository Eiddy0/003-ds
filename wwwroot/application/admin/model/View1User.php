<?php
namespace app\admin\model;
use think\Model;
class View1User extends Model
{
    public function team()
    {
    	return $this->hasOne('Team');
    }
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