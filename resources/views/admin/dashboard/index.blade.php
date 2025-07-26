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
        @include('layouts.alert-msg')
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Users</p>
                                        <h4 class="mb-0">{{ count($users); }}</h4>
                                    </div>
                                    <a href="{{ route('vrtvrtregrtrtbteyb.loginAsMember')    }}">
                                        <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" >Login as user</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Account Balance</p>
                                        <h4 class="mb-0">${{ $user->balance; }}</h4>
                                    </div>
                                    <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target="#balanceModal">Add Account Balance</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Total Card</p>
                                        <h4 class="mb-0">{{ count($card); }}</h4>
                                    </div>
                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-dish font-size-24"></i>
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
                                        <p class="text-muted font-weight-medium">Total Virtual Card</p>
                                        <h4 class="mb-0">{{ $card->where('card_type', 'Virtual')->count()}}</h4>
                                    </div>
                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-radio font-size-24"></i>
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
                                        <p class="text-muted font-weight-medium">Total Physical Card</p>
                                        <h4 class="mb-0">{{  $card->where('card_type', 'Physical')->count() }}</h4>
                                    </div>
                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-briefcase-alt-2 font-size-24"></i>
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
                                        <p class="text-muted font-weight-medium">Remaining Virtual Card</p>
                                        <h4 class="mb-0">{{ $user->virtual_card; }}</h4>
                                    </div>
                                        <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target="#virtualModal">Add Virtual Card</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Remaining Physical Card</p>
                                        <h4 class="mb-0">{{  $user->physical_card; }}</h4>
                                    </div>
                                    <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target="#physicalModal">Add Physical Card</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Remaining Master Card</p>
                                        <h4 class="mb-0">{{ $user->master_card; }}</h4>
                                    </div>
                                        <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target="#masterModal">Add Master Card</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Remaining Visa Card</p>
                                        <h4 class="mb-0">{{  $user->visa_card; }}</h4>
                                    </div>
                                    <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target="#visaModal">Add Visa Card</button>

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

<div class="modal fade" id="virtualModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vrtvrtregrtrtbteyb.add') }}" method="post" >
                    @csrf
                <div class="modal-body">
                    <div id="flatCurrencySection">
                        <div class="form-group">
                            <label><strong>Add Virtual Card</strong></label>
                            <input type="number" name="total"  class="form-control"  placeholder="Enter in number">
                            <input type="hidden" name="type" value="virtual" >

                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="physicalModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vrtvrtregrtrtbteyb.add') }}" method="post" >
                    @csrf

            <div class="modal-body">
                <div id="flatCurrencySection">
                    <div class="form-group">
                        <label><strong>Add Physical Card</strong></label>
                        <input type="number" name="total" class="form-control"  placeholder="Enter in number">
                        <input type="hidden" name="type" value="physical" >

                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="masterModal" tabindex="-1" role="dialog" aria-labelledby="masterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vrtvrtregrtrtbteyb.add') }}" method="post" >
                    @csrf
                <div class="modal-body">
                    <div id="flatCurrencySection">
                        <div class="form-group">
                            <label><strong>Add Master Card</strong></label>
                            <input type="number" name="total"  class="form-control"  placeholder="Enter in number">
                            <input type="hidden" name="type" value="master" >

                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="visaModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vrtvrtregrtrtbteyb.add') }}" method="post" >
                    @csrf

            <div class="modal-body">
                <div id="flatCurrencySection">
                    <div class="form-group">
                        <label><strong>Add Visa Card</strong></label>
                        <input type="number" name="total" class="form-control"  placeholder="Enter in number">
                        <input type="hidden" name="type" value="visa" >

                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="balanceModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vrtvrtregrtrtbteyb.add') }}" method="post" >
                    @csrf
            <div class="modal-body">
                <div id="flatCurrencySection">
                    <div class="form-group">
                        <label><strong>Add Balance</strong></label>
                        <div class="input-group">
                                <input type="number" name="total" class="form-control"  placeholder="Enter in number">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                        </div>
                        <input type="hidden" name="type" value="balance" >

                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>