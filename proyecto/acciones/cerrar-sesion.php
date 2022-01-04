<?php

// Iniciamos (retomamos) la sesión.
session_start();

// Destruimos la sesión.
session_destroy();

// Redirigimos al inicio.
header('Location: /index.php', true, 302);

// Finalizamos el proceso.
die();
