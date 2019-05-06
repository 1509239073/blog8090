{{--<form action="/home/user" method="POST" enctype="multipart/form-data">--}}
    {{--{{csrf_field()}}--}}


    {{--<input type="file"  name="file"  id="file" />--}}


    {{--<input type="submit" value="处理">--}}
{{--</form>--}}

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery.js"></script>


<div class="container">
    @foreach ($users as $user)
        {{ $user->name }} <br/>
    @endforeach
</div>

{!! $pages !!}