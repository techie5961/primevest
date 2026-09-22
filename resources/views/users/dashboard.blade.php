@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
            .nav-links{
            user-select:none;
            -webkit-user-select:none;
            }
            .nav-links > div{
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
            width:100%;
            gap:5px;
            text-align: center;
            cursor: pointer;
            font-weight:600;
            }
            .nav-links .icon{
            width:50px;
            aspect-ratio:1;
            flex-shrink: 0;
            border-radius:50%;
            display:flex;
            align-items: center;
            justify-content: center;
            }
            .quick-actions{
            width:100%;
            padding:10px;
            border-radius:5px;
            display: flex;
            flex-direction: column;
            gap:10px;
            position: relative;
            overflow:hidden;


            }
            .quick-actions::after{
            content:'';
            position: absolute;
            bottom:0;
            right:0;
            width:50%;
            background:rgba(255,255,255,0.1);
            z-index:10;

            }
            .quick-actions > div{
            position: relative;
            z-index:100;

            }
            .package-card{
            width: 100%;
            border-radius:10px;
            overflow:hidden;
            background:var(--bg-light);
            padding:10px;


            }
            .package-card .img{
            /* max-height: 200px; */
            overflow:hidden;
            position: relative;
            border-radius:10px;
            height:100%;
            background-size:cover;
            background-position: center;
            padding-top:50%;
            }
            .package-card .img > div{
            position: relative;
            z-index:100;
            color:white;
            }
            .package-card .img::after{
            content:'';
            position: absolute;
            bottom:0;
            left:0;
            right:0;
            background:linear-gradient(to top,var(--bg-light) 0%,rgba(var(--bg-light-rgb),0.8) 65%,rgba(var(--bg-light-rgb),0.1) 100%);
            overflow:hidden;
            height:100%;
            z-index:10;
            width:100%;

            }
            .welcome-message{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,0.2);
            z-index:4000;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding:20px;
            display: flex;
            align-items:center;
            justify-content: center;
            flex-direction: column;
            display:none;
            }
            .welcome-message.active{
            display:flex;
            }

            .welcome-message  .child{
            width:100%;
            max-width:500px;
            background:var(--bg);
            padding:20px;
            border-radius:5px;
            max-height:70%;
            display:flex;
            flex-direction:column;
            gap:10px;
            }
            .welcome-message  .child.active{
            animation:bounceInDown 2s ease forwards;
            }
            .welcome-message  .child.inactive{
            animation:zoomInDown 2s ease reverse forwards;
            }



            body:has(.welcome-message.active){
            overflow: hidden;
            }

            div.banner{
            width:100%;
            position:relative;



            }
           .glitch-button,
           .glitch-button::after {
            padding: 16px 20px;
            font-size: 0.8rem;
            background: linear-gradient(45deg, transparent 5%, var(--secondary) 5%);
            border: 0;
            color: #fff;
            letter-spacing: 3px;
            line-height: 1;
            box-shadow: 6px 0px 0px var(--primary-light);
            outline: transparent;
            position: relative;
            width:100%;
            }

           .glitch-button::after {
            --slice-0: inset(50% 50% 50% 50%);
            --slice-1: inset(80% -6px 0 0);
            --slice-2: inset(50% -6px 30% 0);
            --slice-3: inset(10% -6px 85% 0);
            --slice-4: inset(40% -6px 43% 0);
            --slice-5: inset(80% -6px 5% 0);
            content: "HOVER ME";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 3%, var(--primary-light) 3%, var(--primary-light) 5%, var(--secondary) 5%);
            text-shadow: -3px -3px 0px var(--secondary), 3px 3px 0px var(--primary-light);
            clip-path: var(--slice-0);
            }

           .glitch-button:hover::after {
            animation: 1s glitch;
            animation-timing-function: steps(2, end);
            }

            @keyframes glitch {
            0% {
            clip-path: var(--slice-1);
            transform: translate(-20px, -10px);
            }

            10% {
            clip-path: var(--slice-3);
            transform: translate(10px, 10px);
            }

            20% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 10px);
            }

            30% {
            clip-path: var(--slice-3);
            transform: translate(0px, 5px);
            }

            40% {
            clip-path: var(--slice-2);
            transform: translate(-5px, 0px);
            }

            50% {
            clip-path: var(--slice-3);
            transform: translate(5px, 0px);
            }

            60% {
            clip-path: var(--slice-4);
            transform: translate(5px, 10px);
            }

            70% {
            clip-path: var(--slice-2);
            transform: translate(-10px, 10px);
            }

            80% {
            clip-path: var(--slice-5);
            transform: translate(20px, -10px);
            }

            90% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 0px);
            }

            100% {
            clip-path: var(--slice-1);
            transform: translate(0);
            }
            }


            /* media query for pc */
            @media(min-width:800px){
            img[alt=Banner]{
            max-height:150px;
            max-width:500px;
            margin:auto;
            }
            .quick-actions{
            max-width:70%;

            }
            }
           

            button.action-button {
  border-radius: .25rem;
  text-transform: uppercase;
  font-style: normal;
  font-weight: 400;
  padding-left: 20px;
  padding-right: 20px;
  -webkit-clip-path: polygon(0 0,0 0,100% 0,100% 0,100% calc(100% - 15px),calc(100% - 15px) 100%,15px 100%,0 100%);
  clip-path: polygon(0 0,0 0,100% 0,100% 0,100% calc(100% - 15px),calc(100% - 15px) 100%,15px 100%,0 100%);
  height: 40px;
  font-size: 0.7rem;
  line-height: 14px;
  transition: .2s .1s;
  background-image: linear-gradient(90deg,var(--primary-text),var(--primary-text));
  color:var(--primary);
  border: 0 solid;
  overflow: hidden;
  white-space: nowrap;
}

