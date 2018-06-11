<?php
namespace app\admin\validate;
use think\Validate;

class Nav extends Validate
{	
	//自定义验证规则
    protected $rule = [
        'nav_name'  =>  'require|max:10',
        'fatherid'  =>  'require',
    ];

    //自定义验证提示
    protected $message = [
	    'nav_name.require' => '导航栏目名称必填',
        'fatherid.max'     => '导航栏目名称最多不能超过10个字符',
	    'fatherid.require'     => '所属一级导航栏目必选',
	];

	//自定义验证场景，添加的时候验证哪个字段，修改的时候验证哪个字段
	//还可以指定验证某个字段的某些规则
	protected $scene = [
        'addF'  =>  ['nav_name','fatherid'],
        'editF'  =>  ['nav_name','fatherid'],
    ];
    

}