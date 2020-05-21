<?php
namespace app\index\controller;

class Page extends Common
{
	public function index()
	{
		$cateid=input('cateid');
		$page=db('article')->where('cateid',$cateid)->find();
		$this->assign('page',$page);
		return view('page');
	}
}