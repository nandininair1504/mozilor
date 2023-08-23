@extends('layout')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light float-right">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link"><b>Welcome {{ $user->name}},</b></a>
        <a class="nav-item nav-link" href="{{ route('home') }}">Home</a>
        <a class="nav-item nav-link" href="{{ route('logout') }}">Logout</a>
      </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>Import Products</h1>
  </div>

  <div class="container mt-3 col-md-4">
    <div class="alert alert-success text-center"  style="display:none">
        <strong>Import Successful ! </strong><a href="{{ route('home') }}">Please view in homepage</a>
    </div>
    <div class="alert alert-danger text-center" style="display:none"></div>
    <h2>Import CSV</h2>

    <form id="importForm" action="{{ route('api.products.import')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile" name="csv_file">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          @if ($errors->has('csv_file'))
            <span class="text-danger">{{ $errors->first('csv_file') }}</span>
          @endif
          <div class="d-grid mx-auto">
            <button id="submitBtn" type="submit" class="btn btn-dark btn-block">Import Products</button>
        </div>
    </form>
  </div>

  <!-- Image loader -->
<div id='loader' style='display: none;' class="text-center">
  <img src='{{ asset('images/loader.gif') }}'>
</div>
<!-- Image loader -->

  <script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  </script>
  <script type = "text/javascript" src="{{ asset('js/import.js') }}"></script>
@endsection
