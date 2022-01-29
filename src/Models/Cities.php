<?php

namespace Eskiell\FocusAddress\Models;


use Eskiell\FocusAddress\Scopes\SortByScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model implements \Eskiell\FocusAddress\Contracts\Cities
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'state_id' => 'integer'
    ];
    protected $fillable = [
        'id',
        'name',
        'state_id'
    ];

    public function getTable()
    {
        return config('focus-address.table_names.cities', parent::getTable());
    }

    protected static function booted()
    {
        static::addGlobalScope(new SortByScope('name', 'ASC'));
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(config('focus-address.table_names.states'), 'state_id', 'id');
    }
}
