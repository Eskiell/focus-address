<?php

namespace Eskiell\FocusAddress\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\hasOne;

interface Address
{
    public function user(): BelongsTo;

    public function zipcode(): hasOne;
}