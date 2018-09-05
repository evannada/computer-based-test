@extends('layouts.master')

@section('content')

  <style>
      .funkyradio div {
    clear: both;
    overflow: hidden;
    }

    .funkyradio label {
    width: 100%;
    border-radius: 3px;
    border: 1px solid #D1D3D4;
    font-weight: normal;
    }

    .funkyradio input[type="radio"]:empty,
    .funkyradio input[type="checkbox"]:empty {
    display: none;
    }

    .funkyradio input[type="radio"]:empty ~ label,
    .funkyradio input[type="checkbox"]:empty ~ label {
    position: relative;
    line-height: 2em;
    text-indent: 3.25em;
    margin-top: 5px;
    cursor: pointer;
    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
    }

    .funkyradio input[type="radio"]:empty ~ label:before,
    .funkyradio input[type="checkbox"]:empty ~ label:before {
    position: absolute;
    display: block;
    top: 0;
    bottom: 0;
    left: 0;
    content: '';
    width: 2.5em;
    background: #D1D3D4;
    border-radius: 3px 0 0 3px;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
    color: #888;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
    content: '\2714';
    text-indent: .9em;
    color: #C2C2C2;
    }

    .funkyradio input[type="radio"]:checked ~ label,
    .funkyradio input[type="checkbox"]:checked ~ label {
    color: #777;
    }

    .funkyradio input[type="radio"]:checked ~ label:before,
    .funkyradio input[type="checkbox"]:checked ~ label:before {
    content: '\2714';
    text-indent: .9em;
    color: #333;
    background-color: #ccc;
    }

    .funkyradio input[type="radio"]:focus ~ label:before,
    .funkyradio input[type="checkbox"]:focus ~ label:before {
    box-shadow: 0 0 0 3px #999;
    }

    .funkyradio-default input[type="radio"]:checked ~ label:before,
    .funkyradio-default input[type="checkbox"]:checked ~ label:before {
    color: #333;
    background-color: #ccc;
    }

    .funkyradio-primary input[type="radio"]:checked ~ label:before,
    .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #337ab7;
    }

    .funkyradio-success input[type="radio"]:checked ~ label:before,
    .funkyradio-success input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #5cb85c;
    }

    .funkyradio-danger input[type="radio"]:checked ~ label:before,
    .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #d9534f;
    }

    .funkyradio-warning input[type="radio"]:checked ~ label:before,
    .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #f0ad4e;
    }

    .funkyradio-info input[type="radio"]:checked ~ label:before,
    .funkyradio-info input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #5bc0de;
    }
  </style>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
          <div class="panel panel-primary">
              <div class="panel-heading"><h4>Detail Ujian</h4></div>

              <div class="panel-body">
                  <h5><b>Judul        : {{$data['detail_ujian']->subject_test}}</b></h5>
                  <h5><b>Pelajaran    : {{$data['detail_ujian']->subject}}</b></h5>
                  <h5><b>Guru         : {{$data['detail_ujian']->user->name}}</b></h5>
                  <h5><b>Jumlah Soal  : {{$data['detail_ujian']->num_questions}}</b></h5>
              </div>

          </div>

          <div class="panel panel-primary">
              <div class="panel-body">
                  <h5><b>Petunjuk Umum</b></h5>
                  <h5>Bacalah Basmallah sebelum mengerjakan soal-soal berikut!</h5>
                  <h5>Klik opsi jawaban pada soal yang diujikan</h5>
                  <h5>Periksa dan baca kembali jawaban / soal sebelum menyelesaikan ujian!</h5>
                  <h5>Klik tombol selesai untuk menyelesaikan ujian</h5>
              </div>
          </div>
        </div>

          <div class="col-md-8">
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Soal
                    {{-- <div id='field-countdown' class="btn btn-warning pull-right" style="margin-top: -9px;">{{$data['detail_ujian']->time .':'. '00'}}</div> --}}
                    <div id="countdowntimer" style="font-weight: bold" class="pull-right"><span id="future_date"></span></div>
                  </h4></div>
                  <div class="panel-heading">
                    <div class="text-left">
                      @php
                        $i=1;
                      @endphp
                    @foreach ($soal_ujian as $soal)
                      <a id="nav_button{{ $i }}" class="btn btn-default" onclick="return button({{ $i }})">{{$i}}</a>
                      @php
                        $i++;
                      @endphp
                    @endforeach
                  </div>
                </div>

                  <div class="panel-body">
                    <form id='form-post' action="{{route('ujian-siswa.store', $data['detail_ujian']->id)}}" method="post">
                    {{-- <form id='form-post' method="post"> --}}
            					<input name="_method" type="hidden" value="POST">
            					{{csrf_field()}}
                      <input type="hidden" name="id" value="{{$data['detail_ujian']->id}}">
                      <input type="hidden" id="soal_{{$soal->id}}" name="jum_soal" value="{{$data['detail_ujian']->num_questions}}">
                      <input type="hidden" name="result_id" value="{{$data['result']->id}}">
                      @php
                        $i=1;
                      @endphp
                      @foreach ($soal_ujian as $soal)
                        <div id='soal{{$i}}' class="form-group">
                          <a class="btn btn-danger">{{$i}}</a> <br><br>
                          <h5>{!!$soal->question!!}</h5><br>
                          <div class="funkyradio">
                            <div class="funkyradio-primary">
                              <input type="radio" id="opsi_a_{{$i}}" class="opsi{{$i}}" onclick="return button({{ $i }})" name="jawaban[{{$soal->id}}]" value="a">

                              <label for="opsi_a_{{$i}}"><b>a.</b><br>{!!$soal->a!!}</label>
                            </div>
                            <div class="funkyradio-primary">
                              <input type="radio" id="opsi_b_{{$i}}" class="opsi{{$i}}" onclick="return button({{ $i }})" name="jawaban[{{$soal->id}}]" value="b">
                              <label for="opsi_b_{{$i}}"><b>b.</b><br>{!!$soal->b!!}</label>
                            </div>
                            <div class="funkyradio-primary">
                              <input type="radio" id="opsi_c_{{$i}}" class="opsi{{$i}}" onclick="return button({{ $i }})" name="jawaban[{{$soal->id}}]" value="c">
                              <label for="opsi_c_{{$i}}"><b>c.</b><br>{!!$soal->c!!}</label>
                            </div>
                            <div class="funkyradio-primary">
                              <input type="radio" id="opsi_d_{{$i}}" class="opsi{{$i}}" onclick="return button({{ $i }})" name="jawaban[{{$soal->id}}]" value="d">
                              <label for="opsi_d_{{$i}}"><b>d.</b><br>{!!$soal->d!!}</label>
                            </div>
                          </div>
                        </div>
                        @php
                          $i++;
                        @endphp
                      @endforeach

            						{{-- <div class="align-right"> --}}
            							<input type="submit" class="btn btn-primary pull-right"  onclick="return confirm('Yakin ingin menyelesaikan ujian?'); " value="Selesai">
            						{{-- </div> --}}
            					</form>
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

  $(function(){
    var tgl_mulai = '{{date("Y-m-d H:i:s")}}';
    var tgl_selesai = '{{$data['detail_ujian']->end_time}}';
      $("#future_date").countdowntimer({
          startDate : tgl_mulai,
          dateAndTime : tgl_selesai,
          size : "sm",
          displayFormat: "HMS",
          timeUp : selesai,
      });
	  });

    //  function selesai() {
    //   return confirm('Ujian selesai, waktu habis!!');
    // }


    selesai = function(){
      var url = '{{route('ujian-siswa.store', $data['detail_ujian']->id)}}';
      $.ajax({
          url : url,
          type : "POST",
          data : $('#form-post').serialize(),
          beforeSend: function() {
                      return alert('Ujian selesai, waktu habis!');
                  },
          success : function(data) {
            location.reload();
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
    }






    // hitung();
    //
    //   hitung = function() {
    //     var tgl_mulai = '{{date("Y-m-d H:i:s")}}';
    //     var tgl_selesai = '{{$data['detail_ujian']->end_time}}';
    //
    //     $("#future_date").countdowntimer({
    //         startDate : tgl_mulai,
    //         dateAndTime : tgl_selesai,
    //         size : "lg",
    //         displayFormat: "HMS",
    //         timeUp : selesai,
    //     });
    // }
    //
    // selesai = function(){
    //
    // }
  // sessionStorage.clear();
  // localStorage.clear();
  // location.reload();


      // var seconds = {{$data['detail_ujian']->time*60}};
      //
      // function countdown(seconds) {
      //   seconds = parseInt(sessionStorage.getItem("seconds"))||seconds;
      //   function tick() {
      //     seconds--;
      //     sessionStorage.setItem("seconds", seconds)
      //     var counter = document.getElementById("field-countdown");
      //     var current_minutes = parseInt(seconds/60);
      //     var current_seconds = seconds % 60;
      //     counter.innerHTML = current_minutes + ":" + (current_seconds < 10 ? "0" : "") + current_seconds;
      //     if( seconds > 0 ) {
      //       setTimeout(tick, 1000);
      //     }
      //   }
      //   tick();
      // }
      //
      //
      //
      // countdown(seconds);


    $('.form-group').hide();
    $('#soal1').show();
    $(document).ready(function() {
          $('.opsi1').on('click', function (e) {
            $('#nav_button1').attr('class', 'btn btn-primary');
          });
      });

        function button(id){
            var selected_number = id;
            $('.form-group').hide();
              $('#soal'+selected_number).show();
              $(document).ready(function() {
                    $('.opsi'+selected_number).on('click', function (e) {
                      $('#nav_button'+selected_number).attr('class', 'warna btn btn-primary');
                    });
                });
              };



      //   $(function(){
      //     $('input[type=radio]').each(function(){
      //         var state = JSON.parse( localStorage.getItem('radio_'  + $(this).attr('id')) );
      //         if (state) this.checked = state.checked;
      //     });
      // });
      //
      //
      // $(window).bind('unload', function(){
      //     $('input[type=radio]').each(function(){
      //         localStorage.setItem('radio_' + $(this).attr('id'), JSON.stringify({checked: this.checked})
      //         );
      //     });
      // });



  </script>
@endsection
