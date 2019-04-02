<? session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=euc-kr"> -->
    <!-- <meta charset="euc-kr"> -->
    <title>ssong's market</title>

    <style>
    body{
      margin-left: 80px;
      margin-top: 50px;
      margin-right: 80px;
      margin-bottom: 50px;
    }
    input{
      padding:5px 0px 5px 5px;
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


    <!--MyPage-->
    <div class="container">
      <div class="content">
        <img src="mypage.JPG" alt="mypage"/><br><br>
        <form action="mypage_modify.php" method="post">
          <?
          $id = $_SESSION['userid'];
          $con = mysqli_connect("localhost",'root','apmsetup','ssong');
          $query = "SELECT * FROM person_join WHERE id = '$id'";
          $result = mysqli_query($con,$query);
          ?>
          <table>
            <?while ($row = mysqli_fetch_array($result)) {?>
            <tr>
              <th><img src="id.jpg" alt="아이디"/></th>
              <td><input readonly name="member_id" type="text" value="<?echo $row['id']?>"/></td>
            </tr>
            <tr>
              <th><img src="password.jpg" alt="비밀번호"/></th>
              <td><input name="pwd" type="password"/></td>
            </tr>
            <tr>
              <th><img src="passwordok.jpg" alt="비밀번호 확인"/></th>
              <td><input name="user_passwd_confirm" type="password"/></td>
            </tr>
            <tr>
              <th><img src="passwordqz.jpg" alt="비밀번호 확인 질문"/></th>
              <?if($row['hintqz']='q1'){
                $passwordqz = "기억에 남는 추억의 장소는?";
              }else if($row['hintqz']='q2'){
                $passwordqz = "자신의 인생 좌우명은?";
              }else if($row['hintqz']='q3'){
                $passwordqz = "자신의 보물 제1호는?";
              } ?>

              <td><input readonly name="passwordqz" size="22" type="text" value="<?echo $passwordqz?>"/></td>
          </tr>
          <tr>
            <th><img src="passwordans.jpg" alt="비밀번호 확인 답변"/></th>
            <td><input name="hintans" type="text" value="<?echo $row['hintans']?>"/></td>
          </tr>
          <tr>
            <th scope="row"><img src="name.jpg" alt="이름"/></th>
            <td><input name="name" readonly type="text" value="<?echo $row['name']?>"/></td>
          </tr>
          <tr>
            <th><img src="address.jpg" alt="주소"/></th>
            <td>
              <input name="addr" type="text" size="50" value="<?echo $row['address']?>"/>
            </td>
          </tr>
          <tr>
           <th><img src="phonenumber.jpg" alt="휴대전화"/></th>
           <td><select name="mobile">
           <option value="010">010</option>
           <option value="011">011</option>
           <option value="016">016</option>
           <option value="017">017</option>
           <option value="018">018</option>
           <option value="019">019</option>
         </select> - <input name="mobile2" size="4" maxlength="4" type="text" value="<?echo $row['phonenumber2']?>"/> - <input name="mobile3" maxlength="4" type="text" size="4" value="<?echo $row['phonenumber3']?>"/></td>
         </tr>
         <tr>
            <th scope="row"><img src="email.jpg" alt="이메일"/></th>
            <td><input name="email" size="30" type="text" value="<?echo $row['email']?>"/></td>
          </tr>
          <tr>
             <th scope="row"><img src="account.jpg" alt="account"/></th>
             <td><select name="account1">
             <option value="1">우리은행</option>
             <option value="2">국민은행</option>
             <option value="3">하나은행</option>
             <option value="4">농협</option>
             <option value="5">신한은행</option>
           </select>
             <input name="account" size="30" type="text" value="<?echo $row['account2']?>"/></td>
           </tr>
        </table><br><br>
          <table>
            <tr>
              <td><a href="orderlist.php?id=<?echo $row['id']?>&name=<?echo $row['name']?>&list=10&page=1"><img src="orderlist_de.jpg" alt="orderlist"/></a></td>
            </tr>
            <tr>
              <td><a href="myposting.php?id=<?echo $row['id']?>&list=10&page=1"><img src="myposting_de.jpg" alt="myposting"/></a></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="image" src ="modify.jpg" name="modify" value="modify"></td>
              <td><a href="main.php"><img src="cancelbtn.jpg" alt="취소"/></a></td>
            </tr>
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
