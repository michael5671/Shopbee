<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--=============== BOOTSTRAP ===============-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--=============== BOXICONS ===============-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="{{asset('frontend/css/product_detail.css')}}">
  <title>Document</title>
</head>
<body>
<!--==============HEADER==================-->
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
                <a href="{{route('cart.index')}}">  <i class = "bx bx-cart-alt fs-4"></i></a>
            </div>
            <div id="user-btn" class = "p-1">
                <a href="{{route('profile')}}"><i class = "bx bx-user-circle fs-4 @if(Auth::check())text-primary @endif"></i></a>
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

    <!-----------------css--------------------->
    <style>
        /*===============  HEADER CSS===============*/
        header{
          background-color: var(--main-color);
          position: fixed;
          z-index: var(--z-fixed);
          box-shadow: 0 2px 16px hsla(0, 0%, 0%, .15);
          color: var(--white-color);
        }

        .nav_brand{
          color: var(--white-color);
          font-family: var(--second-font);
          text-transform: uppercase;
        }

        .search_box{
          border-radius: 1rem;
          background-color: var(--light-bg);
          form
          {
              display: flex;
          }
          input{
              width: 100%;
              background: none;
              font-family: var(--body-font);
              color: var(--main-color);
          }
          .search-btn{
              cursor: pointer;
              color:var(--black);
          }
          .search-btn :hover{
              color:var(--main-color);
          }
        }

        .search_box_hide{
          border-radius: 1rem;
          background-color: var(--light-bg);
          position: absolute;
          right: 2rem;
          top: 110%;
          text-align: center;
          transform-origin: top right;
          transform: scale(0);
          transition: .2s linear;
          form
          {
              display: flex;
          }
          input{
              width: 100%;
              background: none;
              font-family: var(--body-font);
              color: var(--main-color);
          }
          .search-btn{
              cursor: pointer;
              color:var(--black);
          }
          .search-btn :hover{
              color:var(--main-color);
          }
        }

        .header .nav .active{
          transform: scale(1);
        }

        .header_icons{
          display: flex;
          flex-direction: row;
          i{
              color: var(--white-color);
              border-radius: 50%;
              padding: .3rem;
          }
          i:hover{
              background-color: var(--main-color-light);
          }
        }

        /*--=============== CART DROPDOWN ===============-->*/

      .book_title {
        display: block;
      }

      .book_title a {
        color: var(--dark-color);
        font-weight: bold;
        word-break: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        color: var(--dark-color);
        min-height: 3.2rem;
        max-height: 3.2rem;
        margin-bottom: .3rem;
      }

      .book_title:hover a {
        color: var(--main-color-light);
      }

      .book_price {
        color: var(--main-color);
        font-weight: bold;
      }

      .dropdown {
        position: absolute;
        background-color: var(--white-color);
        border-radius: 1rem;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        min-width: 250px;
        max-width: 280px;
        overflow: hidden;
        right: 2rem;
        top: 110%;
        transform-origin: top right;
        transform: scale(0);
        transition: .2s linear;
      }

      .cart-item {
        background-color: var(--light-bg);
        margin-top: .5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        height: 70px;
        column-gap: .3rem;
        color: var(--dark-color);
      }

      .cart-item .book_title a {
        color: var(--main-color-dark);
        min-width: 100%;
        max-width: 100%;
        max-height: none;
        font-size: .9rem;
        font-weight: bold;
        min-height: 2.2rem;
        line-height: 1.1rem;
      }

      .cart-item .book_price {
        font-size: .9rem;
        font-weight: bold;
        color: var(--main-color);
        font-weight: bold;
        overflow-wrap: break-word;
      }

      .cart_img {
        height: 70px;
        max-width: 25%;
        display: flex;
        justify-content: center;
        overflow: hidden;
      }

      .cart_img img {
        object-fit: cover;
        min-height: 100%;
        min-width: 100%;
      }

      .dropdown.show {
        display: block;
        transform: scale(1);
      }

      .xoa {
        margin-right: 1rem;
        cursor: pointer;
        color: gray;
        text-align: center;
      }

      .xoa:hover {
        color: var(--main-color);
      }

      .summary button {
        background-color: unset;
        border: 1px solid var(--main-color-light);
        background-color: var(--main-color);
        border-radius: 10px;
        width: 90px;
        height: 25px;
        margin-left: 150px;
        color: white;
      }

      .summary p {
        color: black;
        margin-bottom: 0;
      }

      .summary button:hover {
        background-color: var(--main-color-alt);
      }

      .cart-item {
        transition: transform 0.5s ease, opacity 0.5s ease;
      }

      .cart-item.fade-out {
        transform: translateX(100%);
        opacity: 0;
      }
    </style>
  </header>

  <!--==============MAIN==================-->
  <main class="main pt-5">
    @if($books)
      <!--=============== INTRO ===============-->
      <section class="intro py-5 mb-5">
        <div class="container">
          <div class="row g-5 mt-1">
            <div class="img col-md-6 col-12">
                <div class=" book-img col-12">
                  <img id="mainImage" src="{{$books->IMAGE_LINK}}" alt="img"></div>
                  <div class="row g-2 mt-1">
                    @foreach($booksImage as $bookIMG)
                      <button class="product-img col-3" data-img-src="{{$bookIMG->IMAGE_LINK}}" onclick="changeImage(this)">
                        <img src="{{$bookIMG->IMAGE_LINK}}" alt="img">
                      </button>
                    @endforeach
                  </div>
                </div>
            <div class="text col-md-6 col-12">
                <h1 class = "title display-3 mb-5">{{$books->NAME}}</h1>
                <p class = "subtitle h5 mb-4">{{$books->DESCRIPTION}}</p>
                <p class="book-price display-5 mb-4" >${{$books->PRICE}}</p>
                <div class=" info row mb-4">
                  <div class="col-6">
                      <div>
                          ISBN <span class="isbn">{{$books->ISBN}}</span>
                      </div>
                      <div>
                          Author: <span class="at">{{$books->AUTHOR}}</span>
                      </div>
                  </div>
                  <div class="col-6">
                      <div>
                          Release year <span class="isbn">{{$books->RELEASE_YEAR}}</span>
                      </div>
                      <div>
                          Page Quantity: <span class="at">{{$books->PAGE_QUANTITY}}</span>
                      </div>
                  </div>
                </div>
            <div class="quantity-container col-3 mb-5">
                <button class="quantity-button col-4" id="decrease">-</button>
                <input type="number" id="quantity" class="quantity-input col-4" value="1" min="1">
                <button class="quantity-button col-4" id="increase">+</button>
            </div>
            <div class="button">
                <a href="{{route('login')}}">
              <button class="cart-btn col-5" style="margin-right: 1.5rem"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 35 36" fill="none">
                  <path d="M15.3125 30.9585C16.5206 30.9585 17.5 29.9791 17.5 28.771C17.5 27.5629 16.5206 26.5835 15.3125 26.5835C14.1044 26.5835 13.125 27.5629 13.125 28.771C13.125 29.9791 14.1044 30.9585 15.3125 30.9585Z" fill="#FCFCFC"/>
                  <path d="M25.5205 30.9585C26.7286 30.9585 27.708 29.9791 27.708 28.771C27.708 27.5629 26.7286 26.5835 25.5205 26.5835C24.3124 26.5835 23.333 27.5629 23.333 28.771C23.333 29.9791 24.3124 30.9585 25.5205 30.9585Z" fill="#FCFCFC"/>
                  <path d="M18.9581 19.2919H21.8747V14.9314H26.2352V12.0148H21.8747V7.66895H18.9581V12.0148H14.5977V14.9314H18.9581V19.2919Z" fill="#FCFCFC"/>
                  <path d="M14.5837 25.1252H26.2503C26.5441 25.1243 26.8308 25.0347 27.0728 24.8682C27.3148 24.7017 27.5008 24.4659 27.6066 24.1918L31.7337 13.4585H28.6128L25.2441 22.2085H15.5607L9.01283 6.50225C8.79082 5.97005 8.41603 5.5156 7.93583 5.19633C7.45563 4.87706 6.89156 4.7073 6.31491 4.7085H2.91699V7.62517H6.31491L13.242 24.221C13.3514 24.4873 13.5372 24.7153 13.7759 24.8762C14.0147 25.0371 14.2957 25.1237 14.5837 25.1252Z" fill="#FCFCFC"/>
                  </svg> Add to cart
                </button>

              <button class="buy-btn col-5">Buy now</button>
                </a>
            </div>

            </div>
          </div>
        </div>
      </section>

      <script>
            document.getElementById('increase').addEventListener('click', function() {
            let quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
          });

          document.getElementById('decrease').addEventListener('click', function() {
              let quantityInput = document.getElementById('quantity');
              if (quantityInput.value > 1) {
                  quantityInput.value = parseInt(quantityInput.value) - 1;
              }
          });
      </script>
      <!--=============== SIMILAR ===============-->
      <section class="genres">
          <div class="container p-2 p-md-4 mb-5">
              <div class="section_title mb-3">
                <p class="title">Similar Books</p>
                <hr class="hr1">
              </div>
              <div class="row ">
                @foreach ($booksSimilar as $book)
                  <div class="col">
                    <div class="book_item">
                        <a href="#"  class="book_img"><img src="{{$book->IMAGE_LINK}}" alt="img"></a>
                        <div class="book_info px-4 py-2">
                          <div class="book_title fs-5"><a href="#">{{$book->NAME}}</a></div>
                          <div class="book_author fs-5">{{$book->AUTHOR}}</div>
                          <div class="book_price fs-5">{{$book->PRICE}}</div>
                        </div>
                      </div>
                  </div>
                @endforeach
              </div>
          </div>
      </section>
      <!--=============== INFORMATION ===============-->
      <section class="information">
          <div class="container p-2 p-md-4 mb-5">
              <div class="section_title mb-3">
                <p class="title">Book Information</p>
                <hr>
              </div>
              <div class=" book_detail">
                  <div> Author: {{$books->AUTHOR}}</div>
                  <div> Language: {{$books->LANGUAGE}}</div>
                  <div> Release Year: {{$books->RELEASE_YEAR}}</div>
                  <hr class="hr2 mb-4">
              </div>
              <div class="mb-3">{{$books->DESCRIPTION}}
              </div>
          </div>
      </section>
      <!--=============== REVIEW ===============-->
      <section class="review">
          <div class="container p-2 p-md-4 mb-5">
              <div class="section_title mb-5">
                <p class="title">Review</p><hr>
              </div>
              <div class="rate row g-4">
                  <div class="point col col-3 display-1"> {{$point}}/5</div>
                  <div class=" rate_detail col col-9 col-md-5 ">
                    @foreach ($percentages as $key => $percentage)
                      <div class = "star">
                        <div class = "fs-6">{{($key) }} stars</div>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $percentage }}%"></div>
                        </div>
                        <div class = "fs-6">{{ $percentage }}%</div>
                      </div>
                    @endforeach
                  </div>
                  <div class="reminder col">Only registered users can write reviews. <br>Please, <a href="#">login</a> or <a href="#">register</a></div>
              </div>
              <hr class="hr3 mb-4">

              <div class="book_review mb-3">
                @foreach($customerReview as $review)
                  <div class="customer_1 row mb-5 ">
                      <div class="customer-info col-3">
                          <img class="avatar" src="https://static.vecteezy.com/system/resources/previews/014/194/216/original/avatar-icon-human-a-person-s-badge-social-media-profile-symbol-the-symbol-of-a-person-vector.jpg">
                          <div class="name">{{$review->USERNAME}}</div>
                      </div>
                      <div class="customer_review col-9">
                          <p class="customer_1_rate">
                            @for ($i = 0; $i < $review->RATING_STAR; $i++)
                              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                                <path d="M36.5781 16.25C36.4733 15.9415 36.2805 15.6703 36.0234 15.4701C35.7663 15.2699 35.4562 15.1493 35.1314 15.1234L25.6297 14.3684L21.5181 5.26668C21.3871 4.97354 21.1741 4.72455 20.9048 4.54978C20.6355 4.37501 20.3213 4.28191 20.0003 4.28174C19.6792 4.28156 19.3649 4.37431 19.0954 4.54879C18.8259 4.72326 18.6127 4.97202 18.4814 5.26502L14.3697 14.3684L4.86805 15.1234C4.54881 15.1486 4.24362 15.2654 3.98898 15.4596C3.73434 15.6538 3.54104 15.9172 3.43221 16.2184C3.32337 16.5196 3.30361 16.8457 3.37529 17.1579C3.44697 17.47 3.60705 17.7548 3.83639 17.9784L10.8581 24.8234L8.37472 35.5767C8.29931 35.9022 8.32348 36.2428 8.44408 36.5544C8.56469 36.866 8.77616 37.1342 9.05106 37.3241C9.32595 37.514 9.65158 37.6169 9.98569 37.6194C10.3198 37.622 10.647 37.5241 10.9247 37.3384L19.9997 31.2884L29.0747 37.3384C29.3586 37.5268 29.6934 37.6239 30.0341 37.6164C30.3748 37.6089 30.705 37.4973 30.9804 37.2966C31.2557 37.0958 31.463 36.8155 31.5743 36.4935C31.6857 36.1714 31.6957 35.823 31.6031 35.495L28.5547 24.8284L36.1147 18.025C36.6097 17.5784 36.7914 16.8817 36.5781 16.25Z" fill="#EEA61A"/>
                              </svg>
                            @endfor
                          </p>
                          <div class="customer_1_review">{{$review->DESCRIPTION}}</div>
                      </div>
                  </div>
                @endforeach
              </div>
          </div>
      </section>
    @endif
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
              <a href="#">
                <i class='bx bxs-home'></i>
                University of Information Technology
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bxs-phone'></i>
                (+84) 8484 14 64646
              </a>
            </li>
            <li>
              <a href="#">
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

    <style>
      /*===============  FOOTER CSS===================*/
      .footer{
        background-color: var(--second-color);
        color: var(--dark-color);
        a:hover{
            color: var(--main-color-light);
        }
      }

      .footer_brand{
        font-family: var(--second-font);
        color: var(--main-color);
        text-transform:uppercase;
      }

      .footer_icons a{
        color: var(--dark-color);
      }

      .contact a, .links a{
        color: var(--dark-color);
      }

      .contact h5, .links h5{
        color: var(--main-color);
      }

      .copyright{
        text-align: center;
        background-color: rgba(0, 0, 0, 0.2);
      }
    </style>
    <script>

    </script>
  </footer>

  <!--=============== SCROLL UP ===============-->
  <div class="scroll">
    <!-----------------sroll up html --------------------->
      <a href="#" class="scrollup shadow" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
      </a>

      <!-----------------sroll up css--------------------->
      <style>
          /*=============== SCROLL UP CSS===============*/
          .scrollup{
            position: fixed;
            background: var(--main-color-light);
            right: 1rem;
            bottom: -20%;
            display: inline-flex;
            padding: .3rem;
            border-radius: .25rem;
            z-index: var(--z-tooltip);
            opacity: .8;
            transition: .4s;
          }

          .scrollup__icon{
            font-size: 1.25rem;
            color: var(--white-color);
          }

          .scrollup:hover{
            background: var(--main-color-lighter);
            opacity: 1;
          }

          /* Show Scroll Up*/
          .show-scroll{
            bottom: 3rem;
          }
      </style>

      <!-----------------sroll up script--------------------->
      <script>
          /*=============== SHOW SCROLL UP ===============*/
          let body = document.body;
          function scrollUp(){
            const scrollUp = document.getElementById('scroll-up');
            if(this.scrollY >= 460) scrollUp.classList.add('show-scroll');
            else scrollUp.classList.remove('show-scroll')
          }
          window.addEventListener('scroll', scrollUp);
      </script>
  </div>

  <script src="{{asset('frontend/js/product_detail.js')}}"></script>

  <!--============== JQUERY ===============-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">

  </script>

  <script>
    function changeImage(button) {
        var imgUrl = button.getAttribute('data-img-src');
        var mainImage = document.getElementById('mainImage');
        mainImage.src = imgUrl;
    }
  </script>
   <script>
    /*=============== SHOW SEARCH ===============*/
    let dropdownMenu = document.getElementById('dropdown');
    let search = document.querySelector('.header .nav .search_box_hide');
    document.querySelector('#search-btn').onclick = () => {
        search.classList.toggle('active');
        dropdownMenu.classList.remove('show');
    };

    /*=============== SHOW CART ===============*/
    document.addEventListener('DOMContentLoaded', function () {
        const cartIcon = document.getElementById('cart-btn');
        const dropdown = document.getElementById('dropdown');
        const summary = document.querySelector('.summary p');

        const toggleDropdown = (show) => {
            dropdown.classList.toggle('show', show);
            search.classList.remove('active');
        };

        cartIcon.addEventListener('mouseenter', () => toggleDropdown(true));
        cartIcon.addEventListener('mouseleave', () => toggleDropdown(false));
        dropdown.addEventListener('mouseenter', () => toggleDropdown(true));
        dropdown.addEventListener('mouseleave', () => toggleDropdown(false));

        const updateTotalProducts = () => {
            const totalProducts = document.querySelectorAll('.cart-item').length;
            const productText = totalProducts >= 2 ? 'products' : 'product';
            summary.innerHTML = `Total ${totalProducts} ${productText}`;
        };

        document.querySelectorAll('.bxs-trash-alt').forEach(button => {
            button.addEventListener('click', (event) => {
                const cartItem = event.target.closest('.cart-item');
                if (cartItem) {
                    cartItem.classList.add('fade-out');
                    setTimeout(() => {
                        cartItem.remove();
                        updateTotalProducts();
                    }, 300);
                }
            });
        });
        updateTotalProducts();
    });
</script>
  <!--=============== BOOSTRAP ===============-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>a{
  text-decoration: none;}</style>
  </body>
</html>
