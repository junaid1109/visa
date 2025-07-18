<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Welcome to Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                      <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Total Account Balance</p>
                                                        <h4 class="mb-0 font-weight-bold ">${{ Auth::user()->balance }}</h4>
                                                    </div>
                                                    
                                                    <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target="#depositModal">Deposit</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Total Active Cards</p>
                                                        <h4 class="mb-0">{{ $cards->where('card_status', 'Active')->count() }}</h4>
                                                    </div>
                                                    
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Total Pending Cards</p>
                                                        <h4 class="mb-0">{{ $cards->where('card_status', 'Pending')->count() }}</h4>
                                                    </div>
                                                    
                                                     <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-briefcase-alt-2 font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                  
                                </div>
                                <!-- end row -->

                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container-fluid -->
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
                        <input type="number" class="form-control" id="depositAmount" placeholder="Enter amount">
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
            <h5><strong>Card deposit - Ethereum (ERC20)</strong></h5>
            <p class="text-muted small">Powered by Fireblocks</p>
            <div class="card bg-light p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <span class="font-weight-bold" id="ethAddress">0x71C7656EC7ab88b098defB751B7401B5f6d8976F</span>
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
        <h5><strong>Card deposit - Polygon (ERC20)</strong></h5>
        <p class="text-muted small">Powered by Fireblocks</p>
        <div class="card bg-light p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <span class="font-weight-bold" id="polygonAddress">0x89C7656EC7ab88b098defB751B7401B5f6d8976F</span>
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
        <h5><strong>Card deposit - Solana (SPL)</strong></h5>
        <p class="text-muted small">Powered by Fireblocks</p>
        <div class="card bg-light p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <span class="font-weight-bold" id="solanaAddress">HNfJYhRk2HkEF1Q2Xb3WYH8v2qK5Jt8w7zL6p9x0y1</span>
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
                                        <p class="mb-3">DBS Bank (Hong Kong) Limited</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>SWIFT code</strong></h6>
                                        <p class="mb-3">DHBKHKHH</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>Our bank address</strong></h6>
                                        <p>18th Floor, The Center,<br>99 Queen's Road Central,<br>Central, Hong Kong HK</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <h6 class="text-muted mb-1"><strong>Bank code</strong></h6>
                                        <p class="mb-2">916</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>Branch code</strong></h6>
                                        <p class="mb-2">478</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>Bank account</strong></h6>
                                        <p class="mb-2">001153663</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>Beneficiary name</strong></h6>
                                        <p class="mb-2">Visa Technologies Limited</p>
                                        
                                        <h6 class="text-muted mb-1"><strong>Beneficiary address</strong></h6>
                                        <p>25E, 23/F, One Taikoo Place,<br>979 King's Road,<br>Quarry Bay, Hong Kong</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="referenceCheck">
                        <label class="form-check-label" for="referenceCheck">
                            I have put reference ID <strong>IBM-EC24ED</strong> in the remark/note field. This helps us identify and process your payment.
                        </label>
                    </div>
                    
                    <div class="alert alert-warning">
                    Please note that we will only be able to process deposits made from bank accounts with the same name as your registered entity in Visa.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmTransferBtn">I have transferred</button>
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