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
$pw=$_POST['pw'];
$id=$_POST['id'];
$board_id=$_POST['board_id'];

#sql 연결
$conn=mysqli_connect("localhost","cmshzl","<password>","clipboard");
if(mysqli_connect_errno())
{
    echo "SQL 연결 실패 : ".mysqli_connect_error();
}

#날짜 얻어오기
$date=date("Y-m-d H:i:s");

#target uid
$target_uid=$_POST['target_uid'];

#share 생성
$sql="insert into share(board_id,shared_time,uid) values(\"".$board_id."\",\"".$date."\",\"".$target_uid."\");";
$result=mysqli_query($conn,$sql);

/*
#가장 마지막 share_n 얻어오기
$sql="SELECT share_n FROM share ORDER BY share_n DESC LIMIT 1;";
$result=mysqli_query($conn,$sql);
#만약 없으면 0부터 시작
$lastest_share_n=0;
if($result->num_rows==0)
{
    $lastest_share_n=0;
}
else
{
    $lastest_share_n=$result->fetch_assoc()['share_n']+1;
}

$sql="update clipboard set share_n=\"".$lastest_share_n."\" where board_id=\"".$board_id."\";";
#echo $sql."<br>";
$result=mysqli_query($conn,$sql);

$sql="insert into share(share_n,shared_time,uid) values(\"".$lastest_share_n."\",\"".$date."\",\"".$target_uid."\");";
#echo $sql."<br>";
$result=mysqli_query($conn,$sql);
*/


$_SESSION['uid']=$uid;
$_SESSION['id']=$id;
$_SESSION['pw']=$pw;
$_SESSION['back']=true;


mysqli_close($conn);
echo "<script>location.href='clipboard.php'</script>";

?>