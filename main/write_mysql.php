<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $list =  $_POST['list'];

    $con = mysqli_connect("localhost",'root','apmsetup','ssong');
    $query = "select * from list";
    $result = mysqli_query($con,$query);
    $number = mysqli_num_rows($result);

    // 설정
    $uploads_dir = './images';
    $allowed_ext = array('JPG','jpeg','png','gif');

    // 변수 정리
    $writer = $_POST['writer'];
    $subject = $_POST['subject'];
    $price = $_POST['price'];
    $contents = $_POST['summary'];
    $error = $_FILES['upload_file']['error'];
    $name = $_FILES['upload_file']['name'];
    $account1 = $_POST['account1'];
    $account2 = $_POST['account2'];
    $ext = array_pop(explode('.', $name));

    move_uploaded_file( $_FILES['upload_file']['tmp_name'], "$uploads_dir/$name");

    $count = strlen($ext);
    $total_count = strlen($name);
    $rel_name = substr($name,0,$total_count-$count-1);
    $ext_name = substr($name,-$count);

    $query = "insert into list(writer,list,number,subject,price,contents,image,ext,account1,account2)
    values('$writer','$list',$number+1,'$subject','$price','$contents','$rel_name','$ext_name','$account1','$account2')";
    $result = mysqli_query($con,$query);
    //echo("<script>location.replace('pro_list1.php?page=1&list=10');</script>");
      ?>
      <script>
        history.go(-2);
      </script>
  </body>
</html>
