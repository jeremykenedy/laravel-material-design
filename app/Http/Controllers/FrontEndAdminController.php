<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Services\FrontEndPageFormFields;

use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageUpdateRequest;



use App\Models\FrontEndPage;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontEndAdminController extends Controller
{
    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pages' => FrontEndPage::all(),
        ];

        return view('pages.admin.front-end-pages.index')->with($data);
    }

    /**
    * Show the new page form
    */
    public function create()
    {
        $service = new FrontEndPageFormFields();
        $data    = $service->handle();

        return view('pages.admin.front-end-pages.create', $data);
    }

    /**
     * Store a newly created page
     *
     * @param PageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PageCreateRequest $request)
    {
        $page = FrontEndPage::create($request->pageFillData());
        $page->syncTags($request->get('tags', []));

        return redirect()->route('pages')->withSuccess('New Page Successfully Created.');
    }

    /**
     * Show the page edit form
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = new FrontEndPageFormFields($id);
        $data    = $service->handle();

        return view('pages.admin.front-end-pages.edit')->with($data);
    }

    /**
     * Update the Page
     *
     * @param PageUpdateRequest $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        $page = FrontEndPage::findOrFail($id);
        $page->fill($request->pageFillData());
        $page->save();
        $page->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()->back()->with('success', 'Page saved.');
        }

        return redirect()->route('pages')->with('success', 'Page saved.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = FrontEndPage::findOrFail($id);
        $page->tags()->detach();
        $page->delete();

        return redirect()->route('pages')->with('success', 'Page deleted.');
    }
}
