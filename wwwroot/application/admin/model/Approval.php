<?php
namespace app\admin\model;
use think\Model;
class Approval extends Model
{
    public function member()
    {
    	return $this->hasMany('Member');
    }
    public function team()
    {
    	return $this->hasOne('Team','team_id','team_id');
    }
    public function record()
    {
    	return $this->hasMany('Record');
    }
    public function material()
    {
    	return $this->hasMany('Material');
    }
    public function admin()
    {
        return $this->belongsTo('Admin','school','school');
    }
}
?>