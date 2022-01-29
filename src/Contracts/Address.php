<?php
namespace Eskiell\FocusAddress\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface Address
{
    public function user(): BelongsTo;
}