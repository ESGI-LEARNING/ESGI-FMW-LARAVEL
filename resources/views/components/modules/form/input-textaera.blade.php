@props(['disabled' => false, 'value' => null])

<textarea {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} rows="5" cols="50">{!! $value !!}</textarea>
