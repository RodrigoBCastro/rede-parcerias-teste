<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $contractPath = app_path('Domain/Repositories/Contracts');

        foreach (File::allFiles($contractPath) as $contractFile) {
            $contract = 'App\\Domain\\Repositories\\Contracts\\' . $contractFile->getFilenameWithoutExtension();

            $implementation = 'App\\Domain\\Repositories\\' . str_replace('Interface', '', $contractFile->getFilenameWithoutExtension());

            if (class_exists($implementation)) {
                $this->app->bind($contract, $implementation);
            }
        }
    }
}
