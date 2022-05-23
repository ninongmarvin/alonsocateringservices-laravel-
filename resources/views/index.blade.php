@extends('base')
@section('content')
  <div class="home" style="background-image: url('images/banner.jpg')">
      <div class="divide">
        <div class="left-divide">
          <h1>A catering service that will surely meet your needs!</h1>
        </div>
        <div class="right-divide" onmouseenter="homeRightHover()" onmouseleave="homeRightHoverLeave()">
          <h1>Wanna know why?</h1>
          <a href="/ses">remove</a>
          <div class="hide" id="reasons">
            <p>'Cause our range of food selection is so immense you wouldn't believe it!
              <a href="/food" class="btn">Click Here!</a>
            </p>
            <p>We have the best Venues available all throughout the Philippines! We are sure there is one near You!
              <a href="/venues" class="btn">Click Here!</a>
            </p>
            <p>We can cater everything from Birthday Parties to Christening and all the way to Weddings!
              <a href="/catering" class="btn">Click Here!</a>
            </p>
          </div>
        </div>
      </div>
    </div>
@endsection
