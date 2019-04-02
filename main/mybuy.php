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
            <!--<a href="product_search.php?word=<?echo $word;?>"><img src="search.jpg" alt="search"></a>-->
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
        <center><img src="buy_de.JPG" alt="buy_det"></center><br><br>
        <hr>
        <table>
        <?
        $id = $_GET['id'];
        $number = $_GET['number'];

        $con = mysqli_connect("localhost",'root','apmsetup','ssong');
        $query = "SELECT * FROM buy WHERE number ='$number'";
        $result = mysqli_query($con,$query);

        ?>
        <tr>
          <td width="150"><img src='no.jpg' alt='number'></td>
          <td width="250"><img src='subject.jpg' alt='subject'></td>
          <td width="150"><img src='who.jpg' alt='who'></td>
          <td width="150"><img src='count.jpg' alt='count'></td>
          <td width="150"><img src='date.jpg' alt='date'></td>
        </tr><?
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>".$row['number']."</td>";
          echo "<td>".$row['subject']."</td>";
          echo "<td>"?><a href="mybuy_list.php?number=<?echo $row['number'];?>&id=<?echo $row['id'];?>"><?echo $row['id'];?></a><?"</td>";
          echo "<td>".$row['count']."</td>";
          echo "<td>".$row['date']."</td>";
          echo "</tr>";
        }
        ?>
      </table><br><br><br>
      <p style="float:right;"><a href="mypage.php"><img src="cancelbtn.jpg" alt="취소"/></a></p>
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
