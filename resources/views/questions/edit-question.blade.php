

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
            <form method="post" action="{{ route('soal.update', $data->id) }}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('PATCH') }}

                    <div class="form-group">
                      <input type="hidden" name="user_id"  value="{{$data->user_id}}">
                        <label for="subject" class="col-md-2 control-label">Mapel</label>
                        <div class="col-md-6">
                          <input class="form-control" type="text" name="subject" value="{{$data->subject}}" readonly>
                          <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group" id="name">
                        <label for="name" class="col-md-2 control-label">Guru</label>
                        <div class="col-md-6">
                          <input class="form-control" type="text" name="name" value="{{$data->user->name}}" readonly>
                          <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="question" class="col-md-2 control-label">Teks Soal</label>
                        <div class="col-md-9">
                          <textarea id="question" class="form-control" name="question" rows="4" cols="50" required>{{$data->question}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="a" class="col-md-2 control-label">Jawaban a</label>
                        <div class="col-md-9">
                          <textarea id="a" class="form-control" name="a" rows="4" cols="50" required>{{$data->a}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="b" class="col-md-2 control-label">Jawaban b</label>
                        <div class="col-md-9">
                          <textarea id="b" class="form-control" name="b" rows="4" cols="50" required>{{$data->b}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="c" class="col-md-2 control-label" >Jawaban c</label>
                        <div class="col-md-9">
                          <textarea id="c" class="form-control" name="c" rows="4" cols="50" required>{{$data->c}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="d" class="col-md-2 control-label">Jawaban d</label>
                        <div class="col-md-9">
                          <textarea id="d" class="form-control" name="d" rows="4" cols="50" required>{{$data->d}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="correct_answer" class="col-md-2 control-label">Kunci Jawaban</label>
                        <div class="col-md-2">
                          <select class="form-control" id="correct_answer" name="correct_answer" required>
                              <option disabled value="">-</option>

                              @if ($data->correct_answer == 'a')
                                <option value="a" selected>a</option>
                              @else
                                <option value="a">a</option>
                              @endif

                              @if ($data->correct_answer == 'b')
                                <option value="b" selected>b</option>
                              @else
                                <option value="b">b</option>
                              @endif

                              @if ($data->correct_answer == 'c')
                                <option value="c" selected>c</option>
                              @else
                                <option value="c">c</option>
                              @endif

                              @if ($data->correct_answer == 'd')
                                <option value="d" selected>d</option>
                              @else
                                <option value="d">d</option>
                              @endif
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


    // $(function(){
    //     // $("#user_ipa, #user_indo, #user_inggris, #user_mtk").hide();
    //      $("#subject").change(function(){
    //       var subject = this.value;
    //        if(subject=="Bahasa Indonesia"){
    //          $("#user_ipa, #user_indo, #user_inggris, #user_mtk").hide();
    //           $("#user_indo").show();
    //         } else if (subject=="Bahasa Inggris") {
    //           $("#user_ipa, #user_indo, #user_inggris, #user_mtk").hide();
    //           $("#user_inggris").show();
    //         } else if (subject=="Matematika") {
    //           $("#user_ipa, #user_indo, #user_inggris, #user_mtk").hide();
    //           $("#user_mtk").show();
    //         } else {
    //           $("#user_ipa, #user_indo, #user_inggris, #user_mtk").hide();
    //           $("#user_ipa").show()
    //         }
    //       });
    //     });


    // $(document).ready(function() {
    //   $.ajax ({
    //     url: "{{ route('api.data-guru') }}",
    //     datatype: "json",
    //     success: function(data) {
    //     $.each(data.data, function(index,value){
    //     $("#teacher_id").append('<option value="' + value.id + '">' + value.name +
    //     '</option>');
    //           })
    //          }
    //        });
    //
    //     });


  </script>
@endsection
