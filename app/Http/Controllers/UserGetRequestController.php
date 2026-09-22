<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class UserGetRequestController extends Controller
{
    // switch currency
    public function SwitchCurrency(){
       DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'display_currency' => request('currency')
       ]);
       return redirect('users/dashboard');
    }

    // claim salary
    public function Claimsalary(){
        $validator=Validator::make(request()->all(),[
            'id' => 'required|regex:/^[0-9]+$/'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $salary=DB::table('salary')->where('id',request('id'))->first();
       $reward=($salary->reward*$salary->criteria)/100;
        if(DB::table('salaries')->where('user_id',Auth::guard('users')->user()->id)->where('salary->id',request('id'))->exists()){
            return response()->json([
                'message' => 'You have already claimed this reward',
                'status' => 'error'
            ]);
        }
        
            $refs=DB::table('transactions')->whereIn('user_id',function($q){
                $q->select('id')->from('users')->where('ref',Auth::guard('users')->user()->id);
            })->where('type','deposit')->sum('amount');
        if($refs < $salary->criteria){
            return response()->json([
                'message' => 'You havent met the criteria yet, keep inviting to meet the criteria and claim reward',
                'status' => 'error'
            ]);
        }
        
        DB::transaction(function() use($salary,$reward){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$salary->reward);
        
             DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Salary reward',
    'class' => 'credit',
    'type' => 'salary',
    'amount' => $reward,
    'fee' => 0,
    'icon' => '',
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => 0,
        'after' => 0
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    DB::table('salaries')->insert([
        'uniqid' => GenerateID(),
        'user_id' => Auth::guard('users')->user()->id,
        'salary' => json_encode($salary),
        'status' => 'success',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
            });
        return response()->json([
            'message' => 'Reward claimed successfully',
            'status' => 'success'
        ]);
    }

    // daily check in
    public function DailyCheckIn(){
        if(DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','daily_check_in')->whereDate('date',Carbon::today())->exists()){
            return response()->json([
                'message' => 'You have already checked in today, please try again tomorrow',
                'status' => 'info'
            ]);
            
        }
         $finance_settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}');

            DB::transaction(function() use($finance_settings){
                 DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$finance_settings->daily_check_in);
                 DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Daily Check In',
    'class' => 'credit',
    'type' => 'daily_check_in',
    'amount' => $finance_settings->daily_check_in,
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>',
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
    'data' => json_encode([
        'Reward Method' => 'Instant'
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => 0,
        'after' => 500
    ],
    'primary_wallet' => 'Main Wallet',

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
                    
            });
            return response()->json([
                'message' => 'Successfully checked-In',
                'status' => 'success'
            ]);
    }

    
}
