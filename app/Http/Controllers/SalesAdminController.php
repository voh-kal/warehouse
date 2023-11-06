<?php

namespace App\Http\Controllers;

use App\Models\DistributeProduct;
use App\Models\Item;
use App\Models\Product;
use App\Models\Products;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesAdminController extends Controller
{
    public function dashboard()
    {

        return view('sales_admin.main.dashboard');
    }

    public function create_warehouse(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'warehouse_name' => 'required',
                'address' => 'required',
                'floor_number' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $create_warehouse = Warehouse::create($request->all());
            if ($create_warehouse) {
                return back()->with('success', 'Warehouse Created');
            }
        }
        return view('sales_admin.warehouse.create_warehouse');
    }

    public function all_warehouse()
    {
        $all_warehouse = Warehouse::orderBy('id', 'DESC')->get();
        return view('sales_admin.warehouse.all_warehouse', compact('all_warehouse'));
    }

    public function add_product(Request $request)
    {
        $all_warehouse = Warehouse::all();
        $products = Product::all();

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'warehouse_id' => 'required',
                'floor_number' => 'required',
                'product_id' => 'required',
                'quantity' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            // dd($request->all());
            $add_product = DistributeProduct::create($request->all());

            if ($add_product) {
                $numberOfItems = $request->quantity;
                $itemNumber = mt_rand(0001, 9999);
                for ($i = 0; $i < $numberOfItems; $i++) {
                    Item::create([
                        'product_id' => $add_product->product_id,
                        'warehouse_id' => $add_product->warehouse_id,
                        'dis_product_id' => $add_product->id,
                        'item_code' => 'PR' . $request->product_id . $itemNumber++,
                    ]);
                }

                return back()->with('success', 'Product Added Created');
            }
        }
        return view('sales_admin.product.add_product', compact('all_warehouse', 'products'));
    }

    public function create_product(Request $request)
    {

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [

                'product_name' => 'required',
                'price' => 'required',
                'model' => 'required',
                'part_code' => 'required',
                'limit' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            if (isset($request->product_image)) {

                $stamps = $request->file('product_image');
                $ext = $stamps->getClientOriginalExtension();
                //make a unique name
                $filename = uniqid() . '.' . $ext;
                //upload the stamps
                $stamps->move(public_path('/storage/assets/images'), $filename);
                // dd($filename);
            }

            $request->merge([
                'image' => $filename,
                'product_number' => 'PR',
            ]);
            $create_product = Product::create($request->except('product_image'));

            if ($create_product) {
                $create_product->product_number = 'PR' . $create_product->id;
                $create_product->save();

                return back()->with('success', 'Product Created');
            }
        }
        return view('sales_admin.product.create_product');
    }

    public function available_product()
    {
        $available_products = Product::orderBy('id', 'DESC')->get();


        return view('sales_admin.product.available_product ', compact('available_products'));
    }

    public function product_item($product_number)
    {
        $available_items = Item::where(['product_id' => $product_number, 'status' => 'available'])->orderBy('id', 'DESC')->get();
        // $sold_items = Item::where(['product_number' => $product_number, 'status' => 'sold'])->orderBy('id', 'DESC')->get();
        // $product = Product::where(['product_number' => $product_number])->first();
        // $dis_id = DistributeProduct::where(['id' => $item->dis_product_id])->first();
        // dd($available_items, $sold_items, $product, $warehouse);
        return view('sales_admin.product.items', compact('available_items', 'product_number'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $cart = session('cart', []);    
        dd($cart);
        // Add the product to the cart
        $cart[] = $product;

        session(['cart' => $cart]);

        return back()->with('success', 'Item added to cart.');
    }
}
