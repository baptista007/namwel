function isEmpty(value) {
    //Undefined or null
    if (typeof (value) === 'undefined'
            || value === null) {
        return true;
    }

    //Arrays && Strings
    if (typeof (value.length) !== 'undefined') {
        return value.length === 0;
    }

    //Numbers or boolean
    if (typeof (value) === 'number'
            || typeof (value) === 'boolean') {
        return false;
    }

    //Objects
    var count = 0;

    for (var i in value) {
        if (value.hasOwnProperty(i)) {
            count++;
        }
    }

    return count === 0;
}

function focusField(field, tab) {
    $('#' + field).focus();
}

function processFormErrors($form, errors)
{
    $.each(errors, function (index, error)
    {
        var $input = document.querySelector('input[name="' + index + '"]');

        if ($input) {
            $input.setCustomValidity(error);

            $input.onkeyup = function () {
                this.setCustomValidity('');
            };

            $input.focus();
        }
    });
}

/**
 * Replaces a parameter in a URL with a new parameter
 *
 * @param url
 * @param paramName
 * @param paramValue
 * @returns {*}
 */
function replaceUrlParam(url, paramName, paramValue) {
    var pattern = new RegExp('\\b(' + paramName + '=).*?(&|$)')
    if (url.search(pattern) >= 0) {
        return url.replace(pattern, '$1' + paramValue + '$2');
    }
    return url + (url.indexOf('?') > 0 ? '&' : '?') + paramName + '=' + paramValue;
}



/**
 * Shows users a message.
 * Currently uses humane.js
 *
 * @param string message
 * @returns void
 */
function showMessage(message) {
    $("html, body").animate({scrollTop: 0}, "slow");
    $('.flash-msg-container').html(message);

    setTimeout(function () {
        $('.flash-msg-container').html('');
    }, 4500);
}

function hideFlashMsg() {
    var elem = $('#flashmsgholder');
    if (elem.length > 0) {
        var duration = elem.attr("data-show-duration");
        if (duration > 0) {
            window.setTimeout(function () {
                elem.fadeOut();
            }, duration)
        }
    }
}

function closeModal(id) {
    $('#' + id).modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
}

function makeFooterSticky() {
    //position footer at the bottom
    let fheight = $('.footer-content').outerHeight(true);
    $('body').css('margin-bottom', fheight + 'px');
    $('.footer-content').css('height', fheight + 'px');
    $('.footer-content').css('min-height', fheight + 'px');
}

function goBack() {
    javascript:history.go(-1)
}

function toggleSubmitDisabled($submitButton) {
    if ($submitButton.hasClass('disabled')) {
        $submitButton.attr('disabled', false)
                .removeClass('disabled');

        if ($submitButton.is('button')) {
            $submitButton.text($submitButton.data('original-text'));
        } else {
            $submitButton.val($submitButton.data('original-text'));
        }
        return;
    }

    $submitButton.data('original-text', ($submitButton.is('button') ? $submitButton.text() : $submitButton.val()))
            .attr('disabled', true)
            .addClass('disabled');

    if ($submitButton.is('button')) {
        $submitButton.text('Processando...');
    } else {
        $submitButton.val('Processando...');
    }
}

function getFormSubmitButton($form) {
    let btn = $form.find('input[type=submit]');

    if (btn.length < 1) {
        btn = $form.find('button[type=submit]');
    }

    return btn;
}

function mysqlDatetimeToJS(mysql_string)
{
    try {
        var t, result = null;

        if (typeof mysql_string === 'string')
        {
            t = mysql_string.split(/[- :]/);

            //when t[3], t[4] and t[5] are missing they defaults to zero
            result = new Date(t[0], t[1] - 1, t[2], t[3] || 0, t[4] || 0, t[5] || 0);
        }

        return result;
    } catch (e) {
        return false;
    }
}

function doGet(url, success_func, error_func) {
    var result = null;

    $.get(
            url,
            function (data) {
                result = data;
            }
    )
            .done(function () {
                if (typeof success_func === 'function') {
                    success_func.apply(this, [result]);
                }
            })
            .fail(function () {
                if (typeof error_func === 'function') {
                    error_func.apply(this, [result]);
                }
            });
}

function scrollToElement(element) {
    $('html, body').animate({
        scrollTop: ($('#' + element).offset().top - 50)
    }, 500);
}

