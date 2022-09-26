<?php

Class Controller {


    /**
     * Instantiate a model class
     *
     * @param string $model
     * @return mixed
     */
    public function model(string $model):mixed {
        $model = ucfirst($model);
        require_once(APP_ROOT . '/src/models/' . $model . '.php');
        return new $model();
    }

    /**
     * Render a view to the user
     *
     * @param string $view
     * @param array $data
     * @return void
     */
    public function render(string $view, array $data = []) {
        $view = APP_ROOT . '/src/views/' . $view . '.tpl';
        $tpl = SmartySingleton::instance();

if($this->model('User')->isLoggedIn()) {
        $userData = $this->model('User')->current();

        if($userData !== null) {
        foreach($userData as $key => $value) {
          $data["current_user"][$key] = $value;
        }
      }
    }

        if(file_exists($view)) {
            $tpl->assign($data);
            $tpl->display($view);
        } else {
            $tpl->display('404.tpl');
        }

    }


}
