<x-default-layout>

    @section('title')
    List Customers
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('customers.index') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search user"
                        id="mySearchInput" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_user11">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                    </button>
                    <!-- Add Customer Modal -->
                    <div class="modal fade custom-modal-class" id="kt_modal_add_user11" tabindex="-1"
                        aria-labelledby="kt_modal_add_user11" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="bg-primary  py-3 px-6 modal-header">
                                    <h5 class=" text-white modal-title h4" id="kt_modal_add_user11">Add Customer
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('customer.partial.customer_from')
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
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Description</th>
                            <th>Rate Type</th>
                            <th>Rate Option</th>
                            <th>Rate</th>
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
                                <a href="#" class="text-dark fw-bold">{{ $item->city }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->state }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->country }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->description }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->rate_type }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->rate_option }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $item->rate }}</a>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"
                                    data-title={{ $item->name }}>
                                    {!! getIcon('pencil', 'fs-2', '', 'i') !!}
                                </a>
                                <a href="{{ route('customer.delete', $item->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    {!! getIcon('trash', 'fs-2', '', 'i') !!}
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('customer.delete', $item->id) }}" method="POST"
                                    style="display: none;" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        <!-- Edit Customer Modal -->
                        <div class="modal fade custom-modal-class" id="editModal{{    $item->id }}" tabindex="-1"
                            aria-labelledby="kt_modal_add_user{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="bg-primary  py-3 px-6 modal-header">
                                        <h5 class="text-white modal-title h4" id="kt_modal_add_user">Update Customer
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('customer.partial.customer_from')
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
        {{ $data->links() }}

    </div>
</x-default-layout>