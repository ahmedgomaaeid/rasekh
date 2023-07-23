<form action="{{route('post.teacher.zoom-meeting.upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <p id="folder_name">
    <input type="file" id="folder" name="folder[]" webkitdirectory directory multiple onchange="document.getElementById('folder_name').innerHTML = this.value.replace('C:\\fakepath\\', '');">
    <input type="button" value="Upload">
</form>
<script>
    //show folde name when select folder
</script>