<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $page = $request->page?? '';
        $key = 'products'.strval($page);
        if (Cache::has($key)){
            $products = Cache::get($key);
            return view('product::index', ['products' => $products]);
        }
        $products = Product::paginate(10);

        Cache::put($key, $products, now()->addMinutes(1));
        return view('product::index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->toArray());
        return redirect('product');
    }

    /**
     * Show the specified resource.
     * @param Product $product
     * @return Renderable
     */
    public function show(Product $product)
    {

        return view('product::show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Product $product)
    {
        return view('product::edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     * @param ProductRequest $request
     * @param  Product $product
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->toArray());

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('product');
    }
}
