<?php

namespace App\Http\Controllers;

use App\Fact;
use App\Introduction;
use App\Photo;
use App\Post;
use App\SpecificEvent;
use App\Sponsor;
use App\Team;
use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index(): View
    {
        $introduction = Introduction::query()->first();
        $latestNews = Post::query()->type(['event'])->active()->latest()->limit(6)->get();
        $highlightPosts = Post::query()
            ->type(['event'])
            ->active()
            ->highlight()
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        
        return view('front-end.home', [
            'introduction' => $introduction,
            'latestNews' => $latestNews,
            'highlightPosts' => $highlightPosts,
            'photos' => Photo::all(),
        ]);
    }

    /**
     * Undocumented function
     *
     * @return View
     */
    public function cduStudents(): View
    {
        $posts = Post::query()->active()->type(['competition', 'challenge'])->get();
        
        return view('front-end.post', [
            'posts' => $posts->where('apply_to_object', 1),
            'pageTitle' => 'CDU Students',
            'page' => 'cdu-student',
            'subline' => 'Amazing Challenges / Competition to take part in',
        ]);
    }

    public function secondarySchool(Request $request): View
    {
        $posts = Post::query()->active()->type(['for-school'])->get();
        
        return view('front-end.post', [
            'posts' => $posts,
            'pageTitle' => 'Secondary School',
            'subline' => 'Join the fun: be part of the code fair',
            'bgBanner' => '/assets/images/school.png',
            'bannerHeight' => 380,
        ]);
    }

    public function higherEducation(Request $request): View
    {
        $posts = Post::query()->active()->type(['competition', 'challenge'])->where('apply_to_object', 2)->get();
        
        return view('front-end.post', [
            'posts' => $posts,
            'pageTitle' => 'Higher Education Instuties',
            'subline' => 'Amazing Challenges / Competition to take part in',
        ]);
    }

    public function getIndustry(Request $request): View
    {
        $posts = Post::query()->active()->type(['industry'])->get();
        
        return view('front-end.industry', [
            'posts' => $posts,
            'pageTitle' => 'For Industry',
            'bgBanner' => '/assets/images/bg-industry.png',
            'bannerHeight' => 380,
        ]);
    }

    public function postShow(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            abort('404');
        }

        $currentRoute = \Route::currentRouteName();

        $relatedPosts = Post::where('id', '!=', $post->id)
            ->type([$post->post_type])
            ->active()
            ->when($currentRoute === 'higher-education.detail', function($query) {
                $query->where('apply_to_object', 2);
            })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('front-end.post-detail', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'pageTitle' => ucwords($post->title)
        ]);
    }

    public function event()
    {
        $now = Carbon::now()->format('Y-d-m');
        $posts = Post::query()->active()->type('event')->get();
        
        return view('front-end.post', [
            'posts' => $posts,
            'specificEvent' => SpecificEvent::where('start_on', '>', $now)->first(),
            'pageTitle' => 'Events'
        ]);
    }

    public function aboutUs(): View
    {
        return view('front-end.about-us', [
            'introduction' => Introduction::query()->first(),
            'teams' => Team::query()->orderBy('created_at', 'desc')->get(),
            'feedbacks' => Testimonial::all(),
            'facts' => Fact::all(),
            'pageTitle' => 'About Us'
        ]);
    }
}
