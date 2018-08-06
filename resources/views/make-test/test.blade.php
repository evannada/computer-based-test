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
            <a href="{{ route('data-siswa.index') }}" class="list-group-item list-group-item-action "><i class="fas fa-list-alt "></i> <b>Data Siswa</b></a>
            <a href="{{ route('data-guru.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Data Guru</b></a>
          @endif

          @if(Auth::user()->isAdmin() || Auth::user()->isTeacher())
            <a href="{{ route('soal.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Bank Soal</b></a>
            @if (Auth::user()->isTeacher())
              <a href="{{ route('ujian.index') }}" class="list-group-item list-group-item-action active"><i class="fas fa-list-alt"></i> <b>Ujian</b></a>
            @endif
            <a href="{{ route('hasil-ujian.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-list-alt"></i> <b>Hasil Ujian</b></a>
          @endif

        </div>
      </div>

      <div class="col-md-9">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">
            <h4>Daftar Ujian / Tes
              <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -9px;"><i class="fas fa-plus"></i> Buat Ujian </a>
            </h4>
          </div>
          <div class="panel-body">
          <!-- Table -->
          <table id="test-teacher-table" class="table table-striped table-responsive">
            <thead>
              <tr>
                <th width="30">No</th>
                <th>Nama Tes</th>
                <th>Mapel</th>
                <th>Tgl Mulai</th>
                <th>Jumlah Soal</th>
                <th>Waktu(Menit)</th>
                <th>Token</th>
                <th>Action</th>
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

@include('make-test/form-test')

@section('script')

    <script type="text/javascript">
      var table = $('#test-teacher-table').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: "{{ route('api.ujian') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'subject_test', name: 'subject_test'},
                        {data: 'subject', name: 'subject'},
                        {data: 'start', name: 'start'},
                        {data: 'num_questions', name: 'num_questions'},
                        {data: 'time', name: 'time'},
                        {data: 'token', name: 'token'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
                    });

                    function addForm() {
                      save_method = "add";
                      $('input[name=_method]').val('POST');
                      $('#modal-form').modal('show');
                      $('#modal-form form')[0].reset();
                      $('.modal-title').text('Input Data');
                    }


                    function editForm(id) {
                      save_method = 'edit';
                      $('input[name=_method]').val('PATCH');
                      $('#modal-form form')[0].reset();
                      $.ajax({
                        url: "{{ url('ujian') }}" + '/' + id + "/edit",
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {

                          $('#modal-form').modal('show');
                          $('.modal-title').text('Edit Data');

                          $('#id').val(data.id);
                          $('#subject_test').val(data.subject_test);
                          $('#subject').val(data.subject);
                          $('#num_questions').val(data.num_questions);
                          $('#start_date').val(data.start_date);
                          $('#start_time').val(data.start_time);
                          $('#end_date').val(data.end_date);
                          $('#end_time').val(data.end_time);
                          $('#time').val(data.time);
                          $('#token').val(data.token);
                        },
                        error : function() {
                            alert("Nothing Data");
                        }
                      });
                    }


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
                                url : "{{ url('ujian') }}" + '/' + id,
                                type : "POST",
                                data : {'_method' : 'DELETE', '_token' : csrf_token},
                                success : function(data) {
                                    table.ajax.reload();
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

                    $(function(){
                          $('#modal-form form').validator().on('submit', function (e) {
                              if (!e.isDefaultPrevented()){
                                  var id = $('#id').val();
                                  if (save_method == 'add') url = "{{ url('ujian') }}";
                                  else url = "{{ url('ujian') . '/' }}" + id;

                                  $.ajax({
                                      url : url,
                                      type : "POST",
                                      data : $('#modal-form form').serialize(),
                                      success : function(data) {
                                          $('#modal-form').modal('hide');
                                          table.ajax.reload();
                                          swal({
                                              title: 'Success!',
                                              text: data.message,
                                              type: 'success',
                                              timer: '1500'
                                          })
                                      },
                                      error : function(data){
                                          swal({
                                              title: 'Opps...',
                                              text: data.responseJSON.message,
                                              type: 'error',
                                              timer: '2000'
                                          })
                                      }
                                  });
                                  return false;
                              }
                          });
                      });
      </script>
@endsection
