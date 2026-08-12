<x-mail::message>
Hi {{ $new->display_name }},

We've merged your accounts `{{ $old }}` and `{{ $new->metadata->get('previous_username') ?? $new->username }}` as they were both using the same email address.

Your closet and wishlist from both accounts have been combined, and your new username is `{{ $new->username }}`.

You can feel free to change it in your settings.

<x-mail::button url="route('profile')">
My Settings
</x-mail::button>

Apologies for any inconvenience,<br>
Lolibrary Admins

<x-mail::subcopy>
If you have any questions, please message us via `admin@lolibrary.org` or in the `#feedback` channel on the <a
        href="{{ config('app.discord.invite-link') }}">Lolibrary Discord</a>.

We've tried to take the latest account that was in use when deciding which account to merge, but your other username is now free if you'd like to change it back.
</x-mail::subcopy>
</x-mail::message>
