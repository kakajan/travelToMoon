<form method="POST" enctype="multipart/form-data" action="/upload-file">
    @csrf
    <label for="myfile">Select a file:</label>
    <input type="file" id="myfile" name="myfile"><br><br>
    <input type="submit">
</form>
<script>
    var uploadField = document.getElementById("myfile");

    uploadField.onchange = function() {
        if (this.files[0].size > 2097152) {
            alert("File is too big!");
            this.value = "";
        };
    };
</script>
<img src="/storage/avatars/rz5h3mdN6WFu2LoE42j8mSpapvjBePxuBHmVcSyo.jpg" alt="">
