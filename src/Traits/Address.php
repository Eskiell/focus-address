<?php


namespace Eskiell\FocusAddress\Traits;
trait Address
{
    public function address()
    {
        return $this->hasMany(config('focus-address.models.address'));
    }
}