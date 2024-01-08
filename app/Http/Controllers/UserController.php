<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Pfu;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Auth;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $role = Auth::user()->roles->first()->name;
        $role2 = 'Vendor';
        $rolesToIgnore = [$role, $role2];
       
        $authuser = Auth::user();
        $users = User::where('id', '!=', $authuser->id)->where('id','!=', 1)->where('is_vendor', 0)->latest('id')->get();
        return view('admin.users.users', [
            'users' => $users,
            'roles' => Role::whereNotIn('name', $rolesToIgnore)->pluck('name')->all(),
            'pfus' => Pfu::select('id', 'pfu')->where('status', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $rules = array(
            'name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'password' => 'required|string|min:8',
            'roles' => 'required',
            'mobile' => 'required|unique:users,mobile',
            'pfu' => 'required',

        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['success'] = false;
            $response['validation'] = false;
            $response['formErrors'] = true;
            $response['errors'] = $errors;
            return response()->json($response);
        }

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['pfu'] = $request->pfu;

        $user = User::create($input);
        if ($user) {
            $user->assignRole($request->roles);
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        // Check Only Super Admin can update his own Profile
        // if ($user->hasRole('Super Admin')){
        //     if($user->id != auth()->user()->id){
        //         abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        //     }
        // }
        $user = $request->user_id;
        $getUser = User::find($user);

        $response['user'] = $getUser;
        $response['userRoles'] = $getUser->roles->pluck('name')->first();
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    
        $rules = array(
            'name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email,'.$request->user_id,
            'password' => 'nullable|string|min:8',
            'mobile' => 'required|unique:users,mobile,'.$request->user_id, 
            'pfu' => 'required',

        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['success'] = false;
            $response['validation'] = false;
            $response['formErrors'] = true;
            $response['errors'] = $errors;
            return response()->json($response);
        }

        $input = $request->all();

        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        } else {
            $input = $request->except('password');
        }

        $user->update($input);
        if ($user) {
            // $user->syncRoles($request->roles);
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        return response()->json($response);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id) {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess('User is deleted successfully.');
    }

    public function exportUsers() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
