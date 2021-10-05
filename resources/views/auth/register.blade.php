@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Anasayfa</a></li>
                    <li class="active">Kayıt Ol</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="register">
        <form class="container">
            <div class="register-top heading">
                <h2>Kayıt Ol</h2>
                <form method="POST" action="{{ route('register') }}">
                @csrf

            </div>
            <div class="register-main">
                <div class="col-md-6 account-left">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Adınız" type="text" tabindex="1" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Email address"  type="email" tabindex="3" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                </div>
                <div class="col-md-6 account-left">
                    <input id="Password" placeholder="Password" class="form-control" type="password" tabindex="4" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="address submit">
                <input type="submit" value="Submit">
            </div>
        </form>
        </div>
    </div>






@endsection
