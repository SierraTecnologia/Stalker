<?php
namespace Artista\Spider\Traits;

use Support\Helps\DebugHelper;
use Artista\Contracts\Spider\ExtensionManager;

/**
 * Outputs events information to the console.
 *
 * @see TriggerableInterface
 */
trait IdentificadorManagerTrait
{
    protected $extension = false;

    protected function setExtension(ExtensionManager $extension)
    {
        $this->extension = $extension;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function getFile()
    {
        return $this->getExtension()->getFile();
    }

    public function getContents()
    {
        return $this->getExtension()->getContents();
    }

    /**
     * Lógica
     */
    protected function run()
    {
        DebugHelper::debug('Run Identificador '.$this->getFile());
        if ($this->identify()) {
            DebugHelper::info('Arquivo identificado'.$this->getFile());
            $this->collectData();
        }
    }

    protected function doCollect()
    {
        $this->collectData();
    }

    public function collectData()
    {
        // @todo Fazer Aqui
        $this->collectDataEstrutura();
    }
}
