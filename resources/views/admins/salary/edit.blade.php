@extends('layout.admins.app')
@section('title')
    Add salary task
@endsection
@section('main')
    <section class="w-full column g-10px">
         <div class="column g-5px">
          <strong class="desc font-weight-900 c-primary">Edit Salary</strong>
        <small class="opacity-07">Edit salary task</small>
      </div>
        <form x-data="{ 
         }" x-on:submit="
        PostRequest(event,$el,function(response){
            let data= JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/salary/manage') }}';
            }
        })
        " action="{{ url('admins/post/edit/salary/task/process') }}" method="POST" class="w-full column bg-light box-shadow br-15px p-20px g-10px">
         {{-- csrf token --}}
         <input name="_token" type="hidden" value="{{ @csrf_token() }}" class="inp input required">
         <input name="id" type="hidden" value="{{ $salary->id }}" class="inp input required">
        
            {{-- new input --}}
            <div class="w-full column g-5px">
                <label>Total Level 1 Deposit</label>
                <small class="opacity-07">How much level 1 deposit required to claim this task</small>
                <div class="cont">
                    <input value="{{ $salary->criteria }}" name="criteria" type="number" inputmode="numeric" placeholder="Enter referral count" class="inp input required">
                </div>
            </div>
            
               {{-- new input --}}
            <div class="w-full column g-5px">
                <label>Reward(%)</label>
                <small class="opacity-07">How much reward the user easrns after completing the task</small>
                <div class="cont">
                    <input value="{{ $salary->reward }}" name="reward" type="number" inputmode="numeric" placeholder="Enter salary reward" class="inp input required">
                </div>
            </div>
           
           
            
            <button class="post">Save changes</button>
        </form>
    </section>
@endsection