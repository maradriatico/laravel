<x-layout>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Empleados</h1>
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Nombre
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Fecha Alta
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Salario
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Departamento
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($empleados as $emple)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $emple->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $emple->fecha_alt }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $emple->salario }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $emple->depart_id }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="px-4 py-1 text-sm text-white bg-red-400 rounded">Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
                <a href="/emple/create" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo empleado</a>
            </div>
        </div>
    </div>
</x-layout>
