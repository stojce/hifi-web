var download = {
    projectsData: [],
    os_message: {
        "mac"  : "Requires Mountain Lion(10.8) or newer",
        "windows" : "Requires Windows 7.1 or newer",
        "linux" : "Requires  ubuntu 13.04 or newer"
    },

    init: function() {
         // proxima-nova fonts
        if (typeof Typekit != 'undefined') {
            Typekit.load();
        }
        download.getBuilds(function() {
            download.initDropdowns();
            download.suggestPackage();
        });

    },

    initDropdowns: function() {
        $('.interface .choose-os').bind('change', function() {
            $('.interface .os-icon').removeClass('selected');
            $('.interface .os-icon-' + $(this).val()).addClass('selected');
            $('.interface .choose-os-container p').text(download.os_message[$(this).val()]);
            download.renderBuild('interface', $(this).val());
            $(this).trigger('chosen:updated');
        }).chosen();

        $('.stackmanager .choose-os').bind('change', function() {
            $('.stackmanager .os-icon').removeClass('selected');
            $('.stackmanager .os-icon-' + $(this).val()).addClass('selected');
            $('.stackmanager .choose-os-container p').text(download.os_message[$(this).val()]);
            download.renderBuild('stackmanager', $(this).val());
            $(this).trigger('chosen:updated');
        }).chosen();
    },

    getBuilds: function(fAfter) {
        $.get('../builds.xml', function(data) {
            var projects = $($(data).find('project'));
            for (projectIndex = 0; projectIndex < projects.length; projectIndex++) {
                var project = $(projects[projectIndex]);
                download.projectsData[$(project).attr('name')] = [];
                var platforms = $(project).find('platform');
                for (platformIndex = 0; platformIndex < platforms.length; platformIndex++) {
                    var platform = $(platforms[platformIndex]);
                    download.projectsData[$(project).attr('name')][$(platform).attr('name')] = [];
                    var buildVersions = $(platform).find("build");
                    for (buildIndex = 0; buildIndex < buildVersions.length; buildIndex++) {
                        var notes = $(buildVersions[buildIndex]).find('note');
                        var notesHtml = null;
                        if (typeof (notes) != "undefined" && notes.length > 0) {
                            notesHtml  = "<ul>";
                            for (nodeIndex = 0; nodeIndex < notes.length; nodeIndex++) {
                                notesHtml += "<li><p>" + $(notes[nodeIndex]).text() + "</p></li>" ;
                            }
                            notesHtml += "</ul>";
                        }

                        var build = {
                                    "version" : $(buildVersions[buildIndex]).find('version').text(),
                                    "url" : $(buildVersions[buildIndex]).find('url').text(),
                                    "time" : $(buildVersions[buildIndex]).find('timestamp').text(),
                                    "sha": $(buildVersions[buildIndex]).find('sha').text(),
                                    "pull_request": $(buildVersions[buildIndex]).find('pull_request').text(),
                                    "is_stable": $(buildVersions[buildIndex]).find('is_stable').text(),
                                    "notes" : notesHtml
                        };
                       download.projectsData[$(project).attr('name')][$(platform).attr('name')][buildIndex] = build;
                    }

                }
            }
            if (fAfter) {
                fAfter();
            }
        });
    },

    renderBuild: function(project, platform) {
        var builds =  download.projectsData[project][platform];
        $('#' + platform).find('.choose-build-version-container div.chosen-container').remove();
        var html = "<select class='choose-build-version'>";
        for (var index  in builds) {
            if (index == 0) {
                $('#' + project).find('.download').attr('href', builds[index]['url']);
                $('#' + project).find(".choose-build-version-container p.build-time").text(builds[index]['time']);
                if (builds[index]['notes'] != null) {
                    $('#' + project).find('.release-notes').html("<b>Release notes</b>" + builds[index]['notes']);
                }
            }
            html += "<option " + (index == 0 ?  " selected= \"selected\"" : " ")  + " value=\"" + index + "\">" + builds[index]['version'] + (index == 0 ? " (latest)" : "") + (builds[index]['is_stable'] == 'yes' ? " - stable" : "")  + "</option>";
        }
        html += "</select>";
        $('.' + project + ' #choose-build-version-' + project).html(html);
        $('#' + project).find('.choose-build-version').chosen().change(function() {
            $('#' + project).find('.download').attr('href', builds[$(this).val()]['url']);
            $('#' + project).find(".choose-build-version-container p.build-time").text(builds[$(this).val()]['time']);
            $('#' + project).find('.release-notes').empty();
            if (builds[$(this).val()]['notes'] != null) {
                $('#' + project).find('.release-notes').html("<b>Release notes</b>" + builds[$(this).val()]['notes']);
            }
        });
    },

    suggestPackage: function() {
        $('.choose-os').val('');
        var ua = navigator.userAgent;
        var appVersion = navigator.appVersion;
        if (ua.match("Win")) {
            $('.choose-os').val('windows');
        }
        if (ua.match("Mac")) {
            $('.choose-os').val('mac');
        }
        /*
        if (ua.match("Linux") || appVersion.match("X11")) {
            $('.choose-os').val('linux').change();
        }
        */
        $('.choose-os').change();
    },

};

$(function() {
    download.init();
});