button.action-button:hover {
  cursor: pointer;
  transition: all .3s ease-in;
  padding-right:25px;
  padding-left: 25px;
}
          
    </style>
@endsection
@section('main')

    <section x-data="{ 
        Overlay : false,
        Package : {
            ID : '',
            Name : '',
        },
         Populate : false
     }" x-init="
    //  document.body.classList.add('overflow-hidden');
     $watch('Overlay', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden');
        }else{
            document.body.classList.remove('overflow-hidden');


        }
     });
     $watch('Populate', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden')
        }else{
            document.body.classList.remove('overflow-hidden')

        }
     })
     " class="w-full column">
     {{-- modal --}}
     <section x-show="Populate" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-on:click="
     Populate = false;
     " class="pos-fixed transition-all p-20px column align-center justify-center inset-0 bg-black-transparent z-index-3000 backdrop-blur-5px">
        <div x-on:click.stop="" style="max-width:500px;max-height:90%;" class="w-full overflow-hidden h-fit bg br-10px column align-center">
            {{-- head --}}
            <div class="p-20px w-full column g-10px align-center">
               <div x-on:click="Populate = false;" class="h-30px pc-pointer m-left-auto perfect-square circle bg-rgt-01 column align-center justify-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

               </div>
            <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-100px">
                <strong class="font-size-1 text-center font-weight-900">✨Welcome to {{ config('app.name') }} official platform✨</strong>

            </div>
            {{-- body --}}
            <div class="w-full overflow-auto border-top-width-1px border-top-style-solid border-top-color-rgt-01 border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 bg-rgt-003 p-20px column g-10px">
            {{-- new --}}
            <div class="font-weight-800">💵 Welcome Bonus: {{ $CurrencyHelper::format($finance_settings->welcome_bonus,'NGN',$display_currency) }}</div>
            <div class="font-weight-800">🎁 Daily Gift code: up to {{ $CurrencyHelper::format(1000,'NGN',$display_currency) }}</div>
            <div class="font-weight-800">🔥 Referral Bonus: up to {{ $CurrencyHelper::format(1000000,'NGN',$display_currency) }}</div>
            <div class="font-weight-800">🔥 Earn up to {{ number_format($referral_settings->level_1) }}% commission through referral program</div>
            <div class="font-weight-800">🔥 The more members in your team, the higher your earnings! the larger your team size, the greater the rewards!</div>
            </div>
            <div class="w-full pos-sticky bottom-0 column p-20px g-10px">
                <button x-on:click="window.open('{{ $social_settings->telegram_community }}')" class="btn-telegram p-10px br-10px">Join Telegram</button>
                <button x-on:click="window.open('{{ $social_settings->whatsapp_community }}')" class="btn-whatsapp p-10px br-10px">Join Whatsapp</button>
            </div>

        </div>
     </section>
     {{-- main section --}}
       <section x-ref="Group" class="w-full g-10px column transition-all group">
    
        <div x-data="{ 
            HideBalance : $persist(false).as('dashboard-balance')
          }" style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:var(--primary-text)" class="w-full p-bottom-2px g-10px br-10px column p-20px">
            {{-- new row --}}
            <div class="w-full row align-center g-10px space-between">
                <span class="opacity-08">AVAILABLE BALANCE</span>
                <span x-on:click="Vitecss.navigate('{{ url('users/transactions') }}')" class="font-size-07 pc-pointer row no-select align-center opacity-08">
                    Transaction Records
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>

                </span>
            </div>
            {{-- new row --}}
            <div class="w-full row align-center g-10px space-between">
              <div class="row align-center g-10px">
                   <strong x-show="!HideBalance" class="font-size-1-3 font-weight-900">
            {{ $total_balance }}
        </strong>
