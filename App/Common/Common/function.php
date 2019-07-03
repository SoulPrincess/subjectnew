<?php
/**
 * 保存日志文件
 * $subject 菜单数据
 * $pid  父级id 初始值0
 * $uid  当前用户id （判断是否有权限）
 * @return array
 */
function saveLog($subject, $data, $file_name = 'request')
{
    $dir = 'temp_logs/';
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    return file_put_contents($dir . date('Ymd') . "-{$file_name}.log",
        '[' . date("Y-m-d H:i:s") . "]  " . $subject . var_export($data, true) . "\r\n", FILE_APPEND);
}
/**
 * 递归算法获取全部菜单
 * $data 菜单数据
 * $pid  父级id 初始值0
 * $uid  当前用户id （判断是否有权限）
 * @return array
 */

 function getMenu($data,$pid,$uid)
 {
     $auth = new \Think\Auth();
     $tree='';
     foreach ($data as $k=>$row) {
            if(!$auth->check($row['title'], $uid)){
                //判断权限
                unset($data[$k]);
            }else{
                if($row['pid']==$pid){
                    $row['children']=getMenu($data,$row['id'],$uid);
                    $tree[]=$row;
                }
            }
     }
     return $tree;
 }



/**
+----------------------------------------------------------
 * 判断是否有节点权限，如果无权限则输出disabled
 * 管理员不进行权限判断，无条件拥有全部权限
 * @return boolean true false【disabled】
+----------------------------------------------------------
 **/
function authcheck($rule){
    //获取UID
    $user = session('userInfo');
    //输出的样式属性
    $show_stype = "disabled style='pointer-events:none;background-color: rgb(192, 192, 192);'";
    //判断当前用户帐号是否是超级管理员
    if($user['admin_username'] == C('ADMIN_NAME')){
         //如果是，则直接返回真，不需要进行权限验证
        return true;
    }else{
        //如果没有权限。则输出禁用样式
        $auth = new \Think\Auth();
        if (!$auth->check(CONTROLLER_NAME.'/'.$rule,$user['admin_uid'])) {
            return $show_stype;
        }
    }
}
/**
 * 递归算法获取分类
 * $data 分类数据
 * $pid  父级id 初始值0
 * @return array
 */
function producttype($data,$pid)
{
    $tree='';
    foreach ($data as $k=>$row) {
        if($row['pid']==$pid){
            $row['children']=producttype($data,$row['id']);
            $tree[]=$row;
        }
    }
    return $tree;
}


/**
+----------------------------------------------------------
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
+----------------------------------------------------------
 **/
function is_login(){
    $user = session('userInfo');
    if (empty($user)) {
        return false;
    } else {
        return $user['admin_uid'];
    }
}




/**
+----------------------------------------------------------
* 获取真实IP地址，
* @return boolean true 返回IP
+----------------------------------------------------------
**/
function getIP(){
    static $realip;
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}

/**
 *  创建文件夹
 *  @param string $dir    文件夹路径
 *  @return boolean
 */

 function directory($dir){
    return is_dir ( $dir ) or directory(dirname( $dir )) and mkdir ( $dir , 0777);
}


/**
 *  锚文本
 *  @param string $str  内容
 *  @param array $anchors  锚文本
 *  @return string
 */
function setAnchors($str,$anchors)
{
    $rule = "/<img(.*?)>/";
    $str=htmlspecialchars_decode($str);
    //先把img排除掉,并且将其存为一个数组
    preg_match_all($rule,$str,$matches);
    $str_without_alt = preg_replace($rule, 'Its_Just_A_Mark',$str);

    //锚处理
    foreach ($anchors as $anchor) {
        //替换成新的内容
        $str=str_replace($anchor['original'],$anchor['newtext'],$str);
        $old = "/".$anchor['newtext']."(?!((?!<a\b)[\s\S])*<\/a>)/";
        $str = preg_replace($old, $anchor['newtext'], $str);
        $href = '<a href="'.$anchor['chained'].'" class = "seo-anchor" >'.$anchor['newtext'].'</a>';
        $str = preg_replace($old, $href, $str);
    }
    //将img加上去
    foreach ($matches[0] as $alt_content) {
        preg_replace('/Its_Just_A_Mark/',$alt_content,$str,1);
    }
    return $str;
}
//****************自动更新网站地图***************
function updata_sitemap($url, $priority, $lastmod, $changefreq,$file)
{
    $data='';
    $file_content = file($file);
    file_put_contents($file, join('', array_slice($file_content, 0, - 1)));
    $data .= "\t\t<url>" . PHP_EOL;
    $data .= "\t\t\t<loc>$url</loc>" . PHP_EOL;
    $data .= "\t\t\t<priority>$priority</priority>" . PHP_EOL;
    $data .= "\t\t\t<lastmod>$lastmod</lastmod>" . PHP_EOL;
    $data .= "\t\t\t<changefreq>$changefreq</changefreq>" . PHP_EOL;
    $data .= "\t\t</url>" . PHP_EOL;
    $data .= "\t</urlset>" . PHP_EOL;
    file_put_contents($file, $data,FILE_APPEND);
}

