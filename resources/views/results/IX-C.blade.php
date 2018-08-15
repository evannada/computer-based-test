<div id='IX-C' class="datakelas panel-body">
  <div class="col-md-12 alert alert-warning">
    <div class="col-md-6">
      <table class="table table-bordered" style="margin-bottom: 20px">
        <tbody>
          <tr>
            <td>Mata Pelajaran</td>
            <td>{{$data_c['subject']}}</td>
          </tr>
          <tr>
            <td>Nama Guru</td>
            <td>{{$data_c['name']}}</td>
          </tr>
          <tr>
            <td>Nama Ujian</td>
            <td>{{$data_c['subject_test']}}</td>
          </tr>
          <tr>
            <td>Tanggal Ujian</td>
            <td>{{$data_c['start']}}</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>{{$data_c['time']}} menit</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-md-6">
      <table class="table table-bordered" style="margin-bottom: 20px">
        <tbody>
          <tr>
            <td>Jumlah Soal</td>
            <td>{{$data_c['num_questions']}}</td>
          </tr>
          <tr>
            <td>Tertinggi</td>
            <td>{{$data_c['max']}}</td>
          </tr>
          <tr>
            <td>Terendah</td>
            <td>{{$data_c['min']}}</td>
          </tr>
          <tr>
            <td>Rata-rata</td>
            <td>{{$data_c['avg']}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Table -->
  <div class="col-md-12 table-responsive">
    <table id="IX_C-table" class="table table-striped">
      <thead>
        <tr>
          <th width="30">No</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Jumlah Benar</th>
          <th>Jumlah Salah</th>
          <th>Nilai</th>
          <th>Action</th>
          </tr>
      </thead>
      @php
        $i=1;
      @endphp
      @foreach ($result['IX_C'] as $IX_C)
        <tr id ="item{{$IX_C->id}}">
          <td>{{$i}}</td>
          <td>{{$IX_C->user->name}}</td>
          <td>{{$IX_C->class}}</td>
          <td>{{$IX_C->true}}</td>
          <td>{{$IX_C->false}}</td>
          <td>{{$IX_C->value}}</td>
          <td><a onclick="deleteData({{$IX_C->id}})"  class="btn btn-danger btn-xs"><i class="fas fa-times-circle"></i> Batalkan Ujian</a></td>
        </tr>
        @php
          $i++;
        @endphp
      @endforeach
    </table>
  </div>

</div>
