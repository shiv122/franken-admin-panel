<?php

namespace App\Generator;

use Illuminate\Support\Facades\Vite;

class ViteDeferGenerator
{
    public static function deferScripts(array $scripts)
    {
        foreach ($scripts as $script) {
            yield Vite::useHotFile(base_path('vite.hot'))
                ->useBuildDirectory('build')
                ->useManifestFile(public_path('build/manifest.json'))
                ->asset($script, ['defer' => true]);
        }
    }
}
