<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    
    public function index()
    {
        $banks=Bank::all();
        return view('horizontal.banks',compact('banks'));
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'bank_name'=>'required',
            'account_name'=>'required',
            'account_no'=>'required',
            'currency'=>'required',
            'type'=>'required',
        ]);
        Bank::updateorcreate(['id'=>$request->id],[
            'bank_name'=>$request->bank_name,'account_name'=>$request->account_name,
            'account_no'=>$request->account_no,
            'currency'=>$request->currency,
            'type'=>$request->type,
            'details'=>$request->details
        ]);
        return redirect()->route('banks.index');
        return $request->all();
    }
    
    public function show(Bank $bank)
    {
        //
    }
    
    public function edit(Bank $bank)
    {
        //
    }
    
    public function update(Request $request, Bank $bank)
    {
        //
    }
    
    public function destroy(Bank $bank)
    {
        //
    }
}
