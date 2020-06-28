<?php

namespace Artista\Http\Controllers\Track;

use Artista\Services\FinderService;
use Illuminate\Support\Facades\Schema;
use Population\Repositories\PersonRepository;

class PersonController extends Controller
{
    protected $service;

    public function __construct(FinderService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {
        return view('finder::finder.person.home');
    }
}
