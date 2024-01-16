<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $likedItemId, $likedItemType)
    {
        $user = auth()->user();

        $existingLike = $user->likes()
            ->where('liked_item_id', $likedItemId)
            ->where('liked_item_type', $likedItemType)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            $user->likes()->create([
                'liked_item_id' => $likedItemId,
                'liked_item_type' => $likedItemType,
                'like' => true,
            ]);
        }

        return redirect()->back();
    }
}
