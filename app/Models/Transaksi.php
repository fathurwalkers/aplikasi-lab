<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "penawaran";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
