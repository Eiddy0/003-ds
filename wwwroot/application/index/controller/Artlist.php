<?php
namespace app\index\controller;
use app\index\model\Article;
class Artlist extends Common
{
	public function index()
	{
		$cateid=input('cateid');
		$new=db('article')->where('cateid',$cateid)->paginate(5);
		$artlist=$new->render();
		// dump($new);die;
		$this->assign('new',$new);
		$this->assign('artlist',$artlist);
		return view('artlist');
	}
}