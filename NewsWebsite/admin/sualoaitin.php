<?php ob_start();
require_once __DIR__. "/layouts/header.php";
?>
<?php
require_once __DIR__. "/../libraries/connect.php";
    $sql1="select * from users";
    $stm=$o->query($sql1);
    $data1=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql4="select * from nhom_tin";
    $stm4=$o->query($sql4);
    $data4=$stm4->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = "select * from loai_tin where id_loaitin ='$_GET[ma]'";
    $stm=$o->query($sql2);
    $data2 =$stm->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"]))
    {
        $id_loaitin=$_POST["id_loaitin"];
        $ten_loaitin=$_POST["ten_loaitin"];
        $trangthai=$_POST["trangthai"];
        $id_nhomtin=$_POST["id_nhomtin"];
        $sql3="update loai_tin  set id_loaitin='$id_loaitin',ten_loaitin='$ten_loaitin',trangthai='$trangthai', id_nhomtin='$id_nhomtin' where id_loaitin='$id_loaitin'";
        $stm=$o->prepare($sql3);
        $stm->execute([$id_loaitin,$ten_loaitin,$trangthai,$id_nhomtin]);
        header("location:loaitin.php");
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa loại tin</h6>
            </div>
            <form action="/NewsWebsite/admin/sualoaitin.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID loại tin</th>
                                    <th>Tên loại tin</th>
                                    <th>Trạng thái</th>
                                    <th>ID nhóm tin</th>
                                </tr>
                            </thead>

                            <body>
                                <tr>
                                    <th><input type="text" name="id_loaitin" readonly value="<?php echo $data2[0]['id_loaitin'] ?>"></th>
                                    <th><input type="text" name="ten_loaitin" value="<?php echo $data2[0]['ten_loaitin'] ?>"></th>
                                    <th><input type="number" name="trangthai" value="<?php echo $data2[0]['trangthai'] ?>"></th>
                                    <th><select name="id_nhomtin" id="">
                                        <?php
                                            foreach ($data4 as $key => $value){
                                        ?>
                                        <option value='<?php echo $value['id_nhomtin'] ?>'>
                                            <?php echo $value['ten_nhomtin']?>
                                        </option>
                                        <?php
                                        }
                                        ?> 
                                    </select></th>
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