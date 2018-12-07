<?php 
	 // session_start();
	 // echo $_SESSION['phone'];
	 // echo $_SESSION['userid'];
	 // echo $_SESSION['id'];
	// $connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
	// echo  $_SESSION['masv'] ;
	// 	echo $_SESSION['anh'];
	// echo	$_SESSION['hoten'];
	// echo	$_SESSION['gt'];
	// echo	$_SESSION['ngaysinh'];
	// echo	$_SESSION['nganh'];
	// $idstudent=$_SESSION['masv'];
	// $avatar=$_SESSION['anh'];
	// $fullname=$_SESSION['hoten'];
	// $gender=$_SESSION['gt'];
	// $birthday=$_SESSION['ngaysinh'];
	// $nganh=$_SESSION['nganh'];
	// mysqli_query($connect,"INSERT INTO `student`(`idStudent`, `avatar`, `fullname`, `gender`, `birthday`, `idDepartment`) VALUES ('$idstudent','$avatar','$fullname','$gender','$birthday','$nganh') ON DUPLICATE KEY UPDATE avatar ='$avatar', fullname = '$fullname', gender='$gender',birthday='$birthday', idDepartment = '$nganh'");
	// echo '<script language="javascript">';
	// echo 'alert("message successfully sent")';
	// echo '</script>';
	//  echo '<script type="text/javascript">;';
 // echo	'function cl(){alert("message successfully sent");}';

 // echo '</script>';
// echo $_SESSION['test'];
$currentDate= date("Y-m-d");
//$stop_date = date("Y-m-d", strtotime( "$stop_date + 7 day" ));
//echo $stop_date;
$datetime1 = date_create('2017-06-28'); 
$datetime2 = date_create('2018-06-28'); 

// calculates the difference between DateTime objects 


// printing result in days format 
$punish = date_diff(date_create($currentDate), date_create('2018-12-10') ); 
// echo $punish->days; 


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		
 	</title>
 </head>
 <body style="width: 1000px; height: 10000px;">
 	<!-- <form>
 		<input type="text" name="">
 		<input style="top: 500px;" type="button" onclick="cl();" onsubmit="return false;"> gdsgsg  
 		</form> -->
 		<button  onclick="openwindow()"> Click</button>
 		<button onclick="closewindow()"> Close </button>
 		
 </body>
 </html>
 <script type="text/javascript">
 	var myWindow;
 	function openwindow(){
 		 myWindow = window.open("/web/nhom61/connect.php","","width=200,height=100");
 		
 	}
 	function closewindow(){
 		window.close();
 	}

 </script>
 