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
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-hover" id="usersTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Invoice No</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment ID</th>
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
  $(document).ready(function () {
    var table = $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.payment_list') }}",
            data: function (d) {
               
            }
        },
        columns: [
            { data: 'invoice_no', name: 'invoice_no' },
            { data: 'order_id', name: 'order_id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'amount', name: 'amount' },
            { data: 'status', name: 'status' },
            { data: 'payment_id', name: 'payment_id' },
        ]
    });
  });
</script>
@endpush