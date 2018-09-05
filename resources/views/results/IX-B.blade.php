<div id='IX-B' class="datakelas panel-body">
  <div class="col-md-12 alert alert-warning">
    <div class="col-md-6">
      <table class="table table-bordered" style="margin-bottom: 20px">
        <tbody>
          <tr>
            <td>Mata Pelajaran</td>
            <td>{{$data_b['subject']}}</td>
          </tr>
          <tr>
            <td>Nama Guru</td>
            <td>{{$data_b['name']}}</td>
          </tr>
          <tr>
            <td>Nama Ujian</td>
            <td>{{$data_b['subject_test']}}</td>
          </tr>
          <tr>
            <td>Tanggal Ujian</td>
            <td>{{$data_b['start']}}</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>{{$data_b['time']}} menit</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-md-6">
      <table class="table table-bordered" style="margin-bottom: 20px">
        <tbody>
          <tr>
            <td>Jumlah Soal</td>
            <td>{{$data_b['num_questions']}}</td>
          </tr>
          <tr>
            <td>Tertinggi</td>
            <td>{{$data_b['max']}}</td>
          </tr>
          <tr>
            <td>Terendah</td>
            <td>{{$data_b['min']}}</td>
          </tr>
          <tr>
            <td>Rata-rata</td>
            <td>{{$data_b['avg']}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Table -->
  <div class="col-md-12 table-responsive">
    <table id="IX_B-table" class="table table-striped table-bordered table-hover">
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
      @foreach ($result['IX_B'] as $IX_B)
        <tr id ="item{{$IX_B->id}}">
          <td>{{$i}}</td>
          <td>{{$IX_B->user->name}}</td>
          <td>{{$IX_B->class}}</td>
          <td>{{$IX_B->true}}</td>
          <td>{{$IX_B->false}}</td>
          <td>{{$IX_B->value}}</td>
          <td><a onclick="deleteData({{$IX_B->id}})"  class="btn btn-danger btn-xs"><i class="fas fa-times-circle"></i> Batalkan Ujian</a></td>
        </tr>
        @php
          $i++;
        @endphp
      @endforeach
    </table>
  </div>

</div>
