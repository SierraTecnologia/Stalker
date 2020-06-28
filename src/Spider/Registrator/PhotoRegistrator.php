<?php
namespace Artista\Spider\Registrator;

use Artista\Contracts\Spider\TargetManager;

use Artista\Models\Digital\Midia\File;
use Artista\Models\Digital\Midia\Imagen;
use Artista\Models\Digital\Internet\ComputerFile;

/**
 * Run all script analysers and outputs their result.
 */
class PhotoRegistrator extends FileRegistrator
{
    protected $photo = false;

    public function __construct($target, $parent = false)
    {
        parent::__construct($target, $parent);
    }

    public function havePerson($code)
    {


        $photo = $this->returnPhoto();

        $person = Person::returnOrCreateByCode($code);
        $photo->persons()->save($person);
    }

    private function returnPhoto()
    {
        if ($this->photo) {
            return $this->photo;
        }

        $md5 = md5($this->getTarget()->getContents());

        if ($this->photo = Imagen::where('location', $md5)->first()) {
            return $this->photo;
        }
        
        $array = [
            'file_id' => $this->returnFile()->id,
            'location' => $md5,
            'name' => $this->getTarget()->getFilename()
        ];

        return $this->photo = Imagen::create($array);
    }
}