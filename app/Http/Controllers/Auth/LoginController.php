<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pfu;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function validateEmail(Request $request)
    {
        $response = [
            'success' => false,
            'message' => 'Email not found.', // Default error message
        ];

        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user) {

            $request->session()->put('email', $validatedData);
            $response['success'] = true;
            $response['message'] = 'Email found in the database.'; // Optional success message
        }

        return $response;
    }

    public function validatePassword(Request $request)
    {
        // Retrieve step 1 data from session
        $validateEmail = $request->session()->get('email');

        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        $user = User::where('email', $validateEmail['email'])->first();

        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'User not found']);
        }

        if (Hash::check($validatedData['password'], $user->password)) {
            $user_role = $user->getRoleNames()->first();
            if($user_role == 'Super Admin' || $user_role == 'Admin'){
                
                Auth::login($user);
                return new JsonResponse(['success' => true, 'message' => 'Password validated', 'admin_role' => true ]);
            }else{
                $userPfu = explode(',', $user->pfu);
                $getPfu = Pfu::select('id', 'pfu')->whereIn('id', $userPfu)->where('status', 1)->get();

                return new JsonResponse(['success' => true, 'message' => 'Password validated', 'user_pfu' => $getPfu]);
            }

        } else {
            
            Log::channel('db')->warning('Incorrect password', ['user' => $user->id]);
            return new JsonResponse(['success' => false, 'message' => 'Incorrect password']);
        }
    }

    public function loginPfu(Request $request)
    {

        $step1Data = $request->session()->get('email');

        $user = User::where('email', $step1Data['email'])->first();

        $request->session()->forget(['email']);
        $request->session()->put('pfu', $request->pfu);

        Auth::login($user);
        Log::channel('db')->info('User is accessing Dashboard', ['user' => Auth::user()->id]);
     
        return response()->json(['success' => true, 'message' => 'User logged in successfully']);
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     $user = User::where('email', $email)->first();

    //     if (!$user || !Hash::check($password, $user->password)) {
    //         // Invalid email or password
    //         $errors = [];

    //         if (!$user) {
    //             $errors['email'] = 'The provided email address is incorrect.';
    //         } else {
    //             $errors['password'] = 'The provided password is incorrect.';
    //         }

    //         return back()->withInput($request->only('email'))->withErrors($errors);
    //     }

    //     // Authentication passed
    //     Auth::login($user);

    //     return redirect()->intended('/dashboard'); // Redirect to the intended URL after login
    // }
}
