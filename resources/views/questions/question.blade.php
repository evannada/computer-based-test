
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
            <a href="{{ route('data-siswa.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Siswa</b></a>
            <a href="{{ route('data-guru.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Guru</b></a>
          @endif

          @if(Auth::user()->isAdmin() || Auth::user()->isTeacher())
            <a href="{{ route('soal.index') }}" class="list-group-item list-group-item-action active"><i class="fas fa-list-alt"></i> <b>Bank Soal</b></a>
            @if (Auth::user()->isTeacher())
              <a href="{{ route('ujian.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Ujian</b></a>
            @endif
            <a href="{{ route('hasil-ujian.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Hasil Ujian</b></a>
          @endif

        </div>
      </div>

      <div class="col-md-9">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">
            <h4>Data Soal
              <a href="{{ route('soal.create') }}" class="btn btn-primary pull-right" style="margin-top: -9px;"><i class="fas fa-plus"></i> Tambah Data </a>
            </h4>
          </div>
          <div class="panel-body">
            @if(Session::has('alert-danger'))
					    <div class="alert alert-danger">
				            {{ Session::get('alert-danger') }}
				        </div>
					@endif
          <!-- Table -->
          <div class="table-responsive">
            <table id="question-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th width="30">No</th>
                  <th>Soal</th>
                  <th>Mapel</th>
                  <th>Guru</th>
                  <th>Action</th>
                  </tr>
                </thead>
                {{-- <tbody></tbody> --}}
                  @php
                    $i=1;
                  @endphp
                  @foreach($questions as $question)
      						<tr>
      							<td>{{$i}}</td>
      							<td>{!!$question->question!!}</td>
      							<td>{{$question->subject}}</td>
      							<td>{{$question->name}}</td>
      							<td>
                      <a href="{{ route('soal.edit', $question->id) }}" class="btn btn-primary btn-xs"><i class="far fa-edit"></i>Edit</a>
                      <a onclick="deleteData({{$question->id}})" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i>Delete</a>
      							</td>
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
  // var table = $('#question-table').DataTable({
  //                 processing: true,
  //                 serverSide: true,
  //                 ajax: "{{ route('api.soal') }}",
  //                 columns: [
  //                   {data: 'id', name: 'id'},
  //                   {data: 'question', name: 'question'},
  //                   {data: 'subject', name: 'subject'},
  //                   {data: 'name', name: 'name'},
  //                   {data: 'action', name: 'action', orderable: false, searchable: false}
  //                 ]
  //               });

      $(document).ready( function () {
        $('#question-table').DataTable();
      });

      function deleteData(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {
              $.ajax({
                  url : "{{ url('soal') }}" + '/' + id,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      location.reload();
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          });
        }

  </script>
@endsection
