<? session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <?
    $writer = $_POST['writer'];
    $contents = $_POST['contents'];

    if($_SESSION['userid']!=$writer){?>
      <script>
        alert("자신의 글만 삭제 가능합니다.");
        history.go(-1);
      </script>
    <?exit;}

    $con = mysqli_connect("localhost",'root','apmsetup','ssong');

    $query = "DELETE FROM comment WHERE writer='$writer' and contents='$contents'";
    $result = mysqli_query($con,$query);
    ?>
    <script>
      history.go(-1);
    </script>
  </body>
</html>
