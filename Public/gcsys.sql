/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : gcsys

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-07-03 15:55:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adeverinfoes`
-- ----------------------------
DROP TABLE IF EXISTS `adeverinfoes`;
CREATE TABLE `adeverinfoes` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AdeverImg` varchar(100) DEFAULT NULL COMMENT '广告图片路径',
  `Describe` varchar(255) DEFAULT NULL COMMENT '广告描述',
  `Link` varchar(150) DEFAULT NULL COMMENT '广告链接',
  `ReleaseDate` datetime NOT NULL COMMENT '发布日期',
  `Lock` int(11) NOT NULL,
  `Type_Id` int(11) DEFAULT NULL COMMENT '类型',
  `User_Id` int(11) DEFAULT NULL,
  `AdeverName` varchar(100) DEFAULT NULL COMMENT '广告名称',
  `Sort` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`Id`),
  KEY `AdverTypes_Type_Id` (`Type_Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adeverinfoes
-- ----------------------------
INSERT INTO `adeverinfoes` VALUES ('4', '', null, 'http://www.baidu.com', '2019-05-10 09:36:59', '1', '1', '22', 'test', '11');

-- ----------------------------
-- Table structure for `advertypes`
-- ----------------------------
DROP TABLE IF EXISTS `advertypes`;
CREATE TABLE `advertypes` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(30) NOT NULL,
  `Describe` varchar(255) DEFAULT NULL,
  `Lock` int(11) NOT NULL,
  `Width` int(11) DEFAULT NULL COMMENT '广告宽度',
  `Height` int(11) DEFAULT NULL COMMENT '广告高度',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of advertypes
-- ----------------------------
INSERT INTO `advertypes` VALUES ('1', '头部', '-毒瓦斯多', '1', '100', '100');
INSERT INTO `advertypes` VALUES ('8', '去去去', '', '1', '0', '0');
INSERT INTO `advertypes` VALUES ('3', '茶市场的非常', '', '1', '222', '22');
INSERT INTO `advertypes` VALUES ('6', '访问', '', '1', '0', '0');
INSERT INTO `advertypes` VALUES ('7', '搜索', '', '1', '0', '0');

-- ----------------------------
-- Table structure for `anchortext`
-- ----------------------------
DROP TABLE IF EXISTS `anchortext`;
CREATE TABLE `anchortext` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Original` varchar(255) DEFAULT NULL COMMENT '原文字',
  `Newtext` varchar(255) DEFAULT NULL COMMENT '替换文本',
  `Titile` varchar(100) DEFAULT NULL COMMENT '标题',
  `Chained` varchar(100) DEFAULT NULL COMMENT '链接地址',
  `ReplaceCount` int(11) DEFAULT NULL COMMENT '替换次数',
  `Lock` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of anchortext
-- ----------------------------
INSERT INTO `anchortext` VALUES ('25', 'test', 'test', '11', 'www.baidu.com', '6', '1');
INSERT INTO `anchortext` VALUES ('42', '五金', '五金', '11', 'www.baidu.com', '1', '1');

-- ----------------------------
-- Table structure for `blogrolls`
-- ----------------------------
DROP TABLE IF EXISTS `blogrolls`;
CREATE TABLE `blogrolls` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `BlogrollName` varchar(20) NOT NULL COMMENT '链接名称',
  `Link` varchar(150) DEFAULT NULL COMMENT '链接地址',
  `ReleaseDate` datetime NOT NULL COMMENT '发布日期',
  `Lock` int(10) NOT NULL,
  `User_Id` int(10) DEFAULT NULL COMMENT '发布人',
  `Sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blogrolls
-- ----------------------------
INSERT INTO `blogrolls` VALUES ('6', '百度', 'http://baidu.com', '2019-05-15 11:26:11', '1', '22', '99');
INSERT INTO `blogrolls` VALUES ('7', '测试', 'http://ceshi.cn', '2019-05-15 11:27:14', '1', '22', '1');

-- ----------------------------
-- Table structure for `gcsys_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `gcsys_auth_group`;
CREATE TABLE `gcsys_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正常 0 禁用',
  `rules` text NOT NULL COMMENT '用户组拥有的规则id 用逗号隔开',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_name` (`title`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gcsys_auth_group
-- ----------------------------
INSERT INTO `gcsys_auth_group` VALUES ('1', '超级管理员', '1', '20,21,25,26,27,28,29,56,57,72,73,74,75,76,58,59,60,61,62,30,31,32,100,101,102,103,33,34,35,104,105,36,65,92,93,94,95,66,96,97,98,99,37,67,38,68,83,84,85,86,87,88,89,90,91,40,64,106,107,108,109,110,111,112,113,41,69,77,78,79,80,81,82,70,71,42,43,46,47,114,115,116,117,118,48,49,50,51,52,119,120,121,122,53,54,55');
INSERT INTO `gcsys_auth_group` VALUES ('2', '普通管理员', '1', '20,21,25,26,27,28,29,56,57,58,59,60,61,62,30,31,32,100,101,102,103,33,34,35,104,105,36,65,92,93,94,95,66,96,97,98,99,37,67,38,68,83,84,85,86,87,88,89,90,91,40,64,106,107,108,109,110,111,112,113,41,69,77,78,79,80,81,82,70,71,42,43,46,47,114,115,116,117,118,48,49,50,51,52,119,120,121,122,53,54,55');
INSERT INTO `gcsys_auth_group` VALUES ('5', '文章管理', '1', '30,31,32,33,36,38,42,44,43,53,54,55');
INSERT INTO `gcsys_auth_group` VALUES ('6', '文章管理1', '1', '');
INSERT INTO `gcsys_auth_group` VALUES ('7', '广告管理', '1', '');

-- ----------------------------
-- Table structure for `gcsys_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `gcsys_auth_group_access`;
CREATE TABLE `gcsys_auth_group_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gcsys_auth_group_access
-- ----------------------------
INSERT INTO `gcsys_auth_group_access` VALUES ('1', '22', '1');
INSERT INTO `gcsys_auth_group_access` VALUES ('9', '58', '5');
INSERT INTO `gcsys_auth_group_access` VALUES ('8', '57', '2');

-- ----------------------------
-- Table structure for `gcsys_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `gcsys_auth_rule`;
CREATE TABLE `gcsys_auth_rule` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识(控制器/方法)',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 正常  0禁用',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式。为空表示存在就验证，不为空表示按照条件验证',
  `pid` int(11) DEFAULT '0' COMMENT '父级ID',
  `Sort` int(11) DEFAULT NULL COMMENT '排序',
  `ismenu` tinyint(4) DEFAULT '0' COMMENT '1是左侧菜单  0 不是菜单 2快捷导航',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gcsys_auth_rule
-- ----------------------------
INSERT INTO `gcsys_auth_rule` VALUES ('20', 'user', '用户', '1', '1', '', '0', '3', '1');
INSERT INTO `gcsys_auth_rule` VALUES ('35', 'content/updatemanagement', '编辑文章分类', '1', '1', '', '33', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('36', 'product', '产品系统', '1', '1', '', '30', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('37', 'img', '图片系统', '1', '1', '', '30', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('38', 'advertising', '广告系统', '1', '1', '', '30', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('21', 'user/useradmin', '后台管理员', '1', '1', '', '20', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('25', 'user/useradminedit', '修改后台管理员信息', '1', '1', '', '21', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('26', 'user/useradmininfo', '管理员列表', '1', '1', '', '21', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('27', 'user/useradmindel', '管理员删除', '1', '1', '', '21', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('28', 'user/useradminstatus', '管理员状态', '1', '1', '', '21', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('29', 'user/useradmingroup', '设置角色', '1', '1', '', '21', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('30', 'app', '应用', '1', '1', '', '0', '2', '1');
INSERT INTO `gcsys_auth_rule` VALUES ('31', 'content', '内容系统', '1', '1', '', '30', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('33', 'content/articlemanagement', '文章分类管理', '1', '1', '', '31', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('34', 'content/addmanagement', '添加文章分类', '1', '1', '', '33', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('32', 'content/articlelist', '文章列表', '1', '1', '', '31', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('40', 'message', '留言系统', '1', '1', '', '30', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('41', 'marketing', '营销系统', '1', '1', '', '30', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('42', 'index/home', '主页', '1', '1', '', '0', '1', '1');
INSERT INTO `gcsys_auth_rule` VALUES ('43', 'set', '设置', '1', '1', '', '0', '4', '1');
INSERT INTO `gcsys_auth_rule` VALUES ('64', 'message/messageinfo', '留言设置', '1', '1', '', '40', '98', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('47', 'programa/programainfo', '栏目管理', '1', '1', '', '46', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('46', 'programa', '栏目设置', '1', '1', '', '43', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('48', 'websys', '系统设置', '1', '1', '', '43', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('49', 'websys/websysinfo', '网站设置', '1', '1', '', '48', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('50', 'websys/emailsend', '邮件发送设置', '1', '1', '', '49', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('51', 'link', '友情链接', '1', '1', '', '43', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('52', 'link/linkinfo', '友情链接列表', '1', '1', '', '51', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('53', 'users', '我的设置', '1', '1', '', '43', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('54', 'user/information', '基本资料', '1', '1', '', '53', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('55', 'user/userpwd', '修改密码', '1', '1', '', '53', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('56', 'auths', '权限管理', '1', '1', '', '20', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('57', 'auth/listadmins', '角色管理', '1', '1', '', '56', '0', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('58', 'auth/listrule', '权限列表', '1', '1', '', '56', null, '2');
INSERT INTO `gcsys_auth_rule` VALUES ('59', 'auth/addrule', '添加权限', '1', '1', '', '58', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('60', 'auth/editrule', '编辑权限', '1', '1', '', '58', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('61', 'auth/delrule', '删除权限', '1', '1', '', '58', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('62', 'auth/statusrule', '权限状态', '1', '1', '', '58', null, '0');
INSERT INTO `gcsys_auth_rule` VALUES ('65', 'product/productlist', '产品列表', '1', '1', '', '36', '0', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('66', 'product/productmanagement', '产品分类管理', '1', '1', '', '36', '0', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('67', 'img/imglist', '图片管理', '1', '1', '', '37', '0', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('68', 'advertising/advertisinginfo', '广告列表', '1', '1', '', '38', '0', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('69', 'marketing/marketinfo', '访问统计', '1', '1', '', '41', '1', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('70', 'marketing/seoinfo', 'SEO', '1', '1', '', '41', '2', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('71', 'marketing/customer', '客服列表', '1', '1', '', '41', '3', '2');
INSERT INTO `gcsys_auth_rule` VALUES ('72', 'auth/addadmins', '角色添加', '1', '1', '', '57', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('73', 'auth/modifygroup', '角色编辑', '1', '1', '', '57', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('74', 'auth/groupdel', '角色删除', '1', '1', '', '57', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('75', 'auth/statusgroup', '角色状态', '1', '1', '', '57', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('76', 'auth/rolegroup', '分配权限', '1', '1', '', '57', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('77', 'marketing/switchinfo', '搜索引擎', '1', '1', '', '69', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('78', 'marketing/pageinfo', '受访分析', '1', '1', '', '69', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('79', 'marketing/referrerinfo', '来路分析', '1', '1', '', '69', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('80', 'marketing/callinfo', '访问分析', '1', '1', '', '69', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('81', 'marketing/totaldel', '删除来访记录', '1', '1', '', '69', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('82', 'marketing/totalsite', '统计设置', '1', '1', '', '69', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('83', 'advertising/adveradd', '广告添加', '1', '1', '', '68', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('84', 'advertising/adverupdate', '广告编辑', '1', '1', '', '68', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('85', 'advertising/adverdel', '广告删除', '1', '1', '', '68', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('86', 'advertising/adverstatus', '广告状态', '1', '1', '', '68', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('87', 'advertising/advertisingtype', '广告位管理', '1', '1', '', '38', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('88', 'advertising/addtype', '广告位添加', '1', '1', '', '87', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('89', 'advertising/updatetype', '广告位编辑', '1', '1', '', '87', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('90', 'advertising/deltype', '广告位删除', '1', '1', '', '87', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('91', 'advertising/statustype', '广告位状态', '1', '1', '', '87', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('92', 'product/productadd', '添加产品', '1', '1', '', '65', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('93', 'product/productdel', '删除产品', '1', '1', '', '65', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('94', 'product/productupdate', '编辑产品', '1', '1', '', '65', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('95', 'product/productstatus', '产品状态', '1', '1', '', '65', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('96', 'product/delmanagement', '删除产品分类', '1', '1', '', '66', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('97', 'product/statusmanagement', '产品分类状态', '1', '1', '', '66', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('98', 'product/updatemanagement', '编辑产品分类', '1', '1', '', '66', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('99', 'product/addmanagement', '添加产品分类', '1', '1', '', '66', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('100', 'content/articlestatus', '文章状态', '1', '1', '', '32', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('101', 'content/articledel', '删除文章', '1', '1', '', '32', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('102', 'content/articleupdate', '编辑文章', '1', '1', '', '32', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('103', 'content/articleadd', '添加文章', '1', '1', '', '32', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('104', 'content/statusmanagement', '文章分类状态', '1', '1', '', '33', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('105', 'content/delmanagement', '删除文章分类', '1', '1', '', '33', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('106', 'message/messagestatus', '留言状态', '1', '1', '', '64', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('107', 'message/messagedel', '删除留言', '1', '1', '', '64', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('108', 'message/messageform', '留言表单', '1', '1', '', '40', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('109', 'message/messageformupdate', '编辑留言表单', '1', '1', '', '108', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('110', 'message/messageformstatus', '留言表单状态', '1', '1', '', '108', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('111', 'message/messageformdel', '删除留言表单', '1', '1', '', '108', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('112', 'message/messageformadd', '添加留言表单', '1', '1', '', '108', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('113', 'message/messagesys', '留言基础设置', '1', '1', '', '40', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('114', 'programa/prodel', '删除栏目', '1', '1', '', '47', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('115', 'programa/proupdate', '编辑栏目', '1', '1', '', '47', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('116', 'programa/prostatus', '栏目状态', '1', '1', '', '47', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('117', 'programa/promove', '移动栏目', '1', '1', '', '47', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('118', 'programa/proadd', '添加栏目', '1', '1', '', '47', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('119', 'link/linkadd', '添加友情链接', '1', '1', '', '52', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('120', 'link/linkstatus', '友情链接状态', '1', '1', '', '52', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('121', 'link/linkdel', '删除友情链接', '1', '1', '', '52', '0', '0');
INSERT INTO `gcsys_auth_rule` VALUES ('122', 'link/linkupdate', '编辑友情链接', '1', '1', '', '52', '0', '0');

-- ----------------------------
-- Table structure for `information`
-- ----------------------------
DROP TABLE IF EXISTS `information`;
CREATE TABLE `information` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `enTitle` varchar(255) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `ReleaseDate` datetime NOT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `Describe` text,
  `Lock` int(11) NOT NULL,
  `Recommend_Id` int(11) NOT NULL,
  `Lm_Id` int(11) DEFAULT NULL,
  `Sm_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `RmationImg` varchar(255) DEFAULT NULL COMMENT '图片',
  `seotitle` varchar(100) DEFAULT NULL COMMENT 'seo自定义title',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'seo关键字',
  `description` varchar(255) DEFAULT NULL COMMENT 'seo描述',
  `tag` varchar(100) DEFAULT NULL COMMENT 'TAG标签',
  `staticname` varchar(50) DEFAULT NULL COMMENT '静态页面',
  `PV` int(11) DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `Recommends_Recommend_Id` (`Recommend_Id`),
  KEY `SmClasses_Sm_Id` (`Sm_Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of information
-- ----------------------------
INSERT INTO `information` VALUES ('1', null, '新技术重构客户体验，驱动营销效果最大化', '2019-06-27 13:44:28', '2019-06-27 13:44:27', '<p><span><img src=\"/./Public/admin/upload/inforedit/2019-06-27/inforedit_1561620141_23.png\" alt=\"undefined\"><br></span></p><p><span><br></span></p><p>20世纪70年代，美国斯坦福研究所发现了一个规律:“一个国家里，当基本物质需要用生产能力约3/4甚至1/2就可以满足时，就须进行根本性的调整，使经济健康发展。”物质极大丰富的今天就是一个很好的印证，消费者不再拘泥于产品本身，而是更重视自己得到的体验与价值。         “以消费者为中心”所导向的客户体验升级        随着多维度消费需求下愈演愈烈的复杂性，原以产品为核心的传统企业意识到，以往先由工厂生产产品，再去找通路通过销售渠道卖给顾客的运营方法和手段难以维持增长。在新零售“以消费者为中心”的思维启示下，这些企业开始通过需求制定产品、通过体验经营自己的“客户关系”。        但是，在新零售的大环境下不是所有东西都可以称之为产品，产品是基于客户需求、高于客户期待、给予客户体验的一种有形或无形的服务。从客户购买需求到购买决策再到购买行动上都需要足够的数据价值做依撑，以维护客户在供求关系中的地位。        数据洞察下客户体验的“三大价值点”         洞察客户需求、创造客户价值正在成为全新的商业逻辑，所以使企业真正的声音传达到客户的内心就变得尤为重要。这就需要设计出符合客户需求的体验，并通过它给企业及客户双方带来三个层面上的“价值”：        人的体验：全家通过打通会员数据，用积分、交叉销售等方式来运营顾客关系，提升复购频次，稳固顾客对品牌粘性的同时，不断提升了顾客的贡献率；        货的体验：宜家作为一个家居卖场，通过不断的数据调研让它的肉丸销量创造了奇迹，给予传统企业引导性思维“知道自己从事什么，但不要局限自己卖什么”；        场的体验：良品铺子通过数据技术对客服与客户的对话进行抽查，洞察出客户的情绪，把聊天情绪匹配到会员标签中，在售前对话场景中与客户产生情感的交互共鸣。        通过以上三层价值的启迪，客户体验管理已成为现阶段企业关注的焦点,而基于全家、宜家、三只松鼠正确决策下的客户数据则成为实现客户体验管理的关键点。然而不是所有数据都可以准确的指向消费者的行为。许多企业看到某一款产品在某一个渠道卖的特别好，以为是消费者需求，但往往事实只是渠道针对这款产品所做的推销活动，这样反馈出来的数据就并不真实。所以企业急需建立一手信息，分析数据可用性，洞察与定义细分市场与场景，从而提升客户体验感。        那么如何才能利用客户数据精准洞察客户需求，创造极致体验？        智能数据驱动客户体验管理        在客户体验管理中，我们时常陷入许多误区和挑战，如何精准洞察客户需求将客户化过程精细运营，提供真正有价值的产品和服务；如何通过低成本高效益的个性化营销方式，最大化客户生命价值？        实现客户旅程清晰可见        客户体验是客户与产品和服务交互过程中形成的感受，如何有效地管理交互过程提升用户体验，客户旅程的分析和优化就显得尤为重要。        首先要了解客户与企业互动的整个旅程，并分析整个旅程中有哪些时间点、步骤、行动等。然后将所有客户触点(线上和线下)上的数据点集成到客户旅程的统一界面，从而实现客户旅程的清晰可见，最后整合各个触点为客户之旅和客户体验开辟新机会。        持续优化客户生命周期。&nbsp;</p>', '1', '0', '2', '1', '22', '/./Public/admin/upload/information/2019-06-27/information_1561614307_23.png', '', '客户体验，数字营销，客户生命周期价值', '', '', '', '3');
INSERT INTO `information` VALUES ('2', null, '如何满足客户个性化需求', '2019-06-27 13:50:20', '2019-06-27 13:50:19', '<p><span>以一家拥有10万名员工，每年服务超过1亿名乘客的全服务航司为例，即使其拥有成熟的商业智能实力，也应该摆脱单纯的企业历史数据束缚，开放采用机器学习和人工智能技术，通过大范围的预测分析和模式识别等方式去了解客户需求，并在反欺诈和数字资产完善等方面更上一层楼。......</span></p>', '1', '0', '2', '1', '22', '/./Public/admin/upload/information/2019-06-27/information_1561614645_23.png', '', '客户体验，数字营销，客户生命周期价值', '', '', '', '7');
INSERT INTO `information` VALUES ('3', '一物一码品牌防伪 仅仅是一个新起点......', '让品牌防伪具有炫动的生命力', '2019-06-27 15:46:32', '2019-06-27 15:46:32', '', '1', '0', '3', '2', '22', '', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('32', '', '如何吸引公众的注意与兴趣，让信息从“焦点”变为“记忆点”进而产生“卖点”', '2019-07-01 10:49:55', '2019-07-02 16:37:18', '<p>1.我们始终坚持持续化系统运营来开展防伪。</p><p>2.我们始终坚持调动消费者参与到防伪过程中来，强调数字化驱动业务。</p><p>3.通过互联网数字化多媒体渠道，最有效地谋求新的市场开拓和新的消费者挖掘。</p><p>信奈源自于安全——逆加密特殊运算系统监管伪造无效。</p>', '1', '0', '3', '17', '22', '/./Public/admin/upload/information/2019-07-01/information_1561949444_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('4', '', '使用数字化身份管理 让假货无处可藏', '2019-06-27 16:09:21', '2019-06-27 16:09:21', '<h3>\"如何吸引公众的注意与兴趣，让信息从“焦点”变为“记忆点”进而产生“卖点”</h3><p>1.我们始终坚持持续化系统运营来开展防伪。</p><p>2.我们始终坚持调动消费者参与到防伪过程中来，强调数字化驱动业务。</p><p>3.通过互联网数字化多媒体渠道，最有效地谋求新的市场开拓和新的消费者挖掘。</p><p>信奈源自于安全——逆加密特殊运算系统监管伪造无效。</p>', '1', '0', '3', '4', '22', '/./Public/admin/upload/information/2019-06-27/information_1561623029_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('5', '', '品牌防伪离不开消费者参与', '2019-06-27 16:12:46', '2019-06-27 16:12:46', '<ul><li>防伪不只是贴一张标签，这是一个非常严重的误区。</li><li>大部份企业投入了多种防伪方式，最终发现假货依然猖獗。</li><li>企业最终会发现防伪离不开消费者参与。</li></ul>', '1', '0', '3', '3', '22', '/./Public/admin/upload/information/2019-07-01/information_1561949052_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('6', 'Company profile', '公司简介', '2019-06-27 16:23:34', '2019-06-27 16:23:34', '<p><span>上海速沣科技有限公司，涉及大数据、移动互联网、 图像识别，致力于数码智能防伪系统领域研发及企业数字化管理软件研发、提供一个企业级客户数据技术解决方案、整合了尖端的大数据、AI和区块链技术来解决企业品牌保护、营销、个性化和数据分析领域的问题。</span></p>', '1', '0', '4', '5', '22', '', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('7', 'R &amp; D purpose', '研发目的', '2019-06-27 16:24:05', '2019-06-27 16:24:05', '<div><span>1:增加伪造者的违法成本，彻底击垮伪造者的心理动机，毁灭伪造者的伪造行为。</span></div><div>2: 培养消费者的防伪意识，用手机微信扫一扫，瞬间可以准确识别商品的真假，实现消费者安心购物，人人能即时识假。</div><div><span>3:为企业保驾护航，保护品牌产品增值，帮助企业根除假货泛滥这一世纪“毒瘤” 。</span></div><div><span>4：通过AI+IQ 实现海量数据洞察、挖掘、分析；解决企业所面临的产品及客户生命周期管理等难题。</span></div><p></p>', '1', '0', '4', '7', '22', '', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('14', '如何满足客户因人而异的需求，提供个性化的产品及服务，&lt;br/&gt;提升客户体验和忠诚度，挖掘客户生命周期价值。', '如何实现线上线下多触点融合，全量采集多维客户数据，&lt;br/&gt;构建360°客户画像，进行精准营销？', '2019-06-27 17:30:50', '2019-07-03 10:23:31', '', '1', '0', '1', '9', '22', '', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('8', '', '软件著作权', '2019-06-27 16:54:12', '2019-06-27 16:54:12', '', '1', '0', '4', '8', '22', '/./Public/admin/upload/information/2019-06-27/information_1561625684_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('9', '', '软件产品检测报告', '2019-06-27 16:55:01', '2019-06-27 16:55:01', '', '1', '0', '4', '8', '22', '/./Public/admin/upload/information/2019-06-27/information_1561625722_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('10', '', '科技查新结果', '2019-06-27 16:55:28', '2019-06-27 16:55:28', '', '1', '0', '4', '8', '22', '/./Public/admin/upload/information/2019-06-27/information_1561625745_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('11', '', '发明专利', '2019-06-27 16:55:52', '2019-06-27 16:55:52', '', '1', '0', '4', '8', '22', '/./Public/admin/upload/information/2019-06-27/information_1561625760_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('12', '', '', '2019-06-27 17:08:24', '2019-06-27 17:08:24', '', '1', '0', '4', '6', '22', '/./Public/admin/upload/information/2019-06-27/information_1561626519_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('13', '', '', '2019-06-27 17:08:46', '2019-06-27 17:08:46', '', '1', '0', '4', '6', '22', '/./Public/admin/upload/information/2019-06-27/information_1561626545_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('15', '让您能够深入洞察客户，详细了解客户的信息，提高客户转化率，推动业务增长，提升品牌拥护度。', '数字营销为每一位客户创建独一无二的营销体验', '2019-06-27 17:31:35', '2019-06-27 17:31:35', '<p><br></p>', '1', '0', '1', '10', '22', '', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('16', '', '', '2019-06-27 17:32:01', '2019-06-27 17:32:01', '', '1', '0', '1', '11', '22', '/./Public/admin/upload/information/2019-06-27/information_1561627953_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('17', '', '', '2019-06-27 17:32:40', '2019-06-27 17:32:40', '', '1', '0', '1', '11', '22', '/./Public/admin/upload/information/2019-06-27/information_1561627975_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('18', '', '在数据的海洋里 我们能帮您实现', '2019-06-27 17:33:55', '2019-06-27 17:33:55', '', '1', '0', '1', '12', '22', '', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('19', 'FMCG', '快消品行业', '2019-06-28 09:55:51', '2019-07-02 11:07:04', '<img src=\"/./Public/admin/upload/inforedit/2019-06-28/inforedit_1561687511_23.png\" alt=\"快消品\" style=\"\">', '1', '0', '5', '13', '22', '/./Public/admin/upload/information/2019-06-28/information_1561686997_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('20', 'Industrial', '工业品行业', '2019-06-28 09:56:44', '2019-06-28 09:56:44', '<img src=\"/./Public/admin/upload/inforedit/2019-06-28/inforedit_1561687540_23.png\" alt=\"工业品\" style=\"\">', '1', '0', '5', '13', '22', '/./Public/admin/upload/information/2019-06-28/information_1561687036_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('21', 'Luxury', '奢侈品行业', '2019-06-28 09:58:06', '2019-06-28 09:58:06', '<img src=\"/./Public/admin/upload/inforedit/2019-06-28/inforedit_1561687578_23.png\" alt=\"奢侈品\" style=\"\">', '1', '0', '5', '13', '22', '/./Public/admin/upload/information/2019-06-28/information_1561687100_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('22', 'bit', '农产品行业', '2019-06-28 09:58:28', '2019-06-28 09:58:28', '<img src=\"/./Public/admin/upload/inforedit/2019-06-28/inforedit_1561687618_23.png\" alt=\"农产品\" style=\"\">', '1', '0', '5', '13', '22', '/./Public/admin/upload/information/2019-06-28/information_1561687123_23.png', '', '', '', '', '', '3');
INSERT INTO `information` VALUES ('27', 'index/product_traceability', '产品溯源', '2019-06-28 16:08:10', '2019-07-02 10:27:37', '', '1', '0', '5', '15', '22', '/./Public/admin/upload/information/2019-06-28/information_1561709336_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('24', '掌控产品从源头到终端的每一个过程', '根据企业不同产品需求，量身定制各类解决方案', '2019-06-28 15:55:33', '2019-07-02 10:21:02', '<p>实现产品数字化管理让品牌变得更有价值</p>', '1', '0', '5', '14', '22', '', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('25', 'index/brand_anti', '品牌防伪', '2019-06-28 15:56:43', '2019-07-02 10:28:29', '', '1', '0', '5', '15', '22', '/./Public/admin/upload/information/2019-06-28/information_1561708802_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('26', 'index/products_running', '产品防窜', '2019-06-28 16:00:11', '2019-07-02 10:28:02', '', '1', '0', '5', '15', '22', '/./Public/admin/upload/information/2019-06-28/information_1561708843_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('28', 'index/digital_marketing', '数字营销', '2019-06-28 16:09:06', '2019-07-02 10:27:11', '', '1', '0', '5', '15', '22', '/./Public/admin/upload/information/2019-06-28/information_1561709402_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('29', '', '大数据', '2019-06-28 16:36:22', '2019-06-28 16:36:22', '<p><span><img src=\"/./Public/admin/upload/inforedit/2019-06-28/inforedit_1561711125_23.png\" alt=\"\" style=\"\">解决方案基于Hadoop开源生态体系 构建，能更好的解决大数据时代， 企业面临的海量、多来源数据的采 集、打通、分析、应用的难题。</span></p>', '1', '0', '5', '16', '22', '/./Public/admin/upload/information/2019-06-28/information_1561711147_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('30', '', 'AI', '2019-06-28 16:39:29', '2019-06-28 16:39:29', '<p><span><img src=\"/./Public/admin/upload/inforedit/2019-06-28/inforedit_1561711187_23.png\" alt=\"\" style=\"\">解决方案提供简单易用的，产品化的机器学习及AI解决方案， 丰富的模型和算法储备，有助于企业深 入的洞察和挖掘用户价值。</span></p>', '1', '0', '5', '16', '22', '/./Public/admin/upload/information/2019-06-28/information_1561711197_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('31', '', '营销生态', '2019-06-28 16:40:23', '2019-06-28 16:40:23', '<p><span><img src=\"/./Public/admin/upload/inforedit/2019-06-28/inforedit_1561711250_23.png\" alt=\"\" style=\"\">解决方案提供的是一个开放式的营 销平台，能更好对接和利用企业内 外部的数据，营销渠道和应用等资 源。</span></p>', '1', '0', '5', '16', '22', '/./Public/admin/upload/information/2019-06-28/information_1561711259_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('33', '', '', '2019-07-02 16:39:26', '2019-07-02 16:39:26', '<img src=\"/./Public/admin/upload/inforedit/2019-07-02/inforedit_1562056901_23.png\" alt=\"图片\" style=\"\">', '1', '0', '3', '18', '22', '/./Public/admin/upload/information/2019-07-02/information_1562056803_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('34', '', '', '2019-07-02 16:42:00', '2019-07-02 16:43:37', '<img src=\"/./Public/admin/upload/inforedit/2019-07-02/inforedit_1562056983_23.png\" alt=\"图片\" style=\"\">', '1', '0', '1', '18', '22', '/./Public/admin/upload/information/2019-07-02/information_1562056973_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('35', '', '', '2019-07-02 16:43:46', '2019-07-02 16:43:46', '<img src=\"/./Public/admin/upload/inforedit/2019-07-02/inforedit_1562057058_23.png\" alt=\"图片\" style=\"\">', '1', '0', '3', '18', '22', '/./Public/admin/upload/information/2019-07-02/information_1562057099_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('36', '', '', '2019-07-02 17:42:53', '2019-07-02 17:42:53', '<img src=\"/./Public/admin/upload/inforedit/2019-07-02/inforedit_1562060646_23.png\" alt=\"图片\" style=\"\">', '1', '0', '3', '18', '22', '/./Public/admin/upload/information/2019-07-02/information_1562060630_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('37', '', '', '2019-07-02 17:54:32', '2019-07-02 17:54:32', '<img src=\"/./Public/admin/upload/inforedit/2019-07-02/inforedit_1562061290_23.png\" alt=\"图片\" style=\"\">', '1', '0', '3', '18', '22', '/./Public/admin/upload/information/2019-07-02/information_1562061325_23.png', '', '', '', '', '', '0');
INSERT INTO `information` VALUES ('38', '', '', '2019-07-02 17:55:33', '2019-07-02 17:55:33', '<img src=\"/./Public/admin/upload/inforedit/2019-07-02/inforedit_1562061370_23.png\" alt=\"图片\" style=\"\">', '1', '0', '3', '18', '22', '/./Public/admin/upload/information/2019-07-02/information_1562061358_23.png', '', '', '', '', '', '0');

-- ----------------------------
-- Table structure for `lgclasses`
-- ----------------------------
DROP TABLE IF EXISTS `lgclasses`;
CREATE TABLE `lgclasses` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `LgName` varchar(100) NOT NULL,
  `Describe` varchar(255) DEFAULT NULL,
  `Sort` int(11) NOT NULL,
  `Lock` int(11) NOT NULL,
  `Sign` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lgclasses
-- ----------------------------
INSERT INTO `lgclasses` VALUES ('1', '数字营销', '-', '99', '1', '0');
INSERT INTO `lgclasses` VALUES ('2', '新闻资讯', '-', '99', '1', '0');
INSERT INTO `lgclasses` VALUES ('3', '品牌防伪', '-', '99', '1', '0');
INSERT INTO `lgclasses` VALUES ('4', '关于我们', '-', '99', '1', '0');
INSERT INTO `lgclasses` VALUES ('5', '首页', '', '99', '1', '0');

-- ----------------------------
-- Table structure for `messageform`
-- ----------------------------
DROP TABLE IF EXISTS `messageform`;
CREATE TABLE `messageform` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '字段名称',
  `describe` varchar(100) NOT NULL COMMENT '简短描述',
  `fieldtype` varchar(100) NOT NULL COMMENT '字段类型',
  `optiontype` tinyint(2) NOT NULL COMMENT '是否必填 1 必填 0可不填',
  `sort` int(11) NOT NULL COMMENT '排序',
  `lock` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messageform
-- ----------------------------
INSERT INTO `messageform` VALUES ('1', '姓名', '请输入···', 'select', '1', '99', '0');
INSERT INTO `messageform` VALUES ('3', '内容', '内容', 'checkbox', '0', '98', '0');
INSERT INTO `messageform` VALUES ('5', '测试', '', 'select', '0', '97', '1');
INSERT INTO `messageform` VALUES ('6', '', '', 'checkbox', '1', '0', '1');

-- ----------------------------
-- Table structure for `messageinfoes`
-- ----------------------------
DROP TABLE IF EXISTS `messageinfoes`;
CREATE TABLE `messageinfoes` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MessageDate` datetime NOT NULL COMMENT '留言日期',
  `CompanyName` varchar(30) DEFAULT NULL COMMENT '公司名称',
  `ContactName` varchar(30) NOT NULL COMMENT '联系人',
  `ContactTel` varchar(20) NOT NULL COMMENT '联系电话',
  `ContactEmail` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `CompanyFax` varchar(20) DEFAULT NULL COMMENT '传真',
  `CompanyQQ` varchar(20) DEFAULT NULL COMMENT 'qq',
  `Describe` varchar(255) DEFAULT NULL COMMENT '留言描述',
  `Dispose` int(11) NOT NULL COMMENT '处理状态  1已处理  0 未处理',
  `Lock` int(11) NOT NULL,
  `Type_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `MessageTypes_Type_Id` (`Type_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messageinfoes
-- ----------------------------
INSERT INTO `messageinfoes` VALUES ('1', '2019-05-10 13:15:24', '上海谷程', '谷程', '15636985632', '522@163.com', '123', '25563144', '上海谷程描述', '1', '1', '1');
INSERT INTO `messageinfoes` VALUES ('15', '2019-06-28 08:58:08', null, '11', '是是是', null, null, null, '对对对', '0', '1', null);

-- ----------------------------
-- Table structure for `messagetypes`
-- ----------------------------
DROP TABLE IF EXISTS `messagetypes`;
CREATE TABLE `messagetypes` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(30) NOT NULL,
  `Describe` varchar(255) DEFAULT NULL,
  `Lock` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messagetypes
-- ----------------------------
INSERT INTO `messagetypes` VALUES ('1', '质量', '-', '1');
INSERT INTO `messagetypes` VALUES ('2', '包装方式', '-', '1');

-- ----------------------------
-- Table structure for `newsinfoes`
-- ----------------------------
DROP TABLE IF EXISTS `newsinfoes`;
CREATE TABLE `newsinfoes` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NewsTitle` varchar(100) NOT NULL,
  `NewsContent` varchar(255) DEFAULT NULL,
  `NewsImg` varchar(255) DEFAULT NULL,
  `ReleaseDate` datetime NOT NULL,
  `Lock` int(11) NOT NULL,
  `Type_Id` int(11) DEFAULT NULL,
  `User_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `NewsTypes_Type_Id` (`Type_Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newsinfoes
-- ----------------------------

-- ----------------------------
-- Table structure for `newstypes`
-- ----------------------------
DROP TABLE IF EXISTS `newstypes`;
CREATE TABLE `newstypes` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) NOT NULL,
  `Describe` varchar(255) DEFAULT NULL,
  `Lock` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newstypes
-- ----------------------------

-- ----------------------------
-- Table structure for `productimgs`
-- ----------------------------
DROP TABLE IF EXISTS `productimgs`;
CREATE TABLE `productimgs` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Img` varchar(255) NOT NULL,
  `Lock` int(11) NOT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `Type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProductInfoes_Product_Id` (`Product_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of productimgs
-- ----------------------------
INSERT INTO `productimgs` VALUES ('35', '', '1', '4', 'big');
INSERT INTO `productimgs` VALUES ('36', '', '1', '4', 'sm');
INSERT INTO `productimgs` VALUES ('31', '', '1', '1', 'big');
INSERT INTO `productimgs` VALUES ('53', '', '1', '13', 'big');
INSERT INTO `productimgs` VALUES ('32', '', '1', '1', 'sm');
INSERT INTO `productimgs` VALUES ('29', '', '1', '2', 'big');
INSERT INTO `productimgs` VALUES ('52', '', '1', '12', 'sm');
INSERT INTO `productimgs` VALUES ('30', '', '1', '2', 'sm');
INSERT INTO `productimgs` VALUES ('51', '', '1', '12', 'big');
INSERT INTO `productimgs` VALUES ('33', '/./Public/admin/upload/productbig/2019-06-27/productbig_1561599573_23.png', '1', '3', 'big');
INSERT INTO `productimgs` VALUES ('34', '/./Public/admin/upload/productbig/2019-06-27/mini_productbig_1561599573_23.png', '1', '3', 'sm');
INSERT INTO `productimgs` VALUES ('37', '', '1', '5', 'big');
INSERT INTO `productimgs` VALUES ('38', '', '1', '5', 'sm');
INSERT INTO `productimgs` VALUES ('39', '', '1', '6', 'big');
INSERT INTO `productimgs` VALUES ('40', '', '1', '6', 'sm');
INSERT INTO `productimgs` VALUES ('41', '', '1', '7', 'big');
INSERT INTO `productimgs` VALUES ('42', '', '1', '7', 'sm');
INSERT INTO `productimgs` VALUES ('43', '', '1', '8', 'big');
INSERT INTO `productimgs` VALUES ('44', '', '1', '8', 'sm');
INSERT INTO `productimgs` VALUES ('45', '', '1', '9', 'big');
INSERT INTO `productimgs` VALUES ('46', '', '1', '9', 'sm');
INSERT INTO `productimgs` VALUES ('47', '', '1', '10', 'big');
INSERT INTO `productimgs` VALUES ('48', '', '1', '10', 'sm');
INSERT INTO `productimgs` VALUES ('49', '', '1', '11', 'big');
INSERT INTO `productimgs` VALUES ('50', '', '1', '11', 'sm');
INSERT INTO `productimgs` VALUES ('54', '', '1', '13', 'sm');
INSERT INTO `productimgs` VALUES ('55', '', '1', '14', 'big');
INSERT INTO `productimgs` VALUES ('56', '', '1', '14', 'sm');
INSERT INTO `productimgs` VALUES ('57', '', '1', '15', 'big');
INSERT INTO `productimgs` VALUES ('58', '', '1', '15', 'sm');
INSERT INTO `productimgs` VALUES ('59', '', '1', '16', 'big');
INSERT INTO `productimgs` VALUES ('60', '', '1', '16', 'sm');
INSERT INTO `productimgs` VALUES ('61', '', '1', '17', 'big');
INSERT INTO `productimgs` VALUES ('62', '', '1', '17', 'sm');
INSERT INTO `productimgs` VALUES ('63', '', '1', '18', 'big');
INSERT INTO `productimgs` VALUES ('64', '', '1', '18', 'sm');
INSERT INTO `productimgs` VALUES ('65', '', '1', '19', 'big');
INSERT INTO `productimgs` VALUES ('66', '', '1', '19', 'sm');

-- ----------------------------
-- Table structure for `productinfoes`
-- ----------------------------
DROP TABLE IF EXISTS `productinfoes`;
CREATE TABLE `productinfoes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL COMMENT '产品名称',
  `ProductEnName` varchar(100) DEFAULT NULL,
  `ProductDate` datetime NOT NULL COMMENT '发布时间',
  `UpdateDate` datetime DEFAULT NULL COMMENT '更新时间',
  `Keyword` varchar(50) DEFAULT NULL,
  `Version` varchar(255) DEFAULT NULL,
  `Specification` varchar(150) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Minimum` varchar(150) DEFAULT NULL,
  `TotalSupply` varchar(150) DEFAULT NULL,
  `Deadline` varchar(150) DEFAULT NULL,
  `Describe` text,
  `Lock` int(11) NOT NULL,
  `Type_Id` int(11) DEFAULT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `CoverImg` varchar(255) DEFAULT NULL COMMENT '封面图片',
  `Pv` int(11) DEFAULT NULL COMMENT '浏览量',
  `Attribute` tinyint(3) DEFAULT NULL COMMENT '1  推荐  2 置顶',
  `Status` tinyint(3) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL COMMENT 'seo自定义title',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'seo关键字',
  `description` varchar(255) DEFAULT NULL COMMENT 'seo描述',
  `tag` varchar(100) DEFAULT NULL COMMENT 'TAG标签',
  `staticname` varchar(50) DEFAULT NULL COMMENT '静态页面',
  PRIMARY KEY (`Id`),
  KEY `ProductTypes_Type_Id` (`Type_Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of productinfoes
-- ----------------------------
INSERT INTO `productinfoes` VALUES ('1', '产品溯源全生命周期监管流程图', 'Product traceability full life cycle monitoring flowchart', '2019-06-26 16:49:51', '2019-06-26 16:49:50', null, null, null, null, null, null, null, null, '', '1', '7', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600899_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('11', '数字化防窜货管理操作流程', '', '2019-06-27 10:00:58', '2019-06-27 10:00:50', null, null, null, null, null, null, null, null, '&lt;p&gt;1：不改变企业现有的系统模式，只需要在数据信息孤岛的环节进行导入或采集。&lt;/p&gt;&lt;p&gt;2：助力企业品牌与用户进行互动，实现企业价值更大化。&lt;/p&gt;&lt;p&gt;3：所有原材料信息可追溯。&lt;/p&gt;&lt;p&gt;4: 所有生产工艺可追溯。&lt;/p&gt;&lt;p&gt;5：所有物流路径可追溯。&lt;/p&gt;&lt;p&gt;6：对用户提供灵活多样的“产品真伪”查询及“品牌推广”。&lt;/p&gt;&lt;p class=&quot;p-last&quot;&gt;7：提供各类数据汇总依托云计算数据挖掘分析，让数据直观展现让数据来说话。&lt;/p&gt;', '1', '10', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600847_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('2', '溯源平台特点', 'Characteristics of Traceability Platform', '2019-06-26 17:23:12', '2019-06-26 17:23:11', null, null, null, null, null, null, null, null, '&lt;p&gt;&lt;span&gt;1：不改变企业现有的系统模式，只需要在数据信息孤岛的环节进行导入或采集。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span&gt;2：助力企业品牌与用户进行互动，实现企业价值更大化。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span&gt;3：所有原材料信息可追溯。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span&gt;4&lt;/span&gt;：&lt;span&gt;所有生产工艺可追溯。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span&gt;5：所有物流路径可追溯。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span&gt;6：对用户提供灵活多样的“产品真伪”查询及“品牌推广”。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span&gt;7：提供各类数据汇总依托云计算数据挖掘分析，让数据直观展现让数据来说话。&lt;/span&gt;&lt;/p&gt;', '1', '8', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600945_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('3', 'PDA数据采集', '', '2019-06-27 09:39:40', '2019-06-27 09:39:38', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561599596_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('4', '激光打标机', '', '2019-06-27 09:40:02', '2019-06-27 09:40:02', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561599670_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('5', '即打即贴设备', '', '2019-06-27 09:51:33', '2019-06-27 09:51:32', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600311_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('6', '有线扫码枪', '', '2019-06-27 09:52:10', '2019-06-27 09:52:09', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600335_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('7', '自动化视觉采集仪', '', '2019-06-27 09:52:36', '2019-06-27 09:52:35', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600363_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('8', '贴标、套标机', '', '2019-06-27 09:53:32', '2019-06-27 09:53:31', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600427_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('9', '工控机', '', '2019-06-27 09:54:07', '2019-06-27 09:54:05', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600452_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('10', '产线改造', '', '2019-06-27 09:54:30', '2019-06-27 09:54:28', null, null, null, null, null, null, null, null, '', '1', '9', '22', '/./Public/admin/upload/product/2019-06-27/product_1561600486_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('12', '', '', '2019-06-27 10:11:46', '2019-06-27 10:11:44', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702044_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561601502_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('13', '', '', '2019-06-27 10:21:58', '2019-06-27 10:21:57', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702108_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561605569_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('14', '', '', '2019-06-28 14:09:20', '2019-06-28 14:09:19', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702152_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561605623_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('15', '', '', '2019-06-27 11:21:02', '2019-06-27 11:21:00', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702194_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561605658_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('16', '', '', '2019-06-27 11:21:43', '2019-06-27 11:21:42', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702225_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561605700_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('17', '', '', '2019-06-28 14:11:05', '2019-06-28 14:11:04', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702247_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561605760_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('18', '', '', '2019-06-27 11:24:04', '2019-06-27 11:24:03', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702287_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561605833_23.png', '0', '1', '1', '', '', '', '', '');
INSERT INTO `productinfoes` VALUES ('19', '', '', '2019-06-27 11:24:24', '2019-06-27 11:24:23', null, null, null, null, null, null, null, null, '&lt;img src=&quot;/./Public/admin/upload/productedit/2019-06-28/productedit_1561702310_23.png&quot; alt=&quot;图片&quot; style=&quot;&quot;&gt;', '1', '11', '22', '/./Public/admin/upload/product/2019-06-27/product_1561605870_23.png', '0', '1', '1', '', '', '', '', '');

-- ----------------------------
-- Table structure for `producttypes`
-- ----------------------------
DROP TABLE IF EXISTS `producttypes`;
CREATE TABLE `producttypes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) NOT NULL,
  `Describe` varchar(255) DEFAULT NULL,
  `Lock` int(11) NOT NULL,
  `Pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of producttypes
-- ----------------------------
INSERT INTO `producttypes` VALUES ('1', '产品溯源', '-', '1', '0');
INSERT INTO `producttypes` VALUES ('2', '产品防窜', '-', '1', '0');
INSERT INTO `producttypes` VALUES ('3', '品牌防伪', '-', '1', '0');
INSERT INTO `producttypes` VALUES ('7', '产品溯源-f1', '一楼', '1', '1');
INSERT INTO `producttypes` VALUES ('8', '产品溯源-f2', '二楼', '1', '1');
INSERT INTO `producttypes` VALUES ('9', '溯源设备', 'Traceability equipment', '1', '1');
INSERT INTO `producttypes` VALUES ('10', '产品防窜-f1', '一楼', '1', '2');
INSERT INTO `producttypes` VALUES ('11', '防窜货系统功能模块', '二楼', '1', '2');

-- ----------------------------
-- Table structure for `programas`
-- ----------------------------
DROP TABLE IF EXISTS `programas`;
CREATE TABLE `programas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL COMMENT '栏目标题',
  `Describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `ReleaseDate` datetime NOT NULL COMMENT '发布日期',
  `UpdateDate` datetime DEFAULT NULL COMMENT '更新日期',
  `Lock` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Sort` int(11) DEFAULT NULL COMMENT '排序',
  `Sign` int(11) DEFAULT '0' COMMENT '标识',
  `TitleUrl` varchar(100) DEFAULT NULL COMMENT '栏目地址',
  PRIMARY KEY (`Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of programas
-- ----------------------------
INSERT INTO `programas` VALUES ('1', '首页', '首页', '2019-06-26 13:53:57', '2019-06-26 14:03:27', '1', '22', '99', '0', 'index/index');
INSERT INTO `programas` VALUES ('2', '数字营销', '数字营销', '2019-06-26 13:54:33', '2019-06-26 14:03:32', '1', '22', '98', '0', 'index/digital_marketing');
INSERT INTO `programas` VALUES ('3', '品牌防伪', '品牌防伪', '2019-06-26 13:55:40', '2019-06-26 14:03:21', '1', '22', '97', '0', 'index/brand_anti');
INSERT INTO `programas` VALUES ('4', '产品溯源', '产品溯源', '2019-06-26 13:57:06', '2019-06-26 14:03:51', '1', '22', '96', '0', 'index/product_traceability');
INSERT INTO `programas` VALUES ('5', '新闻资讯', '新闻资讯', '2019-06-26 13:57:43', '2019-06-26 14:04:09', '1', '22', '94', '0', 'index/news_information');
INSERT INTO `programas` VALUES ('6', '产品防窜', '产品防窜', '2019-06-26 13:59:45', '2019-06-26 14:04:03', '1', '22', '95', '0', 'index/products_running');
INSERT INTO `programas` VALUES ('7', '关于我们', '关于我们', '2019-06-26 14:02:04', '2019-06-26 14:04:12', '1', '22', '93', '0', 'index/about_us');

-- ----------------------------
-- Table structure for `programas_sm`
-- ----------------------------
DROP TABLE IF EXISTS `programas_sm`;
CREATE TABLE `programas_sm` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL COMMENT '栏目标题',
  `Describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `ReleaseDate` datetime NOT NULL COMMENT '发布日期',
  `UpdateDate` datetime DEFAULT NULL COMMENT '更新日期',
  `Lock` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `Sign` int(11) DEFAULT '0' COMMENT '标识',
  `Pid` int(11) DEFAULT NULL COMMENT '父级id',
  `TitleUrl` varchar(100) DEFAULT NULL COMMENT '栏目地址',
  PRIMARY KEY (`Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of programas_sm
-- ----------------------------

-- ----------------------------
-- Table structure for `recommends`
-- ----------------------------
DROP TABLE IF EXISTS `recommends`;
CREATE TABLE `recommends` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Whether` int(11) NOT NULL,
  `Lock` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recommends
-- ----------------------------

-- ----------------------------
-- Table structure for `recruiteds`
-- ----------------------------
DROP TABLE IF EXISTS `recruiteds`;
CREATE TABLE `recruiteds` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Position` varchar(100) DEFAULT NULL,
  `MonthlyPay` varchar(255) DEFAULT NULL,
  `AreaName` varchar(255) DEFAULT NULL,
  `RecruitSource` varchar(255) DEFAULT NULL,
  `ReleaseDate` datetime NOT NULL,
  `Lock` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserInfoes_User_Id` (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recruiteds
-- ----------------------------

-- ----------------------------
-- Table structure for `rmationimgs`
-- ----------------------------
DROP TABLE IF EXISTS `rmationimgs`;
CREATE TABLE `rmationimgs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Img` varchar(255) NOT NULL,
  `Lock` int(11) NOT NULL,
  `Information_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Information_Information_Id` (`Information_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rmationimgs
-- ----------------------------

-- ----------------------------
-- Table structure for `serviceinfo`
-- ----------------------------
DROP TABLE IF EXISTS `serviceinfo`;
CREATE TABLE `serviceinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(20) NOT NULL COMMENT '客服名称',
  `ServiceQQ` varchar(20) DEFAULT NULL COMMENT 'QQ',
  `ServiceMSN` varchar(50) DEFAULT NULL COMMENT 'MSN',
  `ServiceTW` varchar(50) DEFAULT NULL COMMENT '淘宝旺旺',
  `ServicealiW` varchar(50) DEFAULT NULL COMMENT '阿里旺旺',
  `ServiceSkype` varchar(20) DEFAULT NULL,
  `Sort` int(11) DEFAULT '0' COMMENT '排序',
  `Lock` tinyint(3) unsigned DEFAULT NULL COMMENT '1显示  0隐藏',
  `ReleaseDate` datetime DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of serviceinfo
-- ----------------------------
INSERT INTO `serviceinfo` VALUES ('2', '是', '4444', '444', '222', '3333', '99', '98', '1', '2019-05-17 11:30:10');
INSERT INTO `serviceinfo` VALUES ('3', 'Edward', '111', '看看', '88', '', '', '99', '1', '2019-05-17 11:41:57');
INSERT INTO `serviceinfo` VALUES ('8', '根深蒂固', '', '', '', '', '', '97', '1', '2019-05-17 13:10:24');

-- ----------------------------
-- Table structure for `smclasses`
-- ----------------------------
DROP TABLE IF EXISTS `smclasses`;
CREATE TABLE `smclasses` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SmName` varchar(100) NOT NULL,
  `Describe` varchar(255) DEFAULT NULL,
  `Sort` int(11) NOT NULL,
  `Lock` int(11) NOT NULL,
  `Lg_Id` int(11) DEFAULT NULL,
  `Sign` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `LgClasses_Lg_Id` (`Lg_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smclasses
-- ----------------------------
INSERT INTO `smclasses` VALUES ('1', '新闻中心', 'News center', '99', '1', '2', '0');
INSERT INTO `smclasses` VALUES ('2', '品牌防伪-f1', '一楼', '99', '1', '3', '0');
INSERT INTO `smclasses` VALUES ('3', '品牌防伪-f2', '二楼', '99', '1', '3', '0');
INSERT INTO `smclasses` VALUES ('4', '品牌防伪-f3', '三楼', '99', '1', '3', '0');
INSERT INTO `smclasses` VALUES ('5', '关于我们-f1', '一楼', '99', '1', '4', '0');
INSERT INTO `smclasses` VALUES ('6', '关于我们-f2', '二楼', '99', '1', '4', '0');
INSERT INTO `smclasses` VALUES ('7', '关于我们-f3', '三楼', '99', '1', '4', '0');
INSERT INTO `smclasses` VALUES ('8', '关于我们-f4', '四楼', '99', '1', '4', '0');
INSERT INTO `smclasses` VALUES ('9', '数字营销-f1', '一楼', '99', '1', '1', '0');
INSERT INTO `smclasses` VALUES ('10', '数字营销-f2', '二楼', '99', '1', '1', '0');
INSERT INTO `smclasses` VALUES ('11', '数字营销-f3', '三楼', '99', '1', '1', '0');
INSERT INTO `smclasses` VALUES ('12', '数字营销-f4', '四楼', '99', '1', '1', '0');
INSERT INTO `smclasses` VALUES ('13', '我们的客户', 'Our Customers', '99', '1', '5', '0');
INSERT INTO `smclasses` VALUES ('14', '首页-f1', '', '99', '1', '5', '0');
INSERT INTO `smclasses` VALUES ('15', '首页-f2', '二楼', '99', '1', '5', '0');
INSERT INTO `smclasses` VALUES ('16', '我们的优势', 'Our Advantages', '99', '1', '5', '0');
INSERT INTO `smclasses` VALUES ('17', '品牌防伪-f4', '四楼', '99', '1', '3', '0');
INSERT INTO `smclasses` VALUES ('18', '品牌防伪-f5', '五楼', '99', '1', '3', '0');

-- ----------------------------
-- Table structure for `statements`
-- ----------------------------
DROP TABLE IF EXISTS `statements`;
CREATE TABLE `statements` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Disclaimer` varchar(255) DEFAULT NULL,
  `Copyright` varchar(255) DEFAULT NULL,
  `Opinion` varchar(255) DEFAULT NULL,
  `SiteData` varchar(255) DEFAULT NULL,
  `Lock` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of statements
-- ----------------------------

-- ----------------------------
-- Table structure for `tallydata`
-- ----------------------------
DROP TABLE IF EXISTS `tallydata`;
CREATE TABLE `tallydata` (
  `tdid` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `cookie` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `time` int(10) NOT NULL,
  `uri` varchar(255) DEFAULT NULL COMMENT '受访页面',
  `referer` varchar(255) DEFAULT NULL COMMENT '来路页面',
  `ydns` varchar(50) DEFAULT NULL COMMENT '来路域名',
  `sdns` varchar(50) DEFAULT NULL COMMENT '受访域名',
  `browser` varchar(50) DEFAULT NULL COMMENT '浏览器',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `se` varchar(255) DEFAULT NULL COMMENT '搜索引擎',
  PRIMARY KEY (`tdid`)
) ENGINE=InnoDB AUTO_INCREMENT=533 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tallydata
-- ----------------------------
INSERT INTO `tallydata` VALUES ('63', '127.0.0.1', 'dd82ade0f7eb470a64b78e724d0880af', '2019-06-20', '1560995561', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('64', '127.0.0.1', '4c573ce613c3f74c441f7fcc885ea42a', '2019-06-27', '1561596766', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('65', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691031', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('66', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691058', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('67', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691131', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('68', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691244', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('69', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691587', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('70', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691590', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('71', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691592', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('72', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561691609', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('73', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692094', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('74', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692140', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('75', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692179', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('76', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692191', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('77', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692214', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('78', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692252', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('79', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692471', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('80', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692540', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('81', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692587', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('82', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692615', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('83', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561692632', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('84', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561694209', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('85', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561694401', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_detail.html?id=2', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('86', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561694422', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('87', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561694565', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('88', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561694675', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('89', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561694892', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('90', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561694925', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('91', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695137', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('92', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695179', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('93', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695201', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('94', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695221', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('95', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695255', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('96', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695312', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('97', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695620', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('98', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695655', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('99', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695732', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('100', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561695756', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('101', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561696026', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('102', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561696064', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('103', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561696408', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('104', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561696415', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('105', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561696498', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('106', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561696500', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('107', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561696554', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('108', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697030', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('109', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697082', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('110', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697091', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('111', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697205', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('112', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697257', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('113', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697407', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('114', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697526', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('115', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697536', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('116', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697561', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('117', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697617', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('118', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697734', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('119', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561697767', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('120', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698427', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('121', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698442', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('122', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698479', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('123', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698567', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('124', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698594', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('125', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698620', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('126', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698761', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('127', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698766', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('128', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698910', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('129', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698965', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('130', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561698996', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('131', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699061', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('132', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699143', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('133', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699199', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('134', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699226', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('135', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699458', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('136', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699548', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('137', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699583', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('138', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699633', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('139', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699641', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('140', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699849', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('141', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699854', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('142', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699878', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('143', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699909', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('144', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699942', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('145', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699950', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('146', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561699977', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('147', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700006', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('148', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700045', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('149', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700047', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('150', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700094', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('151', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700193', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('152', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700433', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('153', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700478', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('154', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700491', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('155', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700540', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('156', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700611', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('157', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700639', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('158', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700653', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('159', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700678', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('160', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700729', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('161', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700777', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('162', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700791', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('163', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700853', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('164', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561700904', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('165', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561701327', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('166', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561701404', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('167', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561701504', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('168', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561701651', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('169', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561701654', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('170', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561701715', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('171', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561701723', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('172', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702565', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('173', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702589', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('174', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702612', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('175', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702626', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('176', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702647', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('177', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702701', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('178', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702743', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('179', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702754', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('180', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702763', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('181', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702837', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('182', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702846', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('183', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702924', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('184', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702933', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('185', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702954', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('186', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702961', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('187', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702982', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('188', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561702997', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('189', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703029', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('190', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703430', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('191', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703447', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('192', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703479', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('193', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703517', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('194', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703797', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('195', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703850', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('196', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703869', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('197', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703890', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('198', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703910', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('199', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703950', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('200', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703962', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('201', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703989', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('202', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561703999', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('203', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704015', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('204', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704052', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('205', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704068', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('206', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704098', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('207', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704117', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('208', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704124', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('209', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704143', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('210', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704168', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('211', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704208', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('212', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704222', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('213', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704234', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('214', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704254', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('215', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704272', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('216', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704290', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('217', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704317', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('218', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704403', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('219', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704423', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('220', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704446', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('221', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704474', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('222', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704574', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('223', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704903', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('224', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704964', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('225', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561704995', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('226', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705223', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('227', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705238', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('228', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705340', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('229', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705380', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('230', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705444', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('231', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705642', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('232', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705658', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('233', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705827', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('234', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705928', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('235', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561705997', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('236', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706009', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('237', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706054', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('238', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706063', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('239', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706075', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('240', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706166', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('241', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706191', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('242', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706303', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('243', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706367', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('244', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706467', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('245', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706523', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('246', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706563', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('247', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706580', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('248', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706617', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('249', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706626', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('250', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706638', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('251', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706652', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('252', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706682', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('253', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706742', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('254', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706754', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('255', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706761', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('256', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706774', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('257', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706784', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('258', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706857', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('259', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706871', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('260', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561706947', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('261', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707003', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('262', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707012', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('263', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707083', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('264', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707113', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('265', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707209', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('266', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707224', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('267', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707250', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('268', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707281', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('269', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707292', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('270', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707310', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('271', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707336', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('272', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707362', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('273', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707468', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('274', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707865', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('275', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561707924', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('276', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561708089', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('277', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561708974', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('278', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709011', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('279', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709235', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('280', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709274', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('281', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709407', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('282', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709467', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('283', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709493', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('284', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709532', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('285', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709615', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('286', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709622', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('287', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709652', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('288', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709677', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('289', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709717', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('290', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709830', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('291', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561709848', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('292', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710006', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('293', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710025', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('294', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710064', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('295', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710132', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('296', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710225', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('297', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710231', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('298', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710400', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('299', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710508', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('300', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561710513', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('301', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561711349', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('302', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561712897', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('303', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713036', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('304', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713170', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('305', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713202', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('306', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713214', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('307', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713245', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('308', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713254', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('309', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713319', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('310', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713351', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('311', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713392', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('312', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713530', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('313', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713558', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('314', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713589', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('315', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713607', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('316', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713618', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('317', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713629', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('318', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713644', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('319', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713655', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('320', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713679', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('321', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713689', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('322', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713712', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('323', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561713994', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('324', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714013', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('325', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714031', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('326', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714094', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('327', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714268', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('328', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714270', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('329', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714273', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('330', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714388', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('331', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714390', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('332', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714503', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('333', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714645', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('334', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714663', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('335', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714727', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('336', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714805', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('337', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714837', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('338', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714852', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('339', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714867', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('340', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714885', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('341', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714914', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('342', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714942', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('343', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561714952', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('344', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715008', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('345', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715010', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('346', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715013', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('347', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715015', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('348', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715017', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('349', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715021', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('350', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715121', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('351', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715158', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('352', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715272', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('353', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715298', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('354', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-06-28', '1561715427', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('355', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561944480', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('356', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561945389', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('357', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561945422', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('358', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561945459', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('359', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561945489', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('360', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561946013', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('361', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561946187', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('362', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561946315', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('363', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561946373', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('364', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561946463', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('365', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561946566', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('366', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561946741', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('367', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947175', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('368', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947215', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('369', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947258', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('370', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947338', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('371', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947363', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('372', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947451', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('373', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947475', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('374', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947523', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('375', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947610', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('376', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947724', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('377', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947749', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('378', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947807', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('379', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947843', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('380', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947858', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('381', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947877', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('382', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947916', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('383', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561947961', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('384', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948011', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('385', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948064', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('386', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948079', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('387', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948137', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('388', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948433', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('389', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948655', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('390', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948709', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('391', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561948990', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('392', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949067', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('393', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949127', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('394', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949152', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('395', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949204', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('396', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949573', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('397', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949617', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('398', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949641', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('399', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949655', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('400', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561949706', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('401', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950083', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('402', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950354', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('403', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950370', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('404', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950434', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('405', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950492', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('406', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950578', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('407', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950603', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('408', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950746', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('409', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950784', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('410', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950866', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('411', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950908', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('412', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561950993', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('413', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951012', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('414', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951108', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('415', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951119', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('416', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951154', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('417', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951184', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('418', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951197', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('419', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951212', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('420', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951233', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('421', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951260', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('422', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951265', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('423', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951293', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('424', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951303', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('425', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561951322', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('426', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561959473', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('427', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561959590', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('428', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561959620', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('429', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561959683', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('430', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561959807', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('431', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561959860', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('432', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561964637', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('433', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561964680', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('434', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561971861', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('435', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-01', '1561974770', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('436', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562028981', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('437', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562028984', 'www.subject.com/Home/tallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('438', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562031563', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('439', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562033623', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('440', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562033767', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('441', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562033812', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('442', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034073', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('443', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034109', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('444', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034413', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('445', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034449', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('446', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034474', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('447', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034499', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('448', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034536', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('449', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034542', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index/digital_marketing', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('450', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034577', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index/digital_marketing', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('451', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034580', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('452', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034586', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('453', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034590', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('454', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562034593', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('455', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562036433', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('456', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562036508', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('457', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562036529', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('458', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562036767', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('459', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562036798', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('460', '127.0.0.1', 'd87f308e8ebb42ccfbaaea194e7748b1', '2019-07-02', '1562036832', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('461', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562045784', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('462', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562045785', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('463', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562045945', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('464', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562045959', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('465', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562046433', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('466', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562049163', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('467', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562049266', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('468', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562049301', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('469', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562055316', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('470', '127.0.0.1', 'f9743f02cd188c9bd8e2cb3fe7b442ea', '2019-07-02', '1562056659', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('471', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058000', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('472', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058002', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('473', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058068', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('474', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058137', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('475', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058150', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('476', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058190', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('477', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058222', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('478', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058357', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('479', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058364', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('480', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058371', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('481', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058386', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('482', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058392', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('483', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058492', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('484', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058524', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('485', '127.0.0.1', 'c2082d6e240dafea0883f5ce488c2688', '2019-07-02', '1562058544', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('486', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060662', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('487', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060681', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('488', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060700', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('489', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060717', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('490', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060723', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('491', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060757', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('492', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060765', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('493', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060784', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('494', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060794', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('495', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060801', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('496', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060816', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('497', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060838', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('498', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060947', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('499', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060981', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('500', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562060999', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('501', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562061038', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('502', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562061048', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('503', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562061056', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('504', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562061073', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('505', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562061249', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('506', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-02', '1562061254', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('507', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-03', '1562115281', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('508', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-03', '1562119685', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('509', '127.0.0.1', 'dd5a8e0294ad38b7238ca6c3c329a7fc', '2019-07-03', '1562119693', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('510', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119709', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('511', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119720', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('512', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119735', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('513', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119755', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('514', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119771', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/product_traceability.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('515', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119781', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/products_running.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('516', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119811', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/news_information.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('517', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119821', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('518', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119922', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('519', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562119995', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('520', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562120000', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('521', '127.0.0.1', 'cf4b098fc6108fdee434a023d9df7de5', '2019-07-03', '1562120008', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('522', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120302', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('523', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120356', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/brand_anti.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('524', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120403', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('525', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120538', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('526', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120584', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('527', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120615', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('528', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120694', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('529', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120705', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('530', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562120720', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/digital_marketing.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('531', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562121226', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/about_us.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');
INSERT INTO `tallydata` VALUES ('532', '127.0.0.1', '0ebae1505591762e1e4bf6b2997475df', '2019-07-03', '1562121282', 'www.subject.com/Home/TallyTotal/index.html', 'http://www.subject.com/Home/index/index.html', 'www.subject.com', 'www.subject.com', 'Chrome', '其他', '其他');

-- ----------------------------
-- Table structure for `userinfoes`
-- ----------------------------
DROP TABLE IF EXISTS `userinfoes`;
CREATE TABLE `userinfoes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `LoginName` varchar(100) NOT NULL COMMENT '登录名',
  `LoginPwd` varchar(255) NOT NULL COMMENT '登录密码',
  `UserRealName` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  `UserPortrait` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `UserAge` int(11) DEFAULT NULL COMMENT '用户年龄',
  `UserSex` varchar(4) DEFAULT NULL COMMENT '用户性别',
  `UserAddress` varchar(150) DEFAULT NULL COMMENT '用户地址',
  `UserEmail` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `UserPhone` varchar(20) DEFAULT NULL COMMENT '用户手机号',
  `LoginCount` int(11) NOT NULL COMMENT '用户登录次数',
  `UserRegistrTime` datetime NOT NULL COMMENT '用户注册时间',
  `LastLoginTime` datetime DEFAULT NULL COMMENT '用户最后登录时间',
  `Lock` int(11) NOT NULL DEFAULT '1' COMMENT '1可用，0禁用',
  `Type_Id` int(11) DEFAULT NULL COMMENT '用户类型编号',
  `Identifier` varchar(32) DEFAULT NULL COMMENT '身份标识',
  `Token` varchar(32) DEFAULT NULL COMMENT '唯一值',
  `Outtime` datetime DEFAULT NULL COMMENT '过期时间',
  `UpdateTime` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`LoginName`) USING BTREE,
  KEY `UserTypes_Type_Id` (`Type_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userinfoes
-- ----------------------------
INSERT INTO `userinfoes` VALUES ('22', 'admin', 'acc4cfc0773695795955f187d86342c3', '测试', '', null, '男', '上海市闵行区', '22@qq.com', '15639277320', '74', '2019-04-30 14:53:16', '2019-07-03 10:20:44', '1', '1', '18da57695787690fe96a3ca1e6c73c4a', '2a171a2577bbd1320864b9f8be7ca7b2', '2019-06-18 16:12:38', '2019-05-29 17:33:22');
INSERT INTO `userinfoes` VALUES ('57', '李四', 'e10adc3949ba59abbe56e057f20f883e', '李四', '/./Public/admin/upload/userpic/2019-05-15/userpic_1557884769_58.jpg', null, '女', '11', '222@qq.com', '15639277811', '9', '2019-05-06 15:37:19', '2019-07-02 09:26:56', '1', '2', null, null, null, '2019-05-29 18:06:13');
INSERT INTO `userinfoes` VALUES ('58', '王五', 'e10adc3949ba59abbe56e057f20f883e', '王五', '/./Public/admin/upload/userpic/2019-05-15/userpic_1557885742_59.gif', null, '男', null, '214@qq.com', '15639652365', '1', '2019-05-06 15:39:03', '2019-05-15 09:59:25', '1', '5', 'bdcfc8ff087b9c5e24cd4a315496dd3f', '54974d50c4d729d86ea52391c5c98440', '2019-05-22 09:59:25', null);
INSERT INTO `userinfoes` VALUES ('59', '赵柳', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, '222@163.com', '15636985326', '0', '2019-05-15 13:39:26', null, '1', null, null, null, null, null);
