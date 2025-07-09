<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\AttributeType;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['mainImage', 'attributes.attributeType'])
        ->where('is_active', true)
        ->get()
        ->map(function ($product) {
            $product->main_image_url = Storage::disk($product->mainImage->disk)->url($product->mainImage->path);
            return $product;
        });

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $productImagePath = '';

        try {

            DB::beginTransaction();

            $product = Product::create([
                'name'      => $request->name,
                'price'     => $request->price,
            ]);
    
            ProductAttribute::create(['product_id' => $product->id, 'attribute_type_id' => AttributeType::COLOR_ID, 'value' => $request->color]);
            ProductAttribute::create(['product_id' => $product->id, 'attribute_type_id' => AttributeType::SIZE_ID, 'value' => $request->size]);
            ProductAttribute::create(['product_id' => $product->id, 'attribute_type_id' => AttributeType::MATERIAL_ID, 'value' => $request->material]);
            ProductAttribute::create(['product_id' => $product->id, 'attribute_type_id' => AttributeType::BRAND_ID, 'value' => $request->brand]);
            ProductAttribute::create(['product_id' => $product->id, 'attribute_type_id' => AttributeType::WEIGHT_ID, 'value' => $request->weight]);
    
            $productImagePath = $request->image->store('', ProductImage::DISK);
            
            ProductImage::create([
                'product_id'    => $product->id,
                'disk'          => ProductImage::DISK,
                'path'          => $productImagePath,
                'is_main'       => true,
            ]);   

            DB::commit();

            return redirect()->route('products.index');
        } catch (\Throwable $th) {

            if(Storage::disk(ProductImage::DISK)->exists($productImagePath)){
                Storage::disk(ProductImage::DISK)->delete($productImagePath);
            }

            DB::rollBack();
            
            return redirect()->back()->withErrors(['error' => 'An error occurred during your request.'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function manage()
    {
        $products = Product::all();
        return view('products.manage', compact('products'));
    }

    public function toggle(Product $product)
    {
        $product->is_active = !$product->is_active;
        $product->save();

        return redirect()->route('products.manage')->with('message', 'Produto atualizado com sucesso.');
    }
}
