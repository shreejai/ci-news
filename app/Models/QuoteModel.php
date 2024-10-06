<?php

namespace App\Models;

use CodeIgniter\Model;

class QuoteModel extends Model
{
    protected $table = 'quotes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['quote_id', 'car_id', 'repairer', 'license_plate', 'quote_amount', 'quote_description'];

}