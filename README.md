# Easy Bootstrap-Italia integration with Laravel 5/6

[![Join the #design-cms-themes channel](https://img.shields.io/badge/Slack%20channel-%23design--cms--themes-blue.svg?logo=slack)](https://developersitalia.slack.com/messages/C91K0K085)
[![Get invited](https://slack.developers.italia.it/badge.svg)](https://slack.developers.italia.it/)
[![Design on forum.italia.it](https://img.shields.io/badge/Forum-Design-blue.svg)](https://forum.italia.it/c/design/user-interface) [![Latest Stable Version](https://poser.pugx.org/italia/design-laravel-theme/v/stable.png)](https://packagist.org/packages/italia/design-laravel-theme)
 [![Total Downloads](https://poser.pugx.org/italia/design-laravel-theme/downloads.png)](https://packagist.org/packages/italia/design-laravel-theme)

This package provides an easy way to quickly set up [Bootstrap Italia](https://italia.github.io/bootstrap-italia/) with 
Laravel 5. It has no requirements and dependencies besides Laravel, so you can start building your website immediately. 
The package just provides a Blade template that you can extend and advanced menu configuration possibilities. 

1. [Installation](#1-installation)
2. [Updating](#2-updating)
3. [Usage](#3-usage)
4. [The `make:bootstrapitalia` artisan command](#4-the-makebootstrapitalia-artisan-command)
5. [Configuration](#5-configuration)
   1. [Menu](#51-menu)
     - [Custom menu filters](#custom-menu-filters)
     - [Menu configuration at runtime](#menu-configuration-at-runtime)
     - [Active menu items](#active-menu-items)
5. [Translations](#6-translations)
6. [Customize views](#7-customize-views)
7. [Issues, Questions and Pull Requests](#8-issues-questions-and-pull-requests)

## 1. Installation

1. Require the package using composer:

    ```
    composer require italia/design-laravel-theme
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    > Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider

    ```php
    italia\DesignLaravelTheme\ServiceProvider::class,
    ```

3. Publish the public assets:

    ```
    php artisan vendor:publish --provider="italia\DesignLaravelTheme\ServiceProvider" --tag=assets
    ```

## 2. Updating

1. To update this package, first update the composer package:

    ```
    composer update italia/design-laravel-theme
    ```

2. Then, publish the public assets with the `--force` flag to overwrite existing files

    ```
    php artisan vendor:publish --provider="italia\DesignLaravelTheme\ServiceProvider" --tag=assets --force
    ```

## 3. Usage

To use the template, create a blade file and extend the layout with `@extends('bootstrap-italia::page')`.
This template yields the following sections:

- `title`: for in the `<title>` tag
- `content`: all of the page's content
- `css`: extra stylesheets (located in `<head>`)
- `js`: extra javascript (just before `</body>`)

All sections are in fact optional. Your blade template could look like the following.

```html
{{-- resources/views/test.blade.php --}}

@extends('bootstrap-italia::page')

@section('title', 'Bootstrap Italia')

@section('content')
    <p>Test page.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
```

Note that in Laravel 5.2 or higher you can also use `@stack` directive for `css` and `javascript`:

```html
{{-- resources/views/test.blade.php --}}

@push('css')

@push('js')
```

You now just return this view from your controller, as usual. Check out [Bootstrap Italia](https://italia.github.io/bootstrap-italia/) to find out how to build content for your pages.

## 4. The `make:bootstrapitalia` artisan command

> Note: only for Laravel 5.2 and higher

This package ships with a `make:bootstrapitalia` command that behaves exactly like `make:auth` (introduced in Laravel 5.2). In the near future it will publish auth views with bootstrap-italia styles.

It will also create custom pagination links views under `vendor/pagination` folder

```
php artisan make:bootstrapitalia
```

This command should be used on fresh applications, just like the `make:auth` command


## 5. Configuration

First, publish the configuration file:

```
php artisan vendor:publish --provider="italia\DesignLaravelTheme\ServiceProvider" --tag=config
```

Now, edit `config/bootstrap-italia.php` to configure the title, theme, menu, URLs etc. All configuration options are explained in the comments. However, I want to shed some light on the `menu` configuration.

### 5.1 Menu

You can configure your menu as follows.

Basically, you have three keys: `slim_header`, `header` and `footer`, which defines how the three sections are 
configured:

```php
'menu' => [
    'slim-header' => [],
    'header' => [],
    'footer' => [],
    'footer-bar' => [],
],
```

`slim_header` and `footer_bar` are configured as
```php
'menu' => [
        'slim-header' => [
            [
                'url' => '#',
                'text' => 'Pagina iniziale',
            ],
            [
                'url' => '#',
                'text' => 'Contatti',
                'target' => '_blank',
            ],
        ],
        ...
]        
``` 

```php
'menu' => [
        'footer-bar' => [
            [
                'url' => '#',
                'text' => 'Privacy policy',
            ],
            [
                'url' => '#',
                'text' => 'Contatti',
                'target' => '_blank',
            ],
        ],
        ...
]        
``` 

`footer` is configured as
```php
'menu' => [
        ...
        'footer' => [
                    [
                        [
                            'text' => 'Amministrazione',
                            'url' => '#',
                            'target' => '_blank',
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
]        
``` 

while `header` is more complex, since each element could be an `string`, a `simple item`, a `dropdown` or a `megamenu`:

- `string` is just a string without links
- a `simple item` is an associative array with the form: 
```php
[
    'url' => '/home',
    'text' => 'Home',
    'target' => '_blank',
],
``` 
- a `dropdown` is an item with the `dropdown` key set to an array of `simple items`, `headers`, or `separators` (string '-'): 
```php
[
    'url' => '/home',
    'text' => 'Dropdown item',
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
],
```
- a `megamenu` is an item with the `megamenu` key set to bi-dimensional array of `simple items`, `headers`, or `separators` (string '-'):
```php
[
    'text' => 'Megamenu item',
    'megamenu' => [
        [
            'Heading 1',
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
```            

For each of the previous, with a single string, you specify a menu header item to separate the items.
With an array, you specify a menu item. `text` and `url` or `route` are required attributes.


Use the `can` option if you want conditionally show the menu item. This integrates with Laravel's `Gate` functionality. 

```php
[
    [
        'text' => 'Create request',
        'url' => 'request/new',
        'can' => 'create-request'
    ],
]
```

#### Custom Menu Filters

If you need custom filters, you can easily add your own menu filters to this package. This can be useful when you are 
using a third-party package for authorization (instead of Laravel's `Gate` functionality).

For example with Laratrust:

```php
<?php

namespace MyApp;

use italia\DesignLaravelTheme\Menu\Builder;
use italia\DesignLaravelTheme\Menu\Filters\FilterInterface;
use Laratrust;

class MyMenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if (isset($item['permission']) && ! Laratrust::can($item['permission'])) {
            return false;
        }

        return $item;
    }
}
```

And then add to `config/bootstrap-italia.php`:

```php
'filters' => [
    italia\DesignLaravelTheme\Menu\Filters\HrefFilter::class,
    italia\DesignLaravelTheme\Menu\Filters\ActiveFilter::class,
    //italia\DesignLaravelTheme\Menu\Filters\GateFilter::class, Comment this line out
    MyApp\MyMenuFilter::class,
]
```

#### Menu configuration at runtime

It is also possible to configure the menu at runtime, e.g. in the boot of any service provider.
Use this if your menu is not static, for example when it depends on your database or the locale.
It is also possible to combine both approaches. The menus will simply be concatenated and the order of service providers
determines the order in the menu.

To configure the menu at runtime, register a handler or callback for the `MenuBuilding` event, for example in the 
`boot()` method of a service provider:

```php
use Illuminate\Contracts\Events\Dispatcher;
use italia\DesignLaravelTheme\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{

    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add_slim_header([
                            'text' => 'Blog',
                            'url' => 'admin/blog'
                        ]);
            $event->menu->add_header([
                            'text' => 'Blog',
                            'url' => 'admin/blog',
                        ]);
        });
    }

}
```
The configuration options are the same as in the static configuration files.

A more practical example that actually uses the database:

```php
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {            

            $items = Page::all()->map(function (Page $page) {
                return [
                    'text' => $page['title'],
                    'url' => route('admin.pages.edit', $page)
                ];
            });

            $event->menu->add_slim_header(...$items);
        });
    }
```

This event-based approach is used to make sure that your code that builds the menu runs only when the page is 
actually displayed and not on every request.

#### Active menu items

By default, a menu item is considered active if any of the following holds:
- The current path matches the `url` parameter
- The current path is a sub-path of the `url` parameter
- If it has a submenu containing an active menu item

To override this behavior, you can specify an `active` parameter with an array of active URLs, asterisks and regular 
expressions are supported. Example:

```php
[
    'text' => 'Pages'
    'url' => 'pages',
    'active' => ['pages', 'content', 'content/*']
]
```



## 5. Translations

At the moment, Italian and English translations are available out of the box.
Just specifiy the language in `config/app.php`.
If you need to modify the texts or add other languages, you can publish the language files:

```
php artisan vendor:publish --provider="italia\DesignLaravelTheme\ServiceProvider" --tag=translations
```

Now, you can edit translations or add languages in `resources/lang/vendor/bootstrap-italia`.

## 6. Customize views

If you need full control over the provided views, you can publish them:

```
php artisan vendor:publish --provider="italia\DesignLaravelTheme\ServiceProvider" --tag=views
```

Now, you can edit the views in `resources/views/vendor/bootstrap-italia`.

## 7. Issues, Questions and Pull Requests

You can report issues and ask questions in the [issues section](https://github.com/italia/DesignLaravelTheme/issues). Please start your issue with `ISSUE: ` and your question with `QUESTION: `

If you have a question, check the closed issues first. Over time, I've been able to answer quite a few.

To submit a Pull Request, please fork this repository, create a new branch and commit your new/updated code in there. Then open a Pull Request from your new branch. Refer to [this guide](https://help.github.com/articles/about-pull-requests/) for more info.
