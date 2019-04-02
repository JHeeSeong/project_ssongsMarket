<? session_start(); ?>
<?
$id = $_GET['id'];
$count = $_GET['count'];
$sess_id = $_SESSION['userid'];

echo $id."id<br>";
echo $name."name<br>";
echo $count."count<br>";
echo $sess_id."usid<br>";

$con = mysqli_connect("localhost",'root','apmsetup','ssong');
$query = "UPDATE buy SET count=$count WHERE id='$sess_id' ";
$result = mysqli_query($con,$query);
?>
<script>
  history.go(-1);
</script>
