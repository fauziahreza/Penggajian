
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
                                <div>
                                    <form action="#">
                                        Date :
                                        <input type="date" name="datepicker">
                                    </form>
                                </div>
                                <div class="col">
                                </div>
                                <div class="col-xl-3 text-right">
                                    <div class="input-group rounded">
                                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                        <span class="input-group-text border-0" id="search-addon">
                                            <i class="fas fa-search"></i>
                                          </span>

                                    </div>
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
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            101
                                        </th>
                                        <td>
                                            Fauziah Reza
                                        </td>
                                        <td>
                                            Mobile Developer
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr--4">
                                            <i class="bg-success"></i>
                                            <span class="status">Attend</span>
                                            </span>

                                        </td>
                                        <td>
                                            <div class="col-2">
                                                <button type="button" class="editprofile fa fa-edit" data-toggle="modal" data-target="#mymodal"></button>
                                            </div>
                                        </td>
                                    </tr>
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
                    </div>
                    <p>Additional Information :</p>
                    <textarea class="form-control" placeholder="Additional Information" aria-label="additionalInformation" rows="3"></textarea>
                </div>
                <button type="submit" class="btn bg-gradient-success">Verify</button>
            </div>
            <!-- footer modal -->
        </div>
    </div>
    </div>
    </div>