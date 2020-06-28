<?php
namespace Artista\Spider\Traits;

use Support\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 *
 * @see TriggerableInterface
 */
trait ExtensionManagerTrait
{
    protected $file = false;

    protected function setFile($file)
    {
        if (is_string($file)) {
            $this->stringPath = true;
        }
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getContents()
    {
        return $this->getFile()->getContents();
    }

    /**
     * Lógica
     */
    protected function run()
    {
        DebugHelper::debug('Run ExtensionManager '.$this->getFile());
        return $this->identificar();
    }
    protected function identificar()
    {
        if (!isset(static::$identificadores)) {
            return true;
        }

        if (empty(static::$identificadores)) {
            return true;
        }

        foreach (static::$identificadores as $identificador) {
            $identificadorInstance = new $identificador($this);
        }
        return true;
    }
}
