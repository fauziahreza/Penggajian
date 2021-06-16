<?php
session_start();
if (!isset($_SESSION["email_user"])) {
  header("location: intro.php");
}
include("system/connection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>penggajian</title>
  <!-- Favicon -->
  <link rel="icon" href="asset/images/logo.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <!-- Icons -->
  <link rel="stylesheet" href="asset/library/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="asset/library/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="asset/cetak.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="asset/library/sweetalert/dist/sweetalert2.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="asset/library/css/argon.css" type="text/css">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="asset/styles.css">
</head>
<?php if ($_SESSION["level_user"] == "karyawan") : ?>

  <body onload="getData(<?= $_SESSION['id_user'] ?>)">
  <?php else : ?>

    <body>
    <?php endif; ?>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
      <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
          <a class="navbar-brand" href="javascript:void(0)">
            <img src="asset/images/ketwooo.png" class="navbar-brand-img" alt="...">
          </a>
        </div>
        <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
              <?php if ($_SESSION['level_user'] == 'super_admin' || $_SESSION['level_user'] == 'admin') { ?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=overview">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Overview</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=employee">
                    <i class="ni ni-single-02 text-yellow"></i>
                    <span class="nav-link-text">Employee</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=payroll">
                    <i class="ni ni-credit-card text-primary"></i>
                    <span class="nav-link-text">Payroll</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=AbsentEmployee">
                    <i class="ni ni-bullet-list-67 text-orange"></i>
                    <span class="nav-link-text">Absent Employee</span>
                  </a>
                </li>
              <?php } elseif (($_SESSION['level_user'] == 'karyawan')) { ?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=Attendance">
                    <i class="ni ni-watch-time text-orange"></i>
                    <span class="nav-link-text">Attendance</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="index.php?page=AttendanceHistory">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Attendance History</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=RincianGaji">
                    <i class="ni ni-money-coins text-primary"></i>
                    <span class="nav-link-text">Rincian Gaji</span>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
      <!-- Topnav -->
      <nav class="navbar navbar-top navbar-expand navbar-dark gradient-bg border-bottom">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center  ml-md-auto ml-md-0 ">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="asset/images/profil.jpg">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION["nama_user"] ?></span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right ">
                  <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                  </div>
                  <a href="#!" class="dropdown-item" data-toggle="modal" data-target="#popupProfile">
                    <i class="ni ni-single-02"></i>
                    <span>Account Setting</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="system/logout-system.php" class="dropdown-item">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Page content -->
      <?php
      if (!isset($_GET["page"])) {
        if ($_SESSION['level_user'] == 'super_admin' || $_SESSION['level_user'] == 'admin') {
          include("overview.php");
        } elseif ($_SESSION['level_user'] == 'karyawan') {
          include("attendance.php");
        }
      } else {
        include($_GET["page"] . ".php");
      }
      ?>
    </div>
    <!-- Pop up profile -->
    <div class="modal fade" id="popupProfile" tabindex="-1" role="dialog" aria-labelledby="popupProfile" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-4">
                <!-- Profile picture -->
                <i class="fa fa-user fa-10x"></i>
              </div>
              <?php
              $iduser = $_SESSION['id_user'];
              $selectuser = mysqli_query($connection, "SELECT * FROM user WHERE id_user = $iduser");
              foreach ($selectuser as $data) {
              ?>
                <div class="col-8">
                  <form action="" method="POST">
                    <div class="modal-body">
                      <input type="number" hidden="true" name="iduser" value="<?= $_SESSION['id_user'] ?>">
                      <label for="editnama">Nama : </label>
                      <input type="text" class="form-control" name="editnama" value="<?= $data['nama_user'] ?>">
                      <label for="editjabatan">Email : </label>
                      <input type="text" class="form-control" name="editemail" value="<?= $data['email_user'] ?>">
                      <label for="editjabatan">Alamat : </label>
                      <input type="text" class="form-control" name="editalamat" value="<?= $data['alamat_user'] ?>">
                      <label for="editjabatan">Nomor Telepon : </label>
                      <input type="text" class="form-control" name="editnohp" value="<?= $data['nohp'] ?>">
                      <label for="editjabatan">Password : </label>
                      <input type="password" class="form-control" id=editpassword name="editpassword" value="<?= $data['password_user'] ?>">
                    </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submitData" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php
    if (isset($_POST['submitData'])) {
      $editnama = $_POST['editnama'];
      $_SESSION['nama_user'] = $_POST['editnama'];
      $editemail = $_POST['editemail'];
      $editalamat = $_POST['editalamat'];
      $editnohp = $_POST['editnohp'];
      $editpassword = $_POST['editpassword'];
      mysqli_query($connection, "UPDATE user SET nama_user = '$editnama', email_user = '$editemail', alamat_user = '$editalamat', nohp = '$editnohp', password_user = '$editpassword' WHERE id_user = $iduser");
      echo "<script> document.location = window.location.href; </script>";
    }
    ?>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="asset/library/vendor/jquery/dist/jquery.min.js"></script>
    <script src="asset/library/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/library/vendor/js-cookie/js.cookie.js"></script>
    <script src="asset/library/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="asset/library/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="asset/library/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="asset/library/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Sweetalert -->
    <script src="asset/library/sweetalert/dist/sweetalert2.min.js"></script>
    <!-- Argon JS -->
    <script src="asset/library/js/argon.js?v=1.2.0"></script>
    <!-- Calendar JS -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="asset/index.js"></script>
    <script>
      function getData($id_user) {
        $.ajax({
          method: "GET",
          url: "data.php?data=attendance",
          data: {
            id_user: $id_user
          },
          success: function(res) {
            console.log(res);
            var obj = JSON.parse(res);
            var lastdate = new Date(obj.attendance_date);
            var nowdate = new Date();
            var Difference_In_Time = nowdate.getTime() - lastdate.getTime();
            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
            console.log(lastdate);
            console.log(nowdate);
            console.log(Math.round(Difference_In_Days));
            var lala = new Date(obj.attendance_date);
            var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            if (Math.round(Difference_In_Days) > 3) {
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Anda belum melakukan check in sebanyak ' + (Math.round(Difference_In_Days) - 3) + " hari terhitung setelah tanggal " + lastdate.getDate() + " " + bulan[lastdate.getMonth()] + " " + lastdate.getFullYear(),
                showConfirmButton: true
              })
            }
            $("#aset_id_edit").val(obj.aset_id);
          }
        })
      }
    </script>
    </body>

</html>