

@foreach ($books as $book)
                        <div class="col book_item ">
                        @if (!empty($book->images->first()->IMAGE_LINK))
                            <a href="#" class="book_img"><img src="{{$book->images->first()->IMAGE_LINK}}" alt="{{ $book->name }}"></a>
                        @else
                            <a href="#" class="book_img"><img src="https://via.placeholder.com/150" alt="{{ $book->name }}"></a>
                        @endif
                            <div class="book_info px-4 py-2">
                                <span class="book_title fs-5"><a href="#">{{$book->NAME}}</a></span>
                                <span class="book_author fs-5">{{ $book->AUTHOR }}</span>
                                <span class="book_price fs-5">${{ number_format($book->PRICE, 2) }}</span>
                                <button class='cart-btn fs-3'>
                                    <i class="bx bxs-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach