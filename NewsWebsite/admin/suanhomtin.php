<?php ob_start();
require_once __DIR__. "/layouts/header.php";
?>
<?php
require_once __DIR__. "/../libraries/connect.php";
    $sql1="select * from users";
    $stm=$o->query($sql1);
    $data1=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = "select * from nhom_tin where id_nhomtin ='$_GET[ma]'";
    $stm=$o->query($sql2);
    $data2 =$stm->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"]))
    {
        $id_nhomtin=$_POST["id_nhomtin"];
        $ten_nhomtin=$_POST["ten_nhomtin"];
        $trangthai=$_POST["trangthai"];
        $sql3="update nhom_tin  set id_nhomtin='$id_nhomtin',ten_nhomtin='$ten_nhomtin',trangthai='$trangthai'where id_nhomtin='$id_nhomtin'";
        $stm=$o->prepare($sql3);
        $stm->execute([$id_nhomtin,$ten_nhomtin,$trangthai]);
        header("location:nhomtin.php");
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa nhóm tin</h6>
            </div>
            <form action="/NewsWebsite/admin/suanhomtin.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID nhóm tin</th>
                                    <th>Tên nhóm tin</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>

                            <body>
                                <tr>
                                    <th><input type="number" name="id_nhomtin" readonly value="<?php echo $data2[0]['id_nhomtin'] ?>"></th>
                                    <!-- <th><select name="maquanly" id="">
                                        <?php
                                            foreach ($data1 as $key => $value){
                                        ?>
                                        <option value='<?php echo $value['maquanly'] ?>'>
                                            <?php echo $value['hoten']?>
                                        </option>
                                        <?php
                                        }
                                        ?> -->
                                    </select></th>
                                    <th><input type="text" name="ten_nhomtin" value="<?php echo $data2[0]['ten_nhomtin'] ?>"></th>
                                    <th><input type="number" name="trangthai" value="<?php echo $data2[0]['trangthai'] ?>"></th>
                                </tr>
                            </body>
                        </table>
                    </div>
                </div>
                <div>
                    <a class="btn btn-light btn-icon-split">
                        <span class="icon text-light-600">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <button type="submit" name="submit">Xác nhận</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once __DIR__. "/layouts/footer.php";
?>