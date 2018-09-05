@extends('layouts.master')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="{{ route('home')}}" class="list-group-item list-group-item-action">
            <i class="far fa-user-circle"></i> <b>Dashboard</b>
          </a>
          @if(Auth::user()->isAdmin())
            <a href="{{ route('data-siswa.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt "></i> <b>Data Siswa</b></a>
            <a href="{{ route('data-guru.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Guru</b></a>
          @endif

          @if(Auth::user()->isAdmin() || Auth::user()->isTeacher())
            <a href="{{ route('soal.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Bank Soal</b></a>
            @if (Auth::user()->isTeacher())
              <a href="{{ route('ujian.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Ujian</b></a>
            @endif
            <a href="{{ route('hasil-ujian.index') }}" class="list-group-item list-group-item-action active"><i class="fas fa-list-alt"></i> <b>Hasil Ujian</b></a>
          @endif

        </div>
      </div>

      <div class="col-md-9">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">
            <h4>Daftar Hasil Ujian / Tes</h4>
          </div>
          <div class="panel-body">
          <!-- Table -->
          <div class="table-responsive">
            <table id="result-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th width="30">No</th>
                  <th>Nama Tes</th>
                  <th>Guru</th>
                  <th>Mapel</th>
                  <th>Jumlah Soal</th>
                  <th>Waktu</th>
                  <th>Action</th>
                  </tr>
              </thead>
              @php
                $i=1;
              @endphp
              @foreach ($tests as $test)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$test->subject_test}}</td>
                  <td>{{$test->user->name}}</td>
                  <td>{{$test->subject}}</td>
                  <td>{{$test->num_questions}}</td>
                  <td>{{$test->time}} menit</td>
                  <td><a href="{{ route('hasil-ujian.show', $test->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Hasil</a></td>
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
      var table = $('#result-table').DataTable({
                      processing: true
                    });

      </script>
@endsection
