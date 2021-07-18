<?php

namespace App\Http\Controllers\AdminClient;

use App\Category;
use App\Commerce;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::with(['category'])
            ->where('commerce_id', commerceActive()->id)
            ->get();

        return view('adminSite.products.index', compact('products'));
    }

    public function addNew()
    {
        $categories = Category::all();

        return view('adminSite.products.addProduct', compact('categories'));
    }

    public function storeNew(ProductCreateRequest $request)
    {
        $commerceId = Commerce::where('user_id', userConnect()->id)
            ->first();


        if ($request->price) {
            $price = $request->price;
        } else {
            $price = 0;
        }

        $commerce = Product::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            'price' => $price,
            'commerce_id' => $commerceId->id
        ]);


        $path = 'users/images/' . $commerceId->user_id;
        $pathSub = 'users/images/' . $commerceId->user_id . '/producto';

        if (!is_dir($path)) {
            mkdir('users/images/' . $commerceId->user_id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $commerceId->user_id . '/producto');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo512'] = '512x512-' . $commerceId->user_id . '-' . $image->getClientOriginalName();
            $input['photo100'] = '100x100-' . $commerceId->user_id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(512, 512)->save($path . '/producto/' . $input['photo512']);
            $img->fit(100, 100)->save($path . '/producto/' . $input['photo100']);

            $commerce->photo = Str::after($input['photo512'], '-');
        }

        $commerce->save();

        toast('Producto creado correctamente!', 'success');
        return back();
    }

    public function editProduct($id)
    {
        $product = Product::find($id);

        $this->authorize('updateProduct', $product);
        
        $categories = Category::all();

        return view('adminSite.products.editProduct', compact('product', 'categories'));
    }

    public function updateProduct(ProductCreateRequest $request, $id)
    {
        $product = Product::find($id);

        $this->authorize('updateProduct', $product);

        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->category_id = $request['category_id'];
        $product->description = $request['description'];
        
        $path = 'users/images/' . userConnect()->id;
        $pathSub = 'users/images/' . userConnect()->id . '/producto';

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo512'] = '512x512-' . userConnect()->id . '-' . $image->getClientOriginalName();
            $input['photo100'] = '100x100-' . userConnect()->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(512, 512)->save($path . '/producto/' . $input['photo512']);
            $img->fit(100, 100)->save($path . '/producto/' . $input['photo100']);

            $product->photo = Str::after($input['photo512'], '-');
        }


        $product->save();

        toast('Producto actualizado correctamente!', 'success');
        return back();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $this->authorize('updateProduct', $product);

        $product->delete();

        toast('Producto eliminado correctamente!', 'success');
        return back();
    }
}
