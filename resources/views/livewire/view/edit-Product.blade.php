<x-layouts.app>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Editar Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras editar un item') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="shadow-lg bg-white max-w-lg mx-auto mt-8 p-6">
        <p class="text-gray-700 text-lg">Editar Nuevo Item</p>

        <form 
            action="{{ route('products.update', $product->id) }}" 
            method="post"
            class="space-y-6">

            @csrf
            @method('PUT')

            <flux:label for="name">Nombre</flux:label>
            <flux:input 
            name="name"
            id="name"
            value="{{ $product->name }}"/>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            
            <flux:label for="category">Categoria</flux:label>
            <flux:input 
            name="category"
            id="category"
            value="{{ $product->category }}"/>
            @error('category')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            
            <flux:label for="stock_min">Cantidad Minima</flux:label>
            <flux:input
            type="number"
            name="stock_min"
            id="stock_min"
            value="{{ $product->stock_min }}"/>
            @error('stock_min')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            

            
            <flux:label for="stock_max">Cantidad maxima</flux:label>
            <flux:input 
            name="stock_max"
            id="stock_max"
            value="{{ $product->stock_max }}"/>
            @error('stock_max')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            
            <flux:label for="date">Fecha</flux:label>
            <flux:input 
            type="date"
            name="date"
            id="date"
            value="{{ $product->date }}"/>
            @error('date')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            {{-- Botón --}}
            <flux:button type="submit" class="w-full justify-center">
                Guardar
            </flux:button>
        </form>
    </div>

</x-layouts.app>
