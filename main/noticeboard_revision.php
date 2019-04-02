<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
        <?
          $title = $_POST['subject'];
          $contents = $_POST['contents'];
          $number= $_POST['number'];

          $con = mysqli_connect("localhost",'root','apmsetup','ssong');

          $query = "UPDATE noticeboard SET title='$title',contents='$contents' WHERE number='$number'";
          $result = mysqli_query($con,$query);
          echo("<script>location.replace('noticeboard_list.php?page=1&list=10');</script>");
        ?>
  </body>
</html>
