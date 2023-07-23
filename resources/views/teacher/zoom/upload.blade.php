<form action="{{route('post.teacher.zoom-meeting.upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <p id="folder_name"></p>
    <input type="file" id="folder" name="folder[]" webkitdirectory directory multiple onchange="folderr()">
    <input type="button" value="Upload">
</form>
<script>
    //show folde name when select folder
    function folderr() {
        var x = document.getElementById("folder").files;
        var txt = x[0].webkitRelativePath;
        //get before /
        txt = txt.split("/");
        txt = txt[0];
        document.getElementById("folder_name").innerHTML = txt;
    }
</script>