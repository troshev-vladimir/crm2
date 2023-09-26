<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
	use HasFactory;

	protected $fillable = [
		'client_id',
		'1c_kontragent_key',
		'legal_entity', // Юр.лицо
		'legal_address', // юр. адрес
		'address', // фактичекий адрес
		'ogrn',
		'inn',
		'opf',
		'leader_name',
		'accouter_name',
		'bank',
		'bic',
		'inn_bank',
		'kpp',
		'r_count',
		'k_count',
		'comment'
	];

	public function client(): BelongsTo
	{
		return $this->belongsTo(Client::class, 'client_id');
	}
}