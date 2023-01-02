<?php
include"../config/db.php";
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12" style="">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar12"> <a class="navbar-brand d-none d-md-block" href="#">
          <i class="fa d-inline fa-lg fa-circle"></i>
          <b> ONLINE_MUSIC_CENTER</b>
        </a>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a class="btn btn-light" href="home.php" style="margin:0 8px 0 0">HOME</a> </li>
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <div class="btn-group">
                <button class="btn btn-light dropdown-toggle" data-toggle="dropdown" style="margin:0 8px 0 0"> CATEGORIES </button>
                <div class="dropdown-menu"> <a class="dropdown-item" href="#">Mediums</a>
                  <?php
                  $query = mysqli_query($con,"select id,title from medium");
                  while($row = mysqli_fetch_object($query)){
                  ?> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="singer.php?msg=<?=$row->id?>"><?=$row->title?></a>
                  <?php   
                  }
                  ?>
                </div>
              </div>
            </li>
            <li class="nav-item"> <a class="btn btn-light" href="#" style="margin:0 8px 0 0">GALLERY</a> </li>
            <li class="nav-item"> <a class="btn btn-light" href="#">FEEDBACK</a> </li>
          </ul>
        </ul>
      </div>
    </div>
  </nav>