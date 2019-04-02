<?session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
  </head>
  <body>
    <?
    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['username']);

    echo("
    <script>
    location.href = '../main.php';
    </script>
    ");
    ?>

  </body>
</html>
