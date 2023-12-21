<?php

namespace modul52\routes;

include "../modul52/controller/RentalController.php";

use modul52\controller\RentalController;

class RentalRoutes
{
    public function handle($method, $path)
    {
        // JIKA REQUEST METHOD GET DAN PATH SAMA DENGAN "/api/rental"
        if ($method == 'GET' && $path == '/api/rental') {
            $controller = new RentalController();
            echo $controller->index();
        }

        // JIKA REQUEST METHOD GET DAN PATH MENGANDUNG '/api/rental/'
        if ($method == 'GET' && strpos($path, '/api/rental/') === 0) {
            // Extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new RentalController();
            echo $controller->getById($id);
        }

        // JIKA REQUEST METHOD POST DAN PATH SAMA DENGAN "/api/rental"
        if ($method == 'POST' && $path == '/api/rental') {
            $controller = new RentalController();
            echo $controller->insert();
        }

        // JIKA REQUEST METHOD PUT DAN PATH MENGANDUNG '/api/rental/'
        if ($method == 'PUT' && strpos($path, '/api/rental/') === 0) {
            // Extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new RentalController();
            echo $controller->update($id);
        }

        // JIKA REQUEST METHOD DELETE DAN PATH MENGANDUNG '/api/rental/'
        if ($method == 'DELETE' && strpos($path, '/api/rental/') === 0) {
            // Extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new RentalController();
            echo $controller->delete($id);
        }
    }
}
