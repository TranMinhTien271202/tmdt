<?php

namespace Modules\Shop\Http\Controllers;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $menus = Category::with('children')->where('parent_id', null)->get();
            $menus = $this->categoryRepository->all('id',1);
            return DataTables::of($menus)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa-solid fa-trash"></i></a>';

                    $btn = $btn . ' <a href="/admin/admin-detail-room/' . $row->id . '"  data-id="' . $row->id . '" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-info"></i></a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('shop::category.index');
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
                'name.required' => "Tên loại sản phẩm không được để trống.",
            ]
        );
        if ($validator->passes()) {
            $data =  Category::updateOrCreate(
                ['id' => $request->_id],
                [
                    'name' => $request->name,
                ]
            );
            return response()->json(['success' => 'Thêm loại sản phẩm thành công.', $data]);
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
        Category::find($id)->delete();
        return response()->json(['status' => 1, 'success' => "xóa thành công"]);
    }
}
