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

          <div class="panel panel-default">
            <div class="panel-body">
              <h5><b>KELAS :</b></h5>

                <select id='select_class' class="input-sm" name="">
                  <option value="A">IX-A</option>
                  <option value="B">IX-B</option>
                  <option value="C">IX-C</option>
                  <option value="D">IX-D</option>
                </select>

                <a href="{{route('hasil-ujian.IX-D', $test_id)}}" class="btn btn-primary btn-sm pull-right" style="margin-top: -9px;"><i class="fas fa-file-pdf"></i> IX - D </a>&nbsp;
                <a href="{{route('hasil-ujian.IX-C', $test_id)}}" class="btn btn-primary btn-sm pull-right" style="margin-top: -9px;"><i class="fas fa-file-pdf"></i> IX - C </a>&nbsp;
                <a href="{{route('hasil-ujian.IX-B', $test_id)}}" class="btn btn-primary btn-sm pull-right" style="margin-top: -9px;"><i class="fas fa-file-pdf"></i> IX - B </a>&nbsp;
                <a href="{{route('hasil-ujian.IX-A', $test_id)}}" class="btn btn-primary btn-sm pull-right" style="margin-top: -9px;"><i class="fas fa-file-pdf"></i> IX - A </a>&nbsp;

            </div>
          </div>

          <div id='IX-A' class="datakelas panel-body">
            <div class="col-md-12 alert alert-warning">
              <div class="col-md-6">
                <table class="table table-bordered" style="margin-bottom: 20px">
                  <tbody>
                    <tr>
                      <td>Mata Pelajaran</td>
                      <td>{{$data_a['subject']}}</td>
                    </tr>
                    <tr>
                      <td>Nama Guru</td>
                      <td>{{$data_a['name']}}</td>
                    </tr>
                    <tr>
                      <td>Nama Ujian</td>
                      <td>{{$data_a['subject_test']}}</td>
                    </tr>
                    <tr>
                      <td>Tanggal Ujian</td>
                      <td>{{$data_a['start']}}</td>
                    </tr>
                    <tr>
                      <td>Waktu</td>
                      <td>{{$data_a['time']}} menit</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-6">
                <table class="table table-bordered" style="margin-bottom: 20px">
                  <tbody>
                    <tr>
                      <td>Jumlah Soal</td>
                      <td>{{$data_a['num_questions']}}</td>
                    </tr>
                    <tr>
                      <td>Tertinggi</td>
                      <td>{{$data_a['max']}}</td>
                    </tr>
                    <tr>
                      <td>Terendah</td>
                      <td>{{$data_a['min']}}</td>
                    </tr>
                    <tr>
                      <td>Rata-rata</td>
                      <td>{{$data_a['avg']}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          <!-- Table -->
          <div id class="col-md-12 table-responsive">
            <table id="IX_A-table" class="table table-striped table-bordered table-hover">
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
              @foreach ($result['IX_A'] as $IX_A)
                <tr id ="item{{$IX_A->id}}">
                  <td>{{$i}}</td>
                  <td>{{$IX_A->user->name}}</td>
                  <td>{{$IX_A->class}}</td>
                  <td>{{$IX_A->true}}</td>
                  <td>{{$IX_A->false}}</td>
                  <td>{{$IX_A->value}}</td>
                  <td><a onclick="deleteData({{$IX_A->id}})"  class="btn btn-danger btn-xs"><i class="fas fa-times-circle"></i> Batalkan Ujian</a></td>
                </tr>
                @php
                  $i++;
                @endphp
              @endforeach
            </table>
          </div>

        </div>

        @include('results/IX-B')
        @include('results/IX-C')
        @include('results/IX-D')

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

    var table = $('#IX_A-table').DataTable({
                    processing: true
                  });

    var table = $('#IX_B-table').DataTable({
                    processing: true
                  });

    var table = $('#IX_C-table').DataTable({
                    processing: true
                  });

    var table = $('#IX_D-table').DataTable({
                    processing: true
                  });


    $('.datakelas').hide();
    $('#IX-A').show(500);


    $("#select_class").on('change', function() {
          if ($(this).val() == 'A'){
            $('.datakelas').hide();
              $('#IX-A').show(500);
          } else if ($(this).val() == 'B') {
            $('.datakelas').hide();
              $('#IX-B').show(500);
          } else if ($(this).val() == 'C') {
            $('.datakelas').hide();
              $('#IX-C').show(500);
          } else {
            $('.datakelas').hide();
              $('#IX-D').show(500);
          }
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
                                url : "{{ url('hasil-ujian') }}" + '/' + id,
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
