<hr>
<div style="margin: 0 0 0 194px">
    <?php
    for($i=1;$i<=$pages;$i++){
    ?>
      <a href="?page=<?=$i-1?>" class='btn btn-primary'><?=$i?></a>
    <?php
    }
    ?>
</div>