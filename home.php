<meta charset="utf-8">
<?php
error_reporting(0);
$link=mysqli_connect("dev.dxdc.net:3306","a0919165438","12935190","a0919165438")or die("数据库连接错误".mysqli_error());

$sql="SELECT * FROM tb_selWeb  ORDER BY add_time DESC";
$result=mysqli_query($link,$sql);
$list=array();
while($row = mysqli_fetch_assoc($result)) {
    $list[] = $row;  
    }


// print_r($list);exit;

if(isset($_POST['submit'])){
	//print_r($_POST);exit;
	$email=isset($_POST['email'])?$_POST['email']:'';
	if(isset($_POST['firstname'])){
		$firstname='匿';
	}else{
		$firstname=$_POST['firstname'];
	}
	if(isset($_POST['lastname'])){
		$lastname='名';
	}else{
		$lastname=$_POST['lastname'];
	}
	$message=$_POST['text'];
	$add_time=time();
	// echo $firstname,$lastname, $email,$message,$add_time;exit;
	$sql="INSERT INTO tb_selWeb (firstname,lastname,email,message,add_time) VALUES ('$firstname','$lastname', '$email','$message','$add_time')";
	$result=mysqli_query($link,$sql);
	if($result){
		echo "<script> alert('谢谢您的留言')</script>";
        echo "<script> window.location.href='home.php';</script>";
	}else{
		echo "<script> alert('留言失败，再来一次吧')</script>";
      	echo "<script> history.back();</script>";
	}
}

include('home.html');