<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <?
    $con = mysqli_connect("localhost",'root','apmsetup','ssong');
    $number = $_POST['number'];

    $query = "DELETE FROM list WHERE number='$number'";
    $result = mysqli_query($con,$query);
    //echo("<script>location.replace('main.php');</script>");
    ?>
    <script>
      history.go(-1);
    </script>
  </body>
</html>
