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
        $this->mergeConfigFrom(
            __DIR__ . '/../config/theme.php',
            'moonshine-theme'
        );
        $this->publishes([
            __DIR__.'/../config/theme.php' => config_path('moonshine-theme.php'),
        ]);

        $this->minimalisticTheme();
    }

    public function minimalisticTheme(): void
    {
        if (request()->hasCookie(config('moonshine-theme.cookie.name'))) {
            moonshineAssets()->add([config('moonshine-theme.minimalistic_css_path')]);

            moonshineColors()
                ->primary(config('moonshine-theme.default.primary'))
                ->secondary(config('moonshine-theme.default.secondary'))
                ->body(config('moonshine-theme.default.body'))
                ->dark(config('moonshine-theme.default.shade_default'), 'DEFAULT')
                ->dark(config('moonshine-theme.default.shade_50'), 50)
                ->dark(config('moonshine-theme.default.shade_100'), 100)
                ->dark(config('moonshine-theme.default.shade_200'), 200)
                ->dark(config('moonshine-theme.default.shade_300'), 300)
                ->dark(config('moonshine-theme.default.shade_400'), 400)
                ->dark(config('moonshine-theme.default.shade_500'), 500)
                ->dark(config('moonshine-theme.default.shade_600'), 600)
                ->dark(config('moonshine-theme.default.shade_700'), 700)
                ->dark(config('moonshine-theme.default.shade_800'), 800)
                ->dark(config('moonshine-theme.default.shade_900'), 900)
                ->successBg(config('moonshine-theme.default.successBg'))
                ->successText(config('moonshine-theme.default.successText'))
                ->warningBg(config('moonshine-theme.default.warningBg'))
                ->warningText(config('moonshine-theme.default.warningText'))
                ->errorBg(config('moonshine-theme.default.errorBg'))
                ->errorText(config('moonshine-theme.default.errorText'))
                ->infoBg(config('moonshine-theme.default.infoBg'))
                ->infoText(config('moonshine-theme.default.infoText'));

            moonshineColors()
                ->body(config('moonshine-theme.dark.body'), dark: true)
                ->dark(config('moonshine-theme.dark.shade_50'), 50, dark: true)
                ->dark(config('moonshine-theme.dark.shade_100'), 100, dark: true)
                ->dark(config('moonshine-theme.dark.shade_200'), 200, dark: true)
                ->dark(config('moonshine-theme.dark.shade_300'), 300, dark: true)
                ->dark(config('moonshine-theme.dark.shade_400'), 400, dark: true)
                ->dark(config('moonshine-theme.dark.shade_500'), 500, dark: true)
                ->dark(config('moonshine-theme.dark.shade_600'), 600, dark: true)
                ->dark(config('moonshine-theme.dark.shade_700'), 700, dark: true)
                ->dark(config('moonshine-theme.dark.shade_800'), 800, dark: true)
                ->dark(config('moonshine-theme.dark.shade_900'), 900, dark: true)
                ->successBg(config('moonshine-theme.dark.successBg'), dark: true)
                ->successText(config('moonshine-theme.dark.successText'), dark: true)
                ->warningBg(config('moonshine-theme.dark.warningBg'), dark: true)
                ->warningText(config('moonshine-theme.dark.warningText'), dark: true)
                ->errorBg(config('moonshine-theme.dark.errorBg'), dark: true)
                ->errorText(config('moonshine-theme.dark.errorText'), dark: true)
                ->infoBg(config('moonshine-theme.dark.infoBg'), dark: true)
                ->infoText(config('moonshine-theme.dark.infoText'), dark: true);
        }
    }
}
