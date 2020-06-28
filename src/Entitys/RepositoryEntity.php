<?php

namespace Artista\Entitys;


class RepositoryEntity extends EntityAbstract
{
    
    /**
     * Return diretory path
     *
     * @return string
     */
    public function getTargetPath(): string
    {
        return $this->code->getTargetPath();
    }
}