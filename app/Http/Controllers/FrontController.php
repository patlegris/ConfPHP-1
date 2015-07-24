<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Captcha;
use Mail;

class FrontController extends Controller {

    public function indexPost() {
        $posts = Post::all()
            ->sortByDesc('date_start')
            ->where('status', 'publish');

        return view('front.indexPost', compact('posts'));
    }

    public function getAbout() {
        return view('front.about');
    }

    public function getContact() {
        return view('front.contact');
    }

    public function postContact(Requests\ContactFormRequest $request) {

        $email = $request->input('email');
        $content = $request->input('content');

        Mail::send('mail.skeleton', compact('email', 'content'), function ($message) use ($email) {
            $message
                ->from($email)
                ->sender(config('mail.from.address'))
                ->to(config('mail.from.address'))
                ->subject('[ConfPHP] Prise de contact');

        });

        return redirect('/')->with('message', 'Email envoyé');
    }
}
