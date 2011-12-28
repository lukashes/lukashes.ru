var swfId = 'e2WeboramaFlashPlayerInstance'
var infoId = 'e2WeboramaFlashPlayerConsole'
var $playingThing = null

var fileProgress = {}

var onFlashReady = function () {
  $progressIndicator = $ ('<div>')
    .attr ('class', 'player-progress-indicator')
    .css ({
      'position': 'absolute',
      'width': '0',
      'height': '100%',
      'top': '0',
      'left': '0',
      //'background': '#000',
      'border-bottom': '#33f 1px solid',
      //'opacity': '1'
    })

  $progressBar = $ ('<div>')
    .attr ('class', 'player-progress-bar')
    .css ({
      'position': 'absolute',
      'width': '100%',
      'height': '1px',
      'top': '100%',
      'left': '0',
      //'background': '#ccc',
      'border-bottom': '#ccc 1px dashed',
      //'opacity': '0'
      'display': 'none'
    })
    .append ($progressIndicator)

  $playerDiv = $ ('.e2-inline-player')
    .attr ('class', 'dashed')
    .css ('position', 'relative')
    .append ($progressBar)
    .click (function () {
      if (getPlayerSWF ()) {
        state = getPlayerSWF ().getState ()
        fileUrlPrev = ''
        if ($playingThing) {
          fileUrlPrev = $playingThing.attr ('href')
          getPlayerSWF ().stopFile ()
          $playingThing.find ('.player-progress-bar').hide ()
          $playingThing = null
        }
        fileUrl = $ (this).attr ('href')
        if ((fileUrl != fileUrlPrev) || (state == 0)) {
          getPlayerSWF ().playFile (fileUrl, fileProgress[fileUrl])
          $playingThing = $ (this)
          $playingThing.find ('.player-progress-bar').show ()
        } else {
        //if (state == 1) {
        }
        return false
      }
    })

    /*
    .dblclick (function () {
      getPlayerSWF ().playFile ($ (this).attr ('href'), 0)
    })
    */
}

var onProgress = function (fileUrl, position) {

  fileProgress[fileUrl] = position;
  length = 100 * 1000
  maxWidth = $playingThing.find ('.player-progress-bar').width ()
  //$playingThing.find ('.player-progress-indicator').width (position/length*maxWidth + 'px')
  //document.title = position / l
  
}


var onComplete = function (fileUrl) {
/*
  var infoDiv = document.getElementById(infoId);
  infoDiv.innerHTML += "<br />" + "onComplete(): " + fileUrl;
  
  fileProgress[fileUrl] = 0;
  */
  $playingThing.find ('.player-progress-indicator').width (0)
  $playingThing.find ('.player-progress-bar').hide ()
}

var onStateChange = function (stateId) {
/*
  var stateDiv = document.getElementById("state");
  stateDiv.innerHTML = "onStateChange(): " + stateId + ", <strong>progress = " + getPlayerProgress() + "</strong>";
  */
}

var getPlayerState = function () {
  var playerState = document.getElementById("playerState");
  playerState.innerHTML = "getPlayerState(): " + getPlayerSWF().getState();
}

var getPlayerSWF = function () {
  if (navigator.appName.toLowerCase().indexOf("microsoft") == -1) {
    return document[swfId];
  } else {
    return window[swfId];
  }
}

/*
var play = function (fileUrl) {
  getPlayerSWF ().playFile (fileUrl, fileProgress[fileUrl])
}
*/

var pause = function () {
  getPlayerSWF().pause();
}

var stop = function () {
  getPlayerSWF().stopFile();
}

var setVolume = function (value) {
  getPlayerSWF().setVolume(value);
}


var onId3 = function (fileUrl, objectID3) {
  var info = "onId3(): ID3 recieved from file '"+fileUrl+"': "+typeof(objectID3)+" {<br/>";
  var tab = "&nbsp;&nbsp;&nbsp;&nbsp;";
  if (objectID3) {
    for (var name in objectID3) {
      info += tab + name + ": " + objectID3[name] + "<br/>";
    }
  }
  
  info += "}"+"<br/>";
  
  var infoDiv = document.getElementById(infoId);
  infoDiv.innerHTML += "<br/>" + info;
}

var onOpen = function (fileUrl) {
  var infoDiv = document.getElementById(infoId);
  infoDiv.innerHTML += "<br/>" + "onOpen(): " + "file '" + fileUrl + "' successfully opened";
}

var onBuffering = function (fileUrl, isBuffering) {
  var buffering = document.getElementById("buffering");
  buffering.innerHTML = new Date().getTime() + " - onBuffering("+fileUrl+", "+isBuffering+")";
}


var onFileError = function (fileUrl, errorInfo) {
  var infoDiv = document.getElementById(infoId);
  infoDiv.innerHTML += "<br/>" + "onFileError(): " + errorInfo;
}

var onInitError = function (errorCode, errorMessage) {
  var info = document.getElementById(infoId);
  info.innerHTML += "<br/>Что-то сломалось.<br/>"+errorCode+"<br/>"+errorMessage;
}

var getPlayerProgress = function () {
  var playerProgress = document.getElementById("playerProgress");
  playerProgress.innerHTML = "getPlayerProgress(): " + getPlayerSWF().getProgress();
}

var getPlayerBuffering = function () {
  var playerBuffering = document.getElementById("playerBuffering");
  playerBuffering.innerHTML = "getPlayerBuffering(): " + getPlayerSWF().getBuffering();
}

if ($) $ (function () {

  $ ('<div>').attr ('id','e2WeboramaFlashPlayerPlaceholder').appendTo ('body')

  // все параметры
  var flashVars = {
    // debug: "1", // необязательный, по умолчанию = 0
    
    getState: "getState", // JS -> Flash
    onStateChange: "onStateChange", // Flash -> JS
    
    playFile: "playFile", // JS -> Flash
    pause: "pause",  // JS -> Flash
    stop: "stopFile",    // JS -> Flash
    getProgress: "getProgress",  // JS -> Flash необязательный параметр. нужен только в том случае, если джаваскрипту придется самому узнавать состояние трека.
    getBuffering: "getBuffering",  // JS -> Flash необязательный параметр. нужен только в том случае, если джаваскрипту придется самому узнавать состояние трека.
    setVolume: "setVolume",    // JS -> Flash
    
    progressTimer: 200, // в милисекундах. если 0, то флэш автоматически апдейты (onProgress и onBuffering) не вызывает.
    
    onReady: "onFlashReady",         // Flash -> JS
    onOpen: "onOpen",         // Flash -> JS
    onProgress: "onProgress", // Flash -> JS
    onBuffering: "onBuffering", // Flash -> JS
    onComplete: "onComplete", // Flash -> JS
    onFileError: "onFileError", // Flash -> JS
    onInitError: "onInitError", // Flash -> JS
    onId3: "onId3" // Flash -> JS
  }
  
  //var attributes = { bgcolor: "#cccccc", id: swfId, name: swfId }
  
  // обязательно allowScriptAccess="always"
  var params = { allowScriptAccess: "always" }

  swfobject.embedSWF (
    "system/theme/flash/hidden-player.swf", "e2WeboramaFlashPlayerPlaceholder",
    "0", "0", "9.0.0", "", flashVars, params,
    { bgcolor: "#cccccc", id: swfId, name: swfId }
  )

})
