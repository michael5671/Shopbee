<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;
use App\Models\book_image;
use App\Models\Genre;
class BookController extends Controller
{
    public function create()
    {
        $book = new book();
        $genres = Genre::all();
        $action = "Add Book";
        $actionLink =  route('store') ;
        $selectedGenres ="";
        $imageLinks = ["","",""];
        return view('admin/BookCreate',compact('genres', 'book', 'action', 'actionLink', 'selectedGenres', 'imageLinks'));
    }
    
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'isbn' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:100',
            'release_year' => 'nullable|integer',
            'description' => 'nullable|string|max:700',
            'page_quantity' => 'nullable|integer', 
            'price' => 'required|numeric',
            'image_links.*' => 'nullable|string|max:255',
            'selected-genres' => 'required|string',
        ]);
    
        $book = book::create([
            'NAME' => $request->name,
            'ISBN' => $request->isbn,
            'AUTHOR' => $request->author,
            'LANGUAGE' => $request->language,
            'RELEASE_YEAR' => $request->release_year,
            'DESCRIPTION' => $request->description,
            'PAGE_QUANTITY' => $request->page_quantity,
            'PRICE' => $request->price,
        ]);

        $imageLinks = $request->image_links ?? [];
        foreach ($imageLinks as $link) {
            if (!empty($link)) { // Check if the link is not empty
                $book->images()->create([
                    'IMAGE_LINK' => $link
                ]);     
            }
        }
        $genres = explode(',', $request->input('selected-genres')); 

        return redirect()->back()->with('success', 'Book information added successfully');
    }
        public function index()
        {
            $products = book::with('images')->get();
            return view('admin.BookManagement', compact('products'));
        }

        public function edit($bookId) 
        {
            $book = book::with('images', 'genres')->where('BOOK_ID', $bookId)->firstOrFail();
            
            $actionLink = route('update', $book->BOOK_ID) ;
            $selectedGenres = $book->genres->implode( 'GENRES_NAME', ',');
            $genres = Genre::all();
            $action = "Edit Book";

            $imageLinks = ["","",""];
            for ($x = 0; $x < $book->images->count(); $x++) {
                $imageLinks[$x] = $book->images[$x]->IMAGE_LINK;
            }
            return view('admin/BookCreate', compact('book', 'genres', 'action', 'selectedGenres', 'imageLinks', 'actionLink'));
        }
        
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:100',
                'isbn' => 'nullable|string|max:100',
                'author' => 'nullable|string|max:100',
                'language' => 'nullable|string|max:100',
                'release_year' => 'nullable|integer',
                'description' => 'nullable|string|max:700',
                'page_quantity' => 'nullable|integer', 
                'price' => 'required|numeric',
                'image_links.*' => 'nullable|string|max:255',
                'selected-genres' => 'required|string',
            ]);
        
            $book = book::find($id);

            $book->update([
                'NAME' => $request->name,
                'ISBN' => $request->isbn,
                'AUTHOR' => $request->author,
                'LANGUAGE' => $request->language,
                'RELEASE_YEAR' => $request->release_year,
                'DESCRIPTION' => $request->description,
                'PAGE_QUANTITY' => $request->page_quantity,
                'PRICE' => $request->price,
            ]);
        
            $book->images()->delete(); 
            $imageLinks = $request->image_links ?? [];
            foreach ($imageLinks as $link) {
                if (!empty($link)) { 
                    $book->images()->create([
                        'IMAGE_LINK' => $link
                    ]);     
                }
            }

            $genres = explode(',', $request->input('selected-genres')); 
            $book->genres()->sync($genres); 
        
            return redirect()->back()->with('success', 'Book information updated successfully');
        }

        public function delete($bookId)
        {
            $book = book::find($bookId);
            $book->images()->delete();
            $book->genres()->detach();
            $book->delete();
            return redirect()->back()->with('success', 'Book deleted successfully');
        }
}
