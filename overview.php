<?php 
  include("system/connection.php");
  $selectattendance = mysqli_query($connection,"SELECT * FROM attendance INNER JOIN user ON attendance.id_user = user.id_user WHERE attendance_status = 1 LIMIT 3");
  $selectuser = mysqli_query($connection, "SELECT * FROM user ORDER BY join_date DESC LIMIT 6");
  $cur_year = date('Y');
  $cur_month = date('F');
  $selectpayroll = mysqli_query($connection, "SELECT * FROM payroll INNER JOIN user ON payroll.id_user = user.id_user WHERE status_paid = 1 AND year_filter = '$cur_year' AND month_filter = '$cur_month' LIMIT 3");

?>
<!-- Header -->
<div class="header gradient-bg pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Overview</h6>
        </div>
      </div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-md-5 mb-5">
          <div>
            <!-- Card body -->
            <div id="calendar">
              <div id="calendar_header">
                <i class="icon-chevron-left"></i>          
                <h1></h1>
                <i class="icon-chevron-right"></i>         
              </div>
              <div id="calendar_weekdays"></div>
              <div id="calendar_content"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 ml-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Number Of Employee</h5>
                  <span class="h2 font-weight-bold mb-0">
                  <?php 
                    $numberofemployee = 0;
                    $countuser = mysqli_query($connection, "SELECT * FROM user"); 
                    foreach($countuser as $counternumber){$numberofemployee+=1;} 
                    echo "$numberofemployee"; 
                  ?>
                  </span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                  </div>
                </div>
              </div>
              <div class="mt-3 mb-0">
                <div class="col-xl-15">
                  <div class="card mb-4">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Employee</h3>
                        </div>
                        <div class="col text-right">
                          <a href="index.php?page=employee" class="btn btn-sm btn-primary">See all</a>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                              <tr>
                                  <th scope="col">Staff Name</th>
                                  <th scope="col">join date</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                              foreach($selectuser as $data){
                            ?>
                            <tr>
                                <td>
                                    <?= $data['nama_user'] ?>
                                </td>
                                <td>
                                    <?= $data['join_date'] ?>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-7">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Present</h3>
            </div>
            <div class="col text-right">
              <a href="index.php?page=AbsentEmployee" class="btn btn-sm btn-primary">See all</a>
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
            </tr>
          </thead>
            <tbody>
              <?php foreach($selectattendance as $data){ ?>
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
                </tr>
              <?php } ?> 
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-5">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Payroll</h3>
            </div>
            <div class="col text-right">
              <a href="index.php?page=payroll" class="btn btn-sm btn-primary">See all</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">STAFF NAME</th>
                <th scope="col">MONTH</th>
                <th scope="col">STATUS</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach($selectpayroll as $data){
              ?>
              <tr>
                <th scope="row">
                  <?= $data['nama_user'] ?>
                </th>
                <td>
                  <?= $cur_month ?>
                </td>
                <td>
                <?php if($data['status_paid']){echo "Paid";}else{echo "Not paid yet ";} ?>
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
