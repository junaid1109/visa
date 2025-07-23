<div class="page-content">
    <div class="container-fluid">
        <!-- Main Card -->
        <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #c6d3e0;">
                    <h5 class="card-title mb-0">API Management</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="table-responsive">
                                <table id="cardsTable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <tbody>
                                        <tr class="text-center">
                                            <td>Connection Status</td>
                                            <td style="font-weight: bold;background-color:#bee3be">{{ $api->status }}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>Message</td>
                                            <td>{{ $api->message }}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>API Address</td>
                                            <td id="apiAddress" colspan="2">https://halapay.io/pay/api/v1</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <center class="mt-3">
                                    <button id="productionBtn" type="button" class="btn btn-success active">Production</button>
                                    <button id="sandboxBtn" type="button" class="btn btn-success">Sandbox</button>
                                </center>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        
           
        </div>
        </div>
</div>

<style>
    .btn.active {
        box-shadow: 0 0 10px #28a745;
        font-weight: bold;
    }
</style>
@push('scripts')
 <script>
    const apiAddressCell = document.getElementById("apiAddress");
    const productionBtn = document.getElementById("productionBtn");
    const sandboxBtn = document.getElementById("sandboxBtn");

    const productionURL = "https://halapay.io/pay/api/v1";
    const sandboxURL = "https://halapay.io/pay/sandbox/api/v1";

    // Set default as production
    apiAddressCell.textContent = productionURL;

    productionBtn.addEventListener("click", () => {
        apiAddressCell.textContent = productionURL;
        productionBtn.classList.add("active");
        sandboxBtn.classList.remove("active");
    });

    sandboxBtn.addEventListener("click", () => {
        apiAddressCell.textContent = sandboxURL;
        sandboxBtn.classList.add("active");
        productionBtn.classList.remove("active");
    });
</script>


@endpush
