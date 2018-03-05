<?php
//data/editUser.php
header("Content-Type:application/json");
	require_once("../init.php");
	@$uid = $_REQUEST["uid"];
	@$n = $_REQUEST['uname'];
	@$p = $_REQUEST['upwd'];
	@$e = $_REQUEST['email'];

	$sql = "update pet_user set uname='$n',email='$e' where uid=$uid and upwd='$p'";
	//检测结果
	$result = mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)){
		echo '{"code":1,"msg":"修改用户成功!"}';
		//向操作日志表添加一条记录
        //创建sql INSERT
        //客户编号
        //客户ip
        $ip=$_SERVER["REMOTE_ADDR"];
        //记录操作信息
        $rs="edit success $n ip:$ip";
        $sql="INSERT INTO t_log values(null,$uid,'edit',now(),'$rs')";
        $result = mysqli_query($conn,$sql);
	}else{
		echo '{"code":-1,"msg":"请检查SQL语句！"}';
	}


?>

