<?php

namespace App\Http\Controllers\bookDetail;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Rating;

class bookDetailCustomerController extends Controller
{
    public function bookDetailCustomer($book_id)
    {
        $customer_id = Auth::id();
        /*==============================INFO================== */
        $book = DB::table('book')
            ->leftJoin('book_image', 'book.BOOK_ID', '=', 'book_image.BOOK_ID')
            ->select('book.*', 'book_image.IMAGE_LINK')
            ->where('book.BOOK_ID', $book_id)
            ->first();

        $customer = DB::table('customer')
            ->where('customer.customer_id', $customer_id)
            ->first();

        /*==============================IMAGE================== */
        $booksImage = DB::table('book_image')
        ->where('book_image.BOOK_ID', $book_id)
        ->limit(4)
        ->get();
        
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
        return view('bookDetail.bookDetailCustomer', compact('book','customer','booksImage','booksSimilar','point','percentages', 'customerReview'));
    }public function bookDetailCustomer1($book_id)
    {
        DB::statement('CALL add_book_to_cart_by_cart_id(?,?,?)', [Auth::user()->CART_ID, $book_id,2]);
        $customer_id = Auth::id();
        /*==============================INFO================== */
        $book = DB::table('book')
            ->leftJoin('book_image', 'book.BOOK_ID', '=', 'book_image.BOOK_ID')
            ->select('book.*', 'book_image.IMAGE_LINK')
            ->where('book.BOOK_ID', $book_id)
            ->first();

        $customer = DB::table('customer')
            ->where('customer.customer_id', $customer_id)
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

        return view('bookDetail.bookDetailCustomer', compact('book','customer','booksImage','booksSimilar','point','percentages', 'customerReview'));
    }

    public function insert_rating(Request $request)
    {
        $request->validate([
            'BOOK_ID' => 'required|integer',
            'CUSTOMER_ID' => 'required|integer',
            'RATING_STAR' => 'required|min:1|max:5',
            'DESCRIPTION' => 'nullable|string',
        ]);

        $rating = new Rating();
        $rating->BOOK_ID = $request->BOOK_ID;
        $rating->CUSTOMER_ID = $request->CUSTOMER_ID;
        $rating->RATING_STAR = $request->RATING_STAR;
        $rating->DESCRIPTION = $request->DESCRIPTION;
        $rating->save();

        return response()->json(['success' => 'Rating inserted successfully!'], 200);
    }

    public function addbook(Request $request){
        DB::statement('CALL add_book_to_cart_by_cart_id(?,?,?)', [Auth::user()->CART_ID,$request->BOOK_ID,$request->COUNT]);

        return redirect()->back();
    }

}
