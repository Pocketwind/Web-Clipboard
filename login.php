<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Simple Clipboard</title>
    <?php
        ini_set( 'display_errors', '1' );
        if(isset($_SESSION))
        {
            session_destroy();
        }
        ?>
</head>
<body>
    <form action="./clipboard.php" method="post">
        <input id="id" type="text" name="id" placeholder="아이디">
        <input id="password" type="password" name="password" placeholder="비밀번호">
        <input type="submit" value="로그인">
    </form>
</body>
</html>