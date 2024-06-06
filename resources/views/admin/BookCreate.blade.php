<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('assets/css/style_product_mng.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style_bookManagement.css') }}">
@include('layout.sidebar')
<div class="content">
        <h1>{{ $action }} </h1>
        <hr>
        <h1>Book Information</h1>
        <hr>
        <!-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $actionLink }}"  method="POST" id="createForm">
            @csrf
            <input type="hidden" name="bookId" value="{{ $book->BOOK_ID }}">
            <input type="hidden" id="selected-genres-input" name="selected-genres" value="{{ $selectedGenres }}">
            <div class="form-group-row">
                <div class="form-group">
                    <label for="name">Book Name</label>
                    <input type="text" id="name" name="name" value="{{ $book->NAME }}" required>
                </div>
                <div class="form-group">
                    <label for="genres">Genres*</label>
                <select id="genres" >
                    <option value="" disabled selected >Select Genres Name</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->GENRES_NAME }}" >{{ $genre->GENRES_NAME }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="selected-genres" id="selected-genres"></div>
            <div class="form-group-row">
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" name="isbn"  value="{{ $book->ISBN }}" required>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" value="{{ $book->AUTHOR }}" required>
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" id="language" name="language" value="{{ $book->LANGUAGE }}" required>
                </div>
                <div class="form-group">
                    <label for="release-year">Release Year</label>
                    <input type="number" id="release-year" name="release_year" required value="{{ $book->RELEASE_YEAR }}">
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" step="0.01" value="{{ $book->PRICE }}" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Page Quantity</label>
                    <input type="number" id="quantity" name="page_quantity" value="{{ $book->PAGE_QUANTITY }}" required>
                </div>
            </div>
            <div class="form-group description">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" >{{ $book->DESCRIPTION }}</textarea>
            </div>

            <!------------------------- Book Images ------------------------->
            <h1>Book Images</h1>
            <hr>
            <p id="img-book">Link of Photo:</p>
            <div class="form-group-image">
                <div class="upload-frame">
                    <input type="text" name="image_links[]" placeholder="Enter photo URL 1" value="{{ $imageLinks[0] }}">
                    <br>
                    <input type="text" name="image_links[]" placeholder="Enter photo URL 2" value="{{ $imageLinks[1] }}">
                    <br>
                    <input type="text" name="image_links[]" placeholder="Enter photo URL 3" value="{{ $imageLinks[2] }}">
                </div>
            </div>
            <div class="button-container">
                <button type="button">Cancel</button>
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            const productMenuItem = document.getElementById('product');
            const subMenu = document.getElementById('sub-menu-product');
            const productArrow = document.getElementById('arrow-product');

            menuItems.forEach(function(menuItem) {
                menuItem.addEventListener('click', function(event) {
                    event.stopPropagation();
                    menuItems.forEach(function(item) {
                        item.classList.remove('active');
                        const arrow = item.querySelector('.arrow');
                        if (arrow) {
                            arrow.classList.remove('fa-chevron-down');
                            arrow.classList.add('fa-chevron-right');
                        }
                    });
                    this.classList.add('active');

                    if (this === productMenuItem) {
                        const isSubMenuVisible = subMenu.style.display === 'block';
                        subMenu.style.display = isSubMenuVisible ? 'none' : 'block';
                        productArrow.classList.toggle('fa-chevron-down', !isSubMenuVisible);
                        productArrow.classList.toggle('fa-chevron-right', isSubMenuVisible);
                    } else {
                        subMenu.style.display = 'none';
                        productArrow.classList.remove('fa-chevron-right');
                        productArrow.classList.add('fa-chevron-down');
                    }
                });
            });

            // Genres
            const genresSelect = document.getElementById('genres');
            const selectedGenresContainer = document.getElementById('selected-genres'); // Container chứa các thể loại đã chọn
            const selectedGenresInput = document.getElementById('selected-genres-input'); // Đây là input ẩn để gửi dữ liệu lên server

            genresSelect.addEventListener('change', function() {
                const selectedOption = genresSelect.options[genresSelect.selectedIndex];
                if (selectedOption.value && !selectedGenresContainer.querySelector(`[data-value="${selectedOption.value}"]`)) {
                    // Create a new genre div
                    const genreDiv = document.createElement('div');
                    genreDiv.className = 'selected-genre';
                    genreDiv.textContent = selectedOption.text;
                    genreDiv.dataset.value = selectedOption.value;
                    // Add click event to remove the genre
                    genreDiv.addEventListener('click', function() {
                        genresSelect.querySelector(`option[value="${this.dataset.value}"]`).selected = false;
                        this.remove();
                        updateSelectedGenresInput();
                    });
                    selectedGenresContainer.appendChild(genreDiv); // Thêm vào container
                    updateSelectedGenresInput(); // Cập nhật giá trị của input ẩn
                }
                genresSelect.selectedIndex = 0;
            });

            function updateSelectedGenresInput() {
                const selectedGenres = Array.from(selectedGenresContainer.querySelectorAll('.selected-genre')).map(genreDiv => genreDiv.dataset.value);
                selectedGenresInput.value = selectedGenres.join(',');
            }
            let selectedGenresValue = selectedGenresInput.value;

            genresArray =  selectedGenresValue.split(',');
            genresArray.forEach(function(item){
                const genreDiv = document.createElement('div');
                genreDiv.className = 'selected-genre';
                genreDiv.textContent = item;
                genreDiv.dataset.value = item;
                selectedGenresContainer.appendChild(genreDiv);
                genreDiv.addEventListener('click', function() {
                        genresSelect.querySelector(`option[value="${this.dataset.value}"]`).selected = false;
                        this.remove();
                        updateSelectedGenresInput();
                    });
            });


            @if (session('success'))
                alert('{{ session('success') }}');
            @endif
        });
        $("#createForm").validate();
    </script>
