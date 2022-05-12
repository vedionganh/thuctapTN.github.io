<?php ob_start();
    require_once __DIR__. "/layouts/header.php";
?>
<?php
    require_once __DIR__. "/../libraries/connect.php";
    $sql1="select * from users";
    $stm=$o->query($sql1);
    $data1=$stm->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"]))
    {   
        $data2=[
        $id_nhomtin = $_POST["id_nhomtin"],
        $ten_nhomtin=$_POST["ten_nhomtin"],
        $trangthai=$_POST["trangthai"],
        ];
        if($ten_nhomtin==""||$trangthai=="")
        { ?>
        <div class="container-fluid">
            <h2 class="h3 mb-2 text-gray-800">Nhập đầy đủ thông tin trước khi xác nhận</h2>
        </div>
        <?php
        }
        else
        {
            $sql2="insert into nhom_tin(id_nhomtin, ten_nhomtin, trangthai)
            values (?,?,?)";
            $stm=$o->prepare($sql2);
            $stm->execute($data2);
            header("location:nhomtin.php");
        }
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm nhóm tin</h6>
            </div>
            <form action="/NewsWebsite/admin/themnhomtin.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>Mã quản lý</th> -->
                                    <th>ID nhóm tin</th>
                                    <th>Tên nhóm tin</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>

                            <body>
                                <tr>
                                    <!-- <th><select name="maquanly" id="">
                                        <?php
                                            foreach ($data1 as $key => $value){
                                        ?>
                                        <option value='<?php echo $value['maquanly'] ?>'>
                                            <?php echo $value['hoten']?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select></th> -->
                                    <th><input type="number" name="id_nhomtin"></th>
                                    <th><input type="text" name="ten_nhomtin"></th>
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