<div class="page-content">
    <div class="container-fluid">
          @include('layouts.alert-msg')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Profile Setting</h4>
                    <form action="{{ route('user.settings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-1 col-form-label">Name</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text"  name="name" value=" {{ Auth::user()->name }}" >
                            </div>

                            <label for="example-text-input" class="col-md-1 col-form-label">Email</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text"  value=" {{ Auth::user()->email }}" readonly style="background-color:#f0f0f0">
                            </div>

                        </div>
                        <div >
                            <center>
                                <button type="submit"  class="btn btn-primary waves-effect waves-light" >Update</button>
                            </center>
                        </div>
                    </form>   
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>