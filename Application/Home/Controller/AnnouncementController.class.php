<?php
namespace Home\Controller;
use Think\Controller;
class AnnouncementController extends Controller {
    public function index()
    {
        $article = M('article');
        $where['akid'] = 0;
        $arr = $article->where($where)->order('date desc')->select(); 
        $this->assign("article",$arr);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function announcement()
    {
        $article = M('article');
        $where['aid'] = $_GET['aid'];
        $arr = $article->where($where)->select(); 
        $this->assign("article",$arr[0]);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }
} 