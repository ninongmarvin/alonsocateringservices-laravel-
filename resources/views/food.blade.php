@extends('base')
@section('content')
@include('order')
  <div class="food-banner" style="background-image: url('images/foods.jpg')">
    <div class="food-containers">
      <h1>With our wide range of food selection, you will surely be able to find what your event needs!</h1>
      <p>Let your eyes feast now, and fill your bellies later.</p>
    </div>
  </div>
  <div class="food">
    <div class="food-selection">
      @foreach($foods as $food)
        <h1>{{$food->type}}
          <span class="add" onclick="modalAddSelection({{$food->id}})">+</span>
        </h1>
          <div class="food-container">
            @foreach($food->selection as $menu)
              <div class="food-cards">
                <img src="{{ url('images/'.$menu->image) }}" alt="{{$menu->image}}" style="height:175px;">
                <div class="food-desc">
                  <h4>{{$menu->name}}</h4>
                  <p>&#8369;{{$menu->price}}</p>
                  @if(Session::has('food_selection') && in_array($menu->id, $food_selection))
                    <p>In cart</p>
                  @else
                    <form class="" action="{{route('food-cart')}}" method="post">
                      @csrf
                      <input type="hidden" name="food_id" value="{{$menu->id}}">
                      <input type="submit" name="submit" value="Add to cart +" class="cart-btn">
                    </form>
                  @endif
                </div>
              </div>
            @endforeach
            <div class="more-food" onclick="moreFood()">
              <!-- hide-food  -->
              <div class="left-food"></div>
              <div class="food-arrow">
                <p>More</p>
                <p>Arrow</p>
              </div>
              <div class="right-food"></div>
            </div>
            <div class="hide-food" onClick="lessFood()">
              <div class="lessLeft-food"></div>
              <div class="lessFood-arrow">
                <p>Less</p>
                <p>Arrow</p>
              </div>
              <div class="lessRight-food"></div>
            </div>
          </div>
      @endforeach
    </div>
  </div>

  <!-- Modal -->
  <!-- Add Menu type and selection -->
  <div class="modal-container hide" id="container">
    <div class="modal-bg"></div>
    <div class="modal-form">
      <div class="close" onclick="closeSelection()">
        <h1>x</h1>
      </div>
      <form action="{{route('add-food')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="add-type">
          <h1>Add Menu Type</h1>
          <label for="">Menu Type</label>
          <input type="text" name="type" value="" placeholder="Menu type...">
        </div>
        <div class="add-selections" id="add-selections">
          <div class="menu-title">
            <h1>Add Menu Selection</h1>
            <h1 onclick="addMoreSelection()">+</h1>
          </div>
          <div class="selections" id="selections">
            <label for="">Selection Image</label>
            <label for="">Selection Name</label>
            <label for="">Selection Price</label>
            <input type="file" name="image[0]" class="image" id="image" value="">
            <input type="text" name="name[0]" class="name" id="name" value="">
            <input type="number" name="price[0]" class="price" id="price" value="">
          </div>
        </div>
        <button type="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>
  <!-- Add Menu type and selection -->

  <!-- Add Selection to an existing Menu -->
    @foreach($foods as $food)
      <div class="modal-container hide" id="modal-add-selection-{{$food->id}}">
        <div class="modal-bg"></div>
        <div class="modal-form">
          <div class="close" onclick="modalAddSelectionClose({{$food->id}})">
            <h1>x</h1>
          </div>
          <form action="{{route('add-selection')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="food_id" value="{{$food->id}}">
            <div class="add-selections" id="add-selections-{{$food->id}}">
              <div class="menu-title">
                <h1>Add Menu Selection For {{$food->type}}</h1>
                <h1 onclick="addMoreSelection2({{$food->id}})">+</h1>
              </div>
              <div class="selections-{{$food->id}} selections" id="selections-{{$food->id}}">
                <label for="">Selection Image</label>
                <label for="">Selection Name</label>
                <label for="">Selection Price</label>
                <input type="file" name="image[0]" class="image-{{$food->id}}" id="image-{{$food->id}}" value="">
                <input type="text" name="name[0]" class="name-{{$food->id}}" id="name-{{$food->id}}" value="">
                <input type="number" name="price[0]" class="price-{{$food->id}}" id="price-{{$food->id}}" value="">
              </div>
            </div>
            <button type="submit" name="submit">Submit</button>
          </form>
        </div>
      </div>
    @endforeach
  <!-- Add Selection to an existing Menu -->
@endsection
