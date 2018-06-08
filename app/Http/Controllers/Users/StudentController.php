<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\User;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.student');
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

        $username = User::where('username', $request->username)->first();

        if ($username) {
          return response()->json([
            'message' => 'Username telah digunakan'
          ], 500);

        } else {
          $user = new User();
          $user->name = $request->name;
          $user->username = $request->username;
          $user->role = 1;
          $user->password = bcrypt($request->nis);
          $user->remember_token = str_random(60);
          $user->save();

          $student = new Student();
          $student->user_id = $user->id;
          $student->nis = $request->nis;
          $student->class = $request->class;
          $student->save();
        }
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
      $user = User::find($id);

      $data = collect([
        'id' => $user->id,
        'name' => $user->name,
        'username' => $user->username,
        'nis' => $user->student->nis,
        'class' => $user->student->class
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
        $user_id = User::findOrFail($id);

        $student = $user_id->student->update([
          'nis' => $request->nis,
          'class' => $request->class,
        ]);

        $user = User::where('id',$id)->update([
          'name' => $request->name,
          'username' => $request->username,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }

    public function apiDataSiswa()
    {
        $user = User::select('users.id', 'users.name' ,'users.username','students.nis','students.class')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->where('role', '=', '1')
                ->get();

        return Datatables::of($user)
              ->addColumn('action', function($user){
                  return '<a onclick="editForm('. $user->id .')" class="btn btn-primary btn-xs"><i class="far fa-edit"></i> Edit</a> ' .
                         '<a onclick="deleteData('. $user->id .')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
              })->make(true);
      }

}
