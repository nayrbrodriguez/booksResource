<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
   	use SoftDeletes;


	protected $fillable = [
	    'title',
	    'author'
	    
	];



} 
