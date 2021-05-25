<?php
    include("system/connection.php");
?>
<!-- Header -->
<div class="header gradient-bg pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Employee</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-xl-3 text-right">
                            <form action="" method="POST">
                                <div class="input-group rounded">
                                    <input type="search" name="search" value="<?= $_POST["search"]??'' ?>" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <button class="btn btn-dark" type="submit" id="search-addon">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <?php if(isset($_POST["search"])){ ?>
                                        <a href="index.php?page=employee">
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
                                <th scope="col">Position</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $select = mysqli_query($connection, "SELECT * FROM user");
                                if (isset($_POST["search"])) {
                                    $search = $_POST["search"];
                                    $select = mysqli_query($connection, "SELECT * FROM user WHERE NAMA_USER LIKE '%$search%'");
                                }
                                if(isset($_POST['SendEditedData'])){
                                    $id_user = $_POST['iduser'];
                                    $name = $_POST['editnama'];
                                    $jabatan = $_POST['editjabatan'];
                                    $check_editEmployee = mysqli_query($connection, "CALL edit_user($id_user, '$name', '$jabatan')");
                                    if($check_editEmployee){
                                        echo "<script> document.location = 'index.php?page=employee'; </script>";
                                    }else{
                                        echo "<script> alert('[ERROR] Cek database !'); </script>";
                                    }
                                }
                                if(isset($_POST['submitDeleteEmployee'])){
                                    $iduser = $_POST['iduser'];
                                    $delete_query = mysqli_query($connection, "DELETE FROM user WHERE id_user = $iduser");
                                    if($delete_query){
                                        echo "<script> document.location = window.location.href; </script>";
                                    }else{
                                        echo "<script> alert('ERROR! Check Either Database or Source Code'); </script>";
                                    }
                                }
                                while ($data = mysqli_fetch_array($select)) {
                            ?>
                            <tr>
                                <th scope="row"><?= $data['id_user'] ?></th>
                                <td><?= $data['nama_user'] ?></td>
                                <td><?= $data['jabatan'] ?></td>
                                <td><?= $data['join_date'] ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" id="editButton" class="btn btn-primary" data-toggle="modal" data-target="#editEmployee<?= $data['id_user'] ?>">
                                    edit
                                    </button>
                                    <button type="button" id="deleteButton" class="btn btn-danger" data-toggle="modal" data-target="#deleteEmployee<?= $data['id_user'] ?>">
                                    delete
                                    </button>
                                </td>
                            </tr>
                            <!-- Pop up Edit Employee -->
                            <div class="modal fade" id="editEmployee<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="editButton" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Employee : <?= $data['nama_user'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <input type="number" hidden="true" name="iduser" value="<?= $data['id_user'] ?>">
                                            <label for="editnama">Nama : </label>
                                            <input type="text" class="form-control" name="editnama" value="<?= $data['nama_user'] ?>">
                                            <label for="editjabatan">Jabatan : </label>
                                            <input type="text" class="form-control" name="editjabatan" value="<?= $data['jabatan'] ?>">
                                            <?php if ($_SESSION['level_user'] == 'super_admin'){ ?>
                                                <label for="editleveluser">Level User : </label>
                                                <input type="text" class="form-control" name="editjabatan" value="<?= $data['level_user'] ?>">
                                            <?php } ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="SendEditedData" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div> <!-- End of Pop up Edit Employee -->
                            <!-- Pop up Delete Employee -->
                            <div class="modal fade" id="deleteEmployee<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteButton" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Employee : <?= $data['nama_user'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <input type="number" hidden="true" name="iduser" value="<?= $data['id_user'] ?>">
                                            <h1>
                                                Are you sure?
                                            </h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                            <button type="submit" name="submitDeleteEmployee" class="btn btn-danger">Of Course!</button>
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
