<!doctype html>

<html lang="en">
@include('frontend.layout.header')

<body  data-spy="scroll" data-target="#myScrollspy" data-offset="15">
    @include('frontend.layout.navbar')
   
    <main>
        @yield('content')
       
    </main>
    @include('frontend.layout.footer')
    
</body>

</html>
