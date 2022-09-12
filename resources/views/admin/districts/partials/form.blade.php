<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Nombre:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        {!! Form::text('name', old('name'), ['class' => 'w-full rounded-xl']) !!}
        @error('name')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>
<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Código:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        {!! Form::text('code', old('code'), ['class' => 'w-full rounded-xl']) !!}
        @error('code')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>
<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Gerente:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        <select name="user_id" class="w-full rounded-xl">
            <option>{{ __('Gerente') }}</option>
            @foreach ($users as $user)
                @if (old('user_id') == $user->id)
                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                @else
                    @if (isset($district) && $district->user_id == $user->id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endif
            @endforeach
        </select>
        @error('user_id')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>

<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Zona:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        <select name="zone_id" class="w-full rounded-xl">
            <option>{{ __('Zona') }}</option>
            @foreach ($zones as $zone)
                @if (old('zone_id') == $zone->id)
                    <option value="{{ $zone->id }}" selected>{{ $zone->name }}</option>
                @else
                    @if (isset($district) && $district->zone_id == $zone->id)
                        <option value="{{ $zone->id }}" selected>{{ $zone->name }}</option>
                    @else
                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                    @endif
                @endif
            @endforeach
        </select>
        @error('zone_id')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>
<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Estado:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        {!! Form::select('status', ['1' => 'Activado', '0' => 'Desactivado'], old('status'), [
            'class' => 'w-full rounded-xl',
        ]) !!}
        @error('status')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>
