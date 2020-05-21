<?php
namespace app\admin\model;
use think\Model;
class Material extends Model
{
    public function team()
    {
    	return $this->belongsTo('Team');
    }
}
?>