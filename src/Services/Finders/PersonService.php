<?php
/**
 * Serviço referente a linha no banco de dados
 */

namespace Artista\Services\Finders;

/**
 * 
 */
class PersonService extends FinderAbstractService
{

    protected $config;

    protected $modelServices = false;

    public function __construct($config = false)
    {
        // if (!$this->config = $config) {
        //     $this->config = \Illuminate\Support\Facades\Config::get('sitec.sitec.models');
        // }
    }

    public function aboutBody($config = false)
    {
        return $this->mergeWith(
            $this->getPerson()->pircings()->get(),
            $this->getPerson()->pintinhas()->get(),
            $this->getPerson()->tatuages()->get()
        );
    }

    public function aboutLikes($config = false)
    {
        return $this->mergeWith(
            $this->getPerson()->pircings()->get(),
            $this->getPerson()->pintinhas()->get(),
            $this->getPerson()->tatuages()->get()
        );
    }
    

    public function aboutPersonagens($config = false)
    {
        return $this->mergeWith(
            $this->getPerson()->productions()->get(),
            $this->getPerson()->personagens()->get() 
        );
    }
    

    /**
     * Localizar
     */
    public function aboutLocals($config = false)
    {
        return $this->mergeWith(
            $this->getPerson()->accounts()->get(),
            $this->getPerson()->phones()->get(),
            $this->getPerson()->emails()->get(),
            $this->getPerson()->addresses()->get(),
            $this->getPerson()->sitios()->get()
        );
    }
    
    /**
     * ORganizacao
     */

    public function aboutSenhas($config = false)
    {
            return $this->mergeWith(
                $this->getPerson()->passwords()->get()
            );
            
    }

    public function aboutInfo($config = false)
    {
            return $this->mergeWith(
                $this->getPerson()->infos()->get(),
                $this->getPerson()->fatos()->get()
            );
            
    }
    public function aboutMidias($config = false)
    {
        return $this->mergeWith(
            $this->getPerson()->videos()->get(),
            $this->getPerson()->imagens()->get()
        );
            
    }


}
