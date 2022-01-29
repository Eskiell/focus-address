<?php


namespace Eskiell\FocusAddress\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
interface States
{
    public function permissions(): BelongsToMany;
}