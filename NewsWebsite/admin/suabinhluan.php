<?php ob_start();
require_once __DIR__. "/layouts/header.php";
?>
<?php
require_once __DIR__. "/../libraries/connect.php";
    $sql3="select * from users";
    $stm=$o->query($sql3);
    $data3=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql2="select * from tin";
    $stm=$o->query($sql2);
    $data2=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql4 = "select * from binh_luan where id_binhluan ='$_GET[ma]'";
    $stm=$o->query($sql4);
    $data4 =$stm->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"]))
    {
        $id_binhluan = $_POST["id_binhluan"];
        $email=$_POST["email"];
        // $hinhdaidien,
        $thoigian=$_POST["thoigian"];
        $noidungbinhluan=$_POST["noidungbinhluan"];
        $trangthai=$_POST["trangthai"];
        $id_tin = $_POST["id_tin"];
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
        $sql6="update binh_luan  set id_binhluan='$id_binhluan', email='$email', thoigian='$thoigian', noidungbinhluan='$noidungbinhluan', id_tin='$id_tin' where id_binhluan='$id_binhluan'";
        $stm=$o->prepare($sql6);
        $stm->execute([$email,$thoigian,$noidung,$trangthai,$id_tin]);
        header("location:binhluan.php");
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa bình luận</h6>
            </div>
            <form action="/NewsWebsite/admin/suabinhluan.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID bình luận</th>
                                    <th>Email</th>
                                    <!-- <th>Hình đại diện</th> -->
                                    <th>Thời gian</th>
                                    <th>Nội dung</th>                                 
                                    <!-- <th>Trạng thái</th> -->
                                    <th>ID tin</th>
                                </tr>
                            </thead>

                            <body>
                                <tr>
                                    <th><input type="text" name="id_binhluan" readonly value="<?php echo $data4[0]['id_binhluan'] ?>"></th>
                                    <th><input type="text" name="email" value="<?php echo $data4[0]['email'] ?>"></th>
                                    <th><input type="datetime" name="thoigian" value="<?php echo $data4[0]['thoigian'] ?>"></th>
                                    <th><input type="text" name="noidungbinhluan" value="<?php echo $data4[0]['noidungbinhluan'] ?>"></th>
                                    <!-- <th><input type="number" name="trangthai" value="<?php echo $data4[0]['trangthai'] ?>"></th> -->
                                    <th><select name="id_tin" id="">
                                        <?php
                                            foreach ($data2 as $key => $value){
                                        ?>
                                        <option value='<?php echo $value['id_tin'] ?>'>
                                            <?php echo $value['tieude']?>
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