# Theme switcher for [MoonShine Laravel admin panel](https://moonshine-laravel.com)

## Description
#### This package is designed to be able to change the standard design theme to a minimalistic one. 
#### In the file `config.php` you have the option to change the name, value and lifetime of the cookie, change the connection of the minimalistic.css file, set your own colors for a minimalistic theme

## Installation
```shell
composer require awe-ux/moonshine-theme
```

## Publish provider
```shell
php artisan vendor:publish --provider='AweUx\MoonshineTheme\Providers\ThemeServiceProvider'  
```
After publishing, you will be able to find the config file `moonshine-theme.php` in the directory `config` of your project.


## Reset cache after publish provider
```shell
php artisan optimize:clear
```

## Usage
#### If you don't published `MoonShineLayout`, then you need to do it. Look it [here](https://moonshine-laravel.com/docs/resource/appearance/appearance-layout_builder).
Wrap your `LayoutBuilder` in `ThemeSwitcher::layoutBuilder(LayoutBuilder $layout): LayoutBuilder` in `MoonShineLayout`.
```php
use MoonShine\Theme\Classes\ThemeSwitcher;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        ThemeSwitcher::layoutBuilder(
            LayoutBuilder::make([
                Sidebar::make([
                    Menu::make(),
                    When::make(),
                ]),
            LayoutBlock::make([
                Flash::make(),
                Header::make([]),
                Content::make(),
                Footer::make()
            ]),
            ])
        );
    }
```
Then need add button-switcher to layout. Use `ThemeSwitcher::make(Closure|string $label): ActionButton`.
```php
ThemeSwitcher::layoutBuilder(
    LayoutBuilder::make([
        Sidebar::make([
            Menu::make(),
            When::make(),
        ]),
    LayoutBlock::make([
        Flash::make(),
        Header::make([
            ThemeSwitcher::make('Switch moonshine-theme')->icon('heroicons.arrow-path-rounded-square')->info(),
        ]),
        Content::make(),
        Footer::make()
    ]),
    ])
);
```
#### `ThemeSwitcher::make() - ActionButton`. You can use all ActionButton methods for it. 
### Warning! 
`ThemeSwitcher::make()->async()` not working yet, don't use this method.
