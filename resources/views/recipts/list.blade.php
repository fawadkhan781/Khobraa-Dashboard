<x-default-layout>

    @section('title')
    Receipts
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('receipt.index') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-receipt-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search receipts"
                        id="mySearchInput" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-receipt-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_receipt">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                    </button>
                    <!-- Add Receipt Modal -->
                    <div class="modal fade custom-modal-class" id="kt_modal_add_receipt" tabindex="-1"
                        aria-labelledby="kt_modal_add_receipt" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="bg-primary py-3 px-6 modal-header">
                                    <h5 class="text-white modal-title h4" id="kt_modal_add_receipt">Add Receipt</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('recipts.partial.recipt_form', ['item' => null])
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
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($receipts as $receipt)
                        <tr>
                            <td>
                                <a href="#" class="text-dark fw-bold">{{ $receipt->customer->name ?? '' }}</a>
                            </td>
                            <td>
                                <span>{{ $receipt->total_amount }}</span>
                            </td>
                            <td>
                                <span>{{ ucfirst($receipt->payment_method) }}</span>
                            </td>
                            <td>
                                <span>{{ $receipt->selected_date }}</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button type="button"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $receipt->id }}">
                                        {!! getIcon('pencil', 'fs-3', '', 'i') !!}
                                    </button>
                                    <button type="button"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $receipt->id }}">
                                        {!! getIcon('trash', 'fs-3', '', 'i') !!}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Edit Receipt Modal -->
                        <div class="modal fade custom-modal-class" id="editModal{{ $receipt->id }}" tabindex="-1"
                            aria-labelledby="editModal{{ $receipt->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="bg-primary py-3 px-6 modal-header">
                                        <h5 class="text-white modal-title h4" id="editModal{{ $receipt->id }}">Update
                                            Receipt</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('recipts.partial.recipt_form', ['item' => $receipt])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Staff Modal -->
                        <div class="modal fade" id="deleteModal{{ $receipt->id }}" tabindex="-1"
                            aria-labelledby="deleteModal{{ $receipt->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModal{{ $receipt->id }}">Delete Confirmation
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete {{ $receipt->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('recipts.destroy', $receipt->id) }}" method="POST">
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

    <!-- pignation -->
    <div class="d-flex justify-content-center">
        {{ $receipts->links() }}
    </div>
</x-default-layout>