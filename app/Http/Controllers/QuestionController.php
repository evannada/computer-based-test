<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\User;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if (Auth::user()->role == 3) {
        $questions = DB::table('questions')
                      ->select('questions.id', 'questions.user_id', 'users.name','questions.subject',
                                DB::raw('substr(question, 1, 30) as question'),
                                'questions.a', 'questions.b', 'questions.c', 'questions.d', 'questions.correct_answer',
                                'questions.created_at', 'questions.updated_at')
                      ->join('users', 'users.id', '=', 'questions.user_id')
                      ->get();
        return view('questions.question', compact('questions'));

      } else {
        $id = Auth::id();
        $questions = DB::table('questions')
                      ->select('questions.id', 'questions.user_id', 'users.name','questions.subject',
                                DB::raw('substr(question, 1, 30) as question'),
                                'questions.a', 'questions.b', 'questions.c', 'questions.d', 'questions.correct_answer',
                                'questions.created_at', 'questions.updated_at')
                      ->join('users', 'users.id', '=', 'questions.user_id')
                      ->where('users.id', $id)
                      ->get();
        return view('questions.question', compact('questions'));
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('questions.create-question');
      // $users_indo = User::select('users.id', 'users.name', 'teachers.subject')
      //               ->join('teachers', 'users.id', '=', 'teachers.user_id')
      //               ->where('subject', '=', 'Bahasa Indonesia')
      //               ->get();
      //
      // $users_inggris = User::select('users.id', 'users.name', 'teachers.subject')
      //                   ->join('teachers', 'users.id', '=', 'teachers.user_id')
      //                   ->where('subject', '=', 'Bahasa Inggris')
      //                   ->get();
      //
      // $users_mtk = User::select('users.id', 'users.name', 'teachers.subject')
      //                   ->join('teachers', 'users.id', '=', 'teachers.user_id')
      //                   ->where('subject', '=', 'Matematika')
      //                   ->get();
      //
      // $users_ipa = User::select('users.id', 'users.name', 'teachers.subject')
      //                   ->join('teachers', 'users.id', '=', 'teachers.user_id')
      //                   ->where('subject', '=', 'Ilmu Pengetahuan Alam')
      //                   ->get();

        // return view('users.create-question',[
        //   'users_indo'=>$users_indo,
        //   'users_inggris'=>$users_inggris,
        //   'users_mtk'=>$users_mtk,
        //   'users_ipa'=>$users_ipa
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $question = new Question();
          $question->user_id = $request->user_id;
          $question->subject = $request->subject;
          $question->question = $request->question;
          $question->a = $request->a;
          $question->b = $request->b;
          $question->c = $request->c;
          $question->d = $request->d;
          $question->correct_answer = $request->correct_answer;
          $question->save();

          return redirect()->route('soal.index')->with('alert-success', 'Data Berhasil Dibuat.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $data = Question::findOrFail($id);

      return view('questions.edit-question', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);

      $question = Question::findOrFail($id);
      $question->user_id = $request->user_id;
      $question->subject = $request->subject;
      $question->question = $request->question;
      $question->a = $request->a;
      $question->b = $request->b;
      $question->c = $request->c;
      $question->d = $request->d;
      $question->correct_answer = $request->correct_answer;
      $question->save();

      return redirect()->route('soal.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect()->route('soal.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }

    public function apiSoal()
    {
      $user = Question::all();
    }

}
