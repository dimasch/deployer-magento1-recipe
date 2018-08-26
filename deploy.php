<?php
namespace Deployer;

require 'recipe/magento.php';

// Project name
set('application', getenv('DEP_APP'));

// Project repository
set('repository', getenv('DEP_REPO'));

set('allow_anonymous_stats', false);

set('writable_mode', 'chmod'); // Using sudo in writable commands

// Hosts
inventory('hosts.yml');

desc('Composer install...');
task('deploy:composer:install', function () {
    run("cd {{release_path}} && composer install -vvv");
});

before('deploy:cache:clear', 'deploy:composer:install');
