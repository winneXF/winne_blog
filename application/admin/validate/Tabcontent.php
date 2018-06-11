<?php
namespace app\admin\validate;
use think\Validate;

class Tabcontent extends Validate
{   
    //自定义验证规则
    protected $rule = [
        'name'  =>  'require',
    ];

    //自定义验证提示
    protected $message = [
        'name.require' => '工具名称必填',
    ];

    //自定义验证场景，添加的时候验证哪个字段，修改的时候验证哪个字段
    //还可以指定验证某个字段的某些规则
    protected $scene = [
        'addF'  =>  ['name'],
        'editF'  =>  ['name'],
    ];
    

}