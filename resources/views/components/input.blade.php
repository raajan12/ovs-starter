<div class=" py-2 ">
    <label for="{{$name}}" class="sr-only">{{$label}}</label>
    <input
      id="{{$name}}"
      name="{{$name}}"
      type="{{$type}}"
      autocomplete="current-password"
      required
      class="
        appearance-none
        rounded-none
        relative
        block
        w-full
        px-3
        py-2
        border border-gray-300
        placeholder-gray-500
        text-gray-900
        rounded-b-md
        focus:outline-none
        focus:ring-indigo-500
        focus:border-indigo-500
        focus:z-10
        sm:text-sm
      "
      value="{{ old($name) }}"
      placeholder="{{$placeholder}}"
    />
<ul>

    <li></li>
</ul>
@if ($error ?? true)
    @error($name)
    <span class="text-xs  text-red-600">
        {{ $message }}
    </span>
    @enderror
@endif

  </div>