<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::latest()->paginate(15);
        $unreadCount = Message::where('is_read', false)->count();
        
        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }
    
    /**
     * Display deleted messages
     */
    public function deleted()
    {
        $messages = Message::onlyTrashed()->latest('deleted_at')->paginate(15);
        $deletedCount = Message::onlyTrashed()->count();
        
        return view('admin.messages.deleted', compact('messages', 'deletedCount'));
    }
    
    /**
     * Restore a deleted message
     */
    public function restore($id)
    {
        $message = Message::onlyTrashed()->findOrFail($id);
        $message->restore();
        
        return redirect()->route('admin.messages.deleted')->with('success', 'Message restored successfully!');
    }
    
    /**
     * Permanently delete a message
     */
    public function forceDelete($id)
    {
        $message = Message::onlyTrashed()->findOrFail($id);
        $message->forceDelete();
        
        return redirect()->route('admin.messages.deleted')->with('success', 'Message permanently deleted!');
    }



    /**
     * Display the specified resource.
     *
     * @param  Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // Mark as read when viewed
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Mark message as read/unread
     *
     * @param  Message  $message
     * @return \Illuminate\Http\Response
     */
    public function toggleRead(Message $message)
    {
        $message->update(['is_read' => !$message->is_read]);
        
        return redirect()->back()->with('success', 'Message status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        
        return redirect()->route('admin.messages.index')
                        ->with('success', 'Message deleted successfully.');
    }
}
