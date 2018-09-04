<?php
//data/user/addUser.php
header("Content-Type:application/json");
	session_start();
	require_once("../init.php");
	@$n = $_REQUEST['uname'];
	@$p = $_REQUEST['upwd'];
	@$e = $_REQUEST['email'];
  @$g = $_REQUEST["gender"];

//查询数据库，是否有这个用户
$sql="select * from pet_user where uname='$n'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);
if($row){
	echo '{"code":-1,"msg":"用户名已存在，请重新输入"}';
	exit;
}
//如果没有这个用户就添加
	//拼sql,添加新用户
	$sql = "insert into pet_user(uname,upwd,email,gender) values('$n','$p','$e','$g')";
	//检测结果
	$result = mysqli_query($conn,$sql);
	if($result){
		echo '{"code":1,"msg":"添加用户成功!"}';
		$sql="select uid from pet_user where uname='$n'";
		$result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_row($result);
		//向操作日志表添加一条记录
        //创建sql INSERT
        //客户编号
        $uid=$row[0];
        //客户ip
        $ip=$_SERVER["REMOTE_ADDR"];
        //记录操作信息
        $rs="register success $n ip:$ip";
        $sql="INSERT INTO t_log values(null,$uid,'login',now(),'$rs')";
        $result = mysqli_query($conn,$sql);
	}else{
		echo '{"code":-1,"msg":"请检查SQL语句！"}';
	}


?>

