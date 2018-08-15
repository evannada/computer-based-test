@extends('layouts.master')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="{{ route('home')}}" class="list-group-item list-group-item-action">
            <i class="far fa-user-circle"></i> <b>Dashboard</b>
          </a>

          @if(Auth::user()->isStudent())
            <a href="{{  url('/ujian-siswa')}}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Ujian</b></a>
            <a href="{{  url('/hasil-ujian-siswa')}}" class="list-group-item list-group-item-action active"><i class="fas fa-list-alt"></i> <b>Hasil Ujian</b></a>
          @endif

        </div>
      </div>

      <div class="col-md-9">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">
            <h4>Laporan Hasil Ujian Siswa</h4>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">
              <h5><b>Download Laporan:</b></h5>
                <a href="{{ url('hasil-ujian-siswa/pdf') }}" class="btn btn-primary btn-sm pull-left" style="margin-top: -9px;"><i class="fas fa-file-pdf"></i> PDF </a>&nbsp;
            </div>
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
            <table id="report-table" class="table table-striped">
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
    <br>
   <br>
  <br>
@endsection

@section('script')

    <script type="text/javascript">
      var table = $('#report-table').DataTable({
                      processing: true
                    });

      </script>
@endsection
