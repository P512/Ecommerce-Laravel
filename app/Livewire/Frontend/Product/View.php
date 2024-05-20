<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Attribute;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $product, $category, $productColorSelectedQuantity, $quantityCount = 1, $productColorId, $attribute, $selectedRam, $selectedStorage, $sellingPrice, $originalPrice, $attributeId;

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

    public function addToCart(int $productId,$attributeId)
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
                        ->where('attribute_id',$attributeId)
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
                                    'attribute_id' => $attributeId,
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
                                    'attribute_id' => $attributeId,
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

    
    public function mount(Product $product, $category, Attribute $attribute)
    {
        $this->product = $product;
        $this->category = $category;
        $this->attribute = $attribute;
        $this->updatePrice();
    }

    public function updatePrice()
    {
        $attributes_details = Attribute::where('product_id', $this->product->id)->get();

        // Default Price Not Selected Any Option
        if (empty($this->selectedRam) && empty($this->selectedStorage)) {
            $firstAttribute = $attributes_details->first();

            if ($firstAttribute) {
                $this->sellingPrice = '₹'.$firstAttribute->selling_price;
                $this->originalPrice = '₹'.$firstAttribute->original_price;
                return;
            }
        }
        else
        {
        // Select Options
        $selectedAttribute = $attributes_details->where('ram', $this->selectedRam ?? $attributes_details->first()->ram)
        ->where('storage', $this->selectedStorage ?? $attributes_details->first()->storage)
        ->first();

        if ($selectedAttribute)
        {
            $this->sellingPrice = '₹'.$selectedAttribute->selling_price;
            $this->originalPrice = '₹'.$selectedAttribute->original_price;
        }
        else
        {
            $this->sellingPrice = "Product Not Available";
            $this->originalPrice = "";
        }
    }
}

    public function render()
    {
        $attributes_details = Attribute::where('product_id', $this->product->id)->get();
        return view('livewire.frontend.product.view', [
            'product' => $this->product,
            'category' => $this->category,
            'attributes_details' => $attributes_details,
        ]);
    }
}
