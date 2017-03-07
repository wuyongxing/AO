<?php
namespace Admin\Controller;
use Think\Controller;
class AnnouncementController extends Controller {
    public function index()
    {
        $article = M('article');
        $where['akid'] = 0;
        $arr = $article->where($where)->order('date desc')->select(); 
        $this->assign("article",$arr);
        $this->display();
    }

    public function announcement()
    {
        $article = M('article');
        $where['aid'] = $_GET['aid'];
        $arr = $article->where($where)->select(); 
        $this->assign("article",$arr[0]);
        $this->display();
    }

    public function addAnnouncement()
    {
        if($_GET['aid'])
        {
            $where['aid'] = $_GET['aid'];
            $article = M('article');
            $arr = $article->where($where)->select();
            $this->assign('article',$arr[0]);
        }
        $this->display();
    }

    public function doAddAnnouncement()
    {
        $where['aid'] = $_POST['aid'];
        $where['title'] = $_POST['title'];
        $where['content'] = $_POST['content'];
        //$where['date'] = time();
        $where['uid'] = $_SESSION['uid'];
        $where['akid'] = $_POST['akid'];
        $article = M('article');
        if($where['aid'])
        {
            if($article->save($where))
                echo 1;
            else
                echo 0;
        }
        else
        {
            if($article->add($where))
                echo 1;
            else
                echo 0;
        }
    }

    public function deleteAnnouncement()
    {
        $article = M('article');
        $where['aid'] = $_POST['aid'];
        if($article->where($where)->delete())
            echo 1;
        else
            echo 0;
    }
}