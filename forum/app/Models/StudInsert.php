<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudInsert extends Model
{
	protected $table = 'posts';
	public $timestamps = true;
	protected $fillable = [
		'title', 
		'body',
		'user_id'
		
	];
}