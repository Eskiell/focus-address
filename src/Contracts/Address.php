<?php
namespace Eskiell\FocusAddress\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Permission
{
    public function roles(): BelongsToMany;
}