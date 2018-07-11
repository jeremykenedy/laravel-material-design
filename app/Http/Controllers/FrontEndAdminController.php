<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Services\FrontEndPageFormFields;

use App\Models\FrontEndPage;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontEndAdminController extends Controller
{
    /**
     * Display a listing of the pages.
     */
    public function index()
    {
        $data = [
            'pages' => FrontEndPage::all(),
        ];

        return view('pages.admin.front-end-pages.index')->with($data);
    }

    /**
     * Show the page edit form
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $service = new FrontEndPageFormFields($id);
        $data    = $service->handle();

        return view('pages.admin.front-end-pages.edit')->with($data);
    }

    /**
    * Show the new post form
    */
    public function create()
    {
        $service = new FrontEndPageFormFields();
        $data    = $service->handle();

        // dd($data);
        // return view('admin.post.create', $data);
    }





   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    *
    * @return Response
    */
    public function destroy($id)
    {
        $page = FrontEndPage::findOrFail($id);
        $page->tags()->detach();
        $page->delete();

        return redirect()->route('pages')->with('success', 'Page deleted.');
    }
}
