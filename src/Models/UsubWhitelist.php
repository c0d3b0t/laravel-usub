<?php

namespace Usub\Models;

use Illuminate\Database\Eloquent\Model;

class UsubWhitelist extends Model
{
	protected $table = 'usub_whitelist';

	protected $fillable = [
		'ip_address',
		'note',
		'created_at'
	];

	public $timestamps = false;
}