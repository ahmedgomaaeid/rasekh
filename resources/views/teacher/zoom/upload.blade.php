<form action="{{route('post.teacher.zoom-meeting.upload')}}" method="POST">
    @csrf
    <input type="file" id="fileInput" name="fileInput" webkitdirectory>
    <input type="submit" value="Upload">
</form>