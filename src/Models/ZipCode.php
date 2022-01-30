<?php

namespace Eskiell\FocusAddress\Models;

use Eskiell\FocusAddress\Scopes\SortByScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model implements \Eskiell\FocusAddress\Contracts\ZipCode
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'integer',
        'cod' => 'integer',
        'street' => 'string',
        'neighborhood' => 'string',
        'city_id' => 'integer',
        'state_id' => 'integer',
    ];
    protected $fillable = [
        'id',
        'cod',
        'street',
        'neighborhood',
        'city_id',
        'state_id'
    ];
    protected $hidden = ['city_id', 'state_id'];

    public function getTable()
    {
        return config('focus-address.table_names.zipcode', parent::getTable());
    }

    protected static function booted()
    {
        static::addGlobalScope(new SortByScope('street', 'ASC'));
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(config('focus-address.models.states'), 'id', 'state_id');
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(config('focus-address.models.cities'), 'id', 'city_id');
    }
}
