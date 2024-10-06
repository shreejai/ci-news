<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model {
  protected $table = 'cars';
  protected $primaryKey = 'id';
  protected $allowedFields = ['license_plate', 'license_state', 'vin', 'colour', 'make', 'model', 'year'];
  // protected $useTimestamps = true;
  // protected $createdField  = 'created_at';
  // protected $updatedField  = false;
  // protected $returnType = 'array';
}

