<?php include 'header.php'?>
<!-- Page Header -->
<?php
    require 'connect.php';
    if($_GET['pages'] == "All")
    {
        $select_all = $conn->query("SELECT * FROM foods INNER JOIN foods_type ON foods.food_type = foods_type.food_type_name ORDER BY food_name ASC");
    }
    else if($_GET['pages'] == "Cooked")
    {
        $select_all = $conn->query("SELECT * FROM foods INNER JOIN foods_type ON foods.food_type = foods_type.food_type_name WHERE food_type='Cooked' ORDER BY food_name ASC ");
    }
    else if($_GET['pages'] == "Vegetable")
    {
        $select_all = $conn->query("SELECT * FROM foods INNER JOIN foods_type ON foods.food_type = foods_type.food_type_name WHERE food_type='Vegetable' ORDER BY food_name ASC");
    }
    else if($_GET['pages'] == "Boil")
    {
        $select_all = $conn->query("SELECT * FROM foods INNER JOIN foods_type ON foods.food_type = foods_type.food_type_name WHERE food_type='Boil' ORDER BY food_name ASC");
    }
    else if($_GET['pages'] == "Dessert")
    {
        $select_all = $conn->query("SELECT * FROM foods INNER JOIN foods_type ON foods.food_type = foods_type.food_type_name WHERE food_type='Dessert' ORDER BY food_name ASC");
    }
    else if($_GET['pages'] == "Beverage")
    {
        $select_all = $conn->query("SELECT * FROM foods INNER JOIN foods_type ON foods.food_type = foods_type.food_type_name WHERE food_type='Beverage' ORDER BY food_name ASC ");
    }
    else
    {
        $select_all = $conn->query("SELECT * FROM foods INNER JOIN foods_type ON foods.food_type = foods_type.food_type_name ORDER BY food_name ASC");
    }
    
?>
<div class="page-header row no-gutters py-4 mt-3">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title"><?php if($_GET['pages'] == "" || $_GET['pages'] == "All"){echo "เมนูทั้งหมด";}else{echo "เมนู ".$_GET['pages'];} ?></h3>
    </div>
</div>
<hr>
<div class="row">    
    <?php 
        if($select_all->num_rows > 0)
        {
            while($all_menu = $select_all->fetch_object())
            {
    ?>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post card-post--1">
                <div class="card-post__image" style="background-image: url('<?php echo $all_menu->food_image; ?>');">
                    <a href="index.php?pages=" class="card-post__category badge badge-pill badge-success"><?php echo $all_menu->food_type_name; ?></a>
                    <div class="card-post__author d-flex">
                        <a href="javascript:void(0);" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('<?php echo $all_menu->food_type_image; ?>');">Written by Anna Kunis</a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-fiord-blue" href="javascript:void(0);"><?php  echo $all_menu->food_name;?></a>
                    </h5>
                    <span class="text-muted"><div class="text-right"><?php  echo $all_menu->food_price." บาท";?></div></span>
                </div>
            </div>
        </div>
    <?php
            }
        }
        else
        {
            echo "ไม่มี เมนู";
        }
        $conn->close();
    ?>
</div>
<?php include 'footer.php'?>