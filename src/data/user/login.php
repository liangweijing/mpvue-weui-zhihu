<?php
//data/users/login.php
session_start();
require_once("../init.php");
@$uname=$_REQUEST["uname"];
@$upwd=$_REQUEST["upwd"];


if($uname&&$upwd){
	$sql="select uid from pet_user where uname='$uname' and binary upwd='$upwd'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($result);
//	echo $row!=null?"true":"false";
	if($row){
		//session_start();
		$_SESSION["uid"]=$row[0];
		echo "true";

		//向操作日志表添加一条记录
        //创建sql INSERT
        //客户编号
        $uid=$row[0];
        //客户ip
        $ip=$_SERVER["REMOTE_ADDR"];
        //记录操作信息
        $rs="login success $uname ip:$ip";
        $sql="INSERT INTO t_log values(null,$uid,'login',now(),'$rs')";
        $result = mysqli_query($conn,$sql);
	}else{
		echo "false";
	}
}else{
	echo "false";
}



