<?php
namespace app\index\controller;

class Article extends Common
{
	public function index()
	{
		$artid=input('artid');
		$article=db('article')->where('id',$artid)->find();
		$this->assign('article',$article);
		return view('article');
	}
}