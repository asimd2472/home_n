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
                        <div class="row gy-4 gy-sm-1" bis_skin_checked="1">
                          <div class="col-sm-6 col-lg-2" bis_skin_checked="1">
                            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0 order-count-sec" bis_skin_checked="1">
                              <div bis_skin_checked="1">
                                <h4 class="mb-0">{{$totalOrder}}</h4>
                                <p class="mb-0">Total Order</p>
                              </div>
                              <div class="avatar me-sm-6" bis_skin_checked="1">
                                <span class="avatar-initial rounded-3 text-heading">
                                  <i class="bi bi-bag"></i>
                                </span>
                              </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-6">
                          </div>
                          <div class="col-sm-6 col-lg-2" bis_skin_checked="1">
                            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0 order-count-sec" bis_skin_checked="1">
                              <div bis_skin_checked="1">
                                <h4 class="mb-0">{{$pendingOrder}}</h4>
                                <p class="mb-0">Pending Order</p>
                              </div>
                              <div class="avatar me-sm-6" bis_skin_checked="1">
                                <span class="avatar-initial rounded-3 text-heading">
                                  <i class="bi bi-hourglass"></i>
                                </span>
                              </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-6">
                          </div>
                          <div class="col-sm-6 col-lg-2" bis_skin_checked="1">
                            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0 order-count-sec" bis_skin_checked="1">
                              <div bis_skin_checked="1">
                                <h4 class="mb-0">{{$cancelOrder}}</h4>
                                <p class="mb-0">Cancel Order</p>
                              </div>
                              <div class="avatar me-sm-6" bis_skin_checked="1">
                                <span class="avatar-initial rounded-3 text-heading">
                                  <i class="bi bi-x-circle"></i>
                                </span>
                              </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-6">
                          </div>
                          <div class="col-sm-6 col-lg-2" bis_skin_checked="1">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0 order-count-sec" bis_skin_checked="1">
                              <div bis_skin_checked="1">
                                <h4 class="mb-0">{{$deliveredOrder}}</h4>
                                <p class="mb-0">Delivered</p>
                              </div>
                              <div class="avatar me-lg-6" bis_skin_checked="1">
                                <span class="avatar-initial rounded-3 text-heading">
                                  <i class="bi bi-check-all"></i>
                                </span>
                              </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none">
                          </div>
                          <div class="col-sm-6 col-lg-2" bis_skin_checked="1">
                            <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3 order-count-sec" bis_skin_checked="1">
                              <div bis_skin_checked="1">
                                <h4 class="mb-0">{{$pendingPayment}}</h4>
                                <p class="mb-0">Pending Payment</p>
                              </div>
                              <div class="avatar me-sm-6" bis_skin_checked="1">
                                <span class="avatar-initial rounded-3 text-heading">
                                  <i class="bi bi-currency-rupee"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-lg-2" bis_skin_checked="1">
                            <div class="d-flex justify-content-between align-items-start order-count-sec" bis_skin_checked="1">
                              <div bis_skin_checked="1">
                                <h4 class="mb-0">{{$completePayment}}</h4>
                                <p class="mb-0">Complete Payment</p>
                              </div>
                              <div class="avatar" bis_skin_checked="1">
                                <span class="avatar-initial rounded-3 text-heading">
                                  <i class="bi bi-currency-rupee"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary mb-4">
                    <div class="card-body">
                        <div class="row order-search-sec">
                          <div class="col-md-2">
                              <label class="form-label">From Date</label>
                              <input type="date" id="from_date" class="form-control">
                          </div>

                          <div class="col-md-2">
                              <label class="form-label">To Date</label>
                              <input type="date" id="to_date" class="form-control">
                          </div>

                          <div class="col-md-2">
                              <label class="form-label">Customer Name</label>
                              <input type="text" id="customer_name" class="form-control" placeholder="Enter name">
                          </div>
                          <div class="col-md-2">
                            <label class="form-label">Order Status</label>
                            <select id="status" class="form-select">
                                <option value="">All</option>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Payment</label>
                            <select id="payment_status" class="form-select">
                                <option value="">All</option>
                                <option value="pending">Pending</option>
                                <option value="paid">Paid</option>
                                <option value="failed">Failed</option>
                                <option value="refunded">Refunded</option>
                            </select>
                        </div>

                          <div class="col-md-2 d-flex align-items-end gap-2">
                              <button class="btn btn-primary w-100" id="filter">
                                  Search
                              </button>
                              <button class="btn btn-warning w-100" id="reset">
                                  Reset
                              </button>
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
  $(document).ready(function () {
    var table = $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.orders') }}",
            data: function (d) {
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
                d.customer_name = $('#customer_name').val();
                d.status = $('#status').val();
                d.payment_status = $('#payment_status').val();
            }
        },
        columns: [
            { data: 'order_number', name: 'order_number' },
            { data: 'created_at', name: 'created_at' },
            { data: 'users_details', name: 'users_details', orderable: false, searchable: false },
            { data: 'payment_status', name: 'payment_status' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    $('#filter').click(function () {
      $('#usersTable').DataTable().draw();
    });

    $('#reset').click(function () {
      $('#from_date').val('');
      $('#to_date').val('');
      $('#customer_name').val('');
      $('#status').val('');
      $('#payment_status').val('');
      $('#usersTable').DataTable().draw();
    });
  });
</script>
@endpush