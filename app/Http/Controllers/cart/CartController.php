<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart()
    {

        $user = Auth::user();
        $cart = DB::select('CALL get_cart_items_by_cart_id(?)', [Auth::user()->CART_ID]);;

        $suggestedBooks = $this->getSuggestedBooks($cart);
        return view('cart.index', compact('cart', 'suggestedBooks'));
    }

    public function removeFromCart($itemId)
    {
        $itemId = (int) $itemId;

        DB::delete('DELETE FROM cart_has WHERE book_id = ? AND CART_ID=?', [$itemId,Auth::user()->CART_ID]);


        return response()->json(['success' => 'Data is successfully deleted']);
    }
    private function getSuggestedBooks($cart)
    {
        if (true) {
            $suggestedBooks = Book::inRandomOrder()
                                ->limit(6)
                                ->get();
            return $suggestedBooks;
        }

        $bookIds = $cart->books->pluck('BOOK_ID')->toArray();
        $genres = DB::table('book_belong')
                    ->select('GENRES_NAME')
                    ->whereIn('BOOK_ID', $bookIds)
                    ->pluck('GENRES_NAME')
                    ->toArray();

        $suggestedBooks = Book::whereHas('genres', function($query) use ($genres) {
            $query->whereIn('genres.GENRES_NAME', $genres);
        })
        ->with('images')
        ->whereNotIn('BOOK_ID', $bookIds)
        ->inRandomOrder()
        ->limit(5)
        ->get();

        return $suggestedBooks;
    }

    public function updateCartItem(Request $request, $bookId)
    {
        $cartItem = DB::table('cart_has')->where(['cart_id' => Auth::user()->CART_ID, 'book_id' => $bookId])->first();
        if ($cartItem) {
            $quantity = $request->quantity;
            if ($quantity <= 0) {
                DB::delete('DELETE FROM cart_has WHERE book_id = ? AND CART_ID=?', [$bookId,$cartItem->CART_ID]);
            } else {

                DB::table('cart_has')
                    ->where('BOOK_ID', $cartItem->BOOK_ID)->where('CART_ID', $cartItem->CART_ID)
                    ->update(['QUANTITY' => $quantity]);
            }
            return response()->json(['success' => 'Data is successfully updated']);
        }

        return response()->json(['error' => 'Data is not successfully updated']);

    }
}
