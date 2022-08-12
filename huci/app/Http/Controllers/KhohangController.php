<?php

namespace App\Http\Controllers;

use App\Models\Khohang;
use Illuminate\Http\Request;

class KhohangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khohang = Khohang::orderBy('id', 'DESC')->get();
        return view('pages.warehouse.kho')->with(compact('khohang'));
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
                'tenkhohang' => 'required',
            ],
            [
                'tensanpham.required' => 'Tên kho hàng không được để trống',
            ]
        );
        $khohang = new Khohang();
        $khohang->tenkhohang = $data['tenkhohang'];
        $khohang->save();
        return redirect()->back()->with('success', 'Thêm kho hàng thành công');
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
        $khohang = Khohang::find($id);
        return view('pages.warehouse.edit')->with(compact('khohang'));
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
        $data =  $request->validate(
            [
                'tenkhohang' => 'required',
            ],
            [
                'tensanpham.required' => 'Tên kho hàng không được để trống',
            ]
        );
        $khohang = Khohang::find($id);
        $khohang->tenkhohang = $data['tenkhohang'];
        $khohang->save();
        return redirect()->back()->with('success', 'Sửa kho hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khohang = Khohang::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa kho hàng thành công');
    }
}
