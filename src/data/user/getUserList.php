<?php
//data/user/getUserList
/**
* 分页显示所有用户
*/
header('Content-Type: application/json;charset=UTF-8');

require_once("../init.php");

@$kw=$_REQUEST["kw"];
@$pno=$_REQUEST["pno"];
@$pageSize=$_REQUEST["pageSize"];

if($kw){
  $kw = urldecode($kw);
}

if($pno==null){
	$pno=1;
}
if($pageSize==null){
	$pageSize=10;
}
$output=array();
//$output=[
	//  "pno"=>	$pno
	//  "pageSize"=>$pageSize
	//  "pageCount"=>$pageCount
	//  "pagedata"
//];

//分页
//获取总记录数
$sql = " SELECT count(uid) as count FROM pet_user ". ($kw?"WHERE uname LIKE '%$kw%'":"");
$result=mysqli_query($conn,$sql);
if(mysqli_error($conn)){
	echo mysqli_error($conn);
}
$count=mysqli_fetch_row($result);
//echo json_encode($count);
//获取当前页内容
$offset=($pno-1)*$pageSize;
$sql="SELECT uid,uname,email";
$sql.=" FROM pet_user ". ($kw?"WHERE uname LIKE '%$kw%'":"");
$sql.=" LIMIT $offset,$pageSize";
$result=mysqli_query($conn,$sql);
$arr=array();
while($row=mysqli_fetch_array($result,1)){
	$arr[]=$row;
}
if(mysqli_error($conn)){
  echo mysqli_error($conn);
}
$output["pno"]=$pno;
$output["pageSize"]=$pageSize;
$output["offset"]=$offset;
$output["pageCount"]=ceil($count[0]/$pageSize);
$output["pagedata"]=$arr;
echo json_encode($output);
