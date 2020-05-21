<?php
namespace app\admin\model;
use think\Model;
class Record extends Model
{
 public function team()
    {
    	return $this->belongsTo('Team');
    }

public function getFile($record_id) {
		$record=$this::get(['record_id' => $record_id]);
		$route=$record['route'];
		if(!file_exists($route)) return 0;
 
		$file=fopen($route,"r");
		$fileinfo = pathinfo($route);
		$filename= $record['title'];//.$fileinfo['extension']  文件拓展名；
		header("Content-Type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Accept-Length: ".filesize($route));
		header("Content-Disposition: attachment; filename=$filename");
		echo fread($file,filesize($route));
		fclose($file);
	}    
}
?>