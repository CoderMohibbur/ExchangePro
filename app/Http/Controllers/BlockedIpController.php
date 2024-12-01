<?php

namespace App\Http\Controllers;

use App\Models\BlockedIp;
use Illuminate\Http\Request;

class BlockedIpController extends Controller
{
    // Display a list of blocked IPs
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Query to fetch blocked IPs, with search functionality
        $blockedIps = BlockedIp::when($search, function ($query, $search) {
            return $query->where('ip_address', 'like', "%{$search}%");
        })->paginate(10);

        return view('blocked_ips.index', compact('blockedIps'));
    }

    // Store a newly blocked IP
    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip|unique:blocked_ips,ip_address',
        ]);

        BlockedIp::create([
            'ip_address' => $request->ip_address,
        ]);

        return redirect()->route('blocked-ips.index')->with('success', 'IP Blocked successfully');
    }

    // Delete a blocked IP
    public function destroy($id)
    {
        $blockedIp = BlockedIp::findOrFail($id);
        $blockedIp->delete();

        return redirect()->route('blocked-ips.index')->with('success', 'IP Unblocked successfully');
    }
}
