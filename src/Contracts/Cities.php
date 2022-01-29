<?php


namespace Eskiell\FocusAddress\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
interface Role
{
    public function permissions(): BelongsToMany;
}