<?php

namespace Eskiell\FocusAddress;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Eskiell\FocusAddress\Skeleton\SkeletonClass
 */
class FocusAddressFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'focus-address';
    }
}
