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

    <!--회원가입-->
    <div class="container">
      <div class="content">
        <form action="join_mysql.php" method="post">
          <table>
            <tr>
              <th><img src="id.jpg" alt="아이디"/><img src="필수.jpg" alt="필수"/></th>
              <td><input name="member_id" type="text"/></td>
            </tr>
            <tr>
              <th><img src="password.jpg" alt="비밀번호"/><img src="필수.jpg" alt="필수"/></th>
              <td><input name="pwd" type="password"/> (8~18자, 영문,숫자 필수 입력)</td>
            </tr>
            <tr>
              <th><img src="passwordok.jpg" alt="비밀번호 확인"/><img src="필수.jpg" alt="필수"/></th>
              <td><input name="user_passwd_confirm" type="password"/></td>
            </tr>
            <tr>
              <th><img src="passwordqz.jpg" alt="비밀번호 확인 질문"/><img src="필수.jpg" alt="필수"/></th>
              <td><select name="hint">
                <option value="q1">기억에 남는 추억의 장소는?</option>
                <option value="q2">자신의 인생 좌우명은?</option>
                <option value="q3">자신의 보물 제1호는?</option></select>
              </td>
            </tr>
            <tr>
              <th><img src="passwordans.jpg" alt="비밀번호 확인 답변"/><img src="필수.jpg" alt="필수"/></th>
              <td><input name="hintans" type="text"/></td>
            </tr>
            <tr>
              <th scope="row"><img src="name.jpg" alt="이름"/><img src="필수.jpg" alt="필수"/></th>
              <td><input name="name" type="text"/></td>
            </tr>
            <tr>
              <th><img src="address.jpg" alt="주소"/><img src="필수.jpg" alt="필수"/></th>
              <td>
                <input name="addr" type="text" size="70"/>
              </td>
            </tr>
            <tr>
             <th><img src="phonenumber.jpg" alt="휴대전화"/><img src="필수.jpg" alt="필수"/></th>
             <td><select name="mobile">
             <option value="010">010</option>
             <option value="011">011</option>
             <option value="016">016</option>
             <option value="017">017</option>
             <option value="018">018</option>
             <option value="019">019</option>
           </select> - <input name="mobile2" size="4" maxlength="4" type="text"  /> - <input size="4" name="mobile3" maxlength="4" type="text"  /></td>
           </tr>
           <tr>
              <th scope="row"><img src="email.jpg" alt="이메일"/><img src="필수.jpg" alt="필수"/></th>
              <td><input name="email" type="text"/></td>
            </tr>
            <tr>
               <th scope="row"><img src="account.jpg" alt="계좌"/></th>
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

          <p class="btn">
            <input type="image" src="registerbtn.jpg" name="register" value="register">
            <!--<td colspan="2"><a href="join_mysql.php?member_id"><img src="registerbutton.jpg" alt="회원가입"/></a>-->
            <a href="main.php"><img src="cancelbtn.jpg" alt="회원가입취소"/></a>
          </p>

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
