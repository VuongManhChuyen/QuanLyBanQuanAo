<div id="preloder">
    <div class="loader"></div>
  </div>
  <!-- Header Section Begin -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-7">
            <div class="header__top__left">
              <p>Free shipping, 30-day return or refund guarantee.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="header__top__right">
              <div class="header__top__links">
                @if (!Auth::user())
                <a href="login">Sign in</a>
                <a href="register">Register</a>
                @else
              </div>
              <div class="header__top__hover">
                
                <span>{{Auth::user()->name}} <i class="arrow_carrot-down"></i></span>
                <ul>
                  <li><a href="logout">Logout</a></li>
                  @if (Auth::user()->role_id==2)
                  <li><a href="/adminn">ADMIN</a></li>
                  @endif
                  <li><a href="#">Profile</a></li>
                </ul>
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="header__logo">
            <a href="/"><img src="font/img/logo.png" alt="" style="height: 100px; width: 100px" /></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <nav class="header__menu mobile-menu">
            <ul>
              <li><a href="/">Home</a></li>
              <li><a href="/shop">Shop</a></li>
              <li>
                <a href="/cart">Shopping Cart</a>
              </li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
          </nav>
        </div>
       @if (Auth::user())
       <div class="col-lg-3 col-md-3">
        <div class="header__nav__option">
          <a href="#" class="search-switch"
            ><img src="font/img/icon/search.png" alt=""
          /></a>
          {{-- <a href="#"><img src="font/img/icon/heart.png" alt="" /></a> --}}
          <a href="/cart"
            ><img src="font/img/icon/cart.png" alt="" /> <span>{{$totalQuantity}}</span></a
          >
          <div class="price">${{$totalPrice}}</div>
        </div>
      </div>
       @else
       <div class="col-lg-3 col-md-3">
        <div class="header__nav__option">
          <a href="#" class="search-switch"
            ><img src="font/img/icon/search.png" alt=""
          /></a>
          {{-- <a href="#"><img src="font/img/icon/heart.png" alt="" /></a> --}}
          <a href="/cart"
            ><img src="font/img/icon/cart.png" alt="" /> <span></span></a
          >
          <div class="price"></div>
        </div>
      </div>
       @endif
        
      </div>
      <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
  </header>
  <!-- Header Section End -->