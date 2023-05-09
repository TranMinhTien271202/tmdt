<?php

namespace Modules\Shop\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('shop::auth.login');
    }
    public function register()
    {
        return view('shop::auth.register');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shop::auth.register');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
            ],
            [
                'value.required' => "Điểm không được để trống.",
                'email.unique' => 'Email đã tồn tại.',
                'password.required' => 'Mật khẩu không được để trống.',
                'email.required' => 'Email không được để trống.',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự.',
            ]
        );
        if ($validator->passes()) {
            $data =  User::Create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'user_type' => 1,
                'status' => 1
            ]);
            return response()->json(['success' => 'Tạo tài khoản thành công.', 'data' => $data, 'req' => $request->all()]);
        }
        return response()->json(['message' => array_combine($validator->errors()->keys(), $validator->errors()->all())]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shop::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('shop::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        // return response()->json(1);
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ],
            [
                'email.required' => "Email không được để trống.",
                'email.email' => "Email không đúng định dạng.",
                'password.required' => 'Mật khẩu không được để trống.',
                'password.min' => "Mật khẩu phải lớn hơn 6 ký tự.",
            ]
        );
        if ($validator->passes()) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('MyApp')->plainTextToken;
                return response()->json([
                    'token' => $token,
                    'success' => "Đăng nhập thành công",
                    'status' => 1,
                    'user' => $user
                ]);
            }
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }
        return response()->json([
            'message' => array_combine($validator->errors()->keys(), $validator->errors()->all()),
        ]);
    }
    public function logout(Request $request)
    {
        // Auth::logout();
        // dd(Auth::logout());
        auth()->guard('web')->logout();
        return response()->json(1);
    }
    public function checkToken()
    {
        return response()->json(auth()->user());
    }
}
