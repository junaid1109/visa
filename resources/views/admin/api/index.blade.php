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
                                    </div>
                                    <div class="card-body">

                                        <!-- Single DataTable -->
                                        <table id="cardsTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Status</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center" >
                                                    <td>{{$api->status}}</td>
                                                    <td>{{$api->message}}</td>
                                                    <td>
                                                        <button class="btn btn-info" data-toggle="modal" data-target=".updateModal"  > <i class="bx bx-edit"></i></button>
                                                    </td>
                                                </tr>
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
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Create Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('vrtvrtregrtrtbteyb.api.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input class="form-control" required placeholder="Message" type="text" name="message" value=" {{ $api->message}}">
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="status">
                                <option value="Connected" {{ ($api->status=='Connected'?'selected':'')}}>Connected</option>
                                <option value="Disable" {{ ($api->status=='Disable'?'selected':'')}}>Disable</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <center>
                            <button type="submit"  class="btn btn-success waves-effect waves-light" >Update</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

