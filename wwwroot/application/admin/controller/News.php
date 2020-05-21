<?php
namespace app\admin\controller;
use app\admin\model\View1News as NewsModel;
use app\admin\model\Cate as CateModel;
use app\admin\controller\Common;
class News extends Common
{

    public function lst()
    {   
        // $newsdata=db('View1News')->order('id')->paginate(10);
        // $newsrender=$newsdata->render();
        // $admin=new NewsModel();
        // $adminres=$admin->getnews();
        // $newsdata=$adminres->toArray();
        // $newsrender=$adminres->render();
       //dump($newsdata);die;
        $newsdata=db('article')->field('a.*,b.catename')->alias('a')->join('hz_cate b','a.cateid=b.id')->paginate(10);
        // $newsdata=db('article')->paginate(10);  
        $newslist=$newsdata->render(); 
        // dump($newsdata);die;    
        $this->assign('newsdata',$newsdata);
        $this->assign('newslist',$newslist);
        return view();
	}

	public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
            // dump($data);die;
            $data['time']=strtotime(date("Y-m-d H:i:s"));
            // dump($data['time']);die;
            $validate = \think\Loader::validate('News');
            if(!$validate->scene('add')->check($data)){
               $this->error($validate->getError());
            }
            if(db('article')->insert($data)){
                $this->success('添加新闻公告成功！',url('lst'));
            }else{
                $this->error('添加新闻公告失败！');
            }

            return;
        }
        $cate=new CateModel();
        $cateres=$cate->catetree();
        $this->assign('cateres',$cateres);
        return view();
	}

	public function edit()
    {   
        $id=input("id");

        if(request()->isPost()){
            $data=input('post.');
            $data['id']=$id;
            $data['time']=strtotime(date("Y-m-d H:i:s"));
            // dump($data);die;
            $validate = \think\Loader::validate('News');
            if(!$validate->scene('edit')->check($data)){
               $this->error($validate->getError());
            }
            // $news=new NewsModel();
            // $savenum=$news->updatanews($data);
            $savenum=db('article')->where('id',$id)->update($data);
            if($savenum !== false  ){
                $this->success('添加新闻公告成功！',url('lst'));
            }else{
                $this->error('添加新闻公告失败！');
            }
            return;
        }
        
        $olddata=db("article")->where('id',$id)->find();
        if(!$olddata){
            $this->error('该文章不存在');
        }
        $this->assign(array(
               'olddata' => $olddata,
          ));
        $cate=new CateModel();
        $cateres=$cate->catetree();
        $arts=db('article')->where(array('id'=>input('id')))->find();
        $this->assign(array(
            'cateres'=>$cateres,
            'arts'=>$arts,
            ));
        return view();
	}

    public function del($id){
        // $news=new NewsModel();
        // $delnum=$news->delnews($id);
        $delnum=db('article')->where('id',$id)->delete();
        if($delnum == true){
            $this->success('删除新闻公告成功！',url('lst'));
        }else{
            $this->error('删除新闻公告失败！');
        }
    }


}
