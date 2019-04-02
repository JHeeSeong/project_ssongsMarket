<? session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ssong's market</title>

    <style>
    body{
      margin-left: 80px;
      margin-top: 50px;
      margin-right: 80px;
      margin-bottom: 50px;
    }
    .header{height:130px;}
    .sidebar{width:300px;height:400px;float:left;}
    .content{width:800px;height:300px;float:right;}
    .container{width:1200px;}
    .search{float: left;float: right;}
    .topbar{float: right;}
    .paging{float: left;}
    </style>

  </head>

  <body>
    <?if($_SESSION['userid']){?>
      <!--상단바-->
      <div class ="header">
        <header>
          <!--로고-->
          <a href="main.php" target="_self"><img src="ssong.JPG" alt="ssong"/></a>

          <!--검색기능-->
          <form action="product_search.php?list=10&page=1" method="get" class="search">
            <input name="word" type="text" size="15" style="border-color:#888888; border-left:none;border-right:none;border-top:none"/>
            <input type="image" src="search2.jpg" alt="검색"/>
          </form>
          <a href="logout.php" class="topbar"><img src="signout.JPG" alt="logout"/></a>
          <a href="mypage.php" class="topbar"><img src="mypage.JPG" alt="mypage"/></a>
        </header>
        <hr>
      </div>
      <?}else{?>
      <!--상단바-->
      <div class ="header">
        <header>
          <!--로고-->
          <a href="main.php" target="_self"><img src="ssong.JPG" alt="ssong"/></a>

          <!--검색기능-->
          <form action="product_search.php" method="get" class="search">
            <input type="hidden" name="pages" value="1">
            <input type="hidden" name="list" value="1">
            <input name="word" type="text" size="15" style="border-color:#888888; border-left:none;border-right:none;border-top:none"/>
            <input type="image" src="search2.jpg" alt="검색"/>
          </form>

          <a href="login.php" class="topbar"><img src="signin.JPG" alt="로그인"/></a>
          <a href="join.php" class="topbar"><img src="sign_up.JPG" alt="회원가입"/></a>
        </header>
        <hr>
      </div>
      <?}?>

      <!--상품-->
      <div class="container">
        <div class="content">
          <?
    $id = $_POST['id'];
    $name = $_POST['name'];
    $hintqz = $_POST['hint'];
    $hintans = $_POST['ans'];

    $con = mysqli_connect("localhost",'root','apmsetup','ssong');
    $query = "SELECT * FROM person_join WHERE id='$id' and hintqz='$hintqz' and hintans='$hintans' and name='$name'";
    $result = mysqli_query($con,$query);

    if(!$id){?>
      <script>
      alert("아이디를 입력하지 않으셨습니다.");
      history.go(-1);
      </script>
    <?exit;}
    if(!$name){?>
      <script>
      alert("이름을 입력하지 않으셨습니다.");
      history.go(-1);
      </script>
    <?exit;}
    if(!$hintans){?>
      <script>
      alert("힌트에 대한 답변을 하지 않으셨습니다.");
      history.go(-1);
      </script>
    <?exit;}

    $num_match = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if(!$num_match) {?>
      <script>
      alert("잘못 입력하셨습니다.");
      history.go(-1);
      </script>
    <?exit;}
    else {
      ?><font size="5">비밀번호는 <font size=5 color="blue"><b>[ <?
      echo $row['password'];?> ]</b> </font><font size="5">입니다.</font><?
    }
    ?><br><br>
    <a href="login.php"><img src="loginbutton.JPG" alt="로그인"/></a>
  </div>
    </div>

    <!--카테고리-->
    <div class="sidebar">
      <aside>
        <section>
          <ul>
            <a href="pro_list1.php?page=1&list=10"><img src="lcd.jpg" alt="lcd"></a><br>
            <a href="pro_list2.php?page=1&list=10"><img src="led.jpg" alt="led"></a><br>
            <a href="pro_list3.php?page=1&list=10"><img src="pcb.jpg" alt="pcb"></a><br>
            <a href="pro_list2.php?page=1&list=10"><img src="battery.jpg" alt="battery"></a><br>
            <a href="pro_list3.php?page=1&list=10"><img src="connector.jpg" alt="connector"></a><br>
            <a href="pro_list3.php?page=1&list=10"><img src="swtich.jpg" alt="switch"></a><br><br>
            <a href="noticeboard_list.php?page=1&list=10"><img src="qna.jpg" alt="QnA"></a>
          </ul>
        </section>
      </aside>
    </div>
  </body>
  </html>
