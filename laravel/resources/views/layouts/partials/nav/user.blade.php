<li
    @if(Request::is('artists/create'))
        class="active"
    @endif
    >
    <a  class=""
        href="{!!route('artists.create')!!}">
        <i class="fa fa-plus"></i>
        Artist Profile
    </a>
</li>
<li>
    <a href="{!!action('Auth\AuthController@logout')!!}">
        <i class="fa fa-sign-out"></i>
            Logout
    </a>
</li>
