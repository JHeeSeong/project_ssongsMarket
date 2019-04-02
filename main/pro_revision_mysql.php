<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
        <?
          $title = $_POST['subject'];
          $contents = $_POST['contents'];
          $price= $_POST['price'];
          $number = $_POST['number'];
          $name = $_FILES['upload_file']['name'];
          $ext = array_pop(explode('.', $name));

          $count = strlen($ext);
          $total_count = strlen($name);
          $rel_name = substr($name,0,$total_count-$count-1);
          $ext_name = substr($name,-$count);

          $con = mysqli_connect("localhost",'root','apmsetup','ssong');

          $query = "UPDATE list SET subject='$title',contents='$contents',price='$price' ,image='$rel_name',ext='$ext_name' WHERE number='$number'";
          $result = mysqli_query($con,$query);
          //echo("<script>location.replace('pro_list1.php');</script>");
        ?>
        <script>
          history.go(-2);
        </script>
  </body>
</html>
