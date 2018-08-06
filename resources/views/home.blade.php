@extends('layouts.master')


@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="{{ route('home')}}" class="list-group-item list-group-item-action active">
            <i class="far fa-user-circle"></i> <b>Dashboard</b>
          </a>

          @if(Auth::user()->isAdmin())
            <a href="{{ route('data-siswa.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Siswa</b></a>
            <a href="{{ route('data-guru.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Guru</b></a>
          @endif

          @if(Auth::user()->isAdmin() || Auth::user()->isTeacher())
            <a href="{{ route('soal.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Bank Soal</b></a>
            @if (Auth::user()->isTeacher())
              <a href="{{ route('ujian.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Ujian</b></a>
            @endif
            <a href="{{ route('hasil-ujian.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Hasil Ujian</b></a>
          @endif

          @if(Auth::user()->isStudent())
            <a href="{{ url('/ujian-siswa')}}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Ujian</b></a>
          @endif

            </div>
          </div>

          @if (session('success'))
          <div class="col-md-3">
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          </div>
            @endif

          <div class="col-md-9">
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Dashboard</h4></div>

                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif

                      Hi <b>{{Auth::user()->name}}</b>, You are logged in!
                  </div>
              </div>
            </div>
          </div>
        </div>




@endsection
