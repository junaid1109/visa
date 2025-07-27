
    document.getElementById('cardForm').addEventListener('submit', function(e) {
        const category = document.getElementById('card_category').value;
        if (category === 'Visa') {
            e.preventDefault(); // Stop form submission
                {
                Swal.fire({
                    text:"Visa Cards are currently in maintenance mode, we will let you know once they are available again. Thanks for being part of us",
                    type:"danger",
                    showCancelButton:!0,
                    confirmButtonColor:"#556ee6",
                    cancelButtonColor:"#f46a6a"
                });
            }
        }
    });

    document.getElementById('cardForm').addEventListener('submit', function(e) {
        const type = document.getElementById('card_type').value;
        if (type === 'Physical') {
            e.preventDefault(); // Stop form submission
                {
                Swal.fire({
                    text:"Physical Cards are currently in maintenance mode, we will let you know once they are available again. Thanks for being part of us",
                    type:"danger",
                    showCancelButton:!0,
                    confirmButtonColor:"#556ee6",
                    cancelButtonColor:"#f46a6a"
                });
            }
        }
    });

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
            url: fetchCardUrl,
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
    

    function checkStatus(id) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: fetchCardUrl,
            type: 'POST',
            data: {
                _token: csrfToken,
                id: id
            },
            success: function(data) {
                $('#id').val(data.data.id);
                $('#reject_name').val(data.data.name_on_card);
                $('#reject_email').val(data.data.email);
                $('#reject_balance').val(data.data.balance);
                $('#reject_type').val(data.data.card_type);
                $('#reject_category').val(data.data.card_category);
                $('#reject_phone_no').val(data.data.phone_no);
                $('#reject_status').val(data.data.card_status);
                $('#reject_reason').val(data.data.reject_reason);
                $('.rejectModal').modal('show');
            }
        });
    }
    
