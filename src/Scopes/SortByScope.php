<?php
namespace Eskiell\FocusAddress\Scopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SortByScope implements Scope
{

    /**
     * @var mixed|string
     */
    private mixed $direction;
    private mixed $column;

    public function __construct($column, $direction = 'DESC')
    {
        $this->direction = $direction;
        $this->column = $column;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy($this->column, $this->direction);
    }
}
