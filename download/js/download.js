$(function() {
     // proxima-nova fonts
    if (typeof Typekit != 'undefined') {
        Typekit.load();
    }
    var browser_version =  {    "mac"  : "Requires Mountain Lion(10.8) or newer",
                                "windows" : "Requires Windows 7.1 or newer",
                                "linux" : "Requires  ubuntu 13.04 or newer"
                           };
    var projectsData = [];
    if ($.cookie('interface-os')) {
        $('.interface .choose-os option').removeAttr('selected');
        $('.interface .choose-os option[value="'+ $.cookie('interface-os') +'"]').attr('selected', 'selected');
        $('.interface .os-icon').removeClass('selected');
        $('.interface .os-icon-' + $.cookie('interface-os')).addClass('selected');
        $('.interface .choose-os-container p').text(browser_version[$.cookie('interface-os')]);
    }

    if ($.cookie('stackmanager-os')) {
        $('.stackmanager .choose-os option').removeAttr('selected');
        $('.stackmanager .choose-os option[value="'+ $.cookie('stackmanager-os') +'"]').attr('selected', 'selected');
        $('.stackmanager .os-icon').removeClass('selected');
        $('.stackmanager .os-icon-' + $.cookie('stackmanager-os')).addClass('selected');
        $('.stackmanager .choose-os-container p').text(browser_version[$.cookie('stackmanager-os')]);
    }

    $('.interface .choose-os').chosen().change(function() {
        $.cookie('interface-os', $(this).val());
        $('.interface .os-icon').removeClass('selected');
        $('.interface .os-icon-' + $.cookie('interface-os')).addClass('selected');
        $('.interface .choose-os-container p').text(browser_version[$.cookie('interface-os')]);
        renderBuild('interface', $(this).val());
    });

    $('.stackmanager .choose-os').chosen().change(function() {
        $.cookie('stackmanager-os', $(this).val());
        $('.stackmanager .os-icon').removeClass('selected');
        $('.stackmanager .os-icon-' + $.cookie('stackmanager-os')).addClass('selected');
        $('.stackmanager .choose-os-container p').text(browser_version[$.cookie('stackmanager-os')]);
        renderBuild('stackmanager', $(this).val());
    });

    $.get('/builds.xml', function(data) {
        var projects = $($(data).find('project'));
        for (projectIndex = 0; projectIndex < projects.length; projectIndex++) {
            var project = $(projects[projectIndex]);
            projectsData[$(project).attr('name')] = [];
            var platforms = $(project).find('platform');
            for (platformIndex = 0; platformIndex < platforms.length; platformIndex++) {
                var platform = $(platforms[platformIndex]);
                projectsData[$(project).attr('name')][$(platform).attr('name')] = [];
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
                                "notes" : notesHtml
                    };
                   projectsData[$(project).attr('name')][$(platform).attr('name')][buildIndex] = build;
                }

            }
        }

        renderBuild('interface',    $.cookie('interface-os') ? $.cookie('interface-os')  : "mac");
        renderBuild('stackmanager', $.cookie('stackmanager-os') ? $.cookie('stackmanager-os') : "windows" );
    });

    function renderBuild(project, platform) {
        var builds =  projectsData[project][platform];
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
            html += "<option " + (index == 0 ?  " selected= \"selected\"" : " ")  + " value=\"" + index + "\">" + builds[index]['version'] + (index == 0 ? " (latest)" : "") + "</option>";
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
    }

});