//获取模块下所有的控制器和方法写入到权限表
 function initperm() {
    $modules = array('Home');  //模块名称
    $i = 0;
    foreach ($modules as $module) {
        $all_controller = getController($module);
        foreach ($all_controller as $controller) {
            $all_action = getAction($module, $controller);
            foreach ($all_action as $action) {
                $controller = str_replace('Controller', '', $controller);
                $module_path = APP_PATH  . $module . '/View/'.$controller;  //控制器路径
                if (!is_dir($module_path)) {
                    continue;
                }else{
                    $func_path = APP_PATH  . $module . '/View/'.$controller.'/'.$action.'.html';//视图路径
                    if(file_exists($func_path)){
//                        $data[$i]['module'] = $module;
//                        $data[$i]['controller'] = $controller;
//                        $data[$i]['action'] = $action;
                        $data[$i]['url']=$module.'/'.$controller.'/'.$action;
                    }else{
                        continue;
                    }
                }
                //入库
//                if (!empty($module) && !empty($controller) && !empty($action)) {
//                    $rule_name = $module . '-' . $controller . '-' . $action;
//                    $rule = M()->table('tky_authrule')->where('name="' . strtolower($rule_name) . '"')->find();
//                    if (!$rule) {
//                        $idata = array();
//                        $idata['module'] = strtolower($module . '-' . $controller);
//                        $idata['type'] = "1";
//                        $idata['name'] = strtolower($rule_name);
//                        $idata['title'] = "";
//                        $idata['regex'] = "";
//                        $idata['status'] = "1";
//                        M()->table('tky_authrule')->add($idata);
//                    }
//                }

                $i++;
            }
        }
    }
    return $data;
}

//获取所有控制器名称
 function getController($module) {
    if (empty($module)) {
        return null;
    }
    $module_path = APP_PATH  . $module . '/controller/';  //控制器路径

    if (!is_dir($module_path)) {
        return null;
    }
    $module_path .= '*.php';
    $ary_files = glob($module_path);
    foreach ($ary_files as $file) {
        if (is_dir($file)) {
            continue;
        } else {
            $files[] = basename($file, '.class.php');
        }
    }
    return $files;
}

//获取所有方法名称
 function getAction($module, $controller) {
    if (empty($controller)) {
        return null;
    }
    $file = APP_PATH . $module . '/controller/' . $controller . '.class.php';
    if (file_exists($file)) {
        $content = file_get_contents($file);
        preg_match_all("/.*?public.*?function(.*?)\(.*?\)/i", $content, $matches);
        $functions = $matches[1];
        //排除部分方法
        $inherents_functions = array('_initialize', '__construct', 'getActionName', 'isAjax', 'display', 'show', 'fetch', 'buildHtml', 'assign', '__set', 'get', '__get', '__isset', '__call', 'error', 'success', 'ajaxReturn', 'redirect', '__destruct', '_empty');
        foreach ($functions as $func) {
            $func = trim($func);
            if (!in_array($func, $inherents_functions)) {
                    $customer_functions[] = $func;
            }
        }
        return $customer_functions;
    } else {
        saveLog('方法', 'is not file ' . $file, 'initperm');
    }
    return null;
}

/**
 * PHP ZipArchive压缩文件夹，实现将目录及子目录中的所有文件压缩为zip文件
 * @param string $folderPath 要压缩的目录路径
 * @param string $zipAs 压缩文件的文件名，可以带路径
 * @return bool 成功时返回true，否则返回false
 */
