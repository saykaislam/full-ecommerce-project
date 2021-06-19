<a href="{{ route('compare') }}" class="position-relative top-quantity d-flex align-items-center text-dark text-decoration-none" title="Compare">
    <i class="flaticon-shuffle flat-small text-dark"></i>
    @if(Session::has('compare'))
        <span class="" id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>
    @else
        <span class="" id="compare_items_sidenav">0</span>
    @endif
</a>
