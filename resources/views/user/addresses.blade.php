@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Addresses</h2>
      <div class="row">
        <div class="col-lg-3">
          <ul class="account-nav">
            <li><a href="my-account.html" class="menu-link menu-link_us-s menu-link_active">Dashboard</a></li>
            <li><a href="{{route('user.orders')}}" class="menu-link menu-link_us-s">Orders</a></li>
            <li><a href="{{route('user.addresses')}}" class="menu-link menu-link_us-s">Addresses</a></li>
            <li><a href="{{route('user.account.details')}}" class="menu-link menu-link_us-s">Account Details</a></li>
            <li><a href="{{route('user.wishlist')}}" class="menu-link menu-link_us-s">Wishlist</a></li>
            <li><a href="{{ route('logout') }}" class="menu-link menu-link_us-s">Logout</a></li>
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__address">
            <div class="row">
              <div class="col-6">
                <p class="notice">The following addresses will be used on the checkout page by default.</p>
              </div>
              <div class="col-6 text-right">
                <a href="#" class="btn btn-sm btn-info">Add New</a>
              </div>
            </div>
            <div class="wg-box mt-5">
            <h5>Shipping Address</h5>
            <div class="my-account__address-item col-md-6">
                <div class="my-account__address-item__detail">
                    <p>{{$address->name}} <i class="fa fa-check-circle text-success"></i></p>
                    <p>{{$address->address}}</p>
                    <p>Street : {{$address->locality}}</p>
                    <p>City : {{$address->city}}, {{$address->country}}</p>
                    <p>Landmark : {{$address->landmark}}</p>
                    <p>Zip : {{$address->zip}}</p>
                    <br>
                    <p>Mobile : {{$address->phone}}</p>
                </div>
            </div>
        </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection