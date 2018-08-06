<div id='IX-D' class="datakelas panel-body">
  <div class="col-md-12 alert alert-warning">
    <div class="col-md-6">
      <table class="table table-bordered" style="margin-bottom: 20px">
        <tbody>
          <tr>
            <td>Mata Pelajaran</td>
            <td>{{$data_d['subject']}}</td>
          </tr>
          <tr>
            <td>Nama Guru</td>
            <td>{{$data_d['name']}}</td>
          </tr>
          <tr>
            <td>Nama Ujian</td>
            <td>{{$data_d['subject_test']}}</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>{{$data_d['time']}} menit</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-md-6">
      <table class="table table-bordered" style="margin-bottom: 20px">
        <tbody>
          <tr>
            <td>Jumlah Soal</td>
            <td>{{$data_d['num_questions']}}</td>
          </tr>
          <tr>
            <td>Tertinggi</td>
            <td>{{$data_d['max']}}</td>
          </tr>
          <tr>
            <td>Terendah</td>
            <td>{{$data_d['min']}}</td>
          </tr>
          <tr>
            <td>Rata-rata</td>
            <td>{{$data_d['avg']}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<!-- Table -->
<table id="IX_D-table" class="table table-striped table-responsive">
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
  @foreach ($result['IX_D'] as $IX_D)
    <tr id ="item{{$IX_D->id}}">
      <td>{{$i}}</td>
      <td>{{$IX_D->user->name}}</td>
      <td>{{$IX_D->class}}</td>
      <td>{{$IX_D->true}}</td>
      <td>{{$IX_D->false}}</td>
      <td>{{$IX_D->value}}</td>
      <td><a onclick="deleteData({{$IX_D->id}})"  class="btn btn-danger btn-xs"><i class="fas fa-times-circle"></i> Batalkan Ujian</a></td>
    </tr>
    @php
      $i++;
    @endphp
  @endforeach
</table>
</div>
