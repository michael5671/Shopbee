<?php

namespace App\Http\Controllers\bookDetail;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\bookDetail\bookDetailCustomerController;

class bookDetailController extends Controller
{
    public function index($book_id){
        if(Auth::check()){
            return redirect()->route('book.detail.user',$book_id);

        }
        return redirect()->route('book.detail.guest',$book_id);

    }
    public function bookDetail($book_id)
    {
        /*==============================INFO================== */
        $books = DB::table('book')
            ->leftJoin('book_image', 'book.BOOK_ID', '=', 'book_image.BOOK_ID')
            ->select('book.*', 'book_image.IMAGE_LINK')
            ->where('book.BOOK_ID', $book_id)
            ->first();
        /*==============================IMAGE================== */
        $booksImage = DB::select("select *
            from book_image
            where book_id = '$book_id'
        ");


        /*==============================BOOK SIMILAR================== */
        $genresSimilar = DB::table('book_belong')
            ->where('BOOK_ID', '=', $book_id)
            ->pluck('GENRES_NAME')
            ->toArray(); // Chuyển đổi Collection thành một mảng

        $booksSimilar = DB::table('book')
                ->leftJoin('book_image', 'book_image.book_id', '=', 'book.book_id')
                ->join('book_belong', 'book_belong.book_id', '=', 'book.book_id')
                ->whereIn('book_belong.GENRES_NAME', $genresSimilar) // Sử dụng whereIn() thay vì chỉ so sánh với một giá trị
                ->groupBy('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE')
                ->select('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE', DB::raw('MIN(book_image.IMAGE_LINK) AS IMAGE_LINK'))
                ->limit(5)
                ->get();

        /*==============================POINT================== */
        $point = round(DB::table('rating')
        ->where('BOOK_ID', $book_id)
        ->avg('RATING_STAR'),1);


        /*==============================STARS================== */
        $totalStar = DB::table('rating')
        ->where('BOOK_ID', $book_id)
        ->count();

        $starCounts = DB::table('rating')
            ->select('RATING_STAR', DB::raw('count(*) as count'))
            ->where('BOOK_ID', $book_id)
            ->groupBy('RATING_STAR')
            ->pluck('count', 'RATING_STAR')
            ->all();

        $percentages = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = isset($starCounts[$i]) ? $starCounts[$i] : 0;
            $percentages["{$i}"] = ($totalStar > 0) ? round(($count / $totalStar) * 100) : 0;
        }

        /*==============================REVIEW================== */
        $customerReview = DB::table('rating')
            ->join ('customer', 'rating.customer_id', '=', 'customer.customer_id')
            ->where('rating.BOOK_ID', $book_id)
            ->orderBy('rating.rating_id', 'desc')
            ->take(5)
            ->get();

        return view('bookDetail.bookDetail', compact('books','booksImage','booksSimilar','point','percentages', 'customerReview'));
    }
}
