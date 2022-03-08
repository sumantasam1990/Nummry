<div class="row">
    <div class="col-10 mx-auto">
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading"><i class="bi bi-check2-circle"></i> Success!</h4>
                <strong>{!! session('msg') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('err'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading"><i class="bi bi-info-circle"></i> Error!</h4>
                <strong>{{ session('err') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            @if (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading"><i class="bi bi-info-circle"></i> Info!</h4>
                    <strong>{{ session('info') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    </div>
</div>

@if($errors->any())
<div class="row">
    <div class="col-10 mx-auto">
        <div class="alert alert-danger">
            @if($errors->any())
                {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
            @endif
        </div>
    </div>
</div>
@endif
