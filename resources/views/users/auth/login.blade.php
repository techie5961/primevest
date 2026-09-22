@extends('layout.users.auth')
@section('title')
    Login
@endsection
@section('header_link')
     <span x-data="{  }" x-on:click="Vitecss.navigate('register')" class="pointer c-primary row align-center g-5px no-select font-weight-700">
            Sign Up
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
  <g fill="currentColor">
    <path d="m4.25,11c-.192,0-.384-.073-.53-.22-.293-.293-.293-.768,0-1.061l3.72-3.72-3.72-3.72c-.293-.293-.293-.768,0-1.061s.768-.293,1.061,0l4.25,4.25c.293.293.293.768,0,1.061l-4.25,4.25c-.146.146-.338.22-.53.22Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
        </span>
@endsection
@section('main')
    <section class="w-full align-center justify-center column g-10">
      
        <form action="{{ url('users/post/login/process') }}" method="POST" onsubmit="PostRequest(event,this,LoggedIn)" class="w-full max-w-500 column g-10">
      <div class="w-full column g-10">
        <div class="w-full column align-center g-5px">
            <span class="c-primary">Welcome Back</span>
            <strong class="font-weight-800 font-size-1-5rem">Secure Login</strong>
        </div>
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
          {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Email Address</label>
            <div class="cont">
                <input name="email" type="email" placeholder="Enter email" class="inp input required">
            </div>
           </div>
           {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Password</label>
            <div class="cont">
                <input name="password" type="password" placeholder="Password" class="inp input required">
            </div>
           </div>
           
           
         
           
           <button class="post br-5">Login</button>
       <div x-data="{  }" class="row align-center m-x-auto g-5">Not a member? <a style="color: var(--primary-light)" x-on:click="Vitecss.navigate('{{ url('register') }}')" class="c-primar no-u">Create a New Account</a></div> 
      
      </div>
        </form>
    </section>
      
@endsection
@section('js')
    <script class="js">
      
        function LoggedIn(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                 window.location.href='{{ url('users/dashboard') }}';
            }
            
        }
        Debug();
    </script>
@endsection