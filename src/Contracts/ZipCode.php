<?php


namespace Eskiell\FocusAddress\Contracts;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface ZipCode
{
    public function state(): HasOne;

    public function city(): HasOne;
}