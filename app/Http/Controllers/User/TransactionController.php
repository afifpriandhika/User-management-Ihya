<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserDonation;
use App\Models\Transaction;
use App\Models\proyek;
use App\Models\Product;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showProduct()
    {
        $products = Product::where('user_id',Auth::user()->id)->paginate(5);
        $productsCount = Product::where('user_id',Auth::user()->id)->count();
        return view ('user.product',compact('products','productsCount'));
    }
    
    public function showTransaction()
    {
        // $transactions = Transaction::where('user_id', Auth::user()->id)->where('status', 'PAID')->where('status', 'COMPLETE')where('status', 'NULL')->paginate(5);
        // $transactionsCount = Transaction::where('user_id', Auth::user()->id)->where('status', 'PAID')->count();
        $transactions = DB::table('transactions')
                            // ->join('products', 'transactions.product_id', '=', 'products.id')
                            ->where('user_id','=',Auth::user()->id)
                            ->where('status','!=','PENDING')
                            ->paginate(5);
        $transactionsCount = DB::table('transactions')
                            // ->join('products', 'transactions.product_id', '=', 'products.id')
                            ->where('user_id','=',Auth::user()->id)
                            ->where('status','!=','PENDING')
                            ->count();
        // dd($transactions);
        return view ('user.transactionHistory',compact('transactions','transactionsCount'));
    }
    
    public function portfolio(){
        
        $invested = DB::table('portfolios')
                            ->join('transactions','portfolios.transaction_id','=' ,'transactions.id')
                            ->where('portfolios.user_id','=',Auth::user()->id)
                            ->sum('total_income');
        $totalPrice = DB::table('portfolios')
                            ->join('transactions','portfolios.transaction_id','=' ,'transactions.id')
                            ->where('portfolios.user_id','=',Auth::user()->id)
                            ->whereNotNull('transactions.total_income')
                            ->sum('total_price');

        $withdrawed = DB::table('transactions')
                            ->where('.user_id','=',Auth::user()->id)
                            ->whereNull('transactions.total_price')
                            ->whereNotNull('transactions.total_income')
                            // ->get();
                            ->sum('total_income');
        
        // dd($withdrawed);
        
        $currentValue = $invested-$withdrawed;
        $totalProfit = $invested-$totalPrice;
        
        $portfolios = DB::table('portfolios')
                            ->join('transactions','portfolios.transaction_id','=' ,'transactions.id')
                            ->join('products','portfolios.product_id', '=', 'products.id')
                            ->where('portfolios.user_id','=',Auth::user()->id)
                            ->where('transactions.total_price','!=',null)
                            ->where('transactions.total_income','!=',null)
                            // ->get();
                            ->paginate(5);
        
        // dd($portfolios);
        return view ('user.portfolio',compact('currentValue','withdrawed','totalProfit','portfolios'));
    }
    
    
    public function showDonation(){
        
        $projects = DB::table('proyek')
                        ->join('proyek_owner','proyek.owner_id', '=', 'proyek_owner.id')
                        ->join('proyek_batch','proyek.id', '=', 'proyek_batch.proyek_id')
                        ->where('proyek_owner.user_id','=',Auth::user()->id)
                        ->select('proyek_batch.*','proyek.name','proyek.type','proyek.location')
                        ->paginate(5);
        $projectsCount = DB::table('proyek')
                        ->join('proyek_owner','proyek.owner_id', '=', 'proyek_owner.id')
                        ->join('proyek_batch','proyek.id', '=', 'proyek_batch.proyek_id')
                        ->where('proyek_owner.user_id','=',Auth::user()->id)
                        ->count();
        return view ('user.donation',compact('projects', 'projectsCount'));
    }
    
    public function showDonationHistory(){
        $donations = UserDonation::where('user_id', Auth::user()->id)->paginate(5);
        $donationsCount = UserDonation::where('user_id', Auth::user()->id)->count();
        
        // $donations = DB::table('user_donations')
        //             ->join('proyek', 'user_donations.proyek_id', '=', 'proyek.id')
        //             ->where('user_id', '=', Auth::user()->id)->paginate(5);
        // $donationsCount = DB::table('user_donations')
        //             ->join('proyek', 'user_donations.proyek_id', '=', 'proyek.id')
        //             ->where('user_id', '=', Auth::user()->id)->count();
        
        // dd($donations);
        return view ('user.donationHistory',compact('donations', 'donationsCount'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
