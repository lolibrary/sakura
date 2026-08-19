<?php

return [
    'global' => [
        'slug' => 'Slug',
        'name' => 'Name',
        'value' => 'Value',
    ],

    'item' => [
        'title' => 'Entry|Entries',
        'empty' => 'No entries found!',

        'english_name' => 'English Name',
        'english_name_help' => 'The english name of this entry.',

        'foreign_name' => 'Original Name',
        'foreign_name_help' => 'The original/native-language name of this entry.',

        'brand_help' => 'The brand of this entry, e.g. Angelic Pretty.',

        'slug' => 'Slug',
        'slug_help' => 'The url to this entry, items/{slug}. Cannot be changed.',

        'metadata' => 'Metadata',

        'product_number' => 'Product Number',
        'product_number_help' => 'The original product number, if known.',

        'year' => 'Year',
        'year_help' => 'The year of release, if known.',
        'year_unknown' => 'Unknown',

        'currency' => 'Currency',
        'currency_help' => '',
        'currency_unknown' => 'Unknown',

        'price' => 'Price',
        'price_help' => 'Item price - enter 0 if the item is free.',

        'relationships' => 'Relationships',

        'image' => [
            'main' => 'Main Image',
            'additional' => 'Additional Images',
        ],

        'notes' => 'Notes',
        'internal_notes' => 'Internal Notes',

        'actions' => [
            'publish' => 'Publish',
            'unpublish' => 'Unpublish',
            'mark-as-draft' => 'Mark as Draft',
            'ready-for-review' => 'Ready for Review',
            'request-changes' => 'Request Changes',
        ],

        'status' => [
            'published' => 'Published',
            'draft' => 'Draft',
            'ready-for-review' => 'Ready for Review',
            'changes-requested' => 'Changes Requested',
        ],
    ],

    'attribute' => [
        'title' => 'Attribute|Attributes',
        'empty' => 'No attributes found!',

        'attribute' => 'Attribute',
    ],

    'brand' => [
        'title' => 'Brand|Brands',
        'empty' => 'No brands found!',

        'image' => 'Brand Image',
    ],

    'category' => [
        'title' => 'Category|Categories',
        'empty' => 'No categories found!',

        'image' => 'Category Image',
    ],

    'color' => [
        'title' => 'Colorway|Colorways',
        'empty' => 'No colorways found!',
    ],

    'feature' => [
        'title' => 'Feature|Features',
        'empty' => 'No features found!',
    ],

    'tag' => [
        'title' => 'Tag|Tags',
        'empty' => 'No tags found!',
    ],

    'user' => [
        'title' => 'User|Users',
        'empty' => 'No users found!',

        'email' => 'E-Mail Address',
        'name' => 'Display Name',
        'username' => 'Username',
        'password' => 'Password',
        'avatar' => 'Avatar',
        'profile' => 'Profile',

        'level' => [
            'developer' => 'Developer',
            'admin' => 'Administrator',
            'trusted' => 'Trusted Lolibrarian',
            'senior' => 'Senior Lolibrarian',
            'lolibrarian' => 'Lolibrarian',
            'junior' => 'Junior Lolibrarian',
            'regular' => 'Regular',
            'banned' => 'Banned',
        ],

        'actions' => [
            'reset-password' => 'Reset Password',
            'resend-verification' => 'Resend Verification',
        ],
    ],

    'comment' => [
        'title' => 'Comment|Comments',

        'message' => 'Message',
        'hide' => 'Hide this comment from the user?',
        'report' => 'Report this comment',
        'send' => 'Send',
    ],

    'queue' => [
        'title' => 'My Queue',
        'published-items' => 'Published Entries',
        'drafts' => 'Drafts',
        'ready-for-review' => 'Ready for Review',
        'changes-requested' => 'Changes Requested',
    ],

    'settings' => [
        'title' => 'Settings',
        'language' => 'Language',
    ],

    'notifications' => [
        'title' => 'Notifications',

        'publish' => [
            'actor' => [
                'title' => 'Entry published!',
                'body' => 'Entry :name was published to the site.',
            ],
            'target' => [
                'title' => 'Your entry was published!',
                'body' => 'Your submission :name was published to the site.',
            ],
        ],

        'unpublish' => [
            'actor' => [
                'title' => 'Entry removed from the site',
                'body' => 'Entry :name was unpublished.',
            ],
            'target' => [
                'title' => 'Your entry was removed from the site.',
                'body' => 'Your submission :name was unpublished.',
            ],
        ],

        'mark-as-draft' => [
            'actor' => [
                'title' => 'You marked an entry as a draft.',
                'body' => 'Entry :name updated.',
            ],
            'target' => [
                'title' => 'Your entry was marked as a draft.',
                'body' => 'Entry :name updated.',
            ],
        ],

        'ready-for-review' => [
            'actor' => [
                'title' => 'You marked an entry ready for review.',
                'body' => 'Entry :name updated.',
            ],
            'target' => [
                'title' => 'Your entry was marked ready for review.',
                'body' => 'Entry :name updated.',
            ],
        ],

        'request-changes' => [
            'actor' => [
                'title' => 'You requested changes on an entry',
                'body' => 'Entry :name updated.',
            ],
            'target' => [
                'title' => 'Your entry needs some changes.',
                'body' => 'Your submission :name was reviewed.',
            ],
        ],
    ],
];
