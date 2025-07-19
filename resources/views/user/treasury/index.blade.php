<div class="page-content">
    <div class="container-fluid">
        <!-- Main Card -->
        <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #c6d3e0;">
                    <h5 class="card-title mb-0">Visa Card</h5>
                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#depositModal">Increase funds</button>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted border-0 pl-0">Collateral </td>
                                            <td class="text-right border-0"><strong>USD 0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted border-0 pl-0">Equivalent credit assigned</td>
                                            <td class="text-right border-0"><strong>USD 0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted border-0 pl-0">Outstanding balance</td>
                                            <td class="text-right border-0"><strong>USD 0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted border-0 pl-0">Available balance</td>
                                            <td class="text-right border-0"><strong>USD {{ Auth::user()->balance }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- General Card -->
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #c6d3e0;">
                <h5 class="card-title mb-0">Visa Pay</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title"><strong> Total funds </strong></h4>
                            <dl class="row mb-0">
                                

                                <dt class="col-sm-5">Payment amount awaiting funds</dt>
                                <dd class="col-sm-3 offset-sm-4"><strong>USDT 0.00</strong></dd>
                                <dd class="col-sm-9 offset-sm-9"><strong>USDC 0.00</strong></dd>

                                <dt class="col-sm-5">Available balance</dt>
                                <dd class="col-sm-3 offset-sm-4"><strong>USDT 0.00</strong></dd>
                                <dd class="col-sm-9 offset-sm-9"><strong>USDC 0.00</strong></dd>
                            </dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>

           
        </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #c6d3e0;">
                        <h5 class="card-title mb-0">General</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Total funds </span>
                            <strong>USDT 0.00</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<style>
.card {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}
.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}
.text-muted {
    color: #6c757d !important;
}
</style>
</div>

    <div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Increase credit via deposit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You can increase credit limit by depositing an equivalent amount</p>
                    
                    <hr>

                    <ul class="nav nav-pills mb-4" id="depositMethodTabs" role="tablist">
                        <li class="nav-item" id="flatCurrencyBtn">
                            <a class="nav-link active" id="flat-currency-tab" data-toggle="pill" href="#flatCurrency" role="tab" aria-controls="flatCurrency" aria-selected="true">
                            <i class="fas fa-money-bill-wave mr-2"></i> Deposit with flat currency
                            </a>
                        </li>
                        <li class="nav-item" id="stablecoinsBtn">
                            <a class="nav-link" id="stablecoins-tab" data-toggle="pill" href="#stablecoins" role="tab" aria-controls="stablecoins" aria-selected="false">
                            <i class="fas fa-coins mr-2"></i> Deposit with stablecoins
                            </a>
                        </li>
                    </ul>
                                
                    <!-- Flat Currency Section (Initially hidden) -->
                    <div id="flatCurrencySection">
                        <div class="form-group">
                            <label><strong>Amount</strong></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="depositAmount" placeholder="Enter amount">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stablecoins Section (Initially hidden) -->
                    <div id="stablecoinsSection" style="display:none;">
                    <div class="form-group">
                        <label><strong>Network</strong></label>
                        <select class="form-control" id="networkSelect">
                        <option value="">Select</option>
                        <option value="ethereum">Ethereum - ERC20</option>
                        <option value="polygon">Polygon PoS - ERC20</option>
                        <option value="solana">Solana - SPL</option>
                        <option value="tron">TRON - TRC20</option>
                        </select>
                    </div>
                    </div>
                    
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="understandCheck">
                    <label class="form-check-label" for="understandCheck">
                        I understand Visa's minimum transfer amount and supported assets
                    </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="makeDepositBtn" disabled>Make Deposit</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Second Modal (Dynamic Content) -->
    <div class="modal fade" id="networkDepositModal" tabindex="-1" role="dialog" aria-labelledby="networkDepositModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="networkDepositModalLabel">Deposit Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="networkModalBody">
                <!-- Dynamic content will be inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Return to dashboard</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Network Templates (Hidden) -->
    <div id="networkTemplates" style="display:none;">
    <!-- Ethereum Template -->
        <div id="ethereumTemplate">
            <p>You can increase credit limit by depositing an equivalent amount</p>
            <h6><strong>Network</strong></h6>
            <p>Ethereum - ERC20</p>
            <hr>
            <center>
                <img src="{{asset('admin_assets/images/qrcode/1.PNG')}}" alt="Ethereum Logo" style="width: 150px;" class="mb-2">
            </center>

            <h5><strong>Card deposit - Ethereum (ERC20)</strong></h5>
            <p class="text-muted small">Powered by Fireblocks</p>
            <div class="card bg-light p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <span class="font-weight-bold" id="ethAddress">0x4a8ecE4eD8739c038780a62360DA918b2BE8B582</span>
                <button class="btn btn-sm btn-outline-secondary copy-btn" data-target="ethAddress">📋</button>
            </div>
            </div>
            <p class="mb-4">1 USDT = 0.99950002 USD</p>
            <p class="small text-muted mb-4">
            Rates shown involving USDT are indicative, rates applied are the live rates when the funds are used to settle a deposit/repayment/payment.
            </p>
            <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="ethUsdtCheck">
            <label class="form-check-label" for="ethUsdtCheck">
                Only send USDT (ERC20) to this address.<br>
                <small class="text-danger">Sending any other asset to this address may result in loss of funds.</small>
            </label>
        </div>
    </div>

    <!-- Polygon Template -->
    <div id="polygonTemplate">
        <p>You can increase credit limit by depositing an equivalent amount</p>
        <h6><strong>Network</strong></h6>
        <p>Polygon PoS - ERC20</p>
        <hr>
        <center>
            <img src="{{asset('admin_assets/images/qrcode/1.PNG')}}" alt="Ethereum Logo" style="width: 150px;" class="mb-2">
        </center>

        <h5><strong>Card deposit - Polygon (ERC20)</strong></h5>
        <p class="text-muted small">Powered by Fireblocks</p>
        <div class="card bg-light p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <span class="font-weight-bold" id="polygonAddress">0x4a8ecE4eD8739c038780a62360DA918b2BE8B582</span>
            <button class="btn btn-sm btn-outline-secondary copy-btn" data-target="polygonAddress">📋</button>
        </div>
        </div>
        <p class="mb-4">1 USDT = 0.99970004 USD</p>
        <p class="small text-muted mb-4">
        Rates shown involving USDT are indicative, rates applied are the live rates when the funds are used to settle a deposit/repayment/payment.
        </p>
        <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="polygonUsdtCheck">
        <label class="form-check-label" for="polygonUsdtCheck">
            Only send USDT (Polygon) to this address.<br>
            <small class="text-danger">Sending any other asset to this address may result in loss of funds.</small>
        </label>
        </div>
    </div>

    <!-- Solana Template -->
    <div id="solanaTemplate">
        <p>You can increase credit limit by depositing an equivalent amount</p>
        <h6><strong>Network</strong></h6>
        <p>Solana - SPL</p>
        <hr>
        <center>
            <img src="{{asset('admin_assets/images/qrcode/3.PNG')}}" alt="Ethereum Logo" style="width: 150px;" class="mb-2">
        </center>
        <h5><strong>Card deposit - Solana (SPL)</strong></h5>
        <p class="text-muted small">Powered by Fireblocks</p>
        <div class="card bg-light p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <span class="font-weight-bold" id="solanaAddress">8n1TUjcTRBRRiGYW6chVWuynsTpDztsiqSENy33TMTrw</span>
            <button class="btn btn-sm btn-outline-secondary copy-btn" data-target="solanaAddress">📋</button>
        </div>
        </div>
        <p class="mb-4">1 USDT = 0.99980005 USD</p>
        <p class="small text-muted mb-4">
        Rates shown involving USDT are indicative, rates applied are the live rates when the funds are used to settle a deposit/repayment/payment.
        </p>
        <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="solanaUsdtCheck">
        <label class="form-check-label" for="solanaUsdtCheck">
            Only send USDT (SPL) to this address.<br>
            <small class="text-danger">Sending any other asset to this address may result in loss of funds.</small>
        </label>
        </div>
    </div>

    <!-- TRON Template -->
    <div id="tronTemplate">
        <p>You can increase credit limit by depositing an equivalent amount</p>
        <h6><strong>Network</strong></h6>
        <p>TRON - TRC20</p>
        <hr>
        <center>
            <img src="{{asset('admin_assets/images/qrcode/2.PNG')}}" alt="Ethereum Logo" style="width: 150px;" class="mb-2">
        </center>

        <h5><strong>Card deposit - Tron (TRC20)</strong></h5>
        <p class="text-muted small">Powered by Fireblocks</p>
        <div class="card bg-light p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <span class="font-weight-bold" id="tronAddress">TQ22FiaeqjyHfUS9bqnrYboy3YM1VMUtv9</span>
            <button class="btn btn-sm btn-outline-secondary copy-btn" data-target="tronAddress">📋</button>
        </div>
        </div>
        <p class="mb-4">1 USDT = 0.99960003 USD</p>
        <p class="small text-muted mb-4">
        Rates shown involving USDT are indicative, rates applied are the live rates when the funds are used to settle a deposit/repayment/payment.
        </p>
        <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="tronUsdtCheck">
        <label class="form-check-label" for="tronUsdtCheck">
            Only send USDT (TRON) to this address.<br>
            <small class="text-danger">Sending any other asset to this address may result in loss of funds.</small>
        </label>
        </div>
    </div>
    </div>

    <div class="modal fade " id="bankDetailsModal" tabindex="-1" role="dialog" aria-labelledby="bankDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bankDetailsModalLabel">Increase credit via deposit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="card ">
                        <div class="card-body">
                            <p class="card-text">You can increase credit limit by depositing an equivalent amount</p>
                            
                            <div class="d-flex justify-content-between mb-2">
                            <h6 class="mb-0"><strong>Total Amount</strong></h6>
                            <span id="displayAmount">$0.00</span>
                            </div>
                            
                            <div class="d-flex justify-content-between mb-2">
                            <h6 class="mb-0"><strong>Requested credit limit</strong></h6>
                            <span id="displayCreditLimit">$0.00</span>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                            <h6 class="mb-0"><strong>Deposit</strong></h6>
                            <span id="displayDeposit">$0.00</span>
                            </div>
                        </div>
                    </div>
                    
                    <h5><strong>Bank details</strong></h5>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1"><strong>Beneficiary bank name</strong></h6>
                                        <p class="mb-3">visa build inc</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>SWIFT code</strong></h6>
                                        <p class="mb-3">TRWIUS35XXX</p>

                                        <h6 class="text-muted mb-1"><strong>Bank account</strong></h6>
                                        <p class="mb-3">215503855124</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>Our bank address</strong></h6>
                                        <p>city bank US Inc, 30 W. 26TH Street, Sixth Floor, New York, NY, 10010, United States</p>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning">
                    Please note that we will only be able to process deposits made from bank accounts with the same name as your registered entity in Visa.
                    </div>

                     <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmTransferBtn">I have transferred</button>
                </div>
                </div>
               
            </div>
        </div>
    </div>

