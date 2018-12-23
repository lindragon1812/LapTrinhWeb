<?php 
$id = $_GET['id'];
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
mysqli_set_charset($connect,'UTF8');
$result = mysqli_query($connect,"SELECT * FROM borrowing WHERE idBorrow = '$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		

	</title>
	<link rel="stylesheet" type="text/css" href="css/confirm.css">
</head>
<body>
	<form action="finish.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<input type="hidden" name="id_student" value="<?php echo $row['idStudent'] ?>">
		<input type="hidden" name="id_book" value="<?php echo $row['idBook'] ?>">
		<input type="hidden" name="borrow_date" value="<?php echo $row['borrowDate'] ?>">

		<p> Hạn trả : <input type="text" name="dueDate" value="<?php echo $row['dueDate'] ?>"> </p>	
		<?php $currentDate  = date("Y-m-d"); 
		$punish = date_diff(date_create($row['dueDate']), date_create($currentDate)  ); 
		$punish = $punish->format('%R%a');
		
		if(intval($punish) > 0){
			$punish_int = intval($punish);
		}else{ $punish_int =0; }
		?>

		<p> Ngày trả :<input type="text" name="returnDate" value="<?php echo $currentDate ?>"> </p> 
		


		<p> Trễ hạn : <input type="text" name="lateDate" value="<?php echo $punish_int ?>"></p>
		
		<p> Tình trạng hư hại sách sau khi mượn </p>
		
		
		
		
		<input id="hidden_lost" type="radio" name="lost" value="0" checked > Không hư hại <br>
		<input id="dmg" type="radio" name="lost" value="1"> Hư hại <br>
		<input id="lost" type="radio" name="lost" value="2"> Mất sách <br>
		<input type="submit" name="submit" value="Xác nhận">
		<input onclick="self.close()" type="button" id="cancelBtn" value="Hủy">   </input>
	</form>
</body>
</html>
