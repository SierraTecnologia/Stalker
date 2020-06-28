<?php
/**
 * Serviço referente a linha no banco de dados
 */

namespace Artista\Services\Finders;


abstract class FinderAbstractService
{
    protected function mergeWith(...$collections)
    {
        $collectionMerged = collect([]);
        foreach ($collections as $collection) {
            $collectionMerged = $collectionMerged->merge($collection);
        }
        return $acc; // $merged->all();
    }

} 