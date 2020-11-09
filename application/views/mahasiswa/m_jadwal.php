<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Konten -->
  <div class="container">
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="alert notification" style="display: none;">
          <button class="close" data-close="alert"></button>
          <p></p>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="portlet light bordered">
              <div class="portlet-body">
                <div class="table-toolbar">
                  <div class="row">
                    <div class="col-md-6">

                      <div class="row">
                        <div class="btn-group mb-4">
                          <div class="col">
                            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">MIF</button>
                            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo">TIF</button>
                            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree">TKK</button>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-4">
                        <div class="col">
                          <label for="exampleFormControlSelect1 mb-2">Dosen</label>
                          <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="btn-group mb-4">
                          <div class="col">
                            <a href="#" class="btn btn-primary add_calendar"> ADD NEW EVENT
                              <i class="fa fa-plus"></i>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <!-- place -->
                <div id="calendarIO"></div>
                <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form class="form-horizontal" method="POST" action="POST" id="form_create">
                        <input type="hidden" name="calendar_id" value="0">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Create calendar event</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <div class="form-group">
                            <div class="alert alert-danger" style="display: none;"></div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">Title <span class="required"> * </span></label>
                            <div class="col-sm-10">
                              <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2">Description</label>
                            <div class="col-sm-10">
                              <textarea name="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="color" class="col-sm-2 control-label">Color</label>
                            <div class="col-sm-10">
                              <select name="color" class="form-control">
                                <option value="">Choose</option>
                                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                <option style="color:#000;" value="#000">&#9724; Black</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2">Start Date</label>
                            <div class="col-sm-10">
                              <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                <input type="text" name="start_date" class="form-control" readonly>
                                <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2">End Date</label>
                            <div class="col-sm-10">
                              <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                <input type="text" name="end_date" class="form-control" readonly>
                                <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a>
                          <a class="btn btn-danger delete_calendar" style="display: none;">Delete</a>
                          <button type="submit" class="btn green">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- end place -->
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Konten -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->