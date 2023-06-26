<?php

namespace App\Services;

use App\Models\Configuration;

class ConfigurationService
{
    /**
     * Gets all configuration based on it's key
     *
     * @param   $configKeys
     * @return App\Models\Configuration
     */
    public function getConfigByKey($configKeys = [])
    {
        return Configuration::select('id', 'key', 'value')->whereIn('key', $configKeys)->get();
    }

    /**
     * updates Configuration value
     *
     * @param  App\Models\Configuration $config
     * @param  $value 
     * @return App\Models\Configuration
     */
    public function updateConfig(Configuration $config, $value)
    {
        $config->value = $value;
        $config->save();

        return $config;
    }

    /**
     * updates Configuration value
     *
     * @param  $configKey
     * @param  $value 
     * @return App\Models\Configuration
     */
    public function updateConfigByKey($configKey, $value)
    {
        $config = Configuration::where('key', $configKey)->first();
        $config->value = $value;
        $config->save();

        return $config;
    }
}