@push('scripts')

<script>
  $(document).ready(function() {

     $(document).on('click', '.copy-btn', async function() {
  const targetId = $(this).data('target');
  const address = $('#' + targetId).text();
  const $btn = $(this);
  
  try {
    // Try modern Clipboard API first
    if (navigator.clipboard) {
      await navigator.clipboard.writeText(address);
    } else {
      // Fallback for older browsers
      const $temp = $('<textarea>');
      $('body').append($temp);
      $temp.val(address).select();
      document.execCommand('copy');
      $temp.remove();
    }
    
    // Visual feedback
    $btn.html('✓ Copied');
    $btn.removeClass('btn-outline-secondary').addClass('btn-outline-success');
    
    setTimeout(() => {
      $btn.html('📋');
      $btn.removeClass('btn-outline-success').addClass('btn-outline-secondary');
    }, 2000);
    
  } catch (err) {
    console.error('Failed to copy:', err);
    
    // Ultimate fallback - show the text in a prompt
    const textarea = document.createElement('textarea');
    textarea.value = address;
    document.body.appendChild(textarea);
    textarea.select();
    
    alert('Please copy this address manually:\n\n' + address);
    document.body.removeChild(textarea);
  }
});

  // Track which deposit method is selected
  let depositMethod = null;
    updateDepositButton();
  
  // Handle deposit method selection
  $('#flatCurrencyBtn').click(function() {
    depositMethod = 'flatCurrency';
    $('#flatCurrencySection').show();
    $('#stablecoinsSection').hide();
  });
  
  $('#stablecoinsBtn').click(function() {
    depositMethod = 'stablecoins';
    $('#stablecoinsSection').show();
    $('#flatCurrencySection').hide();
    updateDepositButton();
  });
  
  // Enable/disable Make Deposit button
  function updateDepositButton() {
    let isValid = false;
    const amount = $('#depositAmount').val();
    if(amount!=''){
        isValid = amount && parseFloat(amount) > 0 && $('#understandCheck').is(':checked');
    }
    if (depositMethod === 'flatCurrency') {
        
      const amount = $('#depositAmount').val();
      isValid = amount && parseFloat(amount) > 0 && $('#understandCheck').is(':checked');
    } 
    else if (depositMethod === 'stablecoins') {
      isValid = $('#networkSelect').val() !== '' && $('#understandCheck').is(':checked');
    }
    
    $('#makeDepositBtn').prop('disabled', !isValid);
  }
  
  // Listen for changes that affect the deposit button state
  $('#depositAmount, #networkSelect, #understandCheck').on('input change', updateDepositButton);
  
  // Handle Make Deposit button click
  $('#makeDepositBtn').click(function() {
    if (depositMethod === 'flatCurrency' || depositMethod == null ) {
      const amount = parseFloat($('#depositAmount').val());
      
      // Update bank details modal with the amount
      $('#displayAmount').text('$' + amount.toFixed(2));
      $('#displayCreditLimit').text('$' + amount.toFixed(2));
      $('#displayDeposit').text('$' + amount.toFixed(2));
      
      // Show bank details modal
      $('#depositModal').modal('hide');
      $('#bankDetailsModal').modal('show');
    } 
    else if (depositMethod === 'stablecoins' ) {
        const selectedNetwork = $('#networkSelect').val();
        const selectedNetworkText = $('#networkSelect option:selected').text();
        
        if (!selectedNetwork) return;
        
        // Close first modal
        $('#depositModal').modal('hide');
        
        // Set modal title
        $('#networkDepositModalLabel').text('Deposit via ' + selectedNetworkText);
        
        // Insert appropriate template content
        const templateId = selectedNetwork + 'Template';
        const templateContent = $('#' + templateId).html();
        $('#networkModalBody').html(templateContent);
        
        // Show second modal
        $('#networkDepositModal').modal('show');
    }
  });
  
  // Handle Confirm Transfer button
  $('#confirmTransferBtn').click(function() {
    $('#bankDetailsModal').modal('hide');
    location.reload();
  });
});
</script>


@endpush