<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        $db = Database::connect();

        if ($db->connID) {
            echo "Database connection successful!";
        } else {
            echo "Failed to connect to the database.";
        }
    }
}