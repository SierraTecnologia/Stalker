<?php

namespace Artista\Console\Commands\Verify;

use File;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use DirectoryIterator;
use Artista\Spider\Registrator\PhotoRegistrator;
use Support\Utils\Extratores\FileExtractor;
use Support\Components\Coders\Parser\ParseClass;

class StorageAndNotImported extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'verify:photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compiles Blade templates into PHP for GNU gettext to be able to parse them';

    /**
     * Call fire function
     *
     * @return void
     */
    public function fire(Filesystem $filesystem)
    {
        return $this->handle($filesystem);
    }

    /**
     * Execute the console command.
     *
     * @param \Illuminate\Filesystem\Filesystem $filesystem
     *
     * @return void
     */
    public function handle(Filesystem $filesystem)
    {
        // Import Data Files
        $dir_path = storage_path('data');
        $dir = new DirectoryIterator($dir_path);
        foreach ($dir as $fileinfo) {
            dd($fileinfo, $fileinfo->isDot());
            if (!$fileinfo->isDot()) {
        
            }
            else {
        
            }
        }
        
        $dir_path = storage_path('midia');
        collect($filesystem->directories($dir_path))->map(
            function ($item) use ($filesystem) {
                $person = $this->getFileName($item);
                collect($filesystem->allFiles($item))->map(
                    function ($file) use ($filesystem, $person) {
                          $registrator = new PhotoRegistrator($file);
                          $registrator->havePerson($person);
                          dd($file, $registrator);
                    }
                );
            }
        );

        // (new \Artista\Routines\Globals\BackupAll)->run();
        (new \Artista\Routines\Globals\ImportTokens)->run();
        
        (new \Artista\Routines\Globals\SpiderAllDomains)->run();
    }
}
