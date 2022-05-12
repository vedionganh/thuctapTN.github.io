<?php require_once __DIR__. "/layouts/header.php";?>
<?php
    require_once __DIR__. "/../libraries/connect.php";
    $sql="select * from tin";
    $stm=$o->query($sql);
    $data=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql4="select * from binh_luan";
    $stm=$o->query($sql4);
    $data4=$stm->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bình luận</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10px; !important">ID bình luận</th>
                                <th>Email</th>
                                <th>Thời gian</th>
                                <th>Nội dung</th>
                                <th>ID tin</th>
                                <th width="10px; !important">Tính Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data4 as $key => $value)
                                {
                                ?>
                            <tr>
                                <th><?php echo $value['id_binhluan']?></th>
                                <th><?php echo $value['email']?></th>
                                <th><?php echo $value['thoigian']?></th>
                                <th><?php echo $value['noidungbinhluan']?></th>
                                
                                <th><?php echo $value['id_tin']?></th>
                                <th>
                                    <a href="/NewsWebsite/admin/suabinhluan.php?ma=<?php echo $value['id_binhluan']?>">Sửa</a>
                                    <a href="/NewsWebsite/admin/xoabinhluan.php?ma=<?php echo $value['id_binhluan']?>">Xóa</a>
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