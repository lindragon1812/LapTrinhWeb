<?php 
	
	include("verify.php");
	$name = $_SESSION['userid'];
	$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
	mysqli_set_charset($connect,'UTF8');
	
 ?>
 <?php 
 $al = "fsdf";
	if (isset($_POST['edit_submit'])) {
		$idstudent = $_POST['masv'];
		$avatar = $_POST['anh'];
		$fullname = $_POST['hoten'];
		$gender =  $_POST['gt'];
		//$birthdayst = $_POST['ngaysinh'];
		$nganh = $_POST['nganh'];
		$ngay = $_POST['ngay']; 
		$thang = $_POST['thang'];
		$nam = $_POST['nam'];
		$birthdayst = $nam."-".$thang."-".$ngay;
		// $_SESSION['masv'] = $idstudent;
		// $_SESSION['anh']=$avatar;
		// $_SESSION['hoten']=$fullname;
		// $_SESSION['gt']=$gender;
		// $_SESSION['ngaysinh']=$birthday;
		// $_SESSION['nganh']=$nganh;
		$birthday = date("Y/m/d",strtotime($birthdayst));

			if($avatar == ""){
				$al = "Hay nhap avatar";
			}else{
			mysqli_query($connect,"INSERT INTO `student`(`idStudent`, `avatar`, `fullname`, `gender`, `birthday`, `idDepartment`) VALUES ('$idstudent','$avatar','$fullname','$gender','$birthday','$nganh') ON DUPLICATE KEY UPDATE avatar ='$avatar', fullname = '$fullname', gender='$gender',birthday='$birthday', idDepartment = '$nganh'");
			}
	}



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Quản Lý Thư viện
	</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
	<div>
		<?php include("header.inc") ?>
		<div id="mainpage">
			<div id="fix_info">
			  	<form method="POST" class="fix_form">
			  		
			  		<label class="fix_label"> Ảnh </label>
			  		<input type="text" name="anh" value="" class="fix_input" id="1">
			  		<label class="fix_label"> Mã Sinh Viên </label>
			  		<input type="text" name="masv" value="" class="fix_input">
			  		<label class="fix_label"> Họ và têb </label>
			  		<input type="text" name="hoten" value="" class="fix_input">
			  		<label class="fix_label"> Giới tính </label>
			  		<select name="gt" class="fix_input" >

			  			
			  			<option value="1">Nam</option>
			  			<option value="0">Nu
			  			</option>
			  			
			  		</select>
			  		<label class="fix_label"> Ngày sinh </label>
			  		<input type="text" name="ngay" value="" class="fix_input" placeholder="Ngày">
			  			
			  		</input>
			  		<input type="text" name="thang" value="" class="fix_input" placeholder="Tháng">
			  			
			  		</input>
			  		<input type="text" name="nam" value="" class="fix_input" placeholder="Năm">
			  			
			  		</input>

			  		<label class="fix_label"> Ngành </label>
			  		<select class="fix_input" name="nganh">
			  			<?php 
			  				$result_dp = mysqli_query($connect,"SELECT * FROM department");
			  				while ($row1 = mysqli_fetch_assoc($result_dp)):
			  					
			  				
			  			 ?>
			  			<option value="<?php echo $row1['idDepartment'] ?>"> <?php echo $row1['nameDepartment'] ?></option>
			  				<?php endwhile; ?>	
			  		</select>
			  		<input type="text" name="" disabled value="<?php echo $al ?>" class="fix_input" style="display: block ">
			  		<input type="submit" name="edit_submit" id="edit_submit" onclick="cl();" >
			  		
			  		</form> 

			  	</div>

		</div>

	</div>

</body>
</html>
<!-- <script type="text/javascript">
	
	function submit(){
		var id = document.getElementById("1").value;
		if (id =="1") {}
			window.alert("HAY CHON GIOI TINH");
	}
</script> -->