function openModalRemoteContent(url, title, close_btn_url, close_btn_modal_title) {
    var $modal = $('#ajax-modal');

    doGet(url, function (data) {
        if (data.indexOf('class="modal-content"') === -1) {
            var prep = '<div class="modal-dialog modal-lg" role="document">';
            prep += '<div class="modal-content">';

            if (title) {
                prep += '<div class="modal-header">';
                prep += '<h4 class="modal-title">';
                prep += title;
                prep += '</h4>';
                prep += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                prep += '</div>';
            }

            prep += '<div class="modal-body">';
            prep += data;
            prep += '</div>';

            if (close_btn_url) {
                prep += '<div class="modal-footer">';
                prep += '<button type="button" class="btn btn-default" onclick="openModalRemoteContent(\'' + close_btn_url + '\', \'' + close_btn_modal_title + '\')">Close</button>';
                prep += '</div>';
            }

            prep += '</div>';
            prep += '</div>';

            data = prep;
        }

        $modal.html(data).modal();
    });
}

$(function () {
    /*
     * --------------------
     * Ajaxify those forms
     * --------------------
     *
     * All forms with the 'ajax' class will automatically handle showing errors etc.
     *
     */
    $('form.ajax').ajaxForm({
        delegation: true,
        beforeSubmit: function (formData, jqForm, options) {
            $(jqForm[0])
                    .find('.error.help-block')
                    .remove();
            $(jqForm[0]).find('.has-error')
                    .removeClass('has-error');

            let $submitButton = getFormSubmitButton($(jqForm[0]));
            toggleSubmitDisabled($submitButton);
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $('.uploadProgress').show().html('Uploading Images - ' + percentComplete + '% Complete...    ');
        },
        error: function (data, statusText, xhr, $form) {
            // Form validation error.
            if (422 == data.status) {
                processFormErrors($form, $.parseJSON(data.responseText));
                return;
            }

            var msg = '<div class="alert alert-dnager">Ops! parece que algo deu errado em nossos servidores. Tente novamente ou entre em contato com o suporte se o problema persistir.</div>';

            if (!isEmpty($form.attr('data-feedback-div')) && $('#' + $form.attr('data-feedback-div')).length) {
                $('#' + $form.attr('data-feedback-div')).html('<div class="alert alert-danger">' + msg + '</div>');

                if ($("body").height() > $(window).height()) {
                    scrollToElement($form.attr('data-feedback-div'));
                }

            } else {
                showMessage('<div class="alert alert-danger">' + msg + '</div>');
            }

            let $submitButton = getFormSubmitButton($form);
            console.log($submitButton);
            toggleSubmitDisabled($submitButton);

            $('.uploadProgress').hide();
        },
        success: function (data, statusText, xhr, $form) {
            if (data.success) {
                if ($form.hasClass('reset')) {
                    $form.resetForm();
                }

                if ($form.hasClass('closeModalAfter')) {
                    $('.modal, .modal-backdrop').fadeOut().remove();
                }

                if (typeof data.message !== 'undefined') {
                    if (!isEmpty($form.attr('data-feedback-div')) && $('#' + $form.attr('data-feedback-div')).length) {
                        $('#' + $form.attr('data-feedback-div')).html('<div class="alert alert-success">' + data.message + '</div>');

                        if ($("body").height() > $(window).height()) {
                            scrollToElement($form.attr('data-feedback-div'));
                        }
                    } else {
                        showMessage('<div class="alert alert-success">' + data.message + '</div>');
                    }
                }

                if (typeof data.runThis !== 'undefined') {
                    eval(data.runThis);
                }

                if (typeof data.redirectUrl !== 'undefined') {
                    let r_timer = (!isEmpty($form.attr('data-reload-timer')) ? parseInt($form.attr('data-reload-timer')) : 2000);

                    setTimeout(function () {
                        let r_url = data.redirectUrl;

                        if (r_url.indexOf('http') < 0) {
                            r_url = siteAddr + r_url;
                        }

                        window.location.href = r_url;
                    }, r_timer);
                }
            } else {
                if (!isEmpty($form.attr('data-feedback-div')) && $('#' + $form.attr('data-feedback-div')).length) {
                    $('#' + $form.attr('data-feedback-div')).html('<div class="alert alert-danger">' + data.message + '</div>');
                } else {
                    showMessage('<div class="alert alert-danger">' + data.message + '</div>');
                }

                let $submitButton = getFormSubmitButton($form);
                toggleSubmitDisabled($submitButton);

                if (!isEmpty(data.fieldmessages)) {
                    processFormErrors($form, data.fieldmessages);
                }
            }

            $('.uploadProgress').hide();
            return false;
        },
        dataType: 'json'
    });
});
