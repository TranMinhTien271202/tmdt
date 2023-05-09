<?php

namespace Modules\Shop\Http\Controllers;

use App\Models\info;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('shop::product.index');
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
        // $array = [
        //     'name' => $request->name1,
        //     'value' => $request->value1
        // ];
        // $result = array_map(function ($a, $b) {
        //     return [
        //         'name' => $a,
        //         'value' => $b
        //     ];
        // }, $request->name1, $request->value1);
        // foreach ($result as $row) {
        //     $info =  info::Create([
        //         'name' => $row['name'],
        //         'value' => $row['value'],
        //         'product_id' => 1
        //     ]);
        // }
        $data = $request->all();
        // count($array);
        return response()->json(['data' => $data]);
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
}
