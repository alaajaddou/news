<x-mail::message>
    # New Contact Form Submission

    You’ve received a new message from the contact form on your website.

    **Name:** {{ $contact->name }}
    **Email:** {{ $contact->email }}

    **Message:**

    {{ $contact->message }}

    <x-mail::button :url="'mailto:' . $contact->email">
        Reply to {{ $contact->name }}
    </x-mail::button>

    Thanks,
    **Aj Group System**
</x-mail::message>
