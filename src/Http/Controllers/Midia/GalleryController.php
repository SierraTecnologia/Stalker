<?php

namespace Stalker\Http\Controllers\Midia;

use Config;
use Stalker\Http\Controllers\Controller;
use Stalker\Repositories\ImageRepository;

class GalleryController extends Controller
{
    protected $repository;
    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('subscription');
    }

    /**
     * Display page list.
     *
     * @return Response
     */
    public function all()
    {
        $images = $this->repository->published();
        $tags = $this->repository->allTags();

        if (empty($images)) {
            abort(404);
        }

        return view('facilitador::midia.gallery.all')
            ->with('tags', $tags)
            ->with('images', $images);
    }

    /**
     * PreviewImage
     *
     * @return Response
     */
    public function imagePreview()
    {
        $images = $this->repository->published();
        $tags = $this->repository->allTags();

        if (empty($images)) {
            abort(404);
        }

        return view('facilitador::midia.gallery.all')
            ->with('tags', $tags)
            ->with('images', $images);
    }

    /**
     * Display the specified Gallery.
     *
     * @param string $url
     *
     * @return Response
     */
    public function show($tag)
    {
        $images = $this->repository->getImagesByTag($tag)->paginate(Config::get('cms.pagination'));
        $tags = $this->repository->allTags();

        if (empty($images)) {
            abort(404);
        }

        return view('facilitador::midia.gallery.show')
            ->with('tags', $tags)
            ->with('images', $images)
            ->with('title', $tag);
    }
}
