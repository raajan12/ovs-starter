<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle fa-fw mr-2"></i> {{ $errors->first() }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle fa-fw mr-2"></i> {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fa fa-check-circle fa-fw mr-2"></i> {{ session('success') }}
        </div>
    @endif

</div>
