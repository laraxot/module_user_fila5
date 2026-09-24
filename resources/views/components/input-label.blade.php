<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 350420cb (Check & fix styling)
?>
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
