<?php
namespace Home\Controller;
use Think\Controller;
class KnowledgeController extends Controller {
    public function index()
    {
    	$article = M('article');
    	$where['akid'] = array('not in','0,3');
    	$arr = $article->where($where)->order('date desc,clicknum desc')->select();
    	$this->assign('article',$arr);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
		$this->display();
    }

    public function articleList()
    {
    	$where['akid'] = $_GET['kind'];
    	$this->assign('kind',$_GET['kind']);
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

    public function comment()
    {
    	$where['aid'] = $_POST['aid'];
    	$where['content'] = $_POST['content'];
    	$where['uid'] = $_SESSION['uid'];
    	$where['akid'] = $_POST['akid'];
    	$where['date'] = date('Y-m-d H:m:s');
    	$comment = M('comment');
    	if($comment->add($where))
    		echo 1;
    	else
    		echo 0;
    }

    public function ask()
    {
    	$where['akid'] = 3;
        $this->assign('kind',3);
        $article = M('article');
        if($_GET['name'])
        {
            $where['title'] = array('like','%'.$_GET['name'].'%');
            $where['content'] = array('like','%'.$_GET['name'].'%');
        }
        $arr = $article->where($where)->order('date desc,clicknum desc')->select();
        $this->assign('ask',$arr);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function myarticle()
    {
    	$article = M('article');
    	$where['uid'] = $_SESSION['uid'];
    	$where['akid'] = 1;
    	$arr1 = $article->where($where)->select();
    	$this->assign('jishu',$arr1);
    	$where['akid'] = 2;
    	$arr2 = $article->where($where)->select();
    	$this->assign('shenghuo',$arr2);
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
		$this->display();
    }

    public function newarticle()
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
    	$where['uid'] = $_POST['uid'];
    	$where['akid'] = $_POST['akid'];
    	$where['title'] = $_POST['title'];
    	$where['content'] = $_POST['content'];
    	$where['date'] = date("Y-m-d H:m:s");
    	if($_POST['aid'])
    	{
    		$where['aid'] = $_POST['aid'];
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

    public function myask()
    {
    	$where['uid'] = $_SESSION['uid'];
    	$where['akid'] = 3;
    	$article = M('article');
    	$arr = $article->where($where)->order('date desc')->select();
    	$this->assign('askList',$arr);

    	$comment = M('comment');
    	$arr = $comment->where($where)->order('date desc')->select();
    	$this->assign('commentList',$arr);
    	
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
		$this->display();
    }

    public function newask()
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

    public function seeask()
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
    	$whe['akid'] = array('in','3');
    	$arr = $article->where($whe)->order('clicknum desc')->limit('10')->select();
    	$this->assign('articleList',$arr);

    	$arr = $article->where($whe)->count();
    	$this->assign('total',$arr);

    	$comment = M('comment');
    	$arr = $comment->where($where)->order('date asc')->select();
    	$this->assign('comment',$arr);

    	$arr = $comment->where($whe)->order('date desc')->limit('10')->select();
    	$this->assign('commentList',$arr);

    	$arr = $comment->where($whe)->count();
    	$this->assign('totalnum',$arr);

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

    public function deleteask()
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
} 