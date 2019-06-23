<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mr-auto">神奇購物網站</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ml-auto">
        <li class='mr-3'><a class="nav-item nav-link" href="{{route('shop.index')}}"><i class="fas fa-home"></i> 回首頁<span class="sr-only">(current)</span></a></li>
        <li class='mr-3'><a class="nav-item nav-link" href="{{route('shop.cart')}}"><i class="fas fa-shopping-cart"></i>
            購物車<span class="sr-only">(current)</span>
            @if(Auth::check())
            <span class="badge badge-primary">
            @if($cart = Session::get('Cart'.Auth::user()->id))
                {{$cart->totalQuantity}}
            @else
                0
            @endif
            </span> 
            @endif
        </a>
        </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @if(Auth::check())
                    {{Auth::user()->email}}
                  @else
                    使用者
                  @endif
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @if (Auth::check())
                    <a class="dropdown-item" href="{{route('user.logout')}}">登出</a>
                    <a class="dropdown-item" href="{{route('shop.sale.upload')}}">物品上架</a>
                @else
                    <a class="dropdown-item" href="{{route('user.login')}}">登入</a>
                @endif
                
                <a class="dropdown-item" href="{{route('user.signup')}}">註冊</a>
              </div>
          </li>
        </ul>
    </div>
</nav>
