<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alonso's Catering Services</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  </head>
  <body>
    <div class="navbar">
        <div class="left">
          <a href="/">Home</a>
          <a href="/about">About Us</a>
          <a href="/contact">Contact Us</a>
        </div>
        <h2>Alonso's Catering Services</h2>
        <div class="right">
          <a href="{{route('food')}}">Food Selections</a>
          <a href="{{route('venue')}}">Venues</a>
          <a href="{{route('catering-services')}}">Catering Services</a>
        </div>
      </div>
    <div class="content">
      @yield('content')
    </div>
    <div class="footer">
      <div class="footer-container">
        <div>
          <h1>Alonso's Catering Services</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div>
          <h1>Contact Us</h1>
          <p>(+632) 1111 2222</p>
          <p>09096882409</p>
          <p>alonsocateringservices@gmail.com</p>
        </div>
        <div>
          <h1>We are here</h1>
          <p>Blk 27 lot 18 Guava St. Brgy. San Gabriel, Teacher's Village. GMA, Cavite</p>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
  </body>
</html>
