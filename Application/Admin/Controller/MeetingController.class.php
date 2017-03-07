<?php
namespace Admin\Controller;
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
        $this->display();
    }

    public function info()
    {
    	$where['mid'] = $_GET['mid'];
    	$meeting = M('meeting');
    	$arr = $meeting->where($where)->select();
    	$this->assign('meeting',$arr[0]);
    	$this->display();
    }

    public function modify()
    {
    	$where['mid'] = $_POST['mid'];
    	$where['meetingroom'] = $_POST['meetingroom'];
    	$where['container'] = $_POST['container'];
    	$where['address'] = $_POST['address'];
    	$meeting = M('meeting');
    	if($meeting->save($where))
    		echo 1;
    	else
    		echo 0;
    }

    public function addMeeting()
    {
    	$this->display();
    }

    public function add()
    {
    	$where['meetingroom'] = $_POST['meetingroom'];
    	$where['container'] = $_POST['container'];
    	$where['address'] = $_POST['address'];
    	$meeting = M('meeting');
    	if($meeting->add($where))
    		echo 1;
    	else
    		echo 0;
    }
    public function dele()
    {
    	$where['mid'] = $_POST['mid'];
    	$meeting = M('meeting');
    	if($meeting->where($where)->delete())
    		echo 1;
    	else
    		echo 0;
    }
} 