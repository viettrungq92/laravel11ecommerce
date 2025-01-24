@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Wishlist</h2>
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
          <div class="page-content my-account__wishlist">
            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">
                @foreach ($items as $item)
                    <div class="product-card-wrapper">
                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <div class="swiper-container background-img js-swiper-slider"
                                data-settings='{"resizeObserver": true}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                    <img loading="lazy" src="{{asset('uploads/products')}}/{{$item->model->image}}" width="330" height="400"
                                        alt="{{$item->name}}" class="pc__img">
                                    </div>
                                    <div class="swiper-slide">
                                    @foreach (explode(",",$item->model->images) as $gimg)
                                        <img loading="lazy" src="{{asset('uploads/products')}}/{{$gimg}}" width="330" height="400"
                                        alt="{{$item->name}}" class="pc__img">
                                    @endforeach
                                    
                                    </div>
                                </div>
                                <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_prev_sm" />
                                    </svg></span>
                                <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_next_sm" />
                                    </svg></span>
                                </div>
                                <button class="btn-remove-from-wishlist">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_close" />
                                </svg>
                                </button>
                            </div>

                            <div class="pc__info position-relative">
                                <p class="pc__category">{{$item->model->name}}</p>
                                <h6 class="pc__title">{{$item->name}}</h6>
                                <div class="product-card__price d-flex">
                                <span class="money price">
                                    ${{$item->price}}
                                <!-- @if($item->sale_price)
                                    <s>${{$item->regular_price}} </s> ${{$item->sale_price}}
                                @else
                                    ${{$item->regular_price}}
                                @endif -->
                                </span>
                                </div>

                                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                                title="Add To Wishlist">
                                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_heart" />
                                </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
              


            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection