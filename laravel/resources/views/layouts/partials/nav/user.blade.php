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
    <form name="logout" method="POST" action="{!!action('Auth\LoginController@logout')!!}" class="navbar-form">
        <div class="form-group">
            <button type="submit" class=" btn btn-default">
                <i class="fa fa-sign-out"></i>
                Logout
            </button>
        </div>
    </form>
</li>
