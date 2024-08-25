<?php

// Paths
define("PATH_REQUIRE", substr($_SERVER['SCRIPT_FILENAME'], 0, -9));
define("PATH", substr($_SERVER['PHP_SELF'], 0, -9)); 

// Website informations
define("WEBSITE_TITLE", "Artisan Pro");
define("WEBSITE_NAME", "Artisan Pro");
define("WEBSITE_URL", "");
define("WEBSITE_DESCRIPTION", "Plateforme de mise en relation pour les artisans et les clients");
define("WEBSITE_KEYWORDS", "");
define("WEBSITE_LANGUAGE", "fr");
define("WEBSITE_AUTHOR", "Entreprise 26");
define("WEBSITE_AUTHOR_MAIL", "artisanpro02@gmail.com");


// DataBase informations
define("DATABASE_HOST", "localhost");
define("DATABASE_NAME", "artisanpro");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "");