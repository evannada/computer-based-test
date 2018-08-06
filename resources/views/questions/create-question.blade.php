
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
            <h4>Input Soal</h4>
          </div>

          <div class="panel-body">
            <form method="post" action="{{ route('soal.store') }}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}


                @if (Auth::user()->isTeacher())
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                  <div class="form-group">
                      <label for="subject" class="col-md-2 control-label">Mapel</label>
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="subject" value="{{Auth::user()->teacher->subject}}" readonly>
                        <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group" id="name">
                      <label for="name" class="col-md-2 control-label">Guru</label>
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" readonly>
                        <span class="help-block with-errors"></span>
                      </div>
                  </div>
                @endif

                @if (Auth::user()->isAdmin())
                  <div class="form-group">
                      <label for="subject" class="col-md-2 control-label">Mapel</label>
                      <div class="col-md-6">
                        <select class="form-control" id="subject" name="subject" required>
                            <option disabled value="" selected>-</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
                          </select>
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="user_id" class="col-md-2 control-label">Guru</label>
                      <div class="col-md-6">
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option disabled value="" selected>-</option>
                          </select>
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>
                @endif

                    <div class="form-group">
                        <label for="question" class="col-md-2 control-label">Teks Soal</label>
                        <div class="col-md-9">
                          <textarea id="question" class="form-control" name="question" rows="4" cols="50" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="a" class="col-md-2 control-label">Jawaban a</label>
                        <div class="col-md-9">
                          <textarea id="a" class="form-control" name="a" rows="4" cols="50" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="b" class="col-md-2 control-label">Jawaban b</label>
                        <div class="col-md-9">
                          <textarea id="b" class="form-control" name="b" rows="4" cols="50" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="c" class="col-md-2 control-label">Jawaban c</label>
                        <div class="col-md-9">
                          <textarea id="c" class="form-control" name="c" rows="4" cols="50" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="d" class="col-md-2 control-label">Jawaban d</label>
                        <div class="col-md-9">
                          <textarea id="d" class="form-control" name="d" rows="4" cols="50" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="correct_answer" class="col-md-2 control-label" required>Kunci Jawaban</label>
                        <div class="col-md-2">
                          <select class="form-control" id="correct_answer" name="correct_answer" required>
                              <option disabled value="" selected>-</option>
                              <option value="a">a</option>
                              <option value="b">b</option>
                              <option value="c">c</option>
                              <option value="d">d</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <a href="{{ route('soal.index') }}" type="button" class="btn btn-default">Kembali</a>
                </div>

            </form>
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

    $('#question').ckeditor({
      filebrowserImageBrowseUrl: '/cbt/public/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
      filebrowserBrowseUrl: '/cbt/public/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
    });

    $('#a').ckeditor({
      filebrowserImageBrowseUrl: '/cbt/public/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
      filebrowserBrowseUrl: '/cbt/public/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
    });

    $('#b').ckeditor({
      filebrowserImageBrowseUrl: '/cbt/public/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
      filebrowserBrowseUrl: '/cbt/public/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
    });

    $('#c').ckeditor({
      filebrowserImageBrowseUrl: '/cbt/public/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
      filebrowserBrowseUrl: '/cbt/public/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
    });

    $('#d').ckeditor({
      filebrowserImageBrowseUrl: '/cbt/public/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
      filebrowserBrowseUrl: '/cbt/public/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/cbt/public/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
    });




            $('#subject').on('change',function(){
                var selectedVal = $('#subject option:selected').text();

                if (selectedVal == 'Bahasa Indonesia') {
                  $.ajax({
                    url: "{{ url('api/data-guru-indo') }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                      $('#user_id').empty();
                      $('#user_id').append('<option disabled selected>-</option>');
                      $.each(data, function(key, val){
                          $('#user_id').append('<option value="'+ val.id +'">'+ val.name +'</option>');
                        });
                    }
                  });

                } else if (selectedVal == 'Bahasa Inggris') {
                  $.ajax({
                    url: "{{ url('api/data-guru-inggris') }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                      $('#user_id').empty();
                      $('#user_id').append('<option disabled selected>-</option>');
                      $.each(data, function(key, val){
                          $('#user_id').append('<option value="'+ val.id +'">'+ val.name +'</option>');
                        });
                    }
                  });

                }else if (selectedVal == 'Matematika') {
                  $.ajax({
                    url: "{{ url('api/data-guru-mtk') }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                      $('#user_id').empty();
                      $('#user_id').append('<option disabled selected>-</option>');
                      $.each(data, function(key, val){
                          $('#user_id').append('<option value="'+ val.id +'">'+ val.name +'</option>');
                        });
                    }
                  });
                }else {
                  $.ajax({
                    url: "{{ url('api/data-guru-ipa') }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                      $('#user_id').empty();
                      $('#user_id').append('<option disabled selected>-</option>');
                      $.each(data, function(key, val){
                          $('#user_id').append('<option value="'+ val.id +'">'+ val.name +'</option>');
                        });
                    }
                  });
                }
            });
    </script>


  </script>
@endsection
