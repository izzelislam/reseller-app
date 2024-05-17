<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductCard extends Component
{
    public $key = null;
    public $category = null;
    public $product_id = "";
    public $qty = null;
    

    public function Search()
    {
    }

    public function DeleteProduct()
    {
        $this->product_id = "";
        $this->qty = null;
    }

    public function OrderProduct( $product_id )
    {
        $validated = $this->validate([ 
            'qty' => 'required|numeric|min:1|max:100000',
        ]);

        
        try {
            DB::beginTransaction();
            
            $seeting = Setting::first();
            $product = Product::findOrFail($product_id);

            if ($seeting->monitor_stock == 1 && $product->stock > 0) {
                $product->update([
                    'stock' => $product->stock - $this->qty
                ]);
            }

            Sale::create([
                'user_id'       => auth()->user()->id, 
                'product_id'    => $product_id, 
                'qty'           => $this->qty, 
                'comision'      => $product->reseller_comission * $this->qty
            ]);

            DB::commit();


            session()->flash('success', 'Berhasil Menjual Produk');
    
            $this->product_id = "";
            $this->qty = null;

            redirect()->route('products.index');
        } catch (\Throwable $e) {

            DB::rollBack();
            $this->product_id = "";
            $this->qty = null;

            session()->flash('error', $e->getMessage());
        }

    }

    public function render()
    {
        $query = Product::query();

        if (!empty($this->key)) {
            $query->where('name', 'like', '%' . $this->key . '%');
        }

        if (!empty($this->category) && $this->category != 'semua') {
            $query->where('category_id', $this->category);
        }

        $products = $query->get();
        $categories = Category::all();
        return view('livewire.product-card', compact('products', 'categories'));
    }
}
