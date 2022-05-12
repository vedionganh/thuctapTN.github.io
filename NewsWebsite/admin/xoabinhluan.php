<?php
  require_once __DIR__. "/../libraries/connect.php";
  $m= isset($_GET['ma'])?$_GET['ma']:'';
  $sql="delete from binh_luan where id_binhluan=?";
  $stm=$o->prepare($sql);
  $stm->execute([$m]);
  header("location: binhluan.php");
?>