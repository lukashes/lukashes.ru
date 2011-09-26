if ($) $ (function () {

  e2SelfSpin = function (me) {
    $ (me).find ('img').attr ('src', $ ('#e2-i-loading-spinner').attr ('href'))
    $ (me).fadeTo (333, 1)
  }
  
  var e2ToggleClick = function (event, me, functionOn, functionOff, functionSlow) {
    var functionOnGlobal = functionOn, functionOffGlobal = functionOff, functionSlowGlobal = functionSlow;
    //$ (me).find ('img').fadeTo (333, 0)
    $ (me).fadeTo (333, 0)

    $ ('#e2-thinkbar').fadeTo (333, 1)

    slowTimeout = setTimeout (function () { functionSlowGlobal (me) }, 333)

    $.ajax ({
      type: "post",
      timeout: 10000,
      url: $ (me).attr ('href'),
      data: 'result=ajaxresult',
      success: function (msg) {
        clearTimeout (slowTimeout)
        if (msg.substr (0, 10) == 'on-rehref|') {
          functionOnGlobal (msg.substr (10))
        }
        if (msg.substr (0, 11) == 'off-rehref|') {
          functionOffGlobal (msg.substr (11))
        }
      },
      error: function (xhr) {
        location.href = $ (me).attr ('href')
      },
      complete: function (xhr) {
        $ ('#e2-thinkbar').fadeTo (333, 0)
        //$ ('#e2-console').html (xhr.responseText)
      }
    })
    return false
  }

  $ ('.e2-favourite-toggle').click (function (event) {
    var me = this
    return e2ToggleClick (
      event, me, 
      function (msg) {
        $ (me).children ('img').stop ().attr ('src', $ ('#e2-i-star-set').attr ('href'))
        $ (me).show ().fadeTo (1, 1)
        $ (me).attr ('href', msg)
      },
      function (msg) {
        $ (me).children ('img').stop ().attr ('src', $ ('#e2-i-star-unset').attr ('href'))
        $ (me).show ().fadeTo (1, 1)
        $ (me).attr ('href', msg)
      },
      e2SelfSpin
    )
  })
  
  $ ('.e2-important-toggle').click (function (event) {
    var me = this
    return e2ToggleClick (
      event, me, 
      function (msg) {
        $ (me).children ('img').stop ().attr ('src', $ ('#e2-i-marker-remove').attr ('href'))
        $ (me).show ().fadeTo (1, 1)
        $ (me).parent ().parent ().parent ().removeClass('').addClass ('important')
        $ (me).attr ('href', msg)
        $ct = $ (me).parents ('.e2-comment-control-group').eq (0)
        $ct.find ('.e2-markable').addClass ('e2-marked')
        if (document.$e2Mark) document.$e2Mark ()
      },
      function (msg) {
        $ (me).children ('img').stop ().attr ('src', $ ('#e2-i-marker').attr ('href'))
        $ (me).show ().fadeTo (1, 1)
        $ (me).parent ().parent ().parent ().removeClass('important').addClass ('')
        $ (me).attr ('href', msg)
        $ct = $ (me).parents ('.e2-comment-control-group').eq (0)
        $ct.find ('.e2-markable').removeClass ('e2-marked')
        if (document.$e2Mark) document.$e2Mark ()
      },
      e2SelfSpin
    )
  })

  $ ('.e2-removed-toggle').click (function (event) {
    var me = this
    //var cc = $ ('#e2-comments-count').text ().split (' ')[0]
    var $ct = $ (me).parents ('.comment').eq (0)
    $ct.find ('.e2-comment-actions').hide ()
    $ct.find ('.e2-removed-toggling').css ('opacity', 0).show ().fadeTo (333, 1)
    return e2ToggleClick (
      event, me,
      function (href) {
        $ct.find ('.e2-removed-toggling').fadeTo (333, 0, function () {
          $ct.find ('.e2-comment-actions').show ()
        })
        $ct.find ('.e2-comment-actions').show ()
        $ct.find ('.comment-actions-removed').hide ()
        $ct.find ('.comment-content').slideDown (333)
        $ct.find ('.comment-meta').slideDown (333)
        $ct.find ('.comment-author').removeClass ('comment-author-removed')
        $ct.find ('.e2-removed-toggle').attr ('href', href)
        $ (me).fadeTo (333, 1)
        if (!$ (me).parents ('.comment').is ('.reply')) {
          $ (me).parents ('.comment-and-reply').find ('.reply').slideDown (333)
        }
        /*
        $ ('#e2-comments-count').text (
          $ ('#e2-comments-count').text ().replace (cc, cc*1+1)
        )
        */
      },
      function (href) {
        $ct.find ('.e2-removed-toggling').fadeTo (1, 0)
        $ct.find ('.e2-comment-actions').hide ()
        $ct.find ('.comment-meta').slideUp (333)
        $ct.find ('.comment-content').slideUp (333, function () {
          $ct.find ('.comment-actions-removed').slideDown (333)
        })
        $ct.find ('.comment-author').addClass ('comment-author-removed')
        $ct.find ('.e2-removed-toggle').attr ('href', href)
        $ (me).fadeTo (333, 1)
        if (!$ (me).parents ('.comment').is ('.reply')) {
          $ (me).parents ('.comment-and-reply').find ('.reply').slideUp (333)
        }
        /*
        $ ('#e2-comments-count').text (
          $ ('#e2-comments-count').text ().replace (cc, cc*1-1)
        )
        */
      },
      function (me) { return false }
    )
  })

  $ ('.e2-pinned-toggle').click (function (event) {
    var me = this
    return e2ToggleClick (
      event, me,
      function (href) {
        $ (me).children ('img').stop ().attr ('src', $ ('#e2-i-pinned').attr ('href'))
        $ (me).show ().fadeTo (1, 1)
        $ (me).attr ('href', href)
      },
      function (href) {
        $ (me).children ('img').stop ().attr ('src', $ ('#e2-i-pin').attr ('href')).show ()
        $ (me).fadeTo (1, 1)
        $ (me).attr ('href', href)
      },
      e2SelfSpin
    )
  })

  
})