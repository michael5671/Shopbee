@extends('layout.admin_MainStructure')
@section('title', 'ORD'.$order->ORDER_ID)
@section('content')
    <div class = "roboto-regular fs-4 purple mt-4 ms-4 d-flex justify-content-between">
        <div> Buyer Infomation</div>
        <div class = "me-5"> #ORD00{{$order->ORDER_ID}}
            @if(strcmp($order->PAYMENT_STATUS,"PAID")==0)
                <span class="badge text-bg-success">Paid</span>
            @else
                <span class="badge text-bg-danger" >Unpaid</span>
            @endif
        </div>
    </div>
    <div class="container ms-3 roboto-regular mt-2">
        <div class="row">
            <div class="col col-sm-3">
                Name: {{$customer->LAST_NAME.' '.$customer->FIRST_NAME}}
            </div>
            <div class="col col-sm-8">
                Phone Number: {{$customer->PHONE_NUMBER}}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                Address: {{$customer->ADDRESS. ' '.$customer->CITY}}
            </div>
        </div>
    </div>
    <div class = "roboto-regular fs-4 purple ms-4 mt-4"> Payment Infomation</div>
    <div class="container ms-3 roboto-regular mt-2">
        <div class="row">
            <div class="col col-sm-3">
                Payment type: {{$order->PAYMENT_TYPE}}
            </div>
            <div class="col col-sm-8">
                Provider: {{$order->PROVIDER}}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                Account Number: {{$order->ACCOUNT_NUMBER}}
            </div>
        </div>
    </div>
    <div class = "roboto-regular fs-4 purple ms-4 mt-4">Product List</div>
    <div class = "background-purple1 mx-4 mb-4 rounded-3 pt-3 d-flex flex-column">
        @foreach($order_item as $item)
        <div class = "mx-3 pb-3">
            <div>
                <img src="{{$bookImages[$item->BOOK_ID][0]->IMAGE_LINK}}" class="book-thumbnail float-start">
            </div>
            <div class="d-flex roboto-regular white fs-5 flex-column ps-4">
                    <div>
                        {{$bookImages[$item->BOOK_ID][1]->NAME}}
                    </div>
                <div class="row mt-4">
                    <div class="col">x{{$item->QUANTITY}}</div>
                    <div class="col-auto align-text-end"> {{$item->PRICE}}$</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class = "roboto-regular fs-4 purple text-end mx-4">Total: {{$order->TOTAL_PRICE}}$</div>

@endsection
