<?php include 'header.php' ?>
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
                        <h6 class="stats-small__value count my-3">2,390</h6>
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
                        <h6 class="stats-small__value count my-3">2,390</h6>
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
                        <h6 class="stats-small__value count my-3">2,390</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
        <div class="card card-small">
            <div class="card-header border-bottom">
                <h6 class="m-0">Users</h6>
            </div>
            <div class="card-body pt-0">
                <div class="row border-bottom py-2 bg-light">
                    <div class="col-12 col-sm-6">
                        <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                            <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                            <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="material-icons"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                        <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report &rarr;</button>
                    </div>
                </div>
                <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-md-6 col-sm-12 mb-4">
        <div class="card card-small h-100">
            <div class="card-header border-bottom">
                <h6 class="m-0">เพิ่มเมนูใหม่</h6>
            </div>
            <div class="card-body d-flex flex-column">
                <form class="quick-post-form">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brave New World">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Words can be like X-rays if you use them properly..."></textarea>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-accent">เพิ่มเมนูใหม่</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-6 col-sm-12 mb-4">
        <div class="card card-small h-100">
            <div class="card-header border-bottom">
                <h6 class="m-0">ออเดอร์ทั้งหมด</h6>
            </div>
            <div class="card-body d-flex flex-column">
                <table>
                    <thead>
                        <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>