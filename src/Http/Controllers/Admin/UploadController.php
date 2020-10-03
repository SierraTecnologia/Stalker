<?php

namespace Stalker\Http\Controllers\Admin;

use DB;
use Exception;
use Illuminate\Http\Request;
use Session;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.gallery.file_upload');
    }

    public function upload(Request $request)
    {
        $messages = [];
        $validatorFls = new \Stalker\Http\Requests\UploadFotosRequest();
        if (!$validatorFls->validar($request)) {
            $errors = $validatorFls->messages();
            foreach ($errors as $error => $err) {
                array_push($messages, $err[0]);
            }
            return redirect('/')->with(
                'error',
                [
                'message' => $messages
                ]
            );
        }
        
        try {
            $lastAlbInsert = \Stalker\Models\Album::orderBy('alb_id', 'DESC')->withTrashed()->first();
        } catch (\Throwable $th) {
            $lastAlbInsert = \Stalker\Models\Album::orderBy('alb_id', 'DESC')->first();
        }
        DB::beginTransaction();

        try {
            $album = new \Stalker\Models\Album();
            $album->alb_cod = (isset($lastAlbInsert->alb_cod)) ? $lastAlbInsert->alb_cod + 1 : 1;
            $album->alb_titulo = $request['titulo-album'];
            $album->alb_pasta = rand() . '.' .str_replace(' ', '', (\Stalker\DefaultFunctions::tirarAcentos($request['titulo-album'])));
            $album->save();

            $image_capa = $request->file('file-capa');
            $new_name = rand() . '.' . $image_capa->getClientOriginalExtension();
            $image_capa->move(public_path('albuns/'.$album->alb_pasta.'/'), $new_name);

            $capa = new \Stalker\Models\AlbumCapa();
            $capa->albc_alb_cod;
            $capa->albc_alb_cod = $album->alb_cod;
            $capa->albc_img = $new_name;
            $capa->save();

            $images = $request->file('file');
            foreach ($images as $image) {
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('albuns/'.$album->alb_pasta.'/'), $new_name);

                $image = new \Stalker\Models\AlbumFotos();
                $image->albf_alb_cod = $album->alb_cod;
                $image->albf_img = $new_name;
                $image->save();
            }

            DB::commit();
            return redirect('/')->with(
                'success',
                [
                'message' => ['Álbum Criado com sucesso!']
                ]
            );
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/')->with(
                'error',
                [
                'message' => [$e->getMessage()]
                ]
            );
        }
    }
}
