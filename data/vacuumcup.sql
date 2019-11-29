-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-11-29 17:56:29
-- 服务器版本： 10.1.37-MariaDB-0+deb9u1
-- PHP 版本： 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `vacuumcup`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin DEFAULT '' COMMENT '用户名',
  `password` varchar(32) COLLATE utf8_bin DEFAULT '' COMMENT '密码',
  `portrait` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '头像',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) DEFAULT '0' COMMENT '最后登录时间',
  `real_name` varchar(20) COLLATE utf8_bin DEFAULT '' COMMENT '真实姓名',
  `status` int(1) DEFAULT '0' COMMENT '状态',
  `groupid` int(11) DEFAULT '1' COMMENT '用户角色id',
  `token` varchar(32) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `portrait`, `loginnum`, `last_login_ip`, `last_login_time`, `real_name`, `status`, `groupid`, `token`) VALUES
(1, 'admin', '218dbb225911693af03a713581a7227f', '20181122\\admin.jpeg', 1219, '0.0.0.0', 1570411300, 'admin', 1, 1, '1ac2fc424c64cdf80db98a246f439287'),
(40, 'admin11', '218dbb225911693af03a713581a7227f', '20190723\\000b82227bbcd51c88f11707b8910548.jpg', 1, '127.0.0.1', 1564458954, '飒飒', 1, 25, 'b102926385004ac0f229c68070bc840a');

-- --------------------------------------------------------

--
-- 表的结构 `auth_group`
--

CREATE TABLE `auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `org_num` int(11) NOT NULL DEFAULT '0' COMMENT '组织编号',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_group`
--

INSERT INTO `auth_group` (`id`, `title`, `org_num`, `status`, `rules`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 0, 1, '', 1561010232, 1561010232),
(25, '阿萨大大1', 0, 1, '1,2,9,10,11,12,3,30,31,32,33,34,4,35,36,37,38,39,61,62,63', 1563866342, 1563866342),
(26, '阿萨大大111', 0, 1, '1,2,9,10,11,12,3,30,31,32,33,34,4,35,36,37,38,39,61,62,63', 1563878015, 1563878015);

-- --------------------------------------------------------

--
-- 表的结构 `auth_group_access`
--

CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_group_access`
--

INSERT INTO `auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(40, 25);

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `css` varchar(20) NOT NULL DEFAULT '' COMMENT '样式',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_rule`
--

INSERT INTO `auth_rule` (`id`, `name`, `title`, `type`, `status`, `css`, `condition`, `pid`, `sort`, `create_time`, `update_time`) VALUES
(1, '#', '系统管理', 1, 1, 'fa fa-gear', '', 0, 20, 1556269085, 1556269105),
(2, 'admin/admin/index', '管理员管理', 1, 1, '', '', 1, 1, 1556269085, 1556269105),
(3, 'admin/role/index', '角色管理', 1, 1, '', '', 1, 2, 1556269085, 1556269105),
(4, 'admin/menu/index', '菜单管理', 1, 1, '', '', 1, 3, 1556269085, 1556269105),
(5, '#', '数据库管理', 1, 1, 'fa fa-database', '', 0, 19, 1556269085, 1556269105),
(6, 'admin/data/index', '数据库备份', 1, 1, '', '', 5, 1, 1556269085, 1556269105),
(7, 'admin/data/optimize', '优化表', 1, 1, '', '', 6, 50, 1556269085, 1556269105),
(8, 'admin/data/repair', '修复表', 1, 1, '', '', 6, 50, 1556269085, 1556269105),
(9, 'admin/admin/adminAdd', '添加管理员', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
(10, 'admin/admin/adminEdit', '编辑管理员', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
(11, 'admin/admin/adminDel', '删除管理员', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
(12, 'admin/admin/user_state', '管理员状态', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
(13, '#', '日志管理', 1, 1, 'fa fa-tasks', '', 0, 18, 1556269085, 1556269105),
(14, 'admin/log/operate_log', '行为日志', 1, 1, '', '', 13, 50, 1556269085, 1556269105),
(22, 'admin/log/del_log', '删除日志', 1, 1, '', '', 14, 50, 1556269085, 1556269105),
(27, 'admin/data/import', '数据库还原', 1, 1, '', '', 5, 2, 1556269085, 1556269105),
(28, 'admin/data/revert', '还原', 1, 1, '', '', 27, 50, 1556269085, 1556269105),
(29, 'admin/data/del', '删除', 1, 1, '', '', 27, 50, 1556269085, 1556269105),
(30, 'admin/role/roleAdd', '添加角色', 1, 1, '', '', 3, 50, 1556269085, 1556269105),
(31, 'admin/role/roleEdit', '编辑角色', 1, 1, '', '', 3, 50, 1556269085, 1556269105),
(32, 'admin/role/roleDel', '删除角色', 1, 1, '', '', 3, 50, 1556269085, 1556269105),
(33, 'admin/role/role_state', '角色状态', 1, 1, '', '', 3, 50, 1556269085, 1556269105),
(34, 'admin/role/giveAccess', '权限分配', 1, 1, '', '', 3, 50, 1556269085, 1556269105),
(35, 'admin/menu/add_rule', '添加菜单', 1, 1, '', '', 4, 50, 1556269085, 1556269105),
(36, 'admin/menu/edit_rule', '编辑菜单', 1, 1, '', '', 4, 50, 1556269085, 1556269105),
(37, 'admin/menu/del_rule', '删除菜单', 1, 1, '', '', 4, 50, 1556269085, 1556269105),
(38, 'admin/menu/rule_state', '菜单状态', 1, 1, '', '', 4, 50, 1556269085, 1556269105),
(39, 'admin/menu/ruleorder', '菜单排序', 1, 1, '', '', 4, 50, 1556269085, 1556269105),
(61, 'admin/config/index', '配置管理', 1, 1, '', '', 1, 4, 1556269085, 1556269105),
(62, 'admin/config/index', '配置列表', 1, 1, '', '', 61, 50, 1556269085, 1556269105),
(63, 'admin/config/save', '保存配置', 1, 1, '', '', 61, 50, 1556269085, 1556269105),
(314, '#', ' 用户管理', 1, 1, 'fa fa-tasks', '', 0, 50, 1563866896, NULL),
(315, 'admin/user/index', '用户列表', 1, 1, '', '', 314, 50, 1563867755, NULL),
(316, '#', '产品管理', 1, 1, 'fa fa-tasks', '', 0, 50, 1563935619, NULL),
(317, 'admin/goods/index', '产品列表', 1, 1, '', '', 316, 50, 1563935838, NULL),
(318, 'admin/goods/type_index', '产品类别', 1, 1, '', '', 316, 50, 1563952806, NULL),
(319, '#', '首页管理', 1, 1, 'fa fa-tasks', '', 0, 50, 1563956531, NULL),
(320, 'admin/homepage/advertise_index', '首页广告', 1, 1, '', '', 319, 50, 1563956752, NULL),
(321, 'admin/homepage/index', '首页商品', 1, 1, '', '', 319, 50, 1563957000, NULL),
(322, '#', '介绍管理', 1, 1, 'fa fa-tasks', '', 0, 51, 1564024256, NULL),
(323, 'admin/content/index', '企业介绍', 1, 1, '', '', 322, 50, 1564024370, NULL),
(324, 'admin/user/addUser', '用户添加', 1, 1, '', '', 315, 50, 1564120952, NULL),
(325, 'admin/user/editUser', '用户修改', 1, 1, '', '', 315, 50, 1564121005, NULL),
(326, 'admin/user/delUser', '用户删除', 1, 1, '', '', 315, 50, 1564121083, NULL),
(327, 'admin/user/userStatus', '用户状态', 1, 1, '', '', 315, 50, 1564121222, NULL),
(328, 'admin/goods/addGoods', '产品添加', 1, 1, '', '', 317, 50, 1564121005, NULL),
(329, 'admin/goods/editGoods', '产品修改', 1, 1, '', '', 317, 50, 1564121005, NULL),
(330, 'admin/goods/delGoods', '产品删除', 1, 1, '', '', 317, 50, 1564121005, NULL),
(331, 'admin/goods/GoodsIsup', '产品是否推送', 1, 1, '', '', 317, 50, 1564121005, NULL),
(332, 'admin/goods/GoodsIspush', '产品是否上架', 1, 1, '', '', 317, 50, 1564121005, NULL),
(333, 'admin/goods/addType', '产品类型添加', 1, 1, '', '', 318, 50, 1564121005, NULL),
(334, 'admin/goods/editType', '产品类型修改', 1, 1, '', '', 318, 50, 1564121005, NULL),
(335, 'admin/goods/delType', '产品类型删除', 1, 1, '', '', 318, 50, 1564121005, NULL),
(336, 'admin/homepage/addAdvertise', '首页广告添加', 1, 1, '', '', 320, 50, 1564121005, NULL),
(337, 'admin/homepage/editAdvertise', '首页广告修改', 1, 1, '', '', 320, 50, 1564121005, NULL),
(338, 'admin/homepage/delAdvertise_', '首页广告删除', 1, 1, '', '', 320, 50, 1564121005, NULL),
(339, 'admin/goods/GoodsIsup', '首页商品撤回', 1, 1, '', '', 321, 50, 1564121005, NULL),
(340, 'admin/content/edit', '修改企业介绍', 1, 1, '', '', 323, 50, 1564121005, NULL),
(354, 'admin/news/index', '信息列表', 1, 1, '', '', 353, 50, 1564132506, NULL),
(355, 'admin/news/Content_details', '查看详情', 1, 1, '', '', 354, 50, 1564135574, NULL),
(359, 'admin/join/Content_details', '商家详情', 1, 1, '', '', 357, 50, 1564137208, NULL),
(360, '#', '过往荣誉', 1, 1, 'fa fa-tasks', '', 0, 54, 1564137263, NULL),
(361, 'admin/honor/index', '荣誉列表', 1, 1, '', '', 360, 50, 1564137414, NULL),
(363, 'admin/honor/Content_details', '荣誉详情', 1, 1, '', '', 361, 50, 1564137493, NULL),
(364, 'admin/honor/add_honor', '添加荣誉', 1, 1, '', '', 361, 50, 1564137528, NULL),
(365, 'admin/honor/edit_honor', '编辑荣誉', 1, 1, '', '', 361, 50, 1564137563, NULL),
(367, 'admin/honor/del_honor', '删除荣誉', 1, 1, '', '', 361, 50, 1564137617, NULL),
(368, 'admin/join/delJoin', '删除信息', 1, 1, '', '', 357, 50, 1564193311, NULL),
(371, 'admin/private/delOrder', '订单删除', 1, 1, '', '', 352, 50, 1564469920, NULL),
(372, 'admin/join/Release_details', '发布详情', 1, 1, '', '', 369, 50, 1564470026, NULL),
(373, 'admin/join/editRelease', '修改发布', 1, 1, '', '', 369, 50, 1564470067, NULL),
(374, 'user/join/addRelease', '添加发布', 1, 1, '', '', 369, 50, 1564470106, NULL),
(375, 'user/join/delRelease', '删除发布', 1, 1, '', '', 369, 50, 1564470131, NULL),
(379, 'admin/goods/img_index', '产品图片', 1, 1, '', '', 316, 50, 1564470357, NULL),
(380, 'admin/goods/addimg', '添加图片', 1, 1, '', '', 379, 50, 1564470404, NULL),
(381, 'admin/goods/editimg', '修改图片', 1, 1, '', '', 379, 50, 1564470457, NULL),
(382, 'admin/goods/delimg', '删除图片', 1, 1, '', '', 379, 50, 1564470490, NULL),
(383, 'admin/homepage/title_index', '首页标题', 1, 1, '', '', 319, 50, 1565401369, NULL),
(385, 'admin/homepage/titleEdit', '首页标题修改', 1, 1, '', '', 383, 50, 1565401499, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'web_site_title', 'www.tinyauinvest .com'),
(2, 'web_site_description', '项目管理系统'),
(3, 'web_site_keyword', '项目管理系统'),
(4, 'web_site_icp', '粤ICP备15002349号-1'),
(5, 'web_site_cnzz', ''),
(6, 'web_site_copy', 'Copyright © 2019 项目管理系统 All rights reserved.'),
(7, 'web_site_close', '1'),
(8, 'list_rows', '5'),
(9, 'admin_allow_ip', NULL),
(10, 'alisms_appkey', ''),
(11, 'alisms_appsecret', ''),
(12, 'alisms_signname', '注册验证'),
(13, 'words_is_audit', '0'),
(14, 'comment_is_audit', '0'),
(15, 'device_is_audit', '0'),
(16, 'wechat_appkey', '123'),
(17, 'wechat_appsecret', '123');

-- --------------------------------------------------------

--
-- 表的结构 `content_business`
--

CREATE TABLE `content_business` (
  `id` int(12) UNSIGNED NOT NULL COMMENT '主键',
  `content` longtext NOT NULL COMMENT '内容',
  `create_time` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `content_business`
--

INSERT INTO `content_business` (`id`, `content`, `create_time`) VALUES
(1, '<h1 style=\"  text-align: center;\">&nbsp;&nbsp; 关于我们<br></h1><p><br><img src=\"http://localhost:96/uploads/content_img/2019-09-24/5d89fe0668240.jpg\" style=\"max-width:100%;\"><br></p><p>关于我们内容，后台编辑<br></p><p><br></p>', 1555669796);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `id` int(12) UNSIGNED NOT NULL COMMENT ' 主键',
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `keyname` varchar(255) NOT NULL COMMENT '关键字',
  `type_id` int(10) NOT NULL COMMENT '产品类别id',
  `price` decimal(11,2) NOT NULL COMMENT '单价',
  `descr` text NOT NULL COMMENT '商品描述',
  `num` int(12) NOT NULL COMMENT '库存',
  `path` varchar(255) NOT NULL COMMENT '缩略图路径',
  `url` varchar(255) NOT NULL COMMENT '缩略图链接',
  `is_push` tinyint(2) NOT NULL COMMENT '是否推送首页 0：不推送 1：推送',
  `is_up` tinyint(2) NOT NULL COMMENT '是否上架 0：不上架 1：上架',
  `browse_num` int(11) NOT NULL COMMENT '浏览量',
  `create_time` int(20) NOT NULL COMMENT '添加时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `name`, `keyname`, `type_id`, `price`, `descr`, `num`, `path`, `url`, `is_push`, `is_up`, `browse_num`, `create_time`) VALUES
(22, 'user/index', '测试', 13, '21313.01', '', 552, '/uploads/goods/20190808/bdd8a3dc919c0e04da7be8a851c6f910.jpg', '', 1, 1, 0, 1565247122),
(15, '测试', '测试', 13, '56.00', '', 552, '/uploads/goods/20190808/dab3d3fa152351a64577730564fffdc3.jpg', '', 1, 1, 0, 1564559373);

-- --------------------------------------------------------

--
-- 表的结构 `goods_img`
--

CREATE TABLE `goods_img` (
  `id` int(12) UNSIGNED NOT NULL COMMENT '主键',
  `goods_id` int(12) NOT NULL COMMENT '商品id',
  `path` varchar(255) NOT NULL COMMENT '图片路径',
  `create_time` int(20) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods_img`
