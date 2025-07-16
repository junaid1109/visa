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
                                                        <h4 class="mb-0 font-weight-bold ">$100</h4>
                                                    </div>
                                                    
                                                    <button  type="button" class="mb-2 btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target=".addModal">Deposit</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Active Card</p>
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
                                                        <p class="text-muted font-weight-medium">Pending Card</p>
                                                        <h4 class="mb-0">{{ $cards->where('card_status', 'Pending')->count() }}</h4>
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

                                  
                                </div>
                                <!-- end row -->

                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container-fluid -->
                </div>

            <div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                          
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">increse credit via deposit</h4>
                                        <p class="card-text">You can increse credit limit by depositing an equivalent amount</p>
                                        <a href="#" class="btn btn-primary">Deposit with fiat</a>
                                        <a href="#" class="btn btn-primary">Deposit with stablecoin</a>
                                    </div>
                                </div>
                                
                           
                        <div class="modal-body">
                            <form action="{{ route('user.card.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input class="form-control" placeholder="Name on card" type="text" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" placeholder="Balance" type="number" name="balance">
                                    </div>
                                </div>
                                <div style="float:right">
                                    <button type="submit"  class="btn btn-primary waves-effect waves-light" >Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>