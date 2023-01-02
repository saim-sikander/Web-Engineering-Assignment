<?php
include '../config/db.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/theme.css" type="text/css">
  <title>Albums</title>
</head>

<body>
  <?php
  include"includes/header.php";
  if (isset($_GET['msg'])) {
    $id = $_GET['msg']; 
    $query = mysqli_query($con,"select albums.* ,count(songs.id) as totalsongs FROM albums
    LEFT JOIN songs ON songs.album_id = albums.id
    where albums.singer_id=$id group by songs.album_id");
    
    ?>
      <div class="py-5">
        <div class="container">
          <div class="row">
            <?php
            if(mysqli_num_rows($query)==0)
              echo("<h1 style='margin:0 0 0 10px;font-weight:bold'>NO RECORD FOUND</h1>");

            while($row = mysqli_fetch_object($query)){  
              $no    = $row->totalsongs;
            
            ?>
            <div class="col-md-3" onclick="viewSongs('<?=$row->id?>')">
              <img src="../admin/uploads/<?=$row->poster?>" width='50%' height='50%'><br>
              <span style="font-weight: bold"><?=$row->title?></span><br>
              <span>No of Songs:<?=$no?></span>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    <?php  
     
  }
  ?>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/lib.js"></script>
  <script type="text/javascript" src="assets/js/main.js"></script>

</body>

</html>