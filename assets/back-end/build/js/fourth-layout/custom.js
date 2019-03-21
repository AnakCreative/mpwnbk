//****************** YOUR CUSTOMIZED JAVASCRIPT **********************//
//-- page js --//
var save_method; //for save method string
var table;
var konsentrasiEditor;
var profilesiteEditor;

$(window).load(function () {
    check(); //session check
    if (controller == "configsite") {

        general_site_map();

        $('#meta-tag-title').editable({
            emptytext: $('#meta-tag-title').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#meta-tag-title').parent().parent().find('.edit-box').show();
                $('#meta-tag-title').attr('data-value', result.information);
            },
            error: function (response, newValue) {
                $('#meta-tag-title').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah title tag';
                } else {
                    return response.msg;
                }

            },
        });
        // jQuery UI autocomplete extension - suggest labels may contain HTML tags
        // github.com/scottgonzalez/jquery-ui-extensions/blob/master/src/autocomplete/jquery.ui.autocomplete.html.js
        (function ($) {
            var proto = $.ui.autocomplete.prototype,
                initSource = proto._initSource;

            function filter(array, term) {
                var matcher = new RegExp($.ui.autocomplete.escapeRegex(term), "i");
                return $.grep(array, function (value) {
                    return matcher.test($("<div>").html(value.label || value.value || value).text());
                });
            }
            $.extend(proto, {
                _initSource: function () {
                    if (this.options.html && $.isArray(this.options.source)) {
                        this.source = function (request, response) {
                            response(filter(this.options.source, request.term));
                        };
                    } else {
                        initSource.call(this);
                    }
                },
                _renderItem: function (ul, item) {
                    return $("<li></li>").data("item.autocomplete", item).append($("<a></a>")[this.options.html ? "html" : "text"](item.label)).appendTo(ul);
                }
            });
        })(jQuery);

        var cache = {};

        function googleSuggest(request, response) {
            var term = request.term;
            if (term in cache) {
                response(cache[term]);
                return;
            }
            $.ajax({
                url: 'https://query.yahooapis.com/v1/public/yql',
                dataType: 'JSONP',
                data: {
                    format: 'json',
                    q: 'select * from xml where url="http://google.com/complete/search?output=toolbar&q=' + term + '"'
                },
                success: function (data) {
                    var suggestions = [];
                    try {
                        var results = data.query.results.toplevel.CompleteSuggestion;
                    } catch (e) {
                        var results = [];
                    }
                    $.each(results, function () {
                        try {
                            var s = this.suggestion.data.toLowerCase();
                            suggestions.push({
                                label: s.replace(term, '<b>' + term + '</b>'),
                                value: s
                            });
                        } catch (e) { }
                    });
                    cache[term] = suggestions;
                    response(suggestions);
                }
            });
        }
        $(function () {
            $('#hero-demo').tagEditor({
                placeholder: 'masukkan kata kunci ...',
                autocomplete: {
                    source: googleSuggest,
                    minLength: 3,
                    delay: 250,
                    html: true,
                    position: {
                        collision: 'flip'
                    }
                },
                onChange: function (field, editor, tags) {
                    $('#response').prepend(
                        'tags changed to: ' + (tags.length ? tags.join(', ') : '----') + '<hr>'
                    );
                    $("#bttn_submit_tag").click();
                },
                beforeTagSave: function (field, editor, tags, tag, val) {
                    $('#response').prepend('Tag ' + val + ' saved' + (tag ? ' over ' + tag : '') + '.');
                },
                beforeTagDelete: function (field, editor, tags, val) {
                    var q = confirm('remove tag "' + val + '"?');
                    if (q) $('#response').prepend('tag ' + val + ' deleted.');
                    else $('#response').prepend('removal of ' + val + ' discarded.');
                    return q;
                }
            });
        });
        $('#meta-tag-description').editable({
            emptytext: $('#meta-tag-description').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#meta-tag-description').parent().parent().find('.edit-box').show();
                $('#meta-tag-description').attr('data-value', result.phone);
            },
            error: function (response, newValue) {
                $('#meta-tag-description').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah description';
                } else {
                    return response.msg;
                }

            },
        });

        $('#latitude').editable({
            emptytext: $('#latitude').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#latitude').parent().parent().find('.edit-box').show();
                $('#latitude').attr('data-value', result.phone);
            },
            error: function (response, newValue) {
                $('#latitude').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah latitude';
                } else {
                    return response.msg;
                }

            },
        });

        $('#longitude').editable({
            emptytext: $('#longitude').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#longitude').parent().parent().find('.edit-box').show();
                $('#longitude').attr('data-value', result.phone);
            },
            error: function (response, newValue) {
                $('#longitude').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah longitude';
                } else {
                    return response.msg;
                }

            },
        });

        $('#logo-title').editable({
            emptytext: $('#logo-title').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#logo-title').parent().parent().find('.edit-box').show();
                $('#logo-title').attr('data-value', result.phone);
            },
            error: function (response, newValue) {
                $('#logo-title').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah judul website';
                } else {
                    return response.msg;
                }

            },
        });
        $('#sub-logo-title').editable({
            emptytext: $('#sub-logo-title').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#sub-logo-title').parent().parent().find('.edit-box').show();
                $('#sub-logo-title').attr('data-value', result.phone);
            },
            error: function (response, newValue) {
                $('#sub-logo-title').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah judul website';
                } else {
                    return response.msg;
                }

            },
        });
        $('#banner-video').editable({
            emptytext: $('#banner-video').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#banner-video').parent().parent().find('.edit-box').show();
                $('#banner-video').attr('data-value', result.phone);
            },
            error: function (response, newValue) {
                $('#banner-video').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah url banner video';
                } else {
                    return response.msg;
                }

            },
        });

    }

    if (controller == "profilesite") {
        ClassicEditor
            .create(document.querySelector('#content_profilewebsite'), {
                alignment: {
                    options: ['left', 'right', 'center', 'justify']
                },
                ckfinder: {
                    uploadUrl: asset_url + '/plugins/ckeditor5-build-classic/build/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files& responseType=json'
                },
                toolbar: [
                    'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo', 'imageUpload', 'imageStyle:full',
                    'imageStyle:side',
                    '|',
                    'imageTextAlternative'
                ]
            })
            .then(editor => {
                console.log('Editor was initialized', editor);
                profilesiteEditor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    }


    if (controller == "informasi") {
        $('#information').editable({
            emptytext: $('#information').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#information').parent().parent().find('.edit-box').show();
                $('#information').attr('data-value', result.information);
            },
            error: function (response, newValue) {
                $('#information').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah data informasi';
                } else {
                    return response.msg;
                }

            },
        });

        $('#address').editable({
            emptytext: $('#address').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#address').parent().parent().find('.edit-box').show();
                $('#address').attr('data-value', result.address);
            },
            error: function (response, newValue) {
                $('#address').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah data alamat';
                } else {
                    return response.msg;
                }

            },
        });

        $('#phone').editable({
            emptytext: $('#phone').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }
                var numberExp = /^[0-9]+$/;
                if (!$.trim(value).match(numberExp)) {
                    return "harus berisi angka";
                }
            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#phone').parent().parent().find('.edit-box').show();
                $('#phone').attr('data-value', result.phone);
            },
            error: function (response, newValue) {
                $('#phone').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah no.tlpn/handphone';
                } else {
                    return response.msg;
                }

            },
        });

        $('#email').editable({
            emptytext: $('#email').attr('data-value'),
            //toggle: 'dblclick',
            mode: 'inline',
            anim: 200,
            rows: 10,
            onblur: 'cancel',
            validate: function (value) {
                /*add ur validation logic and message here*/
                if ($.trim(value) == '') {
                    return 'tidak boleh kosong';
                }

                var email = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
                if (!$.trim(value).match(email)) {
                    return 'format email tidak valid';
                }

            },
            params: function (params) {
                /*originally params contain pk, name and value you can pass extra parameters from here if required */
                //eg . params.active="false";
                return params;
            },
            success: function (response, newValue) {
                var result = $.parseJSON(response);
                $('#email').parent().parent().find('.edit-box').show();
                $('#email').attr('data-value', result.email);
            },
            error: function (response, newValue) {
                $('#email').parent().parent().find('.edit-box').hide();
                if (!response.success) {
                    return 'berhasil, merubah email';
                } else {
                    return response.msg;
                }

            },
        });

    }
});

