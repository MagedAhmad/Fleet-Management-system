<?php

return [
    'plural' => 'العضويات',
    'dialogs' => [
        'activate' => [
            'title' => 'توثيق',
            'info' => 'هل أنت متأكد انك تريد توثيق هذا المستخدم ?',
            'confirm' => 'تأكيد',
            'cancel' => 'إلغاء',
        ],
        'inactivate' => [
            'title' => 'إلغاء التوثيق',
            'info' => 'هل أنت متأكد انك تريد إلغاء توثيق هذا المستخدم ?',
            'confirm' => 'تأكيد',
            'cancel' => 'إلغاء',
        ],
    ],
    'messages' => [
        'updated' => 'تم التعديل بنجاح .',
    ],
    'types' => [
        \App\Models\User::ADMIN_TYPE => 'مسئول',
        \App\Models\User::CUSTOMER_TYPE => 'عميل',
    ],
    'impersonate' => [
        'go' => 'الذهاب للوحة التحكم',
        'leave' => 'العودة للحساب السابق',
        'remove' => 'البقاء على هذا الحساب',
    ],
];
