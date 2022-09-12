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
            {{ __('Configuración 1:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        {!! Form::text('config_1', old('config_1'), ['class' => 'w-full rounded-xl']) !!}
        @error('config_1')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>
<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Configuración 2:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        {!! Form::text('config_2', old('config_2'), ['class' => 'w-full rounded-xl']) !!}
        @error('config_2')
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
                    @if (isset($zone) && $zone->user_id == $user->id)
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
            {{ __('Almacen:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        <select name="werehouse_id" class="w-full rounded-xl">
            <option>{{ __('Almacen') }}</option>
            @foreach ($werehouses as $werehouse)
                @if (old('werehouse_id') == $werehouse->id)
                    <option value="{{ $werehouse->id }}" selected>{{ $werehouse->name }}</option>
                @else
                    @if (isset($zone) && $zone->werehouse_id == $werehouse->id)
                        <option value="{{ $werehouse->id }}" selected>{{ $werehouse->name }}</option>
                    @else
                        <option value="{{ $werehouse->id }}">{{ $werehouse->name }}</option>
                    @endif
                @endif
            @endforeach
        </select>
        @error('werehouse_id')
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
