<html>
    <head>
        <title>{{ @config('app.name') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/sticky-footer-navbar.css') }}"/>
        @yield('head')
    </head>
    <body>
        @section('sidebar')
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="{{route('product.home')}}">laravelShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.home')}}">Home</a>
                </li>
                <?php /*
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li> */ ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart.checkout')}}">
                        <i class="fa" style="font-size:24px">&#xf07a;</i>
                        <span class='badge badge-warning' id='lblCartCount'>
                        @php $count =0; @endphp
                        @if(session()->has('cart'))
                            @foreach(session()->get('cart') as $cart)
                            @php
                                 $count +=  $cart['quantity'];
                            @endphp
                            @endforeach
                        @endif
                        {{$count}}
                         </span>
                    </a>
                </li>    
                </ul>
            </div>  
            </nav>
        @show

        <div class="container">
        @if(session()->has('success'))
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                <div class="toast-header bg-dark text-white">
                <strong class="mr-auto">Success</strong>
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="toast-body">
                {{session()->get('success')}}
                </div>
            </div>
        </div>
        @endif
            @yield('content')
        </div>
        <footer class="footer bg-dark">
            <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>
        @yield('scripts')
    </body>
</html>