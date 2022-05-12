<?php ob_start();
require_once __DIR__. "/layouts/header.php";
?>
<?php
require_once __DIR__. "/../libraries/connect.php";
    $sql3="select * from users";
    $stm=$o->query($sql3);
    $data3=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql2="select * from loai_tin";
    $stm=$o->query($sql2);
    $data2=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql4 = "select * from tin where id_tin ='$_GET[ma]'";
    $stm=$o->query($sql4);
    $data4 =$stm->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"]))
    {
        $id_tin = $_POST["id_tin"];
        $tieude=$_POST["tieude"];
        // $hinhdaidien,
        $mota=$_POST["mota"];
        $noidung=$_POST["noidung"];
        $ngaydangtin = $_POST["ngaydangtin"];
        $tacgia=$_POST["tacgia"];
        $solanxem=$_POST["solanxem"];
        $tinhot=$_POST["tinhot"];
        $trangthai=$_POST["trangthai"];
        $id_loaitin = $_POST["id_loaitin"];
        // if($hinhdaidien!=NULL)
        // {
        //     $tmp_hinhdaidien=$_FILES["hinhdaidien"]["tmp_name"];
        //     $hinhdaidien=$_FILES['hinhdaidien']['name'];
        //     move_uploaded_file($tmp_hinhdaidien, "../images/$hinhdaidien");
        //     $sql5="update tin set hinhdaidien='$hinhdaidien' where id_tin='$id_tin'";
        //     $stm=$o->prepare($sql5);
        //     $stm->execute([$hinhdaidien]);
        //     header("location:baiviet.php");
        // }
        $sql6="update tin  set id_tin='$id_tin', tieude='$tieude', mota='$mota', noidung='$noidung', ngaydangtin='$ngaydangtin', tacgia='$tacgia', solanxem='$solanxem', tinhot='$tinhot', trangthai='$trangthai', id_loaitin='$id_loaitin' where id_tin='$id_tin'";
        $stm=$o->prepare($sql6);
        $stm->execute([$tieude,$mota,$noidung,$ngaydangtin,$tacgia,$solanxem,$tinhot,$trangthai,$id_loaitin]);
        header("location:baiviet.php");
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa bài viết</h6>
            </div>
            <form action="/NewsWebsite/admin/suabaiviet.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID tin</th>
                                    <th>Tiêu đề</th>
                                    <!-- <th>Hình đại diện</th> -->
                                    <th>Mô tả</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng tin</th>
                                    <th>Tác giả</th>
                                    <th>Số lần xem</th>
                                    <th>Tin hot</th>
                                    <th>Trạng thái</th>
                                    <th>ID loại tin</th>
                                </tr>
                            </thead>

                            <body>
                                <tr>
                                    <th><input type="text" name="id_tin" readonly value="<?php echo $data4[0]['id_tin'] ?>"></th>
                                    <th><input type="text" name="tieude" value="<?php echo $data4[0]['tieude'] ?>"></th>
                                    <th><textarea name="mota" value="<?php echo $data4[0]['mota'] ?>"></textarea></th>
                                    <th><input type="text" name="noidung" value="<?php echo $data4[0]['noidung'] ?>"></th>
                                    <th><input type="date" name="ngaydangtin" value="<?php echo $data4[0]['ngaydangtin'] ?>"></th>
                                    <th><input type="text" name="tacgia" value="<?php echo $data4[0]['tacgia'] ?>"></th>
                                    <th><input type="number" name="solanxem" value="<?php echo $data4[0]['solanxem'] ?>"></th>
                                    <th><input type="number" name="tinhot" value="<?php echo $data4[0]['tinhot'] ?>"></th>
                                    <th><input type="number" name="trangthai" value="<?php echo $data4[0]['trangthai'] ?>"></th>
                                    <th><select name="id_loaitin" id="">
                                        <?php
                                            foreach ($data2 as $key => $value){
                                        ?>
                                        <option value='<?php echo $value['id_loaitin'] ?>'>
                                            <?php echo $value['ten_loaitin']?>
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