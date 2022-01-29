<?php


namespace Eskiell\FocusAddress\Contracts;
use Illuminate\Database\Eloquent\Relations\HasMany;
interface States
{
    public function cities(): HasMany;
}