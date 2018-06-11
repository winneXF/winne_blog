<?php
namespace app\admin\validate;
use think\Validate;

class Movie extends Validate
{   
    //自定义验证规则
    protected $rule = [
        'title'  =>  'require',
    ];

    //自定义验证提示
    protected $message = [
        'title.require' => '电影名称必填',
    ];

    //自定义验证场景，添加的时候验证哪个字段，修改的时候验证哪个字段
    //还可以指定验证某个字段的某些规则
    protected $scene = [
        'addF'  =>  ['title'],
        'editF'  =>  ['title'],
    ];
    

}