$(document).ready(function () {

    //datatables
    //setting datatable defaults
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        columnDefs: [{
            orderable: true,
            width: '100px',
            targets: [5]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>pencarian:</span> _INPUT_',
            lengthMenu: '<span>halaman:</span> _MENU_',
            zeroRecords: "maaf, tidak ada data",
            info: "tampil halaman _PAGE_ dari _PAGES_",
            infoEmpty: "maaf kosong data",
            infoFiltered: "(filtered from _MAX_ total records)",
            paginate: {
                'first': 'Pertama',
                'last': 'Akhir',
                'next': '&rarr;',
                'previous': '&larr;'
            }

        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },

        preDrawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    // basic responsive configuration
    table = $('#table').DataTable({
        "processing": true, //feature control the processing indicator.
        "serverSide": true, //feature control datatables server-side processing mode.
        "order": [], //initial no order.
        "bInfo": false,

        // load data for the table's content from an Ajax source
        "ajax": {
            "url": url + 'data-list',
            "type": "POST"
        },
        //set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        },],

    });

    // external table additions
    // ------------------------------ \\

    // add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder', 'masukkan kata . . .');

    if (controller == "konsentrasi") {
        ClassicEditor
            .create(document.querySelector('#content-konsentrasi'), {
                alignment: {
                    options: ['left', 'right', 'center', 'justify']
                },
                ckfinder: {
                    uploadUrl: asset_url + '/plugins/ckeditor5-build-classic/build/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files& responseType=json'
                },
                toolbar: [
                    'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo', 'imageUpload', 'imageStyle:full',
                    'imageStyle:side',
                    '|',
                    'imageTextAlternative'
                ]
            })
            .then(editor => {
                console.log('Editor was initialized', editor);
                konsentrasiEditor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    }

    if (controller == "inbox") {
        tinymce.init({
            selector: 'textarea#content-message',
            height: 300,
            theme: 'modern',
            plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak', 'searchreplace wordcount visualblocks visualchars code fullscreen', 'insertdatetime media nonbreaking save table contextmenu directionality', 'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc responsivefilemanager code'],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'fontsizeselect | fontselect | responsivefilemanager | print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
            templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            },
            {
                title: 'Test template 2',
                content: 'Test 2'
            }],
            plugins: 'placeholder',
            placeholder_attrs: 'tulis pesan disini . . .',
            mode: "specific_textareas",
            editor_selector: "mceEditor",
            relative_urls: false,
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
            remove_script_host: false,
            content_css: ['//fonts.googleapis.com/css?family=Lato', '//www.tinymce.com/css/codepen.min.css'],
            filemanager_crossdomain: true,
            external_filemanager_path: default_url + 'filemanager/',
            filemanager_title: "browse file manager",
            formats: {
                alignleft: {
                    selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                    classes: 'myleft'
                },
                aligncenter: {
                    selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                    classes: 'mycenter'
                },
                alignright: {
                    selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                    classes: 'myright'
                },
                alignfull: {
                    selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                    classes: 'myfull'
                }
            },

            external_plugins: {
                "filemanager": asset_url + '/plugins/tinymce/plugins/responsivefilemanager/plugin.min.js'
            }

        });

        $(document).on('focusin', function (e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });
    }

    if (controller == "banner") {

        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var minImageWidth = 1920,
            minImageHeight = 480;

        var myDropzone = new Dropzone(document.body, { // make the whole body a dropzone
            url: url + 'process-upload-file', // set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            maxFilesize: 2, // MB
            acceptedFiles: "image/*",
            dictInvalidFileType: "type file ini tidak dizinkan",
            previewTemplate: previewTemplate,
            autoQueue: false, // make sure the files aren't queued until manually added
            previewsContainer: "#previews", // define the container to display the previews
            clickable: ".fileinput-button", // define the element that should be used as click trigger to select files.
            init: function () {
                this.on("thumbnail", function (file) {
                    if (file.width < minImageWidth || file.height < minImageHeight) {
                        file.rejectDimensions()
                    } else {
                        file.acceptDimensions();
                    }
                });
            },
            accept: function (file, done) {
                file.acceptDimensions = done;
                file.rejectDimensions = function () {
                    done("ukuran gambar anda terlalu kecil.");
                };
            }
        });

        myDropzone.on("addedfile", function (file) {
            // hook-up the start button
            file.previewElement.querySelector(".start").onclick = function () {
                myDropzone.enqueueFile(file);
            };
        });

        // update the total progress bar
        myDropzone.on("totaluploadprogress", function (progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });

        myDropzone.on("sending", function (file, xhr, formData) {
            var heading = file.previewElement.querySelector("#heading").value;
            formData.append("heading", heading);
            var subheading = file.previewElement.querySelector("#subheading").value;
            formData.append("subheading", subheading);
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1";
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function (progress) {
            document.querySelector("#total-progress").style.opacity = "0";
        });

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function () {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        };
        document.querySelector("#actions .cancel").onclick = function () {
            myDropzone.removeAllFiles(true);
        };

        //event ketika Memulai mengupload
        myDropzone.on("sending", function (a, b, c) {
            a.token = Math.random();
            c.append("token", a.token); //Menmpersiapkan token untuk masing masing foto
        });


        //event ketika foto dihapus
        myDropzone.on("removedfile", function (a) {
            var token = a.token;
            $.ajax({
                type: "post",
                data: {
                    token: token
                },
                url: url + 'remove-slide-picture',
                cache: false,
                dataType: 'json',
                success: function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 8000
                    };
                    toastr.success('berhasil, menghapus data...', 'system says,');
                },
                error: function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 8000
                    };
                    toastr.error('terjadi kesalahan, tidak bisa menghapus data...', 'system says,');

                }
            });
        });

        //hide all descriptions
        $('.description').hide();

        function showFullHeight() {

            $('.gallery li').each(function () {
                $(this).find('.btn').click(function (e) {
                    console.log('error');
                    e.preventDefault();
                    //NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
                    $('.description').slideUp('normal');
                    //IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
                    if ($(this).next().is(':hidden') == true) {
                        //ADD THE ON CLASS TO THE BUTTON
                        $(this).addClass('on');
                        //OPEN THE SLIDE
                        $(this).next().slideDown('normal');
                    }

                }); //click
            }); //each
        } //function
        //load the function when the doc is ready
        showFullHeight();

    }
    variable_logo_picture();
    variable_favicon_picture();

    if (controller == "article") {
        // basic responsive configuration
        table = $('#table-article').DataTable({
            "processing": true, //feature control the processing indicator.
            "serverSide": true, //feature control datatables server-side processing mode.
            "order": [], //initial no order.
            "bInfo": false,

            // load data for the table's content from an Ajax source
            "ajax": {
                "url": url + 'article',
                "type": "POST"
            },
            //set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },],

        });

        // external table additions
        // ------------------------------ \\

        // add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder', 'masukkan kata . . .');

        $('input[name="file_image"]').fileuploader({
            addMore: false,
            // limit: 4,ƒ
            extensions: ['jpg', 'jpeg', 'png'],
            editor: {
                cropper: {
                    showGrid: true,
                },
                onSave: function (dataURL, item) {
                    saveEditedImage(item);
                },
            },
            onRemove: function (item) {
                $.post(url + 'remove__file', {
                    file: item.name
                });
            },
            thumbnails: {
                onImageLoaded: function (item) {
                    if (!item.html.find('.fileuploader-action-edit').length)
                        item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-popup fileuploader-action-edit" title="Edit"><i></i></a>');

                    // hide current thumbnail (this is only animation)
                    if (item.imageIsUploading) {
                        item.image.addClass('fileuploader-loading').html('');
                    }
                }
            },
        });

        // editor save function
        var saveEditedImage = function (item) {
            // if still uploading
            // pend and exit
            if (item.upload && item.upload.status == 'loading')
                return item.editor.isUploadPending = true;

            // if not preloaded or not uploaded
            if (!item.appended && !item.uploaded)
                return;

            // if no editor
            if (!item.editor || !item.reader.width)
                return;

            // if uploaded
            // resend upload
            if (item.upload && item.upload.resend) {
                item.upload.resend();
            }

            // if preloaded
            // send request
            if (item.appended) {
                // hide current thumbnail (this is only animation)
                item.imageIsUploading = true;
                item.image.addClass('fileuploader-loading').html('');
                item.html.find('.fileuploader-action-popup').hide();

                $.post(url + 'ajax_resize_file', { _file: item.file, _editor: JSON.stringify(item.editor), fileuploader: 1 }, function () {
                    item.reader.read(function () {
                        delete item.imageIsUploading;
                        item.html.find('.fileuploader-action-popup').show();

                        item.popup.html = item.popup.editor = item.editor.crop = item.editor.rotation = null;
                        item.renderThumbnail();
                    }, null, true);
                });
            }
        };
    }

    $('#add-general-post').hide();
    $('#img-src').hide();
    $('#img-label').hide();

});
// -- function account --//
// account javascript content
// add account user
function create_user() {
    window.location = base_url + 'create-user';
}
// add group user
function create_group() {
    window.location = base_url + 'create-group';
}
// edit user
function user_edit(id) {
    window.location = base_url + 'edit-user/' + id;
}
// delete user
function user_delete(id) {
    window.location = base_url + 'delete-user/' + id;
}

