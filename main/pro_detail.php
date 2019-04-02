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
        <form action="pro_revision.php" method="post">
          <?php
          $number = $_GET['number'];
          $list = $_GET['list'];

          $con = mysqli_connect("localhost",'root','apmsetup','ssong');
          $query = "select * from list WHERE number='$number' and list='$list'";
          $result = mysqli_query($con,$query);
          while ($row = mysqli_fetch_array($result)) {
            if ($row['account1']=='1'){
              $bank ="우리은행";
            }
            if ($row['account1']=='2'){
              $bank ="국민은행";
            }
            if ($row['account1']=='3'){
              $bank ="하나은행";
            }
            if ($row['account1']=='4'){
              $bank ="농협";
            }
            if ($row['account1']=='5'){
              $bank ="신한";
            }
            ?>
            <table>
              <tr>
                <td colspan="2"><img src="images/<?echo $row['image'].'.'.$row['ext'];?>"  alt="image"></td></tr>
                <tr><td><img src="subject.jpg"  alt="subject"></td> <td> <?echo $row['subject'];?></td></tr>
                <tr><td><img src="price.jpg"  alt="price"></td> <td> <?echo $row['price'];?></td></tr>
                <tr><td><img src="contents.jpg"  alt="contents"></td> <td> <?echo $row['contents'];?></td></tr>
                <tr><td><img src="writer.jpg"  alt="writer"></td> <td> <?echo $row['writer'];?></td></tr>
                <tr><td><img src="account.jpg"  alt="account"></td> <td> <?echo $bank.'-'.$row['account2'];?></td></tr>
                <input type="hidden" name="number" value="<?echo $row['number'];?>">
              </tr>
            </table>
            <?
            echo "<br>";
            if($_SESSION['userid']==$row['writer']){?>
              <input type="image" src="modify_btn.jpg" name="revision" value="revision">
            </form>
            <form action="pro_delete.php" method="post">
              <input type="hidden" name="number" value="<?echo $number;?>">
              <input type="image" src="delete_btn.jpg" name="delete" value="delete">
            </form>
            <?}?>
            <a href="buy.php?number=<?echo $number;?>&list=<?echo $list;?>"><img src="buy_btn.jpg" alt="buy"></a>
            <hr>

            <form action="comment_mysql.php" method="post">
              <textarea name="comment" rows="3" cols="50"></textarea>
              <input type="image" src="ok.jpg" name="ok">
              <input type="hidden" name="writer" value="<?echo $_SESSION['userid'];?>">
              <input type="hidden" name="number" value="<?echo $number;?>">
            </form>

            <?
            $con_ = mysqli_connect("localhost",'root','apmsetup','ssong');
            $query_ = "select * from comment WHERE number='$number'";
            $result_ = mysqli_query($con_,$query_);
            ?>

            <!--댓글기능-->
            <form action="comment_delete.php" method="post">
              <table>
                <tr>
                  <td width="100"><img src="writer.jpg"  alt="writer"></td>
                  <td width="170"><img src="contents.jpg"  alt="contents"></td>
                  <td width="100"><img src="date.jpg"  alt="date"></td>
                </tr><br>
                <?
                while ($row = mysqli_fetch_array($result_)) {
                  ?>
                  <tr>
                    <td><?echo $row['writer'];?></td>
                    <td><?echo $row['contents'];?></td>
                    <td><?echo $row['date'];?></td>
                    <td><input type="image" name="x" src="x.jpg"></td>
                    <input type="hidden" name="writer" value="<?echo $row['writer'];?>">
                    <input type="hidden" name="contents" value="<?echo $row['contents'];?>">
                  </tr>
                <?}?>
              </table>
            </form>
          <?}?>
      </div>


      <!--카테고리-->
      <div class="sidebar">
        <aside>
          <section>
            <ul>
              <a href="pro_list1.php?page=1&list=10"><img src="lcd.jpg" alt="lcd"></a><br>
              <a href="pro_list2.php?page=1&list=10"><img src="led.jpg" alt="led"></a><br>
              <a href="pro_list3.php?page=1&list=10"><img src="pcb.jpg" alt="pcb"></a><br>
              <a href="pro_list4.php?page=1&list=10"><img src="battery.jpg" alt="battery"></a><br>
              <a href="pro_list5.php?page=1&list=10"><img src="connector.jpg" alt="connector"></a><br>
              <a href="pro_list6.php?page=1&list=10"><img src="swtich.jpg" alt="switch"></a><br><br>
              <a href="noticeboard_list.php?page=1&list=10"><img src="qna.jpg" alt="QnA"></a>
            </ul>
          </section>
        </aside>
      </div>
    </body>
    </html>
