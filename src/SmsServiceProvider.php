<?php

namespace Sgssxf\Sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'Sgssxf\Sms';

    public function boot()
    {
        $this->publishes([
           __DIR__ . '/../config/sms.php' => config_path('sms.php'),
        ], 'config');

        if (! class_exists('CreateSmsTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_aliyun_sms_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_sms_table.php'),
            ], 'migrations');
        }
    }
}