<?php

namespace Artista\Console\Commands\Prepare;

use Illuminate\Console\Command;
use Population\Models\Identity\Actors\Person;
use Finder\Pipelines\Track\PersonTrack;
use Illuminate\Support\Facades\Storage;
use Finder\Models\Digital\Midia\Imagen;

use Rap2hpoutre\FastExcel\FastExcel;

use Finder\Pipelines\Identify\RespectiveModel;

use Support\Utils\Extratores\FileExtractor;
use Support\Utils\Extratores\StringExtractor;
use Support\Utils\Modificators\StringModificator;

class ExcelPrepare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simport:finder:excell';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar a porra toda !';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $folder = 'import';

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
        $this->importFromFolder($this->folder);
    }

    /**
     * Tirardaqui
     */
    public function importFromFolder($folder)
    {
        $files = Storage::allFiles($folder);
        foreach ($files as $file) {

            $fileName = FileExtractor::getFileName($file);
            $assuntosDaPasta = FileExtractor::returnFoldersInarray($file, $folder);

            $collection = (new FastExcel)->configureCsv(';', '#', '\n', 'gbk') //, 'gbk'
            // $collections = (new FastExcel)
            ->import(
                storage_path('app/'.$file),
                function ($line) use ($fileName, $assuntosDaPasta) {
                    $modelClass = RespectiveModel::run(
                        $assuntosDaPasta,
                        $fileName
                    );

                    if (!$modelClass) {
                        $this->info('Ignorando importação de '.$fileName);
                        return ;
                    }

                    $this->info('Importing '.$fileName.' p/ classe '.$modelClass);
                    return call_user_func(
                        $modelClass.'::importFromArray',
                        $line
                    );
                }
            );

            // Imagen::createByMediaFromDisk(
            //     $this->getDisk(),
            //     $file,
            //     $target,
            //     [
            //         'name' => $fileName,
            //         'fingerprint' => $fileName
            //     ]
            // );

            // $this->count = $this->count + 1;
        }
    }


    // $name = $this->ask('Enter the admin name');
    // $password = $this->secret('Enter admin password');
    // $confirmPassword = $this->secret('Confirm Password');

    // // Ask for email if there wasnt set one
    // if (!$email) {
    //     $email = $this->ask('Enter the admin email');
    // }

    // // Passwords don't match
    // if ($password != $confirmPassword) {
    //     $this->info("Passwords don't match");

    //     return;
    // }

    // $this->info('Creating admin account');


}
