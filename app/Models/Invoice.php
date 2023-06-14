<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;
use App\Models\Penawaran;
use App\Models\Transaksi;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "invoice";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function penawaran()
    {
        return $this->belongsToMany(Penawaran::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
