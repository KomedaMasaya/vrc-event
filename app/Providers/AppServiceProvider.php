<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;

class AppServiceProvider extends ServiceProvider
{
    private function get_short_lived_access_token($config) {
        $ch = curl_init('https://api.dropbox.com/oauth2/token');
        $options = array(CURLOPT_POSTFIELDS => 'grant_type=refresh_token&refresh_token='.$config['refresh_token'],
                         CURLOPT_USERNAME => $config['app_key'],
                         CURLOPT_PASSWORD => $config['app_secret'],
                         CURLOPT_RETURNTRANSFER => true
                        );
        curl_setopt_array($ch, $options);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        $short_lived_access_token = $response->access_token;
        return $short_lived_access_token;
    }

    public function boot()
    {
        Storage::extend('dropbox', function ($app, $config) {
            $adapter = new DropboxAdapter(new DropboxClient(
                 $this->get_short_lived_access_token($config)
            ));
 
            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }
}
