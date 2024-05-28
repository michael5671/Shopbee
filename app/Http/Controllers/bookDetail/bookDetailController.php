<?php

namespace App\Http\Controllers\bookDetail;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class bookDetailController extends Controller
{
    public function bookDetail($book_id)
    {
        $books = DB::table('book')
            ->leftJoin('book_image', 'book.BOOK_ID', '=', 'book_image.BOOK_ID')
            ->select('book.*', 'book_image.IMAGE_LINK')
            ->where('book.BOOK_ID', $book_id)
            ->first();

        $booksImage = DB::select("select *
            from book_image
            where book_id = '$book_id'
        ");

        $genreSimilar = DB::table('book_belong')
            ->where('book_belong.BOOK_ID', $book_id)
            ->get();

        $bookSimilar = [];
        foreach ($genreSimilar as $genreSML) {
            $genreName = $genreSML->GENRES_NAME;
            $booksSML = DB::table('book')
            ->join('book_belong', 'book_belong.BOOK_ID', '=', 'book.BOOK_ID')
            ->where('book_belong.GENRES_NAME', $genreName)
            ->where('book.BOOK_ID', '!=', $book_id)
            ->inRandomOrder()
            ->get();

            $bookSimilar = array_merge($bookSimilar, $booksSML->toArray());
        };

        $point = round(DB::table('rating')
        ->where('BOOK_ID', $book_id)
        ->avg('RATING_STAR'),1);
            
        $customerReview = DB::table('rating')
            ->join ('customer', 'rating.customer_id', '=', 'customer.customer_id')
            ->where('rating.BOOK_ID', $book_id)
            ->take(5)
            ->get();

        return view('bookDetail', compact('books','booksImage','bookSimilar','point','customerReview'));
    }
}
