<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListedDevice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index() {
      // request()->session()->flush();
      // session()->flush();
      if(session('login?')) {
        $email = Crypt::decrypt(session('email'));

        $user = User::where('email', $email)->first();
        $devices = ListedDevice::where('email', $email)->get();

        return view(
          'home.index',
          compact('email', 'devices')
        );
      }
      else {
        return redirect()->action('HomeController@loginPage');
      }
    }

    public function loginPage() {

      if(session('login?')) {
        return redirect()->action('HomeController@index');
      }
      else {
        return view('home.login');
      }

    }

    public function login(Request $request) {
      $request->validate([
        'email' => 'required|email',
        'password' => 'required'
      ]);

      $email = $request->input('email');
      $password = $request->input('password');


      if(User::where('email', $email)->count()) {

        $user = User::where('email', $email)->first();

        if(Hash::check($password, $user->password)) {
          // $request->session()->put('login?', true);
          session([
            'login?' => true,
            'email' => Crypt::encrypt($email)
          ]);

          return redirect()->action('HomeController@index');
        }
        else {
          return back()
          ->withErrors(['status' => 'Wrong email or password!'])
          ->with(['email' => $email]);
        }
      }
      else {
        return back()
        ->withErrors(['status' => 'Wrong email or password!'])
        ->with(['email' => $email]);
      }
    }

    public function register() {

      return view('home.register');
    }

    public function create(Request $request) {

      $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'confirmed-password' => 'required',
        'name' => 'required'
      ]);

      $email = $request->input('email');
      $name = $request->input('name');

      if($request->input('password') == $request->input('confirmed-password')) {

        if(!User::where('email', $email)->count()) {

          User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
          ]);

          return redirect()->action('HomeController@loginPage');
        }
        else {
          return back()
          ->withErrors(['checking' => 'The email address already exist!'])
          ->with([
            'email' => $email,
            'name' => $name
          ]);
        }
      }
      else {
        return back()
        ->withErrors(['checking' => 'Please make sure your password are the same!'])
        ->with([
          'email' => $email,
          'name' => $name
        ]);
      }


    }

    public function logout(Request $request) {
      auth()->logout();
      session()->flush();

      return redirect()->action('HomeController@index');
    }

    public function show_profile() {

      if(session('login?')) {

        $user = User::where('email', Crypt::decrypt(session('email')))->first();
        $active_device = ListedDevice::where('email', Crypt::decrypt(session('email')))->count();

        return view(
          'home.profile',
          compact('user', 'active_device')
        );
      }
      else {
        return redirect()->action('HomeController@loginPage');
      }
    }
}
