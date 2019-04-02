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
          <form action="product_search.php?list=10&page=1" method="get" class="search">
            <input name="word" type="text" size="15" style="border-color:#888888; border-left:none;border-right:none;border-top:none"/>
            <input type="image" src="search2.jpg" alt="검색"/>
            <!--<a href="product_search.php?word=<?echo $word;?>"><img src="search.jpg" alt="search"></a>-->
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
        <form enctype="multipart/form-data" action="pro_revision_mysql.php" method="post">
          <?
          $number = $_POST['number'];

          $con = mysqli_connect("localhost",'root','apmsetup','ssong');
          $result = mysqli_query($con,"SELECT * FROM list WHERE number='$number'");

          while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><img src="subject.jpg"  alt="subject"></a><input type="text" name="subject" value="<?echo $row['subject'];?>"></td><br><br>
              <td><img src="price.jpg"  alt="price"><input type="text" name="price" value="<?echo $row['price'];?>"></td><br><br>
              <td><img src="contents.jpg"  alt="contents"><input type="text" name="contents" value="<?echo $row['contents'];?>"></td><br><br>
              <td><img src="image.jpg"  alt="image"><input type="file" name="upload_file" value="file"></td><br>
              <input type="hidden" name="number" value="<?echo $row['number'];?>">
            </tr>
            <?
          }?><br>
          <input type="image" src="modify_btn.jpg" name="revision" value="revision">
        </form>
      </div>

    <!--카테고리-->
    <div class="sidebar">
      <aside>
        <section>
          <ul>
            <a href="pro_list1.php?page=1&list=10"><img src="lcd.jpg" alt="lcd"></a><br>
            <a href="pro_list1.php?page=1&list=10"><img src="led.jpg" alt="led"></a><br>
            <a href="pro_list1.php?page=1&list=10"><img src="pcb.jpg" alt="pcb"></a><br>
            <a href="pro_list1.php?page=1&list=10"><img src="battery.jpg" alt="battery"></a><br>
            <a href="pro_list2.php?page=1&list=10"><img src="connector.jpg" alt="connector"></a><br>
            <a href="pro_list3.php?page=1&list=10"><img src="swtich.jpg" alt="switch"></a><br><br>
            <a href="noticeboard_list.php?page=1&list=10"><img src="qna.jpg" alt="QnA"></a>
          </ul>
        </section>
      </aside>
    </div>
  </body>
  </html>
