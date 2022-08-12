<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham = Sanpham::orderBy('id', 'DESC')->get();
        return view('pages.product.product')->with(compact('sanpham'));
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
                'tensanpham' => 'required',
                'tenvg' => 'required',
                'trongluong' => 'required',
                'giagoc' => 'required',
                'giasp' => 'required',
            ],
            [
                'tensanpham.unique' => 'Tên sản phẩm đã có và không được trùng',
                'tensanpham.required' => 'Tên sản phẩm không được để trống',
                'tenvg.required' => 'Tên viết gọn không được để trống',
                'trongluong.required' => 'Trọng lượng không được để trống',
                'giagoc.required' => 'Giá gốc không được để trống',
                'giasp.required' => 'Giá sản phẩm không được để trống'
            ]
        );
        $sanpham = new Sanpham();
        $sanpham->tensanpham = $data['tensanpham'];
        $sanpham->tenvietgon = $data['tenvg'];
        $sanpham->trongluong = $data['trongluong'];
        $sanpham->giagoc = $data['giagoc'];
        $sanpham->giasanpham = $data['giasp'];
        $sanpham->save();
        return redirect()->back()->with('success', 'Thêm Sản phẩm thành công');
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
        $sanpham = Sanpham::find($id);
        return view('pages.product.edit')->with(compact('sanpham'));
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
                'tensanpham' => 'required',
                'tenvg' => 'required',
                'trongluong' => 'required',
                'giagoc' => 'required',
                'giasp' => 'required',
            ],
            [
                'tensanpham.unique' => 'Tên sản phẩm đã có và không được trùng',
                'tensanpham.required' => 'Tên sản phẩm không được để trống',
                'tenvg.required' => 'Tên viết gọn không được để trống',
                'trongluong.required' => 'Trọng lượng không được để trống',
                'giagoc.required' => 'Giá gốc không được để trống',
                'giasp.required' => 'Giá sản phẩm không được để trống'
            ]
        );
        $sanpham = Sanpham::find($id);
        $sanpham->tensanpham = $data['tensanpham'];
        $sanpham->tenvietgon = $data['tenvg'];
        $sanpham->trongluong = $data['trongluong'];
        $sanpham->giagoc = $data['giagoc'];
        $sanpham->giasanpham = $data['giasp'];
        $sanpham->save();

        return redirect()->back()->with('success', 'Sửa Sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = Sanpham::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
}
