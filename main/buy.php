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
    .tab{border-top: 1px solid #444444; border-collapse: collapse;}
    .td{border-bottom: 1px solid #444444;padding: 5px;}
    </style>

  </head>

  <body>
    <?
    if(!isset($_SESSION['userid'])||!isset($_SESSION['username'])){?>
      <script>
        alert("로그인후 사용가능합니다.");
        history.go(-1)
      </script>
    <?exit;}?>
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
        <form action="buy_done.php" method="post">
          <br>
        <table class="tab">
        <?
        $list = $_GET['list'];
        $number = $_GET['number'];
        $con = mysqli_connect("localhost",'root','apmsetup','ssong');
        $query = "SELECT * FROM list WHERE list='$list' AND number='$number'";
        $result = mysqli_query($con,$query);
        ?>
        <tr>
          <td class="td" width="150" height="10px"><img src='no.jpg' alt='no'></td>
          <td class="td" width="150" height="10px"><img src='subject.jpg' alt='subject'></td>
          <td class="td" width="150" height="10px"><img src='price.jpg' alt='price'></td>
          <td class="td" width="50" height="10px"><img src='count.jpg' alt='count'></td>
        </tr><?
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td class='td'>".$row['number']."</td>";
          echo "<td class='td'>".$row['subject']."</td>";
          echo "<td class='td'>".$row['price']."</td>";
          echo "<td class='td'>"."<input type='text' size='5' value='1' name='count' style='border-color:#888888; border-left:none;border-right:none;border-top:none'>"."</td>";
          echo "</tr>";
        }
        ?>
      </table><br><hr><br>
          <img src="orderperson.jpg" alt="orderperson">
        <table>
        <?php
        $sess_id = $_SESSION['userid'];
        $con = mysqli_connect("localhost",'root','apmsetup','ssong');
        $query = "SELECT * FROM person_join WHERE id='$sess_id'";
        $result = mysqli_query($con,$query);

        while ($row = mysqli_fetch_array($result)) {?>
          <input type="hidden" name="id" value="<?echo $row['id'];?>">
        <tr>
          <th><img src="name.jpg" alt="name"/></th>
          <td><input name="name" type="text" value="<?echo $row['name'];?>"/></td>
        </tr>
        <tr>
          <th><img src="address.jpg" alt="address"/></th>
          <td><input name="address" type="text" value="<?echo $row['address'];?>"/></td>
        </tr>
        <tr>
          <th><img src="number.jpg" alt="number"/></th>
          <td>
            <input size="4" name="number1" type="text" value="<?echo $row['phonenumber1'];?>"/> -
            <input size="4" name="number2" type="text" value="<?echo $row['phonenumber2'];?>"/> -
            <input size="4" name="number3" type="text" value="<?echo $row['phonenumber3'];?>"/>
          </td>
        </tr>
        <tr>
          <th><img src="email.jpg" alt="email"/></th>
          <td><input name="email" type="text" value="<?echo $row['email'];?>"/></td>
        </tr>
      <?}?>
      </table>
      <br><hr><br>
      <img src="sellperson.jpg" alt="sellperson">
      <table>
      <?
      $number = $_GET['number'];
      $list = $_GET['list'];
      $con_pro = mysqli_connect("localhost",'root','apmsetup','ssong');
      $query_pro = "SELECT * FROM list WHERE number='$number' AND list='$list'";
      $result_pro = mysqli_query($con_pro,$query_pro);

      while ($row_pro = mysqli_fetch_array($result_pro)) {?>
        <tr><td><img src="subject.jpg" alt="subject"></td>
        <td><input readonly type="text" name="subject" value="<?echo $row_pro['subject'];?>"></td></tr>
        <tr><td><img src="price.jpg" alt="price"></td>
        <td><input readonly type="text" name="price" value="<?echo $row_pro['price'];?>"></td></tr>
        <tr><td><img src="writer.jpg" alt="writer"></td>
        <td><input readonly type="text" name="writer" value="<?echo $row_pro['writer'];?>"></td></tr>
        <tr><td><img src="account.jpg" alt="account"></td>
          <?
          if($row_pro['account1']=='1'){$account_name="우리은행";}
          if($row_pro['account1']=='2'){$account_name="국민은행";}
          if($row_pro['account1']=='3'){$account_name="하나은행";}
          if($row_pro['account1']=='4'){$account_name="농협";}
          if($row_pro['account1']=='5'){$account_name="신한은행";}
          ?>
        <td><input readonly type="text" name="account1" value="<?echo $account_name;?>"></td>
        <td><input readonly type="text" name="account2" value="<?echo $row_pro['account2'];?>"></td></tr>
        <tr>
          <input type="hidden" name="number" value="<?echo $row_pro['number'];?>">
          <input type="hidden" name="subject" value="<?echo $row_pro['subject'];?>">
          <input type="hidden" name="price" value="<?echo $row_pro['price'];?>">
          <input type="hidden" name="writer" value="<?echo $row_pro['writer'];?>">
        </tr>
        <?}?>
      </table>
        <p><input type="image" src="ok.jpg" name="ok" value="ok"></p>
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
