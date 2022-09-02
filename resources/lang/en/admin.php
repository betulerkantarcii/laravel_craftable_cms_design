<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'platform' => [
        'title' => 'Platform',

        'actions' => [
            'index' => 'Platform',
            'create' => 'New Platform',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'title' => 'Title',
            'link' => 'Link',
            
        ],
    ],

    'design' => [
        'title' => 'Design',

        'actions' => [
            'index' => 'Design',
            'create' => 'New Design',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'title' => 'Title',
            'link' => 'Link',
            
        ],
    ],

    'pricing' => [
        'title' => 'Pricing',

        'actions' => [
            'index' => 'Pricing',
            'create' => 'New Pricing',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'title' => 'Title',
            'link' => 'Link',
            
        ],
    ],



    'logo' => [
        'title' => 'Logo',

        'actions' => [
            'index' => 'Logo',
            'create' => 'New Logo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'link' => 'Link',
            'enabled' => 'Enabled',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];