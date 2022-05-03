<?php

namespace TrungPhuNA\Admin\Http\Controllers\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TrungPhuNA\Admin\Entities\Contact;

class AdminContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderByDesc('id')->paginate(10);
        return view('admin::pages.contact.index', compact('contacts'));
    }

    public function delete(Request $request, $id)
    {
        Contact::find($id)->delete();
        return redirect()->back();
    }
}
