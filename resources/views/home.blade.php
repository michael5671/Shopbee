<link rel="stylesheet" href="{{asset('frontend/css/home.css')}}">
@extends('layout.user_MainStructure')
@section('title', 'Home')
@section('content')
    <!--==============INTRO==================-->
    <section class="intro py-5">
        <div class="container">
          <div class="row g-5">
            <div class="intro_text col-md-6 col-12">
                <h1 class = "intro_title display-3 mb-3">Start a new adventure with Verbify's universe</h1>
                <p class = "intro_subtitle h5 mb-3">Once upon a time, in a faraway kingdom, there lived a breathtakingly beautiful princess...</p>
                <button class="more-btn">Explore more</button>
            </div>
            <div class="intro_img col-md-6 col-12">
              <img src="{{asset('frontend/images/intro.png')}}" alt="img">
            </div>
          </div>
        </div>
    </section>

    <!--==============HIGHLIGHT==================-->
    <section class="highlight container py-5">
      <div class="row">
        <div class="bestseller col-sm-6 mb-4 mb-sm-0">
          <div class="card">
            <img  class="card-img" src="{{asset('frontend/images/highlight1.jpg')}}" alt="">
            <a href="/shop?sort=Most+popular" class="content card-img-overlay">
              <h4 class="card-title m-1">Best Seller Books</h4>
              <p class="card-text">Of the month</p>
            </a>
          </div>
        </div>

        <div class="feature col-sm-6 mb-4 mb-sm-0">
          <div class="card">
            <img class="card-img" src="{{asset('frontend/images/highlight2.jpg')}}" alt="">
            <a href="/shop?sort=Newest" class="content card-img-overlay">
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
                        <a href="/shop?genres[]={{$genre->GENRES_NAME}}&sort=Newest"><img src="{{asset("frontend/images/genres_$key.jpg")}}" alt="img"></a>
                    </div>
                    <a href="/shop?genres[]={{$genre->GENRES_NAME}}&sort=Newest">
                        <p class="genres_name fs-5 mt-3">{{$genre->GENRES_NAME}}</p>
                    </a>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!--==============PRODUCT COLLECTION==================-->
    <section class="products">
      <div class="container p-3 p-md-5">
        <div class="tab-wrap px-5">
          <div class="products-title-cover">

            <h2 class="section_title">The Collections</h2>
            <p>Explore our enchanting collection of timeless tales and captivating adventures. Lose yourself in worlds of wonder and possibility within these pages.
            </p>
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
                                  <a href="{{route('book.detail',$book->BOOK_ID)}}" class="book_img"><img src="{{$book->IMAGE_LINK}}" alt="img"></a>
                                  <div class="book_info px-4 py-2">
                                    <span class="book_title fs-5"><a href="{{route('book.detail',$book->BOOK_ID)}}">{{$book->NAME}}</a></span>
                                    <span class="book_author fs-5">{{$book->AUTHOR }}</span>
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
        <a href="/shop" class = "view-btn fs-6">View more</a>
      </div>
    </section>

    <!--==============SALE==================-->
    <section class="sale">
      hp <div class="container">
        <div class="sale-row row row-cols-1 row-cols-md-3">
          <div class="hotsale col">
            <div class="list_title">
                <a href="#"><h3>HOT SALE</h3></a>
              </div>
              <div class="list row row-cols-1 g-3">
                @foreach ($booksHotSale as $book)
                  <div class="list-item">
                    <div class="list_img col-3">
                      <a href="{{route('book.detail',$book->BOOK_ID)}}"><img src ="{{$book->IMAGE_LINK}}" class="img-fluid" alt="img"></a>
                    </div>
                    <div class="list_content">
                      <span class="book_title fs-5"><a href="{{route('book.detail',$book->BOOK_ID)}}">{{$book->NAME}}</a></span>
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
                    <a href="{{route('book.detail',$book->BOOK_ID)}}"><img src ="{{$book->IMAGE_LINK}}" class="img-fluid" alt="img"></a>
                  </div>
                  <div class="list_content">
                    <span class="book_title fs-5"><a href="{{route('book.detail',$book->BOOK_ID)}}">{{$book->NAME}}</a></span>
                    <span class="book_author fs-5">{{ $book->AUTHOR }}</span>
                    <span class="book_price fs-5">${{$book->PRICE}}</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="banner col-5 col-md-3">
            <img src="{{asset('frontend/images/bookmark.jpg')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend/js/home.js')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
