<?php
  require_once __DIR__. "/../libraries/connect.php";
  $m= isset($_GET['ma'])?$_GET['ma']:'';
  $sql="delete from tin where id_tin=?";
  $stm=$o->prepare($sql);
  $stm->execute([$m]);
  header("location: baiviet.php");
?>