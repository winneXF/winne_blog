<?php
namespace app\admin\validate;
use think\Validate;

class Book extends Validate
{   
    //自定义验证规则
    protected $rule = [
        'bookname'  =>  'require',
        'book_type' => 'require',
        // 'navid' =>  'require',
        // 'belong_nav' =>  'require',
    ];

    //自定义验证提示
    protected $message = [
        'bookname.require' => '推荐书籍标题必填',
        'book_type.require' => '书籍所属推荐栏目必选',
        // 'navid.require'   => '文章所属导航栏目必填',
        // 'belong_nav.require'   => '文章所属导航栏目必填',
    ];

    //自定义验证场景，添加的时候验证哪个字段，修改的时候验证哪个字段
    //还可以指定验证某个字段的某些规则
    protected $scene = [
        'addF'  =>  ['bookname','book_type'],
        'editF'  =>  ['bookname','book_type'],
    ];
    

}