@extends('layout.admin_MainStructure')
@section('title', 'Customers')
@section('content')
<div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h1>Book Management</h1>
            <a href="{{ route('create') }}" class="btn-add-product">
                <i class="fas fa-plus"></i> Add Book
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Language</th>
                    <th>Page quantity</th>
                    <th>Price</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            @if($product->images->first())
                                <img src="{{ $product->images->first()->IMAGE_LINK }}" alt="Book Image">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Book Image">
                            @endif
                            <div>
                                <strong>{{ $product->NAME }}</strong><br>
                                ISBN: {{ $product->ISBN }}
                            </div>
                        </td>
                        <td>
                            {{ $product-> AUTHOR}}
                        </td>
                        <td>
                            {{ $product->LANGUAGE }}
                        </td>
                        <td>
                            {{ $product->PAGE_QUANTITY }}
                        </td>
                        <td>
                            {{ $product->PRICE }}$
                        </td>
                        <td>
                        <a href="{{ route('edit', $product->BOOK_ID) }}" class="edit-link">Edit</a><br>
                        <form class="deleteForm" action="{{ route('delete', $product->BOOK_ID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="delete-link" onclick="confirmDelete(event)">Delete</a>
                        </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div class="align-items-end mt-auto">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end"> {{-- Thêm justify-content-center để căn giữa --}}
            {{-- Liên kết đến trang trước --}}
            @if ($products->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a></li>
            @endif

            {{-- Các liên kết đến các trang --}}
            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                <li class="page-item {{ $products->currentPage() == $page ? ' active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Liên kết đến trang sau --}}
            @if ($products->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif

        </ul>
        <div class = "ms-3 fs-5 roboto-regular-italic purple justify-content-end d-flex">
            {{4* ($products->currentPage()-1)+count($products) }} of {{$size }}
            Customers
        </div>

    </nav>
</div>
    <script>

        document.querySelectorAll('.product-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', toggleDeleteBar);
        });

        document.getElementById('deleteButton').addEventListener('click', function() {
            const selectedBooks = Array.from(document.querySelectorAll('.product-checkbox:checked')).map(checkbox => checkbox.value);
            document.getElementById('selectedBooks').value = selectedBooks.join(',');
            document.getElementById('deleteForm').submit();
        });

        function toggleDeleteBar() {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
            document.getElementById('deleteBar').style.display = checkedCheckboxes.length > 0 ? 'block' : 'none';
        }

        function confirmDelete(event) {
            event.preventDefault();
                if (confirm('Bạn có muốn xoá hay không?')) {
                    const element = event.target;
                    element.parentElement.submit();
                }
            }

        document.querySelectorAll('.toggle-switch').forEach(switchElement => {
            switchElement.addEventListener('change', function() {

            });
        });
    </script>

@endsection
