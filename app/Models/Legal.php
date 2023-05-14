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
		'name',
		'name_full',
		'opf',
		'inn',
		'adres1',
		'adres2',
		'fio1',
		'fio2',
		'bank',
		'rcount',
		'kcount',
		'bik',
		'ogrn',
		'inn_bank',
		'kpp',
		'comment',
		'fl',
		'pasport',
		'pasport_dt',
		'pasport_issued',
		'pasport_kod'
		];

	public function client(): BelongsTo
	{
		return $this->belongsTo(
			related: Client::class,
			foreignKey: 'client_id'
			);
	}
}