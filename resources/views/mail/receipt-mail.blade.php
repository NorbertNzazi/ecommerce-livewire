<x-mail::message>
    # Payment Receipt

    **Transaction ID:** {{ $transaction_id }}
    **Date:** {{ $date }}
    **Customer:** {{ $name }}

    ---

    ## Description: {{ $description }}

    ---

    **Total:** R{{ $amount }}

    ---

    *Note: This is a pament receipt for your recent purchase. If you have any questions or concerns, please feel free
    to contact us. Thank you for your business!*

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
