<?php
	function load() {
	$pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_STRING);
 	$explode =  array_filter(explode('/', $pagina));
 	$pag = 'paginas/';
 	$ext = '.php';
 	$pagina = (!$pagina) ? $pag.'home.php' : $pag.$explode[0].$ext;


	if (!file_exists($pagina)) {
		return '404.php';
	}

	return $pagina;

}

?>