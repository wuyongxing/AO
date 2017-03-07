<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //部门登录首页
    public function index(){
    	$this->display();
    }

    //个人登录
    public function login(){
    	$user = M('user');
    	$where['uid'] = $_POST['uid'];
    	$where['password'] = $_POST['password'];
        $where['isAdmin'] = $_POST['isAdmin'];
    	$arr = $user->where($where)->select();
        $arr = $arr[0];
    	if($arr)
    	{
    		$_SESSION['uid'] = $arr['uid'];
            $_SESSION['username'] = $arr['username'];
            $_SESSION['pic'] = $arr['pic'];
            echo 1;
    	}
    	else 
    		echo 0;
    }
    //个人登出
    public function Logout(){
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
    	unset($_SESSION['pic']);
    	$this->redirect("Index/index");
    }
}