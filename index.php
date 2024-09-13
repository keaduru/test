<?php
// Router sınıfını dahil et
require 'routes/router.php';

// Router'ı oluştur
$router = new Router();

// Route'ları tanımla
$router->addRoute('home', 'HomeController', 'index');
$router->addRoute('about', 'AboutController', 'index');
$router->addRoute('contact', 'ContactController', 'index');

// URL'den route al ve dispatch et
$url = isset($_GET['page']) ? $_GET['page'] : '';
$router->dispatch($url);
?>