<!doctype html>
<html lang="en">
@include('header')

<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
            @if(session()->has('warning'))
            <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif

        @yield('content');
    </div>
</div>
</body>
</html>
