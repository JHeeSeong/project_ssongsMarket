<?
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
  </head>
  <body>
    <?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>
  로그아웃 되었습니다.<br />
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>
  </body>
</html>
