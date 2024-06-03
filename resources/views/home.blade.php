<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!--=============== BOOTSTRAP ===============-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <!--=============== BOXICONS ===============-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
         
  <!--=============== CSS ===============--> 
  <link rel="stylesheet" href="public/frontend/css/home.css">

</head>
<body>
  <!--==============HEADER==================-->
  <header class="header container-fluid">
    <ul class="nav navbar container">
      <li>
        <a href="#" class="nav_brand">
          <h1 class = "display-5">Verbify</h1>
        </a>
      </li>
      
      <li class = "col-5 d-md-inline d-none search_box">
        <form action = "#" method="GET" class="py-1 px-3 mb-1">
          <input name="search" id = "searchbox" placeholder="Snow White and the Seven Dwarfs..." maxlength="100">
          <button type="submit" class = "search-btn fs-5">
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
          <a href="#"><i class = "bx bx-user-circle fs-4"></i></a>
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
          <button class="btn-order" onclick="placeOrder()">Go to cart</button>
        </div>
      </li>

    </ul>
  </header>

  <!--==============MAIN==================-->
  <main class="main pt-5">  
    <!--==============INTRO==================-->
    <section class="intro py-5">
        <div class="container">
          <div class="row g-5">
            <div class="intro_text col-md-6 col-12">
              <h1 class = "intro_title display-3 mb-3">The Wonderful Things You Will Be </h1>
              <p class = "intro_subtitle h5 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ab ut delectus veritatis nemo assumenda.</p>
              <button class="more-btn">Explore more</button>
            </div>
            <div class="intro_img col-md-6 col-12">
              <img src="public/frontend/images/intro.png" alt="img">
            </div>
          </div>
        </div>
    </section>
    
    <!--==============HIGHLIGHT==================-->
    <section class="highlight container py-5">
      <div class="row">
        <div class="bestseller col-sm-6 mb-4 mb-sm-0">
          <div class="card">
            <img  class="card-img" src="public/frontend/images/highlight1.jpg" alt="">
            <a href="#" class="content card-img-overlay">
              <h4 class="card-title m-1">Best Seller Books</h4>
              <p class="card-text">Of the month</p>
            </a>
          </div>
        </div>

        <div class="feature col-sm-6 mb-4 mb-sm-0">
          <div class="card">
            <img class="card-img" src="public/frontend/images/highlight2.jpg" alt="">
            <a href="#" class="content card-img-overlay">
              <h4 class="card-title m-1">Feature Book</h4>
              <p class="card-text">Of the month</p>
            </a>
          </div>
        </div>
      </div>
    </section> 
  
    <!--==============GENRESLIST==================-->
    <section class="genreslist">
      <div class="container p-2 p-md-5">
        <div class="section_title mb-3">
          <h3>Genres</h3>
        </div>
        <div class="row row-cols-3 row-cols-md-6 g-2 g-md-4">
          @foreach ($genres as $key => $genre)
            <div class="col">
                <div class="genres card-item">
                    <div class="genres_img ratio-3x4 .img-fluid mb-2">
                        <a href="#"><img src="public/frontend/images/genres_{{ $key }}.jpg" alt="img"></a>
                    </div>
                    <a href="#">
                        <p class="genres_name fs-5 mt-3">{{$genre->GENRES_NAME}}</p>
                    </a>
                </div>
            </div>
          @endforeach
        </div>
    </section>
  
    <!--==============PRODUCT COLLECTION==================-->
    <section class="products">
      <div class="container p-3 p-md-5">
        <div class="tab-wrap px-5">
          <div class="products-title-cover">

            <h2 class="section_title">The Collections</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ex inventore repudiandae quam velit nam excepturi adipisci ratione obcaecati perferendis!</p>
           
            <ul class="tab-nav product-tabs row row-cols-3 row-cols-md-6 g-2 g-md-5">
              @foreach ($genres as $key => $genre)
                <li class="item col filter-genres" rel="tab{{ $key }}">
                  <span>{{$genre->GENRES_NAME}}</span></li>
              @endforeach
            </ul>
          </div>
                   
          <div class="tabs-content">
            @foreach($books as $key => $genreBooks)
              <div class="tab tab{{ $key }}">
                  <div class="row product-cover gx-md-4" id = "tabs-content-show">
                      @if($genreBooks->isEmpty())
                          <p>No books available for this genre.</p>
                      @else
                        @foreach($genreBooks as $book)
                          <div class="col-sm-6 col-lg-3">
                              <div class="book_item">
                                  <a href="#" class="book_img"><img src="{{$book->IMAGE_LINK}}" alt="img"></a>
                                  <div class="book_info px-4 py-2">
                                    <span class="book_title fs-5"><a href="#">{{$book->NAME}}</a></span>
                                    <span class="book_author fs-5">{{ $book->AUTHOR }}</span>
                                    <span class="book_price fs-5">${{$book->PRICE}}</span>
                                  </div>
                              </div>
                          </div>
                        @endforeach
                      @endif
                  </div>
              </div> 
            @endforeach 
          </div>
        </div>
        <a href="#" class = "view-btn fs-6">View more</i></a>
      </div>
    </section>
  
    <!--==============SALE==================-->
    <section class="sale">
      <div class="container">
        <div class="sale-row row row-cols-1 row-cols-md-3">
          <div class="hotsale col">
            <div class="list_title">
                <a href="#"><h3>HOT SALE</h3></a>
              </div>
              <div class="list row row-cols-1 g-3">
                @foreach ($booksHotSale as $book)
                  <div class="list-item">
                    <div class="list_img col-3">
                      <a href="#"><img src ="{{$book->IMAGE_LINK}}" class="img-fluid" alt="img"></a>
                    </div>
                    <div class="list_content">
                      <span class="book_title fs-5"><a href="#">{{$book->NAME}}</a></span>
                      <span class="book_author fs-5">{{ $book->AUTHOR }}</span>  
                      <span class="book_price fs-5">${{$book->PRICE}}</span>  
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          <div class="lastest col">
            <div class="list_title">
              <a href="#"><h3>LASTEST</h3></a>
            </div>
            <div class="list row row-cols-1 g-3">
              @foreach ($booksLastest as $book)
                <div class="list-item">
                  <div class="list_img col-3">
                    <a href="#"><img src ="{{$book->IMAGE_LINK}}" class="img-fluid" alt="img"></a>
                  </div>
                  <div class="list_content">
                    <span class="book_title fs-5"><a href="#">{{$book->NAME}}</a></span>
                    <span class="book_author fs-5">{{ $book->AUTHOR }}</span>  
                    <span class="book_price fs-5">${{$book->PRICE}}</span>  
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="banner col-5 col-md-3">
            <img src="public/frontend/images/bookmark.jpg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </main>

  <!--==============FOOTER==================-->
  <footer class="footer container-fluid text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="outro col-lg-6 col-md-12 mb-4 mb-md-0">
          <a href="#" class = "footer_brand h1">Verbify</a>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae.
          </p>
          <div class="icons footer_icons text-center fs-3">
            <a href="#" class="btn-facebook mx-1">
              <i class='bx bxl-facebook-circle'></i>
            </a>
            <a href="#" class="btn-github mx-1">
              <i class='bx bxl-github'></i>
            </a>
            <a href="#" class="btn-figma mx-1">
              <i class='bx bxl-figma'></i>
            </a>
          </div>
        </div>
        <!--Grid column-->
  
        <!--Grid column-->
        <div class="contact col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Our Contact</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+C%C3%B4ng+ngh%E1%BB%87+Th%C3%B4ng+tin+-+%C4%90HQG+TP.HCM/@10.8702229,106.8000212,17z/data=!4m10!1m2!2m1!1suit!3m6!1s0x317527587e9ad5bf:0xafa66f9c8be3c91!8m2!3d10.8700089!4d106.8030541!15sCgN1aXSSAQp1bml2ZXJzaXR54AEA!16s%2Fm%2F02qqlmm?hl=vi-VN&entry=ttu">
                <i class='bx bxs-home'></i>
                University of Information Technology
              </a>
            </li>
            <li>
              <a href="#!">
                <i class='bx bxs-phone'></i>
                (+84) 8484 14 64646
              </a>
            </li>
            <li>
              <a href="#!">
                <i class='bx bxl-gmail'></i>
                verbify@gmail.com
              </a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
  
        <!--Grid column-->
        <div class="links col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Links</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#">About us</a>
            </li>
            <li>
              <a href="#">Shop</a>
            </li>
            <li>
              <a href="#">Contact</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class=" copyright p-2">
      © All Rights Reserved - 2024 - Group 10
    </div>
    <!-- Copyright -->
  </footer>

  <!--=============== SCROLL UP ===============-->
  <a href="#" class="scrollup shadow" id="scroll-up">
    <i class='bx bx-up-arrow-alt scrollup__icon'></i>
  </a>

  <!--============== JQUERY ===============-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="public/frontend/js/home.js"></script>
  
  <!--=============== BOOSTRAP ===============--> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>