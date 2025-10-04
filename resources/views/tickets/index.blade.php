@extends('layouts/layoutMaster')

@section('title', __('Tickets'))

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
	<div class="d-flex flex-column justify-content-center">
		<h4 class="mb-1 mt-3">{{ __('Tickets') }}</h4>
		<p class="text-muted">{{ __('Manage support tickets') }}</p>
	</div>
	@can('ticket.create')
	<div class="mt-3 mt-md-0">
		<a href="{{ route('tickets.create') }}" class="btn btn-primary">
			<i class="ti ti-plus me-1"></i> {{ __('New Ticket') }}
		</a>
	</div>
	@endcan
</div>

<div class="card">
	<div class="card-body">
		<p>{{ __('Tickets list view placeholder') }}</p>
	</div>
</div>
@endsection

