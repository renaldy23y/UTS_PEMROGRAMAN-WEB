<?php

namespace Celyes\SimpleMVC;

use Celyes\SimpleMVC\Exceptions\KeyNotFoundException;
use Celyes\SimpleMVC\Exceptions\MethodNotFoundException;

class Router
{

    /**
     * @var array
     *
     * $routes - holds all routes and correspondent controllers
     * 
     */

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * load - loads routes file
     *
     * @param   resource  $file  [$file the routes file]
     *
     * @return  resource         returns a file that contains all the routes
     */

     public static function load($file)
    {
        $router = new static;

        // Load routes file
        require $file;

        // Load controllers
        // require_once __DIR__ . '/../Controller/ProdukController.php';

        return $router;
    }

    /**
     * get - adds routes of type get to $this->routes GET array
     *
     * @param   string  $uri         url path 
     * @param   string  $controller  the correspondent controller and method
     *
     * @return  void               
     */

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * post - adds routes of type get to $this->routes POST array
     *
     * @param   string  $uri         url path 
     * @param   string  $controller  the correspondent controller and method
     *
     * @return  void               
     */

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * direct - 
     *
     * @param   string  $uri          the requested url path 
     * @param   string  $requestType  the request type
     *
     * @return  method                calls a method
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        http_response_code(404);
        return view('404');
    }


    /**
     * callAction - calls the needed method in the targeted controller
     *
     * @param   string  $controller  the controller to go to
     * @param   string  $method      the method to call
     *
     * @return  method               calls the correspondent controller method
     */

    protected function callAction($controller, $method)
    {
        $controller = App::get('controllers-path') . "{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $method)) {
            http_response_code(404);
            return view('404');
        }
        return $controller->$method();
    }

// router.php

 

}
