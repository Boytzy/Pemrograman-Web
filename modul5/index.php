<?php

namespace modul52;

include '../modul52/routes/RentalRoutes.php';

use modul52\routes\RentalRoutes;

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];


// Handle Rental Routes
$rentalRoutes = new RentalRoutes();
$rentalRoutes->handle($request_method, $request_uri);
