@component('mail::message')
# Customer Contact

@component('mail::panel')
Name: {{ $request->name }}<br/>
Email: {{ $request->email }}<br/>
Number: {{ $request->number }}<br/>
Message: {{ $request->message }}<br/>
@endcomponent

@component('mail::button', ['url' => url('/properties/' . $property->slug)])
View Property
@endcomponent

Address: {{ $property->address }}
@endcomponent
