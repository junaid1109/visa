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
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        
                                            <h4 class="card-title">Cards</h4>
                                            <div>
                                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2" data-toggle="modal" data-target=".addModal">
                                                    <i class="bx bx-plus"></i> Create Card
                                                </button>
                                            </div>
                                      
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                                                <li class="nav-item mr-2">
                                                    <button class="btn btn-success" role="tab">
                                                        Account Balance <span class="badge badge-warning ml-1" style="font-size: 1rem;">${{ Auth::user()->balance }}</span>
                                                    </button>
                                                </li>
                                                 <li class="nav-item mr-2">
                                                    <button class="btn btn-primary"  href="javascript:void(0)" role="tab">
                                                        Remaining Virtual Cards <span class="badge badge-warning ml-1 font-weight-bold" style="font-size: 1rem;">{{ Auth::user()->virtual_card }}</span>
                                                    </button>
                                                </li>
                                                 <li class="nav-item">
                                                    <button class="btn btn-info"  href="javascript:void(0)" role="tab">
                                                        Remaining Physical Cards <span class="badge badge-warning ml-1" style="font-size: 1rem;">{{ Auth::user()->physical_card }}</span>
                                                    </button>
                                                </li>
                                            <ul>
                                        </div>
                                        <!-- Filter Tabs -->
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
                                            <li class="nav-item">
                                                <a class="nav-link filter-tab" data-filter="Visa" href="javascript:void(0)" role="tab">
                                                    Visa <span class="badge badge-danger ml-1" id="visa-count">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link filter-tab" data-filter="Master" href="javascript:void(0)" role="tab">
                                                    Master <span class="badge badge-warning ml-1" id="master-count">0</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- Single DataTable -->
                                        <table id="cardsTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Sr#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Card No</th>
                                                    <th>Status</th>
                                                    <th>Card Type</th>
                                                    <th>Category</th>
                                                    <th>Freez/Unfreez</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key => $item)
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
                                                    <td class="text-center align-middle"> 
                                                        <div class="d-flex justify-content-center">
                                                            <span class="btn btn-{{ $item->card_type == 'Virtual' ? 'primary' : 'warning' }} btn-sm">{{ $item->card_type }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle"> 
                                                        <div class="d-flex justify-content-center">
                                                            <span class="btn btn-{{ $item->card_category == 'Visa' ? 'primary' : 'warning' }} btn-sm">{{ $item->card_category }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle"> 
                                                        <div class="d-flex justify-content-center">
                                                            <form method="POST" action="{{ route('user.card.toggleStatus', $item->id) }}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm {{ $item->is_freezed ? 'btn-danger' : 'btn-success' }} btn-rounded"
                                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to change status" >
                                                                    <strong>{{ $item->is_freezed ? 'Freez' : 'Unfreez' }}</strong>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    <td>{{date("d-M-Y h:i A", strtotime($item->created_at));}}</td>
                                                    <td>
                                                        @if ($item->card_status == 'Pending')
                                                            <button class="btn btn-info" disabled data-placement="top" data-toggle="tooltip" title="" data-original-title="Card is pending" > <i class="bx bx-edit"></i></button>
                                                        @else
                                                            <button class="btn btn-info" onclick="update({{ $item->id }})"> <i class="bx bx-edit"></i></button>
                                                        @endif
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


<div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Create Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.card.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" required placeholder="Name on card" type="text" name="name">
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input class="form-control" required placeholder="Amount" type="number" name="amount">
                                <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="card_type">
                                <option value="Virtual">Virtual</option>
                                <option value="Physical">Physical</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-md-5">
                            <input class="form-control" required placeholder="Email" type="email" name="email">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" required placeholder="Phone Number" type="number" name="phone_no">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="card_category">
                                <option value="Visa">Visa</option>
                                <option value="Master">Master</option>
                            </select>
                        </div>
                    </div>
                    <div style="float:right">
                        <button type="submit"  class="btn btn-primary waves-effect waves-light" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    <input class="form-control" type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" readonly id="name">
                        </div>

                        <label for="example-text-input" class="col-md-1 col-form-label">Balance</label>

                        <div class="col-md-3">
                            <div class="input-group">
                                    <input class="form-control" type="text" readonly id="balance">
                                    <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" readonly id="email">
                        </div>
                        <label for="example-text-input" class="col-md-2 col-form-label">Phone Number</label>
                        <div class="col-md-4">
                        <input class="form-control" readonly  type="text" id="phone_no">
                    </div>
                    </div>

                   

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Card No</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" readonly id="card_no">
                        </div>
                        <label for="example-text-input" class="col-md-1 col-form-label">CVC</label>
                         <div class="col-md-3">
                            <input class="form-control" type="text" readonly id="cvc">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">From Date</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" readonly id="from_date">
                        </div>
                        <label for="example-text-input" class="col-md-2 col-form-label">Expire Date</label>
                         <div class="col-md-4">
                            <input class="form-control" type="text" readonly id="exp_date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-1 col-form-label">Type</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" readonly id="type">
                        </div>

                        <label for="example-text-input" class="col-md-1 col-form-label">Category</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" readonly id="category">
                        </div>

                        <label for="example-text-input" class="col-md-1 col-form-label">Last4</label>
                         <div class="col-md-2">
                            <input class="form-control" type="text" readonly id="last4">
                        </div>

                        <label for="example-text-input" class="col-md-1 col-form-label">Pin</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" readonly id="pin">
                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>

<style>
.nav-tabs-custom .nav-link {
    padding: 0.5rem 1.25rem;
    font-weight: 500;
    border-top: 3px solid transparent;
    cursor: pointer;
}
.nav-tabs-custom .nav-link.active {
    border-top-color: #34c38f;
    color: #34c38f;
}
</style>


@push('scripts')

<script>

    let table;
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
            else if (filter === 'Visa' || filter === 'Master') {
                // Filter by card type (column index 5)
                table.column(6).search(filter).draw();
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
        let visaCount = 0;
        let masterCount = 0;

        table.rows().nodes().each(function (row) {
            let status = $(row).find('td:eq(4)').text().trim();     // status column
            let type = $(row).find('td:eq(5)').text().trim();       // type column
            let category = $(row).find('td:eq(6)').text().trim();       // type column

            if (status === 'Active') activeCount++;
            if (status === 'Pending') pendingCount++;
            if (type === 'Virtual') virtualCount++;
            if (type === 'Physical') physicalCount++;
            if (category === 'Visa') visaCount++;
            if (category === 'Master') masterCount++;
        });

        $('#active-count').text(activeCount);
        $('#pending-count').text(pendingCount);
        $('#virtual-count').text(virtualCount);
        $('#physical-count').text(physicalCount);
        $('#visa-count').text(visaCount);
        $('#master-count').text(masterCount);
    }

    function update(id) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('user.fetchCard') }}",
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
                $('#type').val(data.data.type);
                $('#last4').val(data.data.last4);
                $('#pin').val(data.data.pin);
                $('#category').val(data.data.card_category);
                $('#phone_no').val(data.data.phone_no);
                $('#pin').val(data.data.pin);
                $('.updateModal').modal('show');
            }
        });
    }

    

</script>

@endpush
