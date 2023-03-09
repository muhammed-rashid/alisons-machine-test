<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
class Company extends Model
{
    use HasFactory,Notifiable;
    protected $fillable =['name','email','logo','website'];
    protected $appends =['logo_url'];

    public function getLogoUrlAttribute(){
        return Storage::disk('public')->url('company/'.$this->logo);
    }
}
