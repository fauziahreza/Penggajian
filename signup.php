<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.79.0">
        <title>KETWOOO</title>

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="asset/library/fontawesome/css/all.min.css">

        <!-- Bootstrap core CSS -->
        <link href="asset/library/css/bootstrap/bootstrap.min.css" rel="stylesheet" >

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="asset/styles.css">

        <!-- Icon -->
        <link rel="stylesheet" href="asset/library/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="asset/library/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">

        <!-- Argon CSS -->
        <link rel="stylesheet" href="asset/library/css/argon.css" type="text/css">

    </head>
    <body data-spy="scroll" data-target="#navbarSupportedContent" data-offset="30">
        <!--Navbar-->
        <div class="nav-menu fixed-top">
            <div class="container min-vw-100">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="intro.php">
                                <img height="50" width="50" src="asset/images/logo.png" class="img-fluid" alt="logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>          
                            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
                            <div class="mx-auto"></div>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="intro.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contactus">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <header class="gradient-bg" id="home">
            <div class="container mt-auto pb-5">
                <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Sign Up</small>
                        </div>
                        <form role="form" action="system/signup-system.php" method="POST">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                <input class="form-control" name="Name" placeholder="Name" type="text">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                <input class="form-control" name="Email" placeholder="Email" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                <input class="form-control" name="Password" placeholder="Password" type="password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="SendData" class="btn btn-primary my-4">Sign Up</button>
                            </div>
                            <div class="ml-9 col-9">
                                <a href="signin.php" class="text-light"><small>Already have an account</small></a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </header>
        <div class="section footer-bg" id="contactus">
            <table class="contact col-md-9">
                <tr>
                    <td>PT. KELOMPOK 2</td>
                    <td>Email : kelompok2@gmail.com</td>
                </tr>
                <tr>
                    <td>Jalan Raya Telang, Kamal, Madura</td>
                    <td>Telp : 085708900012</td>
                </tr>
            </table>        
        </div>
            <script src="asset/library/jquery/jquery-3.6.0.min.js"></script>
            <script src="asset/library/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>