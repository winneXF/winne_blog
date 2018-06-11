<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{	
	//自定义验证规则
    protected $rule = [
        'adminname'  =>  'require|max:25',
        'password' =>  'require',
    ];

    //自定义验证提示
    protected $message = [
	    'adminname.require' => '管理员名称必填',
	    'adminname.max'     => '管理员名称最多不能超过25个字符',
	    'password.require'   => '管理员密码必填',
	];

	//自定义验证场景，添加的时候验证哪个字段，修改的时候验证哪个字段
	//还可以指定验证某个字段的某些规则
	protected $scene = [
        'addF'  =>  ['adminname'=>'require|max:25','password'],
        'editF'  =>  ['adminname'=>'require'],
    ];
    

}