<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>회원가입DB</title>
  </head>
  <body>
      <?
      $id = $_POST['member_id'];
      $pwd = $_POST['pwd'];
      $user_passwd_confirm = $_POST['user_passwd_confirm'];
      $hintqz = $_POST['hint'];
      $hintans = $_POST['hintans'];
      $name = $_POST['name'];
      $addr = $_POST['addr'];
      $phonenumber1 = $_POST['mobile'];
      $phonenumber2 = $_POST['mobile2'];
      $phonenumber3 = $_POST['mobile3'];
      $email = $_POST['email'];
      $account1 = $_POST['account1'];
      $account2 = $_POST['account2'];
      if(!$id) {?>
        <script>
          alert("아이디를 입력하세요.");
          history.go(-1)
        </script>
      <?exit;}
      if(!$pwd) {?>
        <script>
          alert("비밀번호를 입력하세요.");
          history.go(-1)
        </script>
      <?exit;}
      if(!$hintans) {?>
        <script>
          alert("비밀번호 확인 답변을 입력하세요.");
          history.go(-1)
        </script>
      <?exit;}
      if(!$name) {?>
        <script>
          alert("이름을 입력하세요.");
          history.go(-1)
        </script>
      <?exit;}
      if(!$addr) {?>
        <script>
          alert("주소를 입력하세요.");
          history.go(-1)
        </script>
      <?exit;}
      if(!$phonenumber2||!$phonenumber3) {?>
        <script>
          alert("전화번호를 입력하세요.");
          history.go(-1)
        </script>
      <?exit;}
      if(!$email) {?>
        <script>
          alert("이메일을 입력하세요.");
          history.go(-1)
        </script>
      <?exit;}

      $pattern = '/^.*(?=^.{8,18}$)(?=.*\d)(?=.*[a-zA-Z]).*$/';

      $id_con = mysqli_connect("localhost",'root','apmsetup','ssong');
      $id_sql = "SELECT * FROM person_join WHERE id='$id'";
      $id_result = mysqli_query($id_con,$id_sql);
      $id_count = mysqli_num_rows($id_result);

      if($id_count) {?>
           <script>
             alert("아이디가 존재합니다.");
             history.go(-1)
           </script>
         <?exit;}
      if(!(preg_match($pattern ,"$pwd"))) {?>
        <script>
             alert("8~18자, 영문,숫자 필수 입력해주세요.");
             history.go(-1)
           </script>
         <?exit;}
      if(($pwd!=$user_passwd_confirm)) {?>
              <script>
                alert("비밀번호 확인부분을 다시 확인해주세요.");
                history.go(-1)
              </script>
            <?exit;}

      $con = mysqli_connect("localhost",'root','apmsetup','ssong');
      $query = "INSERT INTO person_join (id,password,hintqz,hintans,name,address,phonenumber1,phonenumber2,phonenumber3,email,account1,account2)
              VALUES ('$id','$pwd','$hintqz','$hintans','$name','$addr','$phonenumber1','$phonenumber2','$phonenumber3','$email','$account1','$account2')";
      $result = mysqli_query($con,$query);
      echo("<script>location.replace('login.php');</script>");
      ?>
  </body>
</html>
