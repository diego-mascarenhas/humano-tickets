<?php

namespace Idoneo\HumanoTickets;

use Idoneo\HumanoTickets\Models\SystemModule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HumanoTicketsServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		$package
			->name('humano-tickets')
			->hasViews()
			->hasRoutes('web')
			->hasMigrations([
				'create_tickets_table',
				'create_ticket_messages_table',
				'create_ticket_attachments_table',
			]);
	}

	public function bootingPackage(): void
	{
		parent::bootingPackage();

		try {
			if (Schema::hasTable('modules')) {
				if (class_exists(\App\Models\Module::class)) {
					\App\Models\Module::updateOrCreate(
						['key' => 'tickets'],
						[
							'name' => 'Tickets',
							'icon' => 'ti ti-ticket',
							'description' => 'Support tickets management system',
							'is_core' => false,
							'status' => 1,
						]
					);
				} else {
					SystemModule::query()->updateOrCreate(
						['key' => 'tickets'],
						[
							'name' => 'Tickets',
							'icon' => 'ti ti-ticket',
							'description' => 'Support tickets management system',
							'is_core' => false,
							'status' => 1,
						]
					);
				}
			}
		} catch (\Throwable $e) {
			Log::debug('HumanoTickets: module registration skipped: ' . $e->getMessage());
		}

		// Ensure permissions exist for menus and access
		try {
			if (Schema::hasTable('permissions') && class_exists(Permission::class)) {
				$permissions = [
					'ticket.list',
					'ticket.show',
					'ticket.create',
					'ticket.edit',
					'ticket.destroy',
				];

				foreach ($permissions as $name) {
					Permission::firstOrCreate(['name' => $name], ['guard_name' => 'web']);
				}

				$adminRole = class_exists(Role::class) ? Role::where('name', 'admin')->first() : null;
				if ($adminRole) {
					$adminRole->givePermissionTo($permissions);
				}
			}
		} catch (\Throwable $e) {
			Log::debug('HumanoTickets: permissions setup skipped: ' . $e->getMessage());
		}
	}
}

