<?php
namespace Admin\Controller;
use Think\Controller;
class AttendenceController extends Controller {
    public function index()
    {
    	$this->display();
    }

    public function doAttendence()
    {
    	$user = M('user');
    	$where['uid'] = $_POST['uid'];
    	$arr = $user->where($where)->select();
        $arr = $arr[0];
        $flag = 0;
        if(time() % (24 * 60 * 60) > (10 * 60 * 60) && time() % (24 * 60 * 60) < (18 * 60 * 60))
        {
        	echo 1;
        	return;
        }
    	if($arr)
    	{
    		$time = date("Y-m-d");
    		$attendence = M('attendence');
    		$where['date'] = $time;
    		$arr = $attendence->where($where)->select();
    		$arr = $arr[0];
    		if($arr)
    		{
    			$arr['end'] = 1;
    			$attendence->save($arr);
    		}
    		else
    		{
    			$attendence->data($where)->add();
    		}
    		$flag = 2;
    	}
    	echo $flag;
    }

    public function findAttendence()
    {
    	$where['attendence.uid'] = $_POST['uid'];
    	$attendence = M('attendence');
    	if($_POST['from'] && $_POST['to'])
    	{
    		$where['date'] = array(array('egt',$_POST['from']),array('elt',$_POST['to']));
    		$arr = $attendence->join('user ON user.uid = attendence.uid')->where($where)->order('date asc')->select();
    		$this->assign('dateInfo',$arr);
    	} 
    	else if($_POST['from'])
    	{
    		$where['date'] = array('egt',$_POST['from']);
    		$arr = $attendence->join('user ON user.uid = attendence.uid')->where($where)->order('date asc')->select();
    		$this->assign('dateInfo',$arr);
    	}
    	else if($_POST['to'])
    	{
    		$where['date'] = array('elt',$_POST['to']);
    		$arr = $attendence->join('user ON user.uid = attendence.uid')->where($where)->order('date asc')->select();
    		$this->assign('dateInfo',$arr);
    	}
    	else
    	{
    		if($where['attendence.uid'])
    			$arr = $attendence->join('user ON user.uid = attendence.uid')->where($where)->order('date asc')->select();
    		else
    			$arr = $attendence->join('user ON user.uid = attendence.uid')->order('date asc')->select();
    		$this->assign('dateInfo',$arr);
    	}
    	$this->display();
    }
} 