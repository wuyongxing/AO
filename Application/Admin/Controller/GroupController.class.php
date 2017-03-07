<?php
namespace Admin\Controller;
use Think\Controller;
class GroupController extends Controller {
    public function index()
    {
    	$department = M('department');
    	$departmentinfo = $department->select();
    	$this->assign('department',$departmentinfo);
        $this->display();
    }

    public function info()
    {
    	$where['department.gid'] = $_GET['gid'];
    	$department = M('department');
    	$departmentinfo = $department->join("user on user.uid = department.teamleaderid")->where($where)->select();
    	$this->assign('department',$departmentinfo[0]);
        $this->display();
    }

 	public function modifyGroup()
 	{
 		$where['department.gid'] = $_GET['gid'];
    	$department = M('department');
    	$departmentinfo = $department->join("user on user.uid = department.teamleaderid")->where($where)->select();
    	$this->assign('department',$departmentinfo[0]);
        $this->display();
 	}

    public function modifyInfo()
    {
    	$where['gid'] = $_POST['gid'];
    	$where['groupname'] = $_POST['groupname'];
    	$where['teamleaderid'] = $_POST['teamleaderid'];
    	$where['describe'] = $_POST['describe'];
    	$where['detail'] = $_POST['detail'];
    	$department = M('department');
    	if($department->save($where))
    		echo 1;
    	else 
    		echo 0;
    }

    public function addGroup()
    {
    	$this->display();
    }

    public function doAddGroup()
    {
    	$where['groupname'] = $_POST['groupname'];
    	$where['teamleaderid'] = $_POST['teamleaderid'];
    	$where['describe'] = $_POST['describe'];
    	$where['detail'] = $_POST['detail'];
    	$department = M('department');
    	if($department->add($where))
    		echo 1;
    	else 
    		echo 0;
    }
} 