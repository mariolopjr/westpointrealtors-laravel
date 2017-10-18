@component('mail::message')
# {{ $request->name }}, thank you for contacting us!

We will get back to you as quick as possible. A link to the property you inquired about is located below!

@component('mail::button', ['url' => url('/properties/' . $property->slug)])
View Property
@endcomponent

Address: {{ $property->address }}
@endcomponent
