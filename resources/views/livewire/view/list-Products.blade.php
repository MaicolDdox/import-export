<x-layouts.app>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Lista de Items') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras ver el listado de los Items') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    {{-- Success --}}
    @if (session('success'))
        <div class="bg-green-200 max-w-sm w-full shadow-lg mt-8 p-3 rounded-r-lg">
            <span class="text-sm text-gray-500">{{ session('success') }}</span>
        </div>
    @endif

    <flux:button class="mb-4" href="{{ route('pdf.generar') }}" icon="document-arrow-down">
        Descargar Reporte PDF
    </flux:button>


    <div class="bg-white shadow-lg w-full overflow-auto">

        @if ($products->isEmpty())

            <div class="bg-white max-w-lg mx-auto shadow-lg mt-8 p-6">
                <span class="text-lg text-gray-500"> No tienes ningun Producto creado </span>
            </div>
        @else
            <table class="text-left">
                <thead>
                    <th class="text-gray-500 text-base px-6 py-4">Nombre</th>
                    <th class="text-gray-500 text-base px-6 py-4">Categoria</th>
                    <th class="text-gray-500 text-base px-6 py-4">Cantidad Minima</th>
                    <th class="text-gray-500 text-base px-6 py-4">Cantidad Maxima</th>
                    <th class="text-gray-500 text-base px-6 py-4">Fecha</th>
                    <th class="text-gray-500 text-base px-6 py-4">Acciones</th>
                </thead>
                <tbody class="divide-y divide-gray-400">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->category }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock_min }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock_max }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->date }}</td>
                            <td>
                                <flux:dropdown>
                                    <flux:button icon:trailing="chevron-down">Options</flux:button>
                                    <flux:menu>
                                        <flux:menu.item href="{{ route('products.edit', $product->id) }}"
                                            icon="document-duplicate">
                                            Edit
                                        </flux:menu.item>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('¿Está seguro que desea eliminar este producto?')">
                                            @csrf
                                            @method('DELETE')
                                            <flux:menu.item as="button" type="submit" variant="danger"
                                                icon="trash">
                                                Delete
                                            </flux:menu.item>
                                        </form>
                                    </flux:menu>
                                </flux:dropdown>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


</x-layouts.app>
