<?php 
	session_start();
	$name = $_SESSION['userid'];
	$id = $_SESSION['test'];
	$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
	mysqli_set_charset($connect,'UTF8');
	$result = mysqli_query($connect,"SELECT * FROM borrowing WHERE idStudent = '$id' AND returnDate IS NULL");
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Trả sách
	</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/return.css">
</head>
<body>
	<div>
		<?php include("topside.inc") ?>
		<div id="mainpage">
			<h1> Trả Sách </h1>
			<table id="basictable" class="table">
			<thead>
			<tr>
				<th> Mã sách</th>
				<th> Tên sách  </th>
				<th> Ngày mượn </th>
				<th> Hạn trả </th>
				
				
				<th> Hành Động </th>

			</tr>


		</thead>
		<tbody>
			<?php 
				
				while($row = mysqli_fetch_assoc($result)):


			 ?>
			 <tr>
			 	<td>  <?php echo $row['idBorrow']; ?> </td>
			 	
			 	<td><?php echo $row['idBook'] ?></td>
			 	<td>  <?php echo $row['borrowDate']; ?> </td>
			 	<td>  <?php echo $row['dueDate'] ?></td>
			 	
			 	
			 	<?php $currentDate  = date("Y-m-d"); 
			 			$punish = date_diff(date_create($currentDate), date_create($row['dueDate']) ); 

			 	?>
			 	<!-- <td> <a href="return_table.php?id=<?php echo $row['idBorrow'] ?>" onclick="return confirm('TRẢ SÁCH \n'+'Hạn trả : '+'<?php echo $row['dueDate'] ?>\n'+'Ngày trả : '+'<?php echo $currentDate ?>\n'+'Trễ hạn : '+'<?php echo $punish->format('%a days'); ?>');" > Trả sách</a></td> -->
			 	

			 	<td> <a target="pop" href="recieve.php?id=<?php echo $row['idBorrow'] ?>" onclick="pop = window.open(this.href,'pop','width=300,height=400,left=500')" > Trả sách</a></td>


			 </tr>
			<?php endwhile; ?>

		</tbody>

	</table>

		</div>

	</div>

</body>
</html>
<?php 
	if (isset($_GET['id'])) {
		$return_id  = $_GET['id'];
		$currentDate = date("Y-m-d");
		mysqli_query($connect, "UPDATE borrowing SET returnDate = '$currentDate', punish = 0 where idBorrow='$return_id'");
		header("Location: return_table.php");
	}

 ?>