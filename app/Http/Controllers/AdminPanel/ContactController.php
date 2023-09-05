<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateContactRequest;
use App\Http\Requests\AdminPanel\UpdateContactRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Flash;

class ContactController extends AppBaseController
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;

        $this->middleware('permission:View ContactUs|Add ContactUs|Edit ContactUs|Delete ContactUs', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add ContactUs', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit ContactUs', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete ContactUs', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $contacts = $this->contactRepository->all();

        return view('AdminPanel.contacts.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.contacts.create');
    }

    public function store(CreateContactRequest $request)
    {
        $input = $request->all();

        $contact = $this->contactRepository->create($input);


        return redirect(route('contacts.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $contact = $this->contactRepository->find($id);

    //     if (empty($contact)) {
    //         Flash::error('Contact not found');

    //         return redirect(route('contacts.index'));
    //     }

    //     return view('contacts.show')->with('contact', $contact);
    // }


    public function edit($id)
    {
        $contact = Contact::findOrFail($id);


        return view('AdminPanel.contacts.edit',get_defined_vars());
    }

    public function update($id, UpdateContactRequest $request)
    {
        $contact = Contact::findOrFail($id);


        $contact = $this->contactRepository->update($request->all(), $id);


        return redirect(route('contacts.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);


        $this->contactRepository->delete($id);


        return redirect(route('contacts.index'))->with('error',__('lang.deleted'));
    }
}