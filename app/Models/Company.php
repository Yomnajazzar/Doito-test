<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo'
    ];

    protected $appends = ['logo_path'];

    public function employees(){
        return $this->hasMany(Employee::class , 'company_id');
    }

    public function getLogoPathAttribute(){
        return asset('storage/images/' . $this->logo); // https://127.0.0.1:8000/storage/images/ASUS WALLPAPER (1).jpg
    }



}
