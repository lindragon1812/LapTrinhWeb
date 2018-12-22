<?php 
	include("verify.php");

	// session_start();
	$name = $_SESSION['userid'];
	$connect = mysqli_connect("localhost","root","","libdb") or die('khong the ket noi');
	$result = mysqli_query($connect,"SELECT COUNT(*) FROM book");
	$book = mysqli_fetch_assoc($result);
	$result = mysqli_query($connect,"SELECT COUNT(*) FROM student");
	$student = mysqli_fetch_assoc($result);
	$result = mysqli_query($connect,"SELECT COUNT(*) FROM borrowing");
	$borrowing = mysqli_fetch_assoc($result);
	$result = mysqli_query($connect,"SELECT COUNT(*) FROM borrowing WHERE returnDate IS NOT NULL ");
	$return = mysqli_fetch_assoc($result);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Quản Lý Thư viện

	</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
<body>
	<div>
		<?php include("topside.inc") ?>
		
		<div id="mainpage">
			<div id="home">
					<div id="home_sv" class="thongke">
						<img src="student.png">
						<p> Sinh viên</p>
						<p> <?php echo $student['COUNT(*)'] ?> </p>
						<h1> Tổng số sinh viên </h1>
					</div>
					<div id="home_sach" class="thongke">
						<img src="book.png">
						<p> Sách </p>
						<p> <?php echo $book['COUNT(*)'] ?> </p>
						<h1> Tổng số sách </h1>
					</div >
					<div  id="home_sachmuon" class="thongke">
						<img src="borrow.png">
						<p> Sách mượn </p>
						<p> <?php echo $borrowing['COUNT(*)'] ?> </p>
						<h1> Tổng số sách đã mượn </h1>
					</div>
					<div  id="home_sachtra" >
						<img src="return.png">
						<p> Sách trả </p>
						<p> <?php echo $return['COUNT(*)'] ?> </p>
						<h1> Tổng số sách đã trả </h1>
						
					</div >
			</div>
			<div id="theme">
				

			</div>

		</div>

	</div>

</body>
</html>