function zipFolder($folderPath, $zipAs){
    $folderPath = (string)$folderPath;
    $zipAs = (string)$zipAs;
    if(!class_exists('ZipArchive')){
        return false;
    }
    if(!$files=scanFolder($folderPath, true, true)){
        return false;
    }
    $za = new ZipArchive;
    if(true!==$za->open($zipAs, ZipArchive::OVERWRITE | ZipArchive::CREATE)){
        return false;
    }
    $za->setArchiveComment(base64_decode('LS0tIHd1eGlhbmNoZW5nLmNuIC0tLQ==').PHP_EOL.date('Y-m-d H:i:s'));
    foreach($files as $aPath => $rPath){
        $za->addFile($aPath, $rPath);
    }
    if(!$za->close()){
        return false;
    }
    return true;
}

/**
 * 扫描文件夹，获取文件列表
 * @param string $path 需要扫描的目录路径
 * @param bool   $recursive 是否扫描子目录
 * @param bool   $noFolder 结果中只包含文件，不包含任何目录，为false时，文件列表中的目录统一在末尾添加/符号
 * @param bool   $returnAbsolutePath 文件列表使用绝对路径，默认将返回相对于指定目录的相对路径
 * @param int    $depth 子目录层级，此参数供系统使用，禁止手动指定或修改
 * @return array|bool 返回目录的文件列表，如果$returnAbsolutePath为true，返回索引数组，否则返回键名为绝对路径，键值为相对路径的关联数组
 */
function scanFolder($path='', $recursive=true, $noFolder=true, $returnAbsolutePath=false,$depth=0){
    $path = (string)$path;
    if(!($path=realpath($path))){
        return false;
    }
    $path = str_replace('\\','/',$path);
    if(!($h=opendir($path))){
        return false;
    }
    $files = array();
    static $topPath;
    $topPath = $depth===0||empty($topPath)?$path:$topPath;
    while(false!==($file=readdir($h))){
        if($file!=='..' && $file!=='.'){
            $fp = $path.'/'.$file;
            if(!is_readable($fp)){
                continue;
            }
            if(is_dir($fp)){
                $fp .= '/';
                if(!$noFolder){
                    $files[$fp] = $returnAbsolutePath?$fp:ltrim(str_replace($topPath,'',$fp),'/');
                }
                if(!$recursive){
                    continue;
                }
                $function = __FUNCTION__;
                $subFolderFiles = $function($fp, $recursive, $noFolder, $returnAbsolutePath, $depth+1);
                if(is_array($subFolderFiles)){
                    $files = array_merge($files, $subFolderFiles);
                }
            }else{
                $files[$fp] = $returnAbsolutePath?$fp:ltrim(str_replace($topPath,'',$fp),'/');
            }
        }
    }
    return $returnAbsolutePath?array_values($files):$files;
}

//获取来自哪个浏览器
 function  browser($browser){
     if(preg_match('/Chrome\/[\d\.\w]*/',$browser, $match)){
         // 检查Chrome
         $para='Chrome';
     }elseif(preg_match('/Safari\/[\d\.\w]*/',$browser, $match)){
         // 检查Safari
         $para='Safari';
     }elseif(preg_match('/Trident\/[\d\.\w]*/',$browser, $match)){
         // IE
         $para='IE';
     }elseif(preg_match('/Opera\/[\d\.\w]*/',$browser, $match)){
         // opera
         $para='Opera';
     }elseif(preg_match('/Firefox\/[\d\.\w]*/',$browser, $match)){
         // Firefox
         $para='Firefox';
     }elseif(preg_match('/OmniWeb\/(v*)([^\s|;]+)/i',$browser, $match)){
         //OmniWeb
         $para='OmniWeb';
     }elseif(preg_match('/Netscape([\d]*)\/([^\s]+)/i',$browser, $match)){
         //Netscape
         $para='Netscape';
     }elseif(preg_match('/Lynx\/([^\s]+)/i',$browser, $match)){
         //Lynx
         $para='Lynx';
     }elseif(preg_match('/360SE/i',$browser, $match)){
         //360SE
         $para='360';
     }elseif(preg_match('/SE 2.x/i',$browser, $match)) {
         //搜狗
         $para='sougou';
     }else{
         $para='其他';
     }
     return $para;
 }

