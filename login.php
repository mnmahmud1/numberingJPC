<?php

require "koneksi.php";

function generateRandomCode($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomCode = substr(str_shuffle($characters), 0, $length);
    return $randomCode;
}

if(isset($_POST["signin"])){
	$mail = trim(htmlspecialchars($_POST['mail']));
	$password = trim(htmlspecialchars($_POST['password']));

	$checkMailReady = mysqli_query($conn, "SELECT id, name FROM users WHERE email = '$mail'");

	if(mysqli_num_rows($checkMailReady) > 0){
		$getHashPassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM users WHERE email = '$mail'"));
		if(password_verify($password, $getHashPassword['password'])){
			$getID = mysqli_fetch_assoc($checkMailReady);
			$id = $getID['id'];
            $name = $getID['name'];

			// $code = generateRandomCode(8);
			// mysqli_query($conn, "INSERT INTO session_log (user_id, rand_code) VALUES($id, '$code')");
			
			// Menentukan waktu kedaluwarsa cookie (6 jam dalam detik)
			setcookie("_beta_log", "$id", time() + 6 * 60 * 60, "/");
			setcookie("_name_log", "$name", time() + 6 * 60 * 60, "/");
			header("Location: index.php");
			exit;
		}
	}

	if(isset($_COOKIE['failed_log'])){
		// Menentukan waktu kedaluwarsa cookie (1 jam dalam detik)
		setcookie("failed_log", $_COOKIE['failed_log'] + 1, time() + 1 * 60 * 60, "/");
		header("Location: login.php");
	} else {
		// Menentukan waktu kedaluwarsa cookie (1 jam dalam detik)
		setcookie("failed_log", 1, time() + 1 * 60 * 60, "/");
		header("Location: login.php");
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Numbering</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="bg-primary">
    <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <form method="post">
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="mail" name="mail" type="email"
                                                placeholder="name@example.com" maxlength="50" />
                                            <label for="mail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember
                                                Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="#">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary" name="signin">Login</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="#">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website <span id="currentYear"></span></div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script>
    $(document).ready(function() {
        $(".preloader").fadeOut("slow");
    });

    // Mendapatkan tahun terkini
    const currentYear = new Date().getFullYear();

    // Memasukkan tahun ke elemen span
    document.getElementById("currentYear").textContent = currentYear;
    </script>
</body>

</html>