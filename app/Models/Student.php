<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = ['name', 'idNumber', 'birthday', 'stage', 'fastTest', 'gender', 'room_id', 'location', 'phone', 'fatherIdNumber', 'description', 'year_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }


    public function getGenderAttribute($value){
        return $value == 0 ? 'ذكر' : 'أنثى' ;
    }

    public function getStageAttribute($value){
        if($value == 1){
            return 'البستان';
        } elseif($value == 2){
            return 'التمهيدي';
        } else {
            return 'الحضانة';
        }
    }

    public function finances(){
        return $this->hasMany(Finance::class);
    }

    public function getRoomIdAttribute($value){
        if($value == 1){
            return 'صف الأولاد';
        } elseif($value == 2){
            return 'صف البنات';
        } else {
            return 'صف الحضانة';
        }
    }

}
