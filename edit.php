<?php 
include("verify.php");
$name = $_SESSION['userid'];
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
mysqli_set_charset($connect,'UTF8');
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
}
$result = mysqli_query($connect,"SELECT * FROM student WHERE idStudent = '$id'");
$row = mysqli_fetch_assoc($result);
$birthday =  $row['birthday'];
$birthday = strtotime($birthday);
$day = date("d",$birthday);
 $month  = date("m",$birthday);
 $year  = date("Y",$birthday);
$id_department = $row['idDepartment'];
$result_depart = mysqli_query($connect,"SELECT nameDepartment FROM department WHERE idDepartment = '$id_department'");
$nameDp = mysqli_fetch_assoc($result_depart);
?>
<?php 
if (isset($_POST['masv'])) {
	$idstudent = $_POST['masv'];
	$avatar = $_POST['anh'];
	$fullname = $_POST['hoten'];
	$gender =  $_POST['gt'];
	
	$nganh = $_POST['nganh'];
	$ngay = $_POST['ngay']; 
	$thang = $_POST['thang'];
	$nam = $_POST['nam'];
		// $_SESSION['masv'] = $idstudent;
		// $_SESSION['anh']=$avatar;
		// $_SESSION['hoten']=$fullname;
		// $_SESSION['gt']=$gender;
		// $_SESSION['ngaysinh']=$birthday;
		// $_SESSION['nganh']=$nganh;
	$birthdayst = $nam."-".$thang."-".$ngay;
	$birthday = date("Y/m/d",strtotime($birthdayst));
	mysqli_query($connect,"INSERT INTO `student`(`idStudent`, `avatar`, `fullname`, `gender`, `birthday`, `idDepartment`) VALUES ('$idstudent','$avatar','$fullname','$gender','$birthday','$nganh') ON DUPLICATE KEY UPDATE avatar ='$avatar', fullname = '$fullname', gender='$gender',birthday='$birthday', idDepartment = '$nganh'");
	header("Location:student.php");
}
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
			<?php include("topside.inc") ?>
		<div id="mainpage">
			<div id="fix_info">
				<form method="POST" class="fix_form" id="myForm">
						<h1> Sửa thông tin sinh viên </h1>
						<label class="fix_label"> Ảnh </label>
						<input accept="image/png,image/jpg,image/gif"  id="1" type="file" name="anh" value="<?php echo $row['avatar'] ?>" class="fix_input" >
						<label class="fix_label"> Mã Sinh Viên </label>
						<input readonly id="2" type="text" name="masv" value="<?php echo $row['idStudent'] ?>" class="fix_input">
						<label class="fix_label"> Họ và tên </label>
						<input type="text" name="hoten" value="<?php echo $row['fullname'] ?>" class="fix_input" id="3">
						<label class="fix_label"> Giới tính </label>
						<select name="gt" class="fix_input" id="4">
							<option value="1">Nam</option>
							<option value="0">Nữ
							</option>
						</select>
						<label class="fix_label"> Ngày sinh </label>
						<select class="fix_input" name="ngay" id="5">
					<option selected  value="<?php echo $day ?>"> <?php echo $day ?></option>
					<?php for ($i=1; $i <=31 ; $i++) { 					
					 ?>
					 	<option value="<?php echo $i ?>"><?php echo $i ?></option>
					 <?php } ?>
				</select>
				<select class="fix_input" name="thang" id="6">
					<option selected  value="<?php echo $month ?>"> <?php echo $month ?></option>
					<?php for ($i=1; $i <=12 ; $i++) { 					
					 ?>
					 	<option value="<?php echo $i ?>"><?php echo $i ?></option>
					 <?php } ?>
				</select>
			<input type="text" name="nam" value="<?php echo $year ?>" class="fix_input" placeholder="Năm" id="7">				
		</input>
						<label class="fix_label"> Ngành </label>
						<select class="fix_input" name="nganh" id="8">
							<option value="<?php echo $id_department ?>"><?php echo $nameDp['nameDepartment'] ?></option>
							<?php 
							$result_dp = mysqli_query($connect,"SELECT * FROM department");
							while ($row1 = mysqli_fetch_assoc($result_dp)):						
								?>
								<option value="<?php echo $row1['idDepartment'] ?>"> <?php echo $row1['nameDepartment'] ?></option>
							<?php endwhile;
							?>	
						</select>
						<input type="button" name="edit_submit" id="edit_submit" onclick="cl();" value="Cập nhật">
						<input onclick="location.href='./student.php'" type="button" id="cancelBtn" value="Hủy">   </input>
				</form> 
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	function cl(){
		var avatar = document.getElementById("1").value;
		var id = document.getElementById("2").value;
		var name = document.getElementById("3").value;
		var gt = document.getElementById("4").value;
		var nganh = document.getElementById("8").value;
		var ngay = document.getElementById("5").value;
		var thang = document.getElementById("6").value;
		var nam = document.getElementById("7").value;
		
		if(avatar == ""){
			window.alert("Hãy chọn ảnh");
		}
		else if(id == ""){
			window.alert("Hãy điền mã sinh viên");
		}
		else if(name == ""){
			window.alert("Hãy điền họ và tên");
		}
		else if(gt == ""){
			window.alert("Hãy chọn giới tính");
		}
		else if(nganh == ""){
			window.alert("Hãy chọn ngành");
		}
		else if(ngay == "" || thang == "" || nam ==""){
			window.alert("Hãy chọn đầy đủ thông tin ngày sinh");
		}
		else{
			window.alert("Cập nhật sinh viên thành công");
			document.getElementById("myForm").submit();		
		}
	}
</script>
