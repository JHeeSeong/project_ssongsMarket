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
    .text{border:none;border-right:0px; border-top:0px; boder-left:0px; boder-bottom:0px;}
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

      <!--게시판_자세히-->
      <div class="container">
      <div class="content">
        <center><img src="qna_det.jpg" alt="qna"></center><br><br>
        <form action="noticeboard_revision.php" method="post">
          <?
          $con = mysqli_connect("localhost",'root','apmsetup','ssong');
          $number= $_GET['number'];
          $writer = $_SESSION['userid'];
          $result = mysqli_query($con,"SELECT * FROM noticeboard WHERE number='$number'");

          while ($row = mysqli_fetch_array($result)) {
            ?>
            <hr>
            <table>
              <tr><td width=200><img src="date.jpg"  alt="date"></td>
                <td><input class="text" type="text" readonly name="date" value="<?echo $row['date'];?>"></td></tr>
              <tr><td><img src="no.jpg"  alt="number"></td>
                <td><input class="text" type="text" readonly name="number" value="<?echo $row['number'];?>"></a></td></tr>
              <tr><td><img src="writer.jpg"  alt="writer"></td>
                <td><input class="text" type="text" readonly name="writer" value="<?echo $row['writer'];?>"></a></td></tr>
              <tr><td><img src="subject.jpg"  alt="subject"></td>
                <td><input class="text" type="text" name="subject" value="<?echo $row['title'];?>"></a></td></tr>

              <tr><td><img src="contents.jpg"  alt="contents"></td>
                <td><input class="text" type="text" name="contents" value="<?echo $row['contents'];?>"></td></tr>
            </table>
          <?
        }
        ?><br>
        <input style="float:right;" type="image" src="modify_btn.jpg" name="revision" value="revision">
      </form>
      <form action="noticeboard_delete.php" method="post">
        <input type="hidden" name="number" value="<?echo $number;?>">
        <input style="float:right;" type="image" src="delete_btn.jpg" name="delete" value="delete">
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
