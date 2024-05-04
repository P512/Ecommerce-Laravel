<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $product, $category, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function addToWishList($productId)
    {
        if (Auth::check())
        {
            if (Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Already Added To WishList');
                $this->dispatch('message',
                text: 'Already Added To WishList',
                type : 'success',
                status: 409,
            );
            }
            else
            {
                Wishlist::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=> $productId,
                ]);
                $this->dispatch('wishlistAddedUpdated');
                session()->flash('message','Wishlist Added Successfull');
                $this->dispatch('message',
                text: 'Wishlist Added Successfull',
                type : 'success',
                status: 200,
            );
            }
        }
        else
        {
            session()->flash("message","Please Login To Continue");
            $this->dispatch('message',
                text: 'Please Login To Continue',
                type : 'info',
                status: 401,
            );
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if($this->productColorSelectedQuantity == 0)
        {
            $this->productColorSelectedQuantity = 'outofstock';
        }
    }
    public function incrementQuantity()
    {
        if($this->quantityCount < 10)
        {
        $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if($this->quantityCount > 1)
        {
        $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check())
        {
            if ($this->product->where('id',$productId)->where('status','0')->exists())
            {
                //check for color quantity and insert to cart
                if ($this->product->productColors()->count() > 0)
                {
                    if($this->productColorSelectedQuantity != null)
                    {
                    if (Cart::where('user_id',auth()->user()->id)
                        ->where('product_id',$productId)
                        ->where('product_color_id',$this->productColorId)
                        ->exists())
                        {
                            $this->dispatch('message',
                            text: 'Product Already Added',
                            type : 'warning',
                            status: 200
                            );
                        }
                        else
                        {
                        $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                        if($productColor->quantity > 0)
                        {
                            if ($productColor->quantity > $this->quantityCount)
                            {
                                Cart::create([
                                    'user_id'=>auth()->user()->id,
                                    'product_id'=> $productId,
                                    'product_color_id'=> $this->productColorId,
                                    'quantity'=> $this->quantityCount,
                                ]);
                                $this->dispatch('CartAddedUpdated');
                                $this->dispatch('message',
                                text: 'Product Added To Cart',
                                type : 'success',
                                status: 200
                                );
                            }
                            else
                            {
                                $this->dispatch('message',
                                text: 'Only '.$productColor->quantity.' Quantity Available',
                                type : 'warning',
                                status: 404
                                );
                            }
                        }
                        else
                        {
                            $this->dispatch('message',
                            text: 'Out Of Stock',
                            type : 'warning',
                            status: 404
                            );
                        }
                    }
                    }
                    else
                    {
                        $this->dispatch('message',
                        text: 'Select Your Product Color',
                        type : 'info',
                        status: 404
                        );
                    }
                }
                else
                {
                    if (Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
                    {
                        $this->dispatch('message',
                        text: 'Product Already Added',
                        type : 'success',
                        status: 200
                        );
                    }
                    else
                    {
                if ($this->product->quantity > 0)
                    {
                        if ($this->product->quantity > $this->quantityCount)
                            {
                                Cart::create([
                                    'user_id'=>auth()->user()->id,
                                    'product_id'=> $productId,
                                    'quantity'=> $this->quantityCount,
                                ]);
                                $this->dispatch('message',
                                text: 'Product Added To Cart',
                                type : 'success',
                                status: 200
                                );
                            }
                            else
                            {
                                $this->dispatch('message',
                                text: 'Only '.$this->product->quantity.' Quantity Available',
                                type : 'warning',
                                status: 404
                                );
                            }
                }
                else
                {
                    $this->dispatch('message',
                text: 'Out Of Stock',
                type : 'warning',
                status: 404
                );
                }
            }
            }
            }
            else
            {
                $this->dispatch('message',
                text: 'Product Does Not Exists',
                type : 'warning',
                status: 404
            );
            }
        }
        else
        {
            $this->dispatch('message',
            text: 'Please Login To Add To Cart',
            type : 'info',
            status: 401,
        );
        }

    }
    public function mount(Product $product, $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'product'=> $this->product,
            'category'=> $this->category,
        ]);
    }
}