// delete group
function group_delete(id) {
    window.location = base_url + 'delete-group/' + id;
}
// go to account page
function account_pages() {
    window.location = base_url + 'account';
}
//back if cancel edit account or edit account
function back_to_account() {

    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                window.location.href = base_url + 'account';
            } else {
                window.location.href = logout;
            }
        }
    });

}
function close_add_form() {
    $('#add-general-post').hide(300);
}
// -- end page --//
//-- google maps --//
function general_site_map() {

    $.ajax({
        url: base_url + 'site_location_map/',
        type: "GET",
        dataType: "JSON",
        success: function (data) { //if data success load from database

            if (data.latitude != 0 || data.longitude != 0) {
                var latitude = parseFloat(data.latitude);
                var longitude = parseFloat(data.longitude);

                setTimeout(function () {
                    //-- parameter google maps --//
                    var myLatLng = {
                        lat: latitude,
                        lng: longitude
                    };
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 17,
                        center: myLatLng
                    });
                    var infowindow = new google.maps.InfoWindow({
                        position: myLatLng,
                        content: 'PNJ - site'
                    });
                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: asset_url + '/marker/marker.png'
                    });
                    marker.addListener('click', function () {
                        infowindow.open(map, marker);
                    });
                }, 500);

            } else {

            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa mengambil lokasi...', 'system says,');
        }
    });

}
//-- maps --//
//-- general meta save --//
function save_tag_meta_keyword() {
    $('#c_tag_form').ajaxForm({
        url: url + "meta_tag_keywords_save",
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {

        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data...', 'system says,');
        }
    });
}

function save_logo_website() {
    $('#c_website_logo_form').ajaxForm({
        url: url + "save_logo_website",
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () { },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data...', 'system says,');
        }
    });
}

