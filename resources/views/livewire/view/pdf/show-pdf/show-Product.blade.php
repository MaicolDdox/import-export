<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf</title>
</head>

<body>
    <div class="w-full align-middle text-center">
        <h1 class="text-gray-700 text-lg">Producto {{ $product->name }}</h1>
    </div>

    <div class="bg-white shadow-lg w-full overflow-auto">

        <table class="text-left">
            <thead>
                <th class="text-gray-500 text-base px-6 py-4">Nombre</th>
                <th class="text-gray-500 text-base px-6 py-4">Categoria</th>
                <th class="text-gray-500 text-base px-6 py-4">Cantidad Minima</th>
                <th class="text-gray-500 text-base px-6 py-4">Cantidad Maxima</th>
                <th class="text-gray-500 text-base px-6 py-4">Fecha</th>
            </thead>
            <tbody class="divide-y divide-gray-400">

                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->category }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock_min }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock_max }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->date }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
