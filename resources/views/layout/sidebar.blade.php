<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>SideBars</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-font.css') }}">

    <style>
        .main{
            width: 100%;        }
        .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            --bs-nav-link-hover-color:#FFFFFF;
        }
        .nav-item:hover{
            background: #9B2896;
            transition-duration: 0.1s;
        }
        .active{
            background: #9B2896;
        }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
</head>
<body>
<div class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 pt-3 background-purple rounded-end" style="width: 260px;">
        <a href="/" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 white text-decoration-none">
            <span class="fs-4 roboto-medium-italic ">Admin Dashboard</span>
        </a>
        <br>
        <br>
        <ul class="nav flex-column mb-auto" >

            <li class="nav-item px-2 py-1 @if(Route::currentRouteName() === 'dashboard') active @endif" >
                <a href="{{route('dashboard')}}" class="nav-link white roboto-regular fs-5  d-flex align-items-center  justify-content-between" aria-current="page">
                    <svg class ="me-3" xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 20 21" fill="none">
                        <path d="M7 19.7331V12.3331C7 11.7731 7 11.4931 7.10899 11.2791C7.20487 11.091 7.35785 10.938 7.54601 10.8421C7.75992 10.7331 8.03995 10.7331 8.6 10.7331H11.4C11.9601 10.7331 12.2401 10.7331 12.454 10.8421C12.6422 10.938 12.7951 11.091 12.891 11.2791C13 11.4931 13 11.7731 13 12.3331V19.7331M9.0177 1.49715L2.23539 6.77228C1.78202 7.1249 1.55534 7.30121 1.39203 7.52201C1.24737 7.7176 1.1396 7.93794 1.07403 8.17221C1 8.43667 1 8.72385 1 9.29821V16.5331C1 17.6532 1 18.2133 1.21799 18.6411C1.40973 19.0174 1.71569 19.3234 2.09202 19.5152C2.51984 19.7331 3.07989 19.7331 4.2 19.7331H15.8C16.9201 19.7331 17.4802 19.7331 17.908 19.5152C18.2843 19.3234 18.5903 19.0174 18.782 18.6411C19 18.2133 19 17.6532 19 16.5331V9.29821C19 8.72385 19 8.43667 18.926 8.17221C18.8604 7.93794 18.7526 7.7176 18.608 7.52201C18.4447 7.30121 18.218 7.1249 17.7646 6.77228L10.9823 1.49715C10.631 1.2239 10.4553 1.08727 10.2613 1.03476C10.0902 0.988415 9.9098 0.988415 9.73865 1.03476C9.54468 1.08727 9.36902 1.2239 9.0177 1.49715Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Dashboard
                    <svg class ="ms-auto" xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 8 14" fill="none">
                        <path d="M1 13L7 7L1 1" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </li>


            <li class="nav-item px-2 py-1 @if(Route::currentRouteName() === 'product_management') active @endif">
                <a href="{{route('product_management')}}" class="nav-link white roboto-regular fs-5  d-flex align-items-center  justify-content-between" aria-current="page">
                    <svg class ="me-3" xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 22 20" fill="none">
                        <path d="M3 5.9966C2.83599 5.99236 2.7169 5.98287 2.60982 5.96157C1.81644 5.80376 1.19624 5.18356 1.03843 4.39018C1 4.19698 1 3.96466 1 3.5C1 3.03534 1 2.80302 1.03843 2.60982C1.19624 1.81644 1.81644 1.19624 2.60982 1.03843C2.80302 1 3.03534 1 3.5 1H18.5C18.9647 1 19.197 1 19.3902 1.03843C20.1836 1.19624 20.8038 1.81644 20.9616 2.60982C21 2.80302 21 3.03534 21 3.5C21 3.96466 21 4.19698 20.9616 4.39018C20.8038 5.18356 20.1836 5.80376 19.3902 5.96157C19.2831 5.98287 19.164 5.99236 19 5.9966M9 11H13M3 6H19V14.2C19 15.8802 19 16.7202 18.673 17.362C18.3854 17.9265 17.9265 18.3854 17.362 18.673C16.7202 19 15.8802 19 14.2 19H7.8C6.11984 19 5.27976 19 4.63803 18.673C4.07354 18.3854 3.6146 17.9265 3.32698 17.362C3 16.7202 3 15.8802 3 14.2V6Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Products
                    <svg class ="ms-auto" xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 8 14" fill="none">
                        <path d="M1 13L7 7L1 1" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </li>

            <li class="nav-item px-2 py-1 @if(Route::currentRouteName() === 'customers') active @endif">
                <a href="{{route('customers')}}" class="nav-link white roboto-regular fs-5  d-flex align-items-center  justify-content-between" aria-current="page">
                    <svg class ="me-3" xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 20 22" fill="none">
                        <path d="M16.9461 13.8369C18.402 14.5683 19.6503 15.742 20.5614 17.2096C20.7418 17.5003 20.832 17.6456 20.8632 17.8468C20.9266 18.2558 20.6469 18.7585 20.2661 18.9204C20.0786 19 19.8678 19 19.4461 19M14.9461 9.53224C16.4278 8.79589 17.4461 7.26686 17.4461 5.5C17.4461 3.73314 16.4278 2.20411 14.9461 1.46776M12.9461 5.5C12.9461 7.98528 10.9314 10 8.44613 10C5.96084 10 3.94613 7.98528 3.94613 5.5C3.94613 3.01472 5.96084 1 8.44613 1C10.9314 1 12.9461 3.01472 12.9461 5.5ZM1.50536 16.9383C3.09966 14.5446 5.6155 13 8.44613 13C11.2768 13 13.7926 14.5446 15.3869 16.9383C15.7362 17.4628 15.9108 17.725 15.8907 18.0599C15.875 18.3207 15.7041 18.64 15.4957 18.7976C15.228 19 14.86 19 14.1238 19H2.76848C2.0323 19 1.6642 19 1.39656 18.7976C1.18817 18.64 1.01721 18.3207 1.00156 18.0599C0.981454 17.725 1.15609 17.4628 1.50536 16.9383Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Customers
                    <svg class ="ms-auto" xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 8 14" fill="none">
                        <path d="M1 13L7 7L1 1" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </li>

            <li class="nav-item px-2 py-1 @if(str_contains(Route::currentRouteName(), 'orders')) active @endif">
                <a href="{{route('orders')}}" class="nav-link white roboto-regular fs-5  d-flex align-items-center  justify-content-between" aria-current="page">
                    <svg class ="me-3" xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M3.70013 11.8H15.5223C16.4338 11.8 16.8896 11.8 17.2524 11.6301C17.572 11.4803 17.8406 11.24 18.0247 10.9388C18.2337 10.597 18.284 10.144 18.3847 9.23804L18.9112 4.49951C18.9419 4.22279 18.9573 4.08444 18.9128 3.97734C18.8737 3.88329 18.8039 3.80527 18.7147 3.75605C18.6132 3.7 18.474 3.7 18.1956 3.7H3.25013M1 1H2.1236C2.36176 1 2.48084 1 2.574 1.04529C2.65602 1.08517 2.72398 1.14902 2.76889 1.22839C2.81991 1.31854 2.82734 1.43739 2.84219 1.67509L3.65781 14.7249C3.67266 14.9626 3.68009 15.0815 3.73111 15.1716C3.77602 15.251 3.84398 15.3148 3.926 15.3547C4.01916 15.4 4.13824 15.4 4.3764 15.4H16.3M5.95 18.55H5.959M14.05 18.55H14.059M6.4 18.55C6.4 18.7985 6.19853 19 5.95 19C5.70147 19 5.5 18.7985 5.5 18.55C5.5 18.3015 5.70147 18.1 5.95 18.1C6.19853 18.1 6.4 18.3015 6.4 18.55ZM14.5 18.55C14.5 18.7985 14.2985 19 14.05 19C13.8015 19 13.6 18.7985 13.6 18.55C13.6 18.3015 13.8015 18.1 14.05 18.1C14.2985 18.1 14.5 18.3015 14.5 18.55Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Orders
                    <svg class ="ms-auto" xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 8 14" fill="none">
                        <path d="M1 13L7 7L1 1" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </li>


        </ul>
        <div class="px-2 nav-item py-3">
            <a href="{{route('logout')}}" class="white roboto-regular fs-5  d-flex align-items-center  justify-content-start text-decoration-none" aria-current="page">
                <svg  class ="ms-2 me-5" xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 26 20" fill="none">
                    <path d="M25 10H1M1 10L10 19M1 10L10 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Sign Out

            </a>
        </div>
    </div>

</div>
</body>
<script>
    const navLinks = document.querySelectorAll('.nav-item');

    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Xóa lớp active khỏi tất cả các liên kết
            navLinks.forEach(link => link.classList.remove('active'));

            // Thêm lớp active vào liên kết được nhấp
            this.classList.add('active');
        });
    });
</script>
</html>
