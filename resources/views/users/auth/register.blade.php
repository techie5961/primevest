@extends('layout.users.auth')
@section('title')
    Register
@endsection
@section('header_link')
     <span x-data="{  }" x-on:click="Vitecss.navigate('login')" class="pointer c-primary row align-center g-5px no-select font-weight-700">
            Sign In
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
  <g fill="currentColor">
    <path d="m4.25,11c-.192,0-.384-.073-.53-.22-.293-.293-.293-.768,0-1.061l3.72-3.72-3.72-3.72c-.293-.293-.293-.768,0-1.061s.768-.293,1.061,0l4.25,4.25c.293.293.293.768,0,1.061l-4.25,4.25c-.146.146-.338.22-.53.22Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
        </span>
@endsection
@section('main')
    <section class="w-full align-center justify-center column g-10">
       
        <form x-data="{  }" action="{{ url('users/post/register/process') }}" method="POST" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                 window.location.href='{{ url('users/login') }}';
            }
            
        })" class="w-full max-w-500 column g-10">
      <div class="column g-10 w-full">
         <div class="w-full column align-center g-5px">
            <strong class="font-weight-800 font-size-1-5rem">Register</strong>
        </div>
           {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
           {{-- new row --}}
           <div class="row align-center g-10px w-full">
              {{-- new input --}}
            <div class="column g-5 w-full">
            <label>First Name</label>
            <div class="cont">
                <input name="first_name" type="text" placeholder="Enter First Name" class="inp input required">
            </div>
           </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Last Name</label>
            <div class="cont">
                <input name="last_name" type="text" placeholder="Enter Last Name" class="inp input required">
            </div>
           </div>
           </div>
         
            {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Email Address</label>
            <div class="cont">
                <input name="email" type="email" placeholder="Enter email" class="inp input required">
            </div>
           </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Username</label>
            <div class="cont">
                <input name="username" type="text" placeholder="Enter username" class="inp input required">
            </div>
           </div>
         
           {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Password</label>
            <div class="cont">
                <input name="password" type="password" placeholder="Enter password" class="inp input required">
            </div>
           </div>
            {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Invite Code</label>
            <div class="cont">
                <input {{ $ref != '' ? 'readonly' : '' }} value="{{ $ref }}" name="ref" type="text" placeholder="Enter invite code" class="inp input">
            </div>
           </div>

           <button class="post br-5">Register</button>
       <div x-data="{  }" class="row align-center m-x-auto g-5">Already registered with us? <a style="color: var(--primary-light)" x-on:click="Vitecss.navigate('{{ url('login') }}')" class="c-primar no-u">Sign In</a></div> 
      
    </div>
  </form>
    </section>
@endsection