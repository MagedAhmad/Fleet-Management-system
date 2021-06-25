<?php

return [
    'plural' => 'Accounts',
    'dialogs' => [
        'activate' => [
            'title' => 'Confirmation !',
            'info' => 'Are you sure you want to activate this user?',
            'confirm' => 'Confirm',
            'cancel' => 'Cancel',
        ],
        'inactivate' => [
            'title' => 'Remove Confirmation !',
            'info' => 'Are you sure you want to remove activation of this user?',
            'confirm' => 'Confirm',
            'cancel' => 'Cancel',
        ],
    ],
    'messages' => [
        'updated' => 'Updated Successfully',
    ],
    'types' => [
        \App\Models\User::ADMIN_TYPE => 'Admin',
        \App\Models\User::CUSTOMER_TYPE => 'Customer',
    ],
];
