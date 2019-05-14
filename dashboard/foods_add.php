<?php include 'header.php' ?>
<?php
    if(isset($_POST['food_name']) && isset($_POST['food_price']) && isset($_POST['food_type']))
    {
        $food_name = $_POST['food_name'];
        if($_FILES['food_image'])
        {
            if(move_uploaded_file($_FILES["food_image"]["tmp_name"],"../images/upload_foodmenu/".$_FILES["food_image"]["name"]))
            {
                $food_image = "images/upload_foodmenu/".$_FILES["food_image"]["name"];
            }
            else
            {
                echo "อัพโหลดรูปไม่สำเร็จ";
            }
        }
        else
        {
            $food_image = "images/unimage.jpg";
        }
        $food_description = $_POST['food_description'];
        $food_price = $_POST['food_price'];
        $food_type = $_POST['food_type'];

        require '../connect.php';

        $insert_foods = $conn->query("INSERT INTO foods(food_admin_id, food_name, food_image, food_description, food_price, food_type) VALUES ('$user_id','$food_name','$food_image','$food_description','$food_price','$food_type')");
        if($insert_foods == TRUE)
        {
            Header("Location: foods_list.php");
        }
    }
?>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">เพิ่ม เมนูอาหาร</h3>
    </div>
</div>
<!-- End Page Header -->
<form action="foods_add.php" method="post"  enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="card card-small mb-3">
                <div class="card-body">
                    <div class="form-group">
                    <input class="form-control form-control-lg mb-3" name="food_name" type="text" placeholder="ชื่อเมนู" required>
                    <input type="file" class="form-control-file mb-3" name="food_image" id="food_image">
                    <textarea class="form-control form-control-lg mb-3" name="food_description" id="" cols="30" rows="15" placeholder="รายละเอียดเมนู" required></textarea>
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card card-small mb-3">
                <div class="card-body">
                <label for="food_price">ราคา</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="food_price" name="food_price" placeholder="00.0" aria-describedby="food_price_b" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="food_price_b"> บาท</span>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="card card-small mb-3">
                <div class="card-body">
                    <label for="food_price">ประเภทอาหาร</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_type" id="Cooked" value="Cooked" checked>
                        <label class="form-check-label" for="Cooked">
                        เมนูทั่วไป
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_type" id="Vegetable" value="Vegetable" >
                        <label class="form-check-label" for="Vegetable">
                        เมนูผัก
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_type" id="Boil" value="Boil" >
                        <label class="form-check-label" for="Boil">
                        เมนูต้ม
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_type" id="Dessert" value="Dessert" >
                        <label class="form-check-label" for="Dessert">
                        ของหวาน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_type" id="Beverage" value="Beverage" >
                        <label class="form-check-label" for="Beverage">
                        เครื่องดื่ม
                        </label>
                    </div>
                </div>
            </div>  
            <button type="submit" class="btn btn-warning btn-lg btn-block">เพิ่มเมนูอาหาร</button>          
        </div>
    </div>
</form>
<?php include 'footer.php' ?>