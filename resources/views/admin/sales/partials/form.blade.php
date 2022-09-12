<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Cantidad:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        {!! Form::text('quantity', old('quantity'), ['class' => 'w-full rounded-xl']) !!}
        @error('quantity')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>
<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Fecha:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        {!! Form::date('date', $today, ['class' => 'w-full rounded-xl', 'id' => 'notoday']) !!}
        @error('date')
            <x-error-input>{{ $message }}</x-error-input>
        @enderror
    </div>
</div>
<div class="w-full flex flex-row my-3 ">
    <div class="flex-1 text-right mr-2 items-center">
        <span class=" text-gray-500 tracking-widest items-center my-auto">
            {{ __('Tienda:') }}
        </span>
    </div>
    <div class="flex-1 ml-2">
        <select name="store_id" class="w-full rounded-xl">
            <option>{{ __('Tienda') }}</option>
            @foreach ($stores as $store)
                @if (old('store_id') == $store->id)
                    <option value="{{ $store->id }}" selected>{{ $store->name }}</option>
                @else
                    @if (isset($sale) && $sale->store_id == $store->id)
                        <option value="{{ $store->id }}" selected>{{ $store->name }}</option>
                    @else
                        @if (isset($session_store) && $session_store->id == $store->id)
                            <option value="{{ $store->id }}" selected>{{ $store->name }}</option>
                        @else
                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endif
                    @endif
                @endif
                @endforeach
        </select>
        @error('store_id')
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
@section('jqueryui')
<script>
    $(document).ready(function(){
        console.log('Hay jquery');
    })
</script>
    
@endsection
