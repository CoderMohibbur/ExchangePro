<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // সব টিকিট দেখানো
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    // নির্দিষ্ট স্ট্যাটাসের টিকিট দেখানো
    public function filter($status)
    {
        $tickets = Ticket::where('status', $status)->get();
        return view('tickets.index', compact('tickets', 'status'));
    }

    // নতুন টিকিট তৈরি করা
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Ticket::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => 'Pending',
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }
    public function destroy(Ticket $ticket)
    {
        // Delete the ticket
        $ticket->delete();

        // Redirect back with a success message
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
