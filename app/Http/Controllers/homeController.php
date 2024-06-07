<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $genres = DB::table('genres')->orderBy('genres_name','asc')->get();

        $books = [];
        for ($i = 0; $i < count($genres); $i++) {
            $genreName = DB::table('genres')->select('GENRES_NAME')->orderBy('genres_name','asc')->offset($i)->limit(1)->value('GENRES_NAME');

                $books[$i] = DB::table('book')
                                ->leftJoin('book_image', 'book_image.book_id', '=', 'book.book_id')
                                ->join('book_belong', 'book.book_id', '=', 'book_belong.book_id')
                                ->where('book_belong.genres_name', $genreName)
                                ->groupBy('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE')
                                ->select('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE', DB::raw('MIN(book_image.IMAGE_LINK) AS IMAGE_LINK'))
                                ->limit(8)
                                ->get();
            }

        $booksHotSale = DB::table('book')
                            ->leftJoin('book_image', 'book_image.book_id', '=', 'book.book_id')
                            ->join(DB::raw('(SELECT BOOK_ID FROM ORDER_ITEM GROUP BY BOOK_ID ORDER BY SUM(QUANTITY) DESC LIMIT 4) as top_books'), 'book.BOOK_ID', '=', 'top_books.BOOK_ID')
                            ->groupBy('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE')
                            ->select('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE', DB::raw('MIN(book_image.IMAGE_LINK) AS IMAGE_LINK'))
                            ->get();

        $booksLastest = DB::table('book')
                            ->leftjoin('book_image', 'book_image.book_id', '=', 'book.book_id')
                            ->groupBy('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE')
                            ->orderByDesc('book.BOOK_ID')
                            ->select('book.BOOK_ID', 'book.NAME', 'book.AUTHOR', 'book.PRICE', DB::raw('MIN(book_image.IMAGE_LINK) AS IMAGE_LINK'))
                            ->limit(4)
                            ->get();
        return view('home', compact('genres', 'booksLastest','booksHotSale','books'));
    }
}