function save_favicon_website() {
    $('#c_website_favicon_form').ajaxForm({
        url: url + "save_favicon_website",
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () { },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data...', 'system says,');
        }
    });
}
//-- check session --//
function check() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                return true;
            } else {
                window.location.href = logout;
            }
        }
    });
}
// -- reload tables --//
function reload_table() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                table.ajax.reload(null, false);
                //refresh_datatables();
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('success, refreshing tables data...', 'system says,');
            } else {
                window.location.href = logout;
            }
        }
    }); //-- reload datatable ajax --\\
}
//-- function activity photo
function bttn_delete_photo_activity(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini . . .', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
function bttn_editing_photo_activity(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#photo_activity_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#btnSave').html('simpan perubahan'); //change button text
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="title"]').val(data.title);
                        $('[name="alumni_id"]').val(data.alumni_id).trigger('change');
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.picture;
                        if (img != "") {
                            img = image_url + 'image/event/' + data.picture;
                        } else {
                            img = image_url + 'image/event/image404.png';
                        }
                        $('#img-src').attr('src', img);
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah background data'); // Set title to Bootstrap modal title
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data...', 'system says,');
                    }
                });
            } else {
                //-- if session not login back to login
                window.location.href = logout;
            }
        }
    });
}
function bttn_save_photo_activity() {
    var link;
    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    $('#photo_activity_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- function background
function bttn_adding_background() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#background_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data background'); // Set Title to Bootstrap modal title
                $('[name="id"]').val('');
                $('[name="type"]').val('').trigger('change');
                $('#img-src').hide();
                $('#img-label').hide();
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
function bttn_editing_background(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#background_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#btnSave').html('simpan perubahan'); //change button text
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="type"]').val(data.page).trigger('change');
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.image;
                        if (img != "") {
                            img = image_url + 'image/background/' + data.image;
                        } else {
                            img = image_url + 'image/background/image404.png';
                        }
                        $('#img-src').attr('src', img);
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah background data'); // Set title to Bootstrap modal title
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data...', 'system says,');
                    }
                });
            } else {
                //-- if session not login back to login
                window.location.href = logout;
            }
        }
    });
}
function bttn_delete_background(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, gagal menghapus data ini...', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
function bttn_save_background() {
    var link;
    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    $('#background_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                if (data.inputerror == undefined) {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 8000
                    };
                    toastr.error(data.message, 'system says,');
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                    }
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- function facility
function bttn_adding_facilities() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#facility_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data fasilitas'); // Set Title to Bootstrap modal title
                $('[name="id"]').val('');
                $('[name="title"]').val('');
                $('[name="text"]').val('');
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
function bttn_editing_facility(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#facility_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#btnSave').html('simpan perubahan'); //change button text
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="title"]').val(data.title);
                        $('[name="text"]').val(data.text);
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah fasilitas data'); // Set title to Bootstrap modal title
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data...', 'system says,');
                    }
                });
            } else {
                //-- if session not login back to login
                window.location.href = logout;
            }
        }
    });
}
// -- function page content menu adding --//
function bttn_adding_c_menu() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_menu_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data menu'); // Set Title to Bootstrap modal title
                $('[name="id"]').val('');
                $('[name="name"]').val('');
                $('[name="link"]').val('');
                $('[name="level"]').val('').trigger('change');
                $('[name="parent"]').val('').trigger('change');
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
//function page content menu editing
function bttn_editing_menu(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_menu_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#btnSave').html('simpan perubahan'); //change button text
                //ajax load data from json
                $.ajax({
                    url: url + 'edit',
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(id);
                        $('[name="name"]').val(data.name);
                        $('[name="link"]').val(data.link);
                        $('[name="class"]').val(data.class);
                        $('[name="level"]').val(data.level).trigger('change');
                        $('[name="parent"]').val(data.parent_id).trigger('change');
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah menu data'); // Set title to Bootstrap modal title
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data...', 'system says,');
                    }
                });
            } else {
                //-- if session not login back to login
                window.location.href = logout;
            }
        }
    });
}
//-- function page content menu delete --\\
function bttn_delete_menu(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah anda yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete',
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: "JSON",
                        success: function (data) {
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data...', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- function page content save menu --\\
function bttn_save_menu() {
    var link;
    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    $('#c_menu_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + data.inputerror[i] + '"]').next().addClass('has-error').text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- end page content menu --\\
//-- access privilege content --\\
function back_load() {
    window.location = url;
}
//-- go to account page --\\ //--- still unavailable --\\
function bttn_adding_accessprivilege() {
    alert(" you will, move to account administrator  ");
    window.location.href = default_url + 'c_adminuser';
}
//-- list access menu for add , edit , update and delete --\\
function bttn_editing_accessprivilege(id, name) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_accessprivilege_form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                //ajax load data from database --\\
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //-- success load form databases --\\
                        //-- show the checkbox --\\
                        $('#accessprivilege_list_menu').html('');
                        $('#accessprivilege_list_menu').append('<tr><th width=150>access name</th><th width=100> view </th><th width=100> add </th><th width=100> delete </th><th width=100> update </th></tr>');

                        for (var i = 0; i < data.length; i++) {
                            if (data[i].idP == 0) {
                                $('#accessprivilege_list_menu').append('<tr><td width=150><b>' + data[i].name + '</b></td><td width=100></td><td width=100></td><td width=100></td><td width=100></td></tr>');
                            } else {

                                if (data[i].view1 > 0) {

                                    chkView = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_view('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' id='view" + data[i].idP + "' checked><label class='checkbox-muted text-muted' for='view" + data[i].idP + "'>View</label></div>"

                                } else {
                                    chkView = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_view('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' id='view" + data[i].idP + "'><label class='checkbox-muted text-muted' for='view" + data[i].idP + "'>View</label></div>"
                                }

                                if (data[i].add1 > 0) {
                                    chkAdd = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_add('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' id='add" + data[i].idP + "' checked><label class='checkbox-muted text-muted' for='add" + data[i].idP + "'>Add</label></div>"
                                } else {
                                    chkAdd = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_add('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' id='add" + data[i].idP + "'><label class='checkbox-muted text-muted' for='add" + data[i].idP + "'>Add</label></div>"
                                }

                                if (data[i].delete1 > 0) {
                                    chkDel = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_delete('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' id='Delete" + data[i].idP + "' checked><label class='checkbox-muted text-muted' for='Delete" + data[i].idP + "'>Delete</label></div>"
                                } else {
                                    chkDel = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_delete('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' id='Delete" + data[i].idP + "'><label for='Delete" + data[i].idP + "'>Delete</label></div>"
                                }

                                if (data[i].update1 > 0) {
                                    chkUpd = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_update('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' checked id='Update" + data[i].idP + "'><label for='Update" + data[i].idP + "'>Update</label></div>"
                                } else {
                                    chkUpd = "<div class='checkbox-inline checkbox-custom pull-left'><input onclick=update_menu_update('" + data[i].idP + "','" + id + "','" + data[i].id + "'); type='checkbox' id='Update" + data[i].idP + "'><label class='checkbox-muted text-muted' for='Update" + data[i].idP + "'>Update</label></div>"
                                }
                                $('#accessprivilege_list_menu').append('<tr><td width=150 style="font-size:11px;"> &nbsp;&nbsp;&nbsp;' + data[i].name + ' </td><td width=100>' + chkView + '</td><td width=100>' + chkAdd + '</td><td width=100>' + chkDel + '</td><td width=100>' + chkUpd + '</td></tr>');
                            }
                        }
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('access privilege settings');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('failed to changes...', 'system says,');
                    }
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- access privilege view changes --\\
function update_menu_view(menu_id, user_id, parent_id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {

                $.ajax({
                    url: url + 'access-view-privilege',
                    type: "POST",
                    data: 'user_id=' + user_id + '&menu_id=' + menu_id + '&parent_id=' + parent_id,
                    dataType: 'JSON',
                    success: function (data) { },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('failed to changes...', 'system says,');
                    }
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- access privilege add changes --\\
function update_menu_add(menu_id, user_id, parent_id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                $.ajax({
                    url: url + 'access-add-privilege',
                    type: "POST",
                    data: 'user_id=' + user_id + '&menu_id=' + menu_id + '&parent_id=' + parent_id,
                    dataType: 'JSON',
                    success: function (data) { },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('failed to changes...', 'system says,');
                    }
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- access privilege delete changes --\\
function update_menu_delete(menu_id, user_id, parent_id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                $.ajax({
                    url: url + 'access-delete-privilege',
                    type: "POST",
                    data: 'user_id=' + user_id + '&menu_id=' + menu_id + '&parent_id=' + parent_id,
                    dataType: 'JSON',
                    success: function (data) { },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('failed to changes...', 'system says,');
                    }
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- access privilege update changes --\\
function update_menu_update(menu_id, user_id, parent_id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {

                $.ajax({
                    url: url + 'access-update-privilege',
                    type: "POST",
                    data: 'user_id=' + user_id + '&menu_id=' + menu_id + '&parent_id=' + parent_id,
                    dataType: 'JSON',
                    success: function (data) { },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('failed to changes...', 'system says,');
                    }
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- account javascript content --\\
function bttn_save_slider_page() {
    var link;
    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    // tinyMCE.triggerSave();
    $('#c_page_slide_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('proses menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
            $(".progress").length > 0 && $(".progress .progress-bar").progressbar();
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                if (data.inputerror.length) {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                    }
                } else {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 8000
                    };
                    toastr.error(data.message, 'system says,');
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('error, terjadi kesalahan...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
function bttn_editing_page_slide(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_page_slide_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        // $('[name="token"]').val(data.token);
                        $('[name="heading"]').val(data.heading);
                        $('[name="subheading"]').val(data.subheading);
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.header_img;
                        if (img != "") {
                            img = image_url + 'image/header/' + data.header_img;
                        } else {
                            img = image_url + 'image/header/image404.png';
                        }
                        $('#img-src').attr('src', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan , tidak bisa mengambil data ini. . .', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}
//-- function konsentrasi
function bttn_adding_konsentrasi() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#konsentrasi_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.form-control').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data'); // Set Title to Bootstrap modal title
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                konsentrasiEditor.setData('');
            } else {
                window.location.href = logout;
            }
        }
    });
}
function bttn_editing_konsentrasi(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#konsentrasi_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="title"]').val(data.title);
                        $('[name="type"]').val(data.flag).trigger("change");
                        //$('[name="text"]').val(data.description);
                        konsentrasiEditor.
                            setData(data.description);

                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data'); // set title to bootstrap modal title
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan , tidak bisa mengambil data ini. . .', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_delete_konsentrasi(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, gagal menghapus data ini...', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_konsentrasi() {
    var link;
    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    tinyMCE.triggerSave();
    $('#konsentrasi_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('proses menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
            $(".progress").length > 0 && $(".progress .progress-bar").progressbar();
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('error, terjadi kesalahan...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}

//-- function direksi --//
function bttn_adding_direksi() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_direksi_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.form-control').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data'); // Set Title to Bootstrap modal title
                $('#img-src').hide();
                $('#img-label').hide();
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_direksi(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_direksi_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="name"]').val(data.name);
                        $('[name="position"]').val(data.position).trigger("change");
                        $('[name="description"]').val(data.description);
                        $('[name="url"]').val(data.url);
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.picture;
                        if (img != "") {
                            img = image_url + 'image/profile/' + data.picture;
                        } else {
                            img = image_url + 'image/profile/image404.png';
                        }
                        $('#img-src').attr('src', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan , tidak bisa mengambil data ini. . .', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_delete_direksi(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, gagal menghapus data ini...', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_direksi() {
    var link;
    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    // tinyMCE.triggerSave();
    $('#c_direksi_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('proses menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        xhr: function () {
            $(".progress").length > 0 &&
							$(".progress .progress-bar").progressbar();
            var xhr = new window.XMLHttpRequest();
            //Upload Progress
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = (evt.loaded / evt.total) * 100; $('div.progress > div.progress-bar').css({ "width": percentComplete + "%" });
                }
            }, false);

            //download progress
            xhr.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = (evt.loaded / evt.total) * 100;
                    $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" });
                }
            },false);
            return xhr;
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('error, terjadi kesalahan...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- posting function --//
function bttn_adding_article() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_posting_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.form-control').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.tags-input').tagsInput({
                    width: 'auto',
                    maxChars: 0,
                    defaultText: 'enter keyword'
                });
                $('#add-general-post').show(300);
                $('#type-select').select2();
                $('[name="id"]').val('');
                $('[name="meta_tag_keywords"]').importTags('');
                $('#img-src').hide();
                $('#img-label').hide();
                $('#btnSave').html('simpan perubahan'); //change button text
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_readmore_posting(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                window.location.href = url + 'readmore/' + id;
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_posting(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_posting_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                //ajax load data from json
                $.ajax({
                    url: url + 'edit',
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('.tags-input').tagsInput({
                            width: 'auto',
                            maxChars: 0,
                            defaultText: 'masukkan kata kunci'
                        });

                        $('#type-select').select2();
                        $('[name="id"]').val(id);
                        $('[name="title"]').val(data.title);
                        $('[name="type"]').val(data.type).trigger("change");
                        $('[name="meta_tag_title"]').val(data.meta_tag_title);
                        $('[name="meta_tag_keywords"]').importTags(data.meta_tag_keywords);
                        // tinyMCE.get('content-posting').setContent(data.text);
                        $('[name="meta_tag_description"]').val(data.meta_tag_description);
                        // $('#modalform').modal({
                        //     backdrop: 'static',
                        //     keyboard: false
                        // });
                        // $('.modal-title').text('mengubah data'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.img;
                        if (img != "") {
                            img = image_url + 'image/posting/' + data.img;
                        } else {
                            img = image_url + 'image/posting/image404.png';
                        }
                        $('#img-src').attr('src', img);
                        $('#add-general-post').show(300);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan , tidak bisa mengambil data ini. . .', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_c_posting() {
    var link;
    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    // tinyMCE.triggerSave();
    $('#c_posting_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('proses menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                // $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                if (data.inputerror == undefined) {
                    toastr.options = {
                        closeButton: true,
                        progressBar: false,
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                    };
                    toastr.error(data.message, 'system says,');
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                    }
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('error, terjadi kesalahan...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- function page content posting delete --\\
function bttn_delete_posting(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, gagal menghapus data ini...', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- end function posting --//
//-- function video page javascript --//
function bttn_remove_video_field(id) {
    var scntDiv = $('#video-form');

    var i = id;
    $('#video-form #field_' + id + '').remove();
    i--;

    return false;
}

function bttn_adding_video_field() {

    var scntDiv = $('#video-form');

    var i = 1 + $('#video-form .toclone').size();

    $('<div id="field_' + i + '" class="toclone"><div class="form-group"><label class="control-label col-md-3">judul *</label><div class="col-md-9"><input class="form-control" placeholder="judul" name="text[' + i + ']" value=""/><span id="text_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="control-label col-md-3">link url **</label><div class="col-md-9"><input id="content_url" placeholder="contoh : https://www.youtube.com/watch?v=WeCghp05vIc" name="embed_url[' + i + ']" class="form-control"/><span id="embed_url_' + i + '" class="help-block"></span></div></div><div class="form-group"><label for="fileInputHor_' + i + '" class="col-sm-3 control-label">berkas gambar</label><div class="col-sm-9"><input id="fileInputHor_' + i + '" name="file_image[' + i + ']" type="file" class="dropify"><span id="file_image' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="col-sm-3 control-label"></label><div class="col-sm-9"><button type="button" onclick="bttn_adding_video_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button>&nbsp;<button type="button" onclick="bttn_remove_video_field(' + i + ')" class="btn btn-outline btn-danger"><i class="ti-minus"></i> kurangi field</button></div></div></div>').appendTo(scntDiv);

    $('#fileInputHor_' + i + '').dropify({ // default file for the file input
        defaultFile: "",
        // max file size allowed
        maxFileSize: 0,
        // custom messages
        messages: {
            'default': 'tarik dan jatuh berkas gambar anda disini',
            'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
            'remove': 'hapus',
            'error': 'oops, terjadi kesalahan.'
        },
        // custom template
        tpl: {
            wrap: '<div class="dropify-wrapper"></div>',
            message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
            error: '<p class="dropify-error">{{ error }}</p>'
        }
    });

    i++;
    return false;

}

function bttn_adding_c_video() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_video_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data video'); // Set Title to Bootstrap modal title
                $('[name="id"]').val('');
                $('[name="embed_url[0]"]').val('');
                $('[name="text[0]"]').val('');
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#fileInputHor').dropify({ // default file for the file input
                    defaultFile: "",
                    // max file size allowed
                    maxFileSize: 0,
                    // custom messages
                    messages: {
                        'default': 'tarik dan jatuh berkas gambar anda disini',
                        'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                        'remove': 'hapus',
                        'error': 'oops, terjadi kesalahan.'
                    },
                    // custom template
                    tpl: {
                        wrap: '<div class="dropify-wrapper"></div>',
                        message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                        preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                        filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                        clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                        error: '<p class="dropify-error">{{ error }}</p>'
                    }
                });
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_video(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_video_form_edit')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.form-control').removeClass('has-error'); // clear error class
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.video_id);
                        $('[name="text_edit"]').val(data.text);
                        $('[name="embed_url_edit"]').val(data.embed_url);
                        $('#modalform-edit').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        // $('#modalform-edit').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('mengubah data video'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.thumbnail;
                        if (img != "") {
                            img = image_url + 'image/video/' + data.thumbnail;
                        } else {
                            img = image_url + 'image/video/image404.png';
                        }
                        $('#img-src').attr('src', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_readmore_video(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                window.location.href = url + 'readmore/' + id;
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_c_video() {
    $('#c_video_form').ajaxForm({
        url: url + 'add',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                //location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data', 'system says,');
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}

function bttn_save_c_video_edit() {
    $('#c_video_form_edit').ajaxForm({
        url: url + 'update',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform-edit').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, merubah data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa merubah data...', 'system says,');
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- function page content delete --\\

function bttn_delete_video(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini . . .', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- end function --//
//-- function angkatan --//
function bttn_remove_angkatan_field(id) {
    var scntDiv = $('#angkatan-form');

    var i = id;

    $('#angkatan-form #field_' + id + '').remove();

    i--;

    return false;
}

function bttn_adding_angkatan_field() {

    var scntDiv = $('#angkatan-form');

    var i = 1 + $('#angkatan-form .toclone').size();

    $('<div id="field_' + i + '" class="toclone"><div class="form-group"><label class="control-label col-md-3">nama depan alumni *</label><div class="col-md-9"><input class="form-control" placeholder="nama depan alumni" name="firstname[' + i + ']" value=""/><span id="firstname_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="control-label col-md-3">nama belakang alumni *</label><div class="col-md-9"><input class="form-control" placeholder="nama belakang alumni" name="lastname[' + i + ']" value=""/><span id="lastname_' + i + '" class="help-block"></span></div></div><div class="form-group"> <label class="control-label col-md-3">grup angkatan **</label><div class="col-md-9"> <select name="group[' + i + ']" class="form-control"><option value="">-- pilih grup angkatan --</option><option value="seni">seni</option><option value="art">art</option><option value="desain">desain</option> </select> <span id="group_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="control-label col-md-3">email**</label><div class="col-md-9"><input placeholder="contoh : mnwnbk@gmail.com" name="email[' + i + ']" class="form-control"/><span id="email_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="control-label col-md-3">website</label><div class="col-md-9"><input placeholder="contoh : https://www.instgram.com/nama alumni" name="website[' + i + ']" class="form-control"/><span id="wesbsite_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="control-label col-md-3">no telp/handphone</label><div class="col-md-9"><input placeholder="contoh : +6287778784550" name="phone[' + i + ']" class="form-control"/><span id="phone_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="control-label col-md-3">angkatan ke **</label><div class="col-md-9"><select name="angkatan[' + i + ']" class="form-control"><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option></select><span id="angkatan_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="control-label col-md-3">biography **</label><div class="col-md-9"><textarea placeholder="deskripsi alumni" name="biography[' + i + ']" class="form-control"></textarea><span id="biography_' + i + '" class="help-block"></span></div></div><div class="form-group"><label for="fileInputHor" class="col-sm-3 control-label">berkas gambar **</label><div class="col-sm-9"><input id="fileInputHor_' + i + '" name="file_image[' + i + ']" type="file" class="dropify"><span id="file_image_' + i + '" class="help-block"></span></div></div><div class="form-group"><label class="col-sm-3 control-label"></label><div class="col-sm-9"><p>*<i style="color:red;">harus diisi</i>/**<i style="color:red;">sangat di anjurkan diisi</i></p><button type="button" onclick="bttn_adding_angkatan_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button>&nbsp;<button type="button" onclick="bttn_remove_angkatan_field(' + i + ')" class="btn btn-outline btn-danger"><i class="ti-minus"></i> kurangi field</button></div></div></div>').appendTo(scntDiv);

    $('#fileInputHor_' + i + '').dropify({ // default file for the file input
        defaultFile: "",
        // max file size allowed
        maxFileSize: 0,
        // custom messages
        messages: {
            'default': 'untuk hasil terbaik gambar berukuran 320 x 480 pixel',
            'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
            'remove': 'hapus',
            'error': 'oops, terjadi kesalahan.'
        },
        // custom template
        tpl: {
            wrap: '<div id="file_' + i + '" class="dropify-wrapper"></div>',
            message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
            error: '<p class="dropify-error">{{ error }}</p>'
        }
    });

    i++;
    return false;

}



function bttn_adding_c_angkatan() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_angkatan_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.dropify-wrapper').removeClass('has-error');
                $('.dropify-error').text('');
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data alumni'); // Set Title to Bootstrap modal title
                $('[name="website[0]"]').val('');
                $('[name="firstname[0]"]').val('');
                $('[name="lastname[0]"]').val('');
                $('[name="email[0]"]').val('');
                $('[name="phone[0]"]').val('');
                $('[name="biography[0]"]').val('');
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#fileInputHor').dropify({ // default file for the file input
                    defaultFile: "",
                    // max file size allowed
                    maxFileSize: 0,
                    // custom messages
                    messages: {
                        'default': 'untuk hasil terbaik gambar berukuran 320 x 480 pixel',
                        'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                        'remove': 'hapus',
                        'error': 'oops, terjadi kesalahan.'
                    },
                    // custom template
                    tpl: {
                        wrap: '<div id="file_0" class="dropify-wrapper"></div>',
                        message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                        preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                        filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                        clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                        error: '<p class="dropify-error">{{ error }}</p>'
                    }
                });
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_angkatan(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_angkatan_form_edit')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.form-control').removeClass('has-error'); // clear error class
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="firstname"]').val(data.firstname);
                        $('[name="lastname"]').val(data.lastname);
                        $('[name="email"]').val(data.email);
                        $('[name="phone"]').val(data.phone_number);
                        $('[name="website"]').val(data.website);
                        $('[name="group"]').val(data.group).trigger('change');
                        $('[name="angkatan"]').val(data.angkatan).trigger('change');
                        $('[name="biography"]').val(data.biography);
                        $('#modalform-edit').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data alumni'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.img;
                        if (img != null) {
                            img = image_url + 'image/alumni/' + data.img;
                        } else {
                            img = image_url + 'image/alumni/image404.png';
                        }
                        $('#img-src').attr('src', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_readmore_angkatan(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                window.location.href = url + 'readmore/' + id;
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_c_angkatan() {
    $('#c_angkatan_form').ajaxForm({
        url: url + 'add',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('#' + data.file_id[i] + '').addClass('has-error');
                    $('.dropify-error').text(data.error_file[i]);
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}

function bttn_save_c_angkatan_edit() {
    $('#c_angkatan_form_edit').ajaxForm({
        url: url + 'update',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform-edit').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa mengubah data...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- function page content delete --\\

function bttn_delete_angkatan(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini...', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- end function --//
//-- function photo --//
function bttn_remove_photo_field(id) {
    var scntDiv = $('#photo-form');

    var i = id;

    $('#photo-form #field_' + id + '').remove();

    i--;

    return false;
}

function bttn_adding_photo_field() {

    var scntDiv = $('#photo-form');

    var i = 1 + $('#photo-form .toclone').size();

    $('<div id="field_' + i + '" class="toclone"><div class="form-group"> <label class="control-label col-md-3">judul **</label> <div class="col-md-9"> <input class="form-control" placeholder="judul" name="title[' + i + ']" value=""/> <span id="title_' + i + '" class="help-block"></span> </div></div><div class="form-group"><label class="control-label col-md-3">pilih mahasiswa</label><div class="col-md-9"><select class="form-control" id="type-select" style="width:100%;" name="student[0]"><option value="">-- pilih nama siswa --</option></select><span id="type" class="help-block"></span></div></div><div class="form-group"> <label class="control-label col-md-3">deskripsi</label> <div class="col-md-9"> <textarea name="text[' + i + ']" placeholder="deksripsi foto" class="form-control"></textarea> <span id="text_' + i + '" class="help-block"></span> </div></div><div class="form-group"> <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label> <div class="col-sm-9"> <input id="fileInputHor_' + i + '" name="file_image[' + i + ']" type="file" class="dropify"> <span id="file_image_' + i + '" class="help-block"></span> </div></div><div class="form-group"> <label class="col-sm-3 control-label"></label> <div class="col-sm-9"> <p>* <i style="color:red;">harus diisi</i> / ** <i style="color:red;">sangat di anjurkan diisi</i></p><button type="button" onclick="bttn_adding_photo_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button> <button type="button" onclick="bttn_remove_photo_field(' + i + ')" class="btn btn-outline btn-danger"><i class="ti-minus"></i> kurangi field</button></div></div></div>').appendTo(scntDiv);

    $('#fileInputHor_' + i + '').dropify({ // default file for the file input
        defaultFile: "",
        // max file size allowed
        maxFileSize: 0,
        // custom messages
        messages: {
            'default': 'tarik dan jatuh berkas gambar anda disini',
            'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
            'remove': 'hapus',
            'error': 'oops, terjadi kesalahan.'
        },
        // custom template
        tpl: {
            wrap: '<div id="file_' + i + '" class="dropify-wrapper"></div>',
            message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
            error: '<p class="dropify-error">{{ error }}</p>'
        }
    });

    i++;
    return false;

}

function bttn_adding_photo() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_photo_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data foto'); // Set Title to Bootstrap modal title
                $('[name="id"]').val('');
                $('[name="title[0]"]').val('');
                $('[name="text[0]"]').val('');
                $('[name="position[0]"]').val('');
                $('.dropify-wrapper').removeClass('has-error');
                $('#btnSave').html('simpan perubahan'); //change button text

                $('[name="type_photo[0]"]') // select the radio by its id
                    .change(function () { // bind a function to the change event
                        if ($(this).is(":checked")) { // check if the radio is checked
                            var val = $(this).val(); // retrieve the value
                            if (val == "activities") {

                                $('#alumni-id').html('<label class="control-label col-md-3">pilih mahasiswa</label> <div class="col-md-9"> <select class="form-control" id="type-select" style="width:100%;" name="student[0]"> </select> <span id="type" class="help-block"></span></div>');
                                $('#alumni-id').show(300);

                                $('[name="student[0]"]').val('').trigger('change');

                                $('[name="student[0]"]').select2({
                                    ajax: {
                                        url: url + 'alumni_id',
                                        dataType: 'json',
                                        data: function (params) {
                                            return {
                                                q: params.term // search term
                                            };
                                        },
                                        processResults: function (data) {
                                            var newData = [];
                                            for (var i = 0; i < data.length; i++) {
                                                newData.push({
                                                    id: data[i].id, //id part present in data
                                                    text: data[i].name //string to be displayed
                                                });
                                                return {
                                                    results: newData
                                                };
                                            }
                                        },
                                        cache: true,
                                    },
                                    dropdownParent: $("#modalform"),
                                    placeholder: '-- masukkan nama alumni --',
                                    minimumInputLength: 1,

                                });
                            } else {
                                $('#alumni-id').html('');
                                $('#alumni-id').hide(100);
                            }

                        }
                    });


                $('#fileInputHor').dropify({ // default file for the file input
                    defaultFile: "",
                    // max file size allowed
                    maxFileSize: 0,
                    // custom messages
                    messages: {
                        'default': 'tarik dan jatuh berkas gambar anda disini',
                        'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                        'remove': 'hapus',
                        'error': 'oops, terjadi kesalahan.'
                    },
                    // custom template
                    tpl: {
                        wrap: '<div id="file_0" class="dropify-wrapper"></div>',
                        message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                        preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                        filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                        clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                        error: '<p class="dropify-error">{{ error }}</p>'
                    }
                });
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_photo(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_photo_form_edit')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.form-control').removeClass('has-error'); // clear error class
                //ajax load data from json
                $.ajax({
                    url: url + 'edit',
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(id);
                        $('[name="title_edit"]').val(data.title);
                        $('[name="text_edit"]').val(data.text);
                        $('[name="position_edit"]').val(data.position).trigger('changes');
                        $('#modalform-edit').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data foto'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.image;
                        if (img != null) {
                            img = image_url + 'image/event/' + data.image;
                        } else {
                            img = image_url + 'image/event/image404.png';
                        }
                        $('#img-src').attr('src', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_c_photo() {
    $('#c_photo_form').ajaxForm({
        url: url + 'add',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                reload_table();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('#' + data.file_id[i] + '').addClass('has-error');
                    $('.dropify-error').text(data.error_file[i]);
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data', 'system says,');
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}

function bttn_save_c_photo_edit() {
    $('#c_photo_form_edit').ajaxForm({
        url: url + 'update',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform-edit').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, merubah data', 'system says,');
                reload_table();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('.dropify-wrapper').addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
                reload_table();
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa merubah data...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- function page content delete --\\
function bttn_delete_photo(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini . . .', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- end function --//
//-- adding function slider header --//
function bttn_remove_header_field(id) {
    var scntDiv = $('#header-form');

    var i = id;

    $('#header-form #field_' + id + '').remove();

    i--;

    return false;
}

function bttn_adding_header_field() {

    var scntDiv = $('#header-form');

    var i = 1 + $('#header-form .toclone').size();

    $('<div id="field_' + i + '" class="toclone"><div class="form-group"> <label class="control-label col-md-3">heading **</label> <div class="col-md-9"> <input class="form-control" placeholder="heading teks" name="heading[' + i + ']" value=""/> <span id="heading_' + i + '" class="help-block"></span> </div></div><div class="form-group"> <label class="control-label col-md-3">subheading **</label> <div class="col-md-9"> <input class="form-control" placeholder="heading teks" name="subheading[' + i + ']" value=""/> <span id="subheading_' + i + '" class="help-block"></span> </div></div><div class="form-group"> <label class="control-label col-md-3">deskripsi</label> <div class="col-md-9"> <textarea name="text[' + i + ']" placeholder="deksripsi heading teks" class="form-control"></textarea> <span id="text_' + i + '" class="help-block"></span> </div></div><div class="form-group"> <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label> <div class="col-sm-9"> <input id="fileInputHor_' + i + '" name="file_image[' + i + ']" type="file" class="dropify"> <span id="file_image_' + i + '" class="help-block"></span> </div></div><div class="form-group"> <label class="col-sm-3 control-label"></label> <div class="col-sm-9"> <p>* <i style="color:red;">harus diisi</i> / ** <i style="color:red;">sangat di anjurkan diisi</i></p><button type="button" onclick="bttn_adding_header_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button> <button type="button" onclick="bttn_remove_header_field(' + i + ')" class="btn btn-outline btn-danger"><i class="ti-minus"></i> kurangi field</button></div></div></div>').appendTo(scntDiv);

    $('#fileInputHor_' + i + '').dropify({ // default file for the file input
        defaultFile: "",
        // max file size allowed
        maxFileSize: 0,
        // custom messages
        messages: {
            'default': 'upload ukuran gambar hasil terbaik 1920 x 1080',
            'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
            'remove': 'hapus',
            'error': 'oops, terjadi kesalahan.'
        },
        // custom template
        tpl: {
            wrap: '<div id="file_' + i + '" class="dropify-wrapper"></div>',
            message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
            error: '<p class="dropify-error">{{ error }}</p>'
        }
    });

    i++;
    return false;

}

function bttn_adding_c_slideheader() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_header_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data slide gambar header h.utama'); // Set Title to Bootstrap modal title
                $('[name="heading[0]"]').val('');
                $('[name="subheading[0]"]').val('');
                $('[name="text[0]"]').val('');
                $('.dropify-wrapper').removeClass('has-error');

                $('#btnSave').html('simpan perubahan'); //change button text
                $('#fileInputHor').dropify({ // default file for the file input
                    defaultFile: "",
                    // max file size allowed
                    maxFileSize: 0,
                    // custom messages
                    messages: {
                        'default': 'upload ukuran gambar hasil terbaik 1920 x 1080',
                        'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                        'remove': 'hapus',
                        'error': 'oops, terjadi kesalahan.'
                    },
                    // custom template
                    tpl: {
                        wrap: '<div id="file_0" class="dropify-wrapper"></div>',
                        message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                        preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                        filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                        clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                        error: '<p class="dropify-error">{{ error }}</p>'
                    }
                });
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_header(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_header_form_edit')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.form-control').removeClass('has-error'); // clear error class
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="heading"]').val(data.heading);
                        $('[name="subheading"]').val(data.subheading);
                        $('[name="text"]').val(data.text);
                        $('#modalform-edit').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data foto'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.header_img;
                        if (img != null) {
                            img = image_url + 'image/header/' + data.header_img;
                        } else {
                            img = image_url + 'image/header/image404.png';
                        }
                        $('#img-src').attr('src', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_c_header() {
    $('#c_header_form').ajaxForm({
        url: url + 'add',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('#' + data.file_id[i] + '').addClass('has-error');
                    $('.dropify-error').text(data.error_file[i]);
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data', 'system says,');
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}

function bttn_save_c_header_edit() {
    $('#c_header_form_edit').ajaxForm({
        url: url + 'update',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform-edit').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, merubah data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('.dropify-wrapper').addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa merubah data...', 'system says,');
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- function page content delete --\\
function bttn_delete_header(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload(true);
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini . . .', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- function delete --//
function button_submit_delete() {
    $('#submit_delete_bttn').click();
}

function submit_delete_foreach() {
    $('#delete_message_form').ajaxForm({
        url: url + 'delete_checkbox',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () { },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menghapus data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    alert(data.error_string[i]);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menghapus data...', 'system says,');
        }
    });
}

function bttn_delete_message(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus pesan ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 2000
                            };
                            toastr.options.onHidden = function () {
                                location.reload();
                            };
                            toastr.success('berhasil, menghapus pesan', 'system says,');
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 2000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini . . .', 'system says,');
                            toastr.options.onHidden = function () {
                                location.reload();
                            };
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_detail_message(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin membuka pesan ini ?')) {
                    // ajax delete data to database
                    window.location.href = url + 'detail/' + id;
                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- function page content delete --\\
function bttn_delete_slider_page(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.success('berhasil, menghapus data', 'system says,');
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini . . .', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}
//-- function advertise page --//
function bttn_adding_c_advertise() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_advertise_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.dropify-wrapper').removeClass('has-error');
                $('.dropify-error').text('');
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data iklan'); // Set Title to Bootstrap modal title
                $('[name="title"]').val('');
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#fileInputHor').dropify({ // default file for the file input
                    defaultFile: "",
                    // max file size allowed
                    maxFileSize: 0,
                    // custom messages
                    messages: {
                        'default': 'hasil terbaik ukuran 240 x 80',
                        'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                        'remove': 'hapus',
                        'error': 'oops, terjadi kesalahan.'
                    },
                    // custom template
                    tpl: {
                        wrap: '<div id="file" class="dropify-wrapper"></div>',
                        message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                        preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                        filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                        clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                        error: '<p class="dropify-error">{{ error }}</p>'
                    }
                });
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_advertise(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_advertise_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.form-control').removeClass('has-error'); // clear error class
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.advertise_id);
                        $('[name="title"]').val(data.title);
                        $('.modal-title').text('mengubah data iklan'); // set title to bootstrap modal title
                        var img = data.adv_img;
                        if (img == "") {
                            img = image_url + 'image/advertise/image404.png';
                        } else {
                            img = image_url + 'image/advertise/' + data.adv_img;
                        }
                        $('#fileInputHor').dropify({ // default file for the file input
                            defaultFile: img,
                            // max file size allowed
                            maxFileSize: 0,
                            // custom messages
                            messages: {
                                'default': 'hasil terbaik ukuran 240 x 80',
                                'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                                'remove': 'hapus',
                                'error': 'oops, terjadi kesalahan.'
                            },
                            // custom template
                            tpl: {
                                wrap: '<div id="file" class="dropify-wrapper"></div>',
                                message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                                preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                                filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                                clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                                error: '<p class="dropify-error">{{ error }}</p>'
                            }
                        });
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_delete_advertise(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                if (confirm('Apakah kamu yakin ingin menghapus data ini ?')) {
                    // ajax delete data to database
                    $.ajax({
                        url: url + 'delete/' + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // if failed delete this data
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'fadeIn',
                                hideMethod: 'fadeOut',
                                timeOut: 8000
                            };
                            toastr.error('terjadi kesalahan, tidak bisa menghapus data ini...', 'system says,');
                        }
                    });

                }
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_c_advertise() {

    var link;

    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }

    $('#c_advertise_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('#' + data.file_id[i] + '').addClass('has-error');
                    $('.dropify-error').text(data.error_file[i]);
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.error_id[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data', 'system says,');
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}

function bttn_adding_profilesite() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_profilewebsiteForm')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('#type-select').select2();
                $('.modal-title').text('menambah data profile website'); // Set Title to Bootstrap modal title
                $('[name="type"]').val('').trigger("change");
                //tinyMCE.get('content_profilewebsite').setContent('');
                $('#img-src').hide();
                $('#img-label').hide();
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                profilesiteEditor.setData('');
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_profilesite(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_profilewebsiteForm')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.form-control').removeClass('has-error'); // clear error class
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('#type-select').select2();
                        $('[name="id"]').val(data.id);
                        $('[name="type"]').val(data.flag).trigger("change");
                        profilesiteEditor.setData(data.description);
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data profile website'); // set title to bootstrap modal title
                        $('#img-src').show();
                        $('#img-label').show();
                        var img = data.picture;
                        if (img != null) {
                            img = image_url + 'image/profile/' + data.picture;
                        } else {
                            img = image_url + 'image/profile/image404.png';
                        }
                        $('#img-src').attr('src', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function bttn_save_c_profilewebsite() {

    var link;

    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    tinyMCE.triggerSave();
    $('#c_profilewebsiteForm').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data', 'system says,');
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
//-- group alumni --//
function bttn_adding_alumni() {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) { // if data true show modals
                save_method = 'add';
                $('#c_group_alumni_form')[0].reset(); // reset form on modals
                $('.form-control').removeClass('has-error'); // clear error class
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').removeClass('has-error'); // clear error class
                $('.dropify-wrapper').removeClass('has-error');
                $('.dropify-error').text('');
                $('.help-block').empty(); // clear error string
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.modal-title').text('menambah data group alumni'); // Set Title to Bootstrap modal title
                $('[name="title"]').val('');
                $('#btnSave').html('simpan perubahan'); //change button text
                $('#modalform').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                window.location.href = logout;
            }
        }
    });
}

function bttn_editing_group(id) {
    $.ajax({
        url: base_url + 'checksession',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data.session == true) {
                save_method = 'update';
                $('#c_group_alumni_form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.col-md-9').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.form-control').removeClass('has-error'); // clear error class
                //ajax load data from json
                $.ajax({
                    url: url + 'edit/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) { //if data success load from database
                        $('[name="id"]').val(data.id);
                        $('[name="name"]').val(data.name);
                        $('#modalform').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('.modal-title').text('mengubah data group alumni'); // set title to bootstrap modal title
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                            timeOut: 8000
                        };
                        toastr.error('terjadi kesalahan, tidak bisa mengambil data', 'system says,');
                    }
                });
            } else {
                //if session not login back to login
                window.location.href = logout;
            }
        }
    });
}

function replyThis(id) {
    $('#messageForm').ajaxForm({
        url: url + 'replyTo',
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btn-send').text('menyimpan...'); //change button text
            $('#btn-send').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success(data.message, 'system says,');
            } else {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.error(data.message, 'system says,');
            }
            $('#btn-send').html('simpan perubahan'); //change button text
            $('#btn-send').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('Terjadi kesalahan, tidak bisa mengirim data', 'system says,');
            $('#btn-send').html('save changes'); //change button text
            $('#btn-send').attr('disabled', false); //set button enable
        }
    });
}

function bttn_save_group() {

    var link;

    if (save_method == 'add') {
        link = url + 'add';
    } else {
        link = url + 'update';
    }
    $('#c_group_alumni_form').ajaxForm({
        url: link,
        dataType: 'json',
        beforeSerialize: function () { },
        beforeSubmit: function () {
            $('#btnSave').text('menyimpan...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
        },
        success: function (data) {
            if (data.status) //if success close modal and reload ajax table
            {
                $('#modalform').modal('hide'); // show bootstrap modal when complete loader
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 8000
                };
                toastr.success('berhasil, menyimpan data', 'system says,');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('#' + data.inputerror[i] + '').text(data.error_string[i]);
                }
            }
            $('#btnSave').html('simpan perubahan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 8000
            };
            toastr.error('terjadi kesalahan, tidak bisa menyimpan data', 'system says,');
            $('#btnSave').html('save changes'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
