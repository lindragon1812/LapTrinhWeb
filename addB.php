<?php 
session_start();
$name = $_SESSION['userid'];
$connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
mysqli_set_charset($connect,'UTF8');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Thêm sách
	</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
	<div>
		<?php include("header.inc") ?>
		<div id="mainpage">
			<div id="fix_info">
				
				<form method="POST" class="fix_form" id="myForm">
					<h1> Thêm sách </h1>
					<label class="fix_label"> Mã Sách </label>
					<input type="text" name="ma" class="fix_input" id="1">
					<label class="fix_label"> Tiêu đề </label>
					<input type="text" name="tieude"  class="fix_input" id="2">
					<label class="fix_label"> Tác giả </label>
					<input type="text" name="tacgia"  class="fix_input" id="3">
					<label class="fix_label"> Nhà phát hành </label>
					<input name="publish" class="fix_input" id="4" ></input>
					<label class="fix_label"> Pages </label>
					<input type="text" name="page"  class="fix_input" id="5">

					<label class="fix_label"> Cost </label>
					<input type="text" name="gia"  class="fix_input" id="6">
					<label class="fix_label"> Phân loại sách </label>	
					<select class="fix_input" name="phanloai" id="7"> 
						<?php 
						$result_dp = mysqli_query($connect,"SELECT * FROM category");
						while ($row1 = mysqli_fetch_assoc($result_dp)):
							
							
							?>
							<option value="<?php echo $row1['idCategory'] ?>"> <?php echo $row1['nameCategory'] ?></option>
						<?php endwhile; ?>	

					</select>
					<label class="fix_label"> Ngôn ngữ  </label>
					<select class="fix_input" name="nn" id="8">
						<?php 
						$result_dp = mysqli_query($connect,"SELECT * FROM lang");
						while ($row1 = mysqli_fetch_assoc($result_dp)):
							
							
							?>
							<option value="<?php echo $row1['idLang'] ?>"> <?php echo $row1['nameLang'] ?></option>
						<?php endwhile; ?>	


					</select>
					<label class="fix_label" id="9"> Số lượng </label>
					<input type="text" name="sl"  class="fix_input">
					<input type="button" name="edit_submit" id="edit_submit" value="Submit" onclick="cl1();">
					
				</form> 

			</div>

		</div>

	</div>

</body>
</html>
<script type="text/javascript">
	
	function cl1(){
		var idbook = document.getElementById("1").value;
		var title = document.getElementById("2").value;
		var author = document.getElementById("3").value;
		var publish =  document.getElementById("4").value;
		var page = document.getElementById("5").value;
		var cost = document.getElementById("6").value;
		var idcategory = document.getElementById("7").value;
		var idlang = document.getElementById("8").value;
		var copies = document.getElementById("9").value;
		if (idbook=="") {
			window.alert("HAY CHON MA SACH");

		}
		
		else if(title==""){
			window.alert("HAY CHON TIEU DE");
		}
		else if(author==""){
			window.alert("HAY CHON TAC GIA");
		}
		else if(publish==""){
			window.alert("HAY CHON NHA XB");
		}
		else if(page==""){
			window.alert("HAY CHON SO TRANG");
		}
		else if(cost==""){
			window.alert("HAY CHON GIA TIEN");
		}
		else if(idcategory==""){
			window.alert("HAY CHON PHAN LOAI");
		}
		else if(idlang==""){
			window.alert("HAY CHON NGON NGU");
		}
		else if(copies==""){
			window.alert("HAY CHON SO LUONG");
		}

		else{
			window.alert("Thêm sách thành công ");
			document.getElementById("myForm").submit();
			
		}
	}


</script>
<?php 
if (isset($_POST['ma'])) {
	$idbook = $_POST['ma'];
	$title = $_POST['tieude'];
	$author = $_POST['tacgia'];
	$publish =  $_POST['publish'];
	$page = $_POST['page'];
	$cost = $_POST['gia'];
	$idcategory = $_POST['phanloai'];
	$idlang = $_POST['nn'];
	$copies = $_POST['sl'];
	
	mysqli_query($connect,"INSERT INTO `book`(`idBook`, `title`, `author`, `publish`, `pages`, `cost`, `idCategory`, `idLanguage`, `copies`) VALUES ('$idbook','$title','$author','$publish','$page','$cost','$idcategory','$idlang','$copies') ON DUPLICATE KEY UPDATE idBook = '$idbook',title='$title', author='$author', publish='$publish', pages='$page', cost='$cost', idCategory='$idcategory', idLanguage ='$idlang', copies ='$copies'  ");
	header("Location:book.php");

}
?>