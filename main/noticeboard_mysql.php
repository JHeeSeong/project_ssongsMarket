<? session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
        <?
        $sess_id = $_SESSION['userid'];
          $title = $_POST['subject'];
          $contents = $_POST['contents'];

          $con = mysqli_connect("localhost",'root','apmsetup','ssong');

          $query = "select * from noticeboard";
          $result = mysqli_query($con,$query);
          $number = mysqli_num_rows($result);

          $query = "insert into noticeboard(writer,number,title,contents,date) values('$sess_id',$number+1,'$title','$contents',now())";
          mysqli_query($con,$query);
          echo("<script>location.replace('noticeboard_list.php?page=1&list=10');</script>");
        ?>
  </body>
</html>
