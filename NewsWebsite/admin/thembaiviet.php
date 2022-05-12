<?php ob_start();
    require_once __DIR__. "/layouts/header.php";
?>
<?php
    require_once __DIR__. "/../libraries/connect.php";
    $sql1="select * from nhom_tin";
    $sql2="select * from loai_tin";
    $sql3="select * from users";
    $stm=$o->query($sql1);
    $data1=$stm->fetchAll(PDO::FETCH_ASSOC);
    $stm=$o->query($sql2);
    $data2=$stm->fetchAll(PDO::FETCH_ASSOC);
    $stm=$o->query($sql3);
    $data3=$stm->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"]))
    {   
        // $hinhdaidien=$_FILES['hinhdaidien']['error']==0?$_FILES['hinhdaidien']['name']:'';
        // $path = "../images/".basename($_FILES["hinhdaidien"]["name"]);
        $data4=[
        $id_tin = $_POST["id_tin"],
        $tieude=$_POST["tieude"],
        // $hinhdaidien,
        $mota=$_POST["mota"],
        $noidung=$_POST["noidung"],
        $ngaydangtin = $_POST["ngaydangtin"],
        $tacgia=$_POST["tacgia"],
        $solanxem=$_POST["solanxem"],
        $tinhot=$_POST["tinhot"],
        $trangthai=$_POST["trangthai"],
        $id_loaitin = $_POST["id_loaitin"],
        ];
        if($tieude==""||$mota==""||$noidung==""||$ngaydangtin==""||$tacgia==""||$solanxem==""||$tinhot=="" ||$trangthai==""||$id_loaitin=="")
        { ?>
        <div class="container-fluid">
            <h2 class="h3 mb-2 text-gray-800">Nhập đầy đủ thông tin trước khi xác nhận</h2>
        </div>
        <?php
        }
        else
        {
            $sql4="insert into tin(id_tin, tieude, mota, noidung, ngaydangtin, tacgia, solanxem, tinhot, trangthai, id_loaitin)
            values (?,?,?,?,?,?,?,?,?,?)";
            $stm=$o->prepare($sql4);
            $stm->execute($data4);
            // if(move_uploaded_file($_FILES["hinhdaidien"]["tmp_name"], $path))
            // {
                header("location:baiviet.php");
            //}
        }
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm bài viết</h6>
            </div>
            <form action="/NewsWebsite/admin/thembaiviet.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <!-- <th>Hình đại diện</th> -->
                                    <th>Mô tả</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng tin</th>
                                    <th>Tác giả</th>
                                    <th>Số lần xem</th>
                                    <th>Tin hot</th>
                                    <th>Trạng thái</th>
                                    <th>Tên loại tin</th>
                                </tr>
                            </thead>

                            <body>
                                <tr>
                                    
                                    <th><input type="text" name="tieude"></th>
                                    <!-- <th><input type="file" name="hinhdaidien"></th> -->
                                    <th><textarea name="mota"></textarea></th>
                                    <th><input type="text" name="noidung"></th>
                                    <th><input type="date" name="ngaydangtin"></th>
                                    <th><input type="text" name="tacgia"></th>
                                    <th><input type="number" name="solanxem" placeholder="Nhập giá trị 0"></th>
                                    <th><input type="number" name="tinhot" placeholder="Nhập giá trị 0 | 1"></th>
                                    <th><input type="number" name="trangthai" placeholder="Nhập giá trị 0 | 1"></th>
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
<?php require_once __DIR__. "/layouts/footer.php"?>