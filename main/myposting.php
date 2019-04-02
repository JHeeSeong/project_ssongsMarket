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

        <center><img src="myposting_det.jpg" alt="myposting"></center><br><br>
        <hr>
        <table>
          <?
          $writer=$_GET['id'];
          $con = mysqli_connect("localhost",'root','apmsetup','ssong');
          $query = mysqli_query($con,"select * from list WHERE list=5 ");
          $list = $_GET['list'];
          $page = $_GET['page'];
          $number = mysqli_num_rows($query);//총게시글수
          $first_page = ((($page-1)*$list));

          $result = mysqli_query($con,"select * from list WHERE list=5 order by number desc limit $first_page,$list");
          $pageNum = ($_GET['page']) ? $_GET['page'] : 1;//현재페이지
          $list = ($_GET['list']) ? $_GET['list'] : 10;//한페이지에 나타낼 게시글 수
          $list_block = 10;//한페이지에 나타낼 게시글 수

          $block = ceil($pageNum/$list_block);//1~10페이지까지 1블럭 11~20페이지까지 2
          $total_page = ceil( $number / $list );//전체몇페이지
          $b_start_page = ( ($block - 1) * $list_block ) + 1;//현재 블럭에서 시작페이지 번호
          $b_end_page = $b_start_page + $list_block - 1;//현재 블럭에서 마지막 페이지 번호

          if ($b_end_page > $total_page)
            $b_end_page = $total_page;
          ?>

          <tr>
            <td width="150"><img src='no.jpg' alt='number'></td>
            <td width="350"><img src='subject.jpg' alt='subject'></td>
            <td width="150"><img src='writer.jpg' alt='writer'></td>
            <td width="150"><img src='price.jpg' alt='date'></td>
          </tr><?
          while ($row = mysqli_fetch_array($result)) {?>
            <form action="mybuy.php?id=<?echo $writer;?>" method="post"><?
            echo "<tr>";
            echo "<td>".$row['number']."</td>";
            echo "<td>"?><a href="pro_detail.php?number=<?=$row['number']?>&list=<?=$row['list']?>"><?=$row['subject']?></a></td><?
            echo "<td>".$row['writer']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>"?><a href="mybuy.php?number=<?=$row['number']?>&id=<?echo $writer;?>"><img src="details.jpg" alt=""></a></td><?
            echo "</tr>";
          }
          ?>
      </table><br><br><br>
    </form>
    <!--페이징-->
    <p class="paging"><b>
      <font size="3" color="grey" face="Century Schoolbook Bold">
    <center><?
    if($pageNum>=2){?>
      <a href="myposting.php?id=<?echo $writer;?>&page=<?=$b_start_page?>&list=<?=$list?>"><img src="first2.jpg" alt="first"></a>
      <a href="myposting.php?id=<?echo $writer;?>&page=<?=$pageNum-1?>&list=<?=$list?>"><img src="prev2.jpg" alt="prev"></a>
      <?}
    for($j = $b_start_page; $j <=$b_end_page; $j++){
      if($pageNum == $j){?>
        <?=$j?>
      <?}else{?>
          <font size=4><a href="myposting.php?id=<?echo $writer;?>&page=<?=$j?>&list=<?=$list?>"><?=$j?></a></font>
        <?}
    }
    if($pageNum<$b_end_page){?>
      <a href="myposting.php?id=<?echo $writer;?>&page=<?=$pageNum+1?>&list=<?=$list?>"><img src="next2.jpg" alt="next"></a>
      <a href="myposting.php?id=<?echo $writer;?>&page=<?=$b_end_page?>&list=<?=$list?>"><img src="last2.jpg" alt="last"></a>
      <?}?></center>
    </font>
  </b></p>
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
