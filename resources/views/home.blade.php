@extends('layouts.master')


@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="{{ route('home')}}" class="list-group-item list-group-item-action active">
            <i class="far fa-user-circle"></i> <b>Dashboard</b>
          </a>

          @if(Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('data-siswa.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Siswa</b></a>
            <a href="{{ route('data-guru.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Guru</b></a>
            <a href="{{route('data-mapel.index') }}" class="list-group-item list-group-item-action"> <i class="fas fa-list-alt"></i> <b>Data Mapel</b></a>
          @endif

            </div>
          </div>
          <div class="col-md-9">
              <div class="panel panel-default">
                  <div class="panel-heading">Dashboard</div>

                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif

                      You are logged in!
                  </div>
              </div>
            </div>
          </div>
        </div>




@endsection
