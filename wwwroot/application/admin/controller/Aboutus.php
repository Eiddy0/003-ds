<?php
namespace app\admin\controller;
use app\admin\model\Aboutus as AboutusModel;
use app\admin\controller\Common;
class Aboutus extends Common
{
	public function lst()
	{
		$article = new AboutusModel();
		$articleall = $article->select();
		//dump($articleall);
		$this->assign(array(
			'article' => $articleall
				));
		return view();
	}

	public function add()
	{
		if(request()->ispost())
		{
			$data = input('post.');
			$data['time'] = date("Y-m-d h:i:s");
			//dump($data);die;
			if(AboutusModel::create($data))
				$this->success('添加文章成功！',url('lst'));
			else
				$this->error('添加文章失败！');
		}
		return view();
	}

	public function edit()
	{
		$id = input('id');
		//dump($id);die;
		$article = AboutusModel::get($id);
		//dump($article->toArray());die;
		if(request()->ispost())
		{
			$data = input('post.');
			$data['time']=date("Y-m-d h:i:s");
			//dump($data);die;
			if(AboutusModel::update($data,['id'=>$id]))
				$this->success('修改文章成功！',url('lst'));
			else
				$this->error('修改文章失败！');

		}
		$this->assign(array(
			'art' => $article
			));
		return view();
	}

	public function delete()
	{
		$id = input('id');
		if(AboutusModel::destroy($id))
			$this->success('删除文章成功！',url('lst'));
		else
			$this->error('删除文章失败！');
	}
}

?>