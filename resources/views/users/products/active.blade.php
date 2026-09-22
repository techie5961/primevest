@extends('layout.users.app')
@section('title')
    Active Products
@endsection

@section('main')
    <section x-data="{ 
            Type : $persist('vip')
         }" class="w-full column g-10">
       
         
            <div class="column w-full no-select align-center w-full g-5px">
              <div class="row w-full align-center justify-center g-5px">
               
            <div style="width:80% !important;" class="p-5px row w-full align-center font-weight-900 br-1000px border-width-1px border-style-solid border-color-primary">
               <div x-bind:style="Type == 'vip' ? {
                'background' : 'var(--primary)',
                'color' : 'var(--primary-text)'
               } : {}" x-on:click="Type = 'vip'" class="w-full br-inherit p-10px h-full row align-center justify-center">
                VIP
               </div>
               <div  x-bind:style="Type == 'savings' ? {
                'background' : 'var(--primary)',
                'color' : 'var(--primary-text)'
               } : {}" x-on:click="Type = 'savings'" class="w-full br-inherit p-10px h-full row align-center justify-center">
                SAVINGS
               </div>
            </div>
            
              </div>
            <small class="uppercase">Track and manage your active investments</small>
              
            </div>
       {{-- ====== VIP ======= --}}

       <div x-show="Type == 'vip'" class="w-full column g-10">
        @if ($packages->isEmpty())
            @include('components.utilities',[
              'empty' => 'true',
              'text' => 'No Record'
            ])
        @else
        <section style="grid-template-columns:repeat(auto-fit,minmax(min(400px,100%),1fr))" class="w-full g-10 place-center grid">
             
            @foreach ($packages as $data)
                 <div class="w-full p-1px overflow-hidden bg-primary br-10px ">
                    <div class="w-full p-15px p-y-5px primary-text row align-center">
                        <strong class="font-size-1 font-weight-900">{{ $data->package->name }}</strong>
                    </div>
           <div class="w-full bg-light column g-10px br-top-right-15px br-top-left-15px br-bottom-left-10px br-bottom-right-10px p-15px">
             {{-- new --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Investment Duration</span>
                <span>{{ number_format($data->package->validity) }} Days</span>
               </div>
               {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Investment</span>
                <span>{{ $CurrencyHelper::format($data->package->cost,'NGN',$display_currency) }}</span>
               </div>
 {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Daily Payout</span>
                <span>{{ $CurrencyHelper::format($data->package->earning,'NGN',$display_currency) }}</span>
               </div>
              
               {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Investment Status</span>
               <div style="background:#4caf50;" class="p-5px p-x-10px br-5px bg-whatsapp c-white">In Progress</div>
               </div>
             
             
               {{-- new row --}}
               <div class="w-full uppercase br-5px countdown row min-h-40 align-center justify-center bg-primary no-select no-pointer primary-text">
                <span>Income: {{ $data->next }}</span>
               </div>
           </div>
        </div>
            @endforeach
        </section>
        
        @endif
       </div>
       {{-- ====== SAVINGS ======= --}}
       <div x-show="Type == 'savings'" class="w-full column g-10">
        @if ($savings->isEmpty())
            @include('components.utilities',[
              'empty' => 'true',
              'text' => 'No Record'
            ])
        @else
        <section style="grid-template-columns:repeat(auto-fit,minmax(min(400px,100%),1fr))" class="w-full g-10 place-center grid">
             
            @foreach ($savings as $data)
                 <div class="w-full p-1px overflow-hidden bg-primary br-10px ">
                    <div class="w-full p-15px p-y-5px primary-text row align-center">
                        <strong class="font-size-1 font-weight-900">{{ $data->package->name }}</strong>
                    </div>
           <div class="w-full bg-light column g-10px br-top-right-15px br-top-left-15px br-bottom-left-10px br-bottom-right-10px p-15px">
            {{-- new --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Start Date</span>
                <span>{{ $data->start_date }}</span>
               </div>
                {{-- new --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Maturity Date</span>
                <span>{{ $data->maturity_date }}</span>
               </div>
           
               {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Investment</span>
                <span>{{ $CurrencyHelper::format($data->package->cost,'NGN',$display_currency) }}</span>
               </div>
 {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Payout on Maturity</span>
                <span>{{ $CurrencyHelper::format($data->package->earning * $data->package->validity,'NGN',$display_currency) }}</span>
               </div>
              
              
             
             
               {{-- new row --}}
               <div class="w-full uppercase br-5px countdown row min-h-40 align-center justify-center bg-primary no-select no-pointer primary-text">
                <span>{{ number_format($data->cycle) }} days left</span>
               </div>
           </div>
        </div>
            @endforeach
        </section>
        
        @endif
       </div>
    </section>

    
@endsection
@section('js')
   
@endsection