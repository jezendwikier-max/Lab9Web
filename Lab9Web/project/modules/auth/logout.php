<?php
$_SESSION = [];
session_regenerate_id(true);
setFlash('sukses', 'Anda sudah logout.');
redirect('login');
