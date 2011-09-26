<?php

  /**
  * Calliope Wiki Formatter
  * @version 0.73 beta
  * @author Konstatnin Savelyev <inferno@bugz.ru>
  */  

  include_once('WikiModifiers.php');
  
  define ('WF_FULL_MODE',   '0');
  define ('WF_SIMPLE_MODE', '1');
  define ('WF_BRIEF_MODE',  '2');
  define ('WF_AS_IS_MODE',  '3');
  
/*
  function arrayDump($array)
  {
    $content = print_r($array, true);
    $content = str_replace("\n", '<br />', $content);
    $content = str_replace(" ", '&nbsp;', $content);
    $content = str_replace('Array', '<b><font color=#009900>Array</font></b>', $content);
    $content = str_replace('=>', '<b><font color=#009900>=></font></b>', $content);
    $content = preg_replace('#\[[^\]]+\]#is', '<b><font color=#FF0000>\\0</font></b>', $content);
    echo('<code>'.$content.'</code>');
  }
  */
  
  class WikiFormatter extends WikiModifiers                                
  {

     /**
     * ����������� ������
     */
     function WikiFormatter($settings = NULL)
     {
       if ($settings) $this->configure($settings);
       
       $this->imgExtensions = implode('|',$this->imgExtensions);

       # ��������� ���� ���������

       #/# if ($this->settings['enableAutoAcronymEngine'] && $this->settings['enableAcronym']) $this->loadAcronymBase();
     }

#/# 
/*

     // ����� ��������� ���� ������ ���������
     function loadAcronymBase()
     {
       $this->acronyms = unserialize(@file_get_contents($this->settings['acronymBase']));
       $this->backAcronyms = $this->acronyms;
     }

     // ����� ��������� ��������������� ������������� �������, ����������� ������������ ������ ���������
     function saveAcronymBase()
     {
       file_put_contents($this->settings['acronymBase'], serialize($this->acronyms));
     }
*/
#/#

     /**
     * ����� ����������� ��������� ������ �������
     */
     function configure($settings)
     {
       foreach ($settings as $index => $value) $this->settings[$index] = $value;
     }

     /**
     * ����� ���������� ���������� � ���������� �����������, ������ ����������� ���� ������@XXXxXXX@XXX
     */
     function isImage($href)
     {

       ##BUGBUG ����������� ��� ��� ��������
       if (preg_match('/^([^\\\\\/]*)\.(?:'.$this->imgExtensions.')((\@(\d+)x(\d+))?(\@(\w+))?)?$/is', $href, $found)) 
       {
          /*
         echo '<pre>';
         print_r ($found);
         echo '</pre>';
         */
         if (@$found[2] && $found[3]) 
         {
           if ($found[5]) $align = ' align="'.$found[5].'"';
           $image['size'] = ' width="'.$found[2].'" height="'.$found[3].'"'.$align.' ';
           $image['href'] = str_replace($found[1],'',$href);
         } else
         {
           $image['href'] = $href;
         };
         $image['boolean'] = TRUE;
       } else 
       {
         $image['boolean'] = FALSE;
       };
#       echo '<pre>';
#         print_r ($image);
#       echo '</pre>';
       return($image); 
     }


     function makeSafeHref ($string) {
       #$string = str_replace ('\'', '&apos;', $string);
       #$string = str_replace ('"', '&quot;', $string);
       $string = htmlspecialchars ($string);
       foreach (array ('http', 'https', 'ftp', 'ftps') as $protocol) {
         $protocol .= '://';
         if (strcasecmp ($protocol, substr ($string, 0, strlen ($protocol))) === 0) {
           return $string;
         }
       }
       if (@$string[0] == '/') {
         return 'http://'. $_SERVER['SERVER_NAME'] . $string;
       } else {
         return 'http://'. $string;
       }
     }

     /**
     * ����� ��������� wiki ������� � HTML
     */
     function cbCreateHref($found)
     {                  

       $found = str_replace ('&amp;', '&', $found);

       $first = $found[3];

       $found = explode (' ', ' '.$first, 5);
#       echo '<pre>';
#       print_r ($found);
#       echo '</pre>';
       $found = array_map("trim",$found);

       // �������, ����� ��� ��� �������� ��� ((���������))

       if (method_exists($this, 'm_'.$found[1])) 
       {
         return(@call_user_method('m_'.$found[1], $this, $found));
       };

       # AI
       $isImage = $this->isImage($found[1]);
       if ($isImage['boolean'])
       {
         # ��������, ������������ AI
         if ($this->settings['mode'] == WF_SIMPLE_MODE || $this->explCheck($found[1])) return($found[0]);
         $found[1] = $isImage['href'];  
         if ($this->isLocal($found[1])) {
           $img = $this->settings['localImgDir'].$found[1].$this->settings['localImgPostfix'];
         } else {
           #ILYABIRMAN:
           if (@$found[1]{0} == '/') $found[1] = 'http://'.$_SERVER['SERVER_NAME'].$found[1];
           #/ILYABIRMAN:
           $img = $found[1];
         }
         if ($found[2]) $alt = $this->implodeArray(array_splice($found, 2));
         if (empty ($alt)) $alt = $img;
         $compiledTag = '<img src="'.$img.'" alt="'.@htmlspecialchars ($alt).'"'.@$isImage['size'].' />';
       } else
       {                                                

         $isImage = $this->isImage($found[2]);
         if ($isImage['boolean'])
         { 
           # ������ �� ��������
           if ($this->settings['mode'] == WF_SIMPLE_MODE || $this->explCheck($found[1]) || $this->explCheck($found[2])) return($found[0]);
           $found[2] = $isImage['href']; 
           if ($this->isLocal($found[1])) 
             $img = $this->settings['localImgDir'].$found[2].$this->settings['localImgPostfix'];
           else {
             #ILYABIRMAN:
             if (@$found[2]{0} == '/') $found[2] = 'http://'.$_SERVER['SERVER_NAME'].$found[2];
             #/ILYABIRMAN:
             $img = $found[2];
           }
           if ($found[3]) $alt = $this->implodeArray(array_splice($found, 3));
           #ILYABIRMAN:
           $found[1] = $this->makeSafeHref ($found[1]);

           // � ������������ ������ <a rel="nofollow">
           if ($this->settings['mode'] == WF_SIMPLE_MODE) $relnofollow = ' rel="nofollow"';

           #/ILYABIRMAN:
           $compiledTag = '<a href="'.$found[1].'"'.@$relnofollow.'><img src="'.$img.'" border="0" alt="'.@htmlspecialchars ($alt).'"'.@$isImage['size'].' /></a>';
         } else
         { 
#return $found[1];           
           # ������ ������
           if (!$this->explCheck($found[1]) && (!$this->isLocal($found[1]) || strstr($found[1],"#"))) {
      #echo '<pre>';
      #print_r ($found);
      #echo '</pre>';
             #ILYABIRMAN:
             
             $found[1] = $this->makeSafeHref ($found[1]);
             #/ILYABIRMAN:

             if ($this->settings['enableTagIcons'] && $this->isOuterURL($found[1])) {
               $urlImg = $this->settings['urlIcon'];
             };

             if ($this->settings['outerUrlInNewWindow']) {
               $target = ' target="_blank"';
             }

             if ($found[2]) $hrefName = $this->implodeArray(array_splice($found, 2)); else $hrefName = $found[1];

             #ILYABIRMAN:
             if ($this->isOuterURL($found[1])) {
               if ($this->settings['linkredirValue']) {
                 $countclicks = ' linkredir="'. $this->settings['linkredirValue'] .'"';
               }
               
             }
             #/ILYABIRMAN


             #ILYABIRMAN:
             // � ������������ ������ <a rel="nofollow">
             if ($this->settings['mode'] == WF_SIMPLE_MODE) $relnofollow = ' rel="nofollow"';
             #/ILYABIRMAN

             $compiledTag = '<a href="'.$found[1].'"'.@$relnofollow.@$target.@$countclicks.'>'.@$urlImg.$hrefName.'</a>';
           } else {
             $compiledTag = $found[0];
           };
         };
       };
       return($compiledTag);
     }

     function isOuterURL($url)
     {
       if (strstr($url, 'http://www.bugz.ru') || $url[0]=='/' || !strstr($url, '://')) return(false); else return(true);
     }

     /**
     * ����� ��������� "\" � ��������� ��������
     */
     function pregQuote($regexp, $quotedChars)
     {
       for ($i=0;$i!=strlen($quotedChars);$i++)
       {
         $regexp = str_replace($quotedChars[$i],"\\".$quotedChars[$i],$regexp);
       };
       return($regexp);
     }

    /**
    * ����� ���������� ���������� ������ � ������, ���� ��� ������� �������
    */
    function cbShrinkLongHref($result)
    {
      if ($this->explCheck($result[0])) return($result[0]);
      $result[3] = $result[2];
      if ($this->settings['enableShrinkLongHref'])
      {
        $hrefSize = strlen($result[2]);
        $shrinkSize = $hrefSize-$this->settings['hrefSize'];
        if ($shrinkSize>0)
        {
          $result[3] = substr_replace($result[2],"&#133;",round($hrefSize/2-$shrinkSize/2),$shrinkSize);
        };
      };

      if ($this->settings['enableTagIcons']) {
        $urlImg = $this->settings['urlIcon'];
      };

      $result[2] = $this->makeSafeHref ($result[2]);

      if ($this->isOuterURL($result[2])) 
      {
        #$countclicks = ' countclicks="true"';
        $countclicks = ' linkredir="'. $this->settings['extLinkHrefPrefix'] .'"';
        if ($this->settings['outerUrlInNewWindow']) $target = ' target="_blank"';
      };

      // � ������������ ������ <a rel="nofollow">
      if ($this->settings['mode'] == WF_SIMPLE_MODE) $relnofollow = ' rel="nofollow"';

      return($result[1].'<a href="'.$result[2].'"'.@$relnofollow.@$target.@$countclicks.'>'.@$urlImg.$result[3].'</a>');
    }

    /**
    * ����� ��������� HTML ���� � ����� ��� ������������ �������������
    */
    function saveTag($found)
    {
      global $tagStack;
      $tagStack[] = $found[1];
      return("\x4_".(sizeof($tagStack)-1)."_\x4");
    }

    function saveASIS($found)
    {
      global $asisTagStack;
      $asisTagStack[] = htmlspecialchars ($found[2], ENT_NOQUOTES);
      return(substr($found[1],2)."\x2_".(sizeof($asisTagStack)-1)."_\x2".substr($found[3],2));
    }

    /**
    * ����� ��������� ((html)) ���� � ����� ��� ������������ �������������
    */
    function saveHTML($found)
    {
      /* was before v1251:
      global $htmlTagStack;
      if ($this->settings['mode'] != WF_SIMPLE_MODE)
      {
        if ( in_array($found[1][0], array('<','&')) ) 
          $tag = $this->implodeArray(array_splice($found, 1));
        else
          $tag = '<'.$found[1].'>'.$found[2].'</'.$found[1].'>';
      } else
      {
        $tar = htmlspecialchars ($found[0], ENT_NOQUOTES);
      }
      $htmlTagStack[] = $tag;
      return("\x1_".(sizeof($htmlTagStack)-1)."_\x1");
      */
      global $htmlTagStack;
#                 print_r ($found);  #         die;  
      if ($this->settings['mode'] != WF_SIMPLE_MODE)
      {
        if ( in_array($found[3]{0}, array('<','&')) ) 
          $tag = $this->implodeArray(array_splice($found, 3));
        else
          $tag = '<'.$found[3].'>'.$found[4].'</'.$found[3].'>';
      } else
      {
        // ��� ���� ��� ��� �������� � v1871; ������ ��� ������ htmlspecialchars
        if (preg_match ('/\&([a-zA-Z0-9\#]+)\;/', $found[3]))  {
          //print_r ($found[3]);
          $tag = $found[3];
        } else {
          $tag = htmlspecialchars ($found[0], ENT_NOQUOTES);
        }
      }
      $htmlTagStack[] = $tag;
      #echo $tag;
        #         print_r ($this->htmlTagStack);  #         die;  
      return("\x1_".(sizeof($htmlTagStack)-1)."_\x1");
    }

    /**
    * ����� ��������� %% ��� � ����� ��� ������������ �������������
    */
    function saveCodes($found)
    {
      global $codeTagStack;
      $found[2] = htmlspecialchars ($found[2], ENT_NOQUOTES);
      $found[2] = str_replace(' ','&nbsp;', $found[2]);
      $found[2] = str_replace("\r\n",'<br />', $found[2]);
      $found[2] = str_replace("\n",'<br />', $found[2]);
      $codeTagStack[] = '<code>'.$found[2].'</code>';
      return(substr($found[1],2)."\x3_".(sizeof($codeTagStack)-1)."_\x3".substr($found[3],2));
    }
     /**
     * ����� ������ ��������� �������
     */
     /*
     function htmlQuote($text)
     {
       $text = str_replace ('&', '&amp;', $text);  
       $text = str_replace ('<', '&lt;', $text); 
       $text = str_replace ('>', '&gt;', $text); 
       return($text);
     }
     */

     function cbGetHeaderTag ($found)
    {
      $headerSize = strlen ($found[1]) + $this->settings['headersStartWith'];
      return('<h'.$headerSize.'>'.trim($found[2]).'</h'.$headerSize.'>');
    }


     function cbSaveFoundAcronym($found)
     {
       $found = array_map("trim", $found);
       $this->acronyms[$found[1]] = $found[2];
       return($found[1]);
     }

     function cbIsStringNotEmpty($item)
     {
       if ($item) return(true); else return(false);
     }

     /*
     function searchAcronym($content)
     {
       $content = preg_replace_callback('#\(\? *(.+?) *== *(.*?)?\?\)#is',array ($this, 'cbSaveFoundAcronym') , $content);
       if ($this->acronyms)
       $this->acronyms = array_filter ($this->acronyms, array($this, 'cbIsStringNotEmpty'));
       
       # ���� � �������� ��������, �������� � ����
       if ($this->acronyms)
       foreach ($this->acronyms as $acronymName => $acronymTitle)
       {
         # ��������� ��� -- ��������� ���, ���� ��������� �����, ������� � ���������� ����� ��������� 
         # ����� ��������� � ����� ��������� ������� �������� � ����
         # ����� ����������� ����� ���������, �� ��� ����� ����� ��������, ��� ��� ���� ��� ��� ����.
         #
         # �������, ���� ���������, ��� ���������
         $content = str_replace($acronymName, '<acronym title="'.$acronymTitle.'">'.$acronymName.'</acronym>', $content);
       };
       return($content);
     }
     */

     /**
     * ����� �������� ���������� � �������� ������
     */
     function getListItemInfo($listItem)
     {
#       $listItem = str_replace('$',"\x5", $listItem);
#       preg_match ("/( +)(\*|\-|\d+\.|\#\.|a\.|A\.|i\.|I\.) *([^$]*)/is", $listItem, $found);
#       $found[3] = str_replace("\x5", '$', $found[3]);

#echo '<hr /><pre>';
#print_r ($listItem);
#echo '</pre><hr />';


       preg_match ("/( +)(\*|\-|\d+\.|\#\.|a\.|A\.|i\.|I\.) (.*)/is", $listItem, $found);
       
       $start = '';
       $type = '';
       $found[2] = rtrim ($found[2], '.');
       if ($found[2] == '*' or $found[2] == '-') {
         $tag = 'ul'; 
       } else {
         $tag = 'ol';
         if (is_numeric ($found[2])) {
           $start = $found[2];
         } elseif ($found[2] == '#') {
           $start = $this->latest_list_number + 1;
           $type = '';
         } else {
           $type = $found[2];
         }
       };
       return(array ('size' => strlen($found[1]), 'tag' => $tag, 'type' => $type, 'item' => rtrim($found[3]), 'start' => $start));
     }

     /**
     * ����� ��������������� ������ �� Wiki ������� � HTML 
     */
     function cbListReplace($found)
     {
#echo '<hr /><pre>';
#print_r ($found[0]);
#echo '</pre><hr />';
       #$list = explode("\r\n", rtrim($found[0]));
       $list = explode ("\r\n", trim ($found[0], "\r\n"));
//       $list = explode ("\n", trim ($found[0], "\n"));
       $first = $this->getListItemInfo($list[0]);
       $firstText = $first['item'];
       if (@$first['type']) $type = ' type="'. $first['type'] .'"'; else $type = '';
       if (@$first['start']) $start = ' start="'. $first['start'] .'"'; else $start = '';
       
       if ($start) {
         $this->latest_list_number = $first['start'] + sizeof ($list) - 1;
       } else {
         $this->latest_list_number += sizeof($list);
       }

       $stack[] = '</'.$first['tag'].'>';
       $first = '<'.$first['tag'].$type.$start.'>';
       if (sizeof($list) == 1)
       {
         return($first.'<li>'.$firstText.'</li>'.$stack[0]);
       };
       for ($i=0;$i!=sizeof($list)-1;$i++)
       {
         $currentItem = $this->getListItemInfo($list[$i]);
         $nextItem = $this->getListItemInfo($list[$i+1]);
         # ��������
         if ($nextItem['size']>$currentItem['size']) 
         {
           if ($nextItem['type']) $type = ' type="'.$nextItem['type'].'"'; else $type = '';
           $list[$i] = '<li>'.$currentItem['item'].'</li><'.$nextItem['tag'].$type.'>';
           $stack[] = '</'.$nextItem['tag'].'>';
         } else if ($nextItem['size']<$currentItem['size'])
         {
           $shift = ($currentItem['size']-$nextItem['size'])/2;
           for ($j=0;$j!=$shift;$j++)
           {
             @$tags.= $stack[sizeof($stack)-1];
             array_pop($stack);
           };
           $list[$i] = '<li>'.$currentItem['item'].'</li>'.$tags;
           $tags = '';
         } else
         {
           $list[$i] = '<li>'.$currentItem['item'].'</li>';
         };
       };  
       # ��������� �������
       arsort($stack);
       $list[$i] = '<li>'.$nextItem['item'].'</li>';
       if ($stack) $stack = implode('',$stack);
       $list = $first.implode('', $list).$stack;
       return($list);
     }
     
    function cbParseTable($found)
    {
      // $found[0] = trim ($found[0]);
      #ILYABIRMAN:
      # ��� ����� �� ��������� <br />, ������� ����� �������, �� ������������
      /*
      $found[0] = preg_replace('#^\|\|#m', '<tr><td>', $found[0]);
      $found[0] = preg_replace('#\|\|\r\n#s', '</td></tr>', $found[0]);
      $found[0] = preg_replace('#\|\|#m', '</td><td>', $found[0]);
      */
#      $found[0] = preg_replace('/^\|\|/sm','<tr><td>', ltrim($found[0]));



      $found[0] = trim ($found[0]);
      $found[0] = preg_replace ('/^\|\|/sm','<tr><td>', $found[0]); 
      $found[0] = preg_replace ('/(\|\|)?(\r?\n|$)/','</td></tr>', $found[0]); 
      $found[0] = preg_replace ('#\|\|#', '</td><td>', $found[0]);
      return('<table class="'.$this->settings['simpleTableCSSClass'].'">'.$found[0].'</table>');


      #return('<div style="color: #f00">('.$found[0].')</div>');


    } 
     /**
     * ����� ����������� Wiki �������� � HTML
     */
     function Wiki2HTML($content)
     {
       global $tagStack, $codeTagStack, $asisTagStack, $htmlTagStack;
       $tagStack = $codeTagStack = $asisTagStack = $htmlTagStack = array ();
       
       # ���� ���������� ����� ������ WF_AS_IS_MODE, ������ �� ������ � ����� 
       # �� ���������� ������ ����� 
       if ($this->settings['mode'] == WF_AS_IS_MODE) return($content);

       # ��������� ��� ��� ����� ""..."" � �����
       # ���� ��� ����� ����� =""..."", ��� ������������
       $content = preg_replace_callback('#((?<!=)"{2,})(?! )(.+?)(?<! )("{2,})#is', array ($this, 'saveASIS'), $content);

       /*
       # ������������ ��� ((cut ...))
       if (in_array($this->settings['mode'], array (WF_BRIEF_MODE, WF_FULL_MODE)))
         $content = preg_replace_callback (
           "/(?:\(\(|\[\[) *cut *(.*?)(?:\)\)|\]\])(.*)/is",
           array ($this, 'cbCutMe'),
           $content
         );
       */
       
       # ��������� � ������������ ��� ((html ...))
       $content = preg_replace_callback (

#         '#  (?:  (\(\()  |  (\[\[)  )   \s* html \s* ([^ \s (?(1) \) ) (?(2) \] ) ]+) \s* (.*?)  \s* (?(1) \)\) )  (?(2) \]\] )  #isx',
         // v1487: ���� ^^^ ����� vvv
         '#  (?:  (\(\()  |  (\[\[)  )     \s* html \s* (.*?) \s*    (?(1) \)\) )  (?(2) \]\] )  #isx',

         
         #         '#(?:\(\(|\[\[) *html *([^ )]+) *(.*?)(?:\)\)|\]\])#is',
         array ($this, 'saveHTML'),
         $content
       );


       
       # ��������� ������� ���� ����� %% � �����
       $content = preg_replace_callback('#(%{2,})(?! )(.+?)(?<! )(%{2,})#is', array ($this, 'saveCodes'), $content);

       # ������������ "���������� ������"
#       $content = preg_replace_callback('#(?:\(\(|\[\[)( *[^ ]+) *([^ ]*) *([^ ]*) *(.*)(?:\)\)|\]\])#is', array ($this, 'cbCreateHref'), $content);
#  �������� ������:



       # ����� ���� ���������� HTML
       $content = htmlspecialchars ($content, ENT_NOQUOTES);

       

       //
       //  �� ��������� ������ ���������� ������� ������
       //

       $content = preg_replace_callback(

         '#  (?:  (\(\()  |  (\[\[)  )     (.*?)     (?(1) \)\) )  (?(2) \]\] )  #isx',

#         '#(?:\(\(|\[\[)(.*?)(?:\)\)|\]\])#is',

#         '#(?:\(\(|\[\[)( *[^ )]+) *([^ )]*) *([^ )]*) *([^)]*)(?:\)\)|\]\])#is',
         array ($this, 'cbCreateHref'),
         $content
       );




       # ������������ ������� ������ http://...
       $content = preg_replace_callback('#(\s|^)((?:http|https|ftp|ed2k)\:\/\/[\w\d\#\.\/&=%-_!\?\@\*]+)#is', array ($this, 'cbShrinkLongHref'),$content);
       
       //
       //  �������
       //

       if ($this->settings['enableTables']) { 
         $content = preg_replace_callback (
           '#((?<=^|\n)\|\|.+?(\r?\n|$))+#',
           array ($this, 'cbParseTable'),
           $content
         ); 

       }; 

       # ��������� HTML ����
       $content = preg_replace_callback('#(<[^>]+>)#is', array ($this, 'saveTag'), $content);
       
       # ������������ ����������
       
       # ����������� <hr />
#       if ($this->settings['enableHr']) $content = preg_replace('#(\r\n|^)---(?:\r\n|$)#s','\\1<hr />', $content);
       if ($this->settings['enableHr']) $content = preg_replace('#(\n|^)---(?:\n|$)#s','\\1<hr />', $content);
       
       # ������������ ������ 
       if ($this->settings['enableList'])  
       {                                     
         $content = preg_replace_callback (
           "/(?:\r\n|^)((?:  )+(?:\*|\-|\d+\.|\#\.|a\.|A\.|i\.|I\.) .*?(?:\r\n|$))+(?:\r\n)*/ism",
           #"/((?:  )+(?:\*|\-|\d+\.|\#\.|a\.|A\.|i\.|I\.) .*?(?:\r\n|$))+/ism",
           #"/((?:  )+(?:\*|\-|\d+\.|\#\.|a\.|A\.|i\.|I\.) *.*?(?:\r\n|$))+(?:\r\n)*/ism",
           array ($this, 'cbListReplace'), 
           $content
         );
         #$content = preg_replace_callback('#(  +(?:\*|a|A|\d|i|I)\.? *.*?(?:\r\n|$))+(?:\r\n)*#is',array ($this, 'cbListReplace'), $content);
#         $content = preg_replace_callback('#^(  +(?:\*|a|A|\d|i|I)\.? *.*?(?:\n|$))+(?:\n)*#mis', array ($this, 'cbListReplace'), $content); 
   
         # ������� �������� ������� ����� ������� 
         $content = str_replace(array("</ul>\r\n", "</ul>\n"),'</ul>', $content); 
         $content = str_replace(array("</ol>\r\n", "</ol>\n"),'</ol>', $content); 
         $content = str_replace(array("\r\n<ul>", "\n<ul>"),'<ul>', $content); 
         $content = str_replace(array("\r\n<ol>", "\n<ol>"),'<ol>', $content); 
       } 

       # ��������
       if ($this->settings['enableAcronym']) $content = $this->searchAcronym($content);

       # ���������
       if ($this->settings['enableHeaders']) $content = preg_replace_callback ('#(?:\r\n)*=(={1,5})(.+?)=={1,6}(?:\r\n)*#s', array ($this, 'cbGetHeaderTag'), $content);
#       if ($this->settings['enableHeaders']) $content = preg_replace_callback ('#(?:\n)*=(={1,5})(.+?)=={1,6}(?:\n)*#s', array ($this, 'cbGetHeaderTag'), $content);
       
       # ����������
       foreach ($this->replace as $index => $value) 
       { 
         $quotedValue = preg_quote($index, '#'); 
         $content = preg_replace_callback('#(?<!:)('.$quotedValue.'{2,})(?!\s)(.+?)(?<!\s)('.$quotedValue.'{2,})#s',array ($this, 'cbReplaceFormat'), $content); 
         #$content = preg_replace_callback('#(?<!:)('.$quotedValue.'{2,})(?! )(.+?)(?<! )('.$quotedValue.'{2,})#is',array ($this, 'cbReplaceFormat'), $content); 
       }; 

       # ������� �������� ������� ����� ����� 
       $content = str_replace(array("</blockquote>\r\n\r\n", "</blockquote>\n\n", "</blockquote>\r\n", "</blockquote>\n"),'</blockquote>', $content); 
       $content = str_replace(array("\r\n\r\n<blockquote>", "\n\n<blockquote>", "\r\n<blockquote>", "\n<blockquote>"),'<blockquote>', $content); 

       # ������ ������� �������
       if ($this->settings['enableBr']) {
         $content = str_replace("\r\n",'<br />', $content);
         $content = str_replace("\n",'<br />', $content);
       }

       # ����������, ��� ��� ��������� �����
       $content = $this->retSavedElem("\x4", $tagStack, $content);
       $content = $this->retSavedElem("\x3", $codeTagStack, $content);
       $content = $this->retSavedElem("\x2", $asisTagStack, $content);
       $content = $this->retSavedElem("\x1", $htmlTagStack, $content);

       # ���� ��������� ���� ��������� ����������, ��������� ��
       if ($this->settings['enableAcronym'] && $this->settings['enableAutoAcronymEngine'] && $this->backAcronyms!=$this->acronyms ) $this->saveAcronymBase();

       # ������������� � </blockquote><br/>
       $content = str_replace('</blockquote><br />','</blockquote>', $content);
       $content = str_replace('<blockquote><br />','<blockquote>', $content);

       return($content);
     }

     /*
     function cbCutMe($found)
     {
       if ($this->settings['mode'] == WF_FULL_MODE) return($found[2]);
       if (!$found[1]) $found[1] = $this->settings['defaultCutText'];
       return($this->saveTag(array('','<a href="'.$this->settings['fullVersionURL'].'">'.$found[1].'</a>')));
     }
     */

     function cbReplaceFormat($found)
     {

       #echo '<pre>';
       #print_r ($found);
       #echo '</pre>';
       if (strlen ($found[1]) > 2) {
         $found[2] = substr ($found[1], 2) . $found[2];
         $found[1] = substr ($found[1], 0, 2);
       }
       if (strlen ($found[3]) > 2) {
         $found[2] = $found[2] . substr ($found[3], 0, -2);
         $found[3] = substr ($found[1], -2);
       }
       #echo '<pre>';
       #print_r ($found);
       #echo '</pre>';
       return (
         substr($found[1],2).'<'.$this->replace[$found[1][0]].'>'.$found[2].'</'.$this->replace[$found[1][0]].'>'.substr($found[3],2)
       );
     }

     function retSavedElem($delimiter, $stack, $content)
     {
       if ($stack)
       foreach ($stack as $index => $item)
       {
         $content = str_replace($delimiter.'_'.$index.'_'.$delimiter, $item, $content);
       };
       return($content);
     }

  }

?>