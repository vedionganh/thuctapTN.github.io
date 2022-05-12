<?php require_once __DIR__. "/layouts/header.php";?>
<?php
    require_once __DIR__. "/../libraries/connect.php";
    $sql="select * from loai_tin";
    $stm=$o->query($sql);
    $data=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql1="select * from nhom_tin";
    $stm1=$o->query($sql);
    $data1=$stm1->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Loại tin</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID loại tin</th>
                                <th>Tên loại tin</th>
                                <th>Trạng thái</th>
                                <th>Tên nhóm tin</th>
                                <th width="10px; !important">Tính Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data as $key => $value)
                                {
                                ?>
                            <tr>
                                <th><?php echo $value['id_loaitin']?></th>
                                <th><?php echo $value['ten_loaitin']?></th>
                                <th><?php echo $value['trangthai']?></th>
                                <th><?php echo $value['id_nhomtin']?></th>
                                <th>
                                    <a href="/NewsWebsite/admin/sualoaitin.php?ma=<?php echo $value['id_loaitin']?>">Sửa</a>
                                    <a href="/NewsWebsite/admin/xoaloaitin.php?ma=<?php echo $value['id_loaitin']?>">Xóa</a>
                                </th>
                            </tr>
                            <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__. "/layouts/footer.php"?>