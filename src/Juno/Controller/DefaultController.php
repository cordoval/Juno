<?php

namespace Juno\Controller;

/**
 * @package Juno
 */
class DefaultController extends \Flint\Controller\Controller
{
    /**
     * @return string
     */
    public function indexAction()
    {
        $queues = $this->app['raekke.queue_manager'];

        return $this->render('index.html.twig', compact('queues'));
    }
}