--

INSERT INTO `goods_img` (`id`, `goods_id`, `path`, `create_time`) VALUES
(24, 20, '/uploads/goods_img/2019-07-31/5d4153c17a9de.jpg', 1564562414),
(25, 20, '/uploads/goods_img/2019-07-31/5d4153c6986b7.jpg', 1564562414),
(26, 20, '/uploads/goods_img/2019-07-31/5d4153ca43d10.jpg', 1564562414);

-- --------------------------------------------------------

--
-- 表的结构 `goods_type`
--

CREATE TABLE `goods_type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `type_descr` varchar(255) NOT NULL COMMENT '类型描述',
  `pid` int(12) NOT NULL COMMENT '上级id',
  `path` varchar(255) NOT NULL COMMENT '缩略图路径',
  `is_up` varchar(255) DEFAULT NULL COMMENT '是否上架',
  `create_time` int(20) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods_type`
--

INSERT INTO `goods_type` (`id`, `title`, `type_descr`, `pid`, `path`, `is_up`, `create_time`) VALUES
(13, '测试标题', '测试描述测试描述测试描述测试描述测试描述测试描述测试描测试描述测试描述', 0, '/uploads/goods_type/20190808/e122754fab2e02da518900e3eb24f345.jpg', NULL, 1564559324),
(12, '测试标题', '测试测试描述测试描述测试描述测试描述测试描述测试描述测试描述测试描述', 0, '/uploads/goods_type/20190808/5159d30ccf66a51fb80ed8ea69c128d1.jpg', NULL, 1564559315),
(14, '测试标题', '测试描述测试描述测试描述测试描述测试描述测试描述', 0, '/uploads/goods_type/20190808/849c15d023039ce5aa4e084331b073ce.jpg', NULL, 1564559338),
(15, '测试标题', '测试描述测试描述测试描述测试描述测试描述测试描述测试描述测试描述测试描述测试描述', 0, '/uploads/goods_type/20190808/1ed92d21cafed053d4043728aec3e534.jpg', NULL, 1564559348),
(16, '测试标题', '描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述', 0, '/uploads/goods_type/20190808/89e5347f8cacf7ea4c0a3ef8e2d922b0.jpg', NULL, 1565247027),
(17, '测试标题', '测试描述测试描述测试描述测试描述测试描述测试描述', 0, '/uploads/goods_type/20190924/d99edfe338dea61eba1e95fb82ca631f.jpg', NULL, 1565268164);

-- --------------------------------------------------------

--
-- 表的结构 `homepage_advertise`
--

