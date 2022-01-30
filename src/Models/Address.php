<?php

namespace Eskiell\FocusAddress\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model implements \Eskiell\FocusAddress\Contracts\Address
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'zipcode_id',
        'number',
        'complement',
        'type'
    ];
    protected $casts = [
        'user_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'zipcode_id' => 'integer',
        'number' => 'integer',
        'complement' => 'string',
        'type' => 'string'
    ];

    public function getTable()
    {
        return config('focus-address.table_names.address', parent::getTable());
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(config('focus-address.models.user'));
    }

    public function zipcode(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(config('focus-address.models.zipcode'), 'id', 'zipcode_id');
    }
}
