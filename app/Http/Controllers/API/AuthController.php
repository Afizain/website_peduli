<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Validation\ValidationException as IlluminateValidationException;
use League\Config\Exception\ValidationException;

class AuthController extends Controller
{
    // Get data
    public function MyMethod(Request $request) {
        $data = $request->user();
        if($data){
            return response()->json([
                'data' =>$data,
                'message' =>"success"
               ]);

           }   
    }
    // Register
    // Register untuk WEB

    public function registerView()
    {
        return view('register');
    }

    public function registerSimpan (Request $request)
    {
        Validator::make($request->all(),[
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            
        ])->validate();

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'id_dataDiri' => null
        ]);
        return redirect()->route('profile');
    }

    // Register untuk Mobile

    public function register (Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'username' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
            
        // ])->validate();

        // if ($validator->fails()){
        //     return response()->json([
        //         'success' =>false,
        //         'message' => 'ada kesalahan',
        //         'data' => $validator->errors()
        //     ]);
        // }
        $input =$request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success ['username'] = $user->username;

        return response()->json([
            'success' => true,
            'message' => 'Registrasi Berhasil',
            'data' => $success
           ]);
    }
    // Login

    // Login untuk WEB

    public function loginView(){
        return view('login');
    }

    public function loginAksi(Request $request)
    {
        Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',       
        ])->validate(); 
        
        if (!Auth::attempt($request->only('username','password'), $request->boolean('remember'))) {

            throw IlluminateValidationException::withMessages([
                'username'=>trans('auth.failed')
            ]);
            
        }
        $request->session()->regenerate();

        return redirect()->route('dashboard');
        
    }


    // login untuk Mobile

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])){
          $auth = Auth::user();
          $success['token'] = $auth->createToken('auth_token')->plainTextToken;
          $success['username'] = $auth->username;
          
          return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'data' => $success,
           
            
          ]);    
        }else {
            
            return response()->json([
                'success' => false,
                'message' => 'Login gagal',
                'data' => null
              ]);
        }
        
    }

    // Logout untuk web
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('login');                
    }    
    public function index()
{
    $DataDiri = User::get();
        
    return view('profile', ['data_diri'=>$DataDiri]);
    // return view('pengaduan.index', ['data_diri'=>$DataDiri]);

}
}