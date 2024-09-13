<?php

class Router {
    private $routes = [];

    // Route ekleme metodu
    public function addRoute($route, $controller, $method) {
        $this->routes[$route] = ['controller' => $controller, 'method' => $method];
    }

    // URL'ye göre doğru controller ve methodu çağırma
    public function dispatch($url) {
        // URL'yi temizle ve parçala
        $url = trim($url, '/');
        
        // Varsayılan controller ve method
        $controller = 'HomeController';
        $method = 'index';

        // Boş URL'yi kontrol et
        if ($url === '') {
            $url = 'home'; // Varsayılan olarak 'home' route'ını kullan
        }

        // URL geçerli bir route mı?
        if (array_key_exists($url, $this->routes)) {
            $route = $this->routes[$url];
            $controller = $route['controller'];
            $method = $route['method'];
        } else {
            // 404 sayfasına yönlendir
            include 'views/404.php';
            return;
        }

        // Controller dosyasını yükle
        $controllerFile = "controllers/{$controller}.php";
        if (file_exists($controllerFile)) {
            include $controllerFile;
            $controllerInstance = new $controller();

            // Methodu çağır
            if (method_exists($controllerInstance, $method)) {
                $controllerInstance->$method();
            } else {
                // Method bulunamadı, 404 sayfasına yönlendir
                include 'views/404.php';
            }
        } else {
            // Controller bulunamadı, 404 sayfasına yönlendir
            include 'views/404.php';
        }
    }
}
