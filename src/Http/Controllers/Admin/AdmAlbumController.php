<?php

namespace Stalker\Http\Controllers\Admin;

use DB;
use Exception;
use Illuminate\Http\Request;
use Response;
use Session;

class AdmAlbumController extends Controller
{
    public function index(Request $request)
    {
        $albuns = \App\Models\Album::orderBy('alb_id', 'DESC')->get();
        return view('admin.gallery.albuns', compact('albuns'));
    }

    public function carregarDadosAlbum($id)
    {
        $data = \App\Models\Album::findOrFail($id);
        return Response::json($data);
    }

    public function apagarAlbum($id)
    {
        $album = \App\Models\Album::findOrFail($id);

        DB::beginTransaction();

        try {
            $album->deleted_at = date("Y-m-d H:i:s");
            $album->update();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
