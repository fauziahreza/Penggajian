<?php
$id = $_SESSION['id_user'];
if (!isset($_SESSION["email_user"])) {
    header("location: intro.php");
}
include("system/connection.php");
?>

<!-- Header -->
<div class="header gradient-bg pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Rincian Gaji</h6>
        </div>
      </div>
  </div>
  </div>
</div>
      <!-- Card stats -->
  <div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
    
            <div class="col">
              <label for="inputYearRincianGaji">Year :</label>
              <select id="inputYearRincianGaji" class="form-select">
                <option value="2021">2021</option>
              </select>
            </div>
          </div>
        </div>
        <?php
        if((isset($_GET['inputMonthRincianGaji']) && $_GET['inputMonthRincianGaji']!='') && (isset($_GET['inputYearRincianGaji']) && $_GET['inputYearRincianGaji']!='')){
          $bulan = $_GET['inputMonthRincianGaji'];
          $tahun = $_GET['inputYearRincianGaji'];
          $bulan.$tahun = $bulan.$tahun;
        }
        ?>
        <div class="table-responsive">
          <!-- Projects table -->
          <?php
          $query_data_user = "SELECT * FROM payroll NATURAL JOIN user WHERE id_user = $id AND status_paid = 1 ORDER BY month_filter ASC";
          $sql_data_user = mysqli_query($connection, $query_data_user);
          ?>
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Month</th>
                <th scope="col">Position</th>
                <th scope="col">Salary</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
                while($r_dt_user = mysqli_fetch_array($sql_data_user)){
            ?>
                <tr class="odd gradeX">
                <td><?php echo $r_dt_user['month_filter']; ?></td>
                <td><?php echo $r_dt_user['jabatan']; ?></td>
                <td><?php echo $r_dt_user['salary']; ?></td>
                <td>
                    <a name="update" href="index.php?page=DetailRincianGaji&id=<?php echo $r_dt_user['id_payroll'];?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value="<?php echo $r_dt_user['id_payroll'];?>">Detail</a>
                   
                </td>
                </tr>
            <?php
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