CREATE TABLE `homepage_advertise` (
  `id` int(12) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `goods_id` int(12) NOT NULL COMMENT '商品id',
  `create_time` int(20) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `homepage_advertise`
--

INSERT INTO `homepage_advertise` (`id`, `path`, `goods_id`, `create_time`) VALUES
(16, '/uploads/homepage_advertise/20190924/5b3fc0d10256890e23ce4c69500fda0c.jpeg', 22, 1569324478);

-- --------------------------------------------------------

--
-- 表的结构 `honor`
--

CREATE TABLE `honor` (
  `id` int(12) NOT NULL COMMENT '主键',
  `title_img` varchar(255) NOT NULL COMMENT '标题图',
  `content_descr` longtext NOT NULL COMMENT '内容描述',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `path` varchar(255) NOT NULL COMMENT '图片路径',
  `content` longtext NOT NULL,
  `create_time` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `honor`
--

INSERT INTO `honor` (`id`, `title_img`, `content_descr`, `title`, `path`, `content`, `create_time`) VALUES
(15, '/uploads/honor_title/20190808/11752fea687c9b3b1ce9e1e9fa66309b.jpg', '这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描述内容这是描', '过往荣誉', 'http://vacuumcup.laoma-app.com/uploads/honor_img/2019-07-31/5d414bf1e4d7d.jpghttp://localhost:96/uploads/honor_img/2019-10-07/5d9ab0216e2c8.jpghttp://vacuumcup.laoma-app.com/uploads/honor_img/2019-07-31/5d414bf562b44.jpg', '<div><div><div><div><p><img src=\"http://vacuumcup.laoma-app.com/uploads/honor_img/2019-07-31/5d414bf1e4d7d.jpg\" style=\"max-width:100%;\"><img src=\"http://localhost:96/uploads/honor_img/2019-10-07/5d9ab0216e2c8.jpg\" style=\"color: inherit; max-width: 100%;\"><img src=\"http://vacuumcup.laoma-app.com/uploads/honor_img/2019-07-31/5d414bf562b44.jpg\" style=\"color: inherit; max-width: 100%;\"></p></div><p><br></p></div><p><br></p></div><p><br></p></div><p><br></p>', 1564560374),
(16, '/uploads/honor_title/20190808/9c629b92f61c471add8846b79699eae9.jpg', '过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉', '过往荣誉', '', '<p>过往荣誉<span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span><span style=\"color: inherit;\">过往荣誉</span></p>', 1565268270),
(17, '/uploads/honor_title/20190924/e5e4ecd1c939219539bc8573dab5b25c.jpg', '过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉过往荣誉', '过往荣誉过往荣誉过往荣誉', '', '<p>好的</p>', 1565268291);

-- --------------------------------------------------------

--
-- 表的结构 `join`
--

CREATE TABLE `join` (
  `id` int(12) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `cp_name` varchar(255) NOT NULL COMMENT '加盟商名称',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '类型 0:招商 1:质询',
  `mobile` varchar(20) NOT NULL COMMENT '联系方式',
  `content` longtext NOT NULL COMMENT '自我描述',
  `create_time` int(12) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `join`
--

INSERT INTO `join` (`id`, `title`, `cp_name`, `type`, `mobile`, `content`, `create_time`) VALUES
(1, '', '测试公司', 0, '13324795649', '<p><img src=\"http://vacuumcup.laoma-app.com/uploads/release_img/2019-07-31/5d414be00d786.jpg\" style=\"max-width:100%;\"><br></p>', 1564560352),
(10, '', '公司名称', 0, '手机', '内容', 1565233760),
(11, '咨询测试', 'XIAOYI WU', 0, '136107230@qq.com', '测试', 1565233876),
(12, '', '公司名称', 0, '手机', '内容', 1565234080),
(13, '联系测试', 'XIAOYI WU', 0, '136107230@qq.com', '1', 1565234584),
(14, '加盟测试', 'XIAOYI WU', 0, '136107230@qq.com', '1', 1565234627),
(15, '1', 'XIAOYI WU', 0, '136107230@qq.com', '撒', 1565234971),
(16, '', '', 0, '', '', 1565234981),
(17, '我的主题', 'XIAOYI WU', 0, 'wuxiaoyi1228@gmail.c', '我的内容', 1565242251),
(18, '我的主题', '测试公司', 0, '136107230@qq.com', '我的内容', 1565242300),
(19, 'hezuo', 'tu', 1, '52629229', '0.0.0.0.0.0', 1565591934);

-- --------------------------------------------------------

--
-- 表的结构 `join_release`
--

CREATE TABLE `join_release` (
  `id` int(12) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '项目标题',
  `content` longtext NOT NULL COMMENT '具体内容',
  `mobile` varchar(20) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `path` varchar(255) NOT NULL COMMENT '图片路径',
  `email` varchar(64) NOT NULL,
  `create_time` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `join_release`
--

INSERT INTO `join_release` (`id`, `title`, `content`, `mobile`, `qq`, `path`, `email`, `create_time`) VALUES
(21, '测试', '<p><img src=\"http://vacuumcup.laoma-app.com/uploads/release_img/2019-07-31/5d414be00d786.jpg\" style=\"max-width:100%;\"><br></p>', '18971231231', '12313321', 'http://vacuumcup.laoma-app.com/uploads/release_img/2019-07-31/5d414be00d786.jpg', '21231323@das.com', 1564560352);

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `admin_name` varchar(50) DEFAULT NULL COMMENT '用户姓名',
  `title` varchar(225) NOT NULL DEFAULT '' COMMENT '标题',
  `description` varchar(300) DEFAULT NULL COMMENT '描述',
  `ip` char(60) DEFAULT NULL COMMENT 'IP地址',
  `status` tinyint(1) DEFAULT NULL COMMENT '1 成功 2 失败',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`log_id`, `admin_id`, `admin_name`, `title`, `description`, `ip`, `status`, `add_time`) VALUES
(1, 1, 'admin', 'admin', '用户【admin】登录成功', '0.0.0.0', 1, 1561357420),
(2, 1, 'admin', 'admin', '用户【admin】登录成功', '0.0.0.0', 1, 1561357904),
(4, 1, 'admin', '添加后台用户', '用户【gjg】添加成功', '127.0.0.1', NULL, 1563866371),
(5, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563866728),
(354, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.74', 1, 1565317154),
(7, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563866759),
(8, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563866771),
(9, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563866782),
(10, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563866896),
(11, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563866976),
(12, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563867704),
(13, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563867755),
(23, 1, 'admin', '修改用户状态', '开启用户【admin11】成功。', '127.0.0.1', 2, 1563875386),
(24, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875388),
(25, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875404),
(26, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875407),
(27, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875409),
(28, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875414),
(29, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875417),
(30, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875543),
(31, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875545),
(32, 1, 'admin', '修改用户状态', '开启用户【21232】成功。', '127.0.0.1', NULL, 1563875784),
(33, 1, 'admin', '修改用户状态', '禁用用户【admin11】成功。', '127.0.0.1', NULL, 1563875787),
(34, 1, 'admin', '修改用户状态', '禁用用户【21232】成功。', '127.0.0.1', NULL, 1563875788),
(35, 1, 'admin', '修改用户状态', '禁用用户【21232】成功。', '127.0.0.1', NULL, 1563875791),
(36, 1, 'admin', '删除用户', '删除【admin11】成功', '127.0.0.1', NULL, 1563876935),
(37, 1, 'admin', '删除用户', '删除【21232】成功', '127.0.0.1', 1, 1563877195),
(38, 1, 'admin', '添加后台用户', '用户【admin】添加失败:管理员已经存在', '127.0.0.1', NULL, 1563877939),
(39, 1, 'admin', '添加后台用户', '用户【admin】添加失败:管理员已经存在', '127.0.0.1', NULL, 1563877943),
(40, 1, 'admin', '添加后台用户', '用户【admin】添加失败:管理员已经存在', '127.0.0.1', NULL, 1563877947),
(41, 1, 'admin', '添加后台用户', '用户【admin112】添加成功', '127.0.0.1', NULL, 1563877958),
(42, 1, 'admin', '修改用户状态', '开启用户【admin】成功。', '127.0.0.1', NULL, 1563878245),
(43, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878247),
(44, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878249),
(45, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878252),
(46, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878257),
(47, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878264),
(48, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878271),
(49, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878286),
(50, 1, 'admin', '修改用户状态', '开启用户【admin】成功。', '127.0.0.1', NULL, 1563878414),
(51, 1, 'admin', '修改用户状态', '开启用户【admin】成功。', '127.0.0.1', NULL, 1563878420),
(52, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878481),
(53, 1, 'admin', '修改用户状态', '开启用户【123213】成功。', '127.0.0.1', NULL, 1563878483),
(54, 1, 'admin', '修改用户状态', '开启用户【user123】成功。', '127.0.0.1', NULL, 1563878485),
(55, 1, 'admin', '修改用户状态', '开启用户【user123】成功。', '127.0.0.1', NULL, 1563878487),
(56, 1, 'admin', '修改用户状态', '禁用用户【123213】成功。', '127.0.0.1', NULL, 1563878505),
(57, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878581),
(58, 1, 'admin', '修改用户状态', '开启用户【123213】成功。', '127.0.0.1', NULL, 1563878584),
(59, 1, 'admin', '修改用户状态', '禁用用户【123213】成功。', '127.0.0.1', NULL, 1563878587),
(60, 1, 'admin', '修改用户状态', '禁用用户【123213】成功。', '127.0.0.1', NULL, 1563878589),
(61, 1, 'admin', '修改用户状态', '开启用户【admin】成功。', '127.0.0.1', NULL, 1563878653),
(62, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563878657),
(63, 1, 'admin', '修改用户状态', '开启用户【admin】成功。', '127.0.0.1', NULL, 1563878660),
(64, 1, 'admin', '修改用户状态', '开启用户【123213】成功。', '127.0.0.1', NULL, 1563878681),
(65, 1, 'admin', '修改用户状态', '禁用用户【admin】成功。', '127.0.0.1', NULL, 1563879101),
(66, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1563930994),
(67, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563935619),
(68, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563935653),
(69, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563935669),
(70, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563935759),
(71, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563935782),
(72, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563935838),
(73, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563935865),
(74, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563935876),
(75, 1, 'admin', '修改用户状态', '禁用用户【112211】成功。', '127.0.0.1', NULL, 1563940184),
(76, 1, 'admin', '修改用户状态', '开启用户【112211】成功。', '127.0.0.1', NULL, 1563940188),
(77, 1, 'admin', '修改商品状态', 'property not exists:app\\admin\\model\\GoodsModel->status', '127.0.0.1', NULL, 1563948732),
(78, 1, 'admin', '修改商品状态', 'property not exists:app\\admin\\model\\GoodsModel->status', '127.0.0.1', NULL, 1563948734),
(79, 1, 'admin', '修改商品状态', 'property not exists:app\\admin\\model\\GoodsModel->status', '127.0.0.1', NULL, 1563948816),
(80, 1, 'admin', '修改商品状态', 'property not exists:app\\admin\\model\\GoodsModel->status', '127.0.0.1', NULL, 1563948853),
(81, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563948882),
(82, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563948885),
(83, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563948922),
(84, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563948980),
(85, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563949001),
(86, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563949040),
(87, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563949095),
(88, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563949112),
(89, 1, 'admin', '修改商品状态', 'fields not exists:[status]', '127.0.0.1', NULL, 1563949121),
(90, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949221),
(91, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949227),
(92, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949254),
(93, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949259),
(94, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949287),
(95, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949291),
(96, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949310),
(97, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949313),
(98, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949318),
(99, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949329),
(100, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949334),
(101, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949376),
(102, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949379),
(103, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949391),
(104, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949397),
(105, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949399),
(106, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949415),
(107, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949417),
(108, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949421),
(109, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949432),
(110, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563949434),
(111, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563949443),
(112, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563950091),
(113, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563950109),
(114, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563950126),
(115, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563950506),
(116, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563950510),
(117, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563950638),
(118, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563950641),
(119, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1563950644),
(120, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1563950648),
(121, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1563950655),
(122, 1, 'admin', '修改商品推送状态', 'fields not exists:[]', '127.0.0.1', NULL, 1563950678),
(123, 1, 'admin', '修改商品推送状态', 'fields not exists:[]', '127.0.0.1', NULL, 1563950681),
(124, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1563950692),
(125, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1563950696),
(126, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1563950702),
(127, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1563950718),
(128, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563950722),
(129, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563950726),
(130, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563950823),
(131, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1563950828),
(132, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1563950832),
(133, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1563950836),
(134, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1563950839),
(135, 1, 'admin', '删除用户', '删除【admin/goods/index】成功', '127.0.0.1', NULL, 1563951065),
(136, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563952806),
(137, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563953938),
(138, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563956531),
(139, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563956752),
(140, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563956764),
(141, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1563957000),
(142, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563957046),
(143, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563957083),
(144, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563957100),
(145, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563957138),
(146, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1563957152),
(147, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564017899),
(148, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564018078),
(149, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1564018547),
(150, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1564018550),
(151, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564018553),
(152, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564018562),
(153, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1564020706),
(154, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564020711),
(155, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1564020737),
(156, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564023200),
(157, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564023530),
(158, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564023556),
(159, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564023976),
(160, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564023982),
(161, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564023989),
(162, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564023991),
(163, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564023993),
(164, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564023994),
(165, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564024256),
(166, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564024370),
(167, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564025029),
(168, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564033886),
(169, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564033916),
(170, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564033927),
(171, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564033937),
(172, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564037906),
(173, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564037970),
(174, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564037978),
(175, 1, 'admin', '修改商品推送状态', '推送成功。', '127.0.0.1', NULL, 1564037980),
(176, 1, 'admin', '修改商品推送状态', '撤回成功。', '127.0.0.1', NULL, 1564038188),
(177, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564038511),
(178, 1, 'admin', '删除广告', 'method not exist:think\\db\\Query->delAdvertise', '127.0.0.1', NULL, 1564052126),
(179, 1, 'admin', '删除用户', '删除成功', '127.0.0.1', NULL, 1564052161),
(180, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564120637),
(181, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564120952),
(182, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564121005),
(183, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564121083),
(184, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564121103),
(185, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564121116),
(186, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564121131),
(187, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564121222),
(188, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564122778),
(189, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564122797),
(190, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564124509),
(191, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564124518),
(192, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564124784),
(193, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564128613),
(194, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564128678),
(195, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564129224),
(196, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564129234),
(197, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564130763),
(198, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564131736),
(199, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564132506),
(200, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564133324),
(201, 1, 'admin', '删除信息', '删除【测试的撒大苏打撒旦】成功', '127.0.0.1', NULL, 1564135239),
(202, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564135574),
(203, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564135681),
(204, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137067),
(205, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137165),
(206, 1, 'admin', '删除菜单', '用户【admin】删除菜单成功', '127.0.0.1', 1, 1564137183),
(207, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137208),
(208, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137263),
(209, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137414),
(210, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137466),
(211, 1, 'admin', '删除菜单', '用户【admin】删除菜单成功', '127.0.0.1', 1, 1564137474),
(212, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137493),
(213, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137528),
(214, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137563),
(215, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137588),
(216, 1, 'admin', '删除菜单', '用户【admin】删除菜单成功', '127.0.0.1', 1, 1564137599),
(217, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564137617),
(218, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564190067),
(219, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564193124),
(220, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564193311),
(221, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564193787),
(222, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564195642),
(223, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564197816),
(224, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564198212),
(225, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564198220),
(226, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564223607),
(227, 1, 'admin', '删除定制', 'SQLSTATE[23000]: Integrity constraint violation: 1052 Column \'id\' in where clause is ambiguous', '127.0.0.1', NULL, 1564225740),
(228, 1, 'admin', '删除定制', 'SQLSTATE[23000]: Integrity constraint violation: 1052 Column \'id\' in where clause is ambiguous', '127.0.0.1', NULL, 1564225748),
(229, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564225843),
(230, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564225856),
(231, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564225934),
(232, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564225937),
(233, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564225940),
(234, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564226142),
(235, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564226150),
(236, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564226198),
(237, 1, 'admin', '删除定制创意', '删除成功', '127.0.0.1', NULL, 1564226335),
(238, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564226419),
(239, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564226423),
(240, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564226426),
(241, 1, 'admin', '删除定制', '删除成功', '127.0.0.1', NULL, 1564226429),
(242, 1, 'admin', '删除定制创意', '删除成功', '127.0.0.1', NULL, 1564226434),
(243, 1, 'admin', '删除定制创意', '删除成功', '127.0.0.1', NULL, 1564226436),
(244, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564362954),
(245, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1564363041),
(246, 1, 'admin', '修改商品状态', '上架成功。', '127.0.0.1', NULL, 1564363047),
(247, 1, 'admin', '修改商品状态', '下架成功。', '127.0.0.1', NULL, 1564363049),
(248, 1, 'admin', '删除广告', 'unlink(20190729/6803fcc0edfc16b14f7f2552d4b25d46.jpg): No such file or directory', '127.0.0.1', NULL, 1564369231),
(249, 1, 'admin', '删除广告', 'unlink(20190729/6803fcc0edfc16b14f7f2552d4b25d46.jpg): No such file or directory', '127.0.0.1', NULL, 1564369299),
(250, 1, 'admin', '删除广告', 'unlink(20190729/6803fcc0edfc16b14f7f2552d4b25d46.jpg): No such file or directory', '127.0.0.1', NULL, 1564369316),
(251, 1, 'admin', '删除广告', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/homepage_advertise20190729/6803fcc0edfc16b14f7f2552d4b25d46.jpg): No such file or directory', '127.0.0.1', NULL, 1564369962),
(252, 1, 'admin', '删除用户', '删除成功', '127.0.0.1', NULL, 1564370037),
(253, 1, 'admin', '删除用户', '删除成功', '127.0.0.1', NULL, 1564370051),
(254, 1, 'admin', '删除用户', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/homepage_advertise/20190729/f741f775f14a23e7882f1fced4554008.jpg): No such file or directory', '127.0.0.1', NULL, 1564370277),
(255, 1, 'admin', '删除用户', '删除【user/index111】成功', '127.0.0.1', NULL, 1564370292),
(256, 1, 'admin', '删除用户', '删除【13】成功', '127.0.0.1', NULL, 1564370325),
(257, 1, 'admin', '删除类型', '删除成功', '127.0.0.1', NULL, 1564370452),
(258, 1, 'admin', '删除类型', '删除成功', '127.0.0.1', NULL, 1564370473),
(259, 1, 'admin', '删除用户', 'unlink(): http does not allow unlinking', '127.0.0.1', NULL, 1564372469),
(260, 1, 'admin', '删除用户', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup//uploads/news_img/2019-07-29/5d3e6ddf51c08.jpeg): No such file or directory', '127.0.0.1', NULL, 1564372498),
(261, 1, 'admin', '删除信息', '删除【】成功', '127.0.0.1', NULL, 1564372546),
(262, 1, 'admin', '删除类型', '删除成功', '127.0.0.1', NULL, 1564378687),
(263, 1, 'admin', '删除用户', '删除【12】成功', '127.0.0.1', NULL, 1564378864),
(264, 1, 'admin', '删除信息', '删除【哇哇哇哇】成功', '127.0.0.1', NULL, 1564391028),
(265, 1, 'admin', '删除用户', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/news_img/2019-07-29/5d3eb1606dca2.jpeg): No such file or directory', '127.0.0.1', NULL, 1564391036),
(266, 1, 'admin', '删除用户', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/news_img/2019-07-29/5d3eb1606dca2.jpeg): No such file or directory', '127.0.0.1', NULL, 1564391059),
(267, 1, 'admin', '删除信息', '删除【管理员管理】成功', '127.0.0.1', NULL, 1564391106),
(268, 1, 'admin', '删除信息', '删除【管理员管理】成功', '127.0.0.1', NULL, 1564391129),
(269, 1, 'admin', '删除信息', '删除【哇啊阿瓦达】成功', '127.0.0.1', NULL, 1564391176),
(270, 1, 'admin', '删除信息', '删除【哇啊阿瓦达】成功', '127.0.0.1', NULL, 1564391231),
(271, 1, 'admin', '删除信息', '删除【哇哇哇哇1】成功', '127.0.0.1', NULL, 1564391258),
(272, 1, 'admin', '删除信息', '删除【12312】成功', '127.0.0.1', NULL, 1564391501),
(273, 1, 'admin', '删除信息', '删除【哇啊阿瓦达11】成功', '127.0.0.1', NULL, 1564391511),
(274, 1, 'admin', '删除用户', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/news_img/2019-07-29/5d3eb1606dca2.jpeg): No such file or directory', '127.0.0.1', NULL, 1564391514),
(275, 1, 'admin', '删除信息', '删除【哇哇哇哇】成功', '127.0.0.1', NULL, 1564391544),
(276, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564392676),
(277, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/release_img/2019-07-29/5d3ec10dd5b6a.jpg): No such file or directory', '127.0.0.1', NULL, 1564393784),
(278, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/release_img/2019-07-29/5d3ec10dd5b6a.jpg): No such file or directory', '127.0.0.1', NULL, 1564393862),
(279, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/release_img/2019-07-29/5d3ec1acc35cd.jpeg): No such file or directory', '127.0.0.1', NULL, 1564393944),
(280, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/release_img/2019-07-29/5d3ec10dd5b6a.jpg): No such file or directory', '127.0.0.1', NULL, 1564393947),
(281, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564393973),
(282, 1, 'admin', '删除用户', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/news_img/2019-07-29/5d3ec0ceaf01b.jpeg): No such file or directory', '127.0.0.1', NULL, 1564394007),
(283, 1, 'admin', '删除信息', '删除【哇哇哇哇】成功', '127.0.0.1', NULL, 1564394135),
(284, 1, 'admin', '删除信息', '删除【哇哇哇哇】成功', '127.0.0.1', NULL, 1564394345),
(285, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564394401),
(286, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564395129),
(287, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564395220),
(288, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564449366),
(289, 1, 'admin', '删除信息', '删除成功', '127.0.0.1', NULL, 1564451880),
(290, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/goods_type/): Permission denied', '127.0.0.1', NULL, 1564458561),
(291, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/goods_type/20190724\\a9ead40ceef30896c557534560686c11.jpg): No such file or directory', '127.0.0.1', NULL, 1564458597),
(292, 1, 'admin', '删除用户', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/goods/20190725\\b4cec609457378a881e33668dc96fef0.jpg): No such file or directory', '127.0.0.1', NULL, 1564458606),
(293, 1, 'admin', '删除类型', '删除成功', '127.0.0.1', NULL, 1564458623),
(294, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564458850),
(295, NULL, NULL, 'admin112', '用户【admin112】登录失败：该账号被禁用', '127.0.0.1', 0, 1564458872),
(296, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564458878),
(297, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564458898),
(298, 40, 'admin112', 'admin112', '用户【admin112】登录成功', '127.0.0.1', 1, 1564458954),
(299, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564458968),
(300, 1, 'admin', '编辑后台用户', '用户【admin11】编辑成功。', '127.0.0.1', NULL, 1564459175),
(301, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564469886),
(302, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564469920),
(303, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470026),
(304, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470067),
(305, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470106),
(306, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470131),
(307, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470215),
(308, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470249),
(309, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470293),
(310, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470357),
(311, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470404),
(312, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470457),
(313, 1, 'admin', 'admin', '用户【admin】添加菜单成功', '127.0.0.1', 1, 1564470490),
(314, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564470593),
(315, 1, 'admin', 'admin', '用户【admin】编辑菜单成功', '127.0.0.1', 1, 1564470664),
(316, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/goods_type//uploads/goods_img/2019-07-30/5d4009b912d4b.jpg): No such file or directory', '127.0.0.1', NULL, 1564477893),
(317, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/goods_type/uploads/goods_img/2019-07-30/5d4009b912d4b.jpg): No such file or directory', '127.0.0.1', NULL, 1564477985),
(318, 1, 'admin', '删除图片', 'SQLSTATE[42S22]: Column not found: 1054 Unknown column \'t.id\' in \'where clause\'', '127.0.0.1', NULL, 1564478075),
(319, 1, 'admin', '删除类型', 'unlink(D:\\PHPTutorial\\WWW\\VacuumCup/public/uploads/goods_img/2019-07-30/5d4009b912d4b.jpg): No such file or directory', '127.0.0.1', NULL, 1564478114),
(338, 1, 'admin', 'admin', '用户【admin】登录成功', '116.21.158.242', 1, 1564652915),
(339, 1, 'admin', 'admin', '用户【admin】登录成功', '116.22.2.119', 1, 1565058356),
(340, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.74', 1, 1565166841),
(341, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.74', 1, 1565236709),
(342, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.74', 1, 1565250483),
(343, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.74', 1, 1565253025),
(344, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.74', 1, 1565262478),
(345, 1, 'admin', '修改商品推送状态', '撤回成功。', '61.140.199.74', 1, 1565267945),
(346, 1, 'admin', '删除产品', '删除产品【11111111】成功', '61.140.199.74', 1, 1565267953),
(347, 1, 'admin', '删除产品', '删除产品【测试测试】成功', '61.140.199.74', 1, 1565267957),
(348, 1, 'admin', '删除产品', '删除产品【测试】成功', '61.140.199.74', 1, 1565267960),
(349, 1, 'admin', '删除产品', '删除产品【测试2】成功', '61.140.199.74', 1, 1565267962),
(350, 1, 'admin', '删除产品', '删除产品【测试1】成功', '61.140.199.74', 1, 1565267965),
(351, 1, 'admin', '修改用户状态', '开启用户【admin2】成功。', '61.140.199.74', 1, 1565269012),
(352, 1, 'admin', '删除广告', '删除广告成功', '61.140.199.74', 1, 1565269035),
(353, 1, 'admin', '删除广告', '删除广告成功', '61.140.199.74', 1, 1565269038),
(333, 1, 'admin', 'admin', '用户【admin】登录成功', '127.0.0.1', 1, 1564536041),
(334, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.45', 1, 1564540629),
(337, 1, 'admin', '删除产品', '删除产品【飞机】成功', '61.140.199.45', 1, 1564560171),
(355, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.74', 1, 1565323269),
(356, 1, 'admin', 'admin', '用户【admin】登录成功', '116.21.159.46', 1, 1565339222),
(357, 1, 'admin', 'admin', '用户【admin】登录成功', '116.21.159.46', 1, 1565427584),
(358, 1, 'admin', 'admin', '用户【admin】登录成功', '116.21.159.46', 1, 1565427683),
(359, 1, 'admin', 'admin', '用户【admin】登录成功', '61.140.199.5', 1, 1565597812),
(360, 1, 'admin', 'admin', '用户【admin】登录成功', '116.22.3.10', 1, 1566445321),
(361, 1, 'admin', 'admin', '用户【admin】登录成功', '116.22.167.161', 1, 1567673067),
(362, 1, 'admin', 'admin', '用户【admin】登录成功', '116.22.167.161', 1, 1567673449),
(363, 1, 'admin', 'admin', '用户【admin】登录成功', '0.0.0.0', 1, 1568187832),
(364, 1, 'admin', 'admin', '用户【admin】登录成功', '0.0.0.0', 1, 1569838466),
(365, 1, 'admin', 'admin', '用户【admin】登录成功', '0.0.0.0', 1, 1570411300);

-- --------------------------------------------------------

--
-- 表的结构 `msg`
--

CREATE TABLE `msg` (
  `id` int(15) UNSIGNED NOT NULL COMMENT '主键',
  `mobile` varchar(255) NOT NULL COMMENT '手机号',
  `msg` longtext NOT NULL COMMENT '短信内容',
  `code` varchar(255) NOT NULL COMMENT '验证码',
  `status` tinyint(2) NOT NULL COMMENT '短息状态',
  `create_time` int(20) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(12) UNSIGNED NOT NULL COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content_descr` longtext NOT NULL COMMENT '描述',
  `title_img` varchar(255) NOT NULL COMMENT '图片',
  `path` varchar(255) NOT NULL COMMENT '图片地址',
  `content` longtext NOT NULL COMMENT '内容',
  `create_time` int(20) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `content_descr`, `title_img`, `path`, `content`, `create_time`) VALUES
(41, '哇哇哇哇', '1', '1', 'http://vacuumcup.laoma-app.com/uploads/news_img/2019-08-08/5d4bb1ac25176.jpghttp://vacuumcup.laoma-app.com/uploads/news_img/2019-08-08/5d4bb1afc8e93.jpeg', '<p><img src=\"http://vacuumcup.laoma-app.com/uploads/news_img/2019-08-08/5d4bb1ac25176.jpg\" style=\"max-width:100%;\"><img src=\"http://vacuumcup.laoma-app.com/uploads/news_img/2019-08-08/5d4bb1afc8e93.jpeg\" style=\"color: inherit; max-width: 100%;\"><br></p>', 1565241780),
(40, '测试', '1', '1', 'http://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d41503adde8d.jpghttp://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d41503e7b031.jpghttp://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d4150413b154.jpg', '<p><img src=\"http://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d41503adde8d.jpg\" style=\"max-width:100%;\"><img src=\"http://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d41503e7b031.jpg\" style=\"color: inherit; max-width: 100%;\"><img src=\"http://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d4150413b154.jpg\" style=\"color: inherit; max-width: 100%;\"><br></p>', 1564561480),
(39, '测试', '1', '1', 'http://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d414bb03f1b0.jpg', '<p><img src=\"http://vacuumcup.laoma-app.com/uploads/news_img/2019-07-31/5d414bb03f1b0.jpg\" style=\"max-width:100%;\"><br></p>', 1564560304),
(42, '哇啊阿瓦达', '', '/uploads/news_title/20190808/995b61d87ac9c8b6d16f8c91ebc0947a.jpg', '', '<p>sadsa</p>', 1565262854),
(43, '哇啊阿瓦达', '', '/uploads/news_title/20190808/d8bc9590053f6dcb0d8b6da4df45408c.jpg', '', '<p>sdsadas</p>', 1565263001);

-- --------------------------------------------------------

--
-- 表的结构 `privates_order`
--

CREATE TABLE `privates_order` (
  `id` int(12) UNSIGNED NOT NULL COMMENT '主键',
  `order_num` varchar(32) NOT NULL COMMENT '订单编号',
  `user_name` varchar(64) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `user_id` int(12) NOT NULL COMMENT '用户id',
  `num` int(11) NOT NULL COMMENT '下单数量',
  `create_time` int(20) NOT NULL COMMENT '创建时间',
  `content` longtext NOT NULL COMMENT '创意详情'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `privates_order`
--

INSERT INTO `privates_order` (`id`, `order_num`, `user_name`, `mobile`, `path`, `user_id`, `num`, `create_time`, `content`) VALUES
(1, '20sdaa99aa3q58as', NULL, NULL, '', 1, 20, 0, '<p style=\"line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>1、<span style=\"font-family: 宋体;\">软件许可使用协议</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户及用户注册</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户必须是具备完全民事行为能力的自然人</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">(18周岁</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">以上)。</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">无民事行为能力人、限制民事行为能力人注册为本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台用户并参与本平台提供的服务,其与本平台之间的服务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">协议自始无效,本平台一经发现,有权在不通知用户的情况</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">下立即注销该用户。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、在登记过程中,用户将选择注册名和密码。注册名的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">选择应遵守法律法规及社会公德。用户必须对自己的密码保</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">密,用户将对自己的注册名和密码发生的所有活动承担全部</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">责任。如发现任何人未经您同意使用您的注册名跟密码,用</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">户需立即通知本平台,停止用户名的使用;对于该行为造成</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的损害,本平台不负任何法律责任。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户的权利和义务</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户应当保证在使用本平台各项服务过程遵守法律法</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">规,尊重社会公德,遵守诚实信用原则,不扰乱网络秩序;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、用户有权根据本协议参与购物等其他无特殊限制</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的服务,但不得实施任意违背购物原则的作弊手段;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、用户必须按照申请注册会员的格式、过程,真实、准</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">确、完整的填写资料;维持并及时更新资料,使其保持真</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">实、准确、完整和反应当前情况。倘若因用户提供的资料不</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">真实、不准确造成的经济损失,由用户自行承担所有责任</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">4、用户发表的言论、评价应当真实,不得侮辱、诽谤和</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">恶意评价他人</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">5、用户同意接收来自本平台发出的所有邮件或信息。本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台保留通过邮件和短信的形式,对本平台注册、购物</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">用户发送身份验证等告知服务的权利。如果用户在本平台注</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">册表明用户已默示同意接受此项服务。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本站的权利和义务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、本平台有义务有权力在现有技术上维护整个平台的正</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">常运行,并努力提升和改进技术;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、对于您在本平台的不当行为或任何本平台认为应当终</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">止服务的情况,本平台有权删除信息或终止服务,且无须征</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">得您的同意;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、您使用本平台时,本平台有权接收并记录您的个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">,包括但不限于IP地址、网站 Cookie D中的资料及您要求取</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px; font-family: 宋体;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>2、<span style=\"font-family: 宋体;\">特别说明</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">总则</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">欢迎使用本平台为您提供的各项服务;以下所述条款即</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">构成用户与本平台就使用服务所达成的协议,一旦用户确认</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本服务协议后,本服务协议将在用户和本平台之间产生法律</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">效力。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>3<span style=\"font-weight: bold;\">、</span><span style=\"font-family: 宋体;\">隐私权政策</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本平台不会公开您选择保密的注册信息及其他个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">息。但在下列情况下,本平台有权全部或部分披露您的保密</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">信息。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、根据法律规定,或应行政机关、司法机关要求,向第</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">三人或行政机关、司法机关披露;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、您出现违反本平台规则,需要向第三方披露的;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、根据法律和本平台规则,其他本平台认为适合披露</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">【管辖】</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本条款将适用中华人民共和国的法律,因本协议或本平</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">台服务所引起的或与其有关的任何争议,应向本平台所在地</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">人民法院提起诉讼。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本活动最终解释权归本平台所有</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">&nbsp;</span></p><p><br/></p>'),
(2, '20sdaa99aa3q58as', NULL, NULL, '', 17, 20, 0, '<p style=\"line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>1、<span style=\"font-family: 宋体;\">软件许可使用协议</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户及用户注册</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户必须是具备完全民事行为能力的自然人</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">(18周岁</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">以上)。</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">无民事行为能力人、限制民事行为能力人注册为本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台用户并参与本平台提供的服务,其与本平台之间的服务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">协议自始无效,本平台一经发现,有权在不通知用户的情况</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">下立即注销该用户。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、在登记过程中,用户将选择注册名和密码。注册名的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">选择应遵守法律法规及社会公德。用户必须对自己的密码保</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">密,用户将对自己的注册名和密码发生的所有活动承担全部</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">责任。如发现任何人未经您同意使用您的注册名跟密码,用</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">户需立即通知本平台,停止用户名的使用;对于该行为造成</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的损害,本平台不负任何法律责任。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户的权利和义务</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户应当保证在使用本平台各项服务过程遵守法律法</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">规,尊重社会公德,遵守诚实信用原则,不扰乱网络秩序;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、用户有权根据本协议参与购物等其他无特殊限制</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的服务,但不得实施任意违背购物原则的作弊手段;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、用户必须按照申请注册会员的格式、过程,真实、准</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">确、完整的填写资料;维持并及时更新资料,使其保持真</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">实、准确、完整和反应当前情况。倘若因用户提供的资料不</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">真实、不准确造成的经济损失,由用户自行承担所有责任</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">4、用户发表的言论、评价应当真实,不得侮辱、诽谤和</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">恶意评价他人</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">5、用户同意接收来自本平台发出的所有邮件或信息。本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台保留通过邮件和短信的形式,对本平台注册、购物</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">用户发送身份验证等告知服务的权利。如果用户在本平台注</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">册表明用户已默示同意接受此项服务。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本站的权利和义务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、本平台有义务有权力在现有技术上维护整个平台的正</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">常运行,并努力提升和改进技术;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、对于您在本平台的不当行为或任何本平台认为应当终</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">止服务的情况,本平台有权删除信息或终止服务,且无须征</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">得您的同意;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、您使用本平台时,本平台有权接收并记录您的个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">,包括但不限于IP地址、网站 Cookie D中的资料及您要求取</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px; font-family: 宋体;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>2、<span style=\"font-family: 宋体;\">特别说明</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">总则</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">欢迎使用本平台为您提供的各项服务;以下所述条款即</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">构成用户与本平台就使用服务所达成的协议,一旦用户确认</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本服务协议后,本服务协议将在用户和本平台之间产生法律</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">效力。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>3<span style=\"font-weight: bold;\">、</span><span style=\"font-family: 宋体;\">隐私权政策</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本平台不会公开您选择保密的注册信息及其他个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">息。但在下列情况下,本平台有权全部或部分披露您的保密</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">信息。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、根据法律规定,或应行政机关、司法机关要求,向第</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">三人或行政机关、司法机关披露;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、您出现违反本平台规则,需要向第三方披露的;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、根据法律和本平台规则,其他本平台认为适合披露</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">【管辖】</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本条款将适用中华人民共和国的法律,因本协议或本平</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">台服务所引起的或与其有关的任何争议,应向本平台所在地</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">人民法院提起诉讼。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本活动最终解释权归本平台所有</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">&nbsp;</span></p><p><br/></p>'),
(3, '20sdaa99aa3q58as', NULL, NULL, '', 14, 20, 0, '<p style=\"line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>1、<span style=\"font-family: 宋体;\">软件许可使用协议</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户及用户注册</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户必须是具备完全民事行为能力的自然人</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">(18周岁</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">以上)。</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">无民事行为能力人、限制民事行为能力人注册为本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台用户并参与本平台提供的服务,其与本平台之间的服务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">协议自始无效,本平台一经发现,有权在不通知用户的情况</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">下立即注销该用户。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、在登记过程中,用户将选择注册名和密码。注册名的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">选择应遵守法律法规及社会公德。用户必须对自己的密码保</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">密,用户将对自己的注册名和密码发生的所有活动承担全部</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">责任。如发现任何人未经您同意使用您的注册名跟密码,用</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">户需立即通知本平台,停止用户名的使用;对于该行为造成</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的损害,本平台不负任何法律责任。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户的权利和义务</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户应当保证在使用本平台各项服务过程遵守法律法</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">规,尊重社会公德,遵守诚实信用原则,不扰乱网络秩序;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、用户有权根据本协议参与购物等其他无特殊限制</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的服务,但不得实施任意违背购物原则的作弊手段;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、用户必须按照申请注册会员的格式、过程,真实、准</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">确、完整的填写资料;维持并及时更新资料,使其保持真</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">实、准确、完整和反应当前情况。倘若因用户提供的资料不</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">真实、不准确造成的经济损失,由用户自行承担所有责任</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">4、用户发表的言论、评价应当真实,不得侮辱、诽谤和</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">恶意评价他人</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">5、用户同意接收来自本平台发出的所有邮件或信息。本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台保留通过邮件和短信的形式,对本平台注册、购物</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">用户发送身份验证等告知服务的权利。如果用户在本平台注</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">册表明用户已默示同意接受此项服务。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本站的权利和义务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、本平台有义务有权力在现有技术上维护整个平台的正</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">常运行,并努力提升和改进技术;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、对于您在本平台的不当行为或任何本平台认为应当终</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">止服务的情况,本平台有权删除信息或终止服务,且无须征</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">得您的同意;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、您使用本平台时,本平台有权接收并记录您的个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">,包括但不限于IP地址、网站 Cookie D中的资料及您要求取</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px; font-family: 宋体;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>2、<span style=\"font-family: 宋体;\">特别说明</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">总则</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">欢迎使用本平台为您提供的各项服务;以下所述条款即</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">构成用户与本平台就使用服务所达成的协议,一旦用户确认</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本服务协议后,本服务协议将在用户和本平台之间产生法律</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">效力。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>3<span style=\"font-weight: bold;\">、</span><span style=\"font-family: 宋体;\">隐私权政策</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本平台不会公开您选择保密的注册信息及其他个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">息。但在下列情况下,本平台有权全部或部分披露您的保密</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">信息。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、根据法律规定,或应行政机关、司法机关要求,向第</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">三人或行政机关、司法机关披露;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、您出现违反本平台规则,需要向第三方披露的;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、根据法律和本平台规则,其他本平台认为适合披露</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">【管辖】</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本条款将适用中华人民共和国的法律,因本协议或本平</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">台服务所引起的或与其有关的任何争议,应向本平台所在地</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">人民法院提起诉讼。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本活动最终解释权归本平台所有</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">&nbsp;</span></p><p><br/></p>'),
(4, '20sdaa99aa3q58as', NULL, NULL, '', 2, 20, 0, '<p style=\"line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>1、<span style=\"font-family: 宋体;\">软件许可使用协议</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户及用户注册</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户必须是具备完全民事行为能力的自然人</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">(18周岁</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">以上)。</span><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">无民事行为能力人、限制民事行为能力人注册为本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台用户并参与本平台提供的服务,其与本平台之间的服务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">协议自始无效,本平台一经发现,有权在不通知用户的情况</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">下立即注销该用户。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、在登记过程中,用户将选择注册名和密码。注册名的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">选择应遵守法律法规及社会公德。用户必须对自己的密码保</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">密,用户将对自己的注册名和密码发生的所有活动承担全部</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">责任。如发现任何人未经您同意使用您的注册名跟密码,用</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">户需立即通知本平台,停止用户名的使用;对于该行为造成</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的损害,本平台不负任何法律责任。</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">[<span style=\"font-size: 20px; font-family: 宋体;\">用户的权利和义务</span>]</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、用户应当保证在使用本平台各项服务过程遵守法律法</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">规,尊重社会公德,遵守诚实信用原则,不扰乱网络秩序;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、用户有权根据本协议参与购物等其他无特殊限制</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的服务,但不得实施任意违背购物原则的作弊手段;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、用户必须按照申请注册会员的格式、过程,真实、准</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">确、完整的填写资料;维持并及时更新资料,使其保持真</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">实、准确、完整和反应当前情况。倘若因用户提供的资料不</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">真实、不准确造成的经济损失,由用户自行承担所有责任</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">4、用户发表的言论、评价应当真实,不得侮辱、诽谤和</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">恶意评价他人</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">5、用户同意接收来自本平台发出的所有邮件或信息。本</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">平台保留通过邮件和短信的形式,对本平台注册、购物</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">用户发送身份验证等告知服务的权利。如果用户在本平台注</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">册表明用户已默示同意接受此项服务。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本站的权利和义务</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、本平台有义务有权力在现有技术上维护整个平台的正</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">常运行,并努力提升和改进技术;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、对于您在本平台的不当行为或任何本平台认为应当终</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">止服务的情况,本平台有权删除信息或终止服务,且无须征</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">得您的同意;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、您使用本平台时,本平台有权接收并记录您的个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">,包括但不限于IP地址、网站 Cookie D中的资料及您要求取</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px; font-family: 宋体;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>2、<span style=\"font-family: 宋体;\">特别说明</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">总则</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">欢迎使用本平台为您提供的各项服务;以下所述条款即</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">构成用户与本平台就使用服务所达成的协议,一旦用户确认</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本服务协议后,本服务协议将在用户和本平台之间产生法律</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">效力。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\"><br/></span></p><p style=\"margin-left: 0px; text-indent: 0px; line-height: 2em;\"><span style=\"font-size: 24px;\"><strong>3<span style=\"font-weight: bold;\">、</span><span style=\"font-family: 宋体;\">隐私权政策</span></strong></span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本平台不会公开您选择保密的注册信息及其他个人信</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">息。但在下列情况下,本平台有权全部或部分披露您的保密</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">信息。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">1、根据法律规定,或应行政机关、司法机关要求,向第</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">三人或行政机关、司法机关披露;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">2、您出现违反本平台规则,需要向第三方披露的;</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">3、根据法律和本平台规则,其他本平台认为适合披露</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">的</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 宋体; font-size: 20px;\">【管辖】</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本条款将适用中华人民共和国的法律,因本协议或本平</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">台服务所引起的或与其有关的任何争议,应向本平台所在地</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">人民法院提起诉讼。</span></p><p style=\"line-height: 2em;\"><span style=\"font-family: 楷体, 楷体_GB2312, SimKai; font-size: 18px;\">本活动最终解释权归本平台所有</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 20px;\">&nbsp;</span></p><p><br/></p>'),
(9, '2019/08/080+i>tpNVh*', NULL, NULL, '', 0, 0, 1565254338, ''),
(10, '2019/08/08NF2s9g-9KE^W<rCSATWn', NULL, NULL, '', 0, 0, 1565254371, ''),
(11, '2019/08/08u2z92p6>&HUiyhGlFjB-', '测试', '13266766285', '/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg,/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg', 0, 1, 1565265216, '测试内容'),
(12, '2019/08/08-Bj/hac(L$N~y^B:+e^c', '测试', '13266766285', '/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg,/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg', 0, 1, 1565265613, '测试内容'),
(13, '2019/08/098<8MPV2!ygj7w-iGbSc?', '', '', '', 0, 0, 1565318678, ''),
(14, '2019/08/09mjR$GM!);8Sf59GpTFC(', '测试', '13266766285', '/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg,/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg', 0, 1, 1565322671, '测试内容'),
(15, '2019/08/09<4!90&y7Eep78ez++(*!', '测试', '13266766285', '/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg,/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg', 0, 1, 1565322954, '测试内容'),
(16, '2019/08/090yT$ul$VOiRaqsyL14pk', '测试', '13266766285', '/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg,/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg', 0, 1, 1565322986, '测试内容'),
(17, '2019/08/09hpt(&TStQQv?S0RS54DB', '测试', '13266766285', '/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg,/20190808/7e75799fcfca6976ccd085a1bba0bb72.jpg', 0, 1, 1565328863, '测试内容'),
(18, '2019/08/09uJ:A0AD=Voj;K~~f#5^*', '测试', '13266766285', '/20190809/9d4e909de1f491ebbc02db9313b7b87e.jpg,/20190809/e5de28001435fc6dd830f839b01b7b2d.jpg,/20190809/b6ae1c80f2b661f296717a7635e4e3a3.jpg', 0, 1, 1565330359, '测试内容'),
(19, '2019/08/09)cGZ#qe!r+Cwe4qSjH+!', 'XIAOYI WU', '136107230@qq.com', '/20190809/210c89216d7f752120d329ac44aadb75.jpg', 0, 11, 1565331240, '定制测试'),
(20, '2019/08/09N~&z#PED3aI+a-RL6aWk', 'XIAOYI WU', '136107230@qq.com', '/20190809/5e985dd5e07c279ab61c2941c2bc7814.jpg,/20190809/5e985dd5e07c279ab61c2941c2bc7814.jpg', 0, 1, 1565332023, '1111'),
(21, '2019/08/09^#LW8ZIA;*ilZdhbS7^i', 'XIAOYI WU', '136107230@qq.com', '/20190809/5e985dd5e07c279ab61c2941c2bc7814.jpg,/20190809/5e985dd5e07c279ab61c2941c2bc7814.jpg,/20190809/d178c367903006dc9a66c92897e32394.jpg', 0, 1, 1565332105, '1111'),
(22, '20190809cZZMsM8UiZLKKD8', '', '', '', 0, 0, 1565340951, ''),
(23, '20190809WOIbl7qSeOUFPbis6', '', '', '', 0, 0, 1565341207, ''),
(24, '20190809cYY3dZ6KVe5NJA7', '', '', '', 0, 0, 1565341251, ''),
(25, '20190809NsdsCTBbIZQTz7orI', '', '', '', 0, 0, 1565341281, '');

-- --------------------------------------------------------

--
-- 表的结构 `title`
--

CREATE TABLE `title` (
  `id` int(12) UNSIGNED NOT NULL COMMENT '主键',
  `main_title` varchar(255) NOT NULL DEFAULT '' COMMENT '主标题',
  `vice_title` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `create_time` int(20) NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `title`
--

INSERT INTO `title` (`id`, `main_title`, `vice_title`, `create_time`) VALUES
(1, 'Enterprise official website', 'Welcome to our website', 1565427787);

-- --------------------------------------------------------

--
-- 表的结构 `token`
--

CREATE TABLE `token` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `create_time` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `token`
--

INSERT INTO `token` (`id`, `token`, `create_time`) VALUES
(1, '0bud3at*IT-Zsv)#6W8~)2#0p0i=aczMza;srIV-cvi2@S=68>A?&WYo$qb?lld73L>Pld%duu1^-tipi/cn-sRGcY23Y6d0L>;N', 1567673067);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(12) UNSIGNED NOT NULL COMMENT '主键',
  `username` varchar(128) NOT NULL COMMENT '用户名',
  `nick` varchar(128) NOT NULL COMMENT '昵称',
  `password` varchar(128) NOT NULL COMMENT '密码',
  `mobile` varchar(32) NOT NULL COMMENT '手机',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `token` varchar(32) DEFAULT NULL,
  `create_time` int(12) NOT NULL COMMENT '创建时间',
  `status` tinyint(2) NOT NULL COMMENT '状态 0：禁用 1：启用',
  `is_del` tinyint(2) NOT NULL COMMENT '0：未删除 1：已删除',
  `head_url` varchar(255) NOT NULL COMMENT '头像'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `nick`, `password`, `mobile`, `email`, `token`, `create_time`, `status`, `is_del`, `head_url`) VALUES
(1, 'user123', '测试', '218dbb225911693af03a713581a7227f', '15674125893', '254878278@qq.com', NULL, 1556269085, 0, 0, '/uploads/head_img/headimg.jpg'),
(2, 'user123', '测试', '218dbb225911693af03a713581a7227f', '15674125893', '254878278@qq.com', NULL, 1556269085, 0, 0, '/uploads/head_img/headimg.jpg'),
(14, '123213', 'laoda', '218dbb225911693af03a713581a7227f', '2313123213', '21231323@das.com', NULL, 1556269085, 0, 0, '/uploads/head_img/headimg.jpg'),
(17, 'admin', 'laoda1212', '218dbb225911693af03a713581a7227f', '1312312321', '21231323@das.com', NULL, 1563877034, 0, 0, '/uploads/head_img/headimg.jpg'),
(18, '1111', 'laoda', '218dbb225911693af03a713581a7227f', '12312414', '21231323@das.com', NULL, 1563940179, 1, 0, '/uploads/head_img/headimg.jpg'),
(19, '测试1', '测试', '123456', '18945665444', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 0, 0, 0, '/uploads/head_img/headimg.jpg'),
(20, '测试11', '测试', '123456', '18945665444', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 0, 0, 0, '/uploads/head_img/headimg.jpg'),
(21, 'wuxiaoyi', 'wuxiaoyi', '218dbb225911693af03a713581a7227f', '13266766285', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 0, 0, 0, '/uploads/head_img/headimg.jpg'),
(22, 'admin2', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '13266766285', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 0, 1, 0, '/uploads/head_img/headimg.jpg'),
(23, 'tututu', '0.0', 'e3c40a11dc441e102cdf004fb767f33c', '22222222222', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 1565591989, 0, 0, '/uploads/head_img/headimg.jpg'),
(24, '111111', '0.0', 'e10adc3949ba59abbe56e057f20f883e', '555555', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 1565593717, 0, 0, '/uploads/head_img/headimg.jpg'),
(25, 'admin3', '', 'e10adc3949ba59abbe56e057f20f883e', '136107230@qq.com', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 1565597670, 0, 0, '/uploads/head_img/headimg.jpg'),
(26, 'admin4', '', 'e10adc3949ba59abbe56e057f20f883e', '136107230@qq.com', NULL, '$2y$10$.q0708MHP3w8SJRJUQ6sasdj.', 1565598163, 0, 0, '/uploads/head_img/headimg.jpg'),
(27, '555', '', '25f9e794323b453885f5181f1b624d0b', '52665454', NULL, '?E0ku+t=u%g/nuF4mjc!O0Nl+SU;9TM<', 1566176903, 0, 0, '/uploads/head_img/headimg.jpg');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `auth_group_access`
--
ALTER TABLE `auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- 表的索引 `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name` (`name`);

--
-- 表的索引 `content_business`
--
ALTER TABLE `content_business`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`) USING BTREE;

--
-- 表的索引 `goods_img`
--
ALTER TABLE `goods_img`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `goods_type`
--
ALTER TABLE `goods_type`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `homepage_advertise`
--
ALTER TABLE `homepage_advertise`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `join`
--
ALTER TABLE `join`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `join_release`
--
ALTER TABLE `join_release`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- 表的索引 `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `privates_order`
--
ALTER TABLE `privates_order`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用表AUTO_INCREMENT `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用表AUTO_INCREMENT `auth_rule`
--
ALTER TABLE `auth_rule`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- 使用表AUTO_INCREMENT `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置ID', AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `content_business`
--
ALTER TABLE `content_business`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' 主键', AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `goods_img`
--
ALTER TABLE `goods_img`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=27;

--
-- 使用表AUTO_INCREMENT `goods_type`
--
ALTER TABLE `goods_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `homepage_advertise`
--
ALTER TABLE `homepage_advertise`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `join`
--
ALTER TABLE `join`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `join_release`
--
ALTER TABLE `join_release`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- 使用表AUTO_INCREMENT `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键';

--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=44;

--
-- 使用表AUTO_INCREMENT `privates_order`
--
ALTER TABLE `privates_order`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=26;

--
-- 使用表AUTO_INCREMENT `title`
--
ALTER TABLE `title`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `token`
--
ALTER TABLE `token`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
