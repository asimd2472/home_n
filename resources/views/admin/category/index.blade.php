@extends('admin.layouts.admin')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        {{-- <h3 class="mb-0">Users</h3> --}}
        </div>
    </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary mb-4">
                    <div class="card-body">
                        <div class="row order-search-sec">
                          <div class="col-md-2">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-secondary w-100">
                                    Create
                                </a>
                          </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-hover" id="usersTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="module">
</script>
@endpush