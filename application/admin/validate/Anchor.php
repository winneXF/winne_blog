<?php
namespace app\admin\validate;
use think\Validate;

class Anchor extends Validate
{   
    //自定义验证规则
    protected $rule = [
        'article_id'  =>  'require',
        'id_name'  =>  'require',
        'anchor_name'  =>  'require',
    ];

    //自定义验证提示
    protected $message = [
        'article_id.require' => '锚点所属文章必选',
        'id_name.require' => '文章锚点id名(集合)',
        'anchor_name.require' => '文章锚点标题(集合)',
    ];

    //自定义验证场景，添加的时候验证哪个字段，修改的时候验证哪个字段
    //还可以指定验证某个字段的某些规则
    protected $scene = [
        'addF'  =>  ['article_id','id_name','anchor_name'],
        'editF'  =>  ['article_id','id_name','anchor_name'],
    ];
    

}