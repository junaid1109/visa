@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('unsuccess'))

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('unsuccess') }}
    </div>
@endif


@push('scripts')
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").alert('close');
        }, 2000);
    });
</script>
@endpush
