<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <?
    $con = mysqli_connect("localhost",'root','apmsetup','ssong');
    $number = $_GET['number'];
    $count = $_GET['count'];

    $query = "DELETE FROM buy WHERE number='$number' and count='$count'";
    $result = mysqli_query($con,$query);
    ?>
    <script>
      history.go(-1);
    </script>
  </body>
</html>
