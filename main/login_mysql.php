<?session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
  </head>
  <body>
    <?
    $id = $_POST['username'];
    $pwd = $_POST['password'];

    $con = mysqli_connect("localhost",'root','apmsetup','ssong');
    $query = "SELECT * FROM person_join WHERE id='$id'";
    $result = mysqli_query($con,$query);

    if(!$id){?>
      <script>
        alert("아이디를 입력하지 않으셨습니다.");
        history.go(-1);
      </script>
    <?exit;}
    if(!$pwd){?>
      <script>
        alert("비밀번호를 입력하지 않으셨습니다.");
        history.go(-1);
      </script>
    <?exit;}

    $num_match = mysqli_num_rows($result);
    if(!$num_match){?>
      <script>
        alert("등록되지 않은 아이디입니다.");
        history.go(-1);
      </script>
    <?exit;
    }else{
      $row = mysqli_fetch_array($result);
      $db_pwd = $row['password'];

      if($pwd != $db_pwd){?>
        <script>
          alert('비밀번호가 틀립니다.');
          history.go(-1)
        </script><?
        exit;}
      else{
        $userid = $row['id'];
        $username = $row['name'];

        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $username;
        }
    }
    echo("<script>location.replace('main.php');</script>");?>
  </body>
</html>
