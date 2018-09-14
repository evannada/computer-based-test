<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true"  data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>

                    <p id="info" class="alert alert-info"> <b>Info!</b> Password otomatis adalah NIS</p>
                </div>

                <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nis" class="col-md-3 control-label">NIS</label>
                        <div class="col-md-6">
                            <input type="text" id="nis" name="nis" class="form-control" maxlength="10" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Nama</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="class" class="col-md-3 control-label">Kelas</label>
                        <div class="col-md-6">
                          <select class="form-control" id="class" name="class" required>
                              <option disabled value="" selected>-</option>
                              <option value="IX-A">IX-A</option>
                              <option value="IX-B">IX-B</option>
                              <option value="IX-C">IX-C</option>
                              <option value="IX-D">IX-D</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="username" class="col-md-3 control-label">Username</label>
                      <div class="col-md-6">
                          <input type="text" id="username" name="username" class="form-control" autofocus required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
