<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
class admincontroller extends Controller
{

protected $redirectTo = '/login';
    
    public function index()
    {
        return view('dashboard.index');
    }

    public function login()
    {
        return view('dashboard.login');
    }
    
 
    public function deleteproduct($id)
    {
        $product =  product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Delete the Product successfully');
    }
    public function product()
    {
        $products = product::all();
        return view('dashboard.product', compact('products'));
    }
    public function cart()
    {
        $products = product::all();
        return view('dashboard.cart', compact('products'));
    }
    public function addToCart(Request $request)
    {
        $product = product::find($request->product_id);

        $cart = new cart();
        $cart->product_id  = $product->id;
        $cart->name = $product->name;
        $cart->price = $product->price;
        $cart->quantity = 1; // Default quantity
        $cart->save();

        return redirect('viewcart')->with('success', 'Product added to cart!');
    }
    public function viewcart()
    {
        $cartItems = cart::all();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('dashboard.viewcart', compact('cartItems', 'totalPrice'));
    }
    public function addnewproduct(Request $data)
    {
        $product = new product();
        $product->name = $data->input('name');
        $product->description = $data->input('description');
        $product->price = $data->input('price');
        $product->stock = $data->input('stock');
        $product->sku = $data->input('sku');
         
        $product->is_active = $data->input('is_active');
        $product->save();
        return redirect()->back()->with('success', 'congratulation');
    }
    public function updateproduct(Request $data)
    {
        $product =  product::find($data->input('id'));
        $product->name = $data->input('name');
        $product->description = $data->input('description');
        $product->price = $data->input('price');
        $product->stock = $data->input('stock');
        $product->sku = $data->input('sku');
        
        $product->is_active = $data->input('is_active');
        $product->save();
        return redirect()->back()->with('success', 'Update the product Successfully');
    }
 
public function loginaccount(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed
            return redirect()->route('dashboard.index'); // Use route name
        }

        // Authentication failed
        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Log the user out
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token

    return redirect('/login')->with('success', 'You have been logged out successfully.');
}
}