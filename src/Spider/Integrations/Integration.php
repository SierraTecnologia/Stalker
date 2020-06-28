<?php

namespace Artista\Spider\Integrations;

use Illuminate\Database\Eloquent\Model;
use Log;
use App\Models\User;

use Population\Models\Components\Integrations\Token;

use Artista\Spider\Integrations\Github\Github;
use Artista\Spider\Integrations\Amazon\Amazon;
use Artista\Spider\Integrations\Gitlab\Gitlab;
use Artista\Spider\Integrations\Jira\Jira;
use Artista\Spider\Integrations\Novare\Novare;
use Artista\Spider\Integrations\Pipedrive\Pipedrive;
use Artista\Spider\Integrations\Sentry\Sentry;
use Artista\Spider\Integrations\Testlink\Testlink;
use Artista\Spider\Integrations\Zoho\Zoho;
use Support\Components\Coders\Parser\ParseClass;
use Support\Utils\Debugger\ErrorHelper;
use Population\Models\Components\Integrations\Integration as IntegrationModel;
use ReflectionGenerator;
use Exception;
use Support\Utils\Extratores\ClasserExtractor;

class Integration
{

    protected $_connection = null;

    protected $_token = null;

    private $error = null;

    private $errorCode = null;

    public function __construct($token = false)
    {
        $this->_token = $token;
        $this->_connection = $this->getConnection($this->_token);
    }

    /**
     * Recupera connecção com a integração
     */
    public static function getPrimary()
    {
        return static::$ID;
    }

    /**
     * Recupera connecção com a integração
     */
    protected function getConnection($token = false)
    {
        return $this;
    }

    public function setError($errorMessage, $code = 0)
    {
        $this->error = $errorMessage;
        $this->errorCode = $code;

        
        var_dump($errorMessage);
        throw new \Exception($errorMessage);
    }

    public function getError()
    {
        return $this->error;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Recupera dados em cima de um get de uma api
     */
    public function get($path)
    {
        // @todo Fazer resultar um object em cia de um path
        $url = $this->url.$path;
        $result = [];
        return $result;
    }

    /**
     * Recupera dados em cima de um get de uma api
     */
    public static function getCodeForPrimaryKey()
    {
        $integration = IntegrationModel::createIfNotExistAndReturn(
            [
            'id' => static::$ID,
            'name' => ClasserExtractor::getClassName(static::class),
            'code' => static::class,
            ]
        );
        return $integration->id;
    }
    
    public static function registerAll()
    {
        $realPath = __DIR__.'/';
        
        collect(scandir($realPath))
            ->each(
                function ($item) use ($realPath) {
                    if (in_array($item, ['.', '..'])) { return;
                    }
                    if (is_dir($realPath . $item)) {
                        $modelName = __NAMESPACE__.'\\'.$item.'\\'.$item;
                   
                        IntegrationModel::createIfNotExistAndReturn(
                            [
                            'id' =>  call_user_func(array($modelName, 'getPrimary')),
                            'name' => ClasserExtractor::getClassName($modelName),
                            'code' => $modelName,
                            ]
                        );
                    }

                    if (is_file($realPath . $item) && $item!=='Integration.php') {
                        Log::channel('sitec-finder')->warning(
                            ErrorHelper::tratarMensagem(
                                'Não deveria ter arquivo nessa pasta: '.$realPath . $item
                            )
                        );

                        //@todo Remover
                        try {
                            throw new Exception;
                        } catch(Exception $e) {
                            dd($e->getTrace());
                        }
                    
                    }
                }
            );
    }

}
