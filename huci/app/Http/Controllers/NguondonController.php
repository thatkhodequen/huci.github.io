<?php

namespace App\Http\Controllers;

use App\Models\nguondon;
use Illuminate\Http\Request;

class NguondonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nguondon = nguondon::orderBy('id', 'DESC')->get();
        return view('pages.ordersource.ordersource')->with(compact('nguondon'));
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
                'tennguondon' => 'required',
            ],
            [
                'tennguondon.required' => 'Tên kho hàng không được để trống',
            ]
        );
        $nguondon = new nguondon();
        $nguondon->tennguondon = $data['tennguondon'];

        $nguondon->save();
        return redirect()->back()->with('success', 'Thêm nguồn đơn thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nguondon = nguondon::find($id);
        return view('pages.ordersource.edit')->with(compact('nguondon'));
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
                'tennguondon' => 'required',
            ],
            [
                'tennguondon.required' => 'Tên kho hàng không được để trống',
            ]
        );
        $nguondon = nguondon::find($id);
        $nguondon->tennguondon = $data['tennguondon'];
        $nguondon->save();
        return redirect()->back()->with('success', 'Sửa nguồn đơn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguondon = nguondon::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa nguồn đơn thành công');
    }
}
