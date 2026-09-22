@extends('layout.users.app')
@section('title')
    Salary
@endsection
@section('css')
    <style class="css">
        main{
            padding:0;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10px">
 <section class="column w-full g-10px">
          
            {{-- new --}}
          <section class="w-full pc-x-padding column g-10px p-20px">
           <div class="w-full column">
             <strong class="desc font-weight-900">Tasks</strong>
            <span class="opacity-07">Complete each task to earn rewards.</span>
           </div>
            @if (!$salary->isEmpty())
              <div style="grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr))" class="w-full grid g-10px place-center">
                 @foreach ($salary as $data)
                   <div x-data="{ 
                    Processing : false
                    }" class="pos-relative w-full p-1px bg-primary column br-10px">
                 
                 <div class="w-full primary-text p-5px p-x-15px row space-between align-center g-10px">
                    <span class="font-weight-900">Task {{ $loop->iteration }}</span>
                    @if ($data->earned == 1)
                    <div style="background: var(--primary-text)" class="p-5px font-size-07 p-x-10px br-5px bg-primary-text c-primary no-select no-pointer">
                        CLAIMED
                    </div>
                    @endif
                 </div>
                 <div class="column bg-light column g-10px p-15px w-full br-top-right-15px br-top-left-15px br-bottom-left-10px br-bottom-right-10px">
                      {{-- new row --}}
                    <div class="row align-center space-between g-10px">
                        <div class="column">
                            <strong class="font-weight-900 font-size-1rem">&#8358;{{ number_format($data->criteria) }}</strong>
                      <small class="opacity-07">Total level 1 deposit</small>
                        </div>
                        <div class="p-10px row align-center g-4px p-y-5px ws-nowrap br-5px bg-primary primary-text no-select no-pointer">

                       {{ number_format($data->reward) }}% salary</div>
                    </div>
                    {{-- new column --}}
                    <div class="column g-5px w-full">
                        {{-- new row --}}
                        <div class="opacity-07 space-between align-center row font-size-06">
                            <span>&#8358;{{ number_format(min($ref,$data->criteria)) }} / &#8358;{{ number_format($data->criteria) }}</span>
                            <span>{{ round((min($ref,$data->criteria) * 100)/$data->criteria) }}%</span>
                        </div>
                        {{-- new  --}}
                        <div class="w-full overflow-hidden h-5px br-1000px bg-rgt-01">
                            <div style="width:{{ round((min($ref,$data->criteria) * 100)/$data->criteria) }}%" class="h-full bg-primary br-1000"></div>
                        </div>
                    </div>
                     
                    @if (round((min($ref,$data->criteria) * 100)/$data->criteria) >= 100 && $data->earned == 0)
                        <button x-data="{  }" x-on:click="
                        Processing = true;
                        SendGetRequest('{{ url('users/get/claim/salary') }}',{
                            'id' : '{{ $data->id }}'
                        },function(response,error){
                            Processing = false;
                            if(error){
                                alert(error);
                            }
                            if(response){
                                let data=JSON.parse(response);
                                CreateNotify(data.status,data.message);
                                if(data.status == 'success'){
                                    Vitecss.navigate('{{ url()->current() }}');
                                }
                            }
                        })
                        " x-text="Processing ? 'Claiming...' : 'Claim Reward'" x-bind:class="Processing ? 'disabled' : ''" class="btn-primary w-full br-5px clip-5"></button>
                    @endif
                  </div>
                </div>
               @endforeach 
              </div>
            @endif
          </section>
        </section>
    </section>
@endsection