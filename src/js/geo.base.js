
var geoJs = new function() {
    this.loadedJs = new Array();
    this.loadedCss = new Array();
    this.loadSelect = function(selectedvalue, loadon) {

        $.ajax({
            url: "",
            processData: false,
            data: xmlDocument,
            success: function() {

            }
        });
    };
    this.loadJs = function(plugin, basepath) {
        if (typeof basepath == "undefined") {
            var basepath = "";
        }
        /*TODO Please fix ontime load actions*/
        if (plugin in this.loadedJs == false) {
            $.getScript(AppJsURL + basepath + plugin + '.js', function(data, textStatus) {

            });
        }

    };
    this.loadCss = function(cssfile, basepath) {
        if (typeof basepath == "undefined") {
            var basepath = "";
        }
        if (this.loadedCss[cssfile] == "") {
            $.getScript(AppCssURL + basepath + cssfile + '.css', function(data, textStatus) {
                this.loadedCss[cssfile] = textStatus;

            });

        }

    };
    this.saveCameraImage = function(table, column, file) {

        var pos = 0, ctx = null, image = [];

        var canvas = document.createElement("canvas");
        canvas.setAttribute('width', 320);
        canvas.setAttribute('height', 240);

        if (canvas.toDataURL) {


            ctx = canvas.getContext("2d");

            image = ctx.getImageData(0, 0, 320, 240);

            var col = data.split(";");
            var img = image;


            for (var i = 0; i < 320; i++) {
                var tmp = parseInt(col[i]);
                img.data[pos + 0] = (tmp >> 16) & 0xff;
                img.data[pos + 1] = (tmp >> 8) & 0xff;
                img.data[pos + 2] = tmp & 0xff;
                img.data[pos + 3] = 0xff;
                pos += 4;
            }

            if (pos >= 4 * 320 * 240) {
                ctx.putImageData(img, 0, 0);
                $.post(AppURL + "index.php?file=uploadcameraimage&table=" + table + "&column=" + column, {
                    type: "data",
                    image: canvas.toDataURL("image/png")
                });
                pos = 0;
            }


        } else {


            image.push(data);

            pos += 4 * 320;

            if (pos >= 4 * 320 * 240) {
                $.post(AppURL + "index.php?file=uploadcameraimage&table=" + table + "&column=" + column, {
                    type: "pixel",
                    image: image.join('|')
                });
                pos = 0;
            }

        }

    };

    this.setSelectOptions = function(selectbox, optionsArray, reset, selected, noselect) {
        var options = '';

        if (reset === true) {
            $(selectbox).html("");
            if (noselect == true)
                options += '<option value="">--Select--</option>';
        }
        optionsArray = jQuery.parseJSON(optionsArray);
        var datakey = Object.keys(optionsArray[0])[0];
        var datavalue = Object.keys(optionsArray[0])[1];
        $.each(optionsArray, function(key, value) {
            value[datavalue] = value[datavalue] ? value[datavalue] : value[datakey]
            options += '<option value="' + value[datakey] + '" >' + value[datavalue ] + '</option>';
        });

        $(selectbox).append(options);
        $(selectbox).val(selected);
    };


    this.loaddependentValues = function(parent, child, query) {
        var id = $(parent).val();
        var child = '#' + child;
        $.ajax({
            url: AppURL + 'index.php?file=dependencyselect&dataType=ajax',
            data: 'q=' + query + '&id=' + id,
            success: function(data) {
                if ($(child).is('input')) {


                    var optionsArray = jQuery.parseJSON(data);
                    $(child).val(optionsArray[0]['value']);
                } else {

                    geoJs.setSelectOptions(child, data, true);
                }


            }
        });
    };
    this.checkUniqueData = function(table, column) {
        var current_value = $('#' + column).val();

        $.ajax({
            url: AppURL + 'index.php?file=dependencyselect&dataType=ajax',
            data: 'unique=' + column + '&table=' + table + '&current_value=' + current_value,
            success: function(data) {
                var data1 = jQuery.parseJSON(data);

                if (data1[0] == 'null') {
                    $('#' + column + '_error').html('');


                } else {
                    $('#' + column + '_error').html('Record already exists !!!');

                }
                //                geoJs.setSelectOptions('#'+child,data);
            }
        });
    };

    this.makeInsertRowTable = function(config) {

        config.defaultRows = (typeof config.defaultRows != 'undefined') ? config.defaultRows : 1;
        config.skiprows = (typeof config.skiprows != 'undefined') ? config.skiprows : 0;
        var count = 1;
        $('#' + config.tableid + ' tr:not(:first)').each(function() {
            console.log(config.skiprows);
            html = '';
            if (count > config.skiprows) {
                html = '<input type=submit class="addrow" value="Add"/><input class="deleterow" type=submit value="Delete"/>';
            }
            $(this).append('<td>' + html + '</td>');
            count++;
        });

        $(".addrow").live('click', function() {
            var row = $(this).closest('tr').clone();
            $(this).parent().parent().after(row);
        });

        $(".deleterow").live('click', function() {
            $(this).closest('tr').remove();
        });

    };

    this.getQueryStringVal = function(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(window.location.search);
        if (results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    };

}
$(function() {
    $('.loadparent').live('click', function() {
        var parent_name = $(this).attr('parent');
        var parent_control = $(this).attr('parent_control_id');
        var dialog_title = $(this).attr('title');
        var parent_column = $(this).attr('columns');
        var dialogobj = $("#" + parent_name + '_add');
        $.ajax({
            url: AppURL + 'index.php?file=' + parent_name + '&action=add&dataType=ajax',
            success: function(data) {

                $('body').append('<div id="' + parent_name + '_add" >' + data + '</div>');
                $("#" + parent_name + '_add').dialog(
                        {
                            resizable: false,
                            modal: true,
                            buttons: {
                                Submit: function() {
                                    var postdata = $('#' + parent_name + '_form').serializeArray();
                                    $.ajax({
                                        url: AppURL + 'index.php?file=' + parent_name + '&action=add&dataType=ajax&columns=id,' + parent_column,
                                        type: 'POST',
                                        data: postdata,
                                        success: function(data) {


                                            var datajson = '';
                                            var selected = '';
                                            $.each(jQuery.parseJSON(data), function(key, value) {
                                                datajson = '{"0":{"id":"' + key + '","value":"' + value + '"}}';
                                                selected = key;
                                            });

                                            geoJs.setSelectOptions('#' + parent_control, datajson, false, selected);
                                            $("#" + parent_name + '_add').dialog("close");
                                        }
                                    }
                                    );

                                },
                                Cancel: function() {
                                    $(this).dialog("close");
                                }
                            }

                        }
                );
            }
        });



    });


    $('.loadtakephoto').live('click', function() {
        var table = $(this).attr('table');
        var column = $(this).attr('column');
        $.getScript(AppJsURL + 'cam/jquery.webcam.js', function(data, textStatus, jqxhr) {
            $('body').append('<div id="' + table + '_' + column + '" >loading please wait...</div>');

            $('#' + table + '_' + column).html('<div id="photo_cam_stream"></div><div id="photo_cams"></div>');
            $("#" + table + '_' + column).dialog(
                    {
                        resizable: false,
                        modal: true,
                        buttons: {
                            "Take Photo": function() {
                                webcam.capture();

                                $(this).dialog("close");
                            },
                            Cancel: function() {
                                $(this).dialog("close");

                            }

                        }
                    });
            var pos = 0, ctx = null, saveCB, image = [];
            var canvas = document.createElement("canvas");
            canvas.setAttribute("width", 320);
            canvas.setAttribute("height", 240);
            ctx = canvas.getContext("2d");
            image = ctx.getImageData(0, 0, 320, 240);

            $("#photo_cam_stream").webcam({
                width: 320,
                height: 240,
                mode: "callback",
                swffile: AppJsURL + "/cam/jscam.swf",
                onTick: function() {
                },
                onSave: function(data) {
                    var col = data.split(";");
                    var img = image;

                    for (var i = 0; i < 320; i++) {
                        var tmp = parseInt(col[i]);
                        img.data[pos + 0] = (tmp >> 16) & 0xff;
                        img.data[pos + 1] = (tmp >> 8) & 0xff;
                        img.data[pos + 2] = tmp & 0xff;
                        img.data[pos + 3] = 0xff;
                        pos += 4;
                    }

                    if (pos >= 4 * 320 * 240) {
                        ctx.putImageData(img, 0, 0);
                        $.post(AppURL + "index.php?file=uploadcameraimage&dataType=ajax&table=" + table + "&column=" + column, {
                            type: "data",
                            image: canvas.toDataURL("image/png")
                        }, function(data) {
                            $("#" + column).val(data);
                            console.log(AppViewUploadsURL + data);
                            $("#" + column + "_image").attr('src', AppViewUploadsURL + data);
                            $("#" + table + '_' + column).remove();

                        });
                        pos = 0;
                    }
                },
                onCapture: function(data) {

                    webcam.save();
                },
                debug: function() {
                },
                onLoad: function() {
                    var cams = webcam.getCameraList();
                    for (var i in cams) {
                        jQuery("#photo_cams").append("<li>" + cams[i] + "</li>");
                    }
                }
            });

        });

    });
    $('input[type=date]').attr('readonly', 'readonly');
    /* $('input[type=date]').datepicker({
     showOn: "button",
     buttonImage: AppImgURL+"icon_calendar.jpg",
     buttonImageOnly: true,
     showAnim:'blind',
     showWeek: true,
     changeMonth: true,
     changeYear: true,
     dateFormat:'yy-mm-dd',
     showButtonPanel: true,
     yearRange: 'c-100:c+100'

     }); */
});
jQuery.fn.capitalize = function() {
    $(this[0]).keyup(function(event) {
        var box = event.target;
        var txt = $(this).val();
        var start = box.selectionStart;
        var end = box.selectionEnd;
        $(this).val(txt.replace(/^(.)|(\s|\-)(.)/g, function($1) {
            return $1.toUpperCase();
        }));
        box.setSelectionRange(start, end);
    });

    return this;
}



