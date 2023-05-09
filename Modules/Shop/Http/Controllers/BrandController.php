<?php

namespace Modules\Shop\Http\Controllers;

use App\Models\brand;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = brand::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa-solid fa-trash"></i></a>';

                    $btn = $btn . ' <a href="/admin/admin-detail-room/' . $row->id . '"  data-id="' . $row->id . '" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-info"></i></a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('shop::brand.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shop::create');
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
            ],
            [
                'name.required' => "Tên thương hiệu không được để trống.",
            ]
        );
        if ($validator->passes()) {
            $data =  brand::updateOrCreate(
                ['id' => $request->_id],
                [
                    'name' => $request->name,
                ]
            );
            return response()->json(['success' => 'Thêm thương hiệu thành công.', $data]);
        }
        return response()->json(['message' => array_combine($validator->errors()->keys(), $validator->errors()->all()),]);
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
        brand::find($id)->delete();
        return response()->json(['status' => 1, 'success' => "xóa thành công"]);
    }
}
