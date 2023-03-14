<?php
namespace App\Supports;

class AssetSupport
{
    public function commonCssJs($name)
    {
        $version_css = config('app.version');
        $version_js = config('app.version');

        if(config('app.env') == 'local')
        {
            $version_css = filemtime(base_path('assets/'.$name.'.css'));
            $version_js = filemtime(base_path('assets/'.$name.'.js'));
        }


        return '<link rel="stylesheet" href="/assets/'.$name.'.css?v='.$version_css.'">
    <script type="module" src="/assets/'.$name.'.js?v='.$version_js.'"></script>';

    }

    public function css($name)
    {
        $version_css = config('app.version');

        if(config('app.env') == 'local')
        {
            $version_css = filemtime(base_path('assets/'.$name.'.css'));
        }

        return '<link rel="stylesheet" href="/assets/'.$name.'.css?v='.$version_css.'">';
    }

    public function js($name)
    {
        $version_js = config('app.version');

        if(config('app.env') == 'local')
        {
            $version_js = filemtime(base_path('assets/'.$name.'.js'));
        }

        return '<script type="module" src="/assets/'.$name.'.js?v='.$version_js.'"></script>';
    }

}
