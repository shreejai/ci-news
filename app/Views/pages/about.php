<?php

namespace App\Controllers;

echo "Hello world from about.php";

use CodeIgniter\Controller;
use Config\Database;

        $db = Database::connect();

        if ($db->connID) {
            echo "Database connection successful!";
        } else {
            echo "Failed to connect to the database.";
        }

        
         if(session()->getFlashdata('message')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
      <?php endif; ?>
      <?php if(session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>