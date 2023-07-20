<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penawaran;

class Jasa extends Model
{
    use HasFactory;
    protected $table = "jasa";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class);
    }
}
