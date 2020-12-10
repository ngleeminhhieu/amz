<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    var $route = 'user';
    var $pagename = 'USER';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = taikhoan::where('trangthai', '!=', '2')->paginate(3);
        $data = [
            'list' => $list,
            'pagename' => $this->pagename,
            'route' => $this->route
        ];
        return view('backend.user.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pagename' => $this->pagename,
            'route' => $this->route,
            'title' => 'ADD',
            'method' => 'POST',
            'action' => route('user.store')
        ];
        return view('backend.user.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list = taikhoan::get();
        //dd($list);
        foreach ($list as $index => $user) {
            //dd($user->id);
            if ($request->username == $user->username) {
                return redirect()->back()->with(['msg' => 'Your USERNAME HAVE EXSITED', 'status' => 'danger']);
            }
        }

        taikhoan::insert([
            'ten' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'hinh' => $request->fimg,
            'trangthai' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // $user = taikhoan::create();
        // $user->username = $request->username;
        // $user->hinh = $request->fimg;
        // $user->ten = $request->fullname;
        // $user->password = $request->password;
        // $user->trangthai = $request->status;
        // $user->created_at = now();
        // $user->updated_at = now();
        // $user->save();
        return redirect()->back()->with(['msg' => 'You have added user', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo ('Hello');
        $item = taikhoan::where('id', $id)->where('trangthai', '!=', 2)->first();
        // dd($item);
        if (!$item)
            return redirect()->route('product.index')->with(['msg' => 'Không tìm thấy sản phẩm', 'status' => 'danger']);
        $data = [
            'pagename' => $this->pagename,
            'route' => $this->route,
            'title' => 'UPDATE',
            'action' => route('user.update', $id),
            'method' => 'PUT',
            'item' => $item
        ];
        // dd($data);
        return view('backend.user.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $list = taikhoan::get();
        //dd($list);
        foreach ($list as $index => $user) {
            //dd($user->id);
            if ($id != $user->id && $request->username == $user->username) {
                return redirect()->back()->with(['msg' => 'Your USERNAME HAVE EXSITED', 'status' => 'danger']);
            }
        }
        taikhoan::where('id', $id)->update([
            'hinh' => $request->fimg,
            'username' => $request->username,
            'ten' => $request->fullname,
            'password' => $request->password,
            'trangthai' => $request->status,
        ]);
        return redirect()->back()->with(['msg' => 'You have updated the user successfully', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        taikhoan::where('id', $id)->update([
            'trangthai' => 2
        ]);
        $data = [
            'msg' => 'Account is deleted',
            'status' => 'success',
            'result' => "Redirect",
            'url' => 'http://localhost:8000/admin/user'
        ];
        return response()->json($data, 200);
    }

    public function login()
    {
        return view('backend.user.login');
    }

    public function loginpost(Request $request)
    {
        //dd(123);
        //echo ('DUNG LAI');exit;
        $request->validate([
            'username' => ['required', 'min:5', 'max:20', 'exists:quantritaikhoan,username'],
            'password' => ['required', 'min:6', 'max:30']
        ], [
            'username.required' => 'Tên đăng nhập không được trống',
            'username.min' => 'Tên đăng nhập từ 5 tới 20 ký tự',
            'username.exists' =>  'Tên đăng nhập không đúng',
            'username.max' =>  'Tên đăng nhập từ 5 tới 20 ký tự',
            'password.max' =>  'Mật khẩu từ 6 tới 30 ký tự',
            'password.required' => 'Mật khẩu không được trống',
            'password.min' => 'Mật khẩu từ 6 tới 30 ký tự',
        ]);
        if (!$request->remember) {
            if (Auth::guard('backend')->attempt([
                'username' => $request->username,
                'password' => $request->password,
            ])) {
                //ong nay da dang nhap
                if (Auth::guard('backend')->user()->trangthai == 1)
                    return redirect()->route('product.index');
                else {
                    Auth::guard('backend')->logout();
                    return redirect()->route('b.login')->with(['msg' => 'Tài khoản này đang bị khoá bởi BQT', 'status' => 'danger']);
                }
            } else {
                return redirect()->route('b.login')->with(['msg' => 'Thông tin đăng nhập không đúng', 'status' => 'danger']);
            }
        } else {
            if (Auth::guard('backend')->attempt([
                'username' => $request->username,
                'password' => $request->password,
            ], $request->remember)) {
                //ong nay da dang nhap
                if (Auth::guard('backend')->user()->trangthai == 1)
                    return redirect()->route('product.index');
                else {
                    Auth::guard('backend')->logout();
                    return redirect()->route('b.login')->with(['msg' => 'Tài khoản này đang bị khoá bởi BQT', 'status' => 'danger']);
                }
            } else {
                return redirect()->route('b.login')->with(['msg' => 'Thông tin đăng nhập không đúng', 'status' => 'danger']);
            }
        }
    }
    public function logout()
    {
        Auth::guard('backend')->logout();
        return redirect()->route('b.login')->with(['msg' => 'Bạn vừa thoát khỏi hệ thống', 'status' => 'warning']);
    }

    public function testpass(Request $request)
    {
        echo Hash::make($request->p);
        echo '<br>';
        echo md5($request->p);
    }
}