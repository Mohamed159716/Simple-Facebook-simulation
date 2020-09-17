<form class="needs-validation" novalidate method="post" action="{{ route('updatedata.update', $user->id) }}" enctype="multipart/form-data">

{{ csrf_field()}}

    <input type="file" name="image">
    <input type="submit">

</form>