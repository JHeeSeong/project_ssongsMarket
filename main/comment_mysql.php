<? session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ssongssong</title>
    <style>
    </style>
  </head>
  <body>
    <?
    $comment = $_POST['comment'];

    if(!$comment){?>
      <script>
        alert("내용을 입력하세요.");
        history.go(-1);
      </script>
    <?exit;}

    if(!isset($_SESSION['userid'])){?>
      <script>
        alert("회원님이 쓰신 글만 보실 수 있습니다.");
        history.go(-1);
      </script>
    <?exit;}

    $comment = $_POST['comment'];
    $writer = $_POST['writer'];
    $number = $_POST['number'];

    $con = mysqli_connect("localhost",'root','apmsetup','ssong');
    $query = "select * from comment";
    $result = mysqli_query($con,$query);
    $query = "insert into comment(number,writer,contents,date) values($number,'$writer','$comment',now())";
    $result = mysqli_query($con,$query);

    //echo("<script>location.replace('pro_list1.php?page=1&list=10');</script>");
    ?>
    <script>
      history.go(-1);
    </script>
  </body>
  </html>
