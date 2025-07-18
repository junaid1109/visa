<div class="page-content">
    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">{{$title}}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{$title}}</a></li>
                                            <li class="breadcrumb-item active">Management</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        @include('layouts.alert-msg')

                        <div class="row">
                       
                            <div class="col-12">
                                <div class="card">
                              
                                    <div class="card-body">

                                        <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active filter-tab" data-filter="all" href="javascript:void(0)" role="tab">
                                                    Total Cards <span class="badge badge-primary ml-1" id="all-count">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link filter-tab" data-filter="Active" href="javascript:void(0)" role="tab">
                                                    Active <span class="badge badge-success ml-1" id="active-count">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link filter-tab" data-filter="Pending" href="javascript:void(0)" role="tab">
                                                    Pending <span class="badge badge-info ml-1" id="pending-count">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link filter-tab" data-filter="Virtual" href="javascript:void(0)" role="tab">
                                                    Virtual <span class="badge badge-danger ml-1" id="virtual-count">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link filter-tab" data-filter="Physical" href="javascript:void(0)" role="tab">
                                                    Physical <span class="badge badge-warning ml-1" id="physical-count">0</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <table  id="cardsTable"  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr class="text-center">
                                                <th>Sr#</th>
                                                <th>Name on card</th>
                                                <th>Email</th>
                                                <th>Card No</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key => $item)

                                                @php
                                                $name  = strtolower(str_replace(" ", "", $item->name));
                                                @endphp
                                                    <tr class="text-center" id="user{{$item->id}}">
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$item->name_on_card}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>{{$item->card_no }}</td>
                                                        @if ($item->card_status == 'Active')
                                                            <td class="text-center align-middle"> 
                                                                <div class="d-flex justify-content-center">
                                                                    <span class="btn btn-success btn-sm">{{ $item->card_status }}</span>
                                                                </div>
                                                            </td>
                                                        @elseif ($item->card_status == 'Pending')
                                                            <td class="text-center align-middle"> 
                                                                <div class="d-flex justify-content-center">
                                                                    <span class="btn btn-info btn-sm">{{ $item->card_status }}</span>
                                                                </div>
                                                            </td>
                                                        @else
                                                            <td class="text-center align-middle"> 
                                                                <div class="d-flex justify-content-center">
                                                                    <span class="btn btn-secondary btn-sm">{{ $item->card_status }}</span>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td>{{date("d-M-Y h:i A", strtotime($item->created_at));}}</td>
                                                        <td>
                                                            <button class="btn btn-success" onclick="update({{ $item->id }})"> <i class="bx bx-bell-plus"></i></button>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>



<div class="modal fade updateModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Card Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('vrtvrtregrtrtbteyb.card.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <label for="example-text-input" class="col-md-1 col-form-label">Balance</label>
                         <div class="col-md-3">
                            <input class="form-control" type="text" name="balance" id="balance">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Card No</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="card_no" id="card_no">
                        </div>
                        <label for="example-text-input" class="col-md-1 col-form-label">CVC</label>
                         <div class="col-md-3">
                            <input class="form-control" type="text" name="cvc" id="cvc">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">From Date</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="from_date" id="from_date">
                        </div>
                        <label for="example-text-input" class="col-md-2 col-form-label">Expire Date</label>
                         <div class="col-md-4">
                            <input class="form-control" type="text" name="exp_date" id="exp_date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-1 col-form-label">Type</label>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="card_type" id="type" readonly>
                        </div>

                        <label for="example-text-input" class="col-md-1 col-form-label">Last4</label>
                         <div class="col-md-3">
                            <input class="form-control" type="text" name="last4" id="last4">
                        </div>

                        <label for="example-text-input" class="col-md-1 col-form-label">Pin</label>
                         <div class="col-md-3">
                            <input class="form-control" type="text" name="pin" id="pin">
                        </div>
                    </div>
                     <div style="float:right">
                        <button type="submit"  class="btn btn-primary waves-effect waves-light" >Update Card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@push('scripts')

<script>

    $(document).ready(function() {

        if ($.fn.DataTable.isDataTable('#cardsTable')) {
            $('#cardsTable').DataTable().destroy(); // Don't use .clear() here
        }

        table = $('#cardsTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            processing: true,
            
        });
        updateTabCounts();
       
        // Tab filtering functionality
        $('.filter-tab').on('click', function() {
            // Remove active class from all tabs
            $('.filter-tab').removeClass('active');
            // Add active class to clicked tab
            $(this).addClass('active');
            
            var filter = $(this).data('filter');
            
            table.search('').columns().search('').draw();
            
            // Apply filter based on tab clicked
            if (filter === 'all') {
                // Show all records
                table.search('').columns().search('').draw();
            } 
            else if (filter === 'Active' || filter === 'Pending') {
                // Filter by status (column index 4)
                table.column(4).search(filter).draw();
            } 
            else if (filter === 'Virtual' || filter === 'Physical') {
                // Filter by card type (column index 5)
                table.column(5).search(filter).draw();
            }
        });
    });

    function updateTabCounts() {
        let allCount = table.rows().count();
        $('#all-count').text(allCount);

        let activeCount = 0;
        let pendingCount = 0;
        let virtualCount = 0;
        let physicalCount = 0;

        table.rows().nodes().each(function (row) {
            let status = $(row).find('td:eq(4)').text().trim();     // status column
            let type = $(row).find('td:eq(5)').text().trim();       // type column

            if (status === 'Active') activeCount++;
            if (status === 'Pending') pendingCount++;
            if (type === 'Virtual') virtualCount++;
            if (type === 'Physical') physicalCount++;
        });

        $('#active-count').text(activeCount);
        $('#pending-count').text(pendingCount);
        $('#virtual-count').text(virtualCount);
        $('#physical-count').text(physicalCount);
    }

    function update(id) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('vrtvrtregrtrtbteyb.fetchCard') }}",
                type: 'POST',
                data: {
                    _token: csrfToken,
                    id: id
                },
                success: function(data) {
                    $('#id').val(data.data.id);
                    $('#name').val(data.data.name_on_card);
                    $('#email').val(data.data.email);
                    $('#balance').val(data.data.balance);
                    $('#card_no').val(data.data.card_no);
                    $('#cvc').val(data.data.cvc);
                    $('#from_date').val(data.data.from_date);
                    $('#exp_date').val(data.data.exp_date);
                    $('#type').val(data.data.card_type);
                    $('#last4').val(data.data.last4);
                    $('#pin').val(data.data.pin);
                    $('.updateModal').modal('show');
                }
        });
    }

</script>

@endpush
