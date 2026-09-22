@extends('layout.users.app')
@section('title')
    Recharge
@endsection
@section('main')
     <section class="w-full column">
       
        {{-- new section /body --}}
        <section class="section column w-full g-10px body">
            @isset(Auth::guard('users')->user()->paga_account)
            <div class="w-full column bg-primary p-1px br-10px">
                 <div class="row primary-text p-5px p-x-15px align-center g-10px space-between">

                    <strong class="font-weight-800 ws-nowrap m-right-auto font-size-1rem">Your Payment Account</strong>
               <div class="p-5px uppercase font-size-07rem p-x-10px br-5px bg-white c-primary no-select no-pointer">Bank Transfer</div>
                </div>
          <div class="w-full g-10px column p-15px br-top-right-15px br-top-left-15px br-bottom-right-10px br-bottom-left-10px bg-light">
                 
                <span class="opacity-07">Transfer money to the account below to automatically fund your account.</span>
                <div class="w-full br-10px column g-10px p-15px border-width-1px border-style-solid border-color-primary-01 bg-primary-01">
                    {{-- new row --}}
                    <div class="row align-center g-10px">
                        <span>Bank Name</span>
                <img src="{{ asset('banners/IMG_7927.png') }}" alt="" class="w-20px">

                        <strong class="c-primary font-size-1rem">{{ json_decode(Auth::guard('users')->user()->paga_account)->bank_name }}</strong>
                    </div>
                    {{-- new column --}}
                    <div class="column g-5px">
                        <span>Account Number</span>
                        <strong class="font-weight-800 font-size-1rem">{{ json_decode(Auth::guard('users')->user()->paga_account)->account_number }}</strong>
                    </div>
                      {{-- new column --}}
                    <div class="column g-5px">
                        <span>Account Name</span>
                        <strong class="font-weight-800 font-size-1rem">{{ json_decode(Auth::guard('users')->user()->paga_account)->account_name }}</strong>
                    </div>
                    {{-- new --}}
                    <button x-data="{ 
                        Copied : false
                     }" class="w-full border-none bg-primary br-5px p-10px primary-text row align-center justify-center no-select g-5px">
                      <svg x-show="!Copied" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
  <g fill="currentColor">
    <path d="m13,7h2c1.105,0,2,.895,2,2v6c0,1.105-.895,2-2,2h-6c-1.105,0-2-.895-2-2v-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <rect x="3" y="3" width="10" height="10" rx="2" ry="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor"></rect>
  </g>
</svg> 
<svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
  <g fill="currentColor">
    <path d="m12,1C5.935,1,1,5.935,1,12s4.935,11,11,11,11-4.935,11-11S18.065,1,12,1Zm-1.951,16.463l-4.463-4.463,1.414-1.414,2.951,2.951,6.955-7.948,1.505,1.317-8.362,9.557Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                        <span x-on:click="
                        copy('{{ json_decode(Auth::guard('users')->user()->paga_account)->account_number }}');
                        Copied = true;
                        setTimeout(() => {
                            Copied = false;
                        }, 2000);
                        " x-text="Copied ? 'Copied' : 'Copy Account Number'"></span>
                    </button>
                </div>
                <small>Only use the account shown on this page to add funds. Your wallet is automatically funded upon successfull transfer</small>
         
          </div>
            </div>









            @else
            {{-- new column --}}
            <div class="column w-full max-w-500 m-x-auto">
                <strong class="desc font-weight-900">Create your bank account</strong>
                <span class="opacity-07">Fill the form below to create your payment bank account</span>
            </div>
              <form method="POST" action="{{ url('users/post/generate/paga/account/process') }}" onsubmit="PostRequest(event,this,Updated)" class="analytics p-20px column br-10px box-shadow w-full bg-light max-w-500 m-x-auto column g-10">
               <div class="column w-full align-center g-10 justify-center">
            </div>
                {{-- csrf token --}}
               <input type="hidden" class="input inp required" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Enter First Name</label>
                <div class="cont">
                    <input value="{{ explode(' ',Auth::guard('users')->user()->name)[0] }}" name="first_name" placeholder="First name" type="text" class="inp input required">
                </div>
               </div>
               {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Enter Last Name</label>
                <div class="cont">
                    <input value="{{ explode(' ',Auth::guard('users')->user()->name)[1] }}" name="last_name" placeholder="Last name" type="text" class="inp input required">
                </div>
               </div>
               {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Enter Email Address</label>
                <div class="cont">
                    <input value="{{ Auth::guard('users')->user()->email }}" name="email" placeholder="Email address" type="email" class="inp input required">
                </div>
               </div>
                
             <button class="post">Create my account</button>
            </form>
            @endisset
          
        
            
          
        </section>
      
    </section>

    
@endsection
@section('js')
    <script class="js">
        function Updated(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url()->current() }}');
            }
        }
    </script>
@endsection