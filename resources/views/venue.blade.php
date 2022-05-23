@extends('base')
@section('content')
@include('order')
<div class="venue" style="background-image: url('images/venue.jpg')">
  <div class="venue-container">
    <h1>We have the best selection of Venues just for you!</h1>
    <p>All you have to do now is find one near you.</p>
  </div>
</div>
<div class="available-locations">
  <div class="all-locations">
    @foreach($venues as $venue)
      <h1>{{$venue->island}}
        <span class="add-more" onclick="openSelection2({{$venue->id}})">+</span>
      </h1>
      <div class="locations">
        <div class="all-cities">
          @foreach($venue->all_venues as $cities)
            <h3>Venue Locations in {{$cities->city_name}}</h3>
            <div class="cities">
              @foreach($cities->get_description as $desc)
                <div class="cities-card">
                  <img src="{{ url('images/'.$desc->image) }}" alt="venue-image"/>
                  <div class="cities-description">
                    <h5>Address: {{$desc->location}}</h5>
                    <h5>Capacity: {{$desc->capacity}}</h5>
                    @if(Session::has('venue') && explode(',', Session::get('venue'))[2] == $desc->id)
                      <h5>In Cart</h5>
                    @else
                      <form class="" action="{{route('venue-cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="island_id" value="{{$venue->id}}">
                        <input type="hidden" name="city_id" value="{{$cities->id}}">
                        <input type="hidden" name="description_id" value="{{$desc->id}}">
                        <input style="color:#F1F2F2; font-weight: 800; border: none; background-color: transparent; transition: 0.4s; cursor: pointer;" type="submit" name="submit" value="Add to cart +">
                      </form>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>
      <div class="arrow-container">
        <div class="more-cities">
          <div class="left-cities"></div>
          <div class="arrow-cities">
            <p>More</p>
            <p>Arrow</p>
          </div>
          <div class="right-cities"></div>
        </div>
      </div>
    @endforeach
  </div>
</div>


<!-- Modal -->

<!-- Add More Venues -->
@foreach($venues as $venue)
  <div class="modal-container hide" id="container-{{$venue->id}}">
    <div class="modal-bg"></div>
    <div class="modal-form">
      <div class="close" onclick="closeSelection2({{$venue->id}})">
        <h1>x</h1>
      </div>
      <form action="{{route('add-cities')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="add-type">
          <h1>Add More Cities to {{$venue->island}}</h1>
          <label for="">Cities</label>
          <input type="text" name="cities" value="" placeholder="Cities...">
          <input type="hidden" name="island_id" value="{{$venue->id}}">
        </div>
        <div class="add-selections" id="add-selections-{{$venue->id}}">
          <div class="menu-title">
            <h1>Add City Venues</h1>
            <h1 onclick="addMoreCities({{$venue->id}})">+</h1>
          </div>
          <div class="selections-{{$venue->id}} selections2" id="selections-{{$venue->id}}">
            <label for="">Location</label>
            <label for="">Image</label>
            <label for="">Capacity</label>
            <label for="">Description</label>
            <input type="text" name="location[0]" class="location-{{$venue->id}}" id="location-{{$venue->id}}" value="">
            <input type="file" name="image[0]" class="image-{{$venue->id}}" id="image-{{$venue->id}}" value="">
            <input type="number" name="capacity[0]" class="capacity-{{$venue->id}}" id="capacity-{{$venue->id}}" value="">
            <input type="text" name="description[0]" class="description-{{$venue->id}}" id="description-{{$venue->id}}" value="">
          </div>
        </div>
        <button type="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>
@endforeach
<!-- Add More Venues -->
@endsection
