<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PDF</title>

    {{-- <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}


    <!-- Styles -->
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">

    <!-- fontawesome -->
    <link href="{{ asset('assets/fontawesome/web-fonts-with-css/css/fontawesome-all.css') }}" rel="stylesheet">


    {{-- dataTables --}}
    <link href="{{ asset('assets/datatables/css/dataTables.foundation.css') }}" rel="stylesheet">

    {{-- SweetAlert2 --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id='IX-B' class="datakelas panel-body">
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
                <td>Tanggal Ujian</td>
                <td>{{$data_d['start']}}</td>
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
    <table id="IX_B-table" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th width="30">No</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Jumlah Benar</th>
          <th>Jumlah Salah</th>
          <th>Nilai</th>
          </tr>
      </thead>
      @php
        $i=1;
      @endphp
      @foreach ($results as $result)
        <tr>
          <td>{{$i}}</td>
          <td>{{$result->name}}</td>
          <td>{{$result->class}}</td>
          <td>{{$result->true}}</td>
          <td>{{$result->false}}</td>
          <td>{{$result->value}}</td>
        </tr>
        @php
          $i++;
        @endphp
      @endforeach
    </table>
    </div>
  </body>
</html>
