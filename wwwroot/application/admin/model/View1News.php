<?php
namespace app\admin\model;
use think\Model;
class View1News extends Model
{


   public function getnews(){
    return $this::paginate(10);
   }

   public function updatanews($data){
        if(!$data['title']){
            return false;//文章名为空 
        }
        return $this->isUpdate(true)->save($data,['id' => $data['id']]);
    
    }

    public function delnews($id){
        if($this::where('id',$id)->delete()){
            return 1;
        }else{
            return 2;
        }
    }
}
