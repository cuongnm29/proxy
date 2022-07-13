<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'category'        => [
        'title'          => 'Category',
        'title_singular' => 'Category',
        'title_selection' => 'Select Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'status'             => 'Status',
            'status_helper'      => '',
            'type'             => 'Type',
            'type_helper'      => '',
            'order'             => 'Order',
            'order_helper'      => '',
            'menu'             => 'Menu',
            'menu_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'country'           => [
        'title'          => 'Country',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'server'                     => 'Server',
            'server_helper'              => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'code'                     => 'Code',
            'code_helper'              => '',
            'order'                     => 'Order',
            'order_helper'              => '',
            'status'                     => 'Status',
            'status_helper'              => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'coupon'           => [
        'title'          => 'Coupon',
        'title_singular' => 'Coupon',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'percent'                     => 'Percent',
            'percent_helper'              => '',
            'status'                     => 'Status',
            'status_helper'              => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'ipaddress'           => [
        'title'          => 'IpAddress',
        'title_singular' => 'IpAddress',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'ipName'                  => 'Name',
            'ipName_helper'           => '',
            'expired'                  => 'Time Expried',
            'expired_helper'           => '',
            'country'                  => 'Country Name',
            'country_helper'           => '',
            'server'                  => 'Server Name',
            'server_helper'           => '',
            'remain'                  => 'Time Remain',
            'remain_helper'           => '',
            'status'                   => 'Status',
            'status_helper'            => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'member'           => [
        'title'          => 'Member',
        'title_singular' => 'Member',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'username'                  => 'UserName',
            'username_helper'           => '',
            'password'                     => 'Password',
            'password_helper'              => '',
            'email'                  => 'Email',
            'email_helper'           => '',
            'status'                   => 'Status',
            'status_helper'            => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'order'           => [
        'title'          => 'Order',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'server'                   => 'Server',
            'server_helper'            => '',
            'services'                 => 'Services',
            'services_helper'          => '',
            'coupon'                   => 'Coupon',
            'coupon_helper'            => '',
            'qty'                      => 'Quantity',
            'qty_helper'               => '',
            'status'                   => 'Status',
            'status_helper'            => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'payment'           => [
        'title'          => 'Payment',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'money'                    => 'Money',
            'money_helper'             => '',
            'code'                     => 'Code',
            'code_helper'              => '',
            'method'                   => 'Method',
            'method_helper'            => '',
            'status'                   => 'Status',
            'status_helper'            => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'post'           => [
        'title'          => 'Post',
        'title_singular' => 'Post',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'title'                    => 'Title',
            'title_helper'             => '',
            'content'                  => 'Content',
            'content_helper'           => '',
            'images'                   => 'Images',
            'images_helper'            => '',
            'status'                   => 'Status',
            'status_helper'            => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'server'           => [
        'title'          => 'Server',
        'title_singular' => 'Server',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'service'                    => 'Service',
            'service_helper'             => '',
            'time'                      => 'Time',
            'time_helper'               => '',
            'name'                      => 'Name',
            'name_helper'               => '',
            'order'                   => 'Order',
            'order_helper'            => '',
            'status'                   => 'Status',
            'status_helper'            => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'service'           => [
        'title'          => 'Services',
        'title_singular' => 'Services',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'description'              => 'Description',
            'description_helper'       => '',
            'content'                  => 'Content',
            'content_helper'           => '',
            'icon'                     => 'Icon',
            'icon_helper'              => '',
            'time'                     => 'Time',
            'time_helper'              => '',
            'order'                    => 'Order',
            'order_helper'             => '',
            'status'                   => 'Status',
            'status_helper'            => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'setting'           => [
        'title'          => 'Setting',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'logo'                     => 'Name',
            'logo_helper'              => '',
            'contact'                  => 'Description',
            'contact_helper'           => '',
            'bankname'                 => 'Bank Name',
            'bankname_helper'          => '',
            'banknumber'               => 'Bank Number',
            'banknumber_helper'        => '',
            'bankowner'                => 'Bank Owner',
            'bankowner_helper'         => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
];
