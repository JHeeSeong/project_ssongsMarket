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


    <div class="container">
      <div class="content">
        <center>
        <table>
          <tr>
            <td width=100><img src="no.jpg"  alt="number"></a></td>
            <td width=300><img src="subject.jpg"  alt="subject"></a></td>
            <td width=200><img src="writer.jpg"  alt="writer"></a></td>
            <td width=150><img src="date.jpg"  alt="date"></a></td>
          </tr>
          <hr>
          <?
          $con = mysqli_connect("localhost",'root','apmsetup','ssong');
          $type = $_GET['search_type'];
          $search =  $_GET['search'];

          if(!$search){?>
            <script>
              alert("검색을 다시하세요.");
              history.go(-1)
            </script>
          <?exit;}

          $query = mysqli_query($con,"select * from noticeboard where title LIKE '%$search%'");
          $pageNum = ($_GET['pages']) ? $_GET['pages'] : 1;//현재페이지
          $list = ($_GET['lists']) ? $_GET['lists'] : 10;//한페이지에 나타낼 게시글 수
          $number = mysqli_num_rows($query);//총게시글수
          $first_page = ((($pageNum-1)*$list));

          $list_block = 10;//한페이지에 나타낼 게시글 수

          $block = ceil($pageNum/$list_block);//1~10페이지까지 1블럭 11~20페이지까지 2
          $total_page = ceil( $number / $list );//전체몇페이지
          $b_start_page = ( ($block - 1) * $list_block ) + 1;//현재 블럭에서 시작페이지 번호
          $b_end_page = $b_start_page + $list_block - 1;//현재 블럭에서 마지막 페이지 번호

          if ($b_end_page > $total_page)
            $b_end_page = $total_page;

          if(strlen($search)>0){
            switch (($type)) {
              case "subject":
                $result = "select * from noticeboard where title LIKE '%$search%' order by number desc limit $first_page,$list";
                $result_search = mysqli_query($con,$result);
              break;
              case "writer":
                $result = "select * from noticeboard where writer LIKE '%$search%' order by number desc limit $first_page,$list";
                $result_search = mysqli_query($con,$result);
              break;
            }
          }

          while ($row = mysqli_fetch_array($result_search)) {
            echo "<tr>";
            echo "<td>".$row['number']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['writer']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<tr>";
          }
          ?>
          </table></center><br><br>
          <table>
            <tr>
              <td width=100></td>
              <td width=300></td>
              <td width=200></td>
              <td width=150></td>
              <td><a href="main.php"><img src="cancel.JPG" alt="cancel"></td>
              </tr>
          </table>

          <!--페이징-->
          <center><?
          if($pageNum>=2){?>
            <a href="noticeboard_search.php?pages=<?=$b_start_page?>&lists=<?=$list?>&search_type=<?echo $type;?>&search=<?echo $search;?>"><img src="first.jpg" alt="first"></a>
            <a href="noticeboard_search.php?pages=<?=$pageNum-1?>&lists=<?=$list?>&search_type=<?echo $type;?>&search=<?echo $search;?>"><img src="prev.jpg" alt="prev"></a>
            <?}
          for($j = $b_start_page; $j <=$b_end_page; $j++){
            if($pageNum == $j){?>
              <?=$j?>
              <?}else{?>
                <font size=2><a href="noticeboard_search.php?pages=<?=$j?>&lists=<?=$list?>&search_type=<?echo $type;?>&search=<?echo $search;?>"><?=$j?></a></font><?}
          }
          if($pageNum<$b_end_page){?>
            <a href="noticeboard_search.php?pages=<?=$pageNum+1?>&lists=<?=$list?>&search_type=<?echo $type;?>&search=<?echo $search;?>"><img src="next.jpg" alt="next"></a>
            <a href="noticeboard_search.php?pages=<?=$b_end_page?>&lists=<?=$list?>&search_type=<?echo $type;?>&search=<?echo $search;?>"><img src="last.jpg" alt="last"></a>
            <?}?></center>
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