<strong x-show="HideBalance" class="font-size-1 font-weight-900">****</strong>
<i class="opacity-07 pc-pointer" x-on:click="HideBalance = !HideBalance">
<svg x-show="!HideBalance" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path></svg>
<svg x-show="HideBalance" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M9.34268 18.7819L7.41083 18.2642L8.1983 15.3254C7.00919 14.8874 5.91661 14.2498 4.96116 13.4534L2.80783 15.6067L1.39362 14.1925L3.54695 12.0392C2.35581 10.6103 1.52014 8.87466 1.17578 6.96818L3.14386 6.61035C3.90289 10.8126 7.57931 14.0001 12.0002 14.0001C16.4211 14.0001 20.0976 10.8126 20.8566 6.61035L22.8247 6.96818C22.4803 8.87466 21.6446 10.6103 20.4535 12.0392L22.6068 14.1925L21.1926 15.6067L19.0393 13.4534C18.0838 14.2498 16.9912 14.8874 15.8021 15.3254L16.5896 18.2642L14.6578 18.7819L13.87 15.8418C13.2623 15.9459 12.6376 16.0001 12.0002 16.0001C11.3629 16.0001 10.7381 15.9459 10.1305 15.8418L9.34268 18.7819Z"></path></svg>

            </i>
              </div>
              {{-- btn --}}
            <button x-on:click="Vitecss.navigate('{{ url('users/recharge') }}')" class="action-button">
                  RECHARGE
            </button>
            </div>
            {{-- new row --}}
            <div class="w-full p-20px column g-5px br-top-right-10px br-top-left-10px bg-white c-text">
                {{-- new row --}}
                 {{-- new row --}}
            <div class="row w-full align-center space-between g-10px">
                <span class="opacity-07 font-size-07 font-weight-800 uppercase text-shadow">Deposit</span>
<strong x-show="!HideBalance" class="font-weight-900">{{ $deposit_balance }}</strong>
<strong x-show="HideBalance" class="font-weight-900">****</strong>
            </div>
             {{-- new row --}}
            <div class="row w-full align-center space-between g-10px">
                <span class="opacity-07 font-size-07 font-weight-800 uppercase text-shadow">Withdrawal</span>
<strong x-show="!HideBalance" class="font-weight-900">{{ $main_balance }}</strong>
<strong x-show="HideBalance" class="font-weight-900">****</strong>
            </div>
            </div>
        </div>

        <div x-data="{ 
            Checking : false
         }" class="w-full br-10px bg-primary p-1px column">
            <div class="w-full p-5px p-x-10px primary-text row align-center no-select space-between">
                DAILY CHECK IN
            </div>
            <div class="w-full p-15px column g-5px bg-light br-top-right-15px br-top-left-15px br-bottom-left-10px br-bottom-right-10px">
                <small>Check-In daily, claim more rewards</small>
                <div class="w-full p-10px br-10px border-width-1px border-style-solid border-color-primary column g-10px">
                    <span class="uppercase no-select">{{ $checked_in ? 'CHECKED-IN TODAY' : 'CHECK-IN AVAILABLE' }}</span>
                    <div class="row w-full align-center space-between">
                        <div class="p-5px font-size-07rem br-5px uppercase p-x-10px bg-primary-01">
                           🎁Reward: &#8358;{{ number_format($finance_settings->daily_check_in) }}
                        </div>
                        
                       @if (!$checked_in)
                            <button x-on:click="
                        Checking = true;
                        $el.classList.add('disabled');
                        SendGetRequest('{{ url('users/get/daily/check/in') }}',null,function(response){
                            $el.classList.remove('disabled');
                            Checking = false;
                            let data=JSON.parse(response);
                            CreateNotify(data.status,data.message);
                            if(data.status == 'success'){
                                Vitecss.navigate('{{ url('users/dashboard') }}')
                            }
                        });
                        " class="br-1000px font-weight-900 uppercase font-size-07rem p-5px p-x-15px bg-primary primary-text no-select pointer">
                            <span x-show="!Checking">Check-In now</span>
                            <span x-show="Checking" class="row align-center g-5px">
                                <?xml version="1.0" encoding="utf-8"?><svg height="10" width="10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>
                                Checking-In
                            </span>
                        </button>
                       @endif
                    </div>
                </div>
            </div>
        </div>


        {{-- quick links --}}
        <div x-data="{  }" class="w-full bg-light p-15px br-10px row align-center g-10px">
          {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/recharge') }}')" class="column g-5px w-full align-center pc-pointer">
               <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.4105 9.86058C20.3559 9.8571 20.2964 9.85712 20.2348 9.85715L20.2194 9.85715H17.8015C15.8086 9.85715 14.1033 11.4382 14.1033 13.5C14.1033 15.5618 15.8086 17.1429 17.8015 17.1429H20.2194L20.2348 17.1429C20.2964 17.1429 20.3559 17.1429 20.4105 17.1394C21.22 17.0879 21.9359 16.4495 21.9961 15.5577C22.0001 15.4992 22 15.4362 22 15.3778L22 15.3619V11.6381L22 11.6222C22 11.5638 22.0001 11.5008 21.9961 11.4423C21.9359 10.5506 21.22 9.91209 20.4105 9.86058ZM17.5872 14.4714C18.1002 14.4714 18.5162 14.0365 18.5162 13.5C18.5162 12.9635 18.1002 12.5286 17.5872 12.5286C17.0741 12.5286 16.6581 12.9635 16.6581 13.5C16.6581 14.0365 17.0741 14.4714 17.5872 14.4714Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.2341 18.6C20.3778 18.5963 20.4866 18.7304 20.4476 18.8699C20.2541 19.562 19.947 20.1518 19.4542 20.6485C18.7329 21.3755 17.8183 21.6981 16.6882 21.8512C15.5902 22 14.1872 22 12.4158 22H10.3794C8.60803 22 7.20501 22 6.10697 21.8512C4.97692 21.6981 4.06227 21.3755 3.34096 20.6485C2.61964 19.9215 2.29953 18.9997 2.1476 17.8608C1.99997 16.7541 1.99999 15.3401 2 13.5548V13.4452C1.99998 11.6599 1.99997 10.2459 2.1476 9.13924C2.29953 8.00031 2.61964 7.07848 3.34096 6.35149C4.06227 5.62451 4.97692 5.30188 6.10697 5.14876C7.205 4.99997 8.60802 4.99999 10.3794 5L12.4158 5C14.1872 4.99998 15.5902 4.99997 16.6882 5.14876C17.8183 5.30188 18.7329 5.62451 19.4542 6.35149C19.947 6.84817 20.2541 7.43804 20.4476 8.13012C20.4866 8.26959 20.3778 8.40376 20.2341 8.4L17.8015 8.40001C15.0673 8.40001 12.6575 10.5769 12.6575 13.5C12.6575 16.4231 15.0673 18.6 17.8015 18.6L20.2341 18.6ZM5.61446 8.88572C5.21522 8.88572 4.89157 9.21191 4.89157 9.61429C4.89157 10.0167 5.21522 10.3429 5.61446 10.3429H9.46988C9.86912 10.3429 10.1928 10.0167 10.1928 9.61429C10.1928 9.21191 9.86912 8.88572 9.46988 8.88572H5.61446Z" fill="CurrentColor" "=""></path>
