<?php

namespace HumanoTickets\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class TicketsPermissionsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Tickets permissions
		Permission::firstOrCreate(['name' => 'ticket.index']);
		Permission::firstOrCreate(['name' => 'ticket.list']);
		Permission::firstOrCreate(['name' => 'ticket.create']);
		Permission::firstOrCreate(['name' => 'ticket.show']);
		Permission::firstOrCreate(['name' => 'ticket.edit']);
		Permission::firstOrCreate(['name' => 'ticket.store']);
		Permission::firstOrCreate(['name' => 'ticket.update']);
		Permission::firstOrCreate(['name' => 'ticket.destroy']);
	}
}

