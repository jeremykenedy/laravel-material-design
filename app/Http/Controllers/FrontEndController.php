<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\FrontEndProcesses;
use App\Models\FrontEndPage;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag        = $request->get('tag');
        $service    = new FrontEndProcesses($tag);
        $data       = $service->getResponse();
        $layout     = $tag ? Tag::layout($tag) : 'front-end.pages.index-dynamic';

// dd($data);

        return view($layout, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @param Request $request
     *
     * @return Response
     */
    public function showPage($slug, Request $request)
    {
        $page = FrontEndPage::with('tags')
                                ->whereSlug($slug)
                                ->where('is_draft', 0)
                                ->firstOrFail();
        $tag = $request->get('tag');

        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        $data = compact('page', 'tag', 'slug');

        return view($page->layout, $data);
    }

}
