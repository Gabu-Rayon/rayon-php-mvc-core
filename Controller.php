<?php

namespace gabu\phpmvc;

use gabu\phpmvc\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';

    public string $action = '';


    /**
     * @var \gabu\phpmvc\middlewares\BaseMiddleware
     */
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params=[])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return \gabu\phpmvc\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}