@include('adminPanel.fixed.head')
<div class="container-scroller">
    @include('adminPanel.fixed.sidebar')
    <div class="container-fluid page-body-wrapper">
@include('adminPanel.fixed.header')
@yield('admin_content')
@include('adminPanel.fixed.footer')
    </div>
</div>
