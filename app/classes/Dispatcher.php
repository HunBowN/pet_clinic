<?php 
class Dispatcher {
    public function getPage(Track $track) {
        $controllerName =  'controller_' . ucfirst( $track->controller );

        try {
            $controller = new $controllerName;

            if(method_exists($controller, $track->action)) {
                $result = $controller->{$track->action}($track->params);
                
                if($result) {
                    return $result;
                } else {
                    return new Page('default');
                }
            } else {
                throw new Exception(
                    "Метод $track->action не найден в классе $controllerName" 
                ); 
            }

        } catch (\Exception $error) {
            echo $error->getMessage(); die();
        }
    }
}