<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>

                    <p id="info" class="alert alert-info"> <b>Info!</b> <br>
                      - <b>Jml Soal</b>, harap dimasukkan sesuai jumlah soal yang sudah ada di bank soal <br>
                      - <b>Token</b>, merupakan verifikasi siswa untuk mengikutin ujian <br>
                </div>

                <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="subject_test" class="col-md-3 control-label">Nama Ujian</label>
                        <div class="col-md-6">
                            <input type="text" id="subject_test" name="subject_test" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="col-md-3 control-label">Mata Pelajaran</label>
                        <div class="col-md-6">
                            <input type="text" id="subject" name="subject" class="form-control" value="{{Auth::user()->teacher->subject}}" readonly>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="num_questions" class="col-md-3 control-label">Jumlah Soal</label>
                      <div class="col-md-6">
                          <input type="text" id="num_questions" name="num_questions" class="form-control" autofocus placeholder="Masukan Angka" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="start" class="col-md-3 control-label">Tgl Mulai</label>
                      <div class="col-md-6">
                          <input type="date" id="start_date" name="start_date" class="form-control" style="width: 155px; display: inline; float: left"  placeholder="Tgl" required>
                          <input type="time" id="start_time" name="start_time" class="form-control" style="width: 110px; display: inline; float: left" placeholder="Waktu" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="end" class="col-md-3 control-label">Tgl Selesai</label>
                      <div class="col-md-6">
                        <input type="date" id="end_date" name="end_date" class="form-control" style="width: 155px; display: inline; float: left"  placeholder="Tgl" required>
                        <input type="time" id="end_time" name="end_time" class="form-control" style="width: 110px; display: inline; float: left" placeholder="Waktu" required>
                        <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="time" class="col-md-3 control-label">Waktu Ujian</label>
                      <div class="col-md-6">
                          <input type="text" id="time" name="time" class="form-control" style="width: 80px; display: inline; float: left" placeholder="Menit" required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="token" class="col-md-3 control-label">Token</label>
                      <div class="col-md-6">
                          <input type="text" id="token" name="token" class="form-control" style="width: 80px; display: inline; float: left" required>
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
