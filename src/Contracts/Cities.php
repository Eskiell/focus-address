<?php


namespace Eskiell\FocusAddress\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
interface Cities
{
    public function state(): BelongsTo;
}