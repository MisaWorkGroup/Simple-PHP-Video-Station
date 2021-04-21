-- 生成日期: 2021-04-21 11:26:43
-- 服务器版本: 5.5.62-log
-- PHP 版本: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `video`
--

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `config` text NOT NULL COMMENT '设置参数名',
  `value` text COMMENT '设置参数值',
  `comment` text NOT NULL COMMENT '设置项备注说明',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='站点设置' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `config`, `value`, `comment`) VALUES
(1, 'sitename', '简单视频站', '设置站点的名称'),
(2, 'sitekeywords', '简单视频站', '设置站点的关键词，多个用英文逗号隔开，用于SEO优化，不需要可留空'),
(3, 'sitedescription', '简单视频站', '设置站点的描述，多个用英文逗号隔开，用于SEO优化，不需要可留空'),
(4, 'siteauthor', 'MisaLiu', '设置站点的作者，多个用英文逗号隔开，用于SEO优化，不需要可留空'),
(5, 'sitenotice', '<p>这是站点公告区，您可以在此处编写 <b>标准 HTML 代码</b>。如果您不需要公告，您可以留空。</p>', '设置站点公告区内容，仅支持HTML格式文本，留空自动关闭区域。'),
(6, 'sitefooter', '<center><p>这里是站点的全局页脚。您可以在此处编写标准 HTML 代码。如果您不需要页脚，您可以留空。</p></center>', '设置站点页脚区域的内容，此处应为纯HTML代码，不想设置可留空。'),
(7, 'siteabout', '<p>这里是站点的「关于」独立页面。您可以在此编写标准 HTML 代码。如果您不需要可以留空。</p>', '站点关于页的内容，仅支持HTML格式文本，留空自动关闭区域。');

-- --------------------------------------------------------

--
-- 表的结构 `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='站点视频列表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `data`
--

INSERT INTO `data` (`id`, `name`, `url`, `views`) VALUES
(1, '视频 1', '/video/1.mp4', 0),
(2, '视频 2', '/video/2.mp4', 0),
(3, '视频 3', '/video/3.mp4', 0),
(4, '视频 4', '/video/4.mp4', 0);

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `website` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `messages`
--

INSERT INTO `messages` (`id`, `username`, `email`, `website`, `timestamp`, `message`, `state`) VALUES
(1, 'HIMlaoS_Misa', 'misaliu@misaliu.top', 'https://misaliu.top', '2021-04-21 00:54:27', '## Hello World!\n\n感谢您使用本程序。您可以在导入数据库后自行编辑数据库以调整您自己的设定。\n\nGitHub 仓库 → https://github.com/MisaLiu/Simple-PHP-Video-Station', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
