<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
    	if(isset($_SESSION['uid']))
    	{
			$this->assign("uid",$_SESSION['uid']);
            $this->assign('username',$_SESSION['username']);
            $this->assign('pic',$_SESSION['pic']);
			$this->display();
    	}
    	else
    		$this->redirect('Login/index');
    }
    public function searchPerson()
    {
        if($_POST['name'])
        {
            $person = M('user');
            $where['user.uid'] = $_POST['name'];
            $where['user.username'] = $_POST['name'];
            $where['_logic'] = 'OR';
            $arr = $person->join('department ON department.gid = user.gid')->where($where)->select();
            $this->assign('person',$arr);
        }
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }
}