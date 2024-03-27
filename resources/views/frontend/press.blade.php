@extends('frontend.layouts.app')
@section('content')
 <!-- Page Heading -->
 <div class="header-banner wrapper wow animate__animated animate__fadeIn">
    <div class="container">
        <h3 class="m-0 text-white fw-bold">Press Release</h3>
        <p>Register Your Complain Below</p>
    </div>
</div>
<!-- Page Heading Ends -->
<div class="container">
    <form action="{{ route('pressRelease') }}" method="GET">
    <!-- Input Form Starts -->
    <div class="form-section wrapper  wow animate__animated animate__fadeIn">
        <div class="row align-items-end">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="InputRange" class="form-label">Ranges*</label>
                    <select class="form-select rounded-pill" aria-label="Default select" id="range" name="range">
                        <option selected>Select range</option>
                        @foreach ($ranges as $ranges_dt)
                        <option value="{{ $ranges_dt->id }}" {{ $selectedRange == $ranges_dt->id ? 'selected' : '' }}>{{ getLocalizedColumn($ranges_dt, 'title') }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>

            <div class="col-md-5">
                <div class="mb-3">
                    <label for="InputUnitoffice" class="form-label">Unit Offices*</label>
                    <select class="form-select rounded-pill" aria-label="Default select" id="unit" name="unit">
                        <option selected>Select Unit</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <button class="default-btn w-100">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Input Form Ends -->

    <!-- Data Table Start -->

    <table class="table table-hover wow animate__animated animate__fadeIn">
        <thead style="background-color: var(--primary-color); color: var(--white-color);">
            <tr>
                <th scope="col" style="border-top-left-radius: 16px !important;">Releases</th>
                <th scope="col" class="table-text-center">Date</th>
                <th scope="col" style="border-top-right-radius: 16px !important;" class="table-text-center">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pressRelease as $pressRelease_dt)
            <tr>
                <td scope="row"><span><img class="me-2" src="{{ asset('frontend/images/doc-icon.svg') }}" alt="" srcset="">{{ getLocalizedColumn($pressRelease_dt, 'title') }}</span></td>
                <td style="color: var(--neutral-color-90);" class="table-text-center">{{ date('d/m/Y', strtotime($pressRelease_dt->date)) }}</td>
                <td class="table-text-center"><a class="secondary-btn-border p-1" href='{{ asset("storage/$pressRelease_dt->file") }}'>View</a></td>
            </tr>
            @endforeach
            @if(count($pressRelease)==0)
            <tr>
                <td colspan="2" class="table-text-center">No Record Found</td>
            </tr>
            @endif

        </tbody>
    </table>

    <!-- Data Tabel Ends -->

    <!-- Pagination And Row Dropdown Starts -->
    <div class="table-bottom d-flex justify-content-between align-items-center  wow animate__animated animate__fadeIn">
        <!-- Pagination -->
<nav aria-label="Page navigation example">
    <ul class="custom-pagination pagination pagination-gap mt-3">
        <!-- Previous Page Button -->
        <li class="page-item" id="prevPage">
            <a class="page-link btn-chevron-left" href="#" aria-label="Previous">
                <img src="{{ asset('frontend/images/carat-left.svg') }}" alt="Previous" aria-hidden="true">
            </a>
        </li>
        
        <!-- Page Numbers (Generated dynamically) -->
        @php
            $currentPage = $pressRelease->currentPage();
            $totalPages = $pressRelease->lastPage();
        @endphp
        @for ($i = 1; $i <= $totalPages; $i++)
            <li class="page-item {{ $i === $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $pressRelease->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Next Page Button -->
        <li class="page-item" id="nextPage">
            <a class="page-link btn-chevron" href="#" aria-label="Next">
                <img src="{{ asset('frontend/images/carat-right.svg') }}" alt="Next" aria-hidden="true">
            </a>
        </li>
    </ul>
</nav>
<!-- Pagination Ends -->
        <!-- Row Dropdrop ends  -->
        <div class="show-row d-flex justify-content-between align-items-center">
            
                <p class="p-0 m-0 me-2">Rows per page</p>
                <select name="perPage" class="form-select form-select-sm" style="width: 80px; height: 40px;" aria-label=".form-select-sm example" onchange="this.form.submit()">
                    <option value="1" {{ $pressRelease->perPage() == 10 ? 'selected' : '' }}>10</option>
                    <option value="5" {{ $pressRelease->perPage() == 50 ? 'selected' : '' }}>50</option>
                    <option value="10" {{ $pressRelease->perPage() == 100 ? 'selected' : '' }}>100</option>
                    <!-- Add more options as needed -->
                </select>
            
            {{-- <p class="p-0 m-0 me-2">Rows per page</p>
            <select class="form-select form-select-sm" style="width: 80px; height: 40px;"
                aria-label=".form-select-sm example">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select> --}}
        </div>
        <!-- Row Dropdown ends -->
    </div>
    <!-- Pagination And Row Dropdown -->
</form>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#range').change(function () {
            var rangeId = $(this).val();
            if (rangeId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('fetch.units') }}",
                    data: { range_id: rangeId },
                    success: function (response) {
                        $('#unit').empty();
                        $('#unit').append('<option value="">Select</option>');
                        $.each(response, function (key, value) {
                            $('#unit').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });
                    }
                });
            } else {
                $('#unit').empty();
                $('#unit').append('<option value="">Select</option>');
            }
        });
    });
</script>
@endsection