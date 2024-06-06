<!--==============HEADER==================-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="{{ asset('css/default-font.css') }}">
<link rel="stylesheet" href="{{asset('frontend/css/home.css')}}">
<header class="header container-fluid">
    <ul class="nav navbar container">
        <li>
            <a href="{{route('home')}}" class="nav_brand">
                <h1 class = "display-5">Verbify</h1>
            </a>
        </li>

        <li class = "col-5 d-md-inline d-none search_box">
            <form action = "#" method="GET" class="py-1 px-3">
                <input name="search" id = "searchbox" placeholder="Snow White and the Seven Dwarfs..." maxlength="100">
                <button type="submit" class = "search-btn fs-5 pt-1">
                    <i class = "bx bx-search-alt"></i>
                </button>
            </form>
        </li>

        <li class="search_box_hide col-8 col-md-4 shadow">
            <form action = "#" method="post" class="py-1 px-3">
                <input name="search" class = "fs-7" placeholder="Search..." maxlength="100">
                <button type="submit" class = "search-btn fs-5">
                    <i class = "bx bx-search-alt"></i>
                </button>
            </form>
        </li>

        <li class="header_icons col-md-auto text-end gx-2">
            <div id="search-btn" class = "p-1 d-md-none d-inline">
                <i class = "bx bx-search-alt fs-4"></i>
            </div>
            <div id="cart-btn" class = "p-1">
                <i class = "bx bx-cart-alt fs-4"></i>
            </div>
            <div id="user-btn" class = "p-1">
                <a href="{{route('login')}}"><i class = "bx bx-user-circle fs-4 @if(Auth::check())text-primary @endif"></i></a>
            </div>
        </li>

        <li class="dropdown p-2 px-md-3 shadow" id="dropdown">
            <div class="cart-item p-1">
                <div class="cart_img col-3">
                    <a href="#"><img src ="https://i.pinimg.com/564x/90/d0/39/90d03955f644a8b67e52eaf9cf1f2891.jpg" class="img-fluid" alt="img"></a>
                </div>
                <span class="book_title col-5"><a href="#">Book's Name</a></span>
                <span class="book_price col-3">25.000đ</span>
                <button id = "delete-btn" class="xoa col-1">
                    <i class='bx bxs-trash-alt'></i>
                </button>
            </div>
            <div class="cart-item p-1">
                <div class="cart_img col-3">
                    <a href="#"><img src ="https://i.pinimg.com/564x/90/d0/39/90d03955f644a8b67e52eaf9cf1f2891.jpg" class="img-fluid" alt="img"></a>
                </div>
                <span class="book_title col-5"><a href="#">Book's Name Lorem ipsum dolor sit amet</a></span>
                <span class="book_price col-3">1.352.000đ</span>
                <button id = "delete-btn" class="xoa col-1">
                    <i class='bx bxs-trash-alt'></i>
                </button>
            </div>
            <div class="cart-item p-1">
                <div class="cart_img col-3">
                    <a href="#"><img src ="https://i.pinimg.com/564x/90/d0/39/90d03955f644a8b67e52eaf9cf1f2891.jpg" class="img-fluid" alt="img"></a>
                </div>
                <span class="book_title col-5"><a href="#">Book's Name Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, atque!</a></span>
                <span class="book_price col-3">114.000đ</span>
                <button id = "delete-btn" class="xoa col-1">
                    <i class='bx bxs-trash-alt'></i>
                </button>
            </div>

            <div class="summary mt-2">
                <p> 3 <span>total products</span></p>
                <button class="btn-order">Go to cart</button>
            </div>
        </li>

    </ul>
</header>
