<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Mail;

class FrontController extends Controller {

    /**
     * Home action, show the list of all published conferences,
     * and desc sorted by date_start
     *
     * @return \Illuminate\View\View
     */
    public function getHome() {
        $posts = Post::all()
            ->sortByDesc('date_start')
            ->where('status', 'publish');

        return view('front.indexPost', compact('posts'));
    }

    /**
     * Search action, show the list of all published conferences,
     * desc sorted by date_start which contain the selected tag
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function postSearch(Request $request) {
        $posts = Tag::find($request->input('tag_id'))
            ->posts
            ->sortByDesc('date_start')
            ->where('status', 'publish');

        return view('front.indexPost', compact('posts'));
    }

    /**
     * Contact action, send a mail to the admin
     *
     * @param Requests\ContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * About action, show the about page
     *
     * @return \Illuminate\View\View
     */
    public function getAbout() {
        return view('front.about');
    }

    /**
     * Contact action, show the contact page
     *
     * @return \Illuminate\View\View
     */
    public function getContact() {
        return view('front.contact');
    }


}
