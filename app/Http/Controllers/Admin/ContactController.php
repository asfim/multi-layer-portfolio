<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('admin.contacts.index', compact('messages'));
    }

    public function markAsRead(int $id): RedirectResponse
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->update(['is_read' => true]);

        return back()->with('success', 'Message marked as read.');
    }

    public function destroy(int $id): RedirectResponse
    {
        ContactMessage::findOrFail($id)->delete();

        return back()->with('success', 'Contact message deleted.');
    }
}
