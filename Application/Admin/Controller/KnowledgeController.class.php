<?php
namespace Admin\Controller;
use Think\Controller;
class KnowledgeController extends Controller {
    public function index()
    {
    	$where['akid'] = $_GET['kind'];
    	if(!$_GET['kind'])
    		$where['akid'] = 1;
    	$this->assign('kind',$where['akid']);
    	$article = M('article');
    	if($_GET['name'])
    	{
    		$where['title'] = array('like','%'.$_GET['name'].'%');
    		$where['content'] = array('like','%'.$_GET['name'].'%');
    	}
		$arr = $article->where($where)->order('date desc,clicknum desc')->select();
    	$this->assign('article',$arr);
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function deletearticle()
    {
    	$where['aid'] = $_POST['aid'];
    	$article = M('article');
    	if($article->where($where)->delete())
    		echo 1;
    	else
    		echo 0;
    }

    public function deletecomment()
    {
    	$where['cid'] = $_POST['cid'];
    	$comment = M('comment');
    	if($comment->where($where)->delete())
    		echo 1;
    	else
    		echo 0;
    }

    public function modifycomment()
    {
    	$where['cid'] = $_POST['cid'];
    	$where['content'] = $_POST['content'];
    	$comment = M('comment');
    	if($comment->save($where))
    		echo 1;
    	else
    		echo 0;
    }

    public function modifyarticle()
    {
    	if($_GET['aid'])
    	{
    		$where['aid'] = $_GET['aid'];
    		$article = M('article');
    		$arr = $article->where($where)->select();
    		$this->assign('article',$arr[0]);
    	}
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
		$this->display();
    }

    public function addarticle()
    {
    	$article = M('article');
    	$where['title'] = $_POST['title'];
    	$where['content'] = $_POST['content'];
    	$where['date'] = date("Y-m-d H:m:s");
		$where['aid'] = $_POST['aid'];
		if($article->save($where))
			echo 1;
		else
			echo 0;
    }

    public function article()
    {
    	$where['aid'] = $_GET['aid'];
    	$article = M('article');
    	$arr = $article->where($where)->select();
    	$this->assign('article',$arr[0]);
    	$uid =  $arr[0]['uid'];

    	$user = M('user');
    	$arr = $user->where('uid = '.$uid)->select();
    	$this->assign('user',$arr[0]);
    	
    	$whe['uid'] = $uid;
    	$whe['akid'] = array('in','1,2');
    	$arr = $article->where($whe)->order('clicknum desc')->limit('10')->select();
    	$this->assign('articleList',$arr);

    	$arr = $article->where($whe)->count();
    	$this->assign('total',$arr);

    	$comment = M('comment')->join('user on user.uid = comment.uid');
    	$arr = $comment->where($where)->order('date asc')->select();
    	$this->assign('comment',$arr);

    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
		$this->display();
    }
} 