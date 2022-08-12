<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->get();
        return view('pages.user.user')->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate(
            [
                'email' => 'required|unique:users',
                'pass' => 'required',
                'name' => 'required',
                'luong' => 'required',
            ],
            [
                'email.unique' => 'Tên đăng nhập đã có và không được trùng',
                'email.required' => 'Tên đăng nhập không được để trống',
                'name.required' => 'Tên không được để trống',
                'pass.required' => 'Mật khẩu không được để trống',
                'luong.required' => 'Lương không được để trống',
            ]
        );
        $user = new User();
        $user->password = Hash::make($data['pass']);
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->luong = $data['luong'];
        $user->save();
        return redirect()->back()->with('success', 'Thêm user thành công');
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
        $user = User::find($id);
        return view('pages.user.edit')->with(compact('user'));
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
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'luong' => 'required',
                'pass' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.max' => 'Tên quá dài',
                'email.required' => 'Tên đăng nhập không được để trống',
                'email.max' => 'Tên đăng nhập quá dài',
                'luong.required' => 'Mức lương không được để trống',
                'pass.required' => 'Mật khẩu không được để trống',
            ]
        );


        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['pass']);
        $user->luong = $data['luong'];

        $user->save();
        return redirect()->back()->with('success', 'Cập nhật tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa user thành công');
    }
}
