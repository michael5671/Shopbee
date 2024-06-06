<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">

    <title>Trang Chủ</title>
</head>

<body>
    <div class="content bg-gray">
        <div>
            @include('layout.header')
            <div class="d-flex pe-5 pt-10">
                <div class="w-30  p-3">
                    <div class="d-flex">
                        <div class="me-3">
                            <img src="{{ !empty($user->AVATAR) ? Storage::url($user->AVATAR) : 'https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745' }}"
                                alt="avatar" class="img-thumbnail" style="width: 75px;height:75px">
                        </div>
                        <div class="me-3">
                            <h3 class="">Account Name</h3>
                            <div class="fw-bold fs-4">{{ $user->LAST_NAME . ' ' . $user->FIRST_NAME }}</div>
                        </div>
                    </div>
                    <div class="mt-5 ms-3">
                        <div class="mb-3">
                            <a href="/profile" class=" text-decoration-none fs-4 @if(Route::currentRouteName() === 'profile') text-purple-active @else text-purple-deactive  @endif"><i
                                    class="fa-regular fa-user fs-4 pe-3"></i>My Acount</a>
                        </div>
                        <div class="mb-3">
                            <a href="/profile/order" class=" text-decoration-none fs-4  @if(Route::currentRouteName() === 'profile.order') text-purple-active @else text-purple-deactive @endif"><i
                                    class="fa-regular fa-user fs-4 pe-3"></i>Order management</a>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</body>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    document.getElementById('avatarUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>


</html>
