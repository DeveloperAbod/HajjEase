<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Http\Controllers\Controller;
 */
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\CheckUserStatus;



class UserController extends Controller
{
    function __construct()
    {
        //auth middleware
        $this->middleware('auth');
        $this->middleware(CheckUserStatus::class);
        $this->middleware('permission:عرض المستخدمين', ['only' => ['index', 'show']]);
        $this->middleware('permission:اضافة مستخدم', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل مستخدم', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'phone' => ['numeric', 'regex:/^7\d{8}$/', 'digits:9', 'required', 'unique:users,phone'],
            'password' => 'required|min:8|same:confirm-password',

            'roles_name' => 'required',
        ]);
        $input = $request->all();


        $input['password'] = Hash::make($input['password']);

        if (request()->status === 'on') {
            $input['status'] = true;
        } else {
            $input['status'] = false;
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // اضافة الصورة
            $randomNumber = mt_rand(1000, 9999); // Generate a random number between 1000 and 9999
            $imageName = time() . '_' . $randomNumber . '.' . request()->avatar->extension();
            request()->avatar->move(public_path('uploads'), $imageName);
            $input['avatar'] = $imageName;
        }



        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        return redirect("/users")->with('icon', 'success')->with('msg', 'تم اضافة المستخدم بنجاح');
    }



    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'phone' => 'numeric|digits:9|regex:/^7\d{8}$/|required|unique:users,phone,' . $id,
            'password' => 'nullable|min:8|same:confirm-password',
            'roles_name' => 'required'
        ]);

        $input = $request->all();
        // /status
        if (request()->status === 'on') {
            $input['status'] = true;
        } else {
            $input['status'] = false;
        }

        //البحث عن المستخدم
        $user = User::findOrFail($id);
        if (request()->has('avatar')) {
            //حذف الصورة القديمة
            $file = public_path('uploads/' . $user->avatar);
            if (File::exists($file) && $user->avatar != 'defaultUserImage.png') {
                File::delete($file);
            }
            // اضافة الصورة الجديدة
            $randomNumber = mt_rand(1000, 9999); // Generate a random number between 1000 and 9999
            $imageName = time() . '_' . $randomNumber . '.' . request()->avatar->extension();

            request()->avatar->move(public_path('uploads'), $imageName);
            $input['avatar'] = $imageName;
        }
        //password
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles_name'));

        return redirect("/users")->with('icon', 'success')->with('msg', 'تم تحديث المستخدم بنجاح');
    }
    public function destroy($id)
    {
        //البحث عن المستخدم
        $user = User::findOrFail($id);
        //حذف الصورة القديمة
        $file = public_path('uploads/' . $user->avatar);
        if (File::exists($file) && $user->avatar != 'defaultUserImage.png') {
            File::delete($file);
        }
        User::findOrFail($id)->delete();
        return redirect("/users")->with('icon', 'success')->with('msg', 'تم حذف المستخدم بنجاح');
    }
}
