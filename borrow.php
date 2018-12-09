<?php 
	session_start();
	$name = $_SESSION['userid'];
	$id = $_SESSION['test'];
	$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
	mysqli_set_charset($connect,'UTF8');
	$result = mysqli_query($connect,"SELECT idBook,title FROM book");
	$nameSt = mysqli_query($connect,"SELECT * FROM student WHERE idStudent = '$id'");
	$rs = mysqli_fetch_assoc($nameSt);
	$name1 = $rs['fullname'];
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Mượn sách
	</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/borrow_sv.css">
</head>
<body>
	<div>
		<?php include("topside.inc") ?>
		<div id="mainpage">
			<div>
			<form method="POST" id="myForm" >
			<h1> Mượn Sách</h1>
			<p> Hãy chọn sách để mượn </p>
			<select name="select_book" id="1">
					<option value=""></option>
					<?php while ($row = mysqli_fetch_assoc($result)): ?>
					<option value="<?php echo $row['idBook'] ?>"> <?php echo $row['idBook']." - " ?> <?php echo $row['title'] ?> </option>
					<?php endwhile; ?>	
			</select>
			<input type="button" name="sub" value="Xác nhận" onclick="cl()">
			</form>
			</div>
		</div>

	</div>

</body>
</html>
<script type="text/javascript">
	function cl(){
		var select = document.getElementById("1").value;
		if (select == "") {
			window.alert("HÃY CHỌN SÁCH");
		}
		else{
			<?php 
				$currentDate = date("Y-m-d");

				$dueDate = date("Y-m-d", strtotime( "$currentDate + 7 day" ));
				
			 ?>
			var result =  confirm("Mượn Sách : \n"+"Sinh Viên: "+"<?php echo $id ?>"+" - <?php echo $name1 ?>"+"\n"+"Sách : "+select+"\n"+"Ngày mượn : "+"<?php echo $currentDate ?>"+"\n"+"Hạn trả : "+"<?php echo $dueDate ?>");
			if(result){
			document.getElementById("myForm").submit();
			}
		}
	}


</script>
<?php 
	if(isset($_POST['select_book'])){
		$idbook = $_POST['select_book'];
		$currentDate = date("Y-m-d");
		$dueDate = date("Y-m-d", strtotime( "$currentDate + 7 day" ));

		mysqli_query($connect,"INSERT INTO `borrowing` (`idBorrow`, `idStudent`, `idBook`, `borrowDate`, `dueDate`, `returnDate`, `punish`) VALUES (NULL, '$id', '$idbook', '$currentDate', '$dueDate' , NULL, 0);");
		header("Location:borrow_sv.php");
			
	}

 ?>