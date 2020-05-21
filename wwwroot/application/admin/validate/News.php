<?php
namespace app\admin\validate;
use think\Validate;
class News extends Validate
{

    protected $rule=[
        'title'=>'unique:News|require|max:200',//News 指表名
        'content'=>'require',
        'rec'=>'require',
        'click'=>'require',
    ];


    protected $message=[
        'title.require'=>'文章标题不得为空！',
        'title.unique'=>'文章标题不得重复！',
        'author.require'=>'文章作者不得为空！',
        'content.require'=>'文章内容不得为空！',
        'rec.require'=>'文章推荐类型不得为空！',
        'click.require'=>'文章类型不得为空！',
    ];

    protected $scene=[
        'add'=>['title','author','content','rec','click'],
        'edit'=>['author','content','rec','click'],
    ];



}
