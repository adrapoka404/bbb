<x-table>
    <x-slot name='btn'>
        <x-btn-create>
            <x-slot name='to'>{{ route('ventas.create') }}</x-slot>
            <x-slot name='label'>{{ __('Registrar ventas') }}</x-slot>
        </x-btn-create>    
        
    </x-slot>
    <x-slot name="th">
        @foreach ($headers as $header)
            <x-table-th>{{ $header }}</x-table-th>
        @endforeach
    </x-slot>
    @if ($sales->count() > 0)
        <x-slot name='row_body'>
            @foreach ($sales as $sale)
                <x-row-body>
                    <x-table-td>{{ $sale->id }}</x-table-td>
                    <x-table-td>{{ $sale->store->name }}</x-table-td>
                    <x-table-td>{{ $sale->quantity }}</x-table-td>
                    <x-table-td>{{ $sale->date }}</x-table-td>
                    <x-table-td>
                        <x-btn-edit>
                            <x-slot name='to'>
                                {{ route('ventas.edit', $sale->id) }}
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
                {{ $sales->links() }}
            </x-slot>
        </x-table-foot>
    </x-slot>
</x-table>
