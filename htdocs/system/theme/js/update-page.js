if ($) $ (function () {
  $ ('#e2-thinkbar').fadeTo (333, 1)
  $ ('#e2-update-status').slideDown (1000)
  $.ajaxSetup ({ type: "get", timeout: 10000 })
  $.ajax ({
    url: $ ('#e2-check-updates-action').attr ('href'),
    success: function (msg) {
      if (msg.substr (0, 6) == 'ready|') {
        $.ajax ({
          url: $ ('#e2-describe-updates-action').attr ('href'),
          success: function (msg2) {
            vnum = msg.substr (6)
            $ ('#e2-update-status').html ('Доступна версия ' + vnum + ':')
            $ ('#e2-update-description').html (msg2).slideDown (333)
            $ ('#e2-update-apply').slideDown (333)
            $ ('#e2-update-download-link').attr ('href', '')
            $ ('#e2-update-download-link').html (vnum)
            if (document.$e2Mark) document.$e2Mark ()
          },
          error: function (xhr) {
            $ ('#e2-update-status').html ('Произошла ошибка.')
          },
          complete: function (xhr) {
            $ ('#e2-thinkbar').fadeTo (333, 0)
          }
        })

      } else if (msg == 'no-updates') {
        $ ('#e2-update-status').html ('Более новых версий пока нет.')
        $ ('#e2-thinkbar').fadeTo (333, 0)
      }
    },
    error: function (xhr) {
      $ ('#e2-update-status').html ('Произошла ошибка.')
      $ ('#e2-thinkbar').fadeTo (333, 0)
    }
  })
})
