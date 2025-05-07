<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Service;

class ReviewController extends Controller
{
    public function providerReviewList()
    {
        $servicesIds = Service::where('user_id', auth()->user()->id)->pluck('id');
        $reviews     = Review::whereIn('service_id', $servicesIds)->get();
        return view('provider.pages.review.index', compact('reviews'));
    }
}
