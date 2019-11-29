-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-06-24 14:44:24
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
-- 数据库： `caiwu`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_admin`
--

CREATE TABLE `think_admin` (
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
-- 转存表中的数据 `think_admin`
--

INSERT INTO `think_admin` (`id`, `username`, `password`, `portrait`, `loginnum`, `last_login_ip`, `last_login_time`, `real_name`, `status`, `groupid`, `token`) VALUES
(1, 'admin', '218dbb225911693af03a713581a7227f', '20181122\\admin.jpeg', 1186, '0.0.0.0', 1561357904, 'admin', 1, 1, '1ac2fc424c64cdf80db98a246f439287');

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group`
--

CREATE TABLE `think_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `org_num` int(11) NOT NULL DEFAULT '0' COMMENT '组织编号',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_auth_group`
--

INSERT INTO `think_auth_group` (`id`, `title`, `org_num`, `status`, `rules`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 0, 1, '', 1561010232, 1561010232);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group_access`
--

CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_auth_group_access`
--

INSERT INTO `think_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_rule`
--

CREATE TABLE `think_auth_rule` (
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
-- 转存表中的数据 `think_auth_rule`
--

INSERT INTO `think_auth_rule` (`id`, `name`, `title`, `type`, `status`, `css`, `condition`, `pid`, `sort`, `create_time`, `update_time`) VALUES
(1, '#', '系统管理', 1, 1, 'fa fa-gear', '', 0, 20, 1556269085, 1556269105),
(2, 'admin/admin/index', '用户管理', 1, 1, '', '', 1, 1, 1556269085, 1556269105),
(3, 'admin/role/index', '角色管理', 1, 1, '', '', 1, 2, 1556269085, 1556269105),
(4, 'admin/menu/index', '菜单管理', 1, 1, '', '', 1, 3, 1556269085, 1556269105),
(5, '#', '数据库管理', 1, 1, 'fa fa-database', '', 0, 19, 1556269085, 1556269105),
(6, 'admin/data/index', '数据库备份', 1, 1, '', '', 5, 1, 1556269085, 1556269105),
(7, 'admin/data/optimize', '优化表', 1, 1, '', '', 6, 50, 1556269085, 1556269105),
(8, 'admin/data/repair', '修复表', 1, 1, '', '', 6, 50, 1556269085, 1556269105),
(9, 'admin/admin/adminAdd', '添加用户', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
(10, 'admin/admin/adminEdit', '编辑用户', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
(11, 'admin/admin/adminDel', '删除用户', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
(12, 'admin/admin/user_state', '用户状态', 1, 1, '', '', 2, 50, 1556269085, 1556269105),
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
(63, 'admin/config/save', '保存配置', 1, 1, '', '', 61, 50, 1556269085, 1556269105);

-- --------------------------------------------------------

--
-- 表的结构 `think_config`
--

CREATE TABLE `think_config` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_config`
--

INSERT INTO `think_config` (`id`, `name`, `value`) VALUES
(1, 'web_site_title', '项目管理系统'),
(2, 'web_site_description', '项目管理系统'),
(3, 'web_site_keyword', '项目管理系统'),
(4, 'web_site_icp', '粤ICP备15002349号-1'),
(5, 'web_site_cnzz', ''),
(6, 'web_site_copy', 'Copyright © 2019 项目管理系统 All rights reserved.'),
(7, 'web_site_close', '1'),
(8, 'list_rows', '5'),
(9, 'admin_allow_ip', NULL),
(10, 'alisms_appkey', 'UejF485jyYuyTxcd'),
(11, 'alisms_appsecret', 'uLSBt24uFZILZ0GCw5eewwginQrX6U'),
(12, 'alisms_signname', '注册验证'),
(13, 'words_is_audit', '0'),
(14, 'comment_is_audit', '0'),
(15, 'device_is_audit', '0'),
(16, 'wechat_appkey', '123'),
(17, 'wechat_appsecret', '123');

-- --------------------------------------------------------

--
-- 表的结构 `think_log`
--

CREATE TABLE `think_log` (
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
-- 转存表中的数据 `think_log`
--

INSERT INTO `think_log` (`log_id`, `admin_id`, `admin_name`, `title`, `description`, `ip`, `status`, `add_time`) VALUES
(1, 1, 'admin', 'admin', '用户【admin】登录成功', '0.0.0.0', 1, 1561357420),
(2, 1, 'admin', 'admin', '用户【admin】登录成功', '0.0.0.0', 1, 1561357904);

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE `think_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `account` varchar(64) DEFAULT NULL COMMENT '邮件或者手机',
  `nickname` varchar(32) DEFAULT NULL COMMENT '昵称',
  `remark` varchar(225) NOT NULL DEFAULT '' COMMENT '签名',
  `sex` enum('男','女','') NOT NULL DEFAULT '' COMMENT '性别',
  `password` char(32) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `head_img` varchar(128) DEFAULT NULL COMMENT '头像',
  `mobile` varchar(11) DEFAULT NULL COMMENT '认证的手机号码',
  `user_type` varchar(11) DEFAULT NULL COMMENT '用户类型',
  `create_time` int(11) DEFAULT '0' COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '最后一次登录',
  `login_num` varchar(15) DEFAULT NULL COMMENT '登录次数',
  `status` tinyint(1) DEFAULT NULL COMMENT '用户状态（0-禁用，1-启用）',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除（0-否，1-是）',
  `token` char(32) DEFAULT '0' COMMENT '令牌',
  `session_id` varchar(20) DEFAULT NULL,
  `token_expire_time` int(10) NOT NULL DEFAULT '0' COMMENT 'token过期时间',
  `change_pwd_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后修改密码的时间',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后一次登录的时间',
  `last_login_ip` varchar(225) NOT NULL DEFAULT '' COMMENT '最后登录的IP',
  `like_user_count` int(11) NOT NULL DEFAULT '0' COMMENT '关注人数',
  `fans_count` int(11) NOT NULL DEFAULT '0' COMMENT '粉丝人数',
  `like_words_count` int(11) NOT NULL DEFAULT '0' COMMENT '收藏作品数量',
  `words_count` int(11) NOT NULL DEFAULT '0' COMMENT '作品数量',
  `coupon` varchar(255) DEFAULT NULL COMMENT '优惠券',
  `balance` varchar(255) DEFAULT NULL COMMENT '余额',
  `integral` varchar(255) DEFAULT NULL COMMENT '积分',
  `set_meal` varchar(255) DEFAULT NULL,
  `company_code` varchar(11) DEFAULT NULL COMMENT '公司代码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `account`, `nickname`, `remark`, `sex`, `password`, `group_id`, `head_img`, `mobile`, `user_type`, `create_time`, `update_time`, `login_num`, `status`, `is_del`, `token`, `session_id`, `token_expire_time`, `change_pwd_time`, `last_login_time`, `last_login_ip`, `like_user_count`, `fans_count`, `like_words_count`, `words_count`, `coupon`, `balance`, `integral`, `set_meal`, `company_code`) VALUES
(2, '15622758566', 'admin', 'cjj', '男', '218dbb225911693af03a713581a7227f', 0, '20190226/f09062d49c9d625816020c2a996c39f4.jpg', '15622758566', NULL, 0, NULL, NULL, 1, 0, '0', NULL, 0, 0, 0, '', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `think_admin`
--
ALTER TABLE `think_admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `think_auth_group`
--
ALTER TABLE `think_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `think_auth_group_access`
--
ALTER TABLE `think_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- 表的索引 `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `think_config`
--
ALTER TABLE `think_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name` (`name`);

--
-- 表的索引 `think_log`
--
ALTER TABLE `think_log`
  ADD PRIMARY KEY (`log_id`);

--
-- 表的索引 `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `think_admin`
--
ALTER TABLE `think_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用表AUTO_INCREMENT `think_auth_group`
--
ALTER TABLE `think_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- 使用表AUTO_INCREMENT `think_config`
--
ALTER TABLE `think_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置ID', AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `think_log`
--
ALTER TABLE `think_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `think_user`
--
ALTER TABLE `think_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
