<?php


namespace Eskiell\FocusAddress\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
interface Cities
{
    public function permissions(): BelongsToMany;
}