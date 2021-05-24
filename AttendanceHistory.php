<?php 
  include("system/connection.php");
?>
<!-- Header -->
<div class="header gradient-bg pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Attendance History</h6>
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
          <div class="row">
            <div class="table-responsive">
              <!-- Projects table -->
              <br><br>
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $select = mysqli_query($connection,"SELECT * FROM attendance");
                      $tempnumber = 1;
                      foreach($select as $data){
                    ?>
                    <tr>
                      <th scope="row">
                          <?= $tempnumber ?>
                      </th>
                      <td>
                          <?php $cur_date = date('Y M d'); echo $cur_date; ?>
                      </td>
                      <td>
                        <span class="badge badge-dot mr--4">
                          <i class="bg-success"></i>Attend
                        </span>
                      </td>
                    </tr>
                    <?php
                      $tempnumber++;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
      </div>
    </div>
  </div>
</div>