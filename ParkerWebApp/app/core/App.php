<?php
	namespace app\core;
	
	class App {
		
		private $controller = 'Main';
		private $method = 'index';

		public function __construct() {
			// This is the location of the routing algorithm.
			// Programmatic mapping of URLs to controllers and their methods.
			// Pattern: /controller_class/method/parameter1/parameter2.
			$url = self::parseUrl();

			if (isset($url[0])) {
				if (file_exists('app/controllers/' . $url[0] . '.php')) {
					//echo 'The ' . $url[0] . '.php file exists';
					$this->controller = $url[0];
				}
				unset($url[0]);
			}

			$this->controller = 'app\\controllers\\' . $this->controller;
			$this->controller = new $this->controller;

			if (isset($url[1])) {
				if(method_exists($this->controller, $url[1])) {
					$this->method = $url[1];
				}
				unset($url[1]);
			}

			// Access filtering
			// Initialize on the controller object to read its information
			$reflection = new \ReflectionObject($this->controller);

			// Find the attributes
			$classAttributes = $reflection->getAttributes();
			$methodAttributes = $reflection->getMethod($this->method)->getAttributes();
			
			$attributes = array_values(array_merge($classAttributes, $methodAttributes));

			foreach($attributes as $attribute) {
				$filter = $attribute->newInstance();
				if ($filter->execute())
					return;
			}

			$this->params = $url ? array_values($url) : [];
			call_user_func_array([$this->controller, $this->method], $this->params);
		}

		private static function parseUrl(){
			if (isset($_GET['url'])) {
				return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			}
		}
	}