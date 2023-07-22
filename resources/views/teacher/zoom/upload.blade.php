<form action="{{route('post.teacher.zoom-meeting.upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" id="folder" name="folder[]" webkitdirectory directory multiple>
    <input type="submit" value="Upload">
</form>