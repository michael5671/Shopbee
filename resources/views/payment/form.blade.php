
    @csrf
    <input type="hidden" name="cart_id" value="{{ $cartId }}">
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="fw-bold text-center fs-3" style="font-weight: 700">Billing data</h2>
                <br>
                <div class="form-outline">
                    <label for="recipe" class="fw-bold">Tên người nhận</label>
                    <input type="text" id="Name" name="Name" value="{{ $customer->LAST_NAME }} {{$customer->FIRST_NAME}}" class="form-control mb-3" placeholder="Name">
                    <x-input-error :messages="$errors->get('recipe')" class="mt-2"/>
                </div>

                <div class="form-outline">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="text" id="email" name="EMAIL" value="{{$customer->EMAIL}}" class="form-control mb-3" placeholder="Email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="form-outline">
                    <label for="phone_number" class="fw-bold">Số điện thoại</label>
                    <input type="text" id="phone_number" name="PHONE_NUMBER" value="{{ $customer->PHONE_NUMBER}}" class="form-control mb-3" placeholder="Phone number">
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                </div>

                <div class="form-outline">
                    <label for="ADDRESS" class="fw-bold">Địa chỉ giao hàng</label>
                    <input type="text" id="ADDRESS" name="ADDRESS" value="{{ $customer->ADDRESS}}, {{$customer->CITY}}, {{$customer->PROVINCE}}" class="form-control mb-3" placeholder="Shipping Address">
                    <x-input-error :messages="$errors->get('shipping_address')" class="mt-2"/>
                </div>

                <div class="form-outline">
                    <label for="notes" class="fw-bold">Ghi chú</label>
                    <input type="text" id="notes" name="notes" class="form-control mb-3" placeholder="Notes">
                </div>
            </div>


            <style>
                .image-container {
                    position: relative;
                }
                .sticky-img {
                    position: absolute;
                    top: -20px;
                    right: 0;
                    z-index: 1000;
                    background-color: white;
                }
            </style>

            <div class="col-md-6 image-container">
              <div class="row">
                <h2 class="fw-bold fs-3 text-center" style="font-weight: 700">Your orders</h2>
              </div>
                <style>
                  .product-list {
                      width: 400px;
                      border: 2px solid #ccc;
                      border-radius: 10px;
                      background-color: #fff;
                      overflow: hidden;
                      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                  }
                  .product-list .header {
                      background-color: #800080;
                      color: white;
                      text-align: center;
                      padding: 15px 0;
                      font-size: 1.7em;
                      font-weight: 900
                  }
                  .product-list .product {
                      display: flex;
                      justify-content: space-between;
                      padding: 10px 20px;
                      border-bottom: 1px solid #ccc;
                  }
                  .product-list .product:last-child {
                      border-bottom: none;
                  }
                  .product-list .product img {
                      max-width: 40px;
                      max-height: 60px;
                      margin-right: 10px;
                  }
                  .product-list .product-details {
                      flex-grow: 1;
                  }
                  .product-list .product-name {
                      font-size: 0.9em;
                      margin: 0;
                  }
                  .product-list .product-price {
                      font-weight: bold;
                      color: black;
                  }
                  .product-list .total {
                      font-weight: bold;
                      text-align: center;
                      padding: 15px 0;
                      background-color: #f2f2f2;
                      font-size: 1.7em;
                      font-weight: 900
                  }
                </style>

                @php
                  $total = 0;

                  foreach($cartHas as $item) {
                      $total += $item->QUANTITY *$item->PRICE;
                  }
                @endphp

                <div class="product-list mt-5" style="width: 650px">
                  <div class="header"><span class="fw-bold fs-2">Product</span></div>

                  @foreach ($cartHas as $item)
                    <div class="product">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2 mb-2">
                                <img src="{{$item->IMAGE_LINK}}" alt="">
                            </div>

                            <div class="product-details col-lg-8 col-md-8 col-sm-8 col-8 mb-8">
                                <div class="row">
                                    <span class="product-name fw-bold">{{ $item->NAME }}</span>
                                    <span class="product-name">{{ $item->DESCRIPTION }}</span>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                        <span class="fw-light" style="font-size: 13px">x{{ $item->QUANTITY }}</span>
                                    </div>

                                </div>
                            </div>

                            <div class="product-price col-lg-2 col-md-2 col-sm-2 col-2 mb-2 d-flex justify-content-center align-items-center">
                                <span style="font-size: 20px">
                                    {{ $item->PRICE * $item->QUANTITY}}$
                                </span>
                            </div>
                        </div>

                    </div>
                  @endforeach

                  <input type="hidden" class="total pe-none boder-none" name="TOTAL_PRICE" value="{{ $total }}">
                  <div class="total">{{ $total }}$</div>
                </div>

                <div class="ms-5">
                    <h2 class="mt-5 mb-3 fw-bold">Payment</h2>

                    <div class="payment-methods">
                        <div class="form-check">
                            <input type="radio" name="PAYMENT_TYPE" value="cod" id="cod" class="form-check-input">
                            <label for="cod">
                                <img src="{{ asset('img/445382872_815712160506317_5280714423288141267_n.png') }}" alt="COD" style="width: 50px; height: 50px;">
                                <span class="ps-4">Cash on Delivery</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="PAYMENT_TYPE" value="card" id="card" class="form-check-input">
                            <label for="card">
                                <img src="{{ asset('img/445386563_996711298755513_4868818802037556907_n.png') }}" alt="Credit Card" style="width: 50px; height: 50px;">
                                <span class="ps-4">Card Payment</span>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('PAYMENT_TYPE')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5 d-flex justify-content-center">
                <button type="submit" class="btn mt-3" style="background-color: #800080; color: white; font-weight: bold; font-size: 1.1em; padding-top: 7px 22px 7px;">Submit</button>
            </div>
        </div>
    </div>
