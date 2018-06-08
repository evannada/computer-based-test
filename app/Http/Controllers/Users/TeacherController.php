<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

      $username = User::where('username', $request->username)->first();

      if ($username) {
        return response()->json([
          'message' => 'Username telah digunakan'
        ], 500);

      } else {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = 2;
        $user->password = bcrypt($request->nig);
        $user->remember_token = str_random(60);
        $user->save();

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->nig = $request->nig;
        $teacher->save();
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
        'nig' => $user->teacher->nig
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

      $teacher = $user_id->teacher->update([
        'nig' => $request->nig,
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
      $user = User::select('users.id', 'users.name', 'users.username','teachers.nig')
              ->join('teachers', 'users.id', '=', 'teachers.user_id')
              ->where('role', '=', '2')
              ->get();

      return Datatables::of($user)
            ->addColumn('action', function($user){
                return '<a onclick="editForm('. $user->id .')" class="btn btn-primary btn-xs"><i class="far fa-edit"></i> Edit</a> '.
                       '<a onclick="deleteData('. $user->id .')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>'.
                       '<a onclick="mapel('. $user->id .')" class="btn btn-primary btn-xs"><i class="far fa-edit"></i> Mapel diampu</a>';

            })->make(true);
    }

}
