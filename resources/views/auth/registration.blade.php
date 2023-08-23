@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:200px;">
     <div class="form-group col-md-4 col-md-offset-5 align-center ">
        <h3 class="card-header text-center">Register</h3>
        <br>
        <form action="{{ route('register')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Name" id="name" class="form-control" name="name" value="{{old('name')}}"
                    required autofocus>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="Email" id="email_address" class="form-control"
                    name="email" value="{{old('email')}}" required autofocus>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="password" placeholder="Password" id="password" class="form-control"
                    name="password" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="password" placeholder="Confirm Password" id="confirm_password" class="form-control"
                    name="confirm_password" required>
                @if ($errors->has('confirm_password'))
                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                @endif
            </div>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
            </div>
            <br>
            <div class="mx-auto">
                <a href="{{ route('home')}}" class="btn btn-block">Back to homepage</a>
            </div>
        </form>
     </div>
    </div>
   </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript" src="{{ URL::asset('js/register.js') }}"></script>
@endpush
