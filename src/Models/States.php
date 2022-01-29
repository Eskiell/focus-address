<?php

namespace Eskiell\FocusAddress\Models;

use Eskiell\FocusAddress\Scopes\SortByScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model implements \Eskiell\FocusAddress\Contracts\States
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'initials' => 'string'
    ];
    protected $fillable = [
        'id',
        'name',
        'initials'
    ];
    public function getTable()
    {
        return config('focus-address.table_names.states', parent::getTable());
    }

    public function cities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(config('focus-address.table_names.cities'), 'state_id', 'id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new SortByScope('name', 'ASC'));
    }
}
