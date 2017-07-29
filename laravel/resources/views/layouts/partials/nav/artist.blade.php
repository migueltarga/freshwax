<a class="btn btn-default navbar-btn"
   href="{!!route('albums.create')!!}">
    <i class="fa fa-plus"></i>
    Album
</a>
<a class="btn btn-default navbar-btn"
   href="{!!route('tracks.create')!!}">
    <i class="fa fa-plus"></i>
    Track
</a>
<a class="btn btn-default navbar-btn"
   href="{!!route('lyrics.create')!!}">
    <i class="fa fa-plus"></i>
    Lyrics
</a>
<a class="btn btn-default navbar-btn"
   href="{!!route('posts.create')!!}">
    <i class="fa fa-plus"></i>
    Post
</a>
<a class="btn btn-default navbar-btn"
   href="{!!route('events.create')!!}">
    <i class="fa fa-plus"></i>
    Event
</a>
<a class="btn btn-default navbar-btn"
   href="{!!route('videos.create')!!}">
    <i class="fa fa-plus"></i>
    Video
</a>
<a class="btn btn-default navbar-btn"
   href="	{!!route('items.create')!!}">
    <i class="fa fa-plus"></i>
    Merch Item
</a>
<li>
    <form name="logout" method="POST" action="{!!route('users.artistprofile.activate')!!}" class="navbar-form">
        <select name="artist_id">
            <!-- Artist Choices -->
        </select>

        <div class="form-group">
            <button type="submit" class=" btn btn-default">
                <i class="fa fa-sign-out"></i>
                Set Active
            </button>
        </div>
    </form>
</li>
