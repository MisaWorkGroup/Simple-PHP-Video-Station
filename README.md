# Simple-PHP-Video-Station
一个简单的、基于 PHP 和 MySQL 的视频点播站。 A simple video station based on PHP and MySQL.

## 特点

- 仅 655K 主体文件和 3 张数据表
- 前后端分离
- 支持 pjax 无刷适配
- 使用 DPlayer 播放器，可加载弹幕
- 自带站点留言板
- 全站公告/页脚/关于均可自定义
- 强制伪静态，并支持 SEO 设置

## 安装

1. 下载本仓库最新的 [`Release`](https://github.com/MisaLiu/Simple-PHP-Video-Station/releases)，上传至服务器并解压
2. 将自带的示例数据库 `video.sql` 导入至你的数据库中
3. 将自带的伪静态规则 `Rewrite-Apache/Nginx.conf` 设置在你的服务器中
4. 在 `data/Config.php` 中设置站点数据库、管理面板账户等
5. 在 `你的域名/admin.php` 中设置你的站点相关数据
6. 完成！

## 谁在使用？

- [哲♂学资源站](https://aniki.top)

## 鸣谢

在这个程序中使用了以下几个项目：

- [DIYgod/DPlayer](https://github.com/DIYgod/DPlayer)
- [ThingEngineer/PHP-MySQLi-Database-Class](https://github.com/ThingEngineer/PHP-MySQLi-Database-Class)
- [zdhxiong/mdui](https://github.com/zdhxiong/mdui)
- [erusev/parsedown](https://github.com/erusev/parsedown)
- [gravatar.bytecho.net（国内 Gravatar 镜像）](https://gravatar.bytecho.net/)
