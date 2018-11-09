<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function index()
    {
    	$products = Products::orderBy('id', 'DESC')->paginate();
    	return view('products.index', compact('products'));
    } 

    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.edit', compact('product'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = new Products;
        
        $product->name = $request->name;
        $product->short = $request->short;
        $product->body = $request->body;

        $product->save();
        return redirect()->route('products.index')
                         ->with('info', 'El producto fue guardado'); 
    }

    public function show($id)
    {
    	$product = Products::find($id);
    	return view('products.show', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Products::find($id);

        $product->name = $request->name;
        $product->short = $request->short;
        $product->body = $request->body;

        $product->save();

        return redirect()->route('products.index')
                         ->with('info', 'El producto fue actualizado');   
    }


    public function destroy($id)
	{
		$product = Products::find($id);
		$product->delete();

		return back()->with('info', 'El producto fue eliminado');
	}
}
