<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Vinkla\Hashids\Facades\Hashids;
use App\Test;
use App\Question;
use App\Answer;
use App\Result;
use App\User;


class StudentTestController extends Controller
{


    //MENAMPILKAN DAFTAR UJIAN
    public function index()
    {
        return view('students.list');
    }



    //FUNGSI FORM SUBMIT SISWA UJIAN
    public function store(Request $request, $id)
    {
      $test_id = $id;
      $user_id = Auth::user()->id;
      $user = User::findorfail($user_id);
      $class = $user->student->class;
      $jum_soal = $request->jum_soal;
      $result_id = $request->result_id;
      //soal yang dijawab
      $array = $request->jawaban;

        if ($array == null) {
          $result = Result::findOrFail($result_id);
          $result->false = $jum_soal;
          $result->status = 'S';
          $result->save();

          return redirect()->route('ujian-siswa.index')->withSuccess('Ujian telah selesai, klik tombol cek nilai untuk melihat hasil. ');

        } else {
              $arraysoal = array_keys($array);
              $arrayjawaban = array_values($array);
              $count = count($array);
              for ($i=0; $i < $count; $i++) {
                $answer = new Answer();
                $answer->test_id = $test_id;
                $answer->user_id = $user_id;
                $answer->question_id = $arraysoal[$i];
                $answer->answer = $arrayjawaban[$i];
                $answer->save();
              }

              $data = Answer::select('answers.user_id', 'answers.test_id', 'answers.question_id', 'answers.answer', 'questions.correct_answer')
                              ->where('answers.user_id', $user_id)
                              ->where('answers.test_id', $test_id)
                              ->leftJoin('questions', 'answers.question_id', '=', 'questions.id')
                              ->get();

                $jum_benar = 0;

                for ($i=0; $i < $count; $i++) {
                  if ($data[$i]->answer == $data[$i]->correct_answer) {
                      $jum_benar++;
                  }
                }

                if ($jum_benar == 0) {
                  $jum_salah = $jum_soal;
                } else {
                  $jum_salah = $jum_soal - $jum_benar;
                }


                $result = Result::findOrFail($result_id);
                $result->test_id = $test_id;
                $result->user_id = $user_id;
                $result->class = $class;
                $result->true = $jum_benar;
                $result->false = $jum_salah;
                $result->value = $jum_benar/$jum_soal*100;
                $result->status = 'S';
                $result->save();

              return redirect()->route('ujian-siswa.index')->withSuccess('Ujian telah selesai, klik tombol cek nilai untuk melihat hasil. ');
        }

    }



    //MENAMPILKAN UJIAN SISWA
    public function show($encode_id)
    {

      $decode_id = Hashids::decode($encode_id);
      try {
          $test_id = $decode_id[0];
        }
        catch (\Exception $e) {
            return redirect()->route('ujian-siswa.index');
        }

      $user_id = Auth::user()->id;
      $user = User::findorfail($user_id);
      $class = $user->student->class;


      // try {
      //     $id = $decode_id[0];
      //   }
      //   catch (\Exception $e) {
      //       return redirect()->route('ujian-siswa.index');
      //   }


          $cek_ujian_selesai = Result::where('test_id', '=', $test_id)
                                     ->where('user_id', '=', $user_id)
                                     ->where('status', '=', 'S')
                                     ->first();


          $cek_sedang_ujian = Result::where('test_id', '=', $test_id)
                                    ->where('user_id', '=', $user_id)
                                    ->where('status', '=', 'U')
                                    ->first();

      if ($cek_ujian_selesai) {

        return redirect()->route('ujian-siswa.index');

      } else {

          $cek = Result::where('test_id', '=', $test_id)
                        ->where('user_id', '=', $user_id)
                        ->first();


              if ($cek) {
                $result = Result::where('test_id', '=', $test_id)
                                   ->where('user_id', '=', $user_id)
                                   ->first();



                  $detail_ujian = Test::findOrFail($test_id);

                  $data = array(
                    'detail_ujian' => $detail_ujian,
                    'result' => $result
                  );
                  
                  $teacher_id = $detail_ujian->user_id;
                  $num_questions = $detail_ujian->num_questions;

                  $soal_ujian = Question::where('user_id', '=', $teacher_id)
                                        ->take($num_questions)
                                        ->inRandomOrder()
                                        ->get();

                  return view('students.test', compact('data', 'soal_ujian'));

              } else {

                $result = new Result();
                $result->test_id = $test_id;
                $result->user_id = $user_id;
                $result->class = $class;
                $result->true = 0;
                $result->false = 0;
                $result->value = 00.00;
                $result->status = 'U';
                $result->save();

                $result = Result::where('test_id', '=', $test_id)
                                   ->where('user_id', '=', $user_id)
                                   ->first();

                  $detail_ujian = Test::findOrFail($test_id);
                  $data = array(
                    'detail_ujian' => $detail_ujian,
                    'result' => $result
                  );

                  $teacher_id = $detail_ujian->user_id;
                  $num_questions = $detail_ujian->num_questions;

                  $soal_ujian = Question::where('user_id', '=', $teacher_id)
                                        ->take($num_questions)
                                        ->inRandomOrder()
                                        ->get();

                  return view('students.test', compact('data', 'soal_ujian'));
              }
        }

    }


