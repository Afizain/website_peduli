<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $primaryKey = 'id_dataDiri';
    protected $table ='data_diris';
    protected $fillable = ['nama_lengkap','no_telp','nama_perumahan','rt','rw','photo'];
    
    // public function user(){
    //     return $this->belongsTo(User::class, 'id_user');
    // }
}