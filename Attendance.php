<?php 
  include("system/connection.php");
?>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Header -->
    <div class="header gradient-bg pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Attendance</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card stats -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="asset/images/profil.jpg">
                                </span>
                                <?= $_SESSION["nama_user"] ?>
                            </div>
                            <div class="col text-right mr-5">
                                <?= date('d M Y') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <h1>08 PM - 4 PM</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                Office Hours
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col text-center">
                                <form action="" method="POST">
                                    <button class="btn btn-success" name="submit_attendance">Check in</button>
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
    $iduser = $_SESSION["id_user"];
    $cur_date = date('Y-m-d');
    if(isset($_POST['submit_attendance'])){
        mysqli_query($connection,"UPDATE attendance SET attendance_status = 1 WHERE id_user = $iduser AND attendance_date = '$cur_date'");
        echo "<script> document.location = 'index.php?page=AttendanceHistory'; </script>";
    }
?>

