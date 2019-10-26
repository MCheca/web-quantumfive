(function ($) {

  $.fn.serializeArrayAll = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
      if (o[this.name] !== undefined) {
        if (!o[this.name].push) {
          o[this.name] = [o[this.name]];
        }
        o[this.name].push(this.value || '');
      } else {
        o[this.name] = this.value || '';
      }
    });
    var $radio = $('input[type=radio],input[type=checkbox]', this);
    $.each($radio, function () {
      if (!o.hasOwnProperty(this.name)) {
        o[this.name] = '';
      }
    });
    return o;
  };

  // Toggles
  // ---------------------------------------------------------------------------

  $('.ig-list-images > li').on('click', function (e) {
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    $(this).find('input[type=radio]').prop('checked', true).trigger('change');
    $(this).siblings().find('input[type=radio]').prop('checked', false);
  });

  $('input[name=insta_source]').on('change', function (e) {
    if (this.value == 'username') {
      $('#ig-select-tag-wrap').hide(500, function (e) {
        $('#ig-select-username-wrap').show().addClass('active');
      }).removeClass('active');
    } else {
      $('#ig-select-username-wrap').hide(500, function (e) {
        $('#ig-select-tag-wrap').show().addClass('active');
      }).removeClass('active');
    }
  });

  $('input[name=insta_box]').on('change', function (e) {
    if (this.checked) {
      $('#ig-section-box').show('slow').addClass('active');
    } else {
      $('#ig-section-box').hide('slow').removeClass('active');
    }
  });

  $('input[name=insta_layout]').on('change', function (e) {
    if (this.value == 'carousel') {
      $('#ig-section-gallery, #ig-section-masonry').hide(500, function (e) {
        $('#ig-section-carousel').show().addClass('active');
      }).removeClass('active');
    } else if (this.value == 'gallery') {
      $('#ig-section-carousel, #ig-section-masonry').hide(500, function (e) {
        $('#ig-section-gallery').show().addClass('active');
      }).removeClass('active');
    } else {
      $('#ig-section-carousel').hide(500, function (e) {
        $('#ig-section-masonry').show().addClass('active');
        $('#ig-section-gallery').show().addClass('active');
      }).removeClass('active');
    }
  });

  $('input[name=insta_button]').on('change', function (e) {
    if (this.checked) {
      $('#ig-section-button').show('slow').addClass('active');
    } else {
      $('#ig-section-button').hide('slow').removeClass('active');
    }
  });

  $('input[name=insta_button_load]').on('change', function (e) {
    if (this.checked) {
      $('#ig-section-button_load').show('slow').addClass('active');
    } else {
      $('#ig-section-button_load').hide('slow').removeClass('active');
    }
  });

  $('input[name=insta_hover]').on('change', function (e) {
    if (this.checked) {
      $('#ig-section-hover').show('slow').addClass('active');
    } else {
      $('#ig-section-hover').hide('slow').removeClass('active');
    }
  });

  $('input[name=insta_popup]').on('change', function (e) {
    if (this.checked) {
      $('#ig-section-popup').show('slow').addClass('active');
    } else {
      $('#ig-section-popup').hide('slow').removeClass('active');
    }
  });

  $('input[name=insta_card]').on('change', function (e) {
    if (this.checked) {
      $('#ig-section-card').show('slow').addClass('active');
    } else {
      $('#ig-section-card').hide('slow').removeClass('active');
    }
  });

  // Spinner
  // -------------------------------------------------------------------------

  function ig_change_spinner(link) {
    if (link) {
      if (!$('#ig-save-settings .insta-gallery-spinner img').length) {
        var img = '<img src="' + link + '" class="ig-spin" />';
        $('#ig-save-settings .insta-gallery-spinner').append(img);
      } else {
        $('#ig-save-settings .insta-gallery-spinner img').attr('src', link);
      }
      $('#ig-save-settings .insta-gallery-spinner .ig-spin').hide();
      $('#ig-save-settings .insta-gallery-spinner img').show();
    } else {
      $('#ig-save-settings .insta-gallery-spinner .ig-spin').show();
      $('#ig-save-settings .insta-gallery-spinner img').remove();
    }

  }

  var $igs_image_id = $('input[name=insta_spinner_image_id]'),
          $igs_reset = $('#ig-spinner-reset');

  $('#ig-save-settings').on('submit', function (e) {
    e.preventDefault();

    var $form = $(this),
            $spinner = $form.find('.spinner');

    $.ajax({
      url: ajaxurl,
      type: 'post',
      dataType: 'JSON',
      data: $.param($form.serializeArrayAll()) + '&' + $.param({action: 'qligg_save_settings'}),
      beforeSend: function () {
        $spinner.addClass('is-active');
      },
      success: function (response) {
        if (response.success) {
          window.location.reload();
        }
      },
      complete: function () {
        $spinner.removeClass('is-active');
      },
      error: function (jqXHR, textStatus) {
        console.log(textStatus);
      }
    });
  });

  // reset spinner to default
  $igs_reset.click(function () {
    $igs_image_id.val('');
    ig_change_spinner();
    $(this).hide();
  });

  if ($igs_image_id.val() == '')
    $igs_reset.hide();
  if ($igs_image_id.data('misrc') != '')
    ig_change_spinner($igs_image_id.data('misrc'));

  // select media image
  $('#ig-spinner-upload').click(function (e) {
    e.preventDefault();
    var image_frame;

    if (image_frame) {
      image_frame.open();
    }
    // Define image_frame as wp.media object
    image_frame = wp.media({
      title: 'Select Media',
      multiple: false,
      library: {
        type: 'image',
      }
    });

    image_frame.on('close', function () {
      // On close, get selections and save to the hidden input
      // plus other AJAX stuff to refresh the image preview
      var selection = image_frame.state().get('selection');

      if (selection.length) {

        var gallery_ids = new Array();
        var i = 0, attachment_url;

        selection.each(function (attachment) {
          gallery_ids[i] = attachment['id'];
          attachment_url = attachment.attributes.url;
          i++;
        });
        var ids = gallery_ids.join(",");
        $igs_image_id.val(ids);
        ig_change_spinner(attachment_url)
      }

      // toggle reset button
      if ($igs_image_id.val() == '') {
        $igs_reset.hide();
      } else {
        $igs_reset.show();
      }

    });

    image_frame.on('open', function () {
      // On open, get the id from the hidden input
      // and select the appropiate images in the media manager
      var selection = image_frame.state().get('selection');
      var ids = $igs_image_id.val().split(',');

      ids.forEach(function (id) {
        attachment = wp.media.attachment(id);
        attachment.fetch();
        selection.add(attachment ? [attachment] : []);
      });

    });

    image_frame.open();
  });

  // Actions
  // ---------------------------------------------------------------------------

  $(document).on('click', '[data-qligg-toggle]', function (e) {
    e.preventDefault();

    $($(this).data('qligg-toggle')).slideToggle();

  });

  $(document).on('click', '[data-qligg-copy]', function (e) {
    e.preventDefault();

    $($(this).data('qligg-copy')).select();
    document.execCommand('copy');

  });

  $('#ig-remove-data').on('click', function (e) {

    var checked = $(this).is(':checked');

    if (checked) {

      var c = confirm(qligg.remove_data);

      if (!c) {
        return false;
      }

    }

  });

  // Generate token
  // ---------------------------------------------------------------------------
  $(document).on('ready', function (e) {

    var hash = window.location.hash,
            access_token = hash.substring(14);

    if (access_token.length > 40) {

      var $button = $('#ig-generate-token').find('.btn-instagram'),
              $spinner = $('#ig-generate-token').find('.spinner');

      $.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
          action: 'qligg_generate_token',
          ig_access_token: access_token,
          ig_nonce: qligg.nonce
        },
        beforeSend: function () {
          $button.css({'opacity': '.5', 'pointer-events': 'none'});
          $spinner.addClass('is-active');
        },
        success: function (response) {
          if (response.success) {
            setTimeout(function () {
              window.location.reload();
            }, 300);
          } else {
            alert(response.data);
          }
        },
        complete: function () {
          $button.removeAttr('style');
          $spinner.removeClass('is-active');
          window.location.hash = '';
          window.location.href.split('#')[0]
        },
        error: function (jqXHR, textStatus) {
          console.log(textStatus);
        }
      });

    }

  });

  // Update token
  // -------------------------------------------------------------------------

  $('#ig-update-token').on('submit', function (e) {
    e.preventDefault();

    var $form = $(this),
            $spinner = $form.find('.spinner');

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: {
        action: 'qligg_generate_token',
        ig_access_token: $form.find('input[name=ig_access_token]').val(),
        ig_nonce: qligg.nonce
      },
      beforeSend: function () {
        $spinner.addClass('is-active');
      },
      success: function (response) {
        if (response.success) {
          setTimeout(function () {
            window.location.reload();
          }, 300);
        } else {
          alert(response.data);
        }
      },
      complete: function () {
        $spinner.removeClass('is-active');
      },
      error: function (jqXHR, textStatus) {
        console.log(textStatus);
      },
    });
  });


  // Remove token
  // -------------------------------------------------------------------------

  $('.ig-remove-token').on('click', function (e) {
    e.preventDefault();

    var c = confirm(qligg.remove_token);

    if (!c) {
      return false;
    }

    var $item = $(this),
            $tr = $item.closest('tr'),
            $spinner = $tr.find('.spinner');

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: {
        action: 'qligg_remove_token',
        item_id: $item.data('item_id'),
        ig_nonce: qligg.nonce
      },
      beforeSend: function () {
        $spinner.addClass('is-active');
      },
      success: function (response) {
        if (response.success) {
          $tr.fadeOut();

          setTimeout(function () {
            window.location.reload();
          }, 300);

        } else {
          alert(response.data);
        }
      },
      complete: function () {
        $spinner.removeClass('is-active');
      },
      error: function (jqXHR, textStatus) {
        console.log(textStatus);
      }
    });

  });

  // Gallery
  // ---------------------------------------------------------------------------

  $('#ig-update-form').on('submit', function (e) {
    e.preventDefault();

    var $form = $(this),
            $spinner = $form.find('.spinner');

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: $.param($form.serializeArrayAll()) + '&' + $.param({action: 'qligg_update_form'}),
      beforeSend: function () {
        $spinner.addClass('is-active');
      },
      success: function (response) {
        if (response.success) {
          setTimeout(function () {
            window.location.href = response.data;
          }, 300);
        } else {
          alert(response.data);
        }
      },
      complete: function () {
        $spinner.removeClass('is-active');
      },
      error: function (jqXHR, textStatus) {
        console.log(textStatus);
      },
    });
  });

  $('.ig-form-item-delete').on('click', function (e) {
    e.preventDefault();

    var c = confirm(qligg.remove_item);

    if (!c) {
      return false;
    }

    var $item = $(this),
            $tr = $item.closest('tr'),
            $spinner = $tr.find('.spinner');

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: {
        action: 'qligg_form_item_delete',
        item_id: $tr.data('item_id'),
        ig_nonce: $tr.data('item_nonce'),
      },
      beforeSend: function () {
        $spinner.addClass('is-active');
      },
      success: function (response) {
        if (response.success) {
          setTimeout(function () {
            window.location.href = response.data;
          }, 300);
        } else {
          alert(response.data);
        }
      },
      complete: function () {
        setTimeout(function () {
          $tr.remove();
        }, 600);
      },
      error: function (jqXHR, textStatus) {
        console.log(textStatus);
      },
    });
  });

  $('.ig-form-item-cache').on('click', function (e) {
    e.preventDefault();

    var c = confirm(qligg.remove_cache);

    if (!c) {
      return false;
    }

    var $item = $(this),
            $tr = $item.closest('tr'),
            $spinner = $tr.find('.spinner');

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: {
        action: 'qligg_form_item_cache',
        item_id: $tr.data('item_id'),
        ig_nonce: $tr.data('item_nonce'),
      },
      beforeSend: function () {
        $spinner.addClass('is-active');
      },
      success: function (response) {
        if (response.success) {
          
          console.log(response.data);
          
          setTimeout(function () {
            $spinner.removeClass('is-active');
          }, 300);
        } else {
          alert(response.data);
        }
      },
      complete: function () {
        setTimeout(function () {
          $spinner.removeClass('is-active');
        }, 600);
      },
      error: function (jqXHR, textStatus) {
        console.log(textStatus);
      },
    });
  });

  $(document).on('ready', function () {
    $('.color-picker').wpColorPicker();
  });

})(jQuery);