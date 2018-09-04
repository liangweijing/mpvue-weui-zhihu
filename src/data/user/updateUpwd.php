<?php
//data/editUser.php
header("Content-Type:application/json");
	require_once("../init.php");
	@$uid = $_REQUEST["uid"];
	@$n = $_REQUEST["uname"];
	@$upwd = $_REQUEST['upwd'];
	@$cpwd = $_REQUEST['cpwd'];

	$sql = "update pet_user set upwd='$cpwd' where uid=$uid and upwd='$upwd'";
	//执行
	mysqli_query($conn,$sql);
	//判断影响行数
	if(mysqli_affected_rows($conn)>0){
		echo '{"code":1,"msg":"更新密码成功!"}';
		//向操作日志表添加一条记录
        //创建sql INSERT
        //客户编号
        //客户ip
        $ip=$_SERVER["REMOTE_ADDR"];
        //记录操作信息
        $rs="updatePwd success $n ip:$ip";
        $sql="INSERT INTO t_log values(null,$uid,'updatePwd',now(),'$rs')";
        $result = mysqli_query($conn,$sql);
	}else{
		echo '{"code":-1,"msg":"请检查SQL语句！"}';
	}


?>

