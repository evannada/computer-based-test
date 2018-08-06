@extends('layouts.master')


@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="{{ route('home')}}" class="list-group-item list-group-item-action ">
            <i class="far fa-user-circle"></i> <b>Dashboard</b>
          </a>

          @if(Auth::user()->isStudent())
            <a href="{{  url('/ujian-siswa')}}" class="list-group-item list-group-item-action active"><i class="fas fa-list-alt"></i> <b>Ujian</b></a>
          @endif

            </div>
          </div>

          @if (session('success'))
          <div class="col-md-5">
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          </div>
            @endif

          <div class="col-md-9">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">
                <h4>Daftar Ujian</h4>
              </div>
              <div class="panel-body">
                @if(Session::has('alert-danger'))
    					    <div class="alert alert-danger">
    				            {{ Session::get('alert-danger') }}
    				        </div>
    					@endif
              <!-- Table -->
              <table id="test-table" class="table table-striped">
                <thead>
                  <tr>
                    <th width="30">No</th>
                    <th>Nama Tes</th>
                    <th>Mapel</th>
                    <th>Guru</th>
                    <th>Jumlah Soal</th>
                    {{-- <th>Waktu</th> --}}
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
        </div>

@endsection

@include('students/form-veriftoken')
@include('students/result')

@section('script')
  <script type="text/javascript">
      var table = $('#test-table').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: "{{ route('api.ujian-siswa') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'subject_test', name: 'subject_test', orderable: false, searchable: false},
                        {data: 'subject', name: 'subject', orderable: false, searchable: false},
                        {data: 'name', name: 'name', orderable: false, searchable: false},
                        {data: 'num_questions', name: 'num_questions', orderable: false, searchable: false},
                        // {data: 'time', name: 'time'},
                        {data: 'status', name: 'status', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
                    });

                    function showModalToken(id) {
                      save_method = 'veriftoken';
                      $('input[name=_method]').val('POST');
                      $('#modal-form').modal('show');
                      $('#modal-form form')[0].reset();
                      $('#id').val(id);
                      $('.modal-title').text('Input Token');
                    }

                    function showModalResult(id) {
                      $.ajax({
                        url: "{{ url('nilai-siswa') }}" + '/' + id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                          $('#modal-result').modal('show');
                          $('.modal-title').text('Hasil ujian');
                          $('#true').text(data.true);
                          $('#false').text(data.false);
                          $('#value').text(data.value);
                        },
                        error : function() {
                            alert("Nothing Data");
                        }
                      });
                    }


  </script>
@endsection