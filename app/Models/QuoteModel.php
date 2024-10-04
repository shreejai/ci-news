<?php

namespace App\Models;

use CodeIgniter\Model;

class QuoteModel extends Model
{
    protected $table = 'quotes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['quote_id', 'car_id', 'quote_amount', 'quote_description'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = false;
}