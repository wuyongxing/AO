<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
    public function index()
    {
    	
    	$testkind = M('testkind');
    	for($i = 1; $i <= 6; $i++)
    	{
    		$where['tmkid'] = $i;
    		$arr = $testkind->where($where)->select();
    		$this->assign('arr'.$i,$arr);
    	}
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function test()
    {
    	$problem = M('problem');
    	$total;
        for($i = 0; $i < count($_POST['problem']); $i++)
        {
            $where['tkid'] = $_POST['problem'][$i];
            $tmp = $problem->where($where)->select();
            for($j = 0; $j < count($tmp); $j++)
                $total[] = $tmp[$j];
        }
    	$num = count($total);
    	if($num > 20) 
    		$n = 20;
    	else 
    		$n = $num;
    	for($i = 0; $i < $n; $i++)
    	{
    		$x = rand($i,$num - 1);
    		$tmp = $total[$i];
    		$total[$i] = $total[$x];
    		$total[$x] = $tmp;
    		$data[] = $total[$i];
    	}
        $this->assign('total',$n);
    	$this->assign("problem",$data);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
    	$this->display();
    }

    public function ojlist()
    {
        $oj = M('oj');
        if($_POST['oid'])
        {
            $where['oid'] = $_POST['oid'];
            $where['title'] = $_POST['oid'];
            $where['_logic'] = 'or';
            $arr = $oj->where($where)->select();
            $this->assign('ojlist',$arr);
        }
        else
        {
            $arr = $oj->select();
            $this->assign('ojlist',$arr);
        }
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function oj()
    {
        $where['oid'] = $_GET['oid'];
        $oj = M('oj');
        $arr = $oj->where($where)->select();
        $this->assign('oj',$arr[0]);
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function submit()
    {
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->assign('oid',$_GET['oid']);
        $this->display();
    }

    public function doSubmit()
    {
        $status = array('AC', 'WA', 'PE', 'RE', 'TLE', 'MLE');
        $time = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9,1);
        $memory = array(1024,2048,4096,8192,16384,32768,65535);
        $where['uid'] = $_POST['uid'];
        $where['oid'] = $_POST['oid'];
        $where['status'] = $status[rand(0,5)];
        $where['date'] = time();
        $where['time'] = $time[rand(0,9)];
        $where['memory'] = $memory[rand(0,6)];
        if($where['status'] == 'TLE')
            $where['time'] = 1;
        if($where['status'] == 'MLE')
            $where['memory'] = 65535;
        $where['language'] = $_POST['language'];
        $ojrecord = M('ojrecord');
        if($ojrecord->add($where))
            echo 1;
        else
            echo 0;
    }

    public function status()
    {   
        if($_POST['orid'])
        {
            $ojrecord = M('ojrecord');
            $where['oid'] = $_POST['orid'];
            $where['username'] = $_POST['orid'];
            $where['_logic'] = 'or';
            $data = $ojrecord->join('user on user.uid = ojrecord.uid')->where($where)->order('date desc')->select();
            $this->assign('ojrecord',$data);    
        }
        else
        {
            $ojrecord = M('ojrecord');
            $data = $ojrecord->join('user on user.uid = ojrecord.uid')->order('date desc')->select();
            $this->assign('ojrecord',$data);   
        }
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function mydata()
    {
        $ojrecord = M('ojrecord');
        $where['uid'] = $_SESSION['uid'];
        $num = $ojrecord->where($where)->count();
        $where['status'] = "AC";
        $ac = $ojrecord->where($where)->count();
        $aclv = sprintf("%.2f",$ac / $num);
        $rank = 100 - ($ac % 100);
        $this->assign('num',$num);
        $this->assign('ac',$ac);
        $this->assign('aclv',$aclv);
        $this->assign('rank',$rank);
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }
} 