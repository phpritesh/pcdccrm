<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rkpkgs\Userstamps\UserstampsTrait;
use Carbon\Carbon;
class Masterimport extends Model
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
		'import_success',
		'import_fail',
		'status',
        'deletable',
    ];
	
	public function  getCreatedAtAttribute($value){
		return Carbon::parse($value)->format('d-M-Y');
	}


}
