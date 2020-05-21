<?php
namespace app\admin\model;
use think\Model;
class Team extends Model
{
    public function member()
    {
    	return $this->hasMany('Member');
    }
    public function user()
    {
    	return $this->hasOne('User','user_id','user_id');
    }
    public function approval()
    {
      return $this->hasOne('Approval')->where('type',1);
    }
    public function mapproval()
    {
        return $this->hasOne('Approval')->where('type',2);
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
   public function tall()
   {
       return $this->select();
   }
   public function tschool($school)
   {
       return $this->where('school',$school)->select();
   }
}
?>