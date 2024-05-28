@extends('layout.admin_MainStructure')
@section('title', 'Customers')
@section('content')
        <div class="d-flex flex-row justify-content-between ">
            <div class="roboto-medium-italic fs-4 purple align-items-end mt-2">
                Customers
            </div>
            <div class="input-group">
                <div class="input-group-text" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                        <path d="M21 21L16.1667 16.1667M9.88889 4.33333C12.9571 4.33333 15.4444 6.82064 15.4444 9.88889M18.7778 9.88889C18.7778 14.7981 14.7981 18.7778 9.88889 18.7778C4.97969 18.7778 1 14.7981 1 9.88889C1 4.97969 4.97969 1 9.88889 1C14.7981 1 18.7778 4.97969 18.7778 9.88889Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input type="text" class="form-control" placeholder="Search...">
            </div>
        </div>
        <div class = "table-responsive mt-2 flex-grow-1">
            <table class="table ">
                <thead class ="roboto-medium">
                <tr>
                    <th scope="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 18 20" fill="none" class="me-2">
                            <path d="M17 19C17 17.6044 17 16.9067 16.8278 16.3389C16.44 15.0605 15.4395 14.06 14.1611 13.6722C13.5933 13.5 12.8956 13.5 11.5 13.5H6.5C5.10444 13.5 4.40665 13.5 3.83886 13.6722C2.56045 14.06 1.56004 15.0605 1.17224 16.3389C1 16.9067 1 17.6044 1 19M13.5 5.5C13.5 7.98528 11.4853 10 9 10C6.51472 10 4.5 7.98528 4.5 5.5C4.5 3.01472 6.51472 1 9 1C11.4853 1 13.5 3.01472 13.5 5.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Username
                    </th>
                    <th scope="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="18" viewBox="0 0 16 22" fill="none" class="me-2">
                            <path d="M8 16.5H8.01M4.2 21H11.8C12.9201 21 13.4802 21 13.908 20.782C14.2843 20.5903 14.5903 20.2843 14.782 19.908C15 19.4802 15 18.9201 15 17.8V4.2C15 3.07989 15 2.51984 14.782 2.09202C14.5903 1.71569 14.2843 1.40973 13.908 1.21799C13.4802 1 12.9201 1 11.8 1H4.2C3.0799 1 2.51984 1 2.09202 1.21799C1.71569 1.40973 1.40973 1.71569 1.21799 2.09202C1 2.51984 1 3.0799 1 4.2V17.8C1 18.9201 1 19.4802 1.21799 19.908C1.40973 20.2843 1.71569 20.5903 2.09202 20.782C2.51984 21 3.07989 21 4.2 21ZM8.5 16.5C8.5 16.7761 8.27614 17 8 17C7.72386 17 7.5 16.7761 7.5 16.5C7.5 16.2239 7.72386 16 8 16C8.27614 16 8.5 16.2239 8.5 16.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Phone Number
                    </th>
                    <th scope="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 18 22" fill="none" class="me-2">
                            <path d="M9 11.5C10.6569 11.5 12 10.1569 12 8.5C12 6.84315 10.6569 5.5 9 5.5C7.34315 5.5 6 6.84315 6 8.5C6 10.1569 7.34315 11.5 9 11.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 21C11 17 17 14.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 14.4183 7 17 9 21Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Address

                    </th>
                    <th scope="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 22 22" fill="none" class="me-2">
                            <path d="M4.00014 13H17.1359C18.1487 13 18.6551 13 19.0582 12.8112C19.4134 12.6448 19.7118 12.3777 19.9163 12.0432C20.1485 11.6633 20.2044 11.16 20.3163 10.1534L20.9013 4.88835C20.9355 4.58088 20.9525 4.42715 20.9031 4.30816C20.8597 4.20366 20.7821 4.11697 20.683 4.06228C20.5702 4 20.4155 4 20.1062 4H3.50014M1 1H2.24844C2.51306 1 2.64537 1 2.74889 1.05032C2.84002 1.09463 2.91554 1.16557 2.96544 1.25376C3.02212 1.35394 3.03037 1.48599 3.04688 1.7501L3.95312 16.2499C3.96963 16.514 3.97788 16.6461 4.03456 16.7462C4.08446 16.8344 4.15998 16.9054 4.25111 16.9497C4.35463 17 4.48694 17 4.75156 17H18M6.5 20.5H6.51M15.5 20.5H15.51M7 20.5C7 20.7761 6.77614 21 6.5 21C6.22386 21 6 20.7761 6 20.5C6 20.2239 6.22386 20 6.5 20C6.77614 20 7 20.2239 7 20.5ZM16 20.5C16 20.7761 15.7761 21 15.5 21C15.2239 21 15 20.7761 15 20.5C15 20.2239 15.2239 20 15.5 20C15.7761 20 16 20.2239 16 20.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                            Orders
                    </th>
                    <th scope="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 21 22" fill="none" class="me-2">
                            <path d="M19.5 7H1.5M14.5 1V4M6.5 1V4M10.5 17V11M7.5 14H13.5M6.3 21H14.7C16.3802 21 17.2202 21 17.862 20.673C18.4265 20.3854 18.8854 19.9265 19.173 19.362C19.5 18.7202 19.5 17.8802 19.5 16.2V7.8C19.5 6.11984 19.5 5.27976 19.173 4.63803C18.8854 4.07354 18.4265 3.6146 17.862 3.32698C17.2202 3 16.3802 3 14.7 3H6.3C4.61984 3 3.77976 3 3.13803 3.32698C2.57354 3.6146 2.1146 4.07354 1.82698 4.63803C1.5 5.27976 1.5 6.11984 1.5 7.8V16.2C1.5 17.8802 1.5 18.7202 1.82698 19.362C2.1146 19.9265 2.57354 20.3854 3.13803 20.673C3.77976 21 4.61984 21 6.3 21Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Joining Date
                    </th>

                </tr>
                </thead>
                <tbody class = "roboto-regular">
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->USERNAME}}</td>
                        <td>{{$customer->PHONE_NUMBER}}</td>
                        <td>{{$customer->ADDRESS}}, {{$customer->CITY}}</td>
                        <td>02</td>
                        <td>{{$customer->JOINING_DATE}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="align-items-end mt-auto">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end"> {{-- Thêm justify-content-center để căn giữa --}}
                {{-- Liên kết đến trang trước --}}
                @if ($customers->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $customers->previousPageUrl() }}">Previous</a></li>
                @endif

                {{-- Các liên kết đến các trang --}}
                @foreach ($customers->getUrlRange(1, $customers->lastPage()) as $page => $url)
                    <li class="page-item {{ $customers->currentPage() == $page ? ' active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Liên kết đến trang sau --}}
                @if ($customers->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $customers->nextPageUrl() }}">Next</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                @endif

            </ul>
            <div class = "ms-3 fs-5 roboto-regular-italic purple justify-content-end d-flex">
                {{15* ($customers->currentPage()-1)+count($customers) }} of {{$size }}
                Customers
            </div>

        </nav>
        </div>
    <script>
        const rows = document.querySelectorAll('table tr');

        rows.forEach(row => {
                              row.addEventListener('click', () => {
                              const customerId = row.cells[0].textContent; // Lấy CUSTOMER_ID từ cột đầu tiên
                          window.location.href = `{{ route('customers.show', ['customer' => '__CUSTOMER_ID__']) }}`.replace('__CUSTOMER_ID__', customerId);
           });
        });
    </script>
@endsection
