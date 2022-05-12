<?php
  require_once __DIR__. "/../libraries/connect.php";
  $m= isset($_GET['ma'])?$_GET['ma']:'';
  $sql="delete from loai_tin where id_loaitin=?";
  $stm=$o->prepare($sql);
  $stm->execute([$m]);
  header("location: loaitin.php");
?>