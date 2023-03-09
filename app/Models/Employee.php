<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','company','email','phone'];
    protected $appends = ['full_name'];

    public function companyDetail(){
        return $this->belongsTo(Company::class,'company');
    }

    public function getFullnameAttribute(){
        return $this->first_name." ".$this->last_name;
    }
}
