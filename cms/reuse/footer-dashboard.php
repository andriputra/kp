<script>
    ClassicEditor
    .create(document.querySelector('#description'), {
        // extraPlugins: 'imageUpload', // Mengaktifkan plugin "Image" untuk unggah gambar
        // ckfinder: {
        //     uploadUrl: 'upload-script.php' 
        // }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>

</body>
</html>