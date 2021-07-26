<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rkpkgs\Userstamps\UserstampsTrait;
use Carbon\Carbon;
class SubIndustry extends Model
{
    use SoftDeletes;
    use UserstampsTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'deletable',
    ];
	
	public function  getCreatedAtAttribute($value){
		return Carbon::parse($value)->format('d-M-Y');
	}


}
