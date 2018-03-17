@if(Session::has('flashSuccess'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>{{ Session::get('flashSuccess') }}</strong>
    </div>
@endif

@if(Session::has('flashError'))
  <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @if($errors->has('product_name'))
        <strong>{{ $errors->first('product_name') }}</strong>
        @endif
        @if($errors->has('quantity'))
        <strong>{{ $errors->first('quantity') }}</strong>
        @endif
        @if($errors->has('description'))
        <strong>{{ $errors->first('description') }}</strong>
        @endif
    </div>
@endif
