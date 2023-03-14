<script src="/assets/lib/ckeditor/ckeditor.js?v=4"></script>
<script>
    (function(){
        "use strict";
        document.addEventListener('DOMContentLoaded', () => {
            if(document.getElementById('app-document-editor')){
                DecoupledDocumentEditor
                    .create( document.querySelector( '#app-document-editor' ), {
                        toolbar: {
                            items: [
                                'undo', 'redo', '|',
                                'heading', '|',
                                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                                'bulletedList', 'numberedList', 'todoList', '|',
                                'imageUpload', 'imageInsert', '|',
                                'outdent', 'indent', '|',
                                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                'alignment', '|',
                                'link', 'blockQuote', 'insertTable', 'codeBlock', '|',
                                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                                'exportPdf', 'exportWord', 'print', 'preview',
                            ],
                            shouldNotGroupWhenFull: true,
                        },
                        simpleUpload: {
                            // The URL that the images are uploaded to.
                            uploadUrl: '{{$base_url}}/office/upload-document-image',

                            // Enable the XMLHttpRequest.withCredentials property.
                            withCredentials: true,

                            // Headers sent along with the XMLHttpRequest to the upload server.
                            headers: {
                                'X-CSRF-TOKEN': window.csrf_token,
                            }
                        },
                    } )
                    .then( editor => {
                        const toolbarContainer = document.querySelector( '#toolbar-container' );

                        toolbarContainer.appendChild( editor.ui.view.toolbar.element );

                        // on change
                        editor.model.document.on( 'change:data', () => {
                            document.getElementById('app-editor-content').value = editor.getData();
                        });

                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            }
        });
    })();
</script>
