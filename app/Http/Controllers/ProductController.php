<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StroreRequest;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendProductCreatedNotification;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Product::$statuses;
        return view('products.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StroreRequest $request)
    {
        $data = $request->validated();
        $attribute = [];
        $attributes = [];

        foreach ($request->all() as $key => $value) {
            if ($key !== '_token') {
                if (Str::before($key, '_') == 'attribute') {
                    if (strpos($key, 'name')) {
                        $attribute['name'] = $value;
                    }

                    if (strpos($key, 'value')) {
                        $attribute['value'] = $value;
                        $attributes[] = $attribute;  // Мы должны добавить $attribute в $attributes, а не $counter

                    }
                }
            }
        }

        $data['DATA'] = json_encode($attributes);

        $product = Product::create($data);

        Queue::push(new SendProductCreatedNotification($product));

        return redirect()->route('products_index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);
        $statuses = Product::$statuses;

        return view('products.edit', compact('product', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StroreRequest $request, $id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);
        $data = $request->validated();
        $attribute = [];
        $attributes = [];

        foreach ($request->all() as $key => $value) {
            if ($key !== '_token') {
                if (Str::before($key, '_') == 'attribute') {
                    if (strpos($key, 'name')) {
                        $attribute['name'] = $value;
                    }

                    if (strpos($key, 'value')) {
                        $attribute['value'] = $value;
                        $attributes[] = $attribute;  // Мы должны добавить $attribute в $attributes, а не $counter

                    }
                }
            }
        }

        $data['DATA'] = json_encode($attributes);
        $product->update($data);
        return redirect()->route('products_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('products_index');
    }
}
