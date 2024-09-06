<x-default-layout>

    @section('title')
    Staff
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('staff.index') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search staff"
                        id="mySearchInput" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_staff">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                    </button>
                    <!-- Add Staff Modal -->
                    <div class="modal fade custom-modal-class" id="kt_modal_add_staff" tabindex="-1"
                        aria-labelledby="kt_modal_add_staff" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="bg-primary py-3 px-6 modal-header">
                                    <h5 class="text-white modal-title h4" id="kt_modal_add_staff">Add Staff</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('staff.partial.staff_from', ['item' => null])
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->name }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->email }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->phone }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->address }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->description }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->position }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->department }}</a>
                            </td>
                            <td>
                                <span class="badge bg-success">{{ $item->status }}</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button type="button"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        {!! getIcon('pencil', 'fs-3', '', 'i') !!}
                                        {!! getIcon('edit', 'fs-3', '', 'i') !!}
                                    </button>
                                    <button type="button"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                        {!! getIcon('trash', 'fs-3', '', 'i') !!}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Edit Staff Modal -->
                        <div class="modal fade custom-modal-class" id="editModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="editModal{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="bg-primary py-3 px-6 modal-header">
                                        <h5 class="text-white modal-title h4" id="editModal{{ $item->id }}">Update Staff
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('staff.partial.staff_from', ['item' => $item])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Staff Modal -->
                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="deleteModal{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModal{{ $item->id }}">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete {{ $item->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('staff.destroy', $item->id) }}" method="POST">
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

    <!-- piganation -->

    <div class="d-flex justify-content-center my-3">
        {{ $data->links() }}
    </div>

</x-default-layout>