<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario para editar ') . $store->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-info />
                {!! Form::model($store, ['route' => ['tiendas.update', $store], 'method' => 'put',  'atocomplete' => 'off']) !!}
                @include('admin.stores.partials.form')
                <div class="w-full py-3 text-right " >
                    <x-btn-cancel>
                        <x-slot name='to'>{{route('tiendas.index')}}</x-slot>
                        <x-slot name='label'>{{__('Volver a la lista')}}</x-slot>
                    </x-btn-cancel>
                    <x-btn-send>
                        <x-slot name='label'>{{__('Editar')}}</x-slot>
                    </x-btn-send>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
