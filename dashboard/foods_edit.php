<?php include 'header.php' ?>
<!-- Page Header -->
<?php
    $food_id = $_GET['id'];
    if(isset($food_id))
    {
        require '../connect.php';
        $food_select = $conn->query("SELECT * FROM foods WHERE food_id = $food_id ");
    } 
    
?>
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">แก้ไข เมนูอาหาร</h3>
    </div>
</div>
<div class="row mb-5">
<?php
    if($food_select->num_rows > 0)
    {
        if($food_edit = $food_select->fetch_object())
        {
?>
        <div class="col-lg-6">
            <img src="../<?=$food_edit->food_image?>" class="img-fluid img-thumbnail" alt="<?=$food_edit->food_name?>">
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header pt-5">
                    <h2><?=$food_edit->food_name?></h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-row mb-4">
                            <div class="col">
                                <label for="food_name">ชื่อเมนู</label>
                                <input type="text" value="<?=$food_edit->food_name?>" name="food_name" id="food_name" class="form-control form-control-lg" placeholder="">
                            </div>
                        </div>
                        <div class="form-row  mb-3">
                            <div class="col">
                                <label for="food_image">อัพโหลดรูปใหม่</label>
                                <input type="file" class="form-control-file mb-3" name="food_image" id="food_image">
                            </div>
                        </div>
                        <div class="form-row  mb-3">
                            <div class="col">
                                <label for="food_price">ราคา</label>
                                <input type="number" value="<?=$food_edit->food_price?>" name="food_price" id="food_price" class="form-control" placeholder="" >
                            </div>
                            <div class="col">
                                <label for="food_type">ประเภทเมนู</label>
                                <select class="form-control">
                                    <?php
                                        $select_type = $conn->query("SELECT * FROM foods_type");
                                        if($select_type->num_rows > 0)
                                        {
                                            echo "<option value='".$food_edit->food_type."'> ประเภทที่ใช้อยู่  ".$food_edit->food_type."</option>";
                                            while($typeFood = $select_type->fetch_object())
                                            {
                                                echo "<option value='".$typeFood->food_type_name."'>".$typeFood->food_type_name."</option>";
                                            }
                                        }
                                    ?>
                                </select>   
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="food_description">รายละเอียดเมนู</label>
                                <textarea class="form-control form-control-lg mb-3" name="food_description" id="food_description" cols="30" rows="5" placeholder="รายละเอียดเมนู" required><?=$food_edit->food_description?></textarea>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning btn-lg btn-block">อัพเดทข้อมูล</button>
                    </form>
                </div>
            </div>
        </div>
<?php
        }
    }
?>
</div>
<!-- End Page Header -->
<?php include 'footer.php' ?>