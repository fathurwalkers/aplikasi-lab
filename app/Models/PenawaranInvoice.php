<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranInvoice extends Model
{
    use HasFactory;
    protected $table = 'penawaran_invoice';
    protected $guarded = [];
    protected $primaryKey = 'id';
}
