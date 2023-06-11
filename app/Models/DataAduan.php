<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAduan extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $primaryKey = 'id_aduan';
    protected $table ='data_aduans';
    protected $fillable = ['statement','bukti_foto','id_user'];    
    
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}