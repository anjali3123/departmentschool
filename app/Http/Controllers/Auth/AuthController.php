<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
      if (Auth::check()) {

        return redirect()->route('dashboard');
    }

        return view('auth.login');
    } 

  
    public function dashboard()
    {
        // if(Auth::check()){
        //     return view('dashboard.home');
        // }
  
        return view('dashboard.home');
    }
    

    public function login(Request $request)
    {
        
      if (Auth::check()) {
        return redirect()->route('dashboard');
    }
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($user = User::where('username',$request->username)->first()) {
          if (Hash::check($request->password,$user->password)) {
              if ($user->status != 1) {
                  return back()->with('showalert',['danger','User account is disable.'])->onlyInput('email');
              }
            //   if($user->isDeleted == 1) {
            //     return back()->with('showalert',['danger','User account  is delete.'])->onlyInput('email');
            // }
            }
          }
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        // echo"<pre>";print_r($credentials);exit;

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')
                        ->with('showalert',['success','You have Successfully loggedin']);
        }
  
        return back()->with('showalert',['danger','Username or password are wrong.'])->onlyInput('email');
    }

    public function logout() {
      
        Auth::logout();
  
        return Redirect('login');
    }

   
}