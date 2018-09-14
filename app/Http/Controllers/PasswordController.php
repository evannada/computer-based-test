<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Teacher;
use App\Student;
use Auth;
use Hash;
use Validator;

class PasswordController extends Controller
{
    public function change()
    {
      return view('password.change');
    }


    public function update()
    {
              // custom validator
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, \Auth::user()->password);
        });

        // message for custom validation
        $messages = [
            'password' => 'Invalid current password.',
        ];

        // validate form
        $validator = Validator::make(request()->all(), [
            'current_password'      => 'required|password',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',

        ], $messages);

        // if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        // update password
        $user = User::find(Auth::id());

        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect()
            ->route('home')
            ->withSuccess('Password has been updated.');
    }

    public function updateAdmin($id)
    {

      $teacher = Teacher::select('nip')
                        ->where('user_id', $id)
                        ->first();

      if ($teacher) {
        $nip = $teacher->nip;
        $user = User::find($id);
        $user->password = bcrypt($nip);
        $user->save();
      } else {
        $student = Student::select('nis')
                          ->where('user_id', $id)
                          ->first();
        $nis = $student->nis;
        $user = User::find($id);
        $user->password = bcrypt($nis);
        $user->save();
      }

    }
}
