<form action="{{route('post.teacher.zoom-meeting.upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="folder_name" id="folder_name">
    <input type="file" id="folder" name="folder[]" webkitdirectory directory multiple onchange="folderr()">
    <input type="button" value="Upload">
</form>
<script>
    //show folde name when select folder
    function folderr() {
        var x = document.getElementById("folder").files;
        var txt = x[0].webkitRelativePath;
        document.getElementById("folder_name").value = txt;
    }
</script>