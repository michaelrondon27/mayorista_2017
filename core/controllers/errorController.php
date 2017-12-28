<?php
	if(isset($_SESSION['app_id']) AND $_users[$_SESSION['app_id']]['id_perfil']>=1){
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){
			default:
				include(HTML_DIR.'error/404.php');
				break;
		}
	}else{
		header('location: ?view=index');
	}
?>