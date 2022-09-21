@extends('dashboard.layouts.app')
@section('main-content')
<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                 
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{auth()->user()->name}}
                        </h5>
                       
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Profile Information') }}</h6>

            </div>
            <div class="card-body pt-4 p-3">
                @if ($errors->any())
                <div class="alert alert-danger border-left-danger" role="alert">
                    <ul class="pl-4 my-2">
                        @foreach ($errors->all() as $error)
                        <li><span style="color:white;">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                   
                </div>
                @endif
                <form action="{{ route('update-profile') }}" method="POST" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input readonly value="{{auth()->user()->name}}" name="name" class="form-control" type="text" id="user-name">
                                </div>
                                @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                    <input readonly value="{{auth()->user()->email}}" name="email" class="form-control" type="email" id="user-email">
                                </div>
                                @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">{{ __('Phone') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input readonly value="{{auth()->user()->phone}}" name="phone" class="form-control" type="tel" id="phone">
                                </div>
                                @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">{{ __('Location') }}</label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input readonly value="{{auth()->user()->location}}" name="location" class="form-control" type="text" id="name">
                                </div>
                                @error('user.adress') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

                <form action="{{ route('passowrd-update') }}" method="POST" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Current Password') }}</label>
                                <div class="@error('user.current_password')border border-danger rounded-3 @enderror">
                                    <input required name="current_password" class="form-control" type="password" id="user-name">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('New Password') }}</label>
                                <div class="@error('user.new_password')border border-danger rounded-3 @enderror">
                                    <input required name="new_password" class="form-control" type="password" id="user-name">
                                </div>

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('New Password Confirmation') }}</label>
                                <div class="@error('user.password_confirmation')border border-danger rounded-3 @enderror">
                                    <input required name="password_confirmation" class="form-control" type="password" id="user-email">
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection