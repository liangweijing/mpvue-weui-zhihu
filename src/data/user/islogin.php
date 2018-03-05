<?php
//data/users/islogin.php
header("Content-Type:application/json");
require_once("../init.php");
session_start();
//@$uid=4;
@$uid=$_SESSION["uid"];
$arr=array();
if($uid==null){
//	echo json_encode(["ok"=>0]);
	$arr["ok"] = 0;
	echo json_encode($arr);
}
else{
	$sql="select uname from pet_user where uid=$uid";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($result);
	//var_dump($row[0]);
	$arr["ok"]=1;
	$arr["uname"]=$row[0];
//	echo json_encode(["ok"=>1,"uname"=>$row[0]]);
	echo json_encode($arr);

}