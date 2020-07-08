<?php

namespace Artista\Http\Controllers;

use Artista\Services\FinderService;
use Illuminate\Support\Facades\Schema;
use Population\Repositories\PersonRepository;
use Artista\Models\Media;

class HomeController extends Controller
{
    protected $service;

    public function __construct(FinderService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {

        // dd($results);
        return view(
            'finder::finder.home'
            // compact('results')
        );
    }

    public function medias()
    {

        $results = Media::all();

        // dd($results);
        return view(
            'finder::components.gallery',
            compact('results')
        );
    }
    public function persons(PersonRepository $personRepo)
    {
        // $orders = $personRepo->getByCustomer(auth()->id())->orderBy('created_at', 'DESC')->paginate(\Illuminate\Support\Facades\Config::get('cms.pagination'));
        $persons = $personRepo->all(); //->paginate(\Illuminate\Support\Facades\Config::get('cms.pagination'));

        return view('finder::finder.persons')->with('persons', $persons);
    }
}
