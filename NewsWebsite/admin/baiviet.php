<?php require_once __DIR__. "/layouts/header.php";?>
<?php
    require_once __DIR__. "/../libraries/connect.php";
    $sql="select * from tin";
    $stm=$o->query($sql);
    $data=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql2="select * from loai_tin";
    $stm=$o->query($sql2);
    $data2=$stm->fetchAll(PDO::FETCH_ASSOC);
    $sql1="select * from nhom_tin";
    $stm=$o->query($sql1);
    $data1=$stm->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tin</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã tin</th>
                                <th>Tiêu đề</th>
                                <!-- <th>Hình ảnh</th> -->
                                <th>Mô tả</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng tin</th>
                                <th>Tác giả</th>
                                <th>Số lần xem</th>
                                <th>Tin hot</th>
                                <th>Trạng thái</th>
                                <th>ID loại tin</th>
                                
                                <th width="10px; !important">Tính Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data as $key => $value)
                                {
                                ?>
                            <tr>
                                <th><?php echo $value['id_tin']?></th>                               
                                <th><?php echo $value['tieude']?></th>
                                <!-- <th><img src="/NewsWebsite/images/<?php echo $value['hinhdaidien']?>" width="100"
                                        height="100" /></th> -->
                                <th><?php echo $value['mota']?></th>
                                <th><?php echo $value['noidung']?></th>
                                <th><?php echo $value['ngaydangtin']?></th>
                                <th><?php echo $value['tacgia']?></th>
                                <th><?php echo $value['solanxem']?></th>
                                <th><?php echo $value['tinhot']?></th>
                                <th><?php echo $value['trangthai']?></th>
                                <th><?php echo $value['id_loaitin']?></th>

                                <th>
                                    <a
                                        href="/NewsWebsite/admin/suabaiviet.php?ma=<?php echo $value['id_tin']?>">Sửa</a>
                                    <a
                                        href="/NewsWebsite/admin/xoabaiviet.php?ma=<?php echo $value['id_tin']?>">Xóa</a>
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