<?php
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']))
    {
        $name = isset($_POST['name']);
        if(isset($name))
        {
            $email = $_POST['email'];
            if(isset($email))
            {
                require 'connect.php';
                $check_email = $conn->query("SELECT admin_email FROM user_admin WHERE admin_email='$email'");
                if($check_email->num_rows == 0)
                {
                    $password = $_POST['password'];
                    if(isset($password))
                    {
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);
                        $insert_password = $conn->query("INSERT INTO user_admin (admin_email, admin_password, admin_name) VALUES ('$email', '$password_hash', '$name')");
                        if($insert_password == TRUE)
                        {
                            Header("Location: login.php");
                        }
                        else 
                        {
                            echo "Error: " . $insert_password . "<br>" . $conn->error;
                        }
                    }
                }
                else
                {
                    echo "อีเมล์ซ้ำ";
                }
            }
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <div class="container-fluid">
            <div class="row mt-5 pt-5">
                <div class="col-lg-4 m-auto">
                    <div class="card p-4 bg-warning text-white shadow-lg">
                        <div class="card-body">
                            <h1 class="text-center">สมัครสมาชิก</h1>
                            <form action="signin.php" method="post">
                                <div class="form-group">
                                  <label for="name"></label>
                                  <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="ชื่อ" required>
                                </div>
                                <div class="form-group">
                                  <label for="email"></label>
                                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="อีเมล์" required>
                                </div>
                                <div class="form-group">
                                  <label for="password"></label>
                                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="password" required>
                                </div>
                                <hr class="mt-5 mb-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">สมัครสมาชิก</button>
                            </form>
                            <h6 class="text-center mt-3"><a href="index.php" class="text-dark">หน้าหลัก</a> | <a href="login.php" class="text-dark">เข้าสู่ระบบ</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>