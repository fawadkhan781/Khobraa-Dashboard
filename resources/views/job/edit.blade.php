<form action="{{ isset($item->id) ? route('job.update', $item->id) : route('job.store')}}" method="POST"
    enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" class="form-select" required>
                <option value="">Select</option>
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}"
                    {{ (isset($item->customer_id) && $item->customer_id == $customer->id) ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="staff_id" class="form-label">Staff</label>
            <select name="staff_id" class="form-select" required>
                <option value="">Select</option>
                @foreach ($staffs as $staff)
                <option value="{{ $staff->id }}"
                    {{ (isset($item->staff_id) && $item->staff_id == $staff->id) ? 'selected' : '' }}>
                    {{ $staff->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title"
                value="{{ isset($item->job_title) ? $item->job_title : '' }}" required>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ isset($item->description) ? $item->description : '' }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="rate_type" class="form-label">Rate Type</label>
            <select name="rate_type" class="form-select" required>
                <option value="">Select</option>
                <option value="rate" {{ (isset($item->rate_type) && $item->rate_type == 'rate') ? 'selected' : '' }}>
                    Rate
                </option>
                <option value="custom_rate"
                    {{ (isset($item->rate_type) && $item->rate_type == 'custom_rate') ? 'selected' : '' }}>
                    Custom Rate
                </option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="rate_option" class="form-label">Rate Option</label>
            <input type="text" class="form-control" id="rate_option" name="rate_option"
                value="{{ isset($item->rate_option) ? $item->rate_option : '' }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                value="{{ isset($item->start_time) ? $item->start_time : '' }}" required>
            <input type="time" class="form-control" id="start_time_time" name="start_time_time"
                value="{{ isset($item->start_time) ? \Carbon\Carbon::parse($item->start_time)->format('H:i:s') : '' }}"
                required>
        </div>
        <div class="col-md-6">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time"
                value="{{ isset($item->end_time) ? $item->end_time : '' }}" required>
            <input type="time" class="form-control" id="end_time_time" name="end_time_time"
                value="{{ isset($item->end_time) ? \Carbon\Carbon::parse($item->end_time)->format('H:i:s') : '' }}"
                required>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>




</form>