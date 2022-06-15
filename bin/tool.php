#!/usr/bin/php -q
<?php
// Check platform requirements
require dirname(__DIR__) . '/vendor/autoload.php';

use App\Application;
use Cake\Console\CommandRunner;

// Build the runner with an application and root executable name.
$runner = new CommandRunner(new Application(), 'tool');
exit($runner->run($argv));