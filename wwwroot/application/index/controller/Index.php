<?php
namespace app\index\controller;

class Index extends Common
{
	public function index()
	{
		$news=db('article')->where('click',1)->where('rec','1')->select();
		$notices=db('article')->where('click',0)->where('rec','1')->select();
		// dump($news);die;
		$this->assign('news',$news);
		$this->assign('notices',$notices);
		return view();
	}
}