
@extends('layout')

@section('content')

  @guest
    <nav class="navbar navbar-expand-lg navbar-light bg-light float-right">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ route('show.login') }}">Login</a>
            <a class="nav-item nav-link" href="{{ route('show.register') }}">Register</a>
          </div>
        </div>
      </nav>
  @endguest

  @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light float-right">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ route('products.import') }}">Import Products</a>
            <a class="nav-item nav-link" href="{{ route('logout') }}">Logout</a>
          </div>
        </div>
      </nav>
  @endauth

  <div class="jumbotron text-center">
    <h1>Homepage</h1>
    <br>
  </div>
    @if(count($products))
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-4" style="border: 1px solid black;">
                        <h3>{{ strtoupper(data_get($product, 'name')) }}</h3>
                        <p>Price : ${{ number_format(data_get($product, 'price'), 2) }}</p>
                        <p>SKU : {{ data_get($product, 'sku') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @else
    <div class="container mt-5 col-md-2">
        <div class="row">
        <h1 class="text-center">Products coming soon !</h1>
        <br>
        <img src="{{ asset('images/comingsoon.jpg') }}" height="200" width="400"/>
        </div>
    </div>
    @endif
  @endsection
