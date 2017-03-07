<?php
namespace Home\Controller;
use Think\Controller;
class MeetingController extends Controller {
    public function index()
    {
    	if($_POST['meetingroom'])
        {
            $meeting = M('meeting');
            $where['meetingroom'] = $_POST['meetingroom'];
            $arr = $meeting->where($where)->select();
            $this->assign('meeting',$arr);
        }
        else
        {
        	$meeting = M('meeting');
        	$arr = $meeting->select();
            $this->assign('meeting',$arr);
        }
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }
    public function booking()
    {
    	$where['time.mid'] = $_GET['mid'];
    	$where['date'] = date("Y-m-d");
    	$time = M('time')->join('meeting on meeting.mid = time.mid')->join('user on user.uid = time.uid');
    	$arr = $time->where($where)->order('time.from asc')->select();
    	$this->assign('time',$arr);
    	$this->assign('mid',$_GET['mid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }
    public function doBooking()
    {
    	$where['mid'] = $_POST['mid'];
    	$where['date'] = date('Y-m-d');
    	$from = strtotime($_POST['from']);
    	$to = strtotime($_POST['to']);
    	$arr = M('time');
    	$time = $arr->where($where)->order('time.from asc')->select();
    	$flag = 1;
    	for($i = 0; $i < count($time); $i++)
    	{
    		if($time[$i]['from'] <= $from && $time[$i]['to'] >= $from)
    			$flag = 0;
    		if($time[$i]['from'] <= $to && $time[$i]['to'] >= $to)
    			$flag = 0;
    	}
    	if($flag)
    	{
    		$where['from'] = $from;
    		$where['to'] = $to;
    		$where['uid'] = $_SESSION['uid'];
    		$arr->add($where);
    		echo 1;
    	}
    	else
    		echo 0;
    }

    public function mybooking()
    {
    	$time = M('time')->join('meeting on meeting.mid = time.mid')->join('user on user.uid = time.uid');
    	$where['date'] = date('Y-m-d');
    	$where['time.uid'] = $_SESSION['uid'];
    	$arr = $time->where($where)->order('date desc,time.from desc')->select();
    	$this->assign('time',$arr);
    	$this->assign('uid',$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function deleBooking()
    {
    	$where['tid'] = $_POST['tid'];
    	$time = M('time');
    	if($time->where($where)->delete())
    		echo 1;
    	else
    		echo 0;

    }
} 