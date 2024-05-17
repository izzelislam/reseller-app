<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

        if(auth()->user()->role == 'customer') {
            $data["total_comision"] = Sale::where("user_id", auth()->user()->id)->sum("comision");
            $data["comision_current_month"] = Sale::where("user_id", auth()->user()->id)->whereMonth("created_at", date("m"))->sum("comision");
            $data["item_saled"] = Sale::where("user_id", auth()->user()->id)->sum("qty");
            $data["products"]  = Product::count();    
        }

        if(auth()->user()->role == 'admin') {

            $year = !empty(request("year")) ? request("year") : date("Y");
            $month = !empty(request("month")) ? request("month") : date("m");

            $data["total_products"] = Product::count();
            $data["item_saled"]     = Sale::whereYear("created_at", $year)->whereMonth("created_at", $month)->sum("qty");
            $data["user_reseller"]  = User::where("role", "customer")->count();
            $data["total_category"] = Category::count();
            $data["total_comision"] = Sale::whereYear("created_at", $year)->whereMonth("created_at", $month)->sum("comision");


            $sales_query_card = Sale::with("product")->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
            $sales_query_chart = Sale::with("product")->whereYear('created_at', $year)->get();
            $sales_model_chart = $sales_query_chart->groupBy(function ($item, $key) {
                return $item->created_at->format('m');
            })->map(function ($item, $key) {

                $total_price = 0;
                for ($i=0; $i <= count($item) - 1 ; $i++) { 
                    $total_price += $item[$i]->product->price * $item[$i]->qty;
                }

                $total_price_reseller = 0;
                for ($i=0; $i <= count($item) - 1 ; $i++) {
                    $total_price_reseller += $item[$i]->product->reseller_price * $item[$i]->qty;
                }

                return [
                    'price'      => $total_price,
                    'reseller_price'      => $total_price_reseller,
                    'qty'        => $item->sum('qty'),
                    'comision'   => $item->sum('comision'),
                ];  
            });

            $sales_model_card = $sales_query_card->groupBy(function ($item, $key) {
                return $item->created_at->format('y');
            })->map(function ($item, $key) {

                $total_price = 0;
                for ($i=0; $i <= count($item) - 1 ; $i++) { 
                    $total_price += $item[$i]->product->price * $item[$i]->qty;
                }

                $total_price_reseller = 0;
                for ($i=0; $i <= count($item) - 1 ; $i++) {
                    $total_price_reseller += $item[$i]->product->reseller_price * $item[$i]->qty;
                }

                return [
                    'price'      => $total_price,
                    'reseller_price'      => $total_price_reseller,
                    'comision'   => $item->sum('comision'),
                    'revenue'    => $total_price_reseller - $item->sum('comision'),
                ];
            });
            $data["sales_model_card"] = array_values($sales_model_card->toArray())[0] ?? [
                'price'      => 0,    
                'reseller_price'      => 0,
                'comision'   => 0,
                'revenue'    => 0,
            ];

            foreach ($months as $key => $value) {
                $data["sales_chart"][$value] = $sales_model_chart->get($value, ["price" => 0, "price_reseller" => 0, "qty" => 0, "comision" => 0]);
            }

            $data['latest_transactions'] = Sale::with("product.category", "user")->orderBy('created_at', 'desc')->take(8)->get(); ;

            // dd($latest_transactions->toArray());
        }

        // dd($data["total_comision"]);


        $saleQuery = Sale::query();
        if (auth()->user()->role == 'customer') {
            $saleQuery->where("user_id", auth()->user()->id);
        }
        $sale_data = $saleQuery->get();
        
        // groub by month and sum collection based on months variable
        $comision_month_collection = $sale_data->groupBy(function ($item, $key) {
            return $item->created_at->format('m');
        })->map(function ($item, $key) {
            return [
                'comision' => $item->sum('comision'),
                'qty'      => $item->sum('qty'),
            ];
        });

        foreach ($months as $key => $value) {
            $data["comision_month"][$value] = $comision_month_collection->get($value, ["comision" => 0, "qty" => 0]);
        }
        

        $data["comision_current_year"] = $saleQuery->whereYear("created_at", date("Y"))->sum("comision");

        // dd( $data["comision_month"]);


        return view('home', $data);
    }
}
