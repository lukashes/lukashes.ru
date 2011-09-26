if ($) $ (function () {

  var oldTypedTags = null
  var allTagsLinks = []

  var allTags = $ ('#all-tags').val ().split (',')
  //allTags.sort ()
  
  var sampleTags = [
    'музыка',
    'кино',
    'книги',
    'фото',
    'жизнь',
    'смешное',
    'идеи',
    'ссылки',
    'цитаты'
  ]
  
  var sampleTagsToAdd = []
  
  if ($ ('#all-tags').val ()) {
    for (var i in allTags) allTagsLinks.push (
      '<a href="#" class="dashed e2-tag-autoinsertable">' + allTags[i] + '</a>'
    )
  }
  
  for (var j in sampleTags) {
    found = false
    for (var i in allTags) { 
      if (allTags[i] == sampleTags[j]) found = true
    }
    if (!found) {
      sampleTagsToAdd.push (sampleTags[j])
    }
  }
  
  if (sampleTagsToAdd.length > 0) {
    if ($ ('#all-tags').val ()) allTagsLinks.push ('<span><i>или</i></span>')
    allTagsLinks.push ('<span><i>например</i></span>')
    for (var j in sampleTagsToAdd) {
      allTagsLinks.push (
        '<a href="#" class="dashed e2-tag-autoinsertable">' + sampleTagsToAdd[j] + '</a>'
      )
    }
  }
  
  
  allTagsLinks = allTagsLinks.join ('<span>, </span>')

  var $tm = $ ('#tags-menu')
  $tm.hide ().html (allTagsLinks)
  setTimeout (function () { $tm.slideDown (1000) }, 500)


  e2TagHighlight = function (event) {
  
    var typedTags = $ ('#tags').val ().replace (/\</g, '&lt;').replace (/\>/g, '&gt;')
    if (typedTags != oldTypedTags) {
      var allTagsLinksHighlit = allTagsLinks
      oldTypedTags = typedTags
      typedTags = typedTags.toLowerCase ().replace (/^ */, '').replace (/ *$/, '').split (/ *\, */)
      $ ('#tags-menu a').each (function () {
        var highlightMe = false, disableMe = false
        for (var i in typedTags) if (typedTags[i].toLowerCase ().length > 0) {
          if ($ (this).text ().toLowerCase ().indexOf (typedTags[i].toLowerCase ()) == 0) {
            highlightMe = true
          }
          if ($ (this).text ().toLowerCase () == typedTags[i].toLowerCase ()) {
            disableMe = true
          }
        }
        if (disableMe) {
          $ (this).addClass ('e2-tag-already-added')
          $ (this).removeClass ('e2-highlight')
        } else {
          $ (this).removeClass ('e2-tag-already-added')
          if (highlightMe) $ (this).addClass ('e2-highlight')
          else $ (this).removeClass ('e2-highlight')
        }
      })
      $ ('#tags-menu span').each (function () {
        if (
          $ (this).prev ().hasClass ('e2-highlight') &&  $ (this).next ().hasClass ('e2-highlight')
        ) {
          $ (this).addClass ('e2-highlight')
        } else {
          $ (this).removeClass ('e2-highlight')
        }
      })
    }
  }
  
  e2TagHighlight ()
  
  $ ('.e2-tag-autoinsertable').click (function () {
    what = $ (this).text ()
    var added = 0
    var iwhat = what.toLowerCase ()
    typedTags = $ ('#tags').val ()
    typedTags = typedTags.replace (/^ */, '').replace (/ *$/, '').split (/ *\, */)
    for (var i in typedTags) {
      if (iwhat.indexOf (typedTags[i].toLowerCase ()) > -1) {
        typedTags[i] = what
        added = 1
        break
      }
    }
    if (added) {
      $ ('#tags').val (typedTags.join (', '))
    } else {
      $ ('#tags').val (
        $ ('#tags').val () + (($ ('#tags').val () == '')? (what) : (', ' + what))
      )
    }
    e2TagHighlight ()
    return false
  })
  
  $ ('#tags').keyup (e2TagHighlight)






var matchedPos = 0, matchedPosBefore = -1

e2_autoc = function (event) {

  d_typed_k = document.getElementById ('tags')
  if (window.event) event = window.event
  var et = (event? event.type : 'keydown')
  var txtin = '', txtb4 = '', txtaf = '', rng
  if (document.selection) {
    rng = document.selection.createRange ()
    txtin = rng.text
    rng.moveEnd ('character', -rng.text.length)
    rng.moveStart ('character', -d_typed_k.value.length)
    txtb4 = rng.text
    rng = document.selection.createRange ()
    rng.moveStart ('character', rng.text.length)
    rng.moveEnd ('character', d_typed_k.value.length)
    txtaf = rng.text
  } else
  if (d_typed_k.selectionStart && d_typed_k.selectionEnd) {
    txtin = d_typed_k.value.substr (d_typed_k.selectionStart, d_typed_k.selectionEnd - d_typed_k.selectionStart)
    txtb4 = d_typed_k.value.substr (0, d_typed_k.selectionStart)
    txtaf = d_typed_k.value.substr (d_typed_k.selectionEnd)
  }
//  if (txtb4 == null) return
//				alert (txtb4 + '] ' + et + ' '  + event.which)
  txtb4 = txtb4.substr (txtb4.lastIndexOf (',') + 1).replace (/^( *)/, '')
  txtaf = txtaf.replace (/^( *)/, '')
  if (txtb4 != '') {

    // find matching words
    matchedWords = []
		for (var k in allTags) {
			name = allTags[k]
			if (name.match (new RegExp ('^' + txtb4, 'i'))) {
        matchedWords.push (name)
			}
		}

    // if found, autocomplete with first of them
    if (matchedWords.length > 0) {
    
      matchedPosBefore = matchedPos

      if ('keydown' == et && 40 == event.keyCode) {
        ++ matchedPos
        event.preventDefault ()
      }
      if ('keydown' == et && 38 == event.keyCode) {
        -- matchedPos
        event.preventDefault ()
      }

      if (matchedPos < 0) matchedPos = matchedWords.length - 1
      if (matchedPos > matchedWords.length - 1) matchedPos = 0
      
      name = matchedWords[matchedPos]

      matchNumChanged = (('keydown' == et) && (matchedPosBefore != matchedPos))

      if (document.selection) {
        rng = document.selection.createRange ()
      }

      /* Mash */
      //if ((window.opera? 'keypress' : 'keydown') == et && 8 == event.keyCode) {
      if ('keydown' == et && 8 == event.keyCode) {
        if (typeof (d_typed_k.selectionStart) == 'undefined' && rng.text == autoc) {
          rng.moveStart ('character', -1)
          rng.select ()
          rng.text = ''
        } else
        if (d_typed_k.value.substr (d_typed_k.selectionStart, d_typed_k.selectionEnd - d_typed_k.selectionStart) == autoc) {
          d_typed_k.selectionStart -= 1
        }
      }
      /* /Mash */
      
            		//document.title = et + '/' + event.keyCode
            		// 40 и 38 - коды стрелок вверх и вниз

      if ('keydown' == et && 27 == event.keyCode) {
        if (rng) {
          rng.text = ''
        } else
        if (d_typed_k.selectionStart && d_typed_k.selectionEnd) {
          d_typed_k.value = d_typed_k.value.substr (0, d_typed_k.selectionStart) + d_typed_k.value.substr (d_typed_k.selectionEnd) 
        }
      }

      if (event.keyIdentifier) { // Safari
        uNumber = event.keyIdentifier.replace ('U+', '')
        if (event.keyIdentifier != uNumber) {
          theKey = eval ('"\\u' + event.keyIdentifier.replace ('U+', '') +'"')
        } else {
          theKey = event.keyIdentifier
        }
      } else if (event.which) { // Opera
        theKey = String.fromCharCode (event.which)
      } else {
        theKey = String.fromCharCode (event.keyCode)
      }
      
      //alert (theKey + ' ' + et + ' '  + event.which)
      //		document.title = name + ' (' + (theKey == 'м')
      // никто не понимает, почему тут не работает буква т
      // например, печатаем м (Мак) а (Мак) т (должно превратиться в математику, но нет!)


      if (matchNumChanged || ('keyup' == et && !event.ctrlKey && !event.altKey && theKey.match (/(\w|[а-я]|\d|\-)+/i) && !txtin)) {

        autoc = name.substr (txtb4.length)
        if (txtaf != '') if (txtaf.charAt (0) != ',') autoc += ', '
        if (rng) {
          rng.text = autoc
          rng.moveStart ('character', -autoc.length)
          rng.select ()
        } else
        if (d_typed_k.selectionStart && d_typed_k.selectionEnd) {
          var old_ss = d_typed_k.selectionStart, old_se = d_typed_k.selectionEnd
          d_typed_k.value = (
            d_typed_k.value.substr (0, d_typed_k.selectionStart)
            //d_typed_k.value.substr (0, d_typed_k.selectionEnd)
            + autoc
            + d_typed_k.value.substr (d_typed_k.selectionEnd)
          )
          d_typed_k.selectionStart = old_ss
          d_typed_k.selectionEnd = old_se + autoc.length
        }
      }

      return true
    }


	}
}   


  $ ('#tags').keydown (e2_autoc)
  $ ('#tags').keyup (e2_autoc)

})