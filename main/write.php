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
        <form enctype="multipart/form-data" action="write_mysql.php" method="POST">
          <table>
            <tr>
              <td><img src="writer.jpg" alt="글쓴이"></td>
              <td><input type="text" name="writer" value="<?echo $_SESSION['userid'];?>"></td>
            </tr>
            <tr>
              <td><img src="subject.jpg" alt="이름"></td>
              <td><input type="text" name="subject"></td>
            </tr>
            <tr>
              <td><img src="price.jpg" alt="가격"></td>
              <td><input type="text" name="price"></td>
            </tr>
            <tr>
              <td><img src="contents.jpg" alt="contents"></td>
              <td><textarea name="summary"></textarea></td>
            </tr>
            <tr>
              <td><img src="image.jpg" alt="image"></td>
              <td><input type="file" name="upload_file" value="file"></td>
            </tr>
            <tr>
               <th scope="row"><img src="account_.jpg" alt="계좌"/></th>
               <td><select name="account1">
               <option value="1">우리은행</option>
               <option value="2">국민은행</option>
               <option value="3">하나은행</option>
               <option value="4">농협</option>
               <option value="5">신한은행</option>
             </select>
             <input name="account2" type="text"/></td>
            </tr>
          </table>
          <p>
            <input type="image" src="ok.jpg" name="ok" value="ok">
            <a href="main.php"><img src="cancel.jpg" alt="cancel">
          </p>
          <input type="hidden" name="list" value="<?echo $_GET['list'];?>">
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
