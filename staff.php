<?php 
	session_start();
	$phone = $_SESSION['phone'];
	$name = $_SESSION['userid'];
	$id = $_SESSION['id'];
	
	$connect = mysqli_connect("localhost","root","","libdb") or die('khong the ket noi');
		$al = "" ;
		 $result = mysqli_query($connect,"SELECT password FROM staff WHERE username = '$name'");

		 $row = mysqli_fetch_assoc($result);
		 $sv_password = $row['password'];
		 if (isset($_POST['submit'])) {
			$oldpw = $_POST['old_pw'];
			$newpw = $_POST['new_pw'];
			$renewpw = $_POST['renew_pw'];
			if($oldpw == $sv_password && $newpw == $renewpw){
				// $_SESSION['pw'] = $oldpw;
				// $_SESSION['pw1'] = $newpw;
				// header("Location:connect.php");
				$al = "Doi mat khau thanh cong ";
				$sql = "UPDATE `staff` SET `password` = '$newpw' WHERE `idStaff` = '$id'";
				mysqli_query($connect,$sql);

			}else{
				$al = "Mat khau khong hop le ";
			}
			
			
		}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Nhân viên

	</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<link rel="stylesheet" type="text/css" href="./css/staff.css">

	
		
</head>
<body>
	<div>
		<?php include("topside.inc") ?>
		
		<div id="mainpage">
			
			
			<?php include("staff.inc") ?>


		</div>

	</div>

</body>
</html>
<script type="text/javascript">
	
	
		document.getElementById("zz123").setAttribute("value", "<?php echo $name ?>");
		document.getElementById("zz124").setAttribute("value", "<?php echo $phone ?>");
	// var newpw = document.getElementById("new_pw").value;
	// var renewpw = document.getElementById("renew_pw").value;
	// var oldpw = document.getElementById("1").value
	function ma(){
		alert("gsfgfdsg");
	}
	
	

	function appear(){
		document.getElementById("changepw").style.visibility = "visible"
	}

	
	
</script>


