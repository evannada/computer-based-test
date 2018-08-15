<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDF</title>

    <!-- Styles -->
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">

    {{-- dataTables --}}
    <link href="{{ asset('assets/datatables/css/dataTables.foundation.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
              <h4>Laporan Hasil Ujian Siswa</h4>
            </div>

            <div id='IX-A' class="datakelas panel-body">
              <div class="col-md-12">
                <div class="col-md-12">
                  <table class="table table-bordered" style="margin-bottom: 20px">
                    <tbody>
                      <tr>
                        <td><b>Nis</b></td>
                        <td><b>{{ Auth::user()->student->nis }}</b></td>
                      </tr>
                      <tr>
                        <td><b>Nama</b></td>
                        <td><b>{{ Auth::user()->name }}</b></td>
                      </tr>
                      <tr>
                        <td><b>Kelas</b></td>
                        <td><b>{{ Auth::user()->student->class }}</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            <!-- Table -->
            <div id class="col-md-12 table-responsive">
              <table id="IX_A-table" class="table table-striped">
                <thead>
                  <tr>
                    <th width="30">No</th>
                    <th>Nama Ujian</th>
                    <th>Mata Pelajaran</th>
                    <th>Tanggal Ujian</th>
                    {{-- <th>Jumlah Soal</th> --}}
                    <th>Nilai</th>
                    </tr>
                </thead>
                @php
                  $i = 1;
                @endphp
                @foreach ($results as $result)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$result->subject_test}}</td>
                    <td>{{$result->subject}}</td>
                    <td>{{$result->start}}</td>
                    {{-- <th>{{$result->num_questions}}</th> --}}
                    <td>{{$result->value}}</td>
                  </tr>
                  @php
                    $i++;
                  @endphp
                @endforeach
              </table>
            </div>
          </div>
        </div>
       </div>
      </div>
     </div>

  </body>
</html>
