@if ($expandable == true)
    <tr data-widget="expandable-table" aria-expanded="false">
        {{ $slot }}
    </tr>
    <tr class="expandable-body d-none">
        <td colspan="{{ $columns }}">
            <p style="display: none;">
                {{ $description }}
            </p>
        </td>
    </tr>
@else
    <tr>
        {{ $slot }}
    </tr>
@endif
