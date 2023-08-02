@extends('font.layout')
@section('content')
@foreach ($check as $check)
    @php
        $check = $check->user_id;
    @endphp
 @endforeach
    @if (Auth::user()->id == $check)

    {{-- <div class="alert alert-primary" role="alert">
      Tài khoản bạn chưa có giỏ hàng, Vui lòng thêm sản phẩm vào giỏ hàng
    </div> --}}
    @if (Auth::user()->role_id == 2)

    <div class="alert alert-primary text-center" role="alert">
      Bạn đang là ADMIN
    </div>
   @else
     

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <h3 class="text-center">{{ $message }}</h3>
                    </div>
                @endif
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Breadcrumb Section End -->
      
          <!-- Shopping Cart Section Begin -->
          <section class="shopping-cart spad">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="shopping__cart__table">
                    <table>
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Quantity</th>
                          <th>Total</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($cart as $cart)
                            {{-- @php $total += $cart['product_price'] * $cart['product_quantity'] @endphp --}}
                           
                        <tr>
                          <td class="product__cart__item" >
                            <div class="product__cart__item__pic">
                              <img src="{{asset('/storage/images/'.$cart->products->img)}}" alt=""  width="100" height="100"/>
                            </div>
                            <div class="product__cart__item__text">
                              <h6>{{$cart->products->name_product}}</h6>
                              <h5>$ {{$cart->product_price}}</h5>
                            </div>
                          </td>
                          <td class="quantity__item">
                            <div class="quantity">
                              <div class="pro-qty-2">
                                <input type="number" name="product_quantity" value="{{$cart->product_quantity}}" />
                              </div>
                            </div>
                          </td>
                          <td class="cart__price">$ {{$cart->product_price*$cart->product_quantity}}</td>
                          <td class="cart__close"><form action="{{route('cart.destroy',$cart->id)}}"method="POST">
                            @csrf
                              @method('DELETE')
                            <button><i class="fa fa-close"></button></i>
                          </form>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="continue__btn">
                        <a href="/shop">Continue Shopping</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="continue__btn update__btn">
                        <a href="{{ route('cart.edit',$cart->user_id)}}"><i class="fa fa-spinner"></i> Update cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                      <input type="text" placeholder="Coupon code" />
                      <button type="submit">Apply</button>
                    </form>
                  </div>
                  <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                      <li>Subtotal <span></span></li>
                      <li>Total <span>$ {{$totalPrice}}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @endif
    @endif
   
@endsection
