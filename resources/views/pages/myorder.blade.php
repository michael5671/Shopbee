@extends('layout.layout')
@section('content')
    <div class="w-70">
        <h3 class="p-3">My order</h3>
        <div class="d-flex info-box rounded p-3 mb-3">
            <form method="GET" action="/profile/myorder" class="input-group">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="..." name="search">
                <button class="btn btn-purple" type="submit">Find order</button>
            </form>
        </div>
        <div class="d-flex justify-content-between align-items-center info-box rounded p-3">
            @if (count($list_order) < 0)
                <div class="d-flex flex-column justify-content-between align-items-center">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/013/281/925/small_2x/basket-retail-shopping-cart-blue-icon-on-abstract-cloud-background-free-vector.jpg"
                        alt="No order yet" class="me-2">
                    <div class="fw-bold fs-3">No order yet</div>
                </div>
            @else
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Address</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Provider</th>
                            <th scope="col">Account Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_order as $item)
                            <tr>
                                <th scope="row">{{ $item->ORDER_ID }}</th>
                                <td>{{ $item->ORDER_DATE }}</td>
                                <td>{{ $item->ADDRESS }}</td>
                                <td>{{ $item->PAYMENT_STATUS }}</td>
                                <td>{{ $item->TOTAL_PRICE }}</td>
                                <td>{{ $item->PAYMENT_TYPE }}</td>
                                <td>{{ $item->PROVIDER }}</td>
                                <td>{{ $item->ACCOUNT_NUMBER }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
