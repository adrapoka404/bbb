<x-table>
    <x-slot name='btn'>
        <x-btn-create>
            <x-slot name='to'>{{ route('almacenes.create') }}</x-slot>
            <x-slot name='label'>{{ __('Nuevo almacen') }}</x-slot>
        </x-btn-create>
    </x-slot>
    <x-slot name="th">
        @foreach ($headers as $header)
            <x-table-th>{{ $header }}</x-table-th>
        @endforeach
    </x-slot>
    @if ($werehouses->count() > 0)
    <x-slot name='row_body'>
        @foreach ($werehouses as $werehouse)
            
                <x-row-body>
                    <x-table-td>{{ $werehouse->code }}</x-table-td>
                    <x-table-td>{{ $werehouse->name }}</x-table-td>
                    <x-table-td>
                        @if ($werehouse->status == 0)
                            <span class="bg-red-200 rounded-full px-3 ">{{ __('Desactivado') }}</span>
                        @else
                            <span class="bg-green-200 rounded-full px-3 ">{{ __('Activado') }}</span>
                        @endif
                    </x-table-td>
                    <x-table-td>
                        <x-btn-edit>
                            <x-slot name='to'>
                                {{ route('almacenes.edit', $werehouse->id) }}
                            </x-slot>
                            <x-slot name='label'>
                                {{ __('Editar') }}
                            </x-slot>
                        </x-btn-edit>
                    </x-table-td>
                </x-row-body>
            
        @endforeach
    </x-slot>
    @else
        <x-slot name='row_body'>
            <x-row-body>
                <x-table-td-empty>
                    <x-slot name='colspan'>4</x-slot>
                </x-table-td-empty>
            </x-row-body>
        </x-slot>
    @endif
    <x-slot name='links'>
        <x-table-foot>
            <x-slot name='colspan'>4</x-slot>
            <x-slot name='links'>
                {{ $werehouses->links() }}
            </x-slot>
        </x-table-foot>
    </x-slot>
</x-table>
