<?php
  require_once __DIR__. "/../libraries/connect.php";
  $m= isset($_GET['ma'])?$_GET['ma']:'';
  $sql="delete from nhom_tin where id_nhomtin=?";
  $stm=$o->prepare($sql);
  $stm->execute([$m]);
  header("location: nhomtin.php");
?>