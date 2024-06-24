<?php
session_start();
ini_set( 'display_errors', '1' );
if(!isset($_POST['uid']))
{
    echo "로그인X";
    echo "<script>location.href=\"login.html\"</script>";
}

#유저정보 받아오기
$uid=$_POST['uid'];
$data=$_POST['data'];
$pw=$_POST['pw'];
$id=$_POST['id'];

#sql 연결
$conn=mysqli_connect("localhost","cmshzl","<password>","clipboard");
if(mysqli_connect_errno())
{
    echo "SQL 연결 실패 : ".mysqli_connect_error();
}
$date=date("Y-m-d H:i:s");
$sql="insert into clipboard(uid,data,written_time) values(\"".$uid."\",\"".$data."\",\"".$date."\");";

$result=mysqli_query($conn,$sql);

$_SESSION['uid']=$uid;
$_SESSION['id']=$id;
$_SESSION['pw']=$pw;
$_SESSION['back']=true;


mysqli_close($conn);
echo "<script>location.href='clipboard.php'</script>";

?>