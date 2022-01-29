<?php
return [
    'models' => [
        'states' => Eskiell\FocusAddress\Models\States::class,
        'cities' => Eskiell\FocusAddress\Models\Cities::class,
        'zipcode' => Eskiell\FocusAddress\Models\ZipCode::class,
        'address' => Eskiell\FocusAddress\Models\Address::class,
        'user' => config('auth.providers.users.model')
    ],
    'table_names' => [
        'states' => 'states',
        'cities' => 'cities',
        'zipcode' => 'zipcode',
        'address' => 'address',
        'users' => 'users',
    ],
];