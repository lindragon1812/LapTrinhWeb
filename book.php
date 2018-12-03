<?php 
		session_start();

	$name = $_SESSION['userid'];
	$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');

	if (isset($_POST['search'])) {
 	$value = $_POST['value'];
 	$query = "SELECT * FROM book WHERE CONCAT(`idBook`, `title`, `author`, `publish`, `pages`, `cost`, `idCategory`, `idLanguage`, `copies`) LIKE '%$value%'";
 	$search_result = filterTable($query);
 }
 else {
 	$query = "SELECT * FROM book";
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
		<form action="book.php" method="POST"> 
			<div id="thongtin">
					<h1>Sách</h1>
					<button > <a href="./addB.php">+ Thêm sách</a> </button>
				  <p id="po"> Thông tin sách </p>
				  <p id="pi"> Tìm kiếm </p>
				  <input type="submit" name="search" value="Find">
				  <input type="text" name="value" placeholder="ValueToSearch" >
				  

			</div>
		</form>
		<div id="table">
			  		<table id="basictable" class="table">
			<thead>
			<tr>
				<th> Title</th>
				<th> Author </th>
				<th> Publish </th>
				<th> Pages </th>
				<th> Cost </th>
				<th> Category </th>
				<th> Language </th>
				<th> Copies </th>
				<th> Action </th>
			</tr>


		</thead>
		<tbody>
			<?php 
				
				while($row = mysqli_fetch_assoc($search_result)):


			 ?>
			 <tr>
			 	<td>  <?php echo $row['title']; ?> </td>
			 	<td>  <?php echo $row['author']; ?> </td>
			 	<td>  <?php echo $row['publish'];  ?> </td>
			 	<td>  <?php echo $row['pages']; ?> </td>
			 	<td>  <?php echo $row['cost'];?> </td>
			 	<td> <?php echo $row['idCategory']; ?></td>
			 	<td> <?php echo $row['idLanguage']; ?></td>
			 	<td> <?php  echo $row['copies']; ?></td>
			 	<td>
			 		<a href="./editBook.php?editBook=<?php echo $row['idBook'] ?>" onclick="sua()" > Sửa </a><br>
			 		<a href="./book.php?rm=<?php echo $row['idBook'] ?>" onclick ="return confirm('Ban co muon xoa <?php echo $row['idBook'] ?> ? ');"> Xóa </a>

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
		mysqli_query($connect,"DELETE FROM `book` WHERE idBook = '$delete_value'");
		header("Location: book.php");
	}


 ?>