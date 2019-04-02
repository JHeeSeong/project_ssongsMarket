<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
        <?
          $id = $_POST['member_id'];
          $pwd = $_POST['pwd'];
          $pwd_con = $_POST['user_passwd_confirm'];
          $hintans = $_POST['hintans'];
          $addr= $_POST['addr'];;
          $phonenumber1 = $_POST['mobile'];
          $phonenumber2 = $_POST['mobile2'];
          $phonenumber3 = $_POST['mobile3'];
          $email = $_POST['email'];
          $account1 = $_POST['account1'];
          $account2 = $_POST['account'];

          echo $account1;
          echo $account2;

          if(!$pwd){?>
            <script>
              alert("비밀번호를 입력하세요.");
              history.go(-1);
            </script>
          <?exit;}
          if($pwd != $pwd_con){?>
            <script>
              alert('비밀번호를 확인해주세요.');
              history.go(-1)
            </script><?
            exit;}

          $con = mysqli_connect("localhost",'root','apmsetup','ssong');
          $query = "UPDATE person_join SET
          password='$pwd',hintans='$hintans',address='$addr',phonenumber1='$phonenumber1',phonenumber2='$phonenumber2',phonenumber3='$phonenumber3',email='$email',account1='$account1',account2='$account2'
           WHERE id='$id'";
          $result = mysqli_query($con,$query);
          echo("<script>location.replace('mypage.php');</script>");
        ?>
  </body>
</html>
