@props([
    'value' => '',
    'label' => '',
    'options' => '',
])

<div class="easyMde">
    <x-moonshine::form.textarea
        :attributes="$attributes"
        x-data="easyMde({{ $options }})"
    >{!! $value ?? '' !!}</x-moonshine::form.textarea>
</div>
