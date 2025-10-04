<?php

namespace Idoneo\HumanoTickets\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class TicketController extends BaseController
{
	public function index()
	{
		return view('humano-tickets::tickets.index');
	}

	public function show($id)
	{
		return view('humano-tickets::tickets.show', ['ticketId' => $id]);
	}

	public function create()
	{
		return view('humano-tickets::tickets.create');
	}
}

