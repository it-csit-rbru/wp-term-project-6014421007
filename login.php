<?php
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = $_POST['email'];
        if(isset($email))
        {
            require 'connect.php';
            $check_email = $conn->query("SELECT * FROM user_admin WHERE admin_email='$email'");
            if($check_email->num_rows == 1)
            {
                $password = $_POST['password'];
                if(isset($password))
                {
                    $user_admin = $check_email->fetch_object();
                    if(password_verify($password, $user_admin->admin_password))
                    {
                        session_start();
                        $_SESSION['admin_id'] = $user_admin->admin_id;
                        $_SESSION['admin_name'] = $user_admin->admin_name;
                        $_SESSION['admin_email'] = $user_admin->admin_email;
                        Header("Location: dashboard/index.php");
                    }
                    else
                    {
                        echo "password ไม่ถูกต้อง";
                    }
                }
            }
            else
            {
                echo "อีเมล์ไม่ถูกต้อง";
            }
        }

    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Food Shop | Login</title>
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
                            <h1 class="text-center">เข้าสู่ระบบ</h1>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                  <label for="email"></label>
                                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="อีเมล์" required>
                                </div>
                                <div class="form-group">
                                  <label for="password"></label>
                                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="password" required>
                                </div>
                                <hr class="mt-5 mb-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">เข้าสู่ระบบ</button>
                                
                            </form>
                            <h6 class="text-center mt-3"><a href="index.php" class="text-dark">หน้าหลัก</a> | <a href="signin.php" class="text-dark">สมัครสมาชิก</a></h6>
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