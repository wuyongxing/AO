<?php
namespace Home\Controller;
use Think\Controller;
class ProjectController extends Controller {
    public function index()
    {
    	$project = M('project')->join('projectuser on projectuser.pid = project.pid');
    	$where['uid'] = $_SESSION['uid'];
    	$projectdata = $project->where($where)->order('date desc')->select();
    	$user = M('user')->join("projectuser on projectuser.uid = user.uid")->select();
    	for($i = 0; $i < count($projectdata); $i++)
    	{
    		for($j = 0; $j < count($user); $j++)
    			if($projectdata[$i]['pmid'] == $user[$j]['uid'])
    				$projectdata[$i]["username"].=$user[$j]['username'];
    	}
    	$this->assign('project',$projectdata);
    	$pkid = M('user')->where('uid = '.$_SESSION['uid'])->select();
    	$this->assign('pkid',$pkid[0]['pkid']);
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function newProject()
    {
    	$project = M('project');
    	if($_POST['pid'])
    	{
    		$where['pid'] = $_POST['pid'];
    		$where['content'] = $_POST['content'];
    		if($project->save($where))
    			echo 1;
    		else
    			echo 0;
    	}
    	else
    	{
    		$where['content'] = $_POST['content'];
    		$where['pmid'] = $_SESSION['uid'];
    		$where['date'] = time();
    		$pid = $project->add($where);
    		if($pid)
    		{
    			$projectuser = M('projectuser');
    			$where1['pid'] = $pid;
    			$where1['uid'] = $_SESSION['uid'];
    			$projectuser->add($where1);		
    			echo 1;
    		}
    		else 
    			echo 0;
    	}
    }

    public function subProject()
    {
    	$where['pid'] = $_GET['pid'];
    	$project = M('project')->where($where)->select();
    	$project = $project[0];
    	$this->assign("project",$project);
    	$user = M('projectuser')->join('user on user.uid = projectuser.uid')->join('pkind on pkind.pkid = user.pkid')->where($where)->select();
        for($i = 0; $i < count($user); $i++)
    		$person.=$user[$i]['kind'].$user[$i]['username'].' ';
        $this->assign('person',$person);
        $person = M('user')->select();
        for($i = 0; $i < count($person); $i++)
            $personHash[$person[$i]['uid']] = $person[$i]['username'];
    	$pkid = M('user')->where($where)->select();
        $subProject = M('subproject')->where($where)->order('start desc')->select();
    	for($i = 0; $i < count($subProject); $i++)
        {
            $subProject[$i]['username'] = $personHash[$subProject[$i]['ueid']]." ";
            $subProject[$i]['username'] .= $personHash[$subProject[$i]['feid']]." ";
            $subProject[$i]['username'] .= $personHash[$subProject[$i]['rdid']]." ";
            $subProject[$i]['username'] .= $personHash[$subProject[$i]['qaid']]." ";
        }
        $this->assign('subproject',$subProject);
        $this->assign('pkid',$pkid[0]['pkid']);
    	$this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function addPerson()
    {
    	$where['uid'] = $_POST['uid'];
    	$where['pid'] = $_POST['pid'];
    	$projectuser = M('projectuser');
    	if($projectuser->add($where))
    		echo 1;
    	else
    		echo 0;
    }

    public function deletePerson()
    {
    	$where['uid'] = $_POST['uid'];
    	$where['pid'] = $_POST['pid'];
    	$projectuser = M('projectuser');
    	$person = $projectuser->where($where)->select();
    	$where['puid'] = $person[0]['puid'];
    	if($projectuser->where($where)->delete())
    		echo 1;
    	else
    		echo 0;
    }

    public function addSubProject()
    {
    	$where['title'] = $_POST['title'];
    	$where['pid'] = $_POST['pid'];
    	$where['start'] = $_POST['start'];
    	$where['end'] = $_POST['end'];
    	$where['content'] = $_POST['content'];
        $where['time'] = $_POST['time'];
    	$where['ueid'] = $_POST['ueid'];
    	$where['feid'] = $_POST['feid'];
    	$where['rdid'] = $_POST['rdid'];
    	$where['qaid'] = $_POST['qaid'];
    	$where['date'] = time();
    	$subProject = M('subproject');
    	if($_POST['spid'])
    	{
    		$where['spid'] = $_POST['spid'];
    		if($subProject->save($where))
    			echo 1;
    		else
    			echo 0;
    	}
    	else
    	{
    		if($subProject->add($where))
    			echo 1;
    		else
    			echo 0;
    	}
    }

    public function weekTask()
    {
        $pid = M('user')->join("projectuser on projectuser.uid = user.uid")->where('user.uid = '.$_SESSION['uid'])->select();
    	for($i = 0; $i < count($pid); $i++)
            $arr[] = $pid[$i]['pid'];
        $where['pid'] = array('in',$arr);
        $where['start'] = array('elt',date("Y-m-d"));
        $where['end'] = array('egt',date("Y-m-d"));

        $person = M('user')->select();
        for($i = 0; $i < count($person); $i++)
            $personHash[$person[$i]['uid']] = $person[$i]['username'];
        $data = M('subproject')->where($where)->select();
        for($i = 0; $i < count($data); $i++)
        {
            $data[$i]['username'] = $personHash[$data[$i]['ueid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['feid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['rdid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['qaid']]." ";
        }
        $this->assign('task',$data);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function todayOnline()
    {
    	$pid = M('user')->join("projectuser on projectuser.uid = user.uid")->where('user.uid = '.$_SESSION['uid'])->select();
        for($i = 0; $i < count($pid); $i++)
            $arr[] = $pid[$i]['pid'];
        $where['pid'] = array('in',$arr);
        $where['end'] = date("Y-m-d");
        $where['status'] = array('not in','63');
        $person = M('user')->select();
        for($i = 0; $i < count($person); $i++)
            $personHash[$person[$i]['uid']] = $person[$i]['username'];
        $data = M('subproject')->where($where)->select();
        for($i = 0; $i < count($data); $i++)
        {
            $data[$i]['username'] = $personHash[$data[$i]['ueid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['feid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['rdid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['qaid']]." ";
        }
        $this->assign('task',$data);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function todayOnlined()
    {

    	$pid = M('user')->join("projectuser on projectuser.uid = user.uid")->where('user.uid = '.$_SESSION['uid'])->select();
        for($i = 0; $i < count($pid); $i++)
            $arr[] = $pid[$i]['pid'];
        $where['pid'] = array('in',$arr);
        $where['end'] = date("Y-m-d");
        $where['status'] = 63;
        $person = M('user')->select();
        for($i = 0; $i < count($person); $i++)
            $personHash[$person[$i]['uid']] = $person[$i]['username'];
        $data = M('subproject')->where($where)->select();
        for($i = 0; $i < count($data); $i++)
        {
            $data[$i]['username'] = $personHash[$data[$i]['ueid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['feid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['rdid']]." ";
            $data[$i]['username'] .= $personHash[$data[$i]['qaid']]." ";
        }
        $this->assign('task',$data);
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function task()
    {
        $where['spid'] = $_GET['spid'];
        $person = M('user')->select();
        for($i = 0; $i < count($person); $i++)
            $personHash[$person[$i]['uid']] = $person[$i]['username'];
        $data = M('subproject')->where($where)->select();
        $data = $data[0];
        $id[] = $data['ueid'];
        $id[] = $data['feid'];
        $id[] = $data['rdid'];
        $id[] = $data['qaid'];
        $where1['pid'] = $data['pid'];
        $where1['uid'] = array('not in',$id);
        $pmid = M('projectuser')->where($where1)->select();
        $data['uename'] = $personHash[$data['ueid']];
        $data['fename'] = $personHash[$data['feid']];
        $data['rdname'] = $personHash[$data['rdid']];
        $data['qaname'] = $personHash[$data['qaid']];
        $data['pmname'] = $personHash[$pmid[0]['uid']];
        $this->assign('subproject',$data);
        $this->assign("uid",$_SESSION['uid']);
        $pkid = M('user')->where('uid = '.$_SESSION['uid'])->select();
        $pkid = $pkid[0]['pkid'];
        $this->assign('pkid',$pkid);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }

    public function modifystatus()
    {
        $where['spid'] = $_POST['spid'];
        $data = M('subproject')->where($where)->select();
        $data = $data[0];
        $pkid = $_POST['pkid'];
        if($pkid == 1)
            $data['status'] |= 1;
        else if($pkid == 2)
            $data['status'] |= 2;
        else if($pkid == 3)
            $data['status'] |= 4;
        else if($pkid == 4)
            $data['status'] |= 8;
        else if($pkid == 5)
        {
            $data['status'] |= 16;
            $data['status'] |= 32;
        }
        if(M('subproject')->save($data))
            echo 1;
        else
            echo 0;
    }
} 
