<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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




}