    //VERIFIKASI TOKEN
    public function veriftoken(request $request)
    {
      $encode_id = Hashids::encode($request->id);
      $token = $request->token;
      $veriftoken = Test::where('token', $token)->first();

      if ($veriftoken) {
        return redirect()->route('ujian-siswa.show', $encode_id);
      }
      return redirect()->back()->with('alert-danger', 'Token Salah!!');

    }


    //HASIL NILAI UJIAN SISWA
    public function result($id)
    {
      $test_id = $id;
      $user_id = Auth::user()->id;

      $data = Result::where('test_id', $test_id)
                      ->where('user_id', $user_id)
                      ->first();

      return $data;

    }



    public function ApiUjianSiswa()
    {

        $daftarujian = Test::select('tests.id', 'users.name' ,'tests.subject', 'tests.subject_test',
                                      'tests.num_questions', 'tests.time', 'tests.token')
                ->join('users', 'users.id', '=', 'tests.user_id')
                ->get();

                return Datatables::of($daftarujian)
                      ->addColumn('status', function ($daftarujian){
                        $test_id = $daftarujian->id;
                        $user_id = Auth::user()->id;
                        $cek_ujian_selesai = Result::where('test_id', '=', $test_id)
                                         ->where('user_id', '=', $user_id)
                                         ->where('status', '=', 'S')
                                         ->first();

                        $cek_sedang_ujian = Result::where('test_id', '=', $test_id)
                                          ->where('user_id', '=', $user_id)
                                          ->where('status', '=', 'U')
                                          ->first();

                        if ($cek_ujian_selesai) {
                          return 'ujian selesai';
                        } elseif ($cek_sedang_ujian) {
                          return 'sedang ujian';
                        } else {
                          return 'Tes dibuka';
                        }

                        })
                      ->addColumn('action', function($daftarujian){
                        $test_id = $daftarujian->id;
                        $user_id = Auth::user()->id;
                        $cek_ujian_selesai = Result::where('test_id', '=', $test_id)
                                         ->where('user_id', '=', $user_id)
                                         ->where('status', '=', 'S')
                                         ->first();

                        $cek_sedang_ujian = Result::where('test_id', '=', $test_id)
                                          ->where('user_id', '=', $user_id)
                                          ->where('status', '=', 'U')
                                          ->first();

                        if ($cek_ujian_selesai) {
                          return '<a onclick="showModalResult('. $daftarujian->id .')" class="btn btn-danger btn-xs"><i class="far fa-edit"></i> Cek Nilai</a>';
                        } elseif ($cek_sedang_ujian) {
                          $encode_id = Hashids::encode($daftarujian->id);
                          $url = route('ujian-siswa.show', $encode_id);
                          return '<a href="'.$url.'" class="btn btn-warning btn-xs"><i class="far fa-edit"></i> Lanjut Ujian</a>';
                        } else {
                          return '<a onclick="showModalToken('. $daftarujian->id .')" class="btn btn-primary btn-xs"><i class="far fa-edit"></i> Mulai Ujian</a>';
                        }

                      })->make(true);


    }
}
