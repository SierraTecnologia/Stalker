<?php

namespace Artista\Console\Commands\Prepare;

use Illuminate\Console\Command;
use Population\Models\Identity\Actors\Person;
use Artista\Pipelines\Track\PersonTrack;
use Illuminate\Support\Facades\Storage;
use Artista\Models\Digital\Midia\Imagen;

class Export extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siexport:finder:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exportar a porra toda !';

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
        $folder = 'import';
        $this->export($folder);
    }

    /**
     * Tirardaqui
     */
    public function export($folder)
    {
        
    }
}

/**
 * Export a Model to .xlsx file:

use Rap2hpoutre\FastExcel\FastExcel;
use App\User;

// Load users
$users = User::all();

// Export all users
(new FastExcel($users))->export('file.xlsx');
 * 
 * 
 * Export
Export a Model or a Collection:

$list = collect([
    [ 'id' => 1, 'name' => 'Jane' ],
    [ 'id' => 2, 'name' => 'John' ],
]);

(new FastExcel($list))->export('file.xlsx');
Export xlsx, ods and csv:

$invoices = App\Invoice::orderBy('created_at', 'DESC')->get();
(new FastExcel($invoices))->export('invoices.csv');
Export only some attributes specifying columns names:

(new FastExcel(User::all()))->export('users.csv', function ($user) {
    return [
        'Email' => $user->email,
        'First Name' => $user->firstname,
        'Last Name' => strtoupper($user->lastname),
    ];
});
Download (from a controller method):

return (new FastExcel(User::all()))->download('file.xlsx');
Import
import returns a Collection:

$collection = (new FastExcel)->import('file.xlsx');
Import a csv with specific delimiter, enclosure characters and "gbk" encoding:

$collection = (new FastExcel)->configureCsv(';', '#', '\n', 'gbk')->import('file.csv');
Import and insert to database:

$users = (new FastExcel)->import('file.xlsx', function ($line) {
    return User::create([
        'name' => $line['Name'],
        'email' => $line['Email']
    ]);
});
Facades
You may use FastExcel with the optional Facade. Add the following line to config/app.php under the aliases key.

'FastExcel' => Rap2hpoutre\FastExcel\Facades\FastExcel::class,
Using the Facade, you will not have access to the constructor. You may set your export data using the data method.

$list = collect([
    [ 'id' => 1, 'name' => 'Jane' ],
    [ 'id' => 2, 'name' => 'John' ],
]);

FastExcel::data($list)->export('file.xlsx');
Global helper
FastExcel provides a convenient global helper to quickly instantiate the FastExcel class anywhere in a Laravel application.

$collection = fastexcel()->import('file.xlsx');
fastexcel($collection)->export('file.xlsx');
Advanced usage
Export multiple sheets
Export multiple sheets by creating a SheetCollection:

$sheets = new SheetCollection([
    User::all(),
    Project::all()
]);
(new FastExcel($sheets))->export('file.xlsx');
Use index to specify sheet name:

$sheets = new SheetCollection([
    'Users' => User::all(),
    'Second sheet' => Project::all()
]);
Import multiple sheets
Import multiple sheets by using importSheets:

$sheets = (new FastExcel)->importSheets('file.xlsx');
You can also import a specific sheet by its number:

$users = (new FastExcel)->sheet(3)->import('file.xlsx');
Export large collections with chunk
Export rows one by one to avoid memory_limit issues using yield:

function usersGenerator() {
    foreach (User::cursor() as $user) {
        yield $user;
    }
}

// Export consumes only a few MB, even with 10M+ rows.
(new FastExcel(usersGenerator()))->export('test.xlsx');
 */
