<?php
namespace AweUx\MoonshineTheme\Providers;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/theme.php');
        $this->publishes([
            __DIR__.'/../config/theme.php' => config_path('awe-ux-moonshine-theme.php'),
            __DIR__.'/../public/css/minimalistic.css' => public_path('css/minimalistic.css'),
        ]);

        $this->minimalisticTheme();
    }

    public function minimalisticTheme(): void
    {
        if (request()->hasCookie(config('awe-ux-moonshine-theme.cookie.name'))) {
            moonshineAssets()->add([config('awe-ux-moonshine-theme.minimalistic_css_path')]);

            moonshineColors()
                ->primary(config('awe-ux-moonshine-theme.default.primary'))
                ->secondary(config('awe-ux-moonshine-theme.default.secondary'))
                ->body(config('awe-ux-moonshine-theme.default.body'))
                ->dark(config('awe-ux-moonshine-theme.default.shade_default'), 'DEFAULT')
                ->dark(config('awe-ux-moonshine-theme.default.shade_50'), 50)
                ->dark(config('awe-ux-moonshine-theme.default.shade_100'), 100)
                ->dark(config('awe-ux-moonshine-theme.default.shade_200'), 200)
                ->dark(config('awe-ux-moonshine-theme.default.shade_300'), 300)
                ->dark(config('awe-ux-moonshine-theme.default.shade_400'), 400)
                ->dark(config('awe-ux-moonshine-theme.default.shade_500'), 500)
                ->dark(config('awe-ux-moonshine-theme.default.shade_600'), 600)
                ->dark(config('awe-ux-moonshine-theme.default.shade_700'), 700)
                ->dark(config('awe-ux-moonshine-theme.default.shade_800'), 800)
                ->dark(config('awe-ux-moonshine-theme.default.shade_900'), 900)
                ->successBg(config('awe-ux-moonshine-theme.default.successBg'))
                ->successText(config('awe-ux-moonshine-theme.default.successText'))
                ->warningBg(config('awe-ux-moonshine-theme.default.warningBg'))
                ->warningText(config('awe-ux-moonshine-theme.default.warningText'))
                ->errorBg(config('awe-ux-moonshine-theme.default.errorBg'))
                ->errorText(config('awe-ux-moonshine-theme.default.errorText'))
                ->infoBg(config('awe-ux-moonshine-theme.default.infoBg'))
                ->infoText(config('awe-ux-moonshine-theme.default.infoText'));

            moonshineColors()
                ->body(config('awe-ux-moonshine-theme.dark.body'), dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_50'), 50, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_100'), 100, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_200'), 200, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_300'), 300, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_400'), 400, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_500'), 500, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_600'), 600, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_700'), 700, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_800'), 800, dark: true)
                ->dark(config('awe-ux-moonshine-theme.dark.shade_900'), 900, dark: true)
                ->successBg(config('awe-ux-moonshine-theme.dark.successBg'), dark: true)
                ->successText(config('awe-ux-moonshine-theme.dark.successText'), dark: true)
                ->warningBg(config('awe-ux-moonshine-theme.dark.warningBg'), dark: true)
                ->warningText(config('awe-ux-moonshine-theme.dark.warningText'), dark: true)
                ->errorBg(config('awe-ux-moonshine-theme.dark.errorBg'), dark: true)
                ->errorText(config('awe-ux-moonshine-theme.dark.errorText'), dark: true)
                ->infoBg(config('awe-ux-moonshine-theme.dark.infoBg'), dark: true)
                ->infoText(config('awe-ux-moonshine-theme.dark.infoText'), dark: true);
        }
    }
}
