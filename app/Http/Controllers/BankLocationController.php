<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Bank;
use App\Models\BankLocation;
use Auth;



class BankLocationController extends Controller
{
    //

    public function index(Request $request, $id){
        
        $bankLocations = BankLocation::withTrashed()->with('bank','currency')->where('bank_id', $id)->paginate(20);
        $currencies = Currency::get();
        return view('pages.bank_locations' , compact('bankLocations', 'currencies'));

    }


    public function store(Request $request){

        try{
            
            if( Auth::user()->can('add-bank-location') ){

                $bankLocation = new BankLocation();
                $bankLocation->name = $request->name;
                $bankLocation->currency_id = $request->currency_id;
                $bankLocation->bank_id = $request->bank_id;
                $bankLocation->save();
                return back()->withInput()->with('success', 'Bank Location Addition Successful');
            }else{
                return back()->withInput()->with('error', 'Bank Location Addition Failed. UnAuthorized Action Failed');
            }

        }catch(\Exception $ex){
            return back()->withInput()->with('error', 'Bank Location Addition Failed. An Error Occurred Please Try Again Later');
        }
        
    }


    public function update(Request $request, $id){

        try{
            
            if( Auth::user()->can('edit-bank-location') ){

                $bankLocation = BankLocation::findOrfail($id);
                $bankLocation->name = $request->name;
                $bankLocation->currency_id = $request->currency_id;
                $bankLocation->save();
                return back()->withInput()->with('success', 'Bank Location Update Successful');
            }else{
                return back()->withInput()->with('error', 'Bank Location Update Failed. UnAuthorized Action Failed');
            }

        }catch(\Exception $ex){
            return back()->withInput()->with('error', 'Bank Location Update Failed. An Error Occurred Please Try Again Later');
        }
        
    }


    public function destory(Request $request, $id){

        if( Auth::user()->can('delete-bank-location') ){

            try{
                $bankLocation = BankLocation::findOrfail($id);
                $bankLocation->delete();
                return back()->withInput()->with('success', 'Bank Location Disabling Successful');
            }catch(\Exception $ex){
                return back()->withInput()->with('error', 'Bank Location Disabling Failed. Bank Is Currently In Use in Other Bank Accounts');
            }

        }else{

            return back()->withInput()->with('error', 'Bank Location Disabling Failed. UnAuthorized Action Failed');

        }   

    }

    public function restore(Request $request, $id){

        if( Auth::user()->can('restore-bank-location') ){

            $bankLocation = BankLocation::withTrashed()->findOrfail($id);
            $bankLocation->restore();
            return back()->withInput()->with('success', 'Bank Location Restoration Successful');

        }else{
            return back()->withInput()->with('error', 'Bank Location Restoration Failed. UnAuthorized Action Failed');
        }   

    }


}
