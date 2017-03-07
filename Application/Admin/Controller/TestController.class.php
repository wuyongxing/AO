<?php
namespace Admin\Controller;
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
        $this->display();
    }
    
    public function problemlist()
    {
    	$problem = M('problem');
    	$where['tkid'] = $_GET['tkid'];
    	$arr = $problem->where($where)->select();
    	$this->assign('problemlist',$arr);

    	$testkind = M('testkind');
		$arr = $testkind->where($where)->select();
		$this->assign('kind',$arr[0]);

    	$this->display();
    }
    public function problem()
    {
    	if($_POST['pid'] || $_GET['pid'])
    	{
    		$problem = M('problem');
    		if($_POST['pid'])
    			$where['pid'] = $_POST['pid'];
    		if($_GET['pid'])
    			$where['pid'] = $_GET['pid'];
    		$arr = $problem->where($where)->select();
    		$this->assign('problem',$arr[0]);
    		var_dump($arr[0]);
    	}
    	$this->assign('tkid',$_GET['tkid']);
    	$this->display();
    }

    public function modifyProblem()
    {
    	$problem = M('problem');
    	$where['pid'] = $_POST['pid'];
    	$where['tkid'] = $_POST['tkid'];
    	$where['content'] = $_POST['content'];
    	$where['A'] = $_POST['A'];
    	$where['B'] = $_POST['B'];
    	$where['C'] = $_POST['C'];
    	$where['D'] = $_POST['D'];
    	$where['answer'] = $_POST['answer'];
    	if($_POST['pid'])
    	{
    		if($problem->save($where))
    			echo 1;
    		else
    			echo 0;
    	}
    	else
    	{
    		if($problem->add($where))
    			echo 1;
    		else
    			echo 0;
    	}
    }

    public function deleteProblem()
    {
    	$where['pid'] = $_POST['pid'];
    	$problem = M('problem');
    	if($problem->where($where)->delete())
    		echo 1;
    	else
    		echo 0;
    }
    public function kind()
    {
    	$testkind = M('testkind');
    	for($i = 1; $i <= 6; $i++)
    	{
    		$where['tmkid'] = $i;
    		$arr = $testkind->where($where)->select();
    		$this->assign('arr'.$i,$arr);
    	}
    	$this->display();
    }

    public function add()
    {
		$testkind = M('testkind');
		$where['tmkid'] = $_POST['tmkid'];
		$where['kind'] = $_POST['kind'];
		if($testkind->add($where))
			echo 1;
		else
			echo 0;
    }

    public function modify()
    {
    	$testkind = M('testkind');
		$where['tkid'] = $_POST['tkid'];
		$where['kind'] = $_POST['kind'];
		if($testkind->save($where))
			echo 1;
		else
			echo 0;
    }

    public function delete()
    {
    	$testkind = M('testkind');
		$where['tkid'] = $_POST['tkid'];
		if($testkind->where($where)->delete())
			echo 1;
		else
			echo 0;
    }

    public function ojList()
    {
    	$oj = M('oj');
    	if($_POST['oid'])
    	{
    		$where['oid'] = $_POST['oid'];
    		$where['title'] = $_POST['oid'];
    		$where['_logic'] = 'or';
    		$data = $oj->where($where)->select();
    	}
    	else
    	{
	    	$data = $oj->select();
    	}
    	$this->assign('ojList',$data);
    	$this->display();
    }

    public function oj()
    {
    	if($_GET['oid'])
    	{
    		$where['oid'] = $_GET['oid'];
    		$oj = M('oj');
    		$arr = $oj->where($where)->select();
    		$this->assign('oj',$arr[0]);
    	}
    	$this->display();
    }

    public function addoj()
    {
    	var_dump($_POST);
    	$oj = M('oj');
    	$where['oid'] = $_POST['oid'];
        $where['time'] = $_POST['time'];
    	$where['title'] = $_POST['title'];
    	$where['content'] = $_POST['content'];
    	$where['input'] = $_POST['input'];
    	$where['sample'] = $_POST['sample'];
    	if($_POST['oid'])
    	{
    		if($oj->save($where))
    			echo 1;
    		else
    			echo 0;
    	}
    	else
    	{
    		if($oj->add($where))
    			echo 1;
    		else
    			echo 0;
    	}
    }

    public function deleteoj()
    {
    	$oj = M('oj');
		$where['oid'] = $_POST['oid'];
		if($oj->where($where)->delete())
			echo 1;
		else
			echo 0;
    }
} 
