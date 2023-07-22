<form action="{{route('post.teacher.zoom-meeting.upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" id="fileInput" name="file" webkitdirectory>
    <input type="submit" value="Upload">
</form>