<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Result;
use App\Answer;
use App\Test;
use App\User;
use PDF;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->role == 3) {
        $tests = Test::All();
        return view('results.result', compact('tests'));
      } else {
        $user_id = Auth::user()->id;
        $tests = Test::where('user_id', $user_id)->get();
        return view('results.result', compact('tests'));
      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $test_id = $id;

      $test = Test::findorfail($id);
      $test = Test::where('id', $test_id)->first();

      $max_a = Result::where('test_id', $test_id)->where('class', 'IX-A')->max('value');
      $min_a = Result::where('test_id', $test_id)->where('class', 'IX-A')->min('value');
      $avg_a = Result::where('test_id', $test_id)->where('class', 'IX-A')->avg('value');

      $max_b = Result::where('test_id', $test_id)->where('class', 'IX-B')->max('value');
      $min_b = Result::where('test_id', $test_id)->where('class', 'IX-B')->min('value');
      $avg_b = Result::where('test_id', $test_id)->where('class', 'IX-B')->avg('value');

      $max_c = Result::where('test_id', $test_id)->where('class', 'IX-C')->max('value');
      $min_c = Result::where('test_id', $test_id)->where('class', 'IX-C')->min('value');
      $avg_c = Result::where('test_id', $test_id)->where('class', 'IX-C')->avg('value');

      $max_d = Result::where('test_id', $test_id)->where('class', 'IX-D')->max('value');
      $min_d = Result::where('test_id', $test_id)->where('class', 'IX-D')->min('value');
      $avg_d = Result::where('test_id', $test_id)->where('class', 'IX-D')->avg('value');

      $data_a = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_a,
        'min' => $min_a,
        'avg' => $avg_a
      );

      $data_b = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_b,
        'min' => $min_b,
        'avg' => $avg_b
      );

      $data_c = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_c,
        'min' => $min_c,
        'avg' => $avg_c
      );

      $data_d = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_d,
        'min' => $min_d,
        'avg' => $avg_d
      );


      $IX_A = Result::where('test_id', $test_id)
                    ->where('class', 'IX-A')
                    ->get();

      $IX_B = Result::where('test_id', $test_id)
                    ->where('class', 'IX-B')
                    ->get();

      $IX_C = Result::where('test_id', $test_id)
                    ->where('class', 'IX-C')
                    ->get();

      $IX_D = Result::where('test_id', $test_id)
                    ->where('class', 'IX-D')
                    ->get();

      $result = array(
                      'IX_A' => $IX_A,
                      'IX_B' => $IX_B,
                      'IX_C' => $IX_C,
                      'IX_D' => $IX_D,
                    );

        return view('results.show')->with(compact('test_id','result', 'data_a', 'data_b', 'data_c', 'data_d'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = Result::findOrFail($id);
      $user_id = $result->user_id;
      $test_id = $result->test_id;

      $answer = Answer::where('test_id', $test_id)
                      ->where('user_id', $user_id)
                      ->get();

      $count = count($answer);

      for ($i=0; $i < $count; $i++) {
        $answer[$i]->delete();
      }

      Result::destroy($id);
    }


    public function pdf_a($id)
    {
      $test_id = $id;
      $test = Test::where('id', $test_id)->first();

      $max_a = Result::where('test_id', $test_id)->where('class', 'IX-A')->max('value');
      $min_a = Result::where('test_id', $test_id)->where('class', 'IX-A')->min('value');
      $avg_a = Result::where('test_id', $test_id)->where('class', 'IX-A')->avg('value');

      $data_a = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_a,
        'min' => $min_a,
        'avg' => $avg_a
      );

      $results = Result::select('results.test_id', 'users.name', 'results.class', 'results.true', 'results.false', 'results.value')
                    ->where('test_id', $test_id)
                    ->where('class', 'IX-A')
                    ->leftJoin('users', 'users.id', '=', 'results.user_id')
                    ->orderBy('name', 'asc')
                    ->get();

      $subject_test = $test->subject_test;
      $pdf = PDF::loadView('results.pdf-ix-a',compact('results', 'data_a'));
      return $pdf->download('IX-A.pdf');

    }

    public function pdf_b($id)
    {
      $test_id = $id;
      $test = Test::where('id', $test_id)->first();

      $max_b = Result::where('test_id', $test_id)->where('class', 'IX-B')->max('value');
      $min_b = Result::where('test_id', $test_id)->where('class', 'IX-B')->min('value');
      $avg_b = Result::where('test_id', $test_id)->where('class', 'IX-B')->avg('value');

      $data_b = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_b,
        'min' => $min_b,
        'avg' => $avg_b
      );

      $results = Result::select('results.test_id', 'users.name', 'results.class', 'results.true', 'results.false', 'results.value')
                    ->where('test_id', $test_id)
                    ->where('class', 'IX-B')
                    ->leftJoin('users', 'users.id', '=', 'results.user_id')
                    ->orderBy('name', 'asc')
                    ->get();
      // return view('results.pdf-ix-b',compact('results', 'data_b'));

      $pdf = PDF::loadView('results.pdf-ix-b',compact('results', 'data_b'));
      return $pdf->download('IX-B.pdf');

    }

    public function pdf_c($id)
    {
      $test_id = $id;
      $test = Test::where('id', $test_id)->first();

      $max_c = Result::where('test_id', $test_id)->where('class', 'IX-C')->max('value');
      $min_c = Result::where('test_id', $test_id)->where('class', 'IX-C')->min('value');
      $avg_c = Result::where('test_id', $test_id)->where('class', 'IX-C')->avg('value');

      $data_c = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_c,
        'min' => $min_c,
        'avg' => $avg_c
      );

      $results = Result::select('results.test_id', 'users.name', 'results.class', 'results.true', 'results.false', 'results.value')
                    ->where('test_id', $test_id)
                    ->where('class', 'IX-C')
                    ->leftJoin('users', 'users.id', '=', 'results.user_id')
                    ->orderBy('name', 'asc')
                    ->get();
      // return view('results.pdf-ix-c',compact('results', 'data_c'));

      $pdf = PDF::loadView('results.pdf-ix-c',compact('results', 'data_c'));
      return $pdf->download('IX-C.pdf');
    }

    public function pdf_d($id)
    {
      $test_id = $id;
      $test = Test::where('id', $test_id)->first();

      $max_d = Result::where('test_id', $test_id)->where('class', 'IX-D')->max('value');
      $min_d = Result::where('test_id', $test_id)->where('class', 'IX-D')->min('value');
      $avg_d = Result::where('test_id', $test_id)->where('class', 'IX-D')->avg('value');

      $data_d = array(
        'name' => $test->user->name,
        'subject' => $test->subject,
        'subject_test' => $test->subject_test,
        'time' => $test->time,
        'start' => $test->start,
        'num_questions' => $test->num_questions,
        'max' => $max_d,
        'min' => $min_d,
        'avg' => $avg_d
      );

      $results = Result::select('results.test_id', 'users.name', 'results.class', 'results.true', 'results.false', 'results.value')
                    ->where('test_id', $test_id)
                    ->where('class', 'IX-D')
                    ->leftJoin('users', 'users.id', '=', 'results.user_id')
                    ->orderBy('name', 'asc')
                    ->get();

      $pdf = PDF::loadView('results.pdf-ix-d',compact('results', 'data_d'));
      return $pdf->download('IX-D.pdf');
    }

  }
