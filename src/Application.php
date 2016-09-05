<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2015
 *
 * @package     hexavel-components
 */

namespace Hexavel;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication {

    /**
     * Get the path to the application "app" directory.
     *
     * @return string
     */
    public function path()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src';
    }

    /**
     * Get the path to the application configuration files.
     *
     * @return string
     */
    public function configPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config';
    }

    /**
     * Get the path to the database directory.
     *
     * @return string
     */
    public function databasePath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'support'.DIRECTORY_SEPARATOR.'database';
    }

    /**
     * Get the path to the language files.
     *
     * @return string
     */
    public function langPath()
    {
        return $this->resourcePath().DIRECTORY_SEPARATOR.'lang';
    }

    /**
     * Get the path to the storage directory.
     *
     * @return string
     */
    public function storagePath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'var';
    }

    /**
     * Get the path to the resources directory.
     *
     * @return string
     */
    public function resourcePath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'support'.DIRECTORY_SEPARATOR.'resources';
    }

    /**
     * Get the path to the bootstrap directory.
     *
     * @return string
     */
    public function bootstrapPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'bootstrap';
    }

    /**
     * Get the path to the bootstrap cache directory.
     *
     * @return string
     */
    public function bootstrapCachePath()
    {
        return $this->storagePath().DIRECTORY_SEPARATOR.'cache';
    }

    /**
     * Get the path to the configuration cache file.
     *
     * @return string
     */
    public function getCachedConfigPath()
    {
        return $this->bootstrapCachePath().DIRECTORY_SEPARATOR.'config.php';
    }

    /**
     * Get the path to the routes cache file.
     *
     * @return string
     */
    public function getCachedRoutesPath()
    {
        return $this->bootstrapCachePath().DIRECTORY_SEPARATOR.'routes.php';
    }

    /**
     * Get the path to the cached "compiled.php" file.
     *
     * @return string
     */
    public function getCachedCompilePath()
    {
        return $this->bootstrapCachePath().DIRECTORY_SEPARATOR.'compiled.php';
    }

    /**
     * Get the path to the cached services.json file.
     *
     * @return string
     */
    public function getCachedServicesPath()
    {
        return $this->bootstrapCachePath().DIRECTORY_SEPARATOR.'services.json';
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version()
    {
        return static::VERSION.' Hexavel';
    }
}