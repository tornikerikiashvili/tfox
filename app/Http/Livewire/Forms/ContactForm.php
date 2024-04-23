<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Settings\CommunicationsSettings;

class ContactForm extends Component
{

    public $name;

    public $phone;

    public $email;

    public $comment;

    public $success = null;

    protected $rules = [
        'name' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email:rfc',
        'comment' => 'string',
    ];

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'phone' => 'numeric|min:4',
            'email' => 'required|email:rfc',
            'comment' => 'string',
        ]);
    }

    public function submit()
    {
        $this->validate();


        $formData = \App\Models\Forms\FormFeedback::query()->create([
            'name' => $this->name,
            'phone_number' => $this->phone,
            'email' => $this->email,
            'comment' => $this->comment,
        ]);


        try {
            $communication = app(CommunicationsSettings::class)->toArrayForFrontend();
            $to = data_get($communication, 'contacts.form.contact_form', config('mail.from.address'));
            Mail::to($to)->send(new ContactFormSubmitted($formData));
            $this->success = true;
            $this->resetForm();
        } catch (\Throwable $exception) {

        }

    }

    public function resetForm()
    {
        $this->name = "";
        $this->phone = "";
        $this->email = "";
        $this->comment = "";

    }



    public function render()
    {
        return view('livewire.forms.contact-form');
    }
}
