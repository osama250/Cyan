<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.main_photo') }}</th>
            <th class="min-w-250px">{{ __('lang.name') }}</th>
            <th class="min-w-150px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($trips as $trip)
        <tr>
            <td>
                <span class="badge badge-light-success fs-7 fw-bold cursor-pointer symbol symbol-35px">
                    <img onerror="this.onerror=null;this.src='{{asset('assets/media/svg/files/blank-image.svg')}}'"
                        src="{{$trip->main_photo}}" class="rounded-3" a>
                </span>
            </td>
            <td>
                <span class="badge badge-light-success fs-7 fw-bold">{{ $trip->name }}</span>
            </td>
            <td>
                @if(auth()->user()->can('Edit Trip'))
                <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-sm btn-light me-2">
                    <i class="bi bi-pencil-square"></i>
                </a>
                @endif
                @if(auth()->user()->can('Delete Trip'))
                <form method="POST" action="{{ route('trips.destroy', $trip->id) }}"
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
        $('#kt_datatable_dom_positioning').dataTable({
            "searching": true,
            "ordering": true,
            responsive: true,
        });
    });
</script>
