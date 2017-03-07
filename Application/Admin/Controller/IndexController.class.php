<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
        $person = M('user');
    	if($_POST['name'])
        {
            $where['user.uid'] = $_POST['name'];
            $where['user.username'] = $_POST['name'];
            $where['_logic'] = 'OR';
        	$arr = $person->join('department ON department.gid = user.gid')->where($where)->select();
        }
        else
        {
	    	$arr = $person->join('department ON department.gid = user.gid')->select();
        }
        $this->assign('person',$arr);
        $this->display();
    }

    public function info()
    {
    	$user = M('user');
    	$where['uid'] = $_GET['uid'];
    	$userinfo = $user->join('department ON department.gid = user.gid')->where($where)->select();
    	$department = M('department');
    	$departmentinfo = $department->select();
    	$this->assign("user",$userinfo[0]);
    	$this->assign("departmentinfo",$departmentinfo);
    	$this->display();
    }

    public function modifyInfo()
    {
    	$user = M('user');
    	$where['uid'] = $_POST['uid'];
    	$where['username'] = $_POST['username'];
    	$where['phone'] = $_POST['phone'];
    	$where['address'] = $_POST['address'];
    	$where['email'] = $_POST['email'];
    	$where['gid'] = $_POST['gid'];
    	$where['idcard'] = $_POST['idcard'];
    	$where['age'] = $_POST['age'];
    	$where['background'] = $_POST['background'];
    	if($user->save($where))
    		echo 1;
    	else
    		echo 0;
    }

    public function register()
    {
    	$department = M('department');
    	$departmentinfo = $department->select();
    	$this->assign("departmentinfo",$departmentinfo);
    	$this->display();
    }

    public function doRegister()
    {
    	$user = M('user');
    	$where['username'] = $_POST['username'];
    	$where['phone'] = $_POST['phone'];
    	$where['address'] = $_POST['address'];
    	$where['email'] = $_POST['email'];
    	$where['gid'] = $_POST['gid'];
    	$where['idcard'] = $_POST['idcard'];
    	$where['age'] = $_POST['age'];
    	$where['background'] = $_POST['background'];
    	if($user->add($where))
    		echo 1;
    	else
    		echo 0;
    }
}