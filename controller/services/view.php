<?php

class View{
	public static function createView($view,$param){
		foreach ($param as $key => $value) {
			$$key = $value;
		}
	}
}
?>