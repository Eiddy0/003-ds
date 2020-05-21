<?php
namespace app\index\controller;
use app\index\model\Article;
use app\index\controller\Common;
class Search extends Common
{
	public function index()
	{
		$keywords=input('keywords');
		$search=db('article')->where('title','like','%'.$keywords.'%')->paginate(5,false,['query'=>request()->param()]);
		$searchlist=$search->render();
		$this->assign('searchlist',$searchlist);
		$this->assign('search',$search);
		return view('search');
	}
}