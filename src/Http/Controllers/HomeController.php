<?php

namespace Stalker\Http\Controllers;

use Stalker\Services\StalkerService;
use Illuminate\Support\Facades\Schema;
use Population\Repositories\PersonRepository;
use Stalker\Models\Media;

class HomeController extends Controller
{
    protected $service;

    public function __construct(StalkerService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {

        // dd($results);
        return view(
            'stalker::stalker.home'
            // compact('results')
        );
    }

    public function medias()
    {

        $results = Media::all();

        // dd($results);
        return view(
            'stalker::components.gallery',
            compact('results')
        );
    }
    public function persons(PersonRepository $personRepo)
    {
        // $orders = $personRepo->getByCustomer(auth()->id())->orderBy('created_at', 'DESC')->paginate(\Illuminate\Support\Facades\Config::get('cms.pagination'));
        $persons = $personRepo->all(); //->paginate(\Illuminate\Support\Facades\Config::get('cms.pagination'));

        return view('stalker::stalker.persons')->with('persons', $persons);
    }
}
