<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use App\Models\Data;

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

    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
