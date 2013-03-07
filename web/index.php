<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Juno\Application($rootDir = __DIR__ . '/..', true);
$app->inject(array(
    'routing.options' => array(
        'cache_dir' => $rootDir . '/cache/routing',
    ),
    'twig.options' => array(
        'cache' => $rootDir . '/cache/twig',
    ),
    'predis.parameters' => 'tcp://localhost',
    'predis.options' => array('prefix' => 'raekke:'),
));

if ($app['debug']) {
    $app->register(new Silex\Provider\ServiceControllerServiceProvider, array(
        'profiler.cache_dir' => $rootDir . '/cache/profiler',
    ));
    $app->register($profiler = new Silex\Provider\WebProfilerServiceProvider);
    $app->mount('/_profiler', $profiler);
}

$app->run();
