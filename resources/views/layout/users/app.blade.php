<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])
      @include('components.utilities',[
    'vite_js' => true
  ])
  <script>
    function Redirect(url,element=false){
        if(element){
            element.classList.add('animate');

            element.addEventListener('animationend',()=>{
                element.classList.remove('animate');
            })
        }
       Vitecss.navigate(url);
    }
    window.addEventListener('load',()=>{
        document.body.style.paddingBottom=document.querySelector('footer').offsetHeight + 'px';
    })
  </script>
    <title>{{ config('app.name') }} || Users || @yield('title') </title>
    <style>
        main{
            background:var(--bg);
            border-radius:15px 15px 0 0;
            color:var(--text);
        }
        body{
            background:var(--primary);
            color:var(--primary-text);
            padding:1px;
        }
        header{
            padding:20px;
        }
        header.overlayed,.group.overlayed{
                transform:translateY(5px) scale(0.95);
        }
        header.overlayed{
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .cont{
            border:1px solid var(--primary-05);
            border-radius:5px;
        }
        button.post{
            background:var(--primary);
        }
       
        @media(min-width:800px){
            footer,main,header{
                padding-left:15vw;
                padding-right:15vw;
            }
        }
       
    </style>

    {{-- yield css --}}
     @yield('css')
     {{-- stack css --}}
     @stack('css')
</head>
<body>
    {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])  
{{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
    <header class="transition-all">
      
          <div class="row m-bottom-10px g-10px">
       <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
  <g fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 11C2 5.47723 6.47723 1 12 1C17.5228 1 22 5.47723 22 11C22 16.5228 17.5228 21 12 21C6.47723 21 2 16.5228 2 11Z" fill="url(#1752500502811-9294189_user_existing_0_t4csz04ye)" data-glass="origin" mask="url(#1752500502811-9294189_user_mask_s86i2afs5)"></path>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 11C2 5.47723 6.47723 1 12 1C17.5228 1 22 5.47723 22 11C22 16.5228 17.5228 21 12 21C6.47723 21 2 16.5228 2 11Z" fill="url(#1752500502811-9294189_user_existing_0_t4csz04ye)" data-glass="clone" filter="url(#1752500502811-9294189_user_filter_nsyh9isk4)" clip-path="url(#1752500502811-9294189_user_clipPath_1jvvjoq1t)"></path>
    <path d="M12.4414 14C16.3397 14.0001 19.4999 17.1603 19.5 21.0586C19.5 22.1307 18.6307 23 17.5586 23H6.44141C5.36932 23 4.5 22.1307 4.5 21.0586C4.50012 17.1603 7.6603 14.0001 11.5586 14H12.4414ZM12 5C13.933 5 15.5 6.567 15.5 8.5C15.5 10.433 13.933 12 12 12C10.067 12 8.5 10.433 8.5 8.5C8.5 6.567 10.067 5 12 5Z" fill="url(#1752500502811-9294189_user_existing_1_bnqb6d6gm)" data-glass="blur"></path>
    <path d="M17.5586 22.25V23H6.44141V22.25H17.5586ZM18.75 21.0586C18.7499 17.5745 15.9255 14.7501 12.4414 14.75H11.5586C8.07451 14.7501 5.25012 17.5745 5.25 21.0586C5.25 21.7165 5.78354 22.25 6.44141 22.25V23L6.24316 22.9902C5.26408 22.891 4.5 22.0638 4.5 21.0586C4.50012 17.1603 7.6603 14.0001 11.5586 14H12.4414L12.8047 14.0088C16.5342 14.198 19.4999 17.2821 19.5 21.0586C19.5 22.1307 18.6307 23 17.5586 23V22.25C18.2165 22.25 18.75 21.7165 18.75 21.0586Z" fill="url(#1752500502811-9294189_user_existing_2_duz35xtpd)"></path>
    <path d="M14.75 8.5C14.75 6.98122 13.5188 5.75 12 5.75C10.4812 5.75 9.25 6.98122 9.25 8.5C9.25 10.0188 10.4812 11.25 12 11.25V12C10.067 12 8.5 10.433 8.5 8.5C8.5 6.567 10.067 5 12 5C13.933 5 15.5 6.567 15.5 8.5C15.5 10.433 13.933 12 12 12V11.25C13.5188 11.25 14.75 10.0188 14.75 8.5Z" fill="url(#1752500502811-9294189_user_existing_3_x5xjz4yjs)"></path>
    <defs>
      <linearGradient id="1752500502811-9294189_user_existing_0_t4csz04ye" x1="12" y1="1" x2="12" y2="21" gradientUnits="userSpaceOnUse">
        <stop stop-color="#575757"></stop>
        <stop offset="1" stop-color="#151515"></stop>
      </linearGradient>
      <linearGradient id="1752500502811-9294189_user_existing_1_bnqb6d6gm" x1="12" y1="5" x2="12" y2="23" gradientUnits="userSpaceOnUse">
        <stop stop-color="#E3E3E599"></stop>
        <stop offset="1" stop-color="#BBBBC099"></stop>
      </linearGradient>
      <linearGradient id="1752500502811-9294189_user_existing_2_duz35xtpd" x1="12" y1="14" x2="12" y2="19.212" gradientUnits="userSpaceOnUse">
        <stop stop-color="#fff"></stop>
        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
      </linearGradient>
      <linearGradient id="1752500502811-9294189_user_existing_3_x5xjz4yjs" x1="12" y1="5" x2="12" y2="9.054" gradientUnits="userSpaceOnUse">
        <stop stop-color="#fff"></stop>
        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
      </linearGradient>
      <filter id="1752500502811-9294189_user_filter_nsyh9isk4" x="-100%" y="-100%" width="400%" height="400%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse">
        <feGaussianBlur stdDeviation="2" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" edgeMode="none" result="blur"></feGaussianBlur>
      </filter>
      <clipPath id="1752500502811-9294189_user_clipPath_1jvvjoq1t">
        <path d="M12.4414 14C16.3397 14.0001 19.4999 17.1603 19.5 21.0586C19.5 22.1307 18.6307 23 17.5586 23H6.44141C5.36932 23 4.5 22.1307 4.5 21.0586C4.50012 17.1603 7.6603 14.0001 11.5586 14H12.4414ZM12 5C13.933 5 15.5 6.567 15.5 8.5C15.5 10.433 13.933 12 12 12C10.067 12 8.5 10.433 8.5 8.5C8.5 6.567 10.067 5 12 5Z" fill="url(#1752500502811-9294189_user_existing_1_bnqb6d6gm)"></path>
      </clipPath>
      <mask id="1752500502811-9294189_user_mask_s86i2afs5">
        <rect width="100%" height="100%" fill="#FFF"></rect>
        <path d="M12.4414 14C16.3397 14.0001 19.4999 17.1603 19.5 21.0586C19.5 22.1307 18.6307 23 17.5586 23H6.44141C5.36932 23 4.5 22.1307 4.5 21.0586C4.50012 17.1603 7.6603 14.0001 11.5586 14H12.4414ZM12 5C13.933 5 15.5 6.567 15.5 8.5C15.5 10.433 13.933 12 12 12C10.067 12 8.5 10.433 8.5 8.5C8.5 6.567 10.067 5 12 5Z" fill="#000"></path>
      </mask>
    </defs>
  </g>
</svg>
         <div class="column">
            <small class="opacity-07">Welcome Back</small>
            <strong class="font-size-1 font-weight-900">{{ Auth::guard('users')->user()->phone }}</strong>
        </div>
        {{-- currency toggle --}}
        <div x-data="{ 
            ShowToggle : false
         }" x-on:click="ShowToggle = !ShowToggle" class="w-fit c-text no-select pos-relative row align-center g-10px m-left-auto bg-light br-5px box-shadow p-10px">
        <div class="row align-center g-5px">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><title>nigeria</title><g><path fill="#fff" d="M10 4H22V28H10z"></path><path d="M5,4h6V28H5c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z" fill="#3b8655"></path><path d="M25,4h6V28h-6c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z" transform="rotate(180 26 16)" fill="#3b8655"></path><path d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z" opacity=".15"></path><path d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z" fill="#fff" opacity=".2"></path></g></svg>
            <span class="uppercase">{{ Auth::guard('users')->user()->country }}</span>
        </div>
        <i>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

        </i>
        {{-- positioned div --}}
        <div x-transition:leave-start="height-leave" x-transition:leave-end="height-leave-end" x-transition:enter-start="height-enter" x-transition:enter-end="height-enter-end" x-show="ShowToggle" x-on:click.stop="" class="pos-absolute overflow-hidden box-shadow z-index-2000 top-full left-0 bg-light right-0 br-5px transition-all column">
            {{-- new --}}
            <div x-on:click="Vitecss.navigate('{{ url('users/profile') }}')" x-on:touchstart="$el.classList.add('bg-rgt-003')" x-on:touchend="$el.classList.remove('bg-rgt-003')" class="row  pc-pointer p-10px align-center g-5px">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"></path></svg>

            <span>My Profile</span>
        </div>
         {{-- new --}}
            <div x-on:click="window.location.href='{{ url('users/logout') }}'" x-on:touchstart="$el.classList.add('bg-rgt-003')" x-on:touchend="$el.classList.remove('bg-rgt-003')" class="row pc-pointer p-10px align-center g-5px">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z"></path></svg>

            <span>Logout</span>
        </div>
        </div>
        </div>
       </div>
    </header>
    <main>
        
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer class="bg-primary no-select primary-text border-top-width-1px border-top-color-rgt-01 border-top-style-solid pos-fixed bottom-0 left-0 right-0 row g-10px align-center space-between">
        {{-- new nav link --}}
        <div onclick="Redirect('{{ url('users/dashboard') }}',this)" class="column pc-pointer p-10px p-y-5px align-center w-full {{ url()->current() == url('users/dashboard') ? 'bg-primary-dark' : '' }} g-2px">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M21 20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V9.48907C3 9.18048 3.14247 8.88917 3.38606 8.69972L11.3861 2.47749C11.7472 2.19663 12.2528 2.19663 12.6139 2.47749L20.6139 8.69972C20.8575 8.88917 21 9.18048 21 9.48907V20Z"></path></svg>

            </span>
            <small>Home</small>
        </div>
          {{-- new nav link --}}
        <div onclick="Redirect('{{ url('users/products/active') }}',this)" class="column pc-pointer p-10px p-y-5px align-center w-full {{ url()->current() == url('users/products/active') ? 'bg-primary-dark' : '' }} g-2px">
            <span>

<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M5 3C4.5313 3 4.12549 3.32553 4.02381 3.78307L2.02381 12.7831C2.00799 12.8543 2 12.927 2 13V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V13C22 12.927 21.992 12.8543 21.9762 12.7831L19.9762 3.78307C19.8745 3.32553 19.4687 3 19 3H5ZM19.7534 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H4.24662L5.80217 5H18.1978L19.7534 12Z"></path></svg>

            </span>
            <small>Orders</small>
        </div>
         {{-- new nav link --}}
        <div onclick="Redirect('{{ url('users/salary') }}',this)" class="column p-10px pc-pointer p-y-5px align-center w-full {{ url()->current() == url('users/salary') ? 'bg-primary-dark' : '' }} g-2px">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>
            </span>
            <small>Tasks</small>
        </div>
          {{-- new nav link --}}
        <div onclick="Redirect('{{ url('users/invite') }}',this)" class="column align-center pc-pointer p-y-5px p-10px w-full {{ url()->current() == url('users/invite') ? 'bg-primary-dark' : '' }} g-2px">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M13 14H11C7.54202 14 4.53953 15.9502 3.03239 18.8107C3.01093 18.5433 3 18.2729 3 18C3 12.4772 7.47715 8 13 8V3L23 11L13 19V14Z"></path></svg>

            </span>
            <small>Invite</small>
        </div>
          {{-- new nav link --}}
        <div onclick="Redirect('{{ url('users/profile') }}',this)" class="column align-center pc-pointer p-y-5px p-10px w-full {{ url()->current() == url('users/profile') ? 'bg-primary-dark' : '' }} g-2px">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>

</span>
            <small>Profile</small>
        </div>
    </footer>
  {{-- yield js --}}
    @yield('js')
    {{-- stack js --}}
    @stack('js')
    
</body>
</html>