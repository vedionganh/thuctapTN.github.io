<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The perfume - Login</title>

    <!-- Custom fonts for this template-->
    <link href="/NewsWebsite/public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/NewsWebsite/public/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Xin chào</h1>
                                    </div>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                name="u" placeholder="Tên tài khoản">
                                        </div>
                                        <span id="error__user" class="text-danger"></span>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="p" placeholder="Mật khẩu">
                                        </div>
                                        <span id="error__pass" class="text-danger"></span>
                                        <div>
                                            <input class="btn btn-primary btn-user btn-block" name="submit" type="submit" value="Đăng nhập">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
    if(isset($_POST["submit"]))
    {
    if (!isset($_SESSION)) session_start();
    $u = isset($_POST['u'])?$_POST['u']:'';
    $p= isset($_POST['p'])?$_POST['p']:'';
    if ($u=='')
    {
	    echo '
		    <script>
		    var x = document.getElementById("error__user");
		    x.innerHTML = "Tài khoản không được để trống!" ;
		        </script>';
    }
    else if($p=='')
    {
        echo '
            <script>
            var x = document.getElementById("error__pass");
            x.innerHTML = "Mật khẩu không được để trống!" ;
            </script>';
    }
    else
    {
        $o = new PDO('mysql:host=localhost;dbname=tintuc_db', 'root','');
        $p = md5($p);
        $sql="select username, password from users where username=? and password=?";
        $stm= $o->prepare($sql);
        $stm->execute([$u, $p]);
        $n = $stm->rowCount();//tra ve so dong
        //echo "n= $n"; exit;
        if ($n==0)
        {
            echo '<script>
            var x = document.getElementById("error__pass");
            x.innerHTML = "Tài khoản hoặc mật khẩu không chính xác!" ;
            </script>';
        }
        else
        {
            $_SESSION['admin']= $stm->fetch();//lay data gan cho session
            header("location:index.php");
        }
    }
    }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="/NewsWebsite/public/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/NewsWebsite/public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/NewsWebsite/public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/NewsWebsite/public/admin/js/sb-admin-2.min.js"></script>

</body>

</html>