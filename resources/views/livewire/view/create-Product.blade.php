<x-layouts.app>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Crear Nuevo Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras crear un nuevo item') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="shadow-lg bg-white max-w-lg mx-auto mt-8 p-6">
        <p class="text-gray-700 text-lg">Crear Nuevo Item</p>

        <form 
            action="{{ route('products.store') }}" 
            method="post"
            class="space-y-6">

            @csrf 

            <flux:label for="name">Nombre</flux:label>
            <flux:input 
            name="name"
            id="name"
            placeholder="Escribe el Nombre Del Producto...."/>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            
            <flux:label for="category">Categoria</flux:label>
            <flux:input 
            name="category"
            id="category"
            placeholder="Escribe La Categoria Correspondiente...."/>
            @error('category')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            
            <flux:label for="stock_min">Cantidad Minima</flux:label>
            <flux:input
            type="number"
            name="stock_min"
            id="stock_min"
            placeholder="Ingrese la Cantidad minima...."/>
            @error('stock_min')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            

            
            <flux:label for="stock_max">Cantidad maxima</flux:label>
            <flux:input 
            name="stock_max"
            id="stock_max"
            placeholder="Ingrese la cantidad maxima del prouecto...."/>
            @error('stock_max')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            
            <flux:label for="date">Fecha</flux:label>
            <flux:input 
            type="date"
            name="date"
            id="date"
            placeholder="Escribe la Fecha"/>
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
