<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your pages, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Bootstrap Italia',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo / tagline / owner
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your pages.
    | You can use basic HTML here if you want. The logo has also a tagline,
    | used as subtitle. The owner is the institution owning the application
    |
    */

    'logo' => 'Bootstrap Italia',

    'tagline' => 'Insert your tagline',

    'owner' => [
        'description' => 'Ente appartenenza / owner',
        'link' => '#',
    ],

    /*
    |--------------------------------------------------------------------------
    | Appearance of the pages:
    | slim-header-light: set to true for a white slim-header
    | small-header: set to true for a smaller header height
    |--------------------------------------------------------------------------
    */

    'slim-header-light' => false,

    'small-header' => true,

    /*
    |--------------------------------------------------------------------------
    | Auth section
    |--------------------------------------------------------------------------
    */

    'login_url'  => '/auth/login',

    'logout_method' => 'post',

    'logout_url'  => '/auth/logout',


    /*
    |--------------------------------------------------------------------------
    | Extra components url
    | set to null or false if you want to hide the elements
    |--------------------------------------------------------------------------
    */

    'search-url' => '/search',

    'newsletter_link' => '/newsletter',

    'socials' => [
        [
            'icon' => 'designers-italia',
            'text' => 'Designer Italia',
            'url' => '#',
        ],
        [
            'icon' => 'twitter',
            'text' => 'Twitter',
            'url' => '#',
        ],
        [
            'icon' => 'medium',
            'text' => 'Medium',
            'url' => '#',
        ],
        [
            'icon' => 'behance',
            'text' => 'Behance',
            'url' => '#',
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display for:
    | - slim-header
    | - header
    | - footer-menu
    | - footer-bar
    |
    | Each menu item should have a text and a URL. A string instead of an array
    | represents a header. The 'can' is a filter on Laravel's built in Gate
    | functionality.
    |
    | See details in the readme for configuring dropdowns and megamenus
    |
    */

    'menu' => [
        'slim-header' => [
            [
                'url' => '#',
                'text' => 'Pagina iniziale',
                'can' => 'ciccio',
            ],
            [
                'url' => 'contatti',
                'text' => 'Contatti',
                'target' => '_blank',
            ],
        ],
        'header' => [
            [
                'url' => '#',
                'text' => 'Menu 1',
            ],
            [
                'url' => '/italia',
                'text' => 'Menu 2',
            ],
            [
                'text' => 'Megamenu',
                'megamenu' => [
                    [
                        'Heading 1',
                        [
                            'url' => '/home',
                            'text' => 'Home',
                            'target' => '_blank',
                            'can' => 'set',
                        ],
                        '-',
                        [
                            'url' => '/about',
                            'text' => 'About',
                        ],
                        'No-link',
                    ],
                    [
                        'Heading 2',
                        [
                            'url' => '/a',
                            'text' => 'Link a',
                        ],
                        '-',
                        [
                            'url' => '/b',
                            'text' => 'Link b',
                        ],
                    ],
                ]
            ],
            [
                'text' => 'Dropdown',
                'dropdown' => [
                    'Intestazione',
                    [
                        'url' => '/home',
                        'text' => 'Home',
                        'target' => '_blank',
                    ],
                    '-',
                    [
                        'url' => '/about',
                        'text' => 'About',
                    ],
                ]
            ],
        ],
        'footer' => [
            [
                [
                    'text' => 'Amministrazione',
                    'url' => '#',
                ],
                [
                    'text' => 'Giunta e consiglio',
                    'url' => '#',
                ],
            ],
            [
                [
                    'text' => 'Amministrazione',
                    'url' => '#',
                ],
                [
                    'text' => 'Giunta e consiglio',
                    'url' => '#',
                ],
            ],
        ],
        'footer-bar' => [
            [
                'link' => '#',
                'title' => 'Media policy',
                'text' => 'Media policy',
            ],
            [
                'link' => '#',
                'title' => 'Note legali',
                'text' => 'Note legali',
            ],
            [
                'link' => '#',
                'text' => 'Privacy policy',
            ],
            [
                'link' => '#',
                'text' => 'Mappa del sito',
            ],
        ]
    ],

    'address' => '<strong>Comune di Lorem Ipsum</strong><br> Via Roma 0 - 00000 Lorem Ipsum Codice fiscale / P. IVA: 000000000',

    'contacts-links' => [
        [
            'text' => 'Posta Elettronica Certificata',
            'url' => '/',
            'target' => '_blank',
        ],
        [
            'text' => 'URP - Ufficio Relazioni con il Pubblico',
            'url' => '/',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        robertogallea\LaravelBootstrapItalia\Menu\Filters\HrefFilter::class,
        robertogallea\LaravelBootstrapItalia\Menu\Filters\ActiveFilter::class,
        robertogallea\LaravelBootstrapItalia\Menu\Filters\GateFilter::class,
    ],

];