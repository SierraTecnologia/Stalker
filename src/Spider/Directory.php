<?php
namespace Artista\Spider;

use Artista\Logic\Output\AbstractOutput;
use Artista\Logic\Output\Filter\OutputFilterInterface;
use Artista\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Artista\Contracts\Spider\Spider;

use Support\Helps\DebugHelper;

/**
 * Run all script analysers and outputs their result.
 */
class Directory extends Spider
{
    protected $finder = false;

    public function analyse()
    {
        // find all files in the current directory
        DebugHelper::debug('Analisando Pasta: '.$this->getTargetPath());
        $this->followChildrens($this->getFinder());
    }

    public function getFinder($fast = true)
    {

        try {
            if (!$this->finder) {
                $this->finder = new Finder();
                $this->finder->ignoreUnreadableDirs();
                if ($fast) {
                    if (file_exists($this->getTargetPath().'gitignore')) {
                        // excludes files/directories matching the .gitignore patterns
                        $this->finder->ignoreVCSIgnored(true);
                    }
                }
                // Ignorar Recursividade
                $this->finder->depth('== 0');
                // Buscar Pastas e Arquivos
                $this->finder->in($this->getTargetPath());
            }
        } catch (\Symfony\Component\Finder\Exception\DirectoryNotFoundException $e) {
            DebugHelper::warning('Diretório não existe: '. $e->getMessage());
        } catch (Exception $e) {
            DebugHelper::warning('Exceção capturada: '. $e->getMessage());
        }

        return $this->finder;
    }

}