if ($) $ (function () {

  var prevTitle = $ ('#title').val ()
  var prevTags = $ ('#tags').val ()
  var prevText = $ ('#text').val ()
  var edited = false
  
  var actionName = $ ('#action').val ()
  var liveSaving = false

  
  $.ajaxSetup ({ type: "post", timeout: 10000 })
  
  e2UpdateSubmittability = function () {
    shouldBeEnabled = (
      !/^ *$/.test ($ ('#title').val ()) &&
      !/^ *$/.test ($ ('#text').val ()) &&
      !liveSaving
    )
	  if (shouldBeEnabled) {
			$ ('#submit-button').removeAttr ('disabled')
	  } else {
		  $ ('#submit-button').attr ('disabled', 'disabled')
	  }
  }

  e2LiveSaveError = function (errmsg) {
    $ ('#e2-console').html (errmsg)
    $ ('#livesaving').hide ()
    $ ('#livesave-button').show ()
    $ ('#livesave-error').show ()
    $ ('#livesave-error').attr ('title', errmsg)
  }
  
  e2LiveSave = function () {
    if (liveSaving) return
    if ($ ('#text') .val () == '') return
    liveSaving = true
    e2UpdateSubmittability ()
    if ($ ('#title').val () == '') {
      var x
      var generatedTitle = $ ('#text').val ()
      if ((x = generatedTitle.indexOf ('.')) >= 0) generatedTitle = generatedTitle.substr (0, x)
      if ((x = generatedTitle.indexOf (';')) >= 0) generatedTitle = generatedTitle.substr (0, x)
      if ((x = generatedTitle.indexOf (',')) >= 0) generatedTitle = generatedTitle.substr (0, x)
      if (generatedTitle.indexOf ('((') == 0) generatedTitle = generatedTitle.substr (2)
      generatedTitle = generatedTitle.substr (0, 1).toUpperCase () + generatedTitle.substr (1)
      $ ('#title').val (generatedTitle)
    }
    $ ('#livesave-button').hide ()
    $ ('#livesaving').fadeIn (333)
    $ ('#e2-thinkbar').fadeTo (333, 1)
    $.ajax ({
      data: $ ('form').serialize (),
      url: $ ('#e2-note-livesave-action').attr ('href'),
      success: function (msg) {
        $ ('#livesave-error').hide ()
        $ ('#livesaving').fadeOut (333)
        if (msg.substr (0, 3) == 'id|') {
          newdraftid = msg.substr (3)
          $ ('#note-id').val (newdraftid)
          if ($ ('#e2-drafts') && $ ('#e2-drafts-item')) {
            $ ('#e2-drafts-item').fadeIn (333)
            $ ('<div class="e2-menu-item-frame"></div>').css ({
              'position': 'absolute',
              'left': $ ('#e2-note-form-wrapper').offset ().left,
              'top': $ ('#e2-note-form-wrapper').offset ().top,
              'width': $ ('#e2-note-form-wrapper').width (),
              'height': $ ('#e2-note-form-wrapper').height ()
            }).appendTo ('body').animate ({
              'left': $ ('#e2-drafts').offset ().left - 10,
              'top': $ ('#e2-drafts').offset ().top - 5,
              'width': $ ('#e2-drafts').width () + 20,
              'height': $ ('#e2-drafts').height () + 10,
            }, 667).fadeTo (333, 0.667).fadeOut (333)
            $ ('#e2-drafts-count').html ($ ('#e2-drafts-count').html () * 1 + 1)
          }
        } else if (msg.substr (0, 6) == 'error|') {
          e2LiveSaveError (msg.substr (6))
        }
      },
      error: function (xhr) { e2LiveSaveError (xhr.responseText) },
      complete: function (xhr) {
        liveSaving = false
        e2UpdateSubmittability ()
        //$ ('#e2-console').html (xhr.responseText)
        $ ('#e2-thinkbar').fadeTo (333, 0)
      }
    })
  }
  
  $ ('#title').bind ('input', function () {
    document.$e2UpdateTitle (this)
  })
  
  $ ('#title').add ('#tags').add ('#text')
   .bind ('change input keyup keydown keypress mouseup mousedown cut copy paste', function () {
      e2UpdateSubmittability ()
      if ($ ('#title').val () != prevTitle) edited = true
      if ($ ('#tags').val ()  != prevTags) edited = true
      if ($ ('#text').val ()  != prevText) edited = true
      if (edited && ($ ('#text').val () != '')) {
        edited = false
        $ ('#livesaving').hide ()
        $ ('#livesave-button').fadeIn (333)
        prevTitle = $ ('#title').val ()
        prevTags = $ ('#tags').val ()
        prevText = $ ('#text').val ()
      }
    })
  
  $ ('#livesave-button').click (function () { e2LiveSave (); return false })
    
  $ (document).bind ('keydown keyup keypress', function (event) {
    key = event.keyCode
    if (!key) key = event.charCode
    
    ctrl = document.e2.mac? (event.metaKey && !event.ctrlKey) : event.ctrlKey
    
    // ctrl+s
    if (event.type == 'keypress') {
      if (ctrl && ((115 == key) || (1099 == key))) {
        // это заставляет работать в сафари в русской раскладке
        e2LiveSave ()
        return false
      }
    } else {
      if (ctrl && ((83 == key) || (1067 == key))) {
        e2LiveSave ()
        return false
      }
    }

  })
  
  e2UpdateSubmittability ()
  
  e2PasteText = function (text) {
    field = document.getElementById ('text')
    field.focus ()
    if (document.selection) document.selection.createRange ().text = text
    else if (field.selectionStart || field.selectionStart == '0') {
      selStart = field.selectionStart
      selEnd = field.selectionEnd
      field.value = field.value.substring (0, selStart) + text +
        field.value.substring (selEnd, field.value.length)
      field.selectionStart = selStart
      field.selectionEnd = selStart + text.length
    } else {
      field.value += text
    }
    field.focus ()
  }
  
  e2PastePic = function (pic) {
    if (alt = $ ('#title').val ()) alt = ' ' + alt
    pic = '((' + pic + alt + '))'
    e2PasteText (pic)
  }
  
  $e2AddImage = function (imageThumb, imageFull) {
    $newImage = $ ('#e2-uploaded-image-prototype').clone (true)
    $newImage.attr ('style', '')
    $newImage.css ('width', '')
    $newImage.find ('.e2-uploaded-image-preview img')
      .attr ('src', imageThumb)
      .attr ('alt', imageFull)
    $newImage.find ('.e2-uploaded-image-remover')
      .data ('imageThumb', imageThumb)
      .data ('file', imageFull)
    return $newImage
  }
  
  /*
  remover hover is over
  $ ('.e2-uploaded-image-remover').css ('opacity', 0).show ()
  
  $ ('#e2-uploaded-image-prototype').mouseenter (function () {
    $ (this).find ('.e2-uploaded-image-remover').stop ().css ('opacity', 1).show ()
  })

  $ ('#e2-uploaded-image-prototype').mouseleave (function () {
    $ (this).find ('.e2-uploaded-image-remover').stop ().fadeTo (167, 0)
  })
  */
  
  $ ('#e2-uploaded-image-prototype').click (function () {
    e2PastePic ($ (this).find ('img').attr ('alt'))
  })
  
  e2Delfiles = function (theData, $thingToDelete) {
    $ ('#e2-thinkbar').fadeTo (333, 1)
    $.ajax ({
      data: theData,
      url: $ ('#e2-file-remove-action').attr ('href'),
      success: function (msg) {
        //alert (msg)
        if (msg.substr (0, 6) == 'error|') {
          $thingToDelete.fadeTo (333, 1)
        } else {
          $thingToDelete.hide (333, function () { $ (this).remove () })
        }
      },
      error: function (xhr) {
        $thingToDelete.fadeTo (333, 1)
      },
      complete: function (xhr) {
        $ ('#e2-thinkbar').fadeTo (333, 0)
      }
    })
  }
  
  $ ('.e2-uploaded-image-remover').click (function () {
    var $picToDelete = $ (this).parent ().parent ()
    $picToDelete.fadeTo (333, 0.5)
    e2Delfiles ({
      'file': $ (this).data ('file'),
      'thumb': $ (this).data ('imageThumb')
    }, $picToDelete)
    return false
  })
  
  $ ('#e2-uploaded-images').children ().each (function () {
    imageThumb = $ (this).find ('.e2-uploaded-image-preview img').attr ('src')
    imageFull = $ (this).find ('.e2-uploaded-image-preview img').attr ('alt')
    $ (this).remove ()
    $e2AddImage (imageThumb, imageFull).appendTo ($ ('#e2-uploaded-images')).show ()
  })
  
  new AjaxUpload ('e2-upload-button', {
    action: $ ('#e2-file-upload-action').attr ('href'),
    autoSubmit: true,
    onSubmit: function (file, ext) {
      $ ('#e2-upload-error').slideUp (333)
      if (/^gif|jpe?g|png$/i.test (ext)) {
        //e2PastePic (file)
        $ ('#e2-uploading').show ().css ('opacity', 1)
        $ ('#e2-upload-button').hide ()
        $ ('#e2-thinkbar').fadeTo (333, 1)
      } else {
        $ ('#e2-upload-error').html ('Поддерживаются только изображения').slideDown (333)
        return false
      }
 		},
 		onComplete: function (file, response) {
      $ ('#e2-uploading').hide ()
      $ ('#e2-upload-button').show ()
      $ ('#e2-thinkbar').fadeTo (333, 0)
      if (response.substr (0, 6) == 'image|') {
        image = response.substr (6).split ('|')
        imageFull = image[0]
        imageThumb = image[1]
        e2PastePic (imageFull)
        $e2AddImage (imageThumb, imageFull).appendTo ($ ('#e2-uploaded-images')).show (333, function () {
          $ ('#e2-uploading').hide ()
          $ ('#e2-upload-button').show ()
        })
      /*  
      } else if (response.substr (0, 5) == 'file|') {
  			$ ('<p class="admin-links small"><a class="dashed" href="javascript:e2PasteText (\'((' + file + '))\')">' + file + '<' + '/a><' + '/p>').appendTo ($ ('#e2-uploaded-files'))
      } else if (response.substr (0, 5) == 'file|') {
        alert ('Файл загружен')
  	  */
      } else if (response.substr (0, 6) == 'error|') {
        if (response.substr (6) == 'could-not-create-thumbnail') {
          $ ('#e2-upload-error').html ('Не удалось создать уменьшенное изображение (возможно, нет доступа к папке /pictures/thumbs/)').slideDown (333)
        } else {
          $ ('#e2-upload-error').html ('Не удалось загрузить изображение').slideDown (333)
        }
      }
    }
  })

  if (!document.e2.iosdevice) $ ('#e2-upload-controls').show ()
  
})