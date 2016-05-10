<?php
    $resp = "";

    require "connectDB.php";
    $conn = connectDB();

    // Cek login
    if(isset($_POST["email"])) {
        $str = login($_POST["email"], $_POST["password"]);

        if(strlen($str) == 0) {
            session_start();
            $_SESSION["userlogin"] = $_POST["email"];
            header("Location: home.php");
        } else {
            $resp = $str;
        }
    }

    function login($email, $pass) {
        $conn = connectDB();

        $sql = "SELECT * FROM `foodie.user` WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        $checkemail = "SELECT * FROM `user` WHERE email='$email'";
        $result2 = mysqli_query($conn, $checkemail);

        $checkPassword = "SELECT * FROM `user` WHERE password='$pass'";
        $result3 = mysqli_query($conn, $checkPassword);

        if(mysqli_num_rows($result2) == 0) {
            mysqli_close($conn);
            return "email tidak valid";
        }

        if(mysqli_num_rows($result3) == 0) {
            mysqli_close($conn);
            return "password tidak valid";
        }

        if(mysqli_num_rows($result) > 0) {
            mysqli_close($conn);
            return "";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TK Basdat</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Javascript -->
    <script type="text/javascript" src="js/myScript.js" ></script>
</head>

<body>
haha hihi
    <!-- Log In -->
    <div id="login" class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
                <div class="well">
                    <h4>Log In</h4>
                    <form method="POST" action="index.php" role="form">
                        <div class="form-group"><br>
                            Email<br>
                            <input type="email" placeholder="Email" class="form-control" id="email" name="email"/><br>
                            Password<br>
                            <input value="" placeholder="Password" class="form-control" id="password" type="password" name="password" /><br><br>
                            <input id="button" class="btn btn-primary" type="submit" value="Enter">
                        </div>
                    </form>
                    <?php echo "<span style='color:red'>".$resp."</span>"; ?>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div id="bottom_of_page" class="bg-primary">
        <br>
    </div>

    <!-- Footer -->
    <footer>
        <div>
            <a id="go-top-toggle" href="#top" class="btn btn-dark">^</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <p><strong>Created by</strong></p>
                    <p>Fauzan M. Baskara | Hamdan Fachry | Rizky Khairullah | Victor Ardianto</p>
                    <br>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom JavaScript -->
    <script>
    // Scrolls to the selected menu item
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
