<?php
//data/user/deleteUser.php
header("Content-Type:application/json");
	session_start();
	require_once("../init.php");
	@$uid = $_REQUEST['uid'];

  //记录操作记录所需的用户
  $sql="select uname from pet_user where uid=$uid";
  $result = mysqli_query($conn,$sql);
  $row=mysqli_fetch_row($result);
  $u=$uid;
  $uname=$row[0];

  //删除
	$sql = "delete from pet_user where uid=$uid";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo '{"code":1,"msg":"删除用户成功!"}';

		//向操作日志表添加一条记录
        //创建sql INSERT
        //客户编号
        //客户ip
        $ip=$_SERVER["REMOTE_ADDR"];
        //记录操作信息
        $rs="delete success $uname ip:$ip";
        $sql="INSERT INTO t_log values(null,$u,'delete',now(),'$rs')";
        mysqli_query($conn,$sql);
	}else{
		echo '{"code":-1,"msg":"请检查SQL语句！"}';
	}


?>

