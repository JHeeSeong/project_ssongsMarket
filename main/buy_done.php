<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ssongssong</title>
    <style>
      .sidebar{width:300px;height:400px;float:left;}
      .content{width:660px;height:300px;float:right;}
      .container{width:960px;}
      .mypage{float: right;}
      .signup{float: right;}
      .login{float: right;}
      .search{float: left;float: right;}
      .table{background-repeat: repeat-x;}
    </style>
  </head>
  <body>
    <!--상단바-->
    <div class ="header">
      <header>
      <a href="main.php" target="_self"><img src="ssong.JPG" alt="ssong"/></a>
      <a href="mypage.php" class="mypage"><img src="mypage.JPG" alt="마이쇼핑"/></a>
      <a href="login.php" class="login"><img src="signin.JPG" alt="로그인"/></a>
      <a href="join.php" class="signup"><img src="signup.JPG" alt="회원가입"/></a>

      <!--검색기능-->
      <form action="product_search.php" method="post" class="search">
        <input name="word" type="text"/>
        <input type="submit" value="search" alt="검색"/>
        <!--<a href="product_search.php?word=<?echo $word;?>"><img src="search.jpg" alt="search"></a>-->
      </form>
    </header>
    <hr>
    </div>


    <!--상품-->
    <div class="container">
      <div class="content">
        <?
        $number = $_POST['number'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $price = $_POST['price'];
        $count = $_POST['count'];

        $con = mysqli_connect("localhost",'root','apmsetup','ssong');
        $query = "insert into buy(number,id,name,subject,price,date,count) values('$number','$id','$name','$subject','$price',now(),$count)";
        $result = mysqli_query($con,$query);
        //echo("<script>location.replace('main.php');</script>");
        ?>
        <script>
          history.go(-2);
        </script>
      </div>

      <!--카테고리-->
      <div class="sidebar">
        <aside>
          <section>
            <ul>
              <a href="pro_list1.php?page=1&list=10"><img src="전자제품.jpg" alt="next"></a><br>
              <a href="pro_list2.php?page=1&list=10"><img src="ledlcdpcb.jpg" alt="next"></a><br>
              <a href="pro_list3.php?page=1&list=10"><img src="배터리커넥터스위치.jpg" alt="next"></a><br>
              <a href="noticeboard_list.php?page=1&list=10"><img src="QnA.jpg" alt="QnA"></a>
            </ul>
          </section>
        </aside>
      </div>
    </div>
  </body>
  </html>
