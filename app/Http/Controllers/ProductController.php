<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\comment;
use App\Models\info;
use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function detail($id)
    {
        $cate = Category::all();
        $data = $this->productRepository->find($id);
        $info = info::where('product_id', $id)->get();
        $comment = comment::where('product_id', $id)->pluck('id')->toArray();
        $array = array_slice($comment, count($comment) - 8, 8);
        $comment = comment::with('user')->whereIn('id', $array)->get();
        $key = 'detail_' . $id;
        if (!Session::has($key)) {
            $data->view += 1;
            $data->save();
            Session::put($key, time());
        } else {
            $lastViewed = Session::get($key);
            $now = time();
            $elapsedSeconds = $now - $lastViewed;
            if ($elapsedSeconds >= 60) {
                Session::put($key, $now);
                $data->view += 1;
                $data->save();
            }
        }
        return view('product.detail', ['cate' => $cate, 'data' => $data, 'info' => $info, 'comment' => $comment]);
    }
}
