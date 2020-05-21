<?php
namespace app\index\controller;

class Aboutus extends Common
{
	public function index()
	{
		$cateid=input('cateid');
		$about=db('article')->where('cateid',$cateid)->find();
		$this->assign('about',$about);
		return view('aboutus');
	}
}