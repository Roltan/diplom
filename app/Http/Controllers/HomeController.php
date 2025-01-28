<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ViewServices;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public  function __construct(
        public ViewServices $viewServices
    ) {}

    public function viewIndex(): View
    {
        $data = $this->viewServices->viewIndex();
        return view('pages.index', $this->convertObjectsToArray($data));
    }
}
