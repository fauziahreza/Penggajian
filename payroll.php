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
                        <h6 class="h1 text-white d-inline-block mb-0">Payroll</h6>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Period : 01/01/2021 - 31/01/2021</h5>
                                        <span class="h2 font-weight-bold mb-0"><label id="periodBalance"><center>Rp 200.000.000</center></label></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Number of Employees</h5>
                                        <span class="h2 font-weight-bold mb-0"><label id="balance">
                                        <?php 
                                            $numberofemployee = 0;
                                            $countuser = mysqli_query($connection, "SELECT * FROM user"); 
                                            foreach($countuser as $counternumber){$numberofemployee+=1;} 
                                            echo "$numberofemployee"; 
                                        ?></label></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class='col-xl-4'>
                            <form action="" method="POST">
                                <label for="yearpicker">Year:</label>
                                <select name="yearpicker" id="yearpicker">
                                    <?php 
                                        $year_list = array('2020','2021');
                                        $cur_year = date("Y");
                                        $selected_year = $_SESSION["yearpicker"]??$cur_year;
                                        foreach($year_list as $year){
                                            if($selected_year==$year){
                                                echo "<option value=\"$selected_year\" selected=\"selected\">$selected_year</option>";
                                            }else{
                                                echo "<option value=\"$year\">$year</option>";
                                            }
                                        }
                                    ?>
                                </select>
                                <label for="monthpicker">Month:</label>
                                <select name="monthpicker" id="monthpicker">
                                    <?php 
                                        $month_list = array('January','February','March','April','May','June','July','August','September','October','November','December');
                                        $cur_month = $selected_month??date("M"); // akan menerapkan ngambil dari database untuk selected month
                                        $selected_month = $_SESSION["monthpicker"]??$cur_month;
                                        foreach($month_list as $month){
                                            if($selected_month==$month){
                                                echo "<option value=\"$selected_month\" selected=\"selected\">$selected_month</option>";
                                            }else{
                                                echo "<option value=\"$month\">$month</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                                <button type="submit" name="updatedata" class="btn btn-danger">Refresh Data</button>
                            </form>
                            <div class="col text-right">
                                
                            </div>
                            <div class="col-xl-3 text-right">
                                <form action="" method="POST">
                                    <div class="input-group rounded">
                                        <input type="search" name="search" value="<?= $_POST["search"]??'' ?>" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                        <button class="btn btn-dark" type="submit" id="search-addon">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <?php if(isset($_POST["search"])){ ?>
                                            <a href="index.php?page=payroll">
                                                <button type="button" class="btn btn-danger">Reset</button>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Staff Name</th>
                                    <th scope="col">Potition</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $select = mysqli_query($connection, "SELECT * FROM payroll INNER JOIN user ON payroll.id_user = user.id_user WHERE year_filter = '$selected_year' AND month_filter = '$selected_month'");
                                    if (isset($_POST["search"])) {
                                        $search = $_POST["search"];
                                        $select = mysqli_query($connection, "SELECT * FROM payroll INNER JOIN user ON payroll.id_user=user.id_user WHERE NAMA_USER LIKE '%$search%' AND year_filter = '$selected_year' AND month_filter = '$selected_month'");
                                    } 
                                    $selectuser = mysqli_query($connection, "SELECT * FROM user");
                                    if (isset($_POST["paynow"])) {
                                        $varStatusPaid = $_POST["statusPaid"];
                                        $varID = $_POST["IDpayroll"];
                                        mysqli_query($connection, "UPDATE PAYROLL SET status_paid = '1' WHERE id_payroll = $varID");
                                        echo "<script> document.location = 'index.php?page=payroll'; </script>";
                                    };
                                    if (isset($_POST["updatedata"])){
                                        $_SESSION['yearpicker'] = $_POST['yearpicker'];
                                        $_SESSION['monthpicker'] = $_POST['monthpicker'];
                                        $yearSESSION = $_SESSION['yearpicker'];
                                        $monthSESSION = $_SESSION['monthpicker'];
                                        while ($datas = mysqli_fetch_array($selectuser)){
                                            $iduser = $datas['id_user'];
                                            $namauser = $datas['nama_user'];
                                            $posisi = $datas['jabatan'];
                                            // query buat insert data & refresh halaman
                                            mysqli_query($connection,"INSERT INTO payroll (id_user, year_filter, month_filter) 
                                            SELECT * FROM (SELECT $iduser, '$yearSESSION', '$monthSESSION') AS tmp 
                                            WHERE NOT EXISTS (SELECT id_user, year_filter, month_filter FROM payroll 
                                            WHERE id_user = $iduser AND year_filter = '$yearSESSION' AND month_filter = '$monthSESSION');");
                                        }
                                        echo "<script> document.location = 'index.php?page=payroll'; </script>";
                                    }else{
                                        while ($datas = mysqli_fetch_array($selectuser)){
                                            $iduser = $datas['id_user'];
                                            $namauser = $datas['nama_user'];
                                            $posisi = $datas['jabatan'];
                                            // query buat insert data & refresh halaman
                                            mysqli_query($connection,"INSERT INTO payroll (id_user, year_filter, month_filter) 
                                            SELECT * FROM (SELECT $iduser, '$selected_year', '$selected_month') AS tmp 
                                            WHERE NOT EXISTS (SELECT id_user, year_filter, month_filter FROM payroll 
                                            WHERE id_user = $iduser AND year_filter = '$selected_year' AND month_filter = '$selected_month');");
                                        }
                                    }
                                    if(isset($_POST['SendEditedDataPayroll'])){
                                        $id_user = $_POST['iduser'];
                                        $idpayroll = $_POST['idpayroll'];
                                        $salary = $_POST['editsalary'];
                                        $check_editPayroll = mysqli_query($connection, "CALL edit_payroll($idpayroll, $salary);");
                                        if($check_editPayroll){
                                            echo "<script> document.location = 'index.php?page=payroll'; </script>";
                                        }else{
                                            echo "<script> alert('[ERROR] Cek database !'); </script>";
                                        }
                                    };
                                    while ($data = mysqli_fetch_array($select)) { ?>
                                <tr>
                                    <th scope="row"><?= $data['nama_user'] ?></th>
                                    <td><?= $data['jabatan'] ?></td>
                                    <td><?= $data['salary'] ?></td>
                                    <td><?= $data['payment_method'] ?></td>
                                    <td>
                                        <?php if($data['status_paid']){echo "Paid";}else{echo "Not paid yet ";} ?>
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="text" name="IDpayroll" value="<?= $data['id_payroll'] ?>" hidden>
                                            <input type="text" name="statusPaid" value="<?= $data['status_paid'] ?>" hidden>
                                            <button type="submit" name="paynow" class="btn btn-success btn-sm" <?php if ($data['status_paid']){echo "disabled";} ?> >Pay now</button>
                                            <button type="button" name="" data-toggle="modal" data-target="#editpayroll<?= $data['id_user'] ?>" class="editprofile fa fa-edit"></button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Pop up Edit -->
                                <div class="modal fade" id="editpayroll<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="editButton" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Payroll : <?= $data['nama_user'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <input type="number" name="idpayroll" value="<?= $data['id_payroll'] ?>">
                                                <input type="number" name="iduser" value="<?= $data['id_user'] ?>" hidden>
                                                <label for="editnama">Nama : </label>
                                                <input type="text" class="form-control" name="editnama" value="<?= $data['nama_user'] ?>" disabled>
                                                <label for="editjabatan">Position: </label>
                                                <input type="text" class="form-control" name="editjabatan" value="<?= $data['jabatan'] ?>" disabled>
                                                <label for="editsalary">Salary</label>
                                                <input type="text" class="form-control" name="editsalary" value="<?= $data['salary'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="SendEditedDataPayroll" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
