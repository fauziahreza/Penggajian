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
                                $data = mysqli_query($connection, "SELECT * FROM user");
                                if (isset($_POST["search"])) {
                                    $search = $_POST["search"];
                                    $select = mysqli_query($connection, "SELECT * FROM user WHERE NAMA_USER LIKE '%$search%'");
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    hapus
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">edit employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
