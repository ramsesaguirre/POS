<?php
	
	abstract class Ayudas {
		
		public static function Print__R($Array) {
			
			echo '<code style="font-family: consolas; font-size: 12px;"><pre>';
			print_r($Array);
			echo '</pre></code>';
		}
	}