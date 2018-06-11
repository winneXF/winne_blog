<?php
namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{	
	//自定义验证规则
    protected $rule = [
        'title'  =>  'require',
        'title_anchor_id' => 'require',
        'navid' =>  'require',
        'belong_nav' =>  'require',
    ];

    //自定义验证提示
    protected $message = [
        'title.require' => '文章标题必填',
	    'title_anchor_id.require' => '文章标题锚点id必填',
        'navid.require'   => '文章所属导航栏目必填',
	    'belong_nav.require'   => '文章所属导航栏目必填',
	];

	//自定义验证场景，添加的时候验证哪个字段，修改的时候验证哪个字段
	//还可以指定验证某个字段的某些规则
	protected $scene = [
        'addF'  =>  ['title','navid','title_anchor_id','belong_nav'],
        'editF'  =>  ['title','navid','title_anchor_id','belong_nav'],
    ];
    

}