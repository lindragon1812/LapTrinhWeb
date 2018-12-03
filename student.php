<?php 
		session_start();
	$name = $_SESSION['userid'];
	$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
	mysqli_set_charset($connect,'UTF8');
	if (isset($_POST['search'])) {
 	$value = $_POST['value'];
 	$query = "SELECT * FROM student WHERE CONCAT(`idStudent`,`avatar`,`fullname`,`gender`,`birthday`,`idDepartment`) LIKE '%$value%'";
 	$search_result = filterTable($query);
 }
 else {
 	$query = "SELECT * FROM student";
    $search_result = filterTable($query);
 }
 function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
    mysqli_set_charset($connect,'UTF8');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Student

	</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<link rel="stylesheet" type="text/css" href="./css/student.css">
</head>
<body>
	<div>
		<?php include("header.inc") ?>
		<div id="mainpage">
		<form action="student.php" method="POST"> 
			<div id="thongtin">
					<h1>Sinh Viên</h1>
					<button > <a href="./addSt_test.php">+ Thêm sinh viên</a> </button>
				  <p id="po"> Thông tin sinh viên </p>
				  <p id="pi"> Tìm kiếm </p>
				  <input type="submit" name="search" value="Find">
				  <input type="text" name="value" placeholder="ValueToSearch" >
				  

			</div>
		</form>
		<div id="table">
			  		<table id="basictable" class="table">
			<thead>
			<tr>
				<th> Avatar</th>
				<th> Fullname </th>
				<th> Gender </th>
				<th> Birthday </th>
				<th> Department </th>
				<th> Action </th>

			</tr>


		</thead>
		<tbody>
			<?php 
				
				while($row = mysqli_fetch_assoc($search_result)):


			 ?>
			 <tr>
			 	<td> <img style="width: 50px; height: 50px" src="<?php echo $row['avatar']; ?>">  </td>
			 	<td>  <?php echo $row['fullname']; ?> </td>
			 	<td>  <?php 
			 				if($row['gender'] == "1"){
			 					echo "Male";
			 				}else{ 
			 					echo "Female";
			 				}

			 				  ?> </td>
			 	<td>  <?php echo $row['birthday']; ?> </td>
			 	<td>  <?php 
			 			$v =  $row['idDepartment']; 
			 			$qr = mysqli_query($connect,"SELECT nameDepartment FROM department WHERE idDepartment = '$v'");
			 			
			 			while($rs = mysqli_fetch_assoc($qr)){
			 				echo $rs['nameDepartment'];
			 			}


			 			?> 



			 	</td>
			 	<td>
			 		<a href="./edit.php?edit=<?php echo $row['idStudent'] ?>" onclick="sua()" > Sửa </a><br>
			 		<a href="./student.php?rm=<?php echo $row['idStudent'] ?>" onclick ="return confirm('Ban co muon xoa <?php echo $row['idStudent'] ?> ? ');"> Xóa </a>

			 	</td>

			 </tr>
			<?php endwhile; ?>

		</tbody>

	</table>

			  </div>

			 

		</div>

	</div>

</body>
</html>
<script type="text/javascript">
	

</script>
<?php 
	if (isset($_GET['rm'])) {
		$delete_value= $_GET['rm'];
		mysqli_query($connect,"DELETE FROM `student` WHERE idStudent = '$delete_value'");
		header("Location: student.php");
	}


 ?>