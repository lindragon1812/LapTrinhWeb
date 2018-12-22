<?php 
	$val = "";
	session_start();
	$connect = mysqli_connect("localhost","root","","libdb") or die('khong the ket noi');
	if (isset($_POST['submit'])) {
		$name = $_POST['username'];
		$pw = $_POST['password'];
		$result = mysqli_query($connect,"SELECT * FROM staff WHERE username = '$name'");
		if($name == ""){
			$val = "Hãy nhập tên truy cập và mật khẩu";
		}
		elseif($pw == ""){
			$val = "Hãy nhập mật khẩu";
		}

		elseif(mysqli_num_rows($result) == 0){
			$val = "Sai tên truy cập và mật khẩu";
		}
		else{
		while ($row = mysqli_fetch_assoc($result)) {

			$sv_phone = $row['phone'];
			$sv_id=$row['idStaff'];
			$sv_name=$row['username'];
			$sv_pw = $row['password'];
			if($sv_name == $name && $sv_pw == $pw){
				echo "password correct";
				$_SESSION['phone']=$sv_phone;
				$_SESSION['userid']=$sv_name;
				$_SESSION['id']=$sv_id;
				

				header("Location:home.php");
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
	<link rel="stylesheet" type="text/css" href="./css/login.css">
	<title> Đăng nhập </title>
</head>
<body>
	<div id="all"> 
		<form method="POST">
			<div id="login_form">
				<h2> Đăng nhập </h2>
				<div class="form_label" id="username"><label> Tên truy cập </label> </div>
				<div class="form_input"><input type="text" name="username" class="input_form" > </div>
				<div class="form_label" id="password"><label> Mật khẩu </label> </div>
				<div class="form_input"> <input type="password" name="password" class="input_form"> </div>


				<a href="./fp.php" id="fp"> Quên mật khẩu ?</a>
				<input  id="z" type="text" name="" disabled="disabled" value="<?php echo $val ?>">
				<div id="login_button"> <input type="submit" name="submit" value="Đăng nhập" id="btn" > </div>


			</div>
		</form>

	</div>
</body>
</html>
