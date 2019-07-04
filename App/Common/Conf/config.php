<?php
return array(
    'DEFAULT_MODULE'     => 'Home',    //默认模块
    'DEFAULT_CONTROLLER' => 'index',//设置默认访问控制器
    'DEFAULT_ACTION' => 'index',//设置默认访问方法
    'URL_MODEL'          => '2',        //URL模式
    'SESSION_AUTO_START' => true,       //是否开启session
    'HTML_FILE_SUFFIX' => '.html',// 默认静态文件后缀


    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'gcsys', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'gcroot', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PARAMS' =>  array(), // 数据库连接参数
    'DB_CHARSET'=> 'utf8', // 字符集

    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志

    //管理员帐号
    'ADMIN_NAME' => 'admin',
    //无需验证的操作
    'NOT_NEED_VERIFY'=>array(
        'Index/home',
        'User/infomation',
        'Public/base',
        'User/userpwd',
        'Index/caller',
        'Index/traffic',
        'Index/bower',
        'Index/hotsearch',
        'Index/eachpv',
        'content/articlelg',
        'content/articlesm',
        'product/productlg'
    ),

    //权限配置
    'AUTH_CONFIG'=>array(
        'AUTH_ON'           => true, //认证开关
        'AUTH_TYPE'         => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP'        => 'gcsys_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'gcsys_auth_group_access', //用	户组明细表
        'AUTH_RULE'         => 'gcsys_auth_rule', //权限规则表
        'AUTH_USER'         => 'userinfoes'//用户信息表
    ),

    //图片上传
    'UPLOAD_MAX_SIZE' => 13058176, //最大上传大小
    'UPLOAD_PATH' => './Public/admin/upload/', //文件上传保存路径
    'UPLOAD_EXTS' => array('jpg','jpeg','gif','png'),

    'CPU_PATH'=> './Public/', //cpu文件上传保存路径

    'URL_HTML_SUFFIX'=>'html',
    'URL_ROUTER_ON'   => true, //开启路由
    'URL_ROUTE_RULES'=>array(
        '/^index$/'=>'Home/index/index',
        '/^admin$/'=>'Admin/Index/home',
    ),


    'TMPL_EXCEPTION_FILE' => './Public/Admin/404.html', //异常页面
//    'RULE_EXCEPTION_FILE' => './Public/Admin/500.html', //无权限异常页面

);