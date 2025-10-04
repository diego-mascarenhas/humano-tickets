@extends('layouts/layoutMaster')

@section('title', __('Ticket Details'))

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
	<div class="d-flex flex-column justify-content-center">
		<h4 class="mb-1 mt-3"><span class="text-muted fw-light">{{ __('Tickets') }}/</span> #{{ $ticketId }}</h4>
		<p class="text-muted">{{ __('Ticket details and messages') }}</p>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<p>{{ __('Ticket details view placeholder') }}</p>
	</div>
</div>
@endsection

