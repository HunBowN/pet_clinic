<?php
class controller_Error extends Controller
	{
		public function notFound() {
			return $this->render('error/index');
		}
	}
