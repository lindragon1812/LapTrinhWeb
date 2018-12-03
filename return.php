<?php 
	session_start();
	$name = $_SESSION['userid'];
	$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
	mysqli_set_charset($connect,'UTF8');
	$result = mysqli_query($connect,"SELECT idStudent, fullname FROM student");
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Quản Lý Thư viện
	</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/borrow_sv.css">
</head>
<body>
	<div>
		<?php include("header.inc") ?>
		<div id="mainpage">
			<div>
			<form method="POST" id="myForm">
			<h1> Trả Sách</h1>
			<p> Hãy chọn tên sinh viên muốn trả sách</p>
			<select name="select_sv" id="1">
					<option value=""></option>
					<?php while ($row = mysqli_fetch_assoc($result)): ?>
					<option value="<?php echo $row['idStudent'] ?>"> <?php echo $row['idStudent']." - " ?> <?php echo $row['fullname'] ?> </option>
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
			window.alert("HÃY CHỌN SINH VIÊN");
		}
		else{
			document.getElementById("myForm").submit();
		}
	}


</script>
<?php 
	if(isset($_POST['select_sv'])){
		$id = $_POST['select_sv'];
		$_SESSION['test']=$id;
		header("Location:return_table.php");
	}

 ?>