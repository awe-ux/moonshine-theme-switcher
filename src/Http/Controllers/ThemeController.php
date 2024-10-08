<?php
namespace AweUx\MoonshineTheme\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use MoonShine\MoonShineRequest;
use MoonShine\Http\Controllers\MoonShineController;

class ThemeController extends MoonShineController
{
    public function update(MoonShineRequest $request)
    {
        $cookie = $request->hasCookie(config('awe-ux-moonshine-theme.cookie.name'))
            ? Cookie::forget(config('awe-ux-moonshine-theme.cookie.name'))
            : cookie(
                config('awe-ux-moonshine-theme.cookie.name'),
                config('awe-ux-moonshine-theme.cookie.value'),
                config('awe-ux-moonshine-theme.cookie.duration')
            );

        return Redirect::to($request->get('uri'))->withCookie($cookie);
    }
}
