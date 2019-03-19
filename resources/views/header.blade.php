<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mr-auto">神奇購物網站</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ml-auto">
        <li class='mr-3'><a class="nav-item nav-link" href="{{route('index')}}"><i class="fas fa-home"></i> 回首頁<span class="sr-only">(current)</span></a></li>
          <li class='mr-3'><a class="nav-item nav-link" href="#"><i class="fas fa-shopping-cart"></i>
            購物車<span class="sr-only">(current)</span></a></li>
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
                @else
                    <a class="dropdown-item" href="{{route('user.login')}}">登入</a>
                @endif
                
                <a class="dropdown-item" href="#">註冊</a>
              </div>
          </li>
        </ul>
    </div>
</nav>