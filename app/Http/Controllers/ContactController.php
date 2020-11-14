<?php

namespace App\Http\Controllers;

use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Admin;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function mailToAdmin(ContactFormRequest $message, Admin $admin)
    {
        //send the admin an notification
        $admin->notify(new InboxMessage($message));
        // redirect the user back
        return redirect()->back()->with('message', 'Дякую за звернення! Ваше повідомлення успішно відправлено адміністратору сайту!');
    }
}
