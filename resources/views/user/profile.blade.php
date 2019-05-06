<form action="/home/user" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}


    <input type="file"  name="file"  id="file" />


    <input type="submit" value="处理">
</form>