<path d="M7.77668 4.02439L9.73549 2.58126C10.7874 1.80625 12.2126 1.80625 13.2645 2.58126L15.2336 4.03197C14.4103 3.99995 13.4909 3.99998 12.4829 4H10.3123C9.39123 3.99998 8.5441 3.99996 7.77668 4.02439Z" fill="CurrentColor" "=""></path>
</svg>

</div>
            <span class="font-weight-700 font-size-07">Recharge</span>
          </div>
           {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" class="column g-5px w-full align-center pc-pointer">
             <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M14 4H10C6.22876 4 4.34315 4 3.17157 5.17157C2.32803 6.01511 2.09185 7.22882 2.02572 9.25H21.9743C21.9082 7.22882 21.672 6.01511 20.8284 5.17157C19.6569 4 17.7712 4 14 4Z" fill="CurrentColor" "=""></path>
<path d="M10 20H14C17.7712 20 19.6569 20 20.8284 18.8284C22 17.6569 22 15.7712 22 12C22 11.5581 22 11.142 21.9981 10.75H2.00189C2 11.142 2 11.5581 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H10C10.4142 15.25 10.75 15.5858 10.75 16C10.75 16.4142 10.4142 16.75 10 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.75 16C11.75 15.5858 12.0858 15.25 12.5 15.25H14C14.4142 15.25 14.75 15.5858 14.75 16C14.75 16.4142 14.4142 16.75 14 16.75H12.5C12.0858 16.75 11.75 16.4142 11.75 16Z" fill="CurrentColor"></path>
</svg>

            </div>
            <span class="font-weight-700 font-size-07">Withdraw</span>
          </div>
           {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/transactions') }}')" class="column g-5px w-full align-center pc-pointer">
             <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <polygon points="4.367 3.044 3.771 6.798 7.516 6.145 4.367 3.044" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor"></polygon>
    <polyline points="10 7 10 10 12 12" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
    <path d="m5,5.101c1.271-1.297,3.041-2.101,5-2.101,3.866,0,7,3.134,7,7s-3.134,7-7,7c-3.526,0-6.444-2.608-6.929-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
  </g>
</svg>
            </div>
            <span class="font-weight-700 font-size-07">Records</span>
          </div>
          {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/referrals') }}')" class="column g-5px w-full align-center pc-pointer">
             <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z" fill="CurrentColor" "=""></path>
<path d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z" fill="CurrentColor" "=""></path>
<path d="M7.12205 5C7.29951 5 7.47276 5.01741 7.64005 5.05056C7.23249 5.77446 7 6.61008 7 7.5C7 8.36825 7.22131 9.18482 7.61059 9.89636C7.45245 9.92583 7.28912 9.94126 7.12205 9.94126C5.70763 9.94126 4.56102 8.83512 4.56102 7.47063C4.56102 6.10614 5.70763 5 7.12205 5Z" fill="CurrentColor" "=""></path>
<path d="M5.44734 18.986C4.87942 18.3071 4.5 17.474 4.5 16.5C4.5 15.5558 4.85657 14.744 5.39578 14.0767C3.4911 14.2245 2 15.2662 2 16.5294C2 17.8044 3.5173 18.8538 5.44734 18.986Z" fill="CurrentColor" "=""></path>
<path d="M16.9999 7.5C16.9999 8.36825 16.7786 9.18482 16.3893 9.89636C16.5475 9.92583 16.7108 9.94126 16.8779 9.94126C18.2923 9.94126 19.4389 8.83512 19.4389 7.47063C19.4389 6.10614 18.2923 5 16.8779 5C16.7004 5 16.5272 5.01741 16.3599 5.05056C16.7674 5.77446 16.9999 6.61008 16.9999 7.5Z" fill="CurrentColor" "=""></path>
<path d="M18.5526 18.986C20.4826 18.8538 21.9999 17.8044 21.9999 16.5294C21.9999 15.2662 20.5088 14.2245 18.6041 14.0767C19.1433 14.744 19.4999 15.5558 19.4999 16.5C19.4999 17.474 19.1205 18.3071 18.5526 18.986Z" fill="CurrentColor" "=""></path>
</svg>


            </div>
            <span class="font-weight-700 font-size-07">Team</span>
          </div>
            
        </div>
      

        {{-- group --}}
        <section x-data="{ 
            Products : $persist('vip')
         }" class="w-full column g-10">
     
     
         
            <div class="column w-full no-select align-center w-full g-5px">
              <div class="row w-full align-center justify-center g-5px">
                <div class="column w-50 g-5px">
                    <div style="transform:rotate(180deg);clip-path:polygon(0 0,100% 50%,0 100%);border-radius:1000px;" class="w-full h-5px bg-primary"></div>
                    <div style="transform:rotate(180deg);clip-path:polygon(0 0,100% 50%,0 100%);border-radius:1000px;" class="w-semi-full m-left-auto h-5px bg-primary"></div>
                
                </div>
            <div style="width:100% !important;" class="p-5px row w-full align-center font-weight-900 br-1000px border-width-1px border-style-solid border-color-primary">
               <div x-bind:style="Products == 'vip' ? {
                'background' : 'var(--primary)',
                'color' : 'var(--primary-text)'
               } : {}" x-on:click="Products = 'vip'" class="w-full br-inherit p-10px h-full row align-center justify-center">
                VIP
               </div>
               <div  x-bind:style="Products == 'savings' ? {
                'background' : 'var(--primary)',
                'color' : 'var(--primary-text)'
               } : {}" x-on:click="Products = 'savings'" class="w-full br-inherit p-10px h-full row align-center justify-center">
                SAVINGS
               </div>
            </div>
             <div class="column w-50 g-5px">
                    <div style="clip-path:polygon(0 0,100% 50%,0 100%);border-radius:1000px;" class="w-full h-5px bg-primary"></div>
                    <div style="clip-path:polygon(0 0,100% 50%,0 100%);border-radius:1000px;" class="w-semi-full m-right-auto h-5px bg-primary"></div>
                
                </div>
              </div>
            <small>CHOOSE A PLAN THAT SUITES YOUR GOALS</small>
              
            </div>
        @if (!$packages->isEmpty())
            {{-- ========== VIP PRODUCTS ========== --}}
        <div x-show="Products == 'vip'" class="grid pc-grid-2 g-20 w-full">
         @foreach ($packages as $data)
          <div style="overflow-x: hidden" class="w-full p-1px bg-primary h-fit column box-shadow br-10px">
            {{-- new row --}}
            <div class="row w-full pos-relative primary-text align-center">
                <div style="border:3px solid gold;color:gold;height: 40px;box-shadow:-5px 5px 10px rgba(0,0,0,0.5)" class="perfect-square m-left-15px m-right-10px no-shrink p-3px h-full top-0 column align-center justify-center circle no-shrink">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 19H22.0049V21H2.00488V19ZM2.00488 5L7.00488 8L12.0049 2L17.0049 8L22.0049 5V17H2.00488V5Z"></path></svg>

                </div>
                <strong x-bind:style="{
                    'margin-left' : `${$el.closest('div').querySelector('.icon').offsetWidth + 10}px`
                }" class="font-weight-900 font-size-1rem uppercase">{{ $data->name }}</strong>
            </div>
            {{-- new row --}}
            <div class="bg-light br-top-right-15px br-top-left-15px br-bottom-right-10px br-bottom-left-10px p-15px ">
              
                {{-- new --}}
                <div class="column flex-auto overflow-hidden g-10px">
                    <div class="row align-center g-10 space-between w-full">
                    <strong class="font-weight-800 uppercase">Duration</strong>
                    <div class="p-5 p-x-10px bg-primary-light primary-text font-size-05 br-5 no-select font-weight-900">{{ number_format($data->validity) }} days</div>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full align-center g-10px space-between">
                        <span class="opacity-08">Investment</span>
                        <strong class="font-weight-900 w-fit text-overflow-ellipsis c-primary-darker font-size-1">{{ $CurrencyHelper::format($data->cost,'NGN',Auth::guard('users')->user()->display_currency,0) }}</strong>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full align-center g-10px space-between">
                        <span class="opacity-08">Daily Income</span>
                        <strong class="font-weight-900 w-fit text-overflow-ellipsis c-primary-darker font-size-1">{{ $CurrencyHelper::format($data->earning,'NGN',Auth::guard('users')->user()->display_currency,0) }}</strong>
                    </div>
                       {{-- new row --}}
                    <div class="row w-full align-center g-10px space-between">
                        <span class="opacity-08">Total Income</span>
                        <strong class="font-weight-900 w-fit text-overflow-ellipsis c-primary-darker font-size-1">{{ $CurrencyHelper::format($data->earning * $data->validity,'NGN',Auth::guard('users')->user()->display_currency,0) }}</strong>
                    </div>
                    <div style="border-color:var(--primary)" class="hr" vitecss-type="dashed"></div>
                    <small class="text-align-center c-primary font-weight-900">Daily Income drops everyday</small>
                   
                  
                    @if ($data->coming_soon == 'true')
                      <div class="w-full filter-grayscale-100 uppercase font-weight-900 br-10px h-40px  bg-primary primary-text row align-center justify-center no-select no-pointer">
                        Coming Soon
                    </div>  
                    @else
                        <div x-on:click="
                    Overlay = true;
                    Package.ID = '{{ $data->id }}';
                    Package.Name='{{ $data->name }}';
                    Package.Cost='{{ $CurrencyHelper::format($data->cost,'NGN',Auth::guard('users')->user()->display_currency) }}';
                    Package.DailyIncome='{{ $CurrencyHelper::format($data->earning,'NGN',Auth::guard('users')->user()->display_currency) }}';
                    Package.Cycle='{{ number_format($data->validity) }} Days';
                    Package.TotalIncome='{{ $CurrencyHelper::format($data->earning*$data->validity,'NGN',Auth::guard('users')->user()->display_currency) }}';
                    " style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-darker))" class="p-10 br-10px h-40px p-x-10px font-weight-900 uppercase secondary-text row align-center justify-center bg-primary no-select pointer">
                    Invest
                    </div>
                    @endif
                </div>
            </div>
           
          </div>
        @endforeach
       </div>


        @endif
         @if (!$savings->isEmpty())
            {{-- ========== SAVINGS PRODUCTS ========== --}}
        <div x-show="Products == 'savings'" class="grid pc-grid-2 g-20 w-full">
         @foreach ($savings as $data)
          <div style="overflow-x: hidden" class="w-full p-1px bg-primary h-fit column box-shadow br-10px">
            {{-- new row --}}
            <div class="row w-full pos-relative primary-text align-center">
                <div style="border:3px solid white;color:white;height: 40px;box-shadow:-5px 5px 10px rgba(0,0,0,0.5)" class="perfect-square m-left-15px m-right-10px no-shrink p-3px h-full top-0 column align-center justify-center circle no-shrink">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M17 22V18.5V19" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M7 10.01V10" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M17.5 2C19.9853 2 22 4.01472 22 6.5C22 8.98528 19.9853 11 17.5 11C15.0147 11 13 8.98528 13 6.5C13 4.01472 15.0147 2 17.5 2Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M5.55273 1.60498C7.21314 0.774893 9.68911 1.07989 10.8594 2.99951H10.8672C10.5391 3.61996 10.2942 4.29125 10.1504 4.99951H9.56055L9.31152 4.36475C8.94467 3.42919 7.93217 3.01882 7 3.20654V7.13916L6.37695 7.39209L3 8.76709V12.3804L5.44629 13.6021L5.8584 13.8081L5.9707 14.2544C6.38718 15.9225 7.80694 17.3672 9.28027 17.7974L10 18.0073V22.9995H8V19.4526C6.26744 18.6886 4.78366 17.0779 4.16211 15.1958L1.55371 13.894L1 13.6177V7.42139L1.62305 7.16846L5 5.79346V1.88135L5.55273 1.60498Z" fill="currentColor" data-stroke="none" stroke="none"></path> <path d="M17.5 6V7" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M22.9971 11.5996C22.9437 16.2481 19.1612 20 14.5 20H12V18H14.5C17.4805 18 19.9899 15.9933 20.7568 13.2578C21.6051 12.8482 22.3633 12.2825 22.9971 11.5996Z" fill="currentColor" data-stroke="none" stroke="none"></path></g>
