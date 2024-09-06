<div class="container mt-5">
    <h1 class="mb-4">Dashboard</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Customers</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['customers'] }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Staff</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['staff'] }}</h5>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Jobs</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['jobs'] }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Receipts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data['receipts'] }}</h5>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/dashboard/update">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="customers">Customers</label>
                    <input type="number" class="form-control" id="customers" name="customers"
                        value="{{ $data['customers'] }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="staff">Staff</label>
                    <input type="number" class="form-control" id="staff" name="staff" value="{{ $data['staff'] }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="jobs">Jobs</label>
                    <input type="number" class="form-control" id="jobs" name="jobs" value="{{ $data['jobs'] }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="receipts">Receipts</label>
                    <input type="number" class="form-control" id="receipts" name="receipts"
                        value="{{ $data['receipts'] }}">
                </div>
            </div>
        </div>

    </form>
</div>