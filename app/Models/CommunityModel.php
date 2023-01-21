<?php

namespace App\Models;

use CodeIgniter\Model;

class CommunityModel extends Model
{
    protected $table      = 'community';
    protected $primaryKey = 'id_community';
    protected $allowedFields = ['name', 'description', 'thumbnail','slug'];
}