@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : 'bg-warmbrown' }} {!! $attributes->merge(['class' => 'border-lightgray focus:border-lightbrown dark:focus:border-lightbrown focus:ring-brown-500 dark:focus:ring-lightbrown rounded-md shadow-sm']) !!}>
