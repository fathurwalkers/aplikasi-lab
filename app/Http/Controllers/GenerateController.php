<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Barang;
use App\Models\Invoice;
use App\Models\Lab;
use App\Models\Penawaran;

class GenerateController extends Controller
{
    public function generate_pengguna()
    {
        $faker = Faker::create('id_ID');

        $jenis_kelamin = ["L", "P"];

        for ($i=0; $i < 20; $i++) {
            // DATA
            $data_nama = $faker->name();
            $data_telepon = $faker->phoneNumber();
            $data_jeniskelamin = Arr::random($jenis_kelamin);
            $data_kode = strtoupper(Str::random(8));

            // LOGIN
            $login_model            = new Login;
            $password               = '12345';
            $hashPassword           = Hash::make($password, [
                'rounds' => 12,
            ]);
            $token_raw              = Str::random(16);
            $token                  = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level                  = "user";
            $login_status           = "verified";
            $random_email           = "mail" . strtolower(Str::random(5)) . "@gmail.com";
            $login_data = $login_model->create([
                'login_nama'        => $data_nama,
                'login_username'    => 'user' . $i . strtolower(Str::random(5)),
                'login_password'    => $hashPassword,
                'login_email'       => $random_email,
                'login_telepon'     => $data_telepon,
                'login_token'       => $token,
                'login_level'       => $level,
                'login_status'      => $login_status,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $login_data->save();

            $data = new Data;
            $save_data = $data->create([
                "data_nama" => $data_nama,
                "data_telepon" => $data_telepon,
                "data_jeniskelamin" => $data_jeniskelamin,
                "data_kode" => $data_kode,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_data->save();
            $save_data->login()->associate($login_data->id);
            $save_data->save();
        }
    }

    public function generate_default_pengguna()
    {
        $faker = Faker::create('id_ID');

        $jenis_kelamin = ["L", "P"];

        // DATA
        $data_nama = $faker->name();
        $data_telepon = $faker->phoneNumber();
        $data_jeniskelamin = Arr::random($jenis_kelamin);
        $data_kode = strtoupper(Str::random(8));

        // LOGIN
        $login_model            = new Login;
        $password               = '12345';
        $hashPassword           = Hash::make($password, [
            'rounds' => 12,
        ]);
        $token_raw              = Str::random(16);
        $token                  = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level                  = "user";
        $login_status           = "verified";
        $random_email           = "mail" . strtolower(Str::random(5)) . "@gmail.com";
        $login_data = $login_model->create([
            'login_nama'        => $data_nama,
            'login_username'    => "example",
            'login_password'    => $hashPassword,
            'login_email'       => $random_email,
            'login_telepon'     => $data_telepon,
            'login_token'       => $token,
            'login_level'       => $level,
            'login_status'      => $login_status,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
        $login_data->save();

        $data = new Data;
        $save_data = $data->create([
            "data_nama" => $data_nama,
            "data_telepon" => $data_telepon,
            "data_jeniskelamin" => $data_jeniskelamin,
            "data_kode" => $data_kode,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $save_data->save();
        $save_data->login()->associate($login_data->id);
        $save_data->save();
    }
}
