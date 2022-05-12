@extends('layouts.layout')
@section('content')
<h2>Auction</h2>


   
                
<!-- new  -->
<style>
    .maindiv{
        display:flex;
        margin: 23px;
    }
    .left{
        flex: .4;
    }
    .right{
        flex:.6;
        padding: 24px;
    }
    .maincontent{
        font-weight: bolder;
font-size: 22px;
    }
    #addtocart{
        color:white;
        background-color: green;
        margin-top: 9px;
    }
</style>
<!-- <h2>product</h2> -->
<div class="maindiv">
    <div class="left">
    <img src="{{
           asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }}" style="  margin-left: 144px;" height="250px">
    </div>
    <div class="right">
    <span class="maincontent"> {{ $auction->name }}</span> <br>


{{
    $auction->item->name
        }} <br>
        {{
    $auction->item->description
}}<br>

        
            {{
                $auction->starting_amount
            }}<br>
        
            {{
                $auction->item->quantity
            }}<br>
        
            {{
                $auction->user->name

            }}<br>
        @if($auction->started_at)
            {{
                $auction->started_at->diffForHumans()
            }} <br>
            @endif
            @if(  $auction->ending_at > \Carbon\Carbon::now())
            @if($auction->ending_at )
            {{
                $auction->ending_at->diffForHumans()
            }} 
            <br>
            @endif
            @if($auction->duration )
            {{
                $auction->duration
            }}
             <br>
            @endif
            @else <p>Ended  </p> 
            @endif
            <br>
                   {{
                $auction->status
            }}<br>
    </div>
</div>

@endsection