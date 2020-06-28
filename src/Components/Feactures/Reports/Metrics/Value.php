<?php

namespace Artista\Components\Feactures\Reports\Metrics;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Metrics\Value as BaseValue;

abstract class Value extends BaseValue
{
    protected $aggregateBy;

    /**
     * Return a value result showing the growth of a model over a given time frame.
     *
     * @param  \Illuminate\Http\Request                     $request
     * @param  \Illuminate\Database\Eloquent\Builder|string $model
     * @param  string                                       $function
     * @param  string|null                                  $column
     * @return \Laravel\Nova\Metrics\ValueResult
     */
    protected function aggregate($request, $model, $function, $column = null)
    {
        $query = $model instanceof Builder ? $model : (new $model)->newQuery();

        $column = $column ?? $query->getModel()->getQualifiedKeyName();

        $previousValue = round(
            with(clone $query)->whereBetween(
                $this->aggregateBy($query), $this->previousRange($request->range)
            )->{$function}($column), 0
        );

        return $this->result(
            round(
                with(clone $query)->whereBetween(
                    $this->aggregateBy($query), $this->currentRange($request->range)
                )->{$function}($column), 0
            )
        )->previous($previousValue);
    }

    /**
     * @return string
     */
    private function aggregateBy($query): string
    {
        return $this->aggregateBy ?? $query->getModel()->getCreatedAtColumn();
    }
}