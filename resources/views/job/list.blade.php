<x-default-layout>
    @section('title')
    List Jobs
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('jobs.index') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search job"
                        id="mySearchInput" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_job">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                    </button>
                    <!-- Add Job Modal -->
                    <div class="modal fade custom-modal-class" id="kt_modal_add_job" tabindex="-1"
                        aria-labelledby="kt_modal_add_job" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="bg-primary py-3 px-6 modal-header">
                                    <h5 class="text-white modal-title h4" id="kt_modal_add_job">Add Job</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('job.partial.job_form', ['item' => null])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle gs-0 gy-4">
                    <thead class="fs-7 text-white text-uppercase fw-400 fw-bold" style="background: #4e97ff;">
                        <tr>
                            <th>Customer</th>
                            <th>Staff</th>
                            <th>Job Title</th>
                            <th>Description</th>
                            <th>Rate Type</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>custom_rate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($jobs as $job)
                        <tr>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $job->customer->name ?? "" }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $job->staff->name ?? "" }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $job->job_title }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $job->description }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">
                                    {{ $job->rate_type == 'custom_rate' ? 'Custom $ Rate' : '10$/monthly' }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">
                                    {{ \Carbon\Carbon::parse($job->start_time)->format('d-M-Y H:i:s') }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">
                                    {{ \Carbon\Carbon::parse($job->end_time)->format('d-M-Y H:i:s') }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">
                                    {{ $job->rate_type == 'custom_rate' ? $job->custom_rate . '$' : 'N/A' }}
                                </a>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_edit_job_{{ $job->id }}"
                                        data-title={{ $job->name }}>
                                        {!! getIcon('pencil', 'fs-2', '', 'i') !!}
                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $job->id }}">
                                        {!! getIcon('trash', 'fs-2', '', 'i') !!}
                                    </a>

                                </div>
                            </td>
                        </tr>
                        <!-- Edit Job Modal -->
                        <div class="modal fade custom-modal-class" id="kt_modal_edit_job_{{ $job->id }}" tabindex="-1"
                            aria-labelledby="kt_modal_edit_job_{{ $job->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="bg-primary py-3 px-6 modal-header">
                                        <h5 class="text-white modal-title h4" id="kt_modal_edit_job">Edit Job</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('job.partial.job_form', ['item' => $job])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Job Modal -->
                        <div class="modal fade" id="deleteModal{{ $job->id }}" tabindex="-1"
                            aria-labelledby="deleteModal{{ $job->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModal{{ $job->id }}">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete {{ $job->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="d-flex justify-content-center my-3">
        {{ $jobs->links() }}
    </div>

</x-default-layout>