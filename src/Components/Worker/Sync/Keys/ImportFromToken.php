<?php
/**
 * 
 */

namespace Artista\Components\Worker\Sync\Keys;

use SiUtils\Tools\Databases\Mysql\Mysql as MysqlTool;
use Population\Models\Components\Integrations\Token;
use Finder\Spider\Integrations\Sentry\Sentry;
use Finder\Spider\Integrations\Jira\Jira;
use Finder\Spider\Integrations\Gitlab\Gitlab;
use Log;
use Support\Contracts\Runners\ActionInterface;

class ImportFromToken implements ActionInterface
{

    protected $token = false;

    public function __construct(Token $token)
    {
        $this->token = $token;
    }

    public function execute()
    {
        if (!$this->token->account || !$this->token->account->status) {
            return false;
        }
        // dd($this->token->account);
        Log::channel('sitec-finder')->info('Tratando Token .. '.print_r($this->token, true));

        if ($this->token->account->integration_id == Sentry::getCodeForPrimaryKey()) {
            // (new \Finder\Spider\Integrations\Sentry\Import($this->token))->bundle();
        } else if ($this->token->account->integration_id == Jira::getCodeForPrimaryKey()) {
            // (new \Finder\Spider\Integrations\Jira\Import($this->token))->bundle();
        } else if ($this->token->account->integration_id == Gitlab::getCodeForPrimaryKey()) {
            (new \Finder\Spider\Integrations\Gitlab\Import($this->token))->bundle();
        }

        return true;
    }
}
