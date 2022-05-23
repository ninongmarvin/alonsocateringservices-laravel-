<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
  </head>
  <body>
    <div class="admin-nav">
      <h3>Welcome back, Admin</h3>
      <div class="admin-links">
        <a href="{{route('food')}}">Food Selection</a>
        <a href="{{route('venue')}}">Venues</a>
        <a href="{{route('catering-services')}}">Catering Services</a>
      </div>
      <a href="#">Logout</a>
    </div>

    <div class="reports">
      <div class="tops">
        <div class="top-foods">
          <h1>Top 5 Food</h1>
          @foreach($foods as $food)
            <h3>{{$loop->iteration}}. {{App\Models\Menu::get_food($food)->name}}</h3>
          @endforeach
        </div>
        <div class="top-venues">
          <h1>Top 5 Venues</h1>
          @foreach($venues as $venue)
            <h3>{{$loop->iteration}}. {{App\Models\VenueDescription::get_venue($venue)->location}},
            {{App\Models\City::get_city(App\Models\VenueDescription::get_venue($venue)->city_id)->city_name}}
            </h3>
          @endforeach
        </div>
        <div class="top-services">
          <h1>Top 5 Services</h1>
          @foreach($services as $service)
            <h3>{{$loop->iteration}}. {{App\Models\Catering::get_type($service)->type}}</h3>
          @endforeach
        </div>
      </div>
      <div class="orders">
        <h1>Client Orders
          @if(Session::has('status'))
             - {{Session::get('status')}}
          @endif
        </h1>
        <div class="all-orders">
          <h2>Fullname</h2>
          <h2>Email</h2>
          <h2>Phone</h2>
          <h2>Event Date</h2>
          <h2>View</h2>
          @foreach($orders as $order)
            <p>{{$order->fullname}}</p>
            <p>{{$order->email}}</p>
            <p>{{$order->phone_number}}</p>
            <p>{{  date('j \\ F Y', strtotime($order->date)) }}</p>
            <p class="view-order" onclick="openCart2({{$order->id}})">View Order</p>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Modal -->

    @foreach($orders as $order)
    <div class="cart-container hide" id="cart-container-{{$order->id}}">
      <div class="cart-bg"></div>
      <div class="cart-form">
        <div class="close" onclick="closeCart2({{$order->id}})">
          <h1>x</h1>
        </div>

        <h1>Selected Foods</h1>
        <div class="{{count(explode(',', $order->foods))-1 <= 4 ? 'selected-foods' : 'selected-foods2'}}">
          @foreach(explode(',', $order->foods) as $selection)
            @foreach(App\Models\Menu::get_menus($selection) as $foods)
              <div class="s-f">
                <h3>{{$foods->name}}</h4>
                <p>Price: {{$foods->price}}</p>
              </div>
            @endforeach
          @endforeach
        </div>

        <h1>Selected Venue</h1>
        <div class="selected-venue">
          <h3>{{App\Models\VenueDescription::get_ven_desc(explode(',', $order->venue)[2])->location}}, {{App\Models\City::get_city(explode(',', $order->venue)[1])->city_name}}</h3>
          <p>Capacity: {{App\Models\VenueDescription::get_ven_desc(explode(',', $order->venue)[2])->capacity}}</p>
          <p>Description: {{App\Models\VenueDescription::get_ven_desc(explode(',', $order->venue)[2])->description}}</p>
        </div>

        <h1>Selected Event/Service</h1>
        <div class="selected-event">
          <h3 class="event">{{App\Models\Catering::get_catering(explode(',', $order->event_service)[0])->type}}</h3>
          <div class="selected-service">
            <h3>{{App\Models\AvailableService::get_service(explode(',', $order->event_service)[1])->service_type}}</h3>
            <p>Price: {{App\Models\AvailableService::get_service(explode(',', $order->event_service)[1])->price}}</p>
            <p>Capacity: {{App\Models\AvailableService::get_service(explode(',', $order->event_service)[1])->guests}}</p>
            @if(App\Models\AvailableService::get_service(explode(',', $order->event_service)[1])->set_up == 1)
              <p>Design&Setup: Included</p>
            @else
              <p>Design&Setup: Not included</p>
            @endif

            <p>Venue: {{App\Models\AvailableService::get_service(explode(',', $order->event_service)[1])->venue}}</p>

            @if(App\Models\AvailableService::get_service(explode(',', $order->event_service)[1])->planner == 1)
              <p>Planner: Included</p>
            @else
              <p>Planner: Not included</p>
            @endif
          </div>
        </div>

        <form action="{{route('approve')}}" method="post" class="turn-order">
          @csrf
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <input class="approve" type="submit" name="submit" value="Approve">
        </form>
      </div>
    </div>
    @endforeach
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
  </body>
</html>
