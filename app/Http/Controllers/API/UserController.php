<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\ClientProf;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Mail;
use App\Mail\VerifyEmail;


class UserController extends Controller
{
    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['noktp' => request('noktp'), 'password' => request('password'), 'status' => 'active'])){
            $user = Auth::user();
            $success =  $user->createToken('nApp')->accessToken;
            DB::table('users')->where('noktp', request('noktp'))->update(array('api_token' => $success));
            return $success;
        }
        else{
            return response()->json(['error'=>'Something Wrong'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'noktp' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        
        $user = User::create([
            'name' => $request->input('name'),
            'noktp' => $request->input('noktp'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'c_password' => $request->input('c_password'),
            'role' => $request->input('role')
        ]);
        $user['password'] = bcrypt($user['password']);
        $clientprof = ClientProf::create([
            'id_user' => $request->input('id_user'),
            'nama' => $request->input('nama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'fotoktp' => $request->input('fotoktp'),
            'alamat' => $request->input('alamat'),
            'jeniskelamin' => $request->input('jeniskelamin'),
            'fotopribadi' => $request->input('fotopribadi')
        ]);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;
        $success['role'] =  $user->role;
        $user->status;
        DB::table('users')->where('noktp', request('noktp'))->update(array('api_token' => $success['token']));
        DB::table('users')->where('noktp', request('noktp'))->update(array('remember_token' => str_random(40)));

        Mail::to($user->email)->send(new VerifyEmail($user));
        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function verify()
    {
        if (empty(request('token'))) {
            // if token is not provided
            return redirect()->route('signup.form');
        }
        // decrypt token as email
        $decryptedEmail = Crypt::decrypt(request('token'));
        // find user by email
        $user = User::whereEmail($decryptedEmail)->first();
        if ($user->status == 'active') {
            // user is already active, do something
        }
        // otherwise change user status to "activated"
        $user->status = 'active';
        $user->save();
        // autologin
        Auth::loginUsingId($user->id);
        return redirect('/home');
    }
}
