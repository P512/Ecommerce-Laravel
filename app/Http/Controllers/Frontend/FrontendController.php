<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending','1')->latest()->take(15)->get();
        $newArrivalProducts = Product::latest()->take(14)->get();
        $featuredProducts = Product::where('featured','1')->latest()->take(14)->get();
        return view("frontend.index", compact('sliders','trendingProducts','newArrivalProducts','featuredProducts'));
    }
    public function about()
    {
        return view("frontend.about-us");
    }
    public function contact()
    {
        return view("frontend.contact-us");
    }
    public function message_store(Request $request)
    {
        if(Auth::id()){
            UserMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
            return redirect()->back()->with('message','You Are Connected..');
        }
        else
        {
            return redirect('login');
        }
    }
    public function newArrival()
    {
        $newArrivalProducts = Product::latest()->take(16)->get();
        return view("frontend.pages.new-arrival", compact('newArrivalProducts'));
    }
    public function trendingProducts()
    {
        $trendingProducts = Product::where('trending','1')->latest()->get();
        return view("frontend.pages.trendingProducts", compact('trendingProducts'));
    }
    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured','1')->latest()->get();
        return view("frontend.pages.featuredProducts", compact('featuredProducts'));
    }
    public function categories()
    {
        $categories = category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }
    public function products($category_slug)
    {
        $category = category::where('slug', $category_slug)->first();
        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }
    public function productView(string $category_slug, string $product_slug)
    {
        $category = category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('product','category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function searchProducts(Request $request)
    {
        if ($request->search)
        {
            $searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message','Empty Search');
        }

    }
}
