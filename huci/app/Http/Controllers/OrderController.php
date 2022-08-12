<?php

namespace App\Http\Controllers;

use App\Models\donhang;
use App\Models\donhang_sl;
use App\Models\huyen;
use App\Models\nguondon;
use App\Models\phiship;
use App\Models\Sanpham;
use App\Models\tinh;
use App\Models\tinhtrang;
use App\Models\User;
use App\Models\xa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham = Sanpham::orderBy('id', 'ASC')->get();
        $phiship = phiship::orderBy('id', 'ASC')->get();
        $user = User::orderBy('id', 'ASC')->get();
        $nguondon = nguondon::orderBy('id', 'ASC')->get();
        $tinhtrang = tinhtrang::orderBy('id', 'ASC')->get();
        $donhang_sl = donhang_sl::orderBy('donhang_id', 'DESC')->get();
        $donhang_cc = donhang::with('sanpham', 'nguondon', 'phiship', 'user', 'tinhtrang')
            ->where('lienhe', 0)
            ->orderBy('id', 'ASC')
            ->get();

        $donhang = donhang::with('sanpham', 'nguondon', 'phiship', 'user', 'tinhtrang')
            ->where('lienhe', 1)
            ->orderBy('id', 'ASC')
            ->get();
        $sodhcheck = donhang::where('lienhe', 1)->count();
        $sodhchuacheck = donhang::where('lienhe', 0)->count();
        $sodh = donhang::count();
        $tien = donhang::sum('thanhtien','chuyenkhoan');
        // for ($i=0; $i <= sizeof($donhang); $i++){
        //     dd($donhang->id[$i]);
        //     $sl[$i] = donhang_sl::where('donhang_id',$donhang[$i]->id)->get();
        //     dd($sl[$i]);
        // }

        // $sl = donhang_sl::with('donhang')->where('donhang_id',$donhang_id->id)->get();
        $tinh = tinh::orderBy('matp', 'ASC')->get();
        return view('pages.order.orderindex')->with(compact('tien','sodh','sodhchuacheck','sodhcheck','donhang_cc', 'nguondon', 'user', 'sanpham', 'tinh', 'donhang', 'tinhtrang', 'phiship'));
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
                'hotenkhach' => 'required',
                'sdt' => 'required',
                'diachi' => 'required',
                'tinhtrang' => '',

            ],
            [
                'hotenkhach.required' => 'Họ Tên Khách không được để trống',
                'sdt.required' => 'SĐT không được để trống',
                'diachi.required' => 'Địa Chỉ không được để trống',
            ]
        );
        $donhang = new donhang();
        $donhang->hotenkhach = $data['hotenkhach'];
        $donhang->sdt = $data['sdt'];

        $donhang->ghichubd = $request->ghichubd;
        $donhang->ghichuct = $request->ghichuct;
        $donhang->tinhtrangda = $data['tinhtrang'];
        $donhang->ngaygui = $request->ngaygui;
        $donhang->thanhtien = intval(preg_replace('/[^\d.]/', '', $request->thanhtien)) ?? 0;
        $donhang->chuyenkhoan = intval(preg_replace('/[^\d.]/', '', $request->tienchuyen)) ?? 0;
        $donhang->ngaynhap = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang->chiachietkhau_id = $request->chiachietkhau;
        $donhang->phiship_id = $request->phiship;
        $donhang->tinhtrang_id = $request->trangthai;
        $donhang->nhapdonhang_id = $request->nhapdonhang;
        $donhang->nguondon_id = $request->nguondon;
        $donhang->tuship = $request->tuship ?? 0;
        $donhang->si = $request->si ?? "L";

        $tinh_id = $request->tinh;
        $tinh = tinh::find($tinh_id);
        $tentinh = $tinh->name_tinh ?? null;

        $huyen_id = $request->huyen;
        $huyen = huyen::find($huyen_id);
        $tenhuyen = $huyen->name_quanhuyen ?? null;

        $xa_id = $request->xa;
        $xa = xa::find($xa_id);
        $tenxa = $xa->name_xaphuong ?? null;

        $tenap = $data['diachi'];

        $diachi = join(",", array($tenap, $tenxa, $tenhuyen, $tentinh));

        $donhang->diachi = $diachi;


        do {
            $id = mt_rand(100000000, 999999999);
        } while (donhang::where('id', $id)->exists());
        $donhang->id = $id;
        $idsp = $request->idsp;
        $slsp = $request->soluong;
        $sp_temps = DB::table('sanpham')->get();
        foreach ($sp_temps as $temp) {
            if ($slsp[$temp->id] !== null) {
                $dh_sl = new donhang_sl();
                $dh_sl->sanpham_id = $idsp[$temp->id];
                $dh_sl->donhang_id = $id;
                $tensp = Sanpham::where('id', $idsp[$temp->id])->first();
                $dh_sl->tensanpham = $tensp->tenvietgon;
                $dh_sl->soluong = $slsp[$temp->id];
                $dh_sl->save();
            }
        }
        $donhang->tiencuoc = $request->tiencuoc;
        $donhang->lienhe = $request->check;
        $donhang->save();
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
        $donhang = donhang::find($id);
        $nguondon =  nguondon::where('id',$donhang->nguondon_id)->first();
        $donhang->nguondon_id = $nguondon;
        $phiship =  phiship::where('id',$donhang->phiship_id)->first();
        $donhang->phiship_id = $phiship;
        if($donhang)
        {
            return response()->json([
                'status' => 200,
                'donhang' => $donhang
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'loi' => 'lỗi khỗng không tìm thấy đơn hàng'
            ]);
        }

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
                'hotenkhach' => 'required',
                'sdt' => 'required',
                'diachi' => 'required',
                'tinhtrang' => '',

            ],
            [
                'hotenkhach.required' => 'Họ Tên Khách không được để trống',
                'sdt.required' => 'SĐT không được để trống',
                'diachi.required' => 'Địa Chỉ không được để trống',
            ]
        );
        $donhang = donhang::find($id);
        $donhang->hotenkhach = $data['hotenkhach'];
        $donhang->sdt = $data['sdt'];

        $donhang->ghichubd = $request->ghichubd;
        $donhang->ghichuct = $request->ghichuct;
        $donhang->tinhtrangda = $data['tinhtrang'];
        $donhang->ngaygui = $request->ngaygui;
        $donhang->thanhtien = intval(preg_replace('/[^\d.]/', '', $request->thanhtien)) ?? 0;
        $donhang->chuyenkhoan = intval(preg_replace('/[^\d.]/', '', $request->tienchuyen)) ?? 0;
        $donhang->ngaynhap = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang->chiachietkhau_id = $request->chiachietkhau;
        $donhang->phiship_id = $request->phiship;
        $donhang->tinhtrang_id = $request->trangthai;
        $donhang->nhapdonhang_id = $request->nhapdonhang;
        $donhang->nguondon_id = $request->nguondon;
        $donhang->tuship = $request->tuship ?? 0;
        $donhang->si = $request->si ?? "L";

        $tinh_id = $request->tinh;
        $tinh = tinh::find($tinh_id);
        $tentinh = $tinh->name_tinh ?? null;

        $huyen_id = $request->huyen;
        $huyen = huyen::find($huyen_id);
        $tenhuyen = $huyen->name_quanhuyen ?? null;

        $xa_id = $request->xa;
        $xa = xa::find($xa_id);
        $tenxa = $xa->name_xaphuong ?? null;

        $tenap = $data['diachi'];

        $diachi = join(",", array($tenap, $tenxa, $tenhuyen, $tentinh));

        $donhang->diachi = $diachi;

        $idsp = $request->idsp;
        $slsp = $request->soluong;
        $sp_temps = DB::table('sanpham')->get();
        foreach ($sp_temps as $temp) {
            if ($slsp[$temp->id] !== null) {
                $dh_sl = donhang_sl::find($id);
                $dh_sl->sanpham_id = $idsp[$temp->id];
                $dh_sl->donhang_id = $id;
                $tensp = Sanpham::where('id', $idsp[$temp->id])->first();
                $dh_sl->tensanpham = $tensp->tenvietgon;
                $dh_sl->soluong = $slsp[$temp->id];
                $dh_sl->save();
            }
        }
        $donhang->save();
        return redirect()->back()->with('success', 'Thêm Sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function chondiachi(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "tinh") {
                $select_huyen = huyen::where('matp', $data['matp'])->orderBy('maqh', 'ASC')->get();
                $output .= '<option>Chọn quận huyện</option>';
                foreach ($select_huyen as $key => $huyen) {
                    $output .= '<option value="' . $huyen->maqh . '"> ' . $huyen->name_quanhuyen . '</option>';
                }
            } else {
                $select_xa = xa::where('maqh', $data['matp'])->orderBy('xaid', 'ASC')->get();
                $output .= '<option>Chọn xã phường</option>';
                foreach ($select_xa as $key => $xa) {
                    $output .= '<option value="' . $xa->xaid . '"> ' . $xa->name_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }

    public function check($id)
    {
        $donhang = donhang::find($id);
        if ($donhang->lienhe == 0) {
            $donhang->lienhe = 1;
        } else {
            $donhang->lienhe = 0;
        }
        $donhang->save();
        return redirect()->back();
    }
}
