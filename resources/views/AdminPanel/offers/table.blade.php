<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">

    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.trips') }}</th>
            <th class="min-w-250px">{{ __('lang.start_date') }}</th>
            <th class="min-w-250px">{{ __('lang.end_date') }}</th>
            <th class="min-w-250px">{{ __('lang.type') }}</th>
            <th class="min-w-250px">{{ __('lang.value') }}</th>
            <th class="min-w-150px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($offers as $offer)
            <tr>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $offer->trip->name }}</span>
                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $offer->start_date }}</span>
                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $offer->end_date }}</span>
                </td>
                <td>
                    <span class="fs-7 fw-bold">{{ __('lang.'.$offer->typestring) }}</span>

                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $offer->value }}</span>
                </td>
                <td>
                    @if(auth()->user()->can('Edit Offer'))
                        <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-sm btn-light me-2">
                        <i class="bi bi-pencil-square"></i>
                        </a>
                    @endif
                    @if(auth()->user()->can('Delete Offer'))
                        <form method="POST" action="{{ route('offers.destroy', $offer->id) }}"
                        style="display: inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger me-2">
                            <i class="bi bi-file-x-fill"></i>
                        </button>
                        </form>
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->




<script>
    $(document).ready(function() {
        var table = $('#kt_datatable_dom_positioning').DataTable({
            "searching": true,
            "ordering": true,
            responsive: true,
        });
    });


</script>
