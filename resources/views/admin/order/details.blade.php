@extends('admin.layouts.admin')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 gap-6">
            <div class="d-flex flex-column justify-content-center">
            <div class="d-flex align-items-center mb-1">
                <h5 class="mb-0">Order #{{$orderDetails->order_number}}</h5>
                @if($orderDetails->payment_status=='pending')
                    <h6 class="mb-0 align-items-center d-flex w-px-100 text-warning me-2 ms-2">
                        Pending
                    </h6>
                @elseif($orderDetails->payment_status=='paid')
                    <h6 class="mb-0 align-items-center d-flex w-px-100 text-success me-2 ms-2">
                        Paid
                    </h6>
                @elseif($orderDetails->payment_status=='failed')
                    <h6 class="mb-0 align-items-center d-flex w-px-100 text-danger me-2 ms-2">
                        Failed
                    </h6>
                @elseif($orderDetails->payment_status=='refunded')
                    <h6 class="mb-0 align-items-center d-flex w-px-100 text-secondary me-2 ms-2">
                        Refunded
                    </h6>
                @endif

                @if($orderDetails->status=='pending')
                    <span class="badge bg-warning text-dark">Pending</span>
                @elseif($orderDetails->status=='confirmed')
                    <span class="badge bg-primary">Confirmed</span>
                @elseif($orderDetails->status=='processing')
                    <span class="badge rounded-pill bg-info text-dark">Processing</span>
                @elseif($orderDetails->status=='delivered')
                    <span class="badge rounded-pill bg-success">Delivered</span>
                @elseif($orderDetails->status=='cancelled')
                    <span class="badge rounded-pill bg-danger">Cancelled</span>
                @elseif($orderDetails->status=='shipped')
                    <span class="badge rounded-pill bg-secondary">Pending</span>
                @endif
            </div>
            <p class="mb-0">{{ \Carbon\Carbon::parse($orderDetails->created_at)->format('M d, Y') }}</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-2">
            <button class="btn btn-outline-danger delete-order waves-effect" onclick="deleteOrder('{{$orderDetails->id}}')">Delete Order</button>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary mb-4">
                            <div class="card-body">
                                <h6 class="mb-3 fw-semibold text-uppercase text-muted">Order details</h6>
                                        
                                @foreach ($orderDetails->details as $key => $order)
                                    <div class="">
                                        <h4 class="mb-6"> {{($key+1)}} {{$order->manufacturingTypes->name}}</h4>

                                        <hr>

                                        <!-- Basic Info -->
                                        <div class="row mb-4">
                                            <div class="col-md-3"><strong>Quantity:</strong></div>
                                            <div class="col-md-9">{{ $order->quantity }}</div>

                                            <div class="col-md-3"><strong>Design Units:</strong></div>
                                            <div class="col-md-9">{{ $order->design_units }}</div>

                                            <div class="col-md-3"><strong>Material:</strong></div>
                                            <div class="col-md-9">{{ $order->material }}</div>

                                            <div class="col-md-3"><strong>Material Type:</strong></div>
                                            <div class="col-md-9">{{ $order->material_type }}</div>

                                            <div class="col-md-3"><strong>Color:</strong></div>
                                            <div class="col-md-9"><em style="width: 13px; height: 13px; display: inline-block; background-color: {{ $order->color_code }}"></em> {{ $order->color }}</div>

                                            <div class="col-md-3"><strong>Process:</strong></div>
                                            <div class="col-md-9">{{ $order->process ?? 'N/A' }}</div>

                                            <div class="col-md-3"><strong>Infill:</strong></div>
                                            <div class="col-md-9">{{ $order->infill ?? 'N/A' }}</div>
                                        </div>

                                        <hr>

                                        <!-- Files -->
                                        <div class="row mb-4">
                                            <div class="col-md-3"><strong>CAD File:</strong></div>
                                            <div class="col-md-9">
                                                @if($order->cad_file)
                                                    <a href="{{ asset('storage/'.$order->cad_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">View File</a>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </div>

                                            <div class="col-md-3 mt-2"><strong>Technical Drawing:</strong></div>
                                            <div class="col-md-9 mt-2">
                                                @if($order->technical_drawing_file)
                                                    <a href="{{ asset('storage/'.$order->technical_drawing_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">View File</a>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Manufacturing Options -->
                                        <div class="row mb-4">
                                            <div class="col-md-3"><strong>Threads & Holes:</strong></div>
                                            <div class="col-md-9">
                                                {{ $order->threads_and_tapped_holes }} 

                                            </div>

                                            <div class="col-md-3 mt-2"><strong>Inserts:</strong></div>
                                            <div class="col-md-9 mt-2">
                                                {{ $order->inserts }}
                                                
                                            </div>

                                            <div class="col-md-3"><strong>Tolerance:</strong></div>
                                            <div class="col-md-9">{{ $order->tolerance ?? 'N/A' }}</div>

                                            <div class="col-md-3"><strong>Surface Roughness:</strong></div>
                                            <div class="col-md-9">{{ $order->surface_roughness ?? 'N/A' }}</div>

                                            <div class="col-md-3 mt-2"><strong>Part Marking:</strong></div>
                                            <div class="col-md-9 mt-2">
                                                {{ $order->part_marking ?? 'N/A' }}
                                                
                                            </div>

                                            <div class="col-md-3 mt-2"><strong>Parts Assembly:</strong></div>
                                            <div class="col-md-9 mt-2">
                                                {{ $order->parts_assembly }}
                                            </div>

                                            <div class="col-md-3 mt-2"><strong>Printing risk:</strong></div>
                                            <div class="col-md-9 mt-2">
                                                {{-- <span class="badge bg-info">{{ $order->printing_risk ?? 'N/A' }}</span> --}}
                                                 @php
                                                    $risks = json_decode($order->printing_risk, true);

                                                    $riskLabels = collect($risks ?? [])
                                                        ->filter(fn($value) => $value)
                                                        ->keys()
                                                        ->map(fn($key) => ucfirst($key))
                                                        ->implode(', ');
                                                @endphp

                                                <span class="badge bg-info">
                                                    {{ $riskLabels ?: 'N/A' }}
                                                </span>
                                            </div>

                                            <div class="col-md-3"><strong>Finished Appearance:</strong></div>
                                            <div class="col-md-9">
                                                {{ $order->finished_appearance ?? 'N/A' }}
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Inspection -->
                                        <div class="row mb-4">
                                            <div class="col-md-3"><strong>Inspection:</strong></div>
                                            <div class="col-md-9">
                                                {{ $order->inspection ?? 'N/A' }}
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Description -->
                                        <div class="row mb-4">
                                            <div class="col-md-4"><strong>Product Description:</strong></div>
                                            <div class="col-md-8">{{ $order->product_desc }}</div>

                                            <div class="col-md-4 mt-2"><strong>Special Request:</strong></div>
                                            <div class="col-md-8 mt-2">
                                                <div class="border rounded p-2 bg-light">
                                                    {{ $order->Other_special_request }}
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="col-md-12">
                    <div class="card card-primary mb-3">
                        <div class="card-body">
                            <h6 class="mb-3 fw-semibold text-uppercase text-muted">Order Status</h6>
                            <p>Change the status of this order. This will be visible to the customer</p>
                            @if($orderDetails->status=='pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($orderDetails->status=='confirmed')
                                <span class="badge bg-primary">Confirmed</span>
                            @elseif($orderDetails->status=='processing')
                                <span class="badge rounded-pill bg-info text-dark">Processing</span>
                            @elseif($orderDetails->status=='delivered')
                                <span class="badge rounded-pill bg-success">Delivered</span>
                            @elseif($orderDetails->status=='cancelled')
                                <span class="badge rounded-pill bg-danger">Cancelled</span>
                            @elseif($orderDetails->status=='shipped')
                                <span class="badge rounded-pill bg-secondary">Shipped</span>
                            @endif

                            <button class="btn btn-outline-info waves-effect btn-sm" data-bs-toggle="modal" data-bs-target="#orderStatusModal">Update Status</button>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary mb-3">
                        <div class="card-body">
                            <h6 class="mb-3 fw-semibold text-uppercase text-muted">Customer details</h6>
                            <br>
                            <div class="d-flex justify-content-start">
                                @php
                                    $image = $orderDetails->userDetails->profile_image 
                                            ? asset('storage/images/'.$orderDetails->userDetails->profile_image)
                                            : asset('images/default-profile.jpg');
                                @endphp
                                <div class="avatar me-3">
                                    <img src="{{$image}}" class="rounded-circle" width="40" height="40">
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-0">{{$orderDetails->userDetails->name}}</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="mb-1">Contact info</h6>
                            </div>
                            <p class="mb-1">Email: {{$orderDetails->userDetails->email}}</p>
                            <p class="mb-0">Mobile: {{$orderDetails->userDetails->phone_number ?? 'N/A'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card order-summary-card shadow-sm card-primary mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 fw-semibold text-uppercase text-muted">
                                    Order Summary
                                </h6>
                                <i class="bi bi-pencil-square text-primary"
                                style="cursor:pointer; font-size:18px;"
                                data-bs-toggle="modal"
                                data-bs-target="#editSummaryModal">
                                </i>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Order Price</span>
                                <span class="fw-semibold">₹{{$orderDetails->subtotal}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Discount</span>
                                <span class="text-danger fw-semibold">- ₹{{$orderDetails->discount}}</span>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-semibold">₹{{($orderDetails->subtotal-$orderDetails->discount)}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Shipping Charge</span>
                                <span class="fw-semibold">₹{{$orderDetails->shipping_charge}}</span>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between align-items-center total-row">
                                <span class="fw-bold fs-6">Total</span>
                                <span class="fw-bold fs-5 text-primary">₹{{$orderDetails->total}}</span>
                            </div>

                            @if($orderDetails->payment_status=='paid')

                            <div class="text-center mt-4">
                                <a class="btn btn-outline-success waves-effect px-4 py-2"
                                href="{{ route('admin.invoice', ['order_id' => Crypt::encrypt($orderDetails->id), 'type' => 'download']) }}"
                                target="_blank">
                                    <i class="fa-solid fa-download me-2"></i>
                                    Download Invoice
                                </a>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>
                @if($orderDetails->payment_status=='paid')
                <div class="col-md-12">
                    <div class="card card-primary mb-3">
                        <div class="card-body">
                            <h6 class="mb-3 fw-semibold text-uppercase text-muted">Delivery details</h6>
                            @if($orderDetails->shippingAddress)
                            <p> <strong><i class="{{$orderDetails->shippingAddress->address_type == 'home' ? 'bi bi-house' : 'bi bi-building'}}"></i> {{ucfirst($orderDetails->shippingAddress->address_type)}} </strong> {{$orderDetails->shippingAddress->address}}, {{$orderDetails->shippingAddress->landmark}}, {{$orderDetails->shippingAddress->city}}, {{$orderDetails->shippingAddress->pincode}}, {{$orderDetails->shippingAddress->state}}</p>
                            <p> <strong><i class="bi bi-person"></i> {{ucfirst($orderDetails->shippingAddress->name)}} </strong> {{$orderDetails->shippingAddress->phone}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-md-12">
                    <div class="card card-primary mb-3">
                        <div class="card-body">

                            <h6 class="mb-3 fw-semibold text-uppercase text-muted">Payment Method</h6>
                            <p>Online (Razorpay)</p>
                            @if($orderDetails->payment_status=='pending')
                                <h6 class="mb-0 align-items-center d-flex w-px-100 text-warning me-2 ms-2">
                                    Pending
                                </h6>
                            @elseif($orderDetails->payment_status=='paid')
                                <h6 class="mb-0 align-items-center d-flex w-px-100 text-success me-2 ms-2">
                                    Paid
                                </h6>
                            @elseif($orderDetails->payment_status=='failed')
                                <h6 class="mb-0 align-items-center d-flex w-px-100 text-danger me-2 ms-2">
                                    Failed
                                </h6>   
                            @elseif($orderDetails->payment_status=='refunded')
                                <h6 class="mb-0 align-items-center d-flex w-px-100 text-secondary me-2 ms-2">
                                    Refunded
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

                
        </div>
    </div>
</div>

<div class="modal fade" id="orderStatusModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="updateStatusForm">
            @csrf
            <input type="hidden" name="order_id" value="{{ $orderDetails->id ?? '' }}">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Update order status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    {{-- Order Status --}}
                    <div class="mb-3">
                        <label>Status</label>

                        <select name="status" id="status" class="form-select">

                            {{-- Current Status --}}
                            <option value="{{ $orderDetails->status }}" selected>
                                {{ ucfirst($orderDetails->status) }}
                            </option>

                            {{-- Pending --}}
                            @if($orderDetails->status == 'pending')
                                <option value="processing">Processing</option>
                                <option value="cancelled">Cancelled</option>
                            @endif

                            {{-- Processing --}}
                            @if($orderDetails->status == 'processing')
                                <option value="cancelled">Cancelled</option>
                            @endif

                            {{-- Confirmed --}}
                            @if($orderDetails->status == 'confirmed')
                                <option value="cancelled">Cancelled</option>
                                <option value="delivered">Delivered</option>
                            @endif

                        </select>
                    </div>

                    {{-- Price Section --}}
                    <div id="priceSection"
                        style="{{ $orderDetails->status == 'processing' ? '' : 'display:none;' }}">

                        <div class="mb-3">
                            <label>Order Price</label>
                            <input type="number"
                                name="subtotal"
                                class="form-control"
                                value="{{ $orderDetails->subtotal ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label>Discount</label>
                            <input type="number"
                                name="discount"
                                class="form-control"
                                value="{{ $orderDetails->discount ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label>Shipping Charge</label>
                            <input type="number"
                                name="shipping_charge"
                                class="form-control"
                                value="{{ $orderDetails->shipping_charge ?? '' }}">
                        </div>

                    </div>

                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </div>
        </form>
    </div>
</div>



<div class="modal fade" id="editSummaryModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="updateSummaryForm">
            @csrf
            <input type="hidden" name="order_id" value="{{ $orderDetails->id ?? '' }}">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Order Summary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Order Price</label>
                        <input type="number" name="subtotal" class="form-control" value="{{ $orderDetails->subtotal ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Discount</label>
                        <input type="number" name="discount" class="form-control" value="{{ $orderDetails->discount ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Shipping Charge</label>
                        <input type="number" name="shipping_charge" class="form-control" value="{{ $orderDetails->shipping_charge ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Payment Status</label>
                        <select name="payment_status" id="payment_status" class="form-select">
                            <option value="pending" {{$orderDetails->payment_status=='pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{$orderDetails->payment_status=='paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{$orderDetails->payment_status=='failed' ? 'selected' : '' }}>Failed</option>
                            <option value="refunded" {{$orderDetails->payment_status=='refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')

<script type="module">
    $('#updateSummaryForm').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: "{{ route('admin.orders.updateSummary') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(res){
                toastr.success(res.msg);
                location.reload();

            },
            error: function(){
                toastr.success('Something went wrong');
            }
        });
    });


    $('#updateStatusForm').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: "{{ route('admin.orders.orderStatusUpdate') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(res){
                toastr.success(res.msg);
                location.reload();

            },
            error: function(){
                toastr.success('Something went wrong');
            }
        });
    });
</script>
<script type="module">
    $('#status').on('change', function () {

        let status = $(this).val();

        if(status === 'processing') {
            $('#priceSection').show();
        } else {
            $('#priceSection').hide();
        }

    });
</script>
@endpush