<?php namespace Thrive\SpagesModule\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;
use Anomaly\Streams\Platform\Support\Str;
use Illuminate\Contracts\Config\Repository;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Illuminate\Filesystem\Filesystem;


class StaticPages
{

    public function handle(
        SelectFieldType $fieldType,
        ThemeCollection $themes,
        Repository $config,
        Filesystem $files,
        Str $str
    ) {


         /**
         * If for some reason we don't
         * have a theme specified or
         * if it can't be found..
         */
        if (!$theme = $themes->get($config->get('streams::themes.standard'))) {
            return;
        }

        // Set the path of the theme directory to look in for the
        // Static files
        $theme_path = $theme->getPath('resources/views/spages/static_pages');

        // If no dir exist, then prsent only the default module view
        if(!$files->exists($theme_path))
        {
            $fieldType->setOptions(
                [
                    'streams::addon.theme' => [],
                    'module' => ['module::static_pages.default' => 'module::static_pages/default'],
                ]
            );
            return;
        }

        $layouts = $files->allFiles($theme_path);

        //Current Theme Views folder
        $prefix = $theme->getPath('resources/views');


 
        //$files->exist();

        $options = array_combine(
            array_map(
                function ($path) use ($prefix) {

                    $path = str_replace($prefix, '', $path);
                    $path = trim($path, '/\\');
                    $path = str_replace(basename($path), basename(pathinfo($path, PATHINFO_FILENAME), '.blade'), $path);
                    $path = str_replace(DIRECTORY_SEPARATOR, '.', $path);

                    return 'theme::' . $path;
                },
                $layouts
            ),
            array_map(
                function ($path) use ($theme_path, $prefix, $str) {

                    $path = str_replace($prefix, '', $path);
                    $path = trim($path, '/\\');
                    $path = str_replace(basename($path), basename(pathinfo($path, PATHINFO_FILENAME), '.blade'), $path);
                    $path = str_replace(DIRECTORY_SEPARATOR, '/', $path);

                    return 'theme::' . $path;
                },
                $layouts
            )
            
        );

        $fieldType->setOptions(
            [
                'streams::addon.theme' => $options,
                'module' => $this->getModuleFiles(),
            ]
        );

        
    }


    private function getModuleFiles()
    {
        return 
        [
            'module::static_pages.default' => 'module::static_pages/default',
            'module::static_pages.login-form' => 'module::static_pages/login-form',
            'module::static_pages.landing-page' => 'module::static_pages/landing-page'
        ];
        
    }

}
