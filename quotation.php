<?php
	//fungsi ini digunakan jika beberapa kali gagal, dan jika berhasil login failed_log nya di reset/ dihapus 
	setcookie("failed_log", "", time() - 1, "/");
    require "koneksi.php";

	//periksa apakah ada cookie user_log
	if(!isset($_COOKIE["_beta_log"])){
		header("Location: login.php");
	}

    $nameUser = $_COOKIE["_name_log"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Quotation - Numbering</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Numbering</div>
                        <a class="nav-link" href="internal-letter.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-down-9-1"></i></div>
                            Internal Letter
                        </a>
                        <a class="nav-link" href="letter-out.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-down-9-1"></i></div>
                            Letter Out
                        </a>
                        <a class="nav-link active" href="quotation.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-down-9-1"></i></div>
                            Quotation
                        </a>
                        <a class="nav-link" href="jb.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-down-9-1"></i></div>
                            JB Number
                        </a>
                        <a class="nav-link" href="iom.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-down-9-1"></i></div>
                            Internal Office Memo
                        </a>
                        <a class="nav-link" href="pwr.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-down-9-1"></i></div>
                            Purchase Work Request
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= $nameUser ?>
                    <br>
                    <button type="button" class="btn btn-sm text-white"
                        onclick="return window.location.href='function.php?logout=1'">
                        <i class="fa-solid fa-right-from-bracket"></i> Sign Out
                    </button>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Quotation</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Numbering</li>
                        <li class="breadcrumb-item active">Quotation</li>
                    </ol>



                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
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