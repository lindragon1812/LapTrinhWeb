<?php 
session_start();

$name = $_SESSION['userid'];
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
mysqli_set_charset($connect,'UTF8');
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
		Sách

	</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<link rel="stylesheet" type="text/css" href="./css/student.css">
</head>
<body>
	<div>
		<?php include("topside.inc") ?>
		<div id="mainpage">
			<form action="book.php" method="POST"> 
				<div id="thongtin">
					<h1>Sách</h1>
					<button onclick="location.href = './addB.php'" type="button"> <a href="./addB.php">+ Thêm sách</a> </button>
					<p id="po"> Thông tin sách </p>
					<p id="pi"> Tìm kiếm </p>
					<input type="submit" name="search" value="Tìm">
					<input type="text" name="value" placeholder="Nhập từ khóa tìm kiếm" >


				</div>
			</form>
			<div id="table">
				<table id="basictable" class="table">
					<thead>
						<tr>
							<th> Mã sách </th>
							<th> Tiêu đề</th>
							<th> Tác giả </th>
							<th> NXB </th>
							<th> Số trang </th>
							<th> Giá </th>
							<th> Lĩnh vực </th>
							<th> Ngôn ngữ </th>
							<th> Số lượng </th>
							<th> H.động </th>
						</tr>


					</thead>
					<tbody>
						<?php 

						while($row = mysqli_fetch_assoc($search_result)):


							?>
							<tr>
								<td> <?php echo $row['idBook'] ?></td>
								<td>  <?php echo $row['title']; ?> </td>
								<td>  <?php echo $row['author']; ?> </td>
								<td>  <?php echo $row['publish'];  ?> </td>
								<td>  <?php echo $row['pages']; ?> </td>
								<td>  <?php echo $row['cost'];?> </td>
								<td> <?php 
								$id_category = $row['idCategory'];
								$result_dp = mysqli_query($connect,"SELECT nameCategory FROM category WHERE idCategory = '$id_category'");
								$row1 = mysqli_fetch_assoc($result_dp);
								echo $row1['nameCategory'];


								?></td>
								<td> <?php 
										$id_lang = $row['idLanguage'];
										$result_dp = mysqli_query($connect,"SELECT nameLang FROM lang WHERE idLang = '$id_lang'");
										$row1 = mysqli_fetch_assoc($result_dp);
										echo $row1['nameLang'];


								?></td>
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