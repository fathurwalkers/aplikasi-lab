<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;
use App\Models\Lab;

class Login extends Model
{
    use HasFactory;
    protected $table = "login";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function data()
    {
        return $this->hasMany(Data::class);
    }
}
