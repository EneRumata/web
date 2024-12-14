<?php
	function check_registration($redirect_page) {
		if (!isset($_COOKIE["user"])) {
			header("Location: $redirect_page");
		}
	}
?>