</svg>
                </div>
                <strong x-bind:style="{
                    'margin-left' : `${$el.closest('div').querySelector('.icon').offsetWidth + 10}px`
                }" class="font-weight-900 font-size-1rem uppercase">{{ $data->name }}</strong>
            </div>
            {{-- new row --}}
            <div class="bg-light br-top-right-15px br-top-left-15px br-bottom-right-10px br-bottom-left-10px p-15px ">
              
                {{-- new --}}
                <div class="column flex-auto overflow-hidden g-10px">
                    <div class="row align-center g-10 space-between w-full">
                    <strong class="font-weight-800 uppercase">Duration</strong>
                    <div class="p-5 p-x-10px bg-primary-light primary-text font-size-05 br-5 no-select font-weight-900">{{ number_format($data->validity) }} days</div>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full align-center g-10px space-between">
                        <span class="opacity-08">Investment</span>
                        <strong class="font-weight-900 w-fit text-overflow-ellipsis c-primary-darker font-size-1">{{ $CurrencyHelper::format($data->cost,'NGN',Auth::guard('users')->user()->display_currency,0) }}</strong>
                    </div>
                    {{-- new row --}}
                     <div class="row w-full align-center g-10px space-between">
                        <span class="opacity-08">Return</span>
                        <strong class="font-weight-900 w-fit text-overflow-ellipsis c-primary-darker font-size-1">{{ $CurrencyHelper::format($data->earning * $data->validity,'NGN',Auth::guard('users')->user()->display_currency,0) }}</strong>
                    </div>
                    <div style="border-color:var(--primary)" class="hr" vitecss-type="dashed"></div>
                    <small class="text-align-center c-primary font-weight-900">Capital + Profit returned after {{ number_format($data->validity) }} days</small>
                   
                    @if ($data->coming_soon == 'true')
                      <div class="w-full filter-grayscale-100 uppercase font-weight-900 br-10px h-40px  bg-primary primary-text row align-center justify-center no-select no-pointer">
                        Coming Soon
                    </div>  
                    @else
                        <div x-on:click="
                    Overlay = true;
                    Package.ID = '{{ $data->id }}';
                    Package.Name='{{ $data->name }}';
                    " style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-darker))" class="p-10 br-10px h-40px p-x-10px font-weight-900 uppercase secondary-text row align-center justify-center bg-primary no-select pointer">
                    Invest
                    </div>
                    @endif
                </div>
            </div>
           
          </div>
        @endforeach
       </div>


        @endif

        </section>
       </section>
     
        
       
       {{-- support links --}}
       <div x-bind:style="{
        'bottom' : `${document.querySelector('footer').offsetHeight + 10}px`
       }" class="pos-fixed column g-10px align-center right-10px bottom-20px">
        <div x-on:click="window.open('{{ $social_settings->whatsapp_community }}')" style="background:#4caf50;color:white;" class="h-50px w-50px box-shadow circle column align-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M25.873,6.069c-2.619-2.623-6.103-4.067-9.814-4.069C8.411,2,2.186,8.224,2.184,15.874c-.001,2.446,.638,4.833,1.852,6.936l-1.969,7.19,7.355-1.929c2.026,1.106,4.308,1.688,6.63,1.689h.006c7.647,0,13.872-6.224,13.874-13.874,.001-3.708-1.44-7.193-4.06-9.815h0Zm-9.814,21.347h-.005c-2.069,0-4.099-.557-5.87-1.607l-.421-.25-4.365,1.145,1.165-4.256-.274-.436c-1.154-1.836-1.764-3.958-1.763-6.137,.003-6.358,5.176-11.531,11.537-11.531,3.08,.001,5.975,1.202,8.153,3.382,2.177,2.179,3.376,5.077,3.374,8.158-.003,6.359-5.176,11.532-11.532,11.532h0Zm6.325-8.636c-.347-.174-2.051-1.012-2.369-1.128-.318-.116-.549-.174-.78,.174-.231,.347-.895,1.128-1.098,1.359-.202,.232-.405,.26-.751,.086-.347-.174-1.464-.54-2.788-1.72-1.03-.919-1.726-2.054-1.929-2.402-.202-.347-.021-.535,.152-.707,.156-.156,.347-.405,.52-.607,.174-.202,.231-.347,.347-.578,.116-.232,.058-.434-.029-.607-.087-.174-.78-1.88-1.069-2.574-.281-.676-.567-.584-.78-.595-.202-.01-.433-.012-.665-.012s-.607,.086-.925,.434c-.318,.347-1.213,1.186-1.213,2.892s1.242,3.355,1.416,3.587c.174,.232,2.445,3.733,5.922,5.235,.827,.357,1.473,.571,1.977,.73,.83,.264,1.586,.227,2.183,.138,.666-.1,2.051-.839,2.34-1.649,.289-.81,.289-1.504,.202-1.649s-.318-.232-.665-.405h0Z" fill-rule="evenodd"></path>
  </g>
