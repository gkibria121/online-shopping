<div id="app">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @guest

                <ul class="navbar-nav me-auto">
                    <li class="nav-item my-3">
                        <a href="/" class="nav-link">Shope</a>
                        {{-- <a href="/" class="nav-link"> Shope</a> --}}
                    </li>
                    <li class="nav-item">
                        <form action="/cart" method="POST" id="add-to-cart">
                            @csrf
                            <div id="dynamic-inputs">
                        </div>
                        <button class="nav-link text-light my-1 mx-2 btn-submit" ><img src={{asset("img/cart.png")}} alt="" srcset="" style="width: 40px" id="cart" ></button>
                       </form>
                    </li>
                    <li class="nav-item my-3">
                        <div id='count-cart' data-amount=0>0</div>
                    </li>
                </ul>
                @else
                @if(Auth::user()->role!='admin')
                <ul class="navbar-nav me-auto">
                    <li class="nav-item my-3">
                        <a href="/" class="nav-link">Shope</a>
                        {{-- <a href="/" class="nav-link"> Shope</a> --}}
                    </li>
                    <li class="nav-item">
                        <form action="/cart" method="POST" id="add-to-cart">
                            @csrf
                            <div id="dynamic-inputs">
                        </div>
                        <button class="nav-link text-light my-1 mx-2 btn-submit" ><img src={{asset("img/cart.png")}} alt="" srcset="" style="width: 40px" id="cart" ></button>
                       </form>
                    </li>
                    <li class="nav-item my-3">
                        <div id='count-cart' data-amount=0>0</div>
                    </li>
                </ul>
                @endif
                @if(Auth::user()->role=='admin')
                <ul class="navbar-nav me-auto">
                    <li class="nav-item my-3">
                        <a href="/orders" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item my-3">
                       <a href="/orders/history"  class="nav-link">History</a>
                    </li>
                    <li class="nav-item my-3">
                        <a href="/product" class="nav-link">Manage Products</a>
                    </li>
                </ul>
                @endif
                @endguest

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

    </nav>
</div>
<script>


</script>

