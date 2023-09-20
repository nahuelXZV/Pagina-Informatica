<x-app-layout :type="'nav'">
    <div class="relative w-full px-4 py-4 mx-auto  bg-white rounded-lg shadow ">
        <div class="flex items-center justify-between mb-10">
            <p class="text-2xl font-bold text-gray-800 uppercase">
                Plan de estudio (187-3)
            </p>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-800 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nivel
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sigla
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Materia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Credito
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pre-requisito
                        </th>
                        <th scope="col" class="px-6 py-3">
                            HT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contenido
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plan_estudio as $key => $materias)
                        <tr
                            class="border-b border-gray-300 hover:bg-gray-100 @if ($key % 5 == 0) bg-gray-50 @endif">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $materias['nivel'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $materias['sigla'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $materias['nombre'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $materias['credito'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $materias['requisitos'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $materias['ht'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $materias['hp'] }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="  {{ $materias['pdf'] }}" target="_blank"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    </div>
</x-app-layout>
