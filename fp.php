<?php 
	$val = "";
	session_start();
	$connect = mysqli_connect("localhost","root","","libdb") or die('khong the ket noi');
	if (isset($_POST['submit'])) {
		$name = $_POST['username'];
		$pw = $_POST['password'];
		$result = mysqli_query($connect,"SELECT * FROM staff WHERE username = '$name'");
		if($name == ""){
			$val = "Hãy nhập tên truy cập";
		}
		elseif($pw == ""){
			$val = "Hãy nhập số điện thoại";
		}
		elseif(mysqli_num_rows($result) == 0){
			$val = "Sai tên truy cập hoặc số điện thoại";
		}
		else{
		while ($row = mysqli_fetch_assoc($result)) {

			$sv_phone = $row['phone'];
			$sv_id=$row['idStaff'];
			$sv_name=$row['username'];
			$sv_pw = $row['phone'];
			if($sv_name == $name && $sv_pw == $pw){
				echo "password correct";
				$_SESSION['phone']=$sv_phone;
				$_SESSION['userid']=$sv_name;
				$_SESSION['id']=$sv_id;
				$val = "Cập nhật mật khẩu thành công";
				

				
			}elseif($sv_name ==$name && $sv_pw != $pw){
				$val = "Sai tên ID và mật khẩu ";
			}
		}
	}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="./css/fp.css">
	<link rel="stylesheet" type="text/css" href="./css/login.css">
	<title> Quên mật khẩu </title>
</head>
<body>
	<div id="all"> 
		
		<div id="login_form">
			<form method="POST">
			<h2> Quên mật khẩu </h2>
			<div class="form_label" id="username"><label> Tên truy cập </label> </div>
			<div class="form_input"><input type="text" name="username" class="input_form" > </div>
			<div class="form_label" id="password"><label> SĐT </label> </div>
			<div class="form_input"> <input type="number" name="password" class="input_form"> </div>
						<input  id="z" type="text" name="" disabled="disabled" value="<?php echo $val ?>">

			<div id="login_button"> <input type="submit" name="submit" value="Gửi đi" id="btn" > </div>
			<a href="./login.php" id="back"> Quay lại trang đăng nhập</a>
			</form>

		</div>


	</div>
</body>
</html>