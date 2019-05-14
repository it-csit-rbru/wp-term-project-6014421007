<?php include 'header.php' ?>
<!-- Page Header -->
<?php
    require '../connect.php';
    $show_order = $conn->query("SELECT * FROM orders WHERE order_admin_id = $user_id");
?>
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">ออเดอร์ทั้งหมด</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>หมายเลขรายการ</th>
                    <th>รายการอาหาร</th>
                    <th>ราคา</th>
                    <th>เวลา</th>
                    <th>สถานะ</th>
                    <th>แก้ไข</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($show_order->num_rows > 0)
                    {
                        $count = 1;
                        while($show_order_all = $show_order->fetch_object())
                        {
                ?>
                <tr>
                    <td><?=$count++?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                        }
                    }
                    else
                    {
                        echo '<tr><td colspan="7"><h1 class="text-center pt-4">ไม่มีออเดอร์</h1></td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Page Header -->
<?php include 'footer.php' ?>