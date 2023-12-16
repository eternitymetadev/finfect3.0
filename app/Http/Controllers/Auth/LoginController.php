<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pfu;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function processStep1(Request $request)
    {
        $response = [
            'success' => false,
            'message' => 'Email not found.', // Default error message
        ];

        // Validate step 1 form data
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user) {

            $request->session()->put('step1_data', $validatedData);
            $response['success'] = true;
            $response['message'] = 'Email found in the database.'; // Optional success message
        }

        return $response;
    }

    public function processStep2(Request $request)
    {
        // Retrieve step 1 data from session
        $step1Data = $request->session()->get('step1_data');

        // Validate step 2 form data
        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        // Simulate retrieving user data (Replace this with your actual logic)
        $user = User::where('email', $step1Data['email'])->first();

        if (!$user) {
            // User not found, return JSON response with error
            return new JsonResponse(['success' => false, 'message' => 'User not found']);
        }

        // Check if the provided password matches the user's hashed password
        if (Hash::check($validatedData['password'], $user->password)) {
            // Password is correct
            $userPfu = explode(',', $user->pfu);
            $getPfu = Pfu::select('id', 'pfu')->whereIn('id', $userPfu)->where('status', 1)->get();

            return new JsonResponse(['success' => true, 'message' => 'Password validated', 'user_pfu' => $getPfu]);
        } else {
            return new JsonResponse(['success' => false, 'message' => 'Incorrect password']);
        }
    }

    public function processStep3(Request $request)
    {
        echo'<pre>'; print_r($request->all()); die;
   
         $step1Data = $request->session()->get('step1_data');

         $request->session()->forget(['step1_data', 'user_data']);

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