//获取来自搜索引擎入站时的关键词
function get_keyword($url,$kw_start)
{
    $start=stripos($url,$kw_start);
    $url=substr($url,$start+strlen($kw_start));
    $start=stripos($url,'&');
    if ($start>0)
    {
        $start=stripos($url,'&');
        $s_s_keyword=substr($url,0,$start);
    }
    else
    {
        $s_s_keyword=substr($url,0);
    }
    return $s_s_keyword;
}

function switchkey($url=''){
    $search_1="google.com"; //q= utf8
    $search_2="baidu.com"; //wd= gbk
    $search_3="yahoo.cn"; //q= utf8
    $search_4="sogou.com"; //query= gbk
    $search_5="soso.com"; //w= gbk
    $search_6="bing.com"; //q= utf8
    $search_7="youdao.com"; //q= utf8

    $google=preg_match("/\b{$search_1}\b/",$url);//记录匹配情况，用于入站判断。
    $baidu=preg_match("/\b{$search_2}\b/",$url);
    $yahoo=preg_match("/\b{$search_3}\b/",$url);
    $sogou=preg_match("/\b{$search_4}\b/",$url);
    $soso=preg_match("/\b{$search_5}\b/",$url);
    $bing=preg_match("/\b{$search_6}\b/",$url);
    $youdao=preg_match("/\b{$search_7}\b/",$url);
    $s_s_keyword="";
//获取没参数域名
    preg_match('@^(?:http://)?([^/]+)@i',$url,$matches);
    $burl=$matches[1];
//匹配域名设置
        if ($google)
        {//来自google
            $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
            $s_s_keyword=urldecode($s_s_keyword);
            $urlname="谷歌：";
        }
        else if($baidu)
        {//来自百度
            $s_s_keyword=get_keyword($url,'wd=');//关键词前的字符为"wd="。
            $s_s_keyword=urldecode($s_s_keyword);
            $s_s_keyword=iconv("GBK","UTF-8",$s_s_keyword);//引擎为gbk
            $urlname="百度：";
        }
        else if($yahoo)
        {//来自雅虎
            $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
            $s_s_keyword=urldecode($s_s_keyword);
            $urlname="雅虎：";
        }
        else if($sogou)
        {//来自搜狗
            $s_s_keyword=get_keyword($url,'query=');//关键词前的字符为"query="。
            $s_s_keyword=urldecode($s_s_keyword);
            $s_s_keyword=iconv("GBK","UTF-8",$s_s_keyword);//引擎为gbk
            $urlname="搜狗：";
        }
        else if($soso)
        {//来自搜搜
            $s_s_keyword=get_keyword($url,'w=');//关键词前的字符为"w="。
            $s_s_keyword=urldecode($s_s_keyword);
            $s_s_keyword=iconv("GBK","UTF-8",$s_s_keyword);//引擎为gbk
            $urlname="搜搜：";
        }
        else if($bing)
        {//来自必应
            $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
            $s_s_keyword=urldecode($s_s_keyword);
            $urlname="必应：";
        }
        else if($youdao)
        {//来自有道
            $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
            $s_s_keyword=urldecode($s_s_keyword);
            $urlname="有道：";
        }
        else{
            $urlname=$burl;
            $s_s_keyword="";
        }
        $data=[
            'urlname'=>$urlname,
            'keyword'=>$s_s_keyword,
        ];
        return $data;
}


    /**
     * 风格时间
     * @param int $time 开始时间,结束时间
     * @author Yoko <wanlala615@qq.com>
     */
    function Yoko_time($time =array())
    {
        $stimestamp = strtotime($time['start_time']);
        $etimestime = strtotime($time['end_time']);
        //计算日期段内有多少天
        $days = ($etimestime - $stimestamp) / 86400 + 1;
        //保存每天日期
        $date = array();
        /* for循环本周一到周日 */
        for ($i = 0; $i < $days; $i++) {
            $date[] = date("Y-m-d", $stimestamp + (86400 * $i));
//            $date[] = getTimeWeek($stimestamp + (86399 * $i));
        }
        return $date;
    }
    function getTimeWeek($time) {
       $weekarray = array("一", "二", "三", "四", "五", "六", "日");
        return "周" . $weekarray[date("w", strtotime($time))];
    }