</svg>
        </div>
         <div x-on:click="window.open('{{ $social_settings->telegram_community }}')" class="h-50px bg-telegram c-white w-50px box-shadow circle column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17.0943 7.14643C17.6874 6.93123 17.9818 6.85378 18.1449 6.82608C18.1461 6.87823 18.1449 6.92051 18.1422 6.94825C17.9096 9.39217 16.8906 15.4048 16.3672 18.2026C16.2447 18.8578 16.1507 19.1697 15.5179 18.798C15.1014 18.5532 14.7245 18.2452 14.3207 17.9805C12.9961 17.1121 11.1 15.8189 11.2557 15.8967C9.95162 15.0373 10.4975 14.5111 11.2255 13.8093C11.3434 13.6957 11.466 13.5775 11.5863 13.4525C11.64 13.3967 11.9027 13.1524 12.2731 12.8081C13.4612 11.7035 15.7571 9.56903 15.8151 9.32202C15.8246 9.2815 15.8334 9.13045 15.7436 9.05068C15.6539 8.97092 15.5215 8.9982 15.4259 9.01989C15.2904 9.05064 13.1326 10.4769 8.95243 13.2986C8.33994 13.7192 7.78517 13.9242 7.28811 13.9134L7.29256 13.9156C6.63781 13.6847 5.9849 13.4859 5.32855 13.286C4.89736 13.1546 4.46469 13.0228 4.02904 12.8812C3.92249 12.8466 3.81853 12.8137 3.72083 12.783C8.24781 10.8109 11.263 9.51243 12.7739 8.884C14.9684 7.97124 16.2701 7.44551 17.0943 7.14643ZM19.5169 5.21806C19.2635 5.01244 18.985 4.91807 18.7915 4.87185C18.5917 4.82412 18.4018 4.80876 18.2578 4.8113C17.7814 4.81969 17.2697 4.95518 16.4121 5.26637C15.5373 5.58382 14.193 6.12763 12.0058 7.03736C10.4638 7.67874 7.39388 9.00115 2.80365 11.001C2.40046 11.1622 2.03086 11.3451 1.73884 11.5619C1.46919 11.7622 1.09173 12.1205 1.02268 12.6714C0.970519 13.0874 1.09182 13.4714 1.33782 13.7738C1.55198 14.037 1.82635 14.1969 2.03529 14.2981C2.34545 14.4483 2.76276 14.5791 3.12952 14.6941C3.70264 14.8737 4.27444 15.0572 4.84879 15.233C6.62691 15.7773 8.09066 16.2253 9.7012 17.2866C10.8825 18.0651 12.041 18.8775 13.2243 19.6531C13.6559 19.936 14.0593 20.2607 14.5049 20.5224C14.9916 20.8084 15.6104 21.0692 16.3636 20.9998C17.5019 20.8951 18.0941 19.8479 18.3331 18.5703C18.8552 15.7796 19.8909 9.68351 20.1332 7.13774C20.1648 6.80544 20.1278 6.433 20.097 6.25318C20.0653 6.068 19.9684 5.58448 19.5169 5.21806Z"></path></svg>          
        </div>
         <div x-on:click="window.open('{{ $social_settings->customer_support }}')" class="h-50px bg-blueviolet primary-text w-50px box-shadow circle column align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M13,13.25l-.342,1.447c-.208,.909-1.017,1.553-1.949,1.553h-1.959" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <path d="M3.75,7.353l-1.123,.567c-.813,.411-1.246,1.319-1.053,2.209l.335,1.545c.199,.92,1.013,1.576,1.955,1.576h1.137s-1.084-5-1.084-5c-.099-.403-.166-.817-.166-1.25,0-2.899,2.351-5.25,5.25-5.25s5.25,2.351,5.25,5.25c0,.433-.067,.847-.166,1.25l-1.084,5h1.137c.941,0,1.755-.656,1.955-1.576l.335-1.545c.193-.89-.24-1.799-1.053-2.209l-1.123-.567" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
  </g>
