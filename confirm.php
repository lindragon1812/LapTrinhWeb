<?php 
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
mysqli_set_charset($connect,'UTF8');
$id = $_POST['id'];
$dueDate = $_POST['dueDate'];
$returnDate = $_POST['returnDate'];
$lateDate = $_POST['lateDate'];
$lost = $_POST['lost'];
echo $lost;

$id_student = $_POST['id_student'];
$id_book = $_POST['id_book'];
$borrow_date = $_POST['borrow_date'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		

	</title>
</head>
<body>
	
</body>
</html>


<?php 
if(isset($_POST['submit1'])){
	mysqli_query($connect, "UPDATE borrowing SET returnDate = '$returnDate', punish = '$lateInt' where idBorrow='$id'");
	echo "<script>window.close();</script>";
}
?>