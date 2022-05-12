

<!-- new temp  -->
@extends('layouts.layout')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="container">
<center style="padding: 18px 0px 0px 0px;">
<br> 
  <h2> Auctions</h2>
  <br>
</center>
@if ($auctions->count())
@foreach($auctions as $auction)
    <div class="row" >
<!-- new template  -->

  <div class="col-sm-3" style="padding: 18px 30px 11px 45px;">
  <a href="/auctions/{{ $auction->id }}">

  <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="{{asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} "style="width:275;height:185px;">
  <div class="card-body" style="padding:.8rem">
    <p class="card-text">
    <div class="product-shop">
<span class="product-name" itemprop="name">{{  $auction->item->name }}</span>
<div class="price-box">
<p class="old-price">
<span class="price">
<span><span class="price">₹ {{ $auction->starting_amount}}</span></span>
<span class="strike-through"> {{$auction->item->quantity}} KG</span>
</span>

</p>
</a>

</div>
<div class="media-item"> {{  $auction->item->description}}</div>
 Farmer:   {{
                $auction->user->name

            }}<br>
        @if($auction->started_at)
            {{
                $auction->started_at->diffForHumans()
            }} <br>
            @endif
            @if($auction->ending_at)
            {{
                $auction->ending_at->diffForHumans()
            }} <br>
            @endif
            @if($auction->duration)
            {{
                $auction->duration
            }} <br>
            @endif
</div>
    </p>
  </div>
</div>
</div>
    @endforeach
</div>

@else
    <p>No auctions yet. Please check back later.</p>
@endif
<!-- <div class="related-listing">
        
                <ul>
            
                
                    <li class="related-item media-item" style="display: list-item;">
                       Samsung Galaxy Grand 2 G7102 comes with Android v4.3 Jelly Bean OS.
                    </li>
                
            
                
                    <li class="related-item media-item" style="display: list-item;">
                        It has a 1.2 GHz Quad Core Processor and 1.5 GB RAM.
                    </li>
                
            
                
                    <li class="related-item media-item" style="display: list-item;">
                         Samsung Galaxy Grand 2 G7102 has 5.25 Inches Screen with HD Display  Samsung Galaxy Grand 2 
                    </li>
                
                    <li class="related-item media-item" style="display: list-item;">
It has a 8 MP Rear Camera and 1.9 MP Front Camera.
                    </li>
                    <li class="related-item media-item" style="display: list-item;">
Samsung Galaxy Grand 2 G7102 has 3G Connectivity.
                    </li>
            
                </ul>
      </div> -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
      <script>
          
         $( document ).ready(function() {
             $content=$(".media-item").val();
             $subset=$('.media-item').slice(0, 3);
             $(".media-item").val($subset);
         })

      </script>
@endsection