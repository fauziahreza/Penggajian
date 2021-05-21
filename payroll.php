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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Balance</h5>
                                        <span class="h2 font-weight-bold mb-0"><label id="balance">Rp 500.000.000</label></span>
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
                        <div class="row align-items-center">
                            <div class='col-xl-4'>
                                <label for="monthpicker">Month:</label>
                                <input type="month" id="monthpicker" name="monthpicker" min="2020-01" value="2021-04">
                            </div>
                            <div class="col text-right">
                                
                            </div>
                            <div class="col-xl-3 text-right">
                                <div class="input-group rounded">
                                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                        aria-describedby="search-addon" />
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
                                    <th scope="col">Staff Name</th>
                                    <th scope="col">Potition</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Fauziah Reza
                                    </th>
                                    <td>
                                        Mobile Developer
                                    </td>
                                    <td>
                                        Rp 5.000.000
                                    </td>
                                    <td>
                                        Bank Transfer
                                    </td>
                                    <td>
                                        Paid
                                    </td>
                                    <td>
                                        <button type="button" class="editprofile fa fa-edit"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Fauziah Reza
                                    </th>
                                    <td>
                                        Mobile Developer
                                    </td>
                                    <td>
                                        Rp 5.000.000
                                    </td>
                                    <td>
                                        Bank Transfer
                                    </td>
                                    <td>
                                        Paid
                                    </td>
                                    <td>
                                        <button type="button" class="editprofile fa fa-edit"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Fauziah Reza
                                    </th>
                                    <td>
                                        Mobile Developer
                                    </td>
                                    <td>
                                        Rp 5.000.000
                                    </td>
                                    <td>
                                        Bank Transfer
                                    </td>
                                    <td>
                                        Paid
                                    </td>
                                    <td>
                                        <button type="button" class="editprofile fa fa-edit"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Fauziah Reza
                                    </th>
                                    <td>
                                        Mobile Developer
                                    </td>
                                    <td>
                                        Rp 5.000.000
                                    </td>
                                    <td>
                                        Bank Transfer
                                    </td>
                                    <td>
                                        <label id="notpaidyet">Not paid yet</label> 
                                    </td>
                                    <td>
                                        <button type="button" onclick="payNow('paynow','notpaidyet','balance','periodBalance')" id="paynow" class="btn btn-success btn-sm">Pay now</button>
                                        <button type="button" class="editprofile fa fa-edit"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Fauziah Reza
                                    </th>
                                    <td>
                                        Mobile Developer
                                    </td>
                                    <td>
                                        Rp 5.000.000
                                    </td>
                                    <td>
                                        Bank Transfer
                                    </td>
                                    <td>
                                        Paid
                                    </td>
                                    <td>
                                        <button type="button" class="editprofile fa fa-edit"></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
