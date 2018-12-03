<?php 

session_start();
$name = $_SESSION['userid'];
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
}
$result = mysqli_query($connect,"SELECT * FROM student WHERE idStudent = '$id'");
mysqli_set_charset($connect,'UTF8');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Sinh viên
	</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
	<div>
		<?php include("header.inc") ?> 
		<div id="mainpage">
			<div id="fix_info">
				<form method="POST" class="fix_form">
					<?php 
					
					while($row = mysqli_fetch_assoc($result)):


						?>	
						<label class="fix_label"> Ảnh </label>
						<input type="file" name="anh" value="<?php echo $row['avatar'] ?>" class="fix_input">
						<label class="fix_label"> Mã Sinh Viên </label>
						<input type="text" name="masv" value="<?php echo $row['idStudent'] ?>" class="fix_input">
						<label class="fix_label"> Họ và têb </label>
						<input type="text" name="hoten" value="<?php echo $row['fullname'] ?>" class="fix_input">
						<label class="fix_label"> Giới tính </label>
						<select name="gt" class="fix_input" >


							<option value="1">Nam</option>
							<option value="0">Nu
							</option>

						</select>
						<label class="fix_label"> Ngày sinh </label>
						<input type="text" name="ngaysinh" value="<?php echo $row['birthday'] ?>" class="fix_input">

						<label class="fix_label"> Ngành </label>
						<select class="fix_input" name="nganh">
							
							<?php 
							$result_dp = mysqli_query($connect,"SELECT * FROM department");
							while ($row1 = mysqli_fetch_assoc($result_dp)):						
								?>
								<option value="<?php echo $row1['idDepartment'] ?>"> <?php echo $row1['nameDepartment'] ?></option>
							<?php endwhile;
							?>	
						</select>
						<input type="submit" name="edit_submit" id="edit_submit">
					<?php endwhile;
					?>	
				</form> 

			</div>

		</div>

	</div>

</body>
</html>
<?php 
if (isset($_POST['edit_submit'])) {
	$idstudent = $_POST['masv'];
	$avatar = $_POST['anh'];
	$fullname = $_POST['hoten'];
	$gender =  $_POST['gt'];
	$birthday = $_POST['ngaysinh'];
	$nganh = $_POST['nganh'];
		// $_SESSION['masv'] = $idstudent;
		// $_SESSION['anh']=$avatar;
		// $_SESSION['hoten']=$fullname;
		// $_SESSION['gt']=$gender;
		// $_SESSION['ngaysinh']=$birthday;
		// $_SESSION['nganh']=$nganh;
	mysqli_query($connect,"INSERT INTO `student`(`idStudent`, `avatar`, `fullname`, `gender`, `birthday`, `idDepartment`) VALUES ('$idstudent','$avatar','$fullname','$gender','$birthday','$nganh') ON DUPLICATE KEY UPDATE avatar ='$avatar', fullname = '$fullname', gender='$gender',birthday='$birthday', idDepartment = '$nganh'");
	header("Location:student.php");
}



?>