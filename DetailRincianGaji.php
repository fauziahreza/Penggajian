<?php
$id = $_SESSION['id_user'];
if (!isset($_SESSION["email_user"])) {
    header("location: intro.php");
}
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
              <h6 class="h2 text-white d-inline-block mb-0">Detail Rincian Gaji</h6>
            </div>
          </div>
		  </div>
      </div>
    </div>
          <!-- Card stats -->
		  <div class="container-fluid mt--6" id="section-to-print">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                </div>
                <div class="col-xl-3 text-right">
                    
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php
              $query = "select * from user where id_user = $id";
              mysqli_query($connection, $query);
              $sql = mysqli_query($connection, $query);
    
              while($r = mysqli_fetch_array($sql)){
                  $nama_user = $r['nama_user'];
                  $jabatan = $r['jabatan'];
              
              ?>

              <?php
              $detail = $_GET['id'];
              $query2 = "select * from payroll where id_payroll = $detail";
              mysqli_query($connection, $query2);
              $sql2 = mysqli_query($connection, $query2);  

              while($r2 = mysqli_fetch_array($sql2)){
                $bulan= $r2['month_filter'];
                $tahun = $r2['year_filter'];
                $gaji = $r2['salary'];
            
              ?>
              <table class="table align-items-center table-flush">
                <tbody>
                  <tr>
                  <center>
                    <br>
                    <h2>SLIP GAJI KARYAWAN <br> COMPANY X <br><br></h2>
                  </center>
                  </tr>
                    <tr>
                        <th scope="row">
                            Company Name
                        </th>
                        <td>
                            PT. KETWOOO
                        </td>
                        <td>
                            
                        </td>
                        <th scope="row">
                            ID Employee
                        </th>
                        <td>
                          <?php echo $r['id_user'];?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Created by
                        </th>
                        <td>
                            Admin
                        </td>
                        <td>
                            
                        </td>
                        <th scope="row">
                            Staff Name
                        </th>
                        <td>
                          <?php echo $r['nama_user'];?>
                        </td>
                    </tr>
					          <tr>
                        <th scope="row">
                            Period
                        </th>
                        <td>
                          <?php echo $r2['month_filter'];?> &nbsp; <?php echo $r2['year_filter'];?>
                        </td>
                        <td>
                            
                        </td>
                        <th scope="row">
                            Position
                        </th>
                        <td>
                          <?php echo $r['jabatan'];?>
                        </td>
                    </tr>
					          <tr>
                        <th scope="row">
                            
                        </th>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <th scope="row">
                            
                        </th>
                        <td>
                            
                        </td>
                    </tr>
					          <tr>
                        <th scope="row">
                            Salary
                        </th>
                        <td>
                            Rp <?php echo $r2['salary'];?>
                        </td>
                        
                    </tr>
					         
                </tbody>
              </table>
              <?php
                }
              ?>
              <?php
                }
              ?>
            </div>
            <div class="card-footer " id="noprint">
              <button type="button" class="btn btn-info float-right" onclick="window.print();">
                Print
              </button>
              <button type="button" onclick="previousPage()" class="btn btn-secondary float-right mr-4">Back</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
