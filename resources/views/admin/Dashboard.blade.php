@extends('layout.admin_MainStructure')
@section('title', 'Dashboard')
@section('content')
        <div class="row align-items-start">
            <div class="col roboto-medium-italic fs-4 purple">
                Welcome! {{Auth::user()->USERNAME}}
            </div>
        </div>
        <div class="row gx-2 flex-nowrap">
            <div class="col">
                <div class="card sales-card background-purple white">
                    <div class="card-body d-flex flex-column ">
                        <h6 class="card-title roboto-regular">Total sales</h6>
                        <div class="card-text sales-amount roboto-medium-italic align-self-center fs-3">22.772.202 VND
                        </div>
                        <div class="align-self-center">
                            <span class="badge text-bg-success">+3.5tr</span>
                            <span class="sales-period">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card sales-card background-purple white">
                    <div class="card-body d-flex flex-column ">
                        <h6 class="card-title roboto-regular">Total sales</h6>
                        <div class="card-text sales-amount roboto-medium-italic align-self-center fs-3">22.772.202 VND
                        </div>
                        <div class="align-self-center">
                            <span class="badge text-bg-success sales-increase">+3.5tr</span>
                            <span class="sales-period">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card sales-card background-purple white">
                    <div class="card-body d-flex flex-column ">
                        <h6 class="card-title roboto-regular">Total sales</h6>
                        <div class="card-text sales-amount roboto-medium-italic align-self-center fs-3">22.772.202 VND
                        </div>
                        <div class="align-self-center">
                            <span class="badge text-bg-success sales-increase">+3.5tr</span>
                            <span class="sales-period">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card sales-card background-purple white">
                    <div class="card-body d-flex flex-column ">
                        <h6 class="card-title roboto-regular">Total sales</h6>
                        <div class="card-text sales-amount roboto-medium-italic align-self-center fs-3">22.772.202 VND
                        </div>
                        <div class="align-self-center">
                            <span class="badge text-bg-success sales-increase">+3.5tr</span>
                            <span class="sales-period">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
