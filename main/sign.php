<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>결제하기</title>
  </head>
  <body>
    <table>
      <tr>
        <td>이름</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>주소</td>
        <td><input type="text" name="address"></td>
      </tr>
      <tr>
        <td>번호</td>
        <td><select name="number">
          <option value="">선택</option>
          <option value="010">010</option>
          <option value="011">011</option>
          <option value="016">016</option>
        </select>-
        <input type="text" name="number2" size="4">-
        <input type="text" name="number3" size="4">
      </td>
      </tr>
      <tr>
        <td>메일</td>
        <td><input type="text" name="e-mail"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="button" name="sign" value="결제하기"></td>
      </tr>
    </table>
  </body>
</html>
