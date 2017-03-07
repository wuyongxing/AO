<?php
namespace Home\Controller;
use Think\Controller;
class PersonController extends Controller {
    public function index(){
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
    	$this->display();
    }

    public function modifyPassword()
    {
        $where['uid'] = $_POST['uid'];
        $where['password'] = $_POST['OldPassword'];
        $user = M('user');
        if($user->where($where)->select())
        {
            $where['password'] = $_POST['password'];
            if($user->save($where))
                echo 2;
            else
                echo 0;
        }
        else
            echo 1;
    }

    public function info()
    {
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $user = M('user');
        $where['uid'] = $_SESSION['uid'];
        $arr = $user->where($where)->select();
        $this->assign('user',$arr[0]);
        $this->display();
    }

    public function modifyInfo()
    {
        $where['uid'] = $_POST['uid'];
        $where['phone'] = $_POST['phone'];
        $where['email'] = $_POST['email'];
        $where['address'] = $_POST['address'];
        $user = M('user');
        if($user->save($where))
            echo 1;
        else
            echo 0;
    }

    public function uploadPic()
    {
        $upload = new \Think\Upload();// 实例化上传类
         //设置上传文件大小
        $upload->maxSize = 3292200;
         //设置上传文件类型
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
         //设置附件上传目录
        $upload->rootPath = './Public/';
        $upload->savePath = './img/';
        $info = $upload->upload();
        if (!$info)
        {
            //捕获上传异常
            echo $upload->getError();
        }
        else
        {
            //取得成功上传的文件信息
            $where['uid'] = $_POST['uid'];
            $where['pic'] = "/AO/Public".$info['photo']['savepath'].$info['photo']['savename'];
            $_SESSION['pic'] = $where['pic'];
            $user = M('user');
            $ok=$user->save($where);
            if($ok) echo 1;
            else echo 0;
        } 
    }

    public function salarybill()
    {
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $where['salarybill.uid'] = $_SESSION['uid'];
        $bill = M('salarybill');
        $arr = $bill->join('user on user.uid = salarybill.uid')->where($where)->select();
        $this->assign("salarybill",$arr);
        $this->display();
    }

    public function findAttendence()
    {
        $where['attendence.uid'] = $_SESSION['uid'];
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
        $this->assign("uid",$_SESSION['uid']);
        $this->assign('username',$_SESSION['username']);
        $this->assign('pic',$_SESSION['pic']);
        $this->display();
    }
}