<?php 
  include("system/connection.php");
?>
        <!-- Header -->
        <div class="header gradient-bg pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Absent Employee</h6>
                        </div>
                    </div>
                    <!-- Card stats -->
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col"></div>
                                <div class="col-xl-3 text-right">
                                    <form action="" method="POST">
                                        <div class="input-group rounded">
                                            <input type="search" name="search" value="<?= $_POST["search"]??'' ?>" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                            <button class="btn btn-dark" type="submit" id="search-addon">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <?php if(isset($_POST["search"])){ ?>
                                                <a href="index.php?page=AbsentEmployee">
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
                                        <th scope="col">ID</th>
                                        <th scope="col">Staff Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $select = mysqli_query($connection,"SELECT * FROM attendance INNER JOIN user ON attendance.id_user = user.id_user ORDER BY attendance_date DESC");
                                    if (isset($_POST["search"])) {
                                        $search = $_POST["search"];
                                        $select = mysqli_query($connection, "SELECT * FROM attendance INNER JOIN user ON attendance.id_user = user.id_user WHERE nama_user LIKE '%$search%'");
                                    }
                                    if(isset($_POST['editattendance'])){
										$cur_date = date('Y-m-d');
                                        $attendance = $_POST['attendance'];
										$id_attendance = $_POST['id_attendance'];
                                        echo $attendance;
										echo $id_attendance;
                                        mysqli_query($connection,"UPDATE attendance SET attendance_status = $attendance WHERE id_attendance = $id_attendance ");
                                        echo "<script> document.location = 'index.php?page=AbsentEmployee'; </script>";
                                    }
                                   while ($data = mysqli_fetch_array($select)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <?= $data['id_user'] ?>
                                        </th>
                                        <td>
                                            <?= $data['nama_user'] ?>
                                        </td>
                                        <td>
                                            <?= $data['attendance_date'] ?>
                                        </td>
                                        <td>
                                        <?php 
                                            if($data['attendance_status'] == 1){ 
                                            echo '<span class="badge badge-dot mr--4">
                                            <i class="bg-success"></i>Attend
                                            </span>';

                                            }else{ 
                                            echo '<span class="badge badge-dot mr--4">
                                            <i class="bg-danger"></i>Not Attend
                                            </span>';
                                        } ?>
                                        </td>
                                        <td>
                                            <div class="col-4">
                                                <button type="button" class="editprofile fa fa-edit" data-toggle="modal" data-target="#edit_attend<?= $data['id_attendance'] ?>"></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div  class="modal fade" id="edit_attend<?= $data['id_attendance'] ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- konten modal-->
                                            <div class="modal-content">
                                                <!-- heading modal -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit attendance : <?= $data['nama_user'] ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- body modal -->
                                                <form action="" method="POST">
                                                <div class="modal-body">
                                                    <p>Select Conditions :</p>
                                                    <div class="btn-group-vertical btn-group-toggle" data-toggle="buttons">
													<input type="number" hidden="true" name="id_attendance" value="<?= $data['id_attendance'] ?>"> <!-- e-->
                                                        <label class="btn btn-outline-success">
                                                            <input type="radio" name="attendance" id="attendance-yes" autocomplete="off" value="1">Attend
															
                                                        </label>
                                                        <br>
                                                        <label class="btn btn-outline-danger">
                                                            <input type="radio" name="attendance" id="attendance-no" autocomplete="off" value="0">Absent
                                                        </label>
                                                        <br>
                                                    </div>
                                                </div>
                                                <button type="submit" name="editattendance" class="btn bg-gradient-success">Update</button>
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

    <!-- Modal -->
    <div id="mymodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Verification of employee attendance</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <p>Select Conditions :</p>
                    <div class="btn-group-vertical btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input type="radio" name="attendance" id="attendance-yes" autocomplete="off">Attend
                        </label>
                        <br>
                        <label class="btn btn-outline-danger">
                            <input type="radio" name="attendance" id="attendance-no" autocomplete="off">Absent
                        </label>
                        <br>
                    </div></div>
                <button type="submit" class="btn bg-gradient-success">Update</button>
            </div>
            <!-- footer modal -->
        </div>
    </div>
    </div>
    </div>
