# Theme switcher for [MoonShine Laravel admin panel](https://moonshine-laravel.com)

## Description
#### Only for ` "moonshine/moonshine": "^3.0.0-beta.1"`
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

Wrap your `Layout` in `ThemeSwitcher::layoutBuilder(Layout $layout): Layout` in your `MoonShineLayout`.
```php
use AweUx\MoonshineTheme\Classes\ThemeSwitcher;

final class MoonShineLayout extends AppLayout
{
    public static function build(): Layout
    {
        return ThemeSwitcher::layoutBuilder(parent::build());
    }
```
#### If you use custom `Layout`, you must adhere to the following structure in method `build()` and wrap `Layout` in `ThemeSwitcher::layoutBuilder()`.
```php
 public function build(): Layout
    {
        return ThemeSwitcher::layoutBuilder(
            Layout::make([
                Html::make([
                    $this->getHeadComponent(),
                    Body::make([
                        Wrapper::make([
                            $this->getSidebarComponent(),
                            Block::make([
                                Flash::make(),
                                $this->getHeaderComponent(),
                                Content::make([
                                    Title::make($this->getPage()->getTitle())->class('mb-6'),
                                    Components::make(
                                        $this->getPage()->getComponents()
                                    ),
                                ]),
                                $this->getFooterComponent(),
                            ])->class('layout-page'),
                        ]),
                    ]),
                ])
                    ->customAttributes([
                        'lang' => $this->getHeadLang(),
                    ])
                    ->withAlpineJs()
                    ->withThemes(),
            ])
        );
    }
```
For add button-switcher in header, you need to override the `getHeaderComponent()` method in `MoonshineLayout`. Use `ThemeSwitcher::make(Closure|string $label): ActionButton`. 
```php
protected function getHeaderComponent(): Header
    {
        return Header::make([
            Breadcrumbs::make($this->getPage()->getBreadcrumbs())->prepend($this->getHomeUrl(), icon: 'home'),
            Search::make(),
            ThemeSwitcher::make('Change theme'),
            When::make(
                fn(): bool => $this->isUseNotifications(),
                static fn(): array => [Notifications::make()]
            ),
            Locales::make(),
        ]);
    }
```
#### `ThemeSwitcher::make() - ActionButton`. You can use all ActionButton methods for it. 

> [!WARNING]
> `ThemeSwitcher::make()->async()` not working, don't use this method.
