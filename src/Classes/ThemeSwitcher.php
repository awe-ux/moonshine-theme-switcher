<?php

namespace AweUx\MoonshineTheme\Classes;

use Closure;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Components\Layout\Body;
use MoonShine\UI\Components\Layout\Html;
use MoonShine\UI\Components\Layout\Layout;
use Throwable;

class ThemeSwitcher
{
    static function make(Closure|string $label): ActionButton
    {
        return ActionButton::make(
            $label,
            route('moonshine-theme.update', ['uri' => moonshineRequest()->getRequestUri()])
        );
    }

    /**
     * @throws Throwable
     */
    static function layoutBuilder(Layout $layout): Layout
    {
        if (request()->hasCookie(config('moonshine-theme.cookie.name'))) {
            $layout->getComponents()->each(function (Html $component) {
               $component->getComponents()->each(function ($item) {
                   if ($item instanceof Body) {
                      $item->class('theme-minimalistic');
                   }
               });
            });
        }

        return $layout;
    }
}
