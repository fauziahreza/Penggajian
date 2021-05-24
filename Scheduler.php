<?php 
  include("system/connection.php");
?>
    <!-- Main content -->
        <!-- Header -->
        <div class="header gradient-bg pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">SCHEDULER</h6>
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
                                <div class="col">
                                    <div class="row">
                                        <div class='col-xl-4'>
                                        <label for="yearpicker">Year</label>
                                            <select name="yearpicker" id="yearpicker">
                                            <?php 
                                              $year_list = array('2020','2021');
                                              $cur_year = date("Y");
                                              $selected_year = $_SESSION['yearpicker_schedule']??$cur_year;
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
                                              $selected_month = $_SESSION['monthpicker_schedule']??$cur_month;
                                              foreach($month_list as $month){
                                                  if($selected_month==$month){
                                                      echo "<option value=\"$selected_month\" selected=\"selected\">$selected_month</option>";
                                                  }else{
                                                      echo "<option value=\"$month\">$month</option>";
                                                  }
                                              }
                                            ?>
                                            </select>
                                            <label for="weekpicker"></label>
                                            <select name="weekpicker" id="weekpicker">
                                                <option value="week1">Week 1</option>
                                                <option value="week2">Week 2</option>
                                                <option value="week3">Week 3</option>
                                                <option value="week4">Week 4</option>
                                            </select>
                                            <button class="btn btn-warning">Filter</button>
                                        </div>
                                        <div class="col-xl-4">
                                          <button class="btn btn-info" data-toggle="modal" data-target="#popupAddSchedule"><i class="fa fa-plus"></i> Add Schedule</button>
                                        </div>
                                        <div class="dropdown">
                                            
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
                                    <br><br>
                                    <table class="table align-items-center table-flush table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Employe Name</th>
                                                <th scope="col">Monday</th>
                                                <th scope="col">Tuesday</th>
                                                <th scope="col">Wednesday</th>
                                                <th scope="col">Thuresday</th>
                                                <th scope="col">Friday</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $select = mysqli_query($connection, "SELECT * FROM schedule INNER JOIN user ON schedule.id_user = user.id_user WHERE sc_yearfilter = '$selected_year' AND sc_monthfilter = '$selected_month'");
                                          $selectuser = mysqli_query($connection, "SELECT * FROM schedule");
                                          if (isset($_POST["updatedata"])){
                                              $_SESSION['yearpicker_schedule'] = $_POST['yearpicker'];
                                              $_SESSION['monthpicker_schedule'] = $_POST['monthpicker'];
                                              $yearSESSION = $_SESSION['yearpicker_schedule'];
                                              $monthSESSION = $_SESSION['monthpicker_schedule'];
                                              while ($datas = mysqli_fetch_array($select)){
                                                  $iduser = $datas['id_user'];
                                                  $namauser = $datas['nama_user'];
                                                  // query buat insert data & refresh halaman
                                                  mysqli_query($connection,"INSERT INTO payroll (id_user, year_filter, month_filter) 
                                                  SELECT * FROM (SELECT $iduser, '$yearSESSION', '$monthSESSION') AS tmp 
                                                  WHERE NOT EXISTS (SELECT id_user, year_filter, month_filter FROM payroll 
                                                  WHERE id_user = $iduser AND year_filter = '$yearSESSION' AND month_filter = '$monthSESSION');");
                                              }
                                              echo "<script> document.location = 'index.php?page=payroll'; </script>";
                                          }else{
                                              while ($datas = mysqli_fetch_array($select)){
                                                  $idschedule = $datas['id_schedule'];
                                                  $iduser = $datas['id_user'];
                                                  $namauser = $datas['nama_user'];
                                                  $sc_monday = $datas['schedule_monday'];
                                                  ?>
                                                  <tr>
                                                    <th scope="row">
                                                        <?= $namauser ?>
                                                        <input type="text" name="rownamauser" value="<?= $namauser ?>" hidden>
                                                    </th>
                                                    <td>
                                                        <?= $sc_monday ?>
                                                    </td>
                                                    <td>
                                                        8 AM - 16 PM
                                                    </td>
                                                    <td>
                                                        8 AM - 16 PM
                                                    </td>
                                                    <td>
                                                        8 AM - 16 PM
                                                    </td>
                                                    <td>
                                                        8 AM - 16 PM
                                                    </td>
                                                    <td>
                                                      <button id="buttonEditSchedule" data-toggle="modal" data-target="#popupEditSchedule<?= $idschedule ?>"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                  </tr>
                                                <?php
                                              }
                                          } ?>
                                        </tbody>
                                    </table>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pop up Add Schedule -->
        <div class="modal fade" id="popupAddSchedule" tabindex="-1" role="dialog" aria-labelledby="popupAddSchedule" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                              <tbody>
                                <tr>
                                  <th scope="row">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Monday
                                      </label>
                                    </div>
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>08.00 AM</option>
                                        <option value="1">09.00 AM</option>
                                        <option value="2">10.AM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    ~
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>15.00 PM</option>
                                        <option value="1">16.00 PM</option>
                                        <option value="2">17.00 PM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    +
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>0 Hours</option>
                                        <option value="1">7 Hours</option>
                                        <option value="2">8 Hours</option>
                                        <option value="3">9 Hours</option>
                                      </select>
                                    </td>
                                  </th>
                                </tr>
                                <tr>
                                  <th scope="row">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Tuesday
                                      </label>
                                    </div>
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>08.00 AM</option>
                                        <option value="1">09.00 AM</option>
                                        <option value="2">10.AM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    ~
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>15.00 PM</option>
                                        <option value="1">16.00 PM</option>
                                        <option value="2">17.00 PM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    +
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>0 Hours</option>
                                        <option value="1">7 Hours</option>
                                        <option value="2">8 Hours</option>
                                        <option value="3">9 Hours</option>
                                      </select>
                                    </td>
                                  </th>
                                </tr>
                                <tr>
                                  <th scope="row">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Wednesday
                                      </label>
                                    </div>
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>08.00 AM</option>
                                        <option value="1">09.00 AM</option>
                                        <option value="2">10.AM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    ~
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>15.00 PM</option>
                                        <option value="1">16.00 PM</option>
                                        <option value="2">17.00 PM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    +
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>0 Hours</option>
                                        <option value="1">7 Hours</option>
                                        <option value="2">8 Hours</option>
                                        <option value="3">9 Hours</option>
                                      </select>
                                    </td>
                                  </th>
                                </tr>
                                <tr>
                                  <th scope="row">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Thursday
                                      </label>
                                    </div>
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>08.00 AM</option>
                                        <option value="1">09.00 AM</option>
                                        <option value="2">10.AM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    ~
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>15.00 PM</option>
                                        <option value="1">16.00 PM</option>
                                        <option value="2">17.00 PM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    +
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>0 Hours</option>
                                        <option value="1">7 Hours</option>
                                        <option value="2">8 Hours</option>
                                        <option value="3">9 Hours</option>
                                      </select>
                                    </td>
                                  </th>
                                </tr>
                                <tr>
                                  <th scope="row">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Friday
                                      </label>
                                    </div>
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>08.00 AM</option>
                                        <option value="1">09.00 AM</option>
                                        <option value="2">10.AM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    ~
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>15.00 PM</option>
                                        <option value="1">16.00 PM</option>
                                        <option value="2">17.00 PM</option>
                                      </select>
                                    </td>
                                  </th>
                                  <th scope="row">
                                    +
                                  </th>
                                  <th>
                                    <td>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>0 Hours</option>
                                        <option value="1">7 Hours</option>
                                        <option value="2">8 Hours</option>
                                        <option value="3">9 Hours</option>
                                      </select>
                                    </td>
                                  </th>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Pop up Edit Schedule -->
    <div class="modal fade" id="popupEditSchedule<?= $idschedule ?>" tabindex="-1" role="dialog" aria-labelledby="popupEditSchedule" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Schedule : nama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                          <tbody>
                            <tr>
                              <th scope="row">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Monday
                                  </label>
                                </div>
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>08.00 AM</option>
                                    <option value="1">09.00 AM</option>
                                    <option value="2">10.AM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                ~
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>15.00 PM</option>
                                    <option value="1">16.00 PM</option>
                                    <option value="2">17.00 PM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                +
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>0 Hours</option>
                                    <option value="1">7 Hours</option>
                                    <option value="2">8 Hours</option>
                                    <option value="3">9 Hours</option>
                                  </select>
                                </td>
                              </th>
                            </tr>
                            <tr>
                              <th scope="row">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Tuesday
                                  </label>
                                </div>
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>08.00 AM</option>
                                    <option value="1">09.00 AM</option>
                                    <option value="2">10.AM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                ~
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>15.00 PM</option>
                                    <option value="1">16.00 PM</option>
                                    <option value="2">17.00 PM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                +
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>0 Hours</option>
                                    <option value="1">7 Hours</option>
                                    <option value="2">8 Hours</option>
                                    <option value="3">9 Hours</option>
                                  </select>
                                </td>
                              </th>
                            </tr>
                            <tr>
                              <th scope="row">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Wednesday
                                  </label>
                                </div>
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>08.00 AM</option>
                                    <option value="1">09.00 AM</option>
                                    <option value="2">10.AM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                ~
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>15.00 PM</option>
                                    <option value="1">16.00 PM</option>
                                    <option value="2">17.00 PM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                +
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>0 Hours</option>
                                    <option value="1">7 Hours</option>
                                    <option value="2">8 Hours</option>
                                    <option value="3">9 Hours</option>
                                  </select>
                                </td>
                              </th>
                            </tr>
                            <tr>
                              <th scope="row">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Thursday
                                  </label>
                                </div>
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>08.00 AM</option>
                                    <option value="1">09.00 AM</option>
                                    <option value="2">10.AM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                ~
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>15.00 PM</option>
                                    <option value="1">16.00 PM</option>
                                    <option value="2">17.00 PM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                +
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>0 Hours</option>
                                    <option value="1">7 Hours</option>
                                    <option value="2">8 Hours</option>
                                    <option value="3">9 Hours</option>
                                  </select>
                                </td>
                              </th>
                            </tr>
                            <tr>
                              <th scope="row">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Friday
                                  </label>
                                </div>
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>08.00 AM</option>
                                    <option value="1">09.00 AM</option>
                                    <option value="2">10.AM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                ~
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>15.00 PM</option>
                                    <option value="1">16.00 PM</option>
                                    <option value="2">17.00 PM</option>
                                  </select>
                                </td>
                              </th>
                              <th scope="row">
                                +
                              </th>
                              <th>
                                <td>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>0 Hours</option>
                                    <option value="1">7 Hours</option>
                                    <option value="2">8 Hours</option>
                                    <option value="3">9 Hours</option>
                                  </select>
                                </td>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>