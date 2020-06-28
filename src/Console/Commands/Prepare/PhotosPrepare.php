<?php

namespace Artista\Console\Commands\Prepare;

use Illuminate\Console\Command;
use Population\Models\Identity\Actors\Person;
use Artista\Pipelines\Track\PersonTrack;
use Illuminate\Support\Facades\Storage;
use Artista\Models\Digital\Midia\Imagen;

use Support\Utils\Modificators\StringModificator;

class PhotosPrepare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simport:finder:photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar todas as fotos !';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $folder = 'midia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->midiaFinder($this->folder);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function midiaFinder($folder)
    {
        
        // $files = Storage::allFiles($folder);
        // dd(Storage::files($folder));
        // dd(Storage::allFiles($folder));
        $directorys = Storage::directories($folder);

        // dd(
        //     Person::all(),
        //     $directorys
        // );

        foreach ($directorys as $directory) {
            $directoryName = explode('/', $directory);
            $personName = StringModificator::cleanCodeSlug($directoryName[count($directoryName)-1]);

            if ($personName=='git') {
                continue;
            }

            // dd(
            //     $directoryName,
            //     $personName,
            //     StringModificator::cleanCodeSlug($personName)
            // );

            $person = Person::createIfNotExistAndReturn($personName);
            $this->info('[Importing] Importando fotos de usuário '.$person->name);
            $this->importFromFolder($person, $directory);
        }
    }

    /**
     * Tirardaqui @todo
     */
    public function getDisk()
    {
        // @todo usar config
        return \Illuminate\Support\Facades\Config::get('facilitador.storage.disk', \Illuminate\Support\Facades\Config::get('filesystems.default'));
    }

    /**
     * Tirardaqui @todo
     */
    public function importFromFolder(Person $target, string $folder)
    {
        $files = Storage::allFiles($folder);
        // dd('oi', $files);
        foreach ($files as $file) {

            $fileName = explode('/', $file);
            $fileName = $fileName[count($fileName)-1];

            Imagen::createByMediaFromDisk(
                $this->getDisk(),
                $file,
                $target,
                [
                    'name' => $fileName,
                    'fingerprint' => $fileName
                ]
            );

            // $this->count = $this->count + 1;
        }
    }
}
