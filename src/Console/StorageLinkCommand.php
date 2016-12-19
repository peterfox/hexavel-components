<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 */

namespace Hexavel\Console;

use Illuminate\Foundation\Console\StorageLinkCommand as BaseCommand;

class StorageLinkCommand extends BaseCommand
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from "public/storage" to "var/app/public" (Hexavel Modified)';
}