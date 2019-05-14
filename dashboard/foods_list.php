<?php include 'header.php' ?>
<?php
    require '../connect.php';
    $select_foods = $conn->query("SELECT * FROM foods WHERE food_admin_id = $user_id ORDER BY food_date ASC");
?>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">เมนูอาหาร ทั้งหมด</h3>
    </div>
</div>
<!-- End Page Header -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-small mb-3">
            <div class="card-body">
                <div class="mb-3 text-right">
                    <a href="foods_add.php" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> เพิ่มเมนูอาหาร</a>
                </div>
                <table class="table table-hover border-bottom table-borderless" id="food_list">
                    <thead class="border-left border-right">
                        <tr>
                            <th class="text-center">ลำดับ</th>
                            <th>รูปเมนู</th>
                            <th>ชื่อเมนู</th>
                            <th class="text-right">ราคา</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($select_foods->num_rows > 0)
                        {
                            $count = 1;
                            while($food_list = $select_foods->fetch_object())
                            {
                        ?>
                        <tr>
                            <td class="align-middle text-center col-lg-1"><?=$count?></td>
                            <td class="text-center col-lg-1"><img src="../<?=$food_list->food_image?>" style="width:40px;height:40px;" class="img-fluid" alt="รูป <?=$food_list->food_name?>"></td>
                            <td class="align-bottom"><?=$food_list->food_name?></td>
                            <td class="align-bottom text-right"><?=$food_list->food_price." บาท"?></td>
                            <td class="align-bottom text-center col-lg-2">
                                <a href="foods_edit.php?id=<?=$food_list->food_id?>" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                                <a href="foods_delete.php?id=<?=$food_list->food_id?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                            $count++;
                            }
                        }
                        else
                        {
                            echo '<tr><td colspan="5"><h1 class="text-center pt-4">ไม่มีเมนูอาหาร</h1></td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>