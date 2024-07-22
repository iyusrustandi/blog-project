<script src="https://cdn.tiny.cloud/1/pfyltl8tj3k5dnshsl19f82cc76y9jdkhqpsb6j9dlxm4w0h/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
{{-- <script>
  tinymce.init({
    selector: 'textarea#content', 
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    setup: function (editor) {
      editor.on('change', function () {
        editor.save();
      });
    }
  });

  document.getElementById('yourFormId').addEventListener('submit', function() {
    tinymce.triggerSave();
  });
</script> --}}

 <script>
    tinymce.init({
      selector: 'textarea#content',
      plugins: 'code table lists image codesample',
      toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link image | codesample',
      setup: function (editor) {
        editor.on('change', function () {
          editor.save();
        });
      },
      image_title: true,
      automatic_uploads: true,
      images_upload_url: '{{ route('upload.image') }}',
      file_picker_types: 'image',
      file_picker_callback: function (cb, value, meta) {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', function (e) {
          const file = e.target.files[0];

          const reader = new FileReader();
          reader.addEventListener('load', function () {
            const id = 'blobid' + (new Date()).getTime();
            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            cb(blobInfo.blobUri(), { title: file.name });
          });
          reader.readAsDataURL(file);
        });

        input.click();
      },
      content_style: `
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 16px; }
        pre[class*="language-"] { @apply bg-gray-900 text-white p-4 rounded-lg overflow-auto; }
        code[class*="language-"] { @apply font-mono text-sm; }
      `,
      images_upload_handler: function (blobInfo, success, failure) {
        let formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ route('upload.image') }}', {
          method: 'POST',
          body: formData
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('HTTP error, status = ' + response.status);
          }
          return response.json();
        })
        .then(result => {
          console.log('Upload successful:', result);
          success(result.location);
        })
        .catch(error => {
          console.error('Upload failed:', error);
          failure('HTTP Error: ' + error.message);
        });
      }
    });

    document.getElementById('formContent').addEventListener('submit', function () {
      tinymce.triggerSave();
    });
  </script>
</head>








{{-- register url at https://www.tiny.cloud/my-account/domains/ 
   log in with google account
--}}