<?php

return [
    'skip' => 'Skip to content',
    'login' => 'Login',
    'npo' => 'Lolibrary Inc is a 501(c)(3) non-profit incorporated in the USA.',
    'categories' => 'Categories',
    'recent_items' => 'Recent Items',
    'brands' => 'Brands',
    'back' => 'Back to homepage',
    'profile' => 'Profile',

    'auth' => [
        'verify' => 'Verify Your Email Address',
        'verify_resent' => 'A fresh verification link has been sent to your email address.',
        'check_email' => 'Before proceeding, please check your email for a verification link.',
        'not_recieved' => 'If you did not receive the email',
        'resend' => 'click here to request another',
        'verify_success' => "Your account is now verified!",
        'verify_done' => "You can close this browser tab or go to the homepage.",
        'verify_needed' => 'Verification Needed',
        'verify_txt1' => "You'll need to verify your email before you proceed.",
        'verify_txt2' => "Not got an email yet? Click the button below to resend it.",
        'verify_resend' => 'Resend Email',
        'verify_update' => 'Changes have been saved! Because you updated your email, you will need to verify the new email. A fresh verification link has been sent to your new email address.',

        'update' => 'Changes have been saved!',
        'register' => 'Register',
        'name' => 'Name',
        'username' => 'Username',
        'username_guide' => 'Your username can be lowercase english letters, numbers, hyphens (-) and underscores (_).',
        'email' => 'E-Mail Address',
        'email_txt' => "We'll never share your email with anyone else.",
        'pw' => 'Password',
        'pw_guide' => 'Your password should be at least 12 characters long.',
        'pw_confirm' => 'Confirm Password',
        'remember' => 'Remember Me',
        'forgot_pw' => 'Forgot Your Password?',
        'pw_reset' => 'Reset Password',
        'pw_reset_btn' => 'Send Password Reset Link',
        'pw_no_change' => "Leave this blank if you don't want to change your password.",
        'username_txt' => 'To change your username, <a class="text-info" href="#" data-toggle="tooltip" title="Changing username is not currently supported, sorry!">click here</a>',
        'public_closet' => 'Make closet public?',
        'public_wishlist' => 'Make wishlist public?',
    ],

    'blog' => [
        'anon' => 'Anonymous',
        'by' => 'posted by',
        'read_more' => 'Read More',
        'posts' => 'Blog Posts',
    ],

    'donate' => [
        'title' => 'Donate',
        'txt1' => "Lolibrary is funded entirely by donations from our users, and we're eternally grateful for all the support you give us!",
        'txt2' => "We're a registered non-profit, and all funds will go towards operating costs for Lolibrary, as well as future development. If you'd prefer to <a href=\"https://patreon.com/lolibrary\" target=\"_blank\" rel=\"external\">support us on Patreon</a>, you can go there, too!",
        'patreon' => 'Support us on patreon',
        'other' => 'Alternatively, you can donate using the link below, where you can pay with Card, PayPal or Apple Pay.',
        'npo' => 'Lolibrary is a 501(c)(3) registered non-profit incorporated in the USA; all donations are tax-deductible and our EIN is 81-2942481.',
        'thanks' => 'Thank you for donating to Lolibrary!',
        'thanks_txt' => "It's folks like you who enable us to keep offering the service we do. Thank you!",
        'recurring' => 'Donate regularly?',
        'patreon_txt' => "Patrons on patreon can get extra goodies for donating monthly!",
    ],

    'error' => [
        '401' => "Sorry, this page is off-limits!",
        '404' => "Sorry, the page you are looking for could not be found.",
        '500' => "Sorry, something on our end broke while loading this page.",
        '500_txt' => "We've logged the error and will be looking into it!",
        '503' => "We are doing a little spring cleaning.",
        '503_txt' => "Be right back!",
    ],

    'wishlist' => [
        'added' => 'Added ":item" to your wishlist',
        'removed' => 'Removed ":item" from your wishlist',
        'stargazers' => 'Stargazer|Stargazers',
        'title' => 'Wishlist',
        'owner_title' => ":user's Wishlist",
        'remove' => 'Remove from Wishlist',
        'empty' => 'There are no items in your wishlist.',
        'empty_guest' => "There are no items in :user's wishlist",
        'add' => 'Why not <a href=":link">search for some items to add</a>?',
    ],

    'closet' => [
        'added' => 'Added ":item" to your closet',
        'removed' => 'Removed ":item" from your closet',
        'owners' => 'Owner|Owners',
        'title' => 'Closet',
        'owner_title' => ":user's Closet",
        'remove' => 'Remove from Closet',
        'empty' => 'There are no items in your closet.',
        'empty_guest' => "There are no items in :user's closet",
        'add' => 'Why not <a href=":link">search for some items to add</a>?',
    ],

    'search' => [
        'title' => 'Search',
        'brands' => 'Brands',
        'categories' => 'Categories',
        'tags' => 'Tags',
        'features' => 'Features',
        'colors' => 'Colors',
        'match_type' => 'Match',
        'match_any' => 'Any',
        'match_all' => 'All',
        'match_none' => 'None',
        'error' => 'Something went wrong, please try again later!'
    ],

    'item' => [
        'brand' => 'Brand',
        'category' => 'Category',
        'category_none' => 'No categories recorded!',
        'view' => 'View Item',
        'edit' => 'Edit Item',
        'none' => 'No items found!',
        'suggest' => 'Submit Images/Corrections',
        'info' => 'Item Info',
        'year' => 'Released in <span class="text-regular">:year</span>',
        'year_unknown' => 'Unknown release year',
        'prod_num' => 'Product number: <span class="text-regular">:prod_num</span>',
        'prod_num_unknown' => 'No product number recorded.',
        'price' => 'Originally listed for <span class="text-regular">:price</span>',
        'price_unknown' => 'No listing price recorded.',
        'submitter' => 'Submitted by <span class="text-regular">:submitter</span>',
        'submitter_unknown' => 'Submitted by anonymous',
        'published' => 'Published on',
        'draft' => 'This is a Draft Post',
        'notes' => 'Notes',
        'features' => 'Features',
        'features_help' => 'Features are things commonly found on an item, e.g. ruffles or elasticated linings.',
        'features_none' => 'No features recorded!',
        'colors' => 'Colorways',
        'colors_none' => 'No colors recorded!',
        'tags' => 'Tags',
        'tags_none' => 'No tags recorded!',
        'images' => 'Images',
    ],


    'admin' => [
        'english_name' => 'English Name',
        'foreign_name' => 'Foreign Name',
        'product_number' => 'Product Number',
        'price' => 'Item Price',
        'currency' => 'Currency',
        'help' => [
            'english_name' => "An english or romanized version of this item's name. This will be used to identify the item in the search index.",
            'foreign_name' => "The non-english version of this item's name. Usually the original.",
            'price' => "Values should only be numbers - don't include commas or currency symbols!"
        ]
    ]
];
