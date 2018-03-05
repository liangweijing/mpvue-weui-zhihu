<?php
/*
*项目初始化页面，用于声明其它页面都需要的公共变量/函数。注意：此页面应该被其它页面包含
*/
header("Access-Control-Allow-Origin:*");
//$conn = mysqli_connect("qdm162787556.my3w.com","qdm162787556","xu960828","qdm162787556_db");
$conn = mysqli_connect("127.0.0.1","root","","pet",3306);

$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);

