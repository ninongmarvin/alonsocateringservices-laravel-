@extends('base')
@section('content')
<div class="catering-banner" style="background-image: url('images/catering.jpg')">
  <div class="catering-container">
    <h1>From Birthday Parties to Christening and even all the way to Weddings! We Got you!</h1>
    <p>Whatever you're celebrating, it will surely be in our list.</p>
  </div>
</div>
@foreach($caterings as $cater)
  <div class="catering">
    <div class="images" style="background-image: url('images/{{$cater->image}}'">
      <div class="images-container">
        <h1>{{$cater->type}}
          <span class="add-service-type" onclick="openSelection4({{$cater->id}})">+</span>
        </h1>
        <div class="{{$cater->all_services->count() <= 4 ? 'services' : 'services2'}}">
          @foreach($cater->all_services as $service)
            <div class="service-cards">
              <h1>{{$service->service_type}}</h1>
              <p>Price: {{$service->price}}</p>
              <p>Capacity: {{$service->guests}}</p>
              <p>
                @if($service->set_up == 0)
                  Design&Setup Not Included
                @else
                  Design&Setup Included
                @endif
              </p>
              <p>Venue: {{$service->venue}}</p>
              <p>
                @if($service->planner == 0)
                  Planner Not Included
                @else
                  Planner Included
                @endif
              </p>
              @if(Session::has('event_service') && explode(',', Session::get('event_service'))[1] == $service->id)
                <p>In cart</p>
              @else
                <form class="" action="{{route('services-cart')}}" method="post">
                  @csrf
                  <input type="hidden" name="event_type_id" value="{{$cater->id}}">
                  <input type="hidden" name="service_type_id" value="{{$service->id}}">
                  <input style="color:#F1F2F2; border: none; background-color: transparent; transition: 0.4s; cursor: pointer;" type="submit" name="submit" value="Add to cart +">
                </form>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endforeach

<!-- Modal -->
<div class="modal-container hide" id="container">
  <div class="modal-bg"></div>
  <div class="modal-form">
    <div class="close" onclick="closeSelection()">
      <h1>x</h1>
    </div>
    <form action="{{route('add-services')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="add-type">
        <h1>Add More Events</h1>
        <label for="">Event</label>
        <input type="text" name="event_name" value="" placeholder="Event name...">
        <input type="file" name="image" value="">
      </div>
      <div class="add-selections" id="add-selections">
        <div class="menu-title">
          <h1>Add Services</h1>
          <h1 onclick="addMoreServices()">+</h1>
        </div>
        <div class="add-services" id="selections">
          <label for="">Service Type</label>
          <label for="">Price</label>
          <label for="">Capacity</label>
          <label for="">Set up</label>
          <label for="">Venue</label>
          <label for="">Planner</label>
          <input type="text" name="type[0]" class="type" id="type" value="">
          <input type="number" name="price[0]" class="price" id="price" value="">
          <input type="number" name="capacity[0]" class="capacity" id="capacity" value="">
          <select class="set_up" id="set_up" name="set_up[0]">
            <option value="1">Included</option>
            <option value="0">Not Included</option>
          </select>
          <input type="text" name="venue1[0]" class="venue1" id="venue1" value="">
          <select name="planner[0]" class="planner" id="planner">
            <option value="1">Included</option>
            <option value="0">Not Included</option>
          </select>
        </div>
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</div>

@foreach($caterings as $cater)
<div class="modal-container hide" id="modal-add-type-{{$cater->id}}">
  <div class="modal-bg"></div>
  <div class="modal-form">
    <div class="close" onclick="closeSelection4({{$cater->id}})">
      <h1>x</h1>
    </div>
    <form action="{{ route('add-types') }}" method="post">
      @csrf
      <input type="hidden" name="cater_id" value="{{$cater->id}}">
      <div class="add-types" id="add-types-{{$cater->id}}">
        <div class="menu-title">
          <h1>Add Service Type For {{$cater->type}}</h1>
          <h1 onclick="addMoreTypes2({{$cater->id}})">+</h1>
        </div>
        <div class="types-{{$cater->id}} type-add selections" id="selections-{{$cater->id}}">
          <label for="">Service Type</label>
          <label for="">Price</label>
          <label for="">Capacity</label>
          <label for="">Set up</label>
          <label for="">Venue</label>
          <label for="">Planner</label>
          <input type="text" name="type[0]" class="type" id="type-{{$cater->id}}" value="">
          <input type="number" name="price[0]" class="price" id="price-{{$cater->id}}" value="">
          <input type="number" name="capacity[0]" class="capacity" id="capacity-{{$cater->id}}" value="">
          <select class="set_up" id="set_up-{{$cater->id}}" name="set_up[0]">
            <option value="1">Included</option>
            <option value="0">Not Included</option>
          </select>
          <input type="text" name="venue1[0]" class="venue1" id="venue1-{{$cater->id}}" value="">
          <select name="planner[0]" class="planner" id="planner-{{$cater->id}}">
            <option value="1">Included</option>
            <option value="0">Not Included</option>
          </select>
        </div>
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</div>
@endforeach
@include('order')
@endsection
