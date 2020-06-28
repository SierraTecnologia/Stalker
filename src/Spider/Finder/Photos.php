<?php
namespace Artista\Spider\Finder;

use Artista\Logic\Output\AbstractOutput;
use Artista\Logic\Output\Filter\OutputFilterInterface;
use Artista\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Artista\Contracts\Spider\Spider;

use Support\Helps\DebugHelper;

/**
 * Run all script analysers and outputs their result.
 */
class Photos extends Spider
{

    public function analyse()
    {

        $finder = new Finder();
        
        // Selecionando Diretorio
        $finder->in($this->getTargetPath());


        $finder->files()->name(
            ['*.jpg', '*.png']
        );

        // $finder->files()->contains('sierra');

        DebugHelper::info('Fotos encontradas: '.$finder->count());


        foreach ($finder as $file)
        {


    
            DebugHelper::info("Endereço Completo: ".$file->getRealPath());
            DebugHelper::info("Nome: ".$file->getRelativePathname());

            dd('oi');



            
        }
        // dd($finder);
    }


}