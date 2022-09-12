<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th colspan='4' scope="col" class="py-3 px-6">
                    {{$btn}}
                </th>
            </tr>
            <tr>
                {{$th}}
            </tr>
        </thead>
        <tbody>
            {{$row_body}}
        </tbody>
        <tfoot>
            <tr>
                {{$links}}
            </tr>
        </tfoot>
    </table>
</div>
