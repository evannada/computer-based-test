<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Teacher;
use App\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.teacher');

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
      $validate = $request->validate([
          'nip'        => 'required',
          'name'       => 'required',
          'subject'    => 'required',
          'username'   => 'required|unique:users,username',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = 2;
        $user->password = bcrypt($request->nip);
        $user->remember_token = str_random(60);
        $user->save();

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->nip = $request->nip;
        $teacher->subject = $request->input('subject');
        $teacher->save();
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
  
      $user = User::findOrFail($id);

      $data = collect([
        'id' => $user->id,
        'name' => $user->name,
        'username' => $user->username,
        'nip' => $user->teacher->nip,
        'subject' => $user->teacher->subject
      ]);

       return response()->json($data);
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

          $teacher = $user_id->teacher->update([
            'nip' => $request->nip,
            'subject' => $request->input('subject'),
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

    public function mapel()
    {
      // code...
    }

    public function apiDataGuru()
    {
      $user = User::select('users.id', 'users.name', 'users.username','teachers.nip','teachers.subject')
              ->join('teachers', 'users.id', '=', 'teachers.user_id')
              ->where('role', '=', '2')
              ->orderBy('name', 'asc')
              ->get();

      return Datatables::of($user)
            ->addColumn('action', function($user){
                return '<a onclick="editForm('. $user->id .')" class="btn btn-primary btn-xs"><i class="far fa-edit"></i> Edit</a> '.
                       '<a onclick="deleteData('. $user->id .')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a> '.
                       '<a onclick="resetPassword('. $user->id .')" class="btn btn-warning btn-xs"><i class="fas fa-key"></i> Reset Password</a>';

            })->make(true);
    }

    public function apiDataGuruIndo()
    {
      $user = User::select('users.id', 'users.name', 'users.username','teachers.nip','teachers.subject')
              ->join('teachers', 'users.id', '=', 'teachers.user_id')
              ->where('subject', '=', 'Bahasa Indonesia')
              ->orderBy('name', 'asc')
              ->get();

      return $user;
    }

    public function apiDataGuruInggris()
    {
      $user = User::select('users.id', 'users.name', 'users.username','teachers.nip','teachers.subject')
              ->join('teachers', 'users.id', '=', 'teachers.user_id')
              ->where('subject', '=', 'Bahasa Inggris')
              ->orderBy('name', 'asc')
              ->get();

      return $user;
    }

    public function apiDataGuruMtk()
    {
      $user = User::select('users.id', 'users.name', 'users.username','teachers.nip','teachers.subject')
              ->join('teachers', 'users.id', '=', 'teachers.user_id')
              ->where('subject', '=', 'Matematika')
              ->orderBy('name', 'asc')
              ->get();

      return $user;
    }

    public function apiDataGuruIpa()
    {
      $user = User::select('users.id', 'users.name', 'users.username','teachers.nip','teachers.subject')
              ->join('teachers', 'users.id', '=', 'teachers.user_id')
              ->where('subject', '=', 'Ilmu Pengetahuan Alam')
              ->orderBy('name', 'asc')
              ->get();

      return $user;
    }


}
