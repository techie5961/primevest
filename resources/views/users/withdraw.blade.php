@extends('layout.users.app')
@section('title')
    Withdraw
@endsection

@section('main')
     <section class="w-full g-10px column">
       
          <section class="column w-full g-10px">
           
            <div class="w-full box-shadow bg-primary primary-text max-w-500 m-x-auto br-10 p-20 column g-10">
                <strong class="desc font-weight-900">{{ $CurrencyHelper::format(Auth::guard('users')->user()->main_balance,'NGN',$display_currency) }}</strong>
                <span class="opacity-07">Available for Withdrawal</span>
            </div>
        </section>
        {{-- new section /body --}}
        <section class="section column g-10px body">
            <form x-data="{ 
                Amount : 0,

             }" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url('users/transactions') }}');
            }
        })" method="POST" action="{{ url('users/post/withdraw/process') }}" class="w-full br-10px column bg-primary p-1px">
              <div class="w-full row align-center p-5px p-x-15px primary-text br-inherit">
                 <label>SELECT WITHDRAWAL AMOUNT</label>

              </div>
                <div class="w-full column bg-light br-top-right-15px br-top-left-15px br-bottom-right-10px br-bottom-left-10px g-10px p-15px">
                 {{-- csrf token --}}
                <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
               {{-- new input --}}
                <div class="column display-none g-10 w-full">
                <div class="cont">
                    <strong class="font-1 h-full  row perfect-square align-center justify-center g-10 no-shrink">{{ $CurrencyHelper::symbol($display_currency) }}</strong>
                    <input x-model="Amount" readonly name="amount" data-fee="{{ $finance_settings->withdrawal->fee }}" oninput="CalculateToReceive(this)" placeholder="0.00" inputmode="numeric" type="number" class="inp input required">
                </div>
               </div>
               {{-- new  --}}
               <div style="grid-template-columns:repeat(auto-fit,minmax(min(30%,200px),1fr))" class="w-full g-10px grid place-center">
                <div x-data="{ 
                    Value : 1000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 5000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 10000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                
                 <div x-data="{ 
                    Value : 15000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 20000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 30000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 50000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 80000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 150000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 300000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
                 <div x-data="{ 
                    Value : 500000
                 }" x-html="'&#8358;' + FormatNumber(Value)" x-on:click="Amount = Value" x-bind:class="Amount == Value ? 'bg-primary primary-text' : 'border-width-1px border-style-solid border-color-primary'" class="p-10px p-x-10px row align-center justify-center br-5px box-shadow w-full">
                   
                </div>
               </div>
               {{-- new row --}}
               <div class="row align-center g-10 space-between">
                <span class="opacity-07 text-overflow-ellipsis ws-nowrap">You will receive: {{ $CurrencyHelper::symbol($display_currency) }}<span x-text="FormatNumber(Amount - ({{$finance_settings->withdrawal->fee}} * Amount)/100)"></span></span>
                <span class="opacity-07 ws-nowrap">Fee: {{ $finance_settings->withdrawal->fee }}%</span>
               </div>
              @isset (Auth::guard('users')->user()->bank)
                  
               @if ($finance_settings->withdrawal->portal == 'off')
                 <div class="w-full br-5px p-10px bg-primary-01 c-primary row align-center justify-center text-align-center">
                    Withdrawal is unavailable at the moment, please check back later
                 </div>
               @else
               <button class="post">Withdraw</button>
                   
               @endif
              @else
                  <div onclick="Redirect('{{ url('users/bank?next=withdrawal') }}')" style="border:1px solid var(--primary);color:var(--primary);background:var(--primary-01)" class="g-5 text-center p-5 m-top-10 w-full h-50 br-5 row align-center justify-center no-select pointer">

                   CLICK TO BIND BANK
                </div> 
              <small class="text-align-center c-primary">You are required to bind your target account before placing withdrawals</small>

              @endisset
               </div>
            </form>
          {{-- group --}}
          <section class="group w-full column g-10">
             @isset(Auth::guard('users')->user()->bank)

              {{-- new div --}}
            <div class="column w-full text-center box-shadow bg-light br-10 g-10 p-20">
                <strong class="font-1">Bank Account Details</strong>
                 
                  <div class="w-full bg-primary-01 border-color-primary-02 border-width-1px border-style-solid text-start br-5 p-20 column g-5">
               <span class="uppercase">{{ json_decode(Auth::guard('users')->user()->bank)->account_name }}</span>
               <span class="opacity-07">{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}  ....{{ substr(json_decode(Auth::guard('users')->user()->bank)->account_number,6,4) }}</span>
            <span onclick="Redirect('{{ url('users/bank?next=withdrawal') }}')" class="c-primary row no-select pointer g-2 align-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L14.7574 4.99678H5V18.9968H19V9.23943L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                <span>Edit bank details</span>
            </span>
            </div>
              
            </div>
             @endisset

              {{-- new div --}}
            <div class="w-full p-1px column bg-primary br-10px overflow-hidden">
                <div class="w-full p-5px p-x-15px primary-text">
                 <strong class="font-1">Withdrawal Instructions</strong>

                </div>
               <div class="w-full bg-light br-top-right-15px br-top-left-15px br-bottom-left-10px br-bottom-right-10px column p-15px g-10px">
                {{-- new row --}}
                <div class="row align-center g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Minimum withdrawal: {{ $CurrencyHelper::format($finance_settings->withdrawal->minimum,'NGN',$display_currency) }}</span>
                </div>
               @if ($finance_settings->withdrawal->maximum > 0)
                    {{-- new row --}}
                <div class="row align-center g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Maximum withdrawal: {{ $CurrencyHelper::format($finance_settings->withdrawal->maximum,'NGN',$display_currency) }}</span>
                </div>
               @endif
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Withdrawal Fee: {{ number_format($finance_settings->withdrawal->fee) }}%</span>
                </div>
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Double check your withdrawal account very well to avoid loss of funds.</span>
                </div>
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Referral is Optional, you dont have to refer before you withdraw.</span>
                </div>
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>All withdrawals are processed as fast as possible so expect to receive your withdrawal in time.</span>
                </div>
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>If you encounter any issues in your withdrawal do well to contact our support team and we would get it resolved.</span>
                </div>
               </div>
            </div>
          </section>

            
        </section>
    </section>
@endsection