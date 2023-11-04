<?php
function BtnUpdateProfil($yes) {
	if ($yes=="Y") {
		$hide = '<a href="update-profil.php" class="btn btn-full btn-l rounded-sm font-800 text-uppercase bg-highlight" >Update Profil</a>';
	} else {
		$hide = '';
	}
}
