<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Clipboard</title>
    <?php
        ini_set( 'display_errors', '1' );
    ?>
</head>
<body>
    <?php 
    #SQL연결 안되면 에러
    $conn=mysqli_connect("localhost","cmshzl","<password>","clipboard");
    if(mysqli_connect_errno())
    {
        echo "SQL 연결 실패 : ".mysqli_connect_error();
    }

    $id="";
    $password="";
    $uid="";

    session_start();
    if(isset($_SESSION['back']))
    {
        $id=$_SESSION['id'];
        $password=$_SESSION['pw'];
        $uid=$_SESSION['uid'];
        session_destroy();
    }
    else
    {
        #ID 포스트로 받아오기
        $id=$_POST['id'];
        #id 빈칸으로 내면 로그인페이지로 복귀
        if($id=="")
        {
            echo "<script>alert(\"아이디를 다시 입력해주세요.\");</script>";
            echo "<script>location.href='login.php'</script>";
        }
        #없으면 로그인페이지로 복귀
        if(empty($id))
        {
            echo "<script>alert(\"로그인이 필요합니다.\");</script>";
            echo "<script>location.href='login.php'</script>";
        }

        #비밀번호 해싱하기
        $password=hash("sha256",$_POST['password']);
        #uid는 id+pw 해싱한거
        $uid=hash("sha256",$id.$password);
        #거기서 앞 50자만 뽑기
        $uid=substr($uid,0,50);
        #id 있는지 찾아보기
        $sql="SELECT id FROM users WHERE id =\"".$id."\";";
        $result=mysqli_query($conn,$sql);
        #만약 없으면 post로 받아온거로 새로 만들기
        if($result->num_rows==0)
        {
            $sql="insert into users(id,pw,uid) values(\"".$id."\",\"".$password."\",\"".$uid."\");";
            $result=mysqli_query($conn,$sql);
        }
        
        #id 있으면 계정정보 받아오기
        $sql="SELECT * FROM users WHERE uid=\"".$uid."\";";
        $result=mysqli_query($conn,$sql);
        $data=mysqli_fetch_array($result);
        #비밀번호 틀리면 로그인페이지로 복귀
        if($data['pw']!=$password)
        {
            echo "<script>alert(\"비밀번호가 틀렸습니다.\");</script>";
            echo "<script>location.href='login.php'</script>";
            #echo 오류
        }
    }

    #클립보드에서 데이터 받아오기
    $sql="SELECT * FROM clipboard WHERE uid=\"".$uid."\";";
    $result=mysqli_query($conn,$sql);
    ?>

    <!-- HTML-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    <script>
        function copy_clip_data(index)
        {
            var clipboard=new ClipboardJS(".btn");
            clipboard.on('success',function(e){
                document.getElementById("data").rows[index+1].cells[2].innerText="Copied!";
                clipboard.destroy();
            });
        }
        function copy_clip_share(index)
        {
            var clipboard=new ClipboardJS(".btn");
            clipboard.on('success',function(e){
                document.getElementById("share").rows[index+1].cells[2].innerText="Copied!";
                clipboard.destroy();
            });
        }
    </script>

    <h1>Simple Clipboard</h1>
    <br>
    UID: <?php echo $uid;?>
    <br>
    <form action="login.php" method="post">
        <input type="submit" value="로그아웃">
    </form>
    <br>
    붙여넣을 내용을 입력하세요
    <form action="process.php" method="post">
        <input type="text" name="data">
        <input type="submit" value="Paste">
        <input type="hidden" name="uid" value="<?php echo $uid;?>">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="pw" value="<?php echo $password;?>">
    </form>

    <table border="1" id="data">
        <th>시간</th>
        <th>내용</th>
        <th>복사</th>
        <th>삭제</th>
        <th>공유할 UID</th>
        <th>공유</th>
    <!-- HTML-->


    <?php
    #클립보드 내용 출력
    $i=0;
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row['written_time']."</td>";
        echo "<td>".$row['data']."</td>";
        echo "<td><button class=\"btn\" data-clipboard-text=\"".$row['data']."\" onclick=\"copy_clip_data(".$i.")\">Copy</button></td>";
        echo "<form action=\"delete.php\" method=\"post\">";
        echo "<td><input type=\"submit\" value=\"삭제\"></td>";
        echo "<input type=\"hidden\" name=\"board_id\" value=\"".$row['board_id']."\">";
        echo "<input type=\"hidden\" name=\"uid\" value=\"".$uid."\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
        echo "<input type=\"hidden\" name=\"pw\" value=\"".$password."\">";
        echo "</form>";
        echo "<form action=\"share.php\" method=\"post\">";
        echo "<td><input type=\"text\" name=\"target_uid\"></td>";
        echo "<td><input type=\"submit\" value=\"공유\"></td>";
        echo "<input type=\"hidden\" name=\"board_id\" value=\"".$row['board_id']."\">";
        echo "<input type=\"hidden\" name=\"uid\" value=\"".$uid."\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
        echo "<input type=\"hidden\" name=\"pw\" value=\"".$password."\">";
        echo "</form>";
        echo "</tr>";
        $i++;
    }
    ?>
    </table>
    <br>

    나에게 공유된 클립보드
    <br>
    <table border="1" id="share">
        <th>공유된 시간</th>
        <th>내용</th>
        <th>복사</th>
    <?php
    $sql="SELECT * FROM clipboard INNER join share on clipboard.board_id=share.board_id where share.uid=\"".$uid."\";";
    $result=mysqli_query($conn,$sql);
    #공유된거 출력
    $i=0;
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row['shared_time']."</td>";
        echo "<td>".$row['data']."</td>";
        echo "<td><button class=\"btn\" data-clipboard-text=\"".$row['data']."\" onclick=\"copy_clip_share(".$i.")\">Copy</button></td>";
        echo "</tr>";
        $i++;
    }
    ?>


    <?php
    mysqli_close($conn);
    ?>
</body>
</html>