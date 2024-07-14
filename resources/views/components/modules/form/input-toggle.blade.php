<label class="flex justify-start items-center cursor-pointer relative p-2">
    {{ $label }}
    <input type="checkbox" class="peer hidden" name="{{ $name }}" id="{{ $label }}" @if($value === true) checked @endif>
    <span
        class="bg-gray-300 w-11 h-6 rounded-full flex flex-shrink-0 items-center after:bg-white after:w-4 after:h-4 after:rounded-full p-1 peer-checked:bg-gray-800 peer-checked:after:translate-x-5 ease-in-out duration-300 after:duration-300 ml-2"></span></label>
