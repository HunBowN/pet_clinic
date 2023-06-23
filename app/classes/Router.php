<?php
	
	class Router
	{
		public function getTrack($routes, $uri)
		{
			$method = $_SERVER['REQUEST_METHOD'];

			$http = parse_url($uri);
			if($http) {
				parse_str($http['query'], $output);
				if(isset($output['p'])) {
				unset($output['p']);
				}
				$uri = $http["path"];
			}

			foreach ($routes as $route) {
				$pattern = $this->createPattern($route->path); 
				
				if (preg_match($pattern, $uri, $params) && $method == $route->method) {
					$params = $this->clearParams($params); 
					return new Track($route->controller, $route->action, $params);
				}
			}
			
			return new Track('Error', 'notFound');
		}
		
		private function createPattern($path)
		{
			return '#^' . preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?$#';
		}
		
		private function clearParams($params)
		{
			$result = [];
			
			foreach ($params as $key => $param) {
				if (!is_int($key)) {
					$result[$key] = ltrim( $param, ':' );
				}
			}
			
			return $result;
		}
	}
	
	
