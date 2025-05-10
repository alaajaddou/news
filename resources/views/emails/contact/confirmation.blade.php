<x-mail::message>
    # Thank You, {{ $contact->name }}

    We’ve received your message and are thrilled you reached out to <strong>Aj Group</strong>.
    Our team will review your inquiry and get back to you as soon as possible.

    If you need urgent assistance, contact us at
    <a href="mailto:info@aj-group.ps">info@aj-group.ps</a>.

    <x-mail::button :url="config('app.url')">
        Visit Our Website
    </x-mail::button>

    Thanks again,
    <strong>Aj Group Team</strong>
</x-mail::message>
