<?php

namespace Module\Sicurezza\Models;
use Pure\Model;

class CodiceAteco extends Model
{
	public static function define($schema)
	{
		$schema->id();
		$schema->char('name');
		$schema->char('description', 50)->nullable();
		$schema->boolean('active')->default(true);
	}
}

?>
