@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
                <div class="col-md-12">
                    <div class="well well-lg"></div>
                </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
