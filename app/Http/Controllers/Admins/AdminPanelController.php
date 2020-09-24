<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Colors;
use App\Models\Messages;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_brand;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use App\Models\Stock;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin.index');

    }
    public function getUsers()
    {
        return view('admin.users')->with('users' , User::all());

    }
    public function getUser(User $user)
    {

        return view('admin.users')->with('user' , $user);
    }
    public function deleteUser(Request $request)
    {
        $delete = User::find($request->user_id)->delete();
        return response()->json([
            'status'=>true ,
            'id'=>$request->user_id ,
        ]);

    }
    public function editUser(User $user)
    {
        return view('admin.editUser')->with('user' ,$user);
    }

    public function updateUser(Request $request)
    {
        $newData = $request->all();
        if($request['password']==null)
        {
            $newData['password'] = User::where('id',$request->user_id)->first()->password;
        }
        else{
            $newData['password'] = Hash::make($newData['password']);
        }
       $updated =  User::where('id' , $request->user_id)->first();
         unset($newData['user_id']);
        $updated = $updated->update($newData);

        if($updated)
            return response()->json([
                'status'=>true
            ]);
        else{
            return response()->json([
                'status'=>false
            ]);
        }
    }
    public function addUser()
    {
        return view('admin.addUser');
    }
    public function storeUser(Request $request)
    {
        $newData = $request->all();
        $user = User::create($newData);
        $address = Address::create([
            'name'=>$request->address ,
            'user_id'=>$user->id
        ]);

        if($user && $address)
            return response()->json(['status'=>true]);
        return  response()->json(['status'=>false]);

    }
    public function getAdmins()
    {
        return view('admin.admins')->with('admins',Admin::all());
    }
    public function deleteAdmin(Request $request)
    {
        $delete = Admin::find($request->admin_id)->delete();
        return response()->json([
            'status'=>true ,
            'id'=>$request->admin_id ,
        ]);


    }
    public function addAmin()
    {
        return view('admin.addAdmin');
    }
    public function storeAdmin(Request $request)
    {
        $data = $request->all();
        $data['password']= Hash::make($data['password']);
        $admin = Admin::create($data);
        if($admin)
        {
            return response()->json([
                'status'=>true
            ]);
        }
        return response()->json([
            'status'=>false
        ]);

    }
    public function editAdmin(Admin $admin)
    {
        return view('admin.editAdmin')->with('admin', $admin);
    }
    public function updateAdmin(Request $request)
    {

        $newData = $request->all();
        if($request['password']==null)
        {
            $newData['password'] = Admin::where('id',$request->admin_id)->first()->password;
        }
        else{
            $newData['password'] = Hash::make($newData['password']);
        }
        $updated =  Admin::where('id' , $request->admin_id)->first();
        unset($newData['admin_id']);
        $updated = $updated->update($newData);

        if($updated)
            return response()->json([
                'status'=>true
            ]);
        else{
            return response()->json([
                'status'=>false
            ]);
        }
    }
    public function getOrders()
    {
        $orders = DB::select('select * from `product_variation_order`');
        return view('admin.orders')->with('orders',$orders );
    }
    public function getOrder($order)
    {

        $orders = DB::select("select * from `product_variation_order` where order_id=$order");


        return view('admin.orders')->with('orders',$orders);
    }

    public function changedToCompleted(Request $request)
    {
        $orderID = $request->order_id;
        $order = Order::find($orderID);
        $order->update([
            'status'=>Order::COMPLETED]);
        return redirect()->back();

    }
    public function getCustomerRequests()
    {
        return view('admin.requests')->with('requests',\App\Models\Request::all());
    }
    public function getCustomerRequest(User $user)
    {
        $request = $user->requests ;
        return view('admin.requests')->with('requests',$request);
    }
    public function changeRequestStatus(Request $request)
    {
        $requestId = $request->request_id ;
        $req = \App\Models\Request::find($requestId);
        $req->update([
            'status'=>'completed'
        ]);
        return redirect()->back();

    }
    public function rejectRequest(Request $request)
    {
        $requestId = $request->request_id ;
        $req = \App\Models\Request::find($requestId);
        $req->update([
            'status'=>'rejected'
        ]);
        return redirect()->back();
    }
    public function getCustomerMessages()
    {
        return view('admin.messages')->with('messages',Messages::all());
    }
    public function markMessageRead(Request $request)
    {
        $message = Messages::find($request->message_id);
        $message->update(['status'=>'read']) ;
        return redirect()->back();
    }
    public function deleteMessage(Request $request)
    {

        Messages::find($request->message_id)->delete();

        return response()->json([
            'id'=>$request->message_id
        ]);

    }
    public function getUsersTransactions()
    {
        return view('admin.transactions')->with('transactions',Transaction::all());

    }
    public function getUserTransactions(User $user)
    {


        return view('admin.transactions')->with('transactions', $user->transactions);

    }
    public function getProducts()
    {
        return view('admin.products')->with('products',Product::all());

    }
    public function editProduct(ProductVariation $productVariation)
    {
        return view('admin.editProduct')->with('productVariation',$productVariation);
    }
    public function updateProduct(Request $request)
    {
        $newData = $request->all();

//Stock::sync([
//    'product_variation_id'=>$newData['pro_id'],
//    'quantity'=>$newData['new_quantity']
//]);

        $updated = ProductVariation::where('id',$newData['pro_id'])->first()->stocks()->update([
            'quantity'=>$newData['new_quantity']
        ]);


        ProductVariation::where('id',$newData['pro_id'])->first()->update([
            'price'=>$newData['new_price']
        ]);

        return redirect()->back();
    }
    public function addProduct()
    {
        $categories = Category::all();
        $brands = Product_brand::all();
        $colors = Colors::all();
        $tags = Tag::all();
        $variations = ProductVariationType::all();
        return view('admin.addProduct')->with('categories',$categories)
                                            ->with('brands',$brands)
                                            ->with('colors',$colors)
                                            ->with('variations',$variations)
                                            ->with('tags',$tags);

    }
    public function storeProduct(Request $request)
    {
        $image = time().($request->image->getClientOriginalName());
      //  dd(public_path('images\\'.$image));
        $request->image->move('images' , $image);
        $imagePath = 'images/'.$image;


        $product = Product::create([
            'name'=>$request->product_name ,
            'slug'=>$request->product_name ,
            'image'=>$imagePath ,
            'tag_id'=>$request->tag_id ,
            'brand_id'=>$request->brand_id,
            'price'=>$request->product_price ,
            'description'=>$request->description ,
            'small_description'=>$request->small_desc ,


        ]);
        DB::table('color_product')->insert(
            ['color_id' => $request->color_id,
                'product_id' => $product->id]
        );
        DB::table('category_product')->insert(
            ['category_id' => $request->category_id,
                'product_id' => $product->id]
        );





//        DB::insert("insert into `color_product`('color_id','product_id') values($request->color_id ,$product->id) ");
        $productVariation  = ProductVariation::create([
            'product_variation_type_id'=>$request->variation_type_id ,
            'product_id'=>$product->id ,
            'name'=>$request->product_size ,
            'price'=>$request->product_price
        ]);

        Stock::create([
            'product_variation_id'=>$productVariation->id ,
            'quantity'=>$request->quantity
        ]);



        return redirect()->route('admin.products');

    }



}
