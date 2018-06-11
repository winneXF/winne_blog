<?php
namespace app\index\controller;

use think\Controller;

class BookShare extends Controller
{
    public function index()
    {
        //获取每篇文章的具体内容
        $book_id = input('book_id');
        $book_detail = db('book_recommend')->find($book_id); 


        //右侧特别推荐书籍
        $recommend_books = db('book_recommend')->where('id','neq',$book_id)->where(array('state'=>1))->limit(8)->select();




        $this->assign(array(
            'book_detail'=>$book_detail,
            'recommend_books'=>$recommend_books,
            ));

    	return $this->fetch('bookShare');

    }


}
