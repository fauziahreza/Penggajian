
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
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                            </select>
                                            <label for="monthpicker">Month:</label>
                                            <select name="monthpicker" id="monthpicker">
                                                <option value="may">May</option>
                                                <option value="april">April</option>
                                                <option value="march">March</option>
                                                <option value="february">February</option>
                                            </select>
                                            <label for="weekpicker"></label>
                                            <select name="weekpicker" id="weekpicker">
                                                <option value="week1">Week 1</option>
                                                <option value="week2">Week 2</option>
                                                <option value="week3">Week 3</option>
                                                <option value="week4">Week 4</option>
                                            </select>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-toggle="modal" data-target="#popupEditSchedule">
                                                <th scope="row">
                                                    Fauziah Reza
                                                </th>
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
                                                    8 AM - 16 PM
                                                </td>
                                            </tr>
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
    <!-- Pop up Edit Schedule -->
    <div class="modal fade" id="popupEditSchedule" tabindex="-1" role="dialog" aria-labelledby="popupEditSchedule" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Schedule : Fauziah Reza</h5>
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