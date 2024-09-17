<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
// Seller.php

{
    protected $fillable = ['name', 'email', 'phonenumber', 'country', 'status'];
    use HasFactory;
    
}
