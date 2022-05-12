<?php ob_start();
    require_once __DIR__. "/layouts/header.php";
?>
<?php
    require_once __DIR__. "/../libraries/connect.php";
    $sql1="select * from users";
    $stm=$o->query($sql1);
    $data1=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql3="select * from nhom_tin";
    $stm=$o->query($sql3);
    $data3=$stm->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"]))
    {   
        $data2=[
        $id_loaitin = $_POST["id_loaitin"],
        $ten_loaitin=$_POST["ten_loaitin"],
        $trangthai=$_POST["trangthai"],
        $id_nhomtin=$_POST["id_nhomtin"],
        ];
        if($ten_loaitin==""||$ten_loaitin==""||$trangthai==""||$id_nhomtin=="")
        { ?>
        <div class="container-fluid">
            <h2 class="h3 mb-2 text-gray-800">Nhập đầy đủ thông tin trước khi xác nhận</h2>
        </div>
        <?php
        }
        else
        {
            $sql2="insert into loai_tin(id_loaitin, ten_loaitin, trangthai, id_nhomtin)
            values (?,?,?,?)";
            $stm=$o->prepare($sql2);
            $stm->execute($data2);
            header("location:loaitin.php");
        }
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm loại tin</h6>
            </div>
            <form action="/NewsWebsite/admin/themloaitin.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID nhóm tin</th>
                                    <th>ID loại tin</th>
                                    <th>Tên loại tin</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>

                            <body>
                                <tr>
                                    <th><select name="id_nhomtin" id="">
                                        <?php
                                            foreach ($data3 as $key => $value){
                                        ?>
                                        <option value='<?php echo $value['id_nhomtin'] ?>'>
                                            <?php echo $value['ten_nhomtin'] ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select></th>
                                    <th><input type="text" name="id_loaitin"></th>
                                    <th><input type="text" name="ten_loaitin"></th>
                                    <th><input type="number" name="trangthai"></th>
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