<?php include 'header.php' ?>
<?php
    require '../connect.php';
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $today_start = "'".$year."-".$month."-".$day." 00:00:00'";
    $today_end = "'".$year."-".$month."-".$day." 23:59:59'";
    
    $sum_order = $conn->query("SELECT COUNT(order_date) as total FROM orders WHERE order_date BETWEEN $today_start AND $today_end AND order_admin_id = $user_id");
    if($sum_order->num_rows > 0)
    {
        $sum_order_all = $sum_order->fetch_object();
    }
    $sum_foodmenu = $conn->query("SELECT COUNT(*) as total FROM foods WHERE food_admin_id = $user_id ");
    if($sum_foodmenu->num_rows > 0)
    {
        $sum_foodmenu_all = $sum_foodmenu->fetch_object();
    }
    $sum_money = $conn->query("SELECT SUM(order_price) as total FROM orders WHERE order_admin_id = $user_id");
    if($sum_money->num_rows > 0)
    {
        $sum_money_all = $sum_money->fetch_object();
    }
    $show_order_today = $conn->query("SELECT * FROM orders INNER JOIN status ON orders.order_status = status.status_id WHERE order_admin_id = $user_id AND order_status = 4");
    $show_topten = $conn->query("SELECT MAX(order_price) as total FROM orders  ORDER BY order_list DESC LIMIT 10 WHERE order_admin_id = $user_id ");
?>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">Food Admin Dashboard</h3>
    </div>
</div>
<!-- End Page Header -->
<div class="row">
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">ออเดอร์วันนี้</span>
                        <h6 class="stats-small__value count my-3"><?=number_format($sum_order_all->total,0)?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">จำนวนเมนูทั้งหมด</span>
                        <h6 class="stats-small__value count my-3"><?=number_format($sum_foodmenu_all->total, 0)?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">ยอดเงินทั้งหมด</span>
                        <h6 class="stats-small__value count my-3"><?=number_format($sum_money_all->total, 2)?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <div class="card card-small h-100">
            <div class="card-header border-bottom">
                <h6 class="m-0">รายชื่อเมนู Top 10</h6>
            </div>
            <table class="table table-hover table-striped table-sm">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($show_topten->num_rows > 0)
                    {
                        $count=1;
                        while($show_topten_all = $show_order_today->fetch_object())
                        {
                    ?>
                    <tr>
                        <td><?=$count++?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                        }
                    }
                    else
                    {
                        echo '<tr><td colspan="3"><h3 class="text-center pt-4">ไม่มีออเดอร์</h3></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-12 mb-4">
        <div class="card card-small h-100">
            <div class="card-header border-bottom">
                <h6 class="m-0">ออเดอร์วันนี้</h6>
            </div>
            <div class="card-body d-flex flex-column">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หมายเลขรายการ</th>
                            <th>ชื่อเมนู</th>
                            <th>เวลา</th>
                            <th>สถานะ</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($show_order_today->num_rows > 0)
                            {
                                $count = 1;
                                while($show_order_today_all = $show_order_today->fetch_object())
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
    </div>
</div>
<?php include 'footer.php' ?>