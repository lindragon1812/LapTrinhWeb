<?php 
session_start();
$name = $_SESSION['userid'];
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
mysqli_set_charset($connect,'UTF8');
$result = mysqli_query($connect, "SELECT b.idBorrow, b.idBook,bo.title, s.idStudent,s.fullname,b.borrowDate, b.dueDate, b.returnDate FROM borrowing AS b ,student AS s, book as bo WHERE b.idStudent = s.idStudent AND b.idBook = bo.idBook ORDER BY `b`.`idBorrow` ASC");
$result1 = mysqli_query($connect, "SELECT b.idBorrow, b.idBook,bo.title, s.idStudent,s.fullname,b.borrowDate, b.dueDate, b.returnDate, b.punish FROM borrowing AS b ,student AS s, book as bo WHERE b.idStudent = s.idStudent AND b.idBook = bo.idBook AND b.returnDate IS NOT NULL ORDER BY `b`.`idBorrow` ASC");
$result2 = mysqli_query($connect, "SELECT b.idBorrow, b.idBook,bo.title, s.idStudent,s.fullname,b.borrowDate, b.dueDate, b.returnDate, b.punish FROM borrowing AS b ,student AS s, book as bo WHERE b.idStudent = s.idStudent AND b.idBook = bo.idBook AND b.returnDate IS NOT NULL ORDER BY `b`.`idBorrow` ASC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>
		Thống kê
	</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/return.css">
	<link rel="stylesheet" type="text/css" href="css/thongke.css">

</head>
<body>
	<div>
		<?php include("topside.inc") ?>
		<div id="mainpage">
			<h2>Thống kê về sách </h2>
			<p> Thống kê về số lượng sách mượn, trả, quá hạn : </p>

			<div class="tab">
				<button class="tablinks" onclick="openCity(event, 'Tab1')">Sách đã mượn</button>
				<button class="tablinks" onclick="openCity(event, 'Tab2')">Sách đã trả</button>
				<button class="tablinks" onclick="openCity(event, 'Tab3')">Sách trễ hạn</button>
			</div>

			<div id="Tab1" class="tabcontent">
				<table id="basictable1" class="table">
					<thead>
						<tr>
							<th> Mã mượn</th>
							<th> Mã sách  </th>
							<th> Tên sách </th>
							<th> Mã sinh viên </th>
							<th> Tên sinh viên </th>
							<th> Ngày mượn </th>
							<th> Hạn trả </th>
							
							
							
							
							
							

						</tr>


					</thead>
					<tbody>
						<?php 
						
						while($row = mysqli_fetch_assoc($result)):


							?>
							<tr>
								<td>  <?php echo $row['idBorrow']; ?> </td>
								<td><?php echo $row['idBook'] ?></td>
								<td> <?php echo $row['title'] ?></td>
								<td>  <?php echo $row['idStudent']; ?> </td>
								<td> <?php echo $row['fullname'] ?></td>

								<td>  <?php echo $row['borrowDate'] ?></td>
								<td>
									<?php echo $row['dueDate'] ?>
								</td>
								
								

							</tr>
						<?php endwhile; ?>

					</tbody>

				</table>
			</div>

			<div id="Tab2" class="tabcontent">
				<table id="basictable2" class="table">
					<thead>
						<tr>
							<th>Mã mượn</th>
							<th>Mã sách  </th>
							<th>Tên sách </th>
							<th>Mã sinh viên</th>
							<th>Tên sinh viên</th>
							<th>Ngày mượn </th>
							<th>Hạn trả</th>
							<th>Ngày trả </th>
							
							<th>Phạt</th>
							
							

						</tr>


					</thead>
					<tbody>
						<?php 
						
						while($row1 = mysqli_fetch_assoc($result1)):


							?>
							<tr>
								<td>  <?php echo $row1['idBorrow']; ?> </td>
								<td><?php echo $row1['idBook'] ?></td>
								<td> <?php echo $row1['title'] ?></td>
								<td>  <?php echo $row1['idStudent']; ?> </td>
								<td> <?php echo $row1['fullname'] ?></td>

								<td>  <?php echo $row1['borrowDate'] ?></td>
								<td>
									<?php echo $row1['dueDate'] ?>
								</td>
								<td> <?php echo $row1['returnDate'] ?></td>
								<td> <?php echo $row1['punish'] ?></td>
							</tr>
						<?php endwhile; ?>

					</tbody>

				</table>
			</div>

			<div id="Tab3" class="tabcontent">
				<table id="basictable3" class="table">
					<thead>
						<tr>
							<th>Mã mượn</th>
							<th>Mã sách</th>
							<th>Mã sinh viên </th>
							<th>Tên sinh viên</th>
							<th>Ngày mượn</th>
							<th>Hạn trả</th>
							<th>Ngày trả</th>						
							<th>Trễ hạn</th>
							
							
							

						</tr>


					</thead>
					<tbody>
						<?php 
						
						while($row2 = mysqli_fetch_assoc($result2)):
							$vl = date_diff(date_create($row2['dueDate']),  date_create($row2['returnDate']));
							$vl1 = $vl->format('%R%a');
							$vl1 = intval($vl1);
							if($vl1 > 0){

								?>
								<tr>
									<td>  <?php echo $row2['idBorrow']; ?> </td>
									
									<td><?php echo $row2['idBook'] ?></td>
									<td>  <?php echo $row2['idStudent']; ?> </td>
									<td> <?php echo $row2['fullname'] ?></td>
									<td>  <?php echo $row2['borrowDate'] ?></td>
									<td> <?php  echo $row2['returnDate'] ?></td>
									<td> <?php  echo $row2['dueDate'] ?></td>
									<td> <?php  echo $vl1 ?></td>
								</tr>
							<?php } endwhile; ?>

						</tbody>

					</table>
				</div>

			</div>

		</div>

	</body>
	</html>
	<script>
		function openCity(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		}
	</script>