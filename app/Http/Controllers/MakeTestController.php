<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Test;
use DateTime;

class MakeTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('make-test.test');
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

      $request->validate([
          'subject_test' => 'required',
          'subject' => 'required',
          'num_questions' => 'required|integer',
          'start_date' => 'required|date',
          'start_time' => 'required',
          'end_date' => 'required|date',
          'end_time' => 'required',
          'time' => 'required|integer',
          'token' => 'required',
      ]);

      $datetime = new DateTime($request->start_date);
      $start = $datetime->format('d-F-Y');

      $start_date = $request->start_date;
      $start_time = $request->start_time;
      $start_datetime = $start_date.' '.$start_time;
      $end_date = $request->end_date;
      $end_time = $request->end_time;
      $end_datetime =  $end_date.' '.$end_time;

      $test_teacher = new Test();
      $test_teacher->user_id = Auth::user()->id;
      $test_teacher->subject_test = $request->subject_test;
      $test_teacher->subject = $request->subject;
      $test_teacher->num_questions = $request->num_questions;
      $test_teacher->start = $start;
      $test_teacher->start_time = $start_datetime;
      $test_teacher->end_time = $end_datetime;
      $test_teacher->time = $request->time;
      $test_teacher->token = $request->token;
      $test_teacher->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Test::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test_teacher = Test::findOrFail($id);

        $start_datetime = new DateTime($test_teacher->start_time);
        $start_date_string = $start_datetime->format('Y-m-d');
        $start_time_string = $start_datetime->format('H:i');
        $start_date = $start_date_string;
        $start_time = $start_time_string;

        $end_datetime = new DateTime($test_teacher->end_time);
        $end_date_string = $end_datetime->format('Y-m-d');
        $end_time_string = $end_datetime->format('H:i');
        $end_date = $end_date_string;
        $end_time = $end_time_string;

        $data = collect([
          'id' => $test_teacher->id,
          'subject_test' => $test_teacher->subject_test,
          'subject' => $test_teacher->subject,
          'num_questions' => $test_teacher->num_questions,
          'start_date' => $start_date,
          'start_time' => $start_time,
          'end_date' => $end_date,
          'end_time' => $end_time,
          'time' => $test_teacher->time,
          'token' => $test_teacher->token
        ]);


         return $data;
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

      $request->validate([
          'subject_test' => 'required',
          'subject' => 'required',
          'num_questions' => 'required|integer',
          'start_date' => 'required|date',
          'start_time' => 'required',
          'end_date' => 'required|date',
          'end_time' => 'required',
          'time' => 'required|integer',
          'token' => 'required',
      ]);

      $test_teacher = Test::findOrFail($id);

      $datetime = new DateTime($request->start_date);
      $start = $datetime->format('d-F-Y');

      $start_date = $request->start_date;
      $start_time = $request->start_time;
      $start_datetime = $start_date.' '.$start_time;
      $end_date = $request->end_date;
      $end_time = $request->end_time;
      $end_datetime =  $end_date.' '.$end_time;


      $test_teacher->user_id = Auth::user()->id;
      $test_teacher->subject_test = $request->subject_test;
      $test_teacher->subject = $request->subject;
      $test_teacher->num_questions = $request->num_questions;
      $test_teacher->start = $start;
      $test_teacher->start_time = $start_datetime;
      $test_teacher->end_time = $end_datetime;
      $test_teacher->time = $request->time;
      $test_teacher->token = $request->token;
      $test_teacher->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Test::destroy($id);
    }

    public function apiUjian()
    {
      $user_id = Auth::user()->id;
        $ujian = Test::select('tests.id', 'users.name' ,'tests.subject', 'tests.subject_test',
                                      'tests.num_questions', 'tests.time', 'tests.start',
                                      'tests.start_time', 'tests.end_time',
                                      'tests.token', 'tests.created_at', 'tests.updated_at')
                ->join('users', 'users.id', '=', 'tests.user_id')
                ->where('user_id', $user_id)
                ->get();

        return Datatables::of($ujian)
              ->addColumn('action', function($ujian){
                  return '<a onclick="editForm('. $ujian->id .')" class="btn btn-primary btn-xs"><i class="far fa-edit"></i> Edit</a> ' .
                         '<a onclick="deleteData('. $ujian->id .')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
              })
              ->editColumn('time', '{{$time}} menit')
              ->make(true);
      }
}