</svg>        </div>
       </div>

{{-- confirm --}}
<section x-data="{ 
    Submitting : false
 }" x-show="Overlay" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all column backdrop-blur-2px align-center justify-end inset-0 bg-black-transparent z-index-4000">
<div x-on:click.outside="Overlay = false;" x-show="!Submitting" class="w-full column g-10px bg-light">
    <div class="w-full p-15px column align-center g-10px">
        <span>Confirm to Invest in</span>
        <strong class="font-weight-900 font-size-1rem" x-text="Package.Name"></strong>
    </div>
    <div class="w-full row align-center">
        <div style="background:green;" class="p-15px p-x-30px ws-nowrap font-weight-900 row c-white align-center justify-center">
            Cancel
        </div>
         <div x-on:click="
    Submitting = true;
     $el.classList.add('disabled');
     SendPostRequest('{{ url('users/post/purchase/package/process') }}',{
        'id' : Package.ID,
        '_token' : '{{ @csrf_token() }}'
     },function(response,error){
        let data=JSON.parse(response);
        CreateNotify(data.status,data.message);
        Submitting = false;
        $el.classList.remove('disabled');
      if(data.status == 'success'){
        Overlay = false;
        Vitecss.navigate('{{ url('users/products/active') }}')
      }

     })
         " style="background:#4caf50;" class="p-15px p-x-30px ws-nowrap font-weight-900 c-white w-full row align-center justify-center">
            Confirm
        </div>
    </div>
</div>
<div x-show="Submitting" style="background:#4caf50;" class="w-full font-size-1rem g-10px font-weight-900 c-white p-15px p-x-30px row align-center justify-center">
<?xml version="1.0" encoding="utf-8"?><svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

    Investing
</div>
</section>


     
    </section>


@endsection
