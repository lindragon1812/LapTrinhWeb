<?php 
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
mysqli_set_charset($connect,'UTF8');
$id = $_POST['id'];
$dueDate = $_POST['dueDate'];
$returnDate = $_POST['returnDate'];
$lateDate = $_POST['lateDate'];
$lost = $_POST['lost'];


$id_student = $_POST['id_student'];
$id_book = $_POST['id_book'];
$borrow_date = $_POST['borrow_date'];
$result = mysqli_query($connect,"SELECT fullname FROM student WHERE idStudent = '$id_student'");
$name_student = mysqli_fetch_assoc($result);
$result = mysqli_query($connect,"SELECT title,cost FROM book WHERE idBook = '$id_book'");
$name_book = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		

	</title>
	<link rel="stylesheet" type="text/css" href="css/confirm.css">
</head>
<body>
	<form method="POST" id="myForm" action="confirm.php">
		<p> Đã hoàn trả sách với thông tin sau : </p>
		<p> Sinh viên <?php echo $id_student ?> - <?php echo $name_student['fullname'] ?> </p> 
		<p> Sách mượn <?php echo $id_book ?> - <?php echo $name_book['title'] ?> </p>
		<p> Ngày mượn <?php echo $borrow_date ?></p>
		<p> Hạn trả <?php echo $dueDate ?> </p>
		<p> Ngày trả <?php echo $returnDate ?> </p>
		<?php 

		$lost_pun = 0;
		if($lost == "1"){
			$lost_pun = intval($name_book['cost'])/2;
		}
		if ($lost == "2") {
			$lost_pun = intval($name_book['cost']);
		}

		$lateInt = intval($lateDate)*1000+$lost_pun;
		?>
		<p> Phạt <?php echo $lateInt ?></p>
		<input type="submit" name="submit1" value="Xác nhận">
		
	</form>
</body>
</html>
<script type="text/javascript">
	

</script>
<?php 
if(isset($_POST['submit'])){
	mysqli_query($connect, "UPDATE borrowing SET returnDate = '$returnDate', punish = '$lateInt' where idBorrow='$id'");
	mysqli_query($connect,"UPDATE book SET copies = copies +1 WHERE idBook = '$id_book'");
	//echo "<script>window.close();</script>";
}
?>