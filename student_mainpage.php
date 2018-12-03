<!-- <?php 
	// session_start();
	// $name = $_SESSION['userid'];
	
 ?> -->
 <?php 
 if (isset($_POST['search'])) {
 	$value = $_POST['value'];
 	$query = "SELECT * FROM student WHERE CONCAT(`idStudent`,`avatar`,`fullname`,`gender`,`birthday`,`idDepartment`) LIKE '%$value%'
";
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
		Table
		
	</title>
	<!-- <link rel="stylesheet" type="text/css" href="./student.css"> -->
	
</head>
<body>
	<form action="student_mainpage.php" method="POST"> 
		<input type="text" name="value" placeholder="ValueToSearch">
		<input type="submit" name="search" value="Find">

	</form>
	<table id="basictable" class="table">
		<thead>
			<tr>
				<th> Avatar</th>
				<th> Fullname </th>
				<th> Gender </th>
				<th> Birthday </th>
				<th> Department </th>

			</tr>


		</thead>
		<tbody>
			<?php 
				
				while($row = mysqli_fetch_assoc($search_result)):


			 ?>
			 <tr>
			 	<td>  <?php echo $row['avatar']; ?> </td>
			 	<td>  <?php echo $row['fullname']; ?> </td>
			 	<td>  <?php echo $row['gender']; ?> </td>
			 	<td>  <?php echo $row['birthday']; ?> </td>
			 	<td>  <?php echo $row['idDepartment']; ?> </td>

			 </tr>
			<?php endwhile; ?>

		</tbody>

	</table>

</body>
</html>


	
	

