@extends('layout.layout')
@section('content')
    <div class="w-70">
        <h3 class="p-3">Account Infomation</h3>
        <form action="/profile/update/{{ $user->CUSTOMER_ID }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex info-box rounded p-3 ">
                <div class="w-70">
                    <h4 class="mb-4">Infomation</h4>
                    <div class="d-flex align-items-center">
                        <div class="col-2 mb-3 me-3">
                            <img id="avatarPreview"
                                src="{{ !empty($user->AVATAR) ? Storage::url($user->AVATAR) : 'https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745' }}"
                                alt="avatar" class="img-thumbnail avatar mb-3">
                            <input class="form-control" type="file" id="avatarUpload" accept="image/*" name="avatar">
                        </div>

                        <div class="col-8 ">
                            <div class="mb-3 row">
                                <label for="username" class="col-4 col-form-label">Họ và tên</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="username" name="fullName"
                                        value="{{ $user->LAST_NAME . ' ' . $user->FIRST_NAME }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="username" class="col-4 col-form-label">Username</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $user->USERNAME }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birthday" class="col-2 col-form-label">Birthday</label>
                        <select name="" id="" class="col-2 col-form-control me-2">
                            <option value="">Date</option>
                        </select>
                        <select name="" id="" class="col-2 col-form-control me-2">
                            <option value="">Month</option>
                        </select>
                        <select name="" id="" class="col-2 col-form-control">
                            <option value="">Year</option>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-2 col-form-label">Gender</label>
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" id="male" name="gender" value="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" id="female" name="gender" value="female">
                            <label class="form-check-label" for="male">
                                Female
                            </label>
                        </div>
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" id="other" name="gender" value="other">
                            <label class="form-check-label" for="male">
                                Other
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birthday" class="col-2 col-form-label">Province</label>
                        <input class="col-8" type="text" name="PROVINCE" id="" value="{{ $user->PROVINCE }}">
                    </div>
                    <div class="mb-3 row">
                        <label for="birthday" class="col-2 col-form-label">City</label>
                        <input class="col-8" type="text" name="CITY" id="" value="{{ $user->CITY }}">
                    </div>
                    <div class="mb-3 row">
                        <label for="birthday" class="col-2 col-form-label">Address</label>
                        <input class="col-8" type="text" name="ADDRESS" id="" value="{{ $user->ADDRESS }}">
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn btn-purple fw-bold">Save changes</button>
                    </div>
                </div>
                <div class="w-30">
                    <h4 class="mb-4">Phonenumber & Email</h4>
                    <!-- Error message section -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('succes'))
                        <div class="alert alert-success">
                            {{ session('succes') }}
                        </div>
                    @endif
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="pe-3">
                                <i class="fa-solid fa-phone-volume fs-3"></i>
                            </div>
                            <div class="pe-3">
                                <span class="">Phone number</span><br>
                                <span>{{ !empty($user->PHONE_NUMBER) ? $user->PHONE_NUMBER : 'example@mail.com' }}</span>
                            </div>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-purple-rounded" data-bs-toggle="modal"
                                data-bs-target="#modalphone">
                                Update
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="pe-3">
                                <i class="fa-regular fa-envelope fs-3"></i>
                            </div>
                            <div class="pe-3">
                                <span class="">Mail address</span><br>
                                <span>{{ !empty($user->EMAIL) ? $user->EMAIL : 'example@mail.com' }}</span>
                            </div>
                        </div>
                        <div class="">

                            <button type="button" class="btn btn-purple-rounded" data-bs-toggle="modal"
                                data-bs-target="#modalemail">
                                Update
                            </button>
                        </div>
                    </div>
                    <h4 class="mb-4">Security</h4>
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="pe-3">
                                <i class="fa-solid fa-phone-volume fs-3"></i>
                            </div>
                            <div class="pe-3">
                                <span class=" ">Set up password</span><br>
                            </div>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-purple-rounded" data-bs-toggle="modal"
                                data-bs-target="#modalpass">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- Modal update email --}}
    <div class="modal" tabindex="-1" id="modalemail" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/profile/update/{{ $user->CUSTOMER_ID }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ $user->EMAIL }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal update phone --}}
    <div class="modal" tabindex="-1" id="modalphone" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/profile/update/{{ $user->CUSTOMER_ID }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Phone</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                            value="{{ $user->PHONE_NUMBER }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal update pass --}}
    <div class="modal" tabindex="-1" id="modalpass" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/profile/update_pass/{{ $user->CUSTOMER_ID }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Pass</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" name="old_pass" class="form-control" placeholder="Old pass">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="new_pass" class="form-control" placeholder="New pass">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="cf_new_pass" class="form-control" placeholder="Config New pass">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
