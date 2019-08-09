<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // menambahkan fungsi soft delete

class Student extends Model
{
    use SoftDeletes; // menambahkan fungsi soft delete

    // fungsi dari controller store
    // menghindari celah pemalsuan parameter id
    protected $fillable = ['nama', 'nrp', 'email', 'jurusan'];

   
}
