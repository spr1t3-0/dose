<?php
use \Bramus\Router\Router;

class Core extends Controller {

    protected Router $Router;

    public function __construct() {
        $this->Router = new Router();

        $this->Router->get('/', function() {
          $this->call('Doses', 'list');
          
        });

        $this->Router->post('/login', function() {
          $this->call('Users', 'login');
        });

        $this->Router->get('/test', function() {
          die('passed');
        });

        $this->Router->get('/add', function() {
          $this->call('Doses', 'addView');
        });

        $this->Router->post('/add', function() {
          $this->call('Doses', 'add');
        });

        $this->Router->get('/delete/\d+', function(int $id) {
          $this->call('Doses', 'delete', ["id" => $id]);
        });

        $this->Router->run();
    }

    /**
     * Call controller method
     *
     * @param string $controller
     * @param string $method
     * @param array $params
     * @return mixed
     */
    private function call(string $controller, string $method, array $params = []):mixed {
        $controller = ucfirst($controller);
        /**
         * @psalm-suppress UndefinedConstant
         */
        /**
         * @psalm-suppress UnresolvableInclude
         */
        /**
         * @psalm-suppress UndefinedConstant
         */
        /**
         * @psalm-suppress UnresolvableInclude
         */
        /**
         * @psalm-suppress UndefinedConstant
         */
        require_once(APP_ROOT . '/src/controllers/' . $controller . ".php");
        /**
         * @psalm-suppress InvalidStringClass
         */
        $instance = new $controller();
        return call_user_func_array([$instance, $method], $params);


    }

    public function validMethod(string $controller, string $method) {
        /**
         * @psalm-suppress UndefinedConstant
         */
        if(file_exists($f = APP_ROOT . '/src/controllers/' . ucfirst($controller) . ".php")) {
            require_once($f);
            $controller = ucfirst($controller);
            return method_exists((new $controller()), $method);
        } else {
            return false;
        }
    }



}
