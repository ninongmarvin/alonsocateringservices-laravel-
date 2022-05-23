<div class="order" id="order" onmouseenter="order()" onmouseleave="leaveOrder()">
  <h1>Package</h1>
  <div class="hide" id="contents">
    @if(Request::is('food'))
      <h1 class="menu" onclick="openSelection()">Add Menu</h1>
    @elseif(Request::is('venue'))
      <h1 class="menu" onclick="openSelection2()">Add Venue</h1>
    @elseif(Request::is('catering-services'))
      <h1 class="menu" onclick="openSelection()">Add Services</h1>
    @endif

    @if(Session::has('food_selection'))
      <h1 class="menu" style="margin-left: 1rem;" onclick="openCart()">Cart</h1>
    @endif
  </div>
</div>


<!-- Modals -->
<div class="cart-container hide" id="cart-container">
  <div class="cart-bg"></div>
  <div class="cart-form">
    <div class="close" onclick="closeCart()">
      <h1>x</h1>
    </div>

    @if(Session::has('food_selection'))
      <h1>Selected Foods</h1>
      <div class="{{count(explode(',', Session::get('food_selection')))-1 <= 4 ? 'selected-foods' : 'selected-foods2'}}">
        @foreach(explode(',', Session::get('food_selection')) as $selection)
          @foreach(App\Models\Menu::get_menus($selection) as $foods)
            <div class="s-f">
              <h3>{{$foods->name}}</h4>
              <p>Price: {{$foods->price}}</p>
            </div>
          @endforeach
        @endforeach
      </div>
    @endif

    @if(Session::has('venue') && App\Models\VenueDescription::get_ven_desc(1) != null)
      <h1>Selected Venue</h1>
      <div class="selected-venue">
        <h3>{{App\Models\VenueDescription::get_ven_desc(explode(',', Session::get('venue'))[2])->location}}, {{App\Models\City::get_city(explode(',', Session::get('venue'))[1])->city_name}}</h3>
        <p>Capacity: {{App\Models\VenueDescription::get_ven_desc(explode(',', Session::get('venue'))[2])->capacity}}</p>
        <p>Description: {{App\Models\VenueDescription::get_ven_desc(explode(',', Session::get('venue'))[2])->description}}</p>
      </div>
    @endif

    @if(Session::has('event_service') && App\Models\Catering::get_catering(1) != null)
      <h1>Selected Event/Service</h1>
      <div class="selected-event">
        <h3 class="event">{{App\Models\Catering::get_catering(explode(',', Session::get('event_service'))[0])->type}}</h3>
        <div class="selected-service">
          <h3>{{App\Models\AvailableService::get_service(explode(',', Session::get('event_service'))[1])->service_type}}</h3>
          <p>Price: {{App\Models\AvailableService::get_service(explode(',', Session::get('event_service'))[1])->price}}</p>
          <p>Capacity: {{App\Models\AvailableService::get_service(explode(',', Session::get('event_service'))[1])->guests}}</p>
          @if(App\Models\AvailableService::get_service(explode(',', Session::get('event_service'))[1])->set_up == 1)
            <p>Design&Setup: Included</p>
          @else
            <p>Design&Setup: Not included</p>
          @endif

          <p>Venue: {{App\Models\AvailableService::get_service(explode(',', Session::get('event_service'))[1])->venue}}</p>

          @if(App\Models\AvailableService::get_service(explode(',', Session::get('event_service'))[1])->planner == 1)
            <p>Planner: Included</p>
          @else
            <p>Planner: Not included</p>
          @endif
        </div>
      </div>
    @endif

    @if(Session::has('food_selection') && Session::has('venue') && Session::has('event_service'))
      <form action="{{route('turn-order')}}" method="post" class="turn-order">
        @csrf
        <input type="hidden" name="foods" value="{{Session::get('food_selection')}}">
        <input type="hidden" name="venue" value="{{Session::get('venue')}}">
        <input type="hidden" name="event_service" value="{{Session::get('event_service')}}">
        <input type="text" name="fullname" value="" placeholder="Full name here...">
        <input type="email" name="email" value="" placeholder="Email here...">
        <input type="number" name="number" value="" placeholder="Contact number here...">
        <input type="date" name="date" value="" placeholder="Date of Event here...">
        <input class="order-btn" type="submit" name="submit" value="Confirm">
      </form>
    @endif
  </div>
</div>
