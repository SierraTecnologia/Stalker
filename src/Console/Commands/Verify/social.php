<?php

namespace Artista\Console\Commands\Verify;

use Finder\Actions\Instagram\GetMidias;
use Population\Models\Identity\Digital\Account;
use App\Models\Negocios\Business;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Plugins\Integrations\PhotoAcompanhante\Import;

class Social extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitec:verify:social';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
        
        $account = Account::where('username', 'ricardorsierra')->first();

        $business = Business::all();
        $accounts = Account::all();



        $bot = (new GetMidias($account))->prepare('carollnovais')->execute();
        $bot = (new GetStories($account))->prepare('carollnovais')->execute();
        $bot = (new GetFollowers($account))->prepare('carollnovais')->execute();
    }
}
