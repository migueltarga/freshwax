@if($errors->any())
  <ul class="errors">
    {!! implode('', $errors->all('<li>:message</li>'))!!}
  </ul>
@endif
