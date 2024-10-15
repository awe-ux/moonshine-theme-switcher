<?php
namespace AweUx\MoonshineTheme\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use MoonShine\Laravel\Http\Controllers\MoonShineController;
use MoonShine\Laravel\MoonShineRequest;

class ThemeController extends MoonShineController
{
    public function update(MoonShineRequest $request)
    {
        $cookie = $request->hasCookie(config('moonshine-theme.cookie.name'))
            ? Cookie::forget(config('moonshine-theme.cookie.name'))
            : cookie(
                config('moonshine-theme.cookie.name'),
                config('moonshine-theme.cookie.value'),
                config('moonshine-theme.cookie.duration')
            );

        return Redirect::to($request->get('uri'))->withCookie($cookie);
    }
}
