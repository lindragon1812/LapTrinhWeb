<?php 
  session_start();
  $name = $_SESSION['userid'];
  $connect = mysqli_connect("localhost", "root", "", "libdb") or die('khong the ket noi');
  mysqli_set_charset($connect,'UTF8');
  $result = mysqli_query($connect, "SELECT borrowing.idBorrow, borrowing.idBook, idStudent, borrowDate FROM borrowing");
  $result1 = mysqli_query($connect, "SELECT borrowing.idBorrow, borrowing.idBook, idStudent, borrowDate, returnDate FROM borrowing WHERE `returnDate` IS NOT NULL");
   $result2 = mysqli_query($connect, "SELECT borrowing.idBorrow, borrowing.idBook, idStudent, borrowDate, returnDate, dueDate FROM borrowing WHERE `returnDate` IS NOT NULL");
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>
    Quản Lý Thư viện
  </title>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
</head>
<body>
  <div>
    <?php include("header.inc") ?>
    <div id="mainpage">
                    <h2>Tabs</h2>
            <p>Click on the buttons inside the tabbed menu:</p>

            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'London')">Sách đã mượn</button>
              <button class="tablinks" onclick="openCity(event, 'Paris')">Sách đã trả</button>
              <button class="tablinks" onclick="openCity(event, 'Tokyo')">Sách trễ hạn</button>
            </div>

            <div id="London" class="tabcontent">
                <table id="basictable1" class="table">
      <thead>
      <tr>
        <th> Mã mượn</th>
        <th> ID sách  </th>
        <th> ID student </th>
        <th> Ngày mượn </th>
       
        
        
        

      </tr>


    </thead>
    <tbody>
      <?php 
        
        while($row = mysqli_fetch_assoc($result)):


       ?>
       <tr>
        <td>  <?php echo $row['idBorrow']; ?> </td>
        
        <td><?php echo $row['idBook'] ?></td>
        <td>  <?php echo $row['idStudent']; ?> </td>
        <td>  <?php echo $row['borrowDate'] ?></td>
        

       </tr>
      <?php endwhile; ?>

    </tbody>

  </table>
            </div>

            <div id="Paris" class="tabcontent">
              <table id="basictable2" class="table">
      <thead>
      <tr>
        <th> Mã mượn</th>
        <th> ID sách  </th>
        <th> ID student </th>
        <th> Ngày mượn </th>
        <th> Ngày trả </th>
        
        
        

      </tr>


    </thead>
    <tbody>
      <?php 
        
        while($row1 = mysqli_fetch_assoc($result1)):


       ?>
       <tr>
        <td>  <?php echo $row1['idBorrow']; ?> </td>
        
        <td><?php echo $row1['idBook'] ?></td>
        <td>  <?php echo $row1['idStudent']; ?> </td>
        <td>  <?php echo $row1['borrowDate'] ?></td>
        <td> <?php  echo $row1['returnDate'] ?></td>

       </tr>
      <?php endwhile; ?>

    </tbody>

  </table>
            </div>

            <div id="Tokyo" class="tabcontent">
                <table id="basictable3" class="table">
      <thead>
      <tr>
        <th> Mã mượn</th>
        <th> ID sách  </th>
        <th> ID student </th>
        <th> Ngày mượn </th>
        <th> Ngày trả </th>
        <th> Hạn trả </th>
        <th> Số ngày trễ</th>
        
        
        

      </tr>


    </thead>
    <tbody>
      <?php 
        
        while($row2 = mysqli_fetch_assoc($result2)):
            $vl = date_diff(date_create($row2['returnDate']),date_create($row2['dueDate']));
            $vl1 = $vl->days;
            if($vl1 > 0){

       ?>
       <tr>
        <td>  <?php echo $row2['idBorrow']; ?> </td>
        
        <td><?php echo $row2['idBook'] ?></td>
        <td>  <?php echo $row2['idStudent']; ?> </td>
        <td>  <?php echo $row2['borrowDate'] ?></td>
        <td> <?php  echo $row2['returnDate'] ?></td>
        <td> <?php  echo $row2['dueDate'] ?></td>

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