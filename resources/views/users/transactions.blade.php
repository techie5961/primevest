@extends('layout.users.app')
@section('title')
    Transaction History
@endsection

@section('main')
    <section class="w-full g-10px column">
     
        {{-- new section /body --}}
        <section class="section column g-10px w-full body">
        
            @if ($trx->isEmpty())
                @include('components.utilities',[
                    'empty' => true,
                    'text' => 'No Transaction Found'
                ])
            @else
                <div style="grid-template-columns: repeat(auto-fit,minmax(min(100%,400px),1fr))" class="w-full g-10 place-center grid">
                    @foreach ($trx as $data)
                        <div class="bg-primary p-1px w-full br-10px column">
                            <div class="w-full p-5px p-x-15px row align-center g-10px space-between primary-text">
                                <span class=" font-size-09">{{ $data->uniqid }}</span>
                                <span class="row align-center g-5px">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M12 2V6" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M12 2V6" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M12 2V6" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M12 2V6" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M19.5 4.5L21.5 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M19.5 4.5L21.5 6.5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M19.5 4.5L21.5 6.5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M19.5 4.5L21.5 6.5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 22C16.4183 22 20 18.4183 20 14C20 9.58172 16.4183 6 12 6C7.58172 6 4 9.58172 4 14C4 18.4183 7.58172 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M9 2H15" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 2H15" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 2H15" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 2H15" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 14L9.5 11.5" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 14L9.5 11.5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 14L9.5 11.5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 14L9.5 11.5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>

                                    {{ $data->frame }}
                                </span>
                            </div>
                          <div class="w-full p-15px column g-10px br-top-right-15px br-top-left-15px br-bottom-right-10px br-bottom-left-10px bg-light">
                            
                             {{-- new row --}}
                            <div style="border-bottom:1px solid var(--rgt-01);padding-bottom:10px;" class="row w-full g-10 align-center space-between">
                               {{-- new column --}}
                                <div class="row align-center g-5">

                                    <span class="font-weight-900 font-size-1 {{ $data->class == 'credit' ? 'c-green': 'c-red' }}">{{ $data->class == 'credit' ? '+' : '-' }}{{ $CurrencyHelper::format($data->amount,'NGN',$display_currency) }}</span>
                                </div>
                                 {{-- new column --}}
                                <div class="column g-5">
                                    <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : ($data->status == 'rejected' || $data->status == 'failed' ? 'red' : 'status-info')) }}">{{ $data->status }}</div>
                                </div>
                            </div>
                             {{-- new row --}}
                            <div class="row font-weight-700 w-full g-10 align-center space-between">
                               {{ $data->title }}
                            </div>
                          </div>
                        </div>
                    @endforeach
                </div>

                @if ($trx->lastPage() > 1)
                    @include('components.utilities',[
                        'data' => $trx,
                        'paginate' => true
                    ])
                @endif
            @endif
        </section>
    </section>
@endsection