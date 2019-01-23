/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : checkclass

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-05-23 21:09:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '管理员姓名',
  `password` varchar(60) DEFAULT NULL COMMENT '管理员密码',
  `phone` varchar(18) DEFAULT NULL COMMENT '手机号',
  `sex` varchar(10) DEFAULT NULL COMMENT '性别',
  `add_time` int(13) DEFAULT NULL COMMENT '添加时间',
  `status` int(6) DEFAULT '1' COMMENT '是否可用 1是 2否',
  `email` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `role_id` int(11) DEFAULT NULL COMMENT '权限id',
  `last_login_time` int(11) DEFAULT NULL COMMENT '上次登录时间',
  `login_time` int(11) DEFAULT NULL COMMENT '当前登录时间',
  `login_times` int(11) DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('20', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '18270896758', '男', '1514603636', '1', '18579067905@qq.com', '2', '1524317110', '1525705784', '8');
INSERT INTO `admin` VALUES ('52', 'admin', '21232f297a57a5a743894a0e4a801fc3', '18579067508', '男', '1514860685', '1', '18579067906@qq.com', '1', '1526910061', '1526997832', '50');
INSERT INTO `admin` VALUES ('53', 'user1', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1525784061', '1', '693440140@qq.com', '2', '1526390527', '1527078989', '4');
INSERT INTO `admin` VALUES ('54', 'user2', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1525784081', '1', '693440140@qq.com', '1', null, '1527079008', '1');
INSERT INTO `admin` VALUES ('55', 'user3', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1526816749', '1', '693440140@qq.com', null, null, null, '0');

-- ----------------------------
-- Table structure for checkclass
-- ----------------------------
DROP TABLE IF EXISTS `checkclass`;
CREATE TABLE `checkclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` bigint(14) DEFAULT NULL COMMENT '学生id',
  `teach_id` int(11) DEFAULT NULL COMMENT '教师id',
  `class_id` int(11) DEFAULT NULL COMMENT '课程id',
  `status` int(3) DEFAULT '1' COMMENT '是否可用 1是 2否',
  `add_time` varchar(255) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='选课情况表';

-- ----------------------------
-- Records of checkclass
-- ----------------------------
INSERT INTO `checkclass` VALUES ('9', '2', '2', '6', '1', '1524235878');
INSERT INTO `checkclass` VALUES ('10', '3', '2', '4', '1', '1524235879');
INSERT INTO `checkclass` VALUES ('12', '2', '1', '1', '1', '1526474254');
INSERT INTO `checkclass` VALUES ('14', '2', '2', '2', '1', '1526818755');
INSERT INTO `checkclass` VALUES ('15', '2', '3', '5', '1', '1526818757');
INSERT INTO `checkclass` VALUES ('18', '2', '4', '9', '1', '1526998152');
INSERT INTO `checkclass` VALUES ('19', '2', '5', '10', '1', '1526998156');
INSERT INTO `checkclass` VALUES ('20', '2', '1', '3', '1', '1526998310');
INSERT INTO `checkclass` VALUES ('21', '5', '1', '1', '1', '1526998424');
INSERT INTO `checkclass` VALUES ('22', '5', '2', '2', '1', '1526998429');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(30) DEFAULT NULL COMMENT '配置名',
  `value` int(11) DEFAULT NULL COMMENT '配置值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'start_time', '1525868800');
INSERT INTO `config` VALUES ('2', 'end_time', '1527769608');
INSERT INTO `config` VALUES ('3', 'max_num', '8');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major_id` int(11) DEFAULT NULL COMMENT '专业id',
  `name` varchar(255) DEFAULT NULL COMMENT '课程名',
  `credit` int(11) DEFAULT NULL COMMENT '学分',
  `tol_nums` int(11) DEFAULT NULL COMMENT '可选数量',
  `status` int(11) DEFAULT '1' COMMENT '是否可选 1：可选,0：不可选',
  `teach_id` varchar(255) DEFAULT NULL COMMENT '授课老师id',
  `cla_place` varchar(255) DEFAULT NULL COMMENT '上课地点',
  `weekdays` varchar(255) DEFAULT NULL COMMENT '上课时间星期几',
  `add_time` int(45) DEFAULT NULL COMMENT '添加时间',
  `jieci` varchar(200) DEFAULT NULL COMMENT '上课时间第几节',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='课程表';

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '1', 'php从入门到精通', '3', '70', '1', '1', '3305', '二', '1526301548', '三四');
INSERT INTO `course` VALUES ('2', '1', 'java从入门到精通', '3', '70', '1', '2', '3301', '三', '1526301592', '七八');
INSERT INTO `course` VALUES ('3', '3', 'c语言从入门到精通', '2', '65', '1', '1', '1202', '二', '1522325979', '一二');
INSERT INTO `course` VALUES ('4', '1', '网页设计', '2', '60', '1', '2', '3102', '一', '1522326009', '一二');
INSERT INTO `course` VALUES ('5', '2', '近现代史', '3', '66', '1', '3', '3301', '六', '1522332010', '五六');
INSERT INTO `course` VALUES ('6', '3', '思修', '2', '66', '1', '2', '4402', '四', '1522332063', '三四');
INSERT INTO `course` VALUES ('7', '1', '毛泽东思想概论', '2', '66', '1', '1', '213', '五', '1524318737', '三四');
INSERT INTO `course` VALUES ('8', '1', '软件工程', '2', '67', '1', '2', '1234', '四', '1524318752', '五六');
INSERT INTO `course` VALUES ('9', '1', '嵌入式', '3', '66', '1', '4', '1205', '三', '1526820001', '三四');
INSERT INTO `course` VALUES ('10', '5', '大学物理I', '3', '66', '1', '5', '4201', '一', '1526821558', '一二');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '登录用户的用户名',
  `ip` varchar(18) DEFAULT NULL COMMENT '登录ip',
  `login_time` int(11) DEFAULT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='登录情况表';

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'admin', '127.0.0.1', '1519288320');
INSERT INTO `login` VALUES ('2', 'admin', '127.0.0.1', '1519288629');
INSERT INTO `login` VALUES ('3', 'admin', '127.0.0.1', '1519980200');
INSERT INTO `login` VALUES ('4', 'admin', '127.0.0.1', '1520733277');
INSERT INTO `login` VALUES ('5', 'user', '127.0.0.1', '1520734430');
INSERT INTO `login` VALUES ('6', 'admin', '127.0.0.1', '1520734458');
INSERT INTO `login` VALUES ('7', 'user', '127.0.0.1', '1520737999');
INSERT INTO `login` VALUES ('8', 'user', '127.0.0.1', '1520738036');
INSERT INTO `login` VALUES ('9', 'admin', '127.0.0.1', '1521285688');
INSERT INTO `login` VALUES ('10', 'admin', '127.0.0.1', '1521285689');
INSERT INTO `login` VALUES ('11', 'admin', '127.0.0.1', '1521285690');
INSERT INTO `login` VALUES ('12', 'admin', '127.0.0.1', '1521360375');
INSERT INTO `login` VALUES ('13', 'admin', '127.0.0.1', '1521375209');
INSERT INTO `login` VALUES ('14', 'admin', '127.0.0.1', '1521376568');
INSERT INTO `login` VALUES ('15', '123456', '127.0.0.1', '1521376628');
INSERT INTO `login` VALUES ('16', 'admin', '127.0.0.1', '1521378248');
INSERT INTO `login` VALUES ('17', 'admin', '127.0.0.1', '1521632596');
INSERT INTO `login` VALUES ('18', 'admin', '127.0.0.1', '1521720552');
INSERT INTO `login` VALUES ('19', 'admin', '127.0.0.1', '1521966415');
INSERT INTO `login` VALUES ('20', 'admin', '127.0.0.1', '1521966417');
INSERT INTO `login` VALUES ('21', 'admin', '127.0.0.1', '1522325795');
INSERT INTO `login` VALUES ('22', 'admin', '127.0.0.1', '1522722528');
INSERT INTO `login` VALUES ('23', 'admin', '127.0.0.1', '1522722889');
INSERT INTO `login` VALUES ('24', 'admin', '127.0.0.1', '1522828697');
INSERT INTO `login` VALUES ('25', 'admin', '127.0.0.1', '1523099827');
INSERT INTO `login` VALUES ('26', 'admin', '127.0.0.1', '1523109500');
INSERT INTO `login` VALUES ('27', 'admin', '127.0.0.1', '1523796979');
INSERT INTO `login` VALUES ('28', 'admin', '127.0.0.1', '1524316491');
INSERT INTO `login` VALUES ('29', 'admin', '127.0.0.1', '1524317046');
INSERT INTO `login` VALUES ('30', 'admin', '127.0.0.1', '1524317078');
INSERT INTO `login` VALUES ('31', 'user', '127.0.0.1', '1524317110');
INSERT INTO `login` VALUES ('32', 'admin', '127.0.0.1', '1524317532');
INSERT INTO `login` VALUES ('33', 'admin', '127.0.0.1', '1525613506');
INSERT INTO `login` VALUES ('34', 'admin', '127.0.0.1', '1525705753');
INSERT INTO `login` VALUES ('35', 'user', '127.0.0.1', '1525705784');
INSERT INTO `login` VALUES ('36', 'admin', '127.0.0.1', '1525782686');
INSERT INTO `login` VALUES ('37', 'user1', '127.0.0.1', '1526214575');
INSERT INTO `login` VALUES ('38', 'user1', '127.0.0.1', '1526214638');
INSERT INTO `login` VALUES ('39', 'admin', '127.0.0.1', '1526300629');
INSERT INTO `login` VALUES ('41', 'user1', '127.0.0.1', '1526390528');
INSERT INTO `login` VALUES ('42', 'admin', '127.0.0.1', '1526390555');
INSERT INTO `login` VALUES ('43', 'admin', '127.0.0.1', '1526477947');
INSERT INTO `login` VALUES ('44', 'admin', '127.0.0.1', '1526906727');
INSERT INTO `login` VALUES ('45', 'admin', '127.0.0.1', '1526910061');
INSERT INTO `login` VALUES ('46', 'admin', '127.0.0.1', '1526997833');
INSERT INTO `login` VALUES ('47', 'user1', '127.0.0.1', '1527078989');
INSERT INTO `login` VALUES ('48', 'user2', '127.0.0.1', '1527079008');

-- ----------------------------
-- Table structure for major
-- ----------------------------
DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '专业名',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `status` int(3) DEFAULT '1' COMMENT '是否可用 1是 2否',
  `maxnums` int(11) DEFAULT '7' COMMENT '最大选课数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='专业表';

-- ----------------------------
-- Records of major
-- ----------------------------
INSERT INTO `major` VALUES ('1', '计算机科学与技术', '1522208685', '1', '7');
INSERT INTO `major` VALUES ('2', '电子信息工程', '1522208685', '1', '9');
INSERT INTO `major` VALUES ('3', '电子商务', '1522208685', '1', '6');
INSERT INTO `major` VALUES ('5', '通信工程', '1526821367', '1', '7');
INSERT INTO `major` VALUES ('6', '网络工程', '1526907201', '1', '8');
INSERT INTO `major` VALUES ('7', '软件工程', '1526907433', '1', '9');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `click` int(11) DEFAULT '0' COMMENT '点击量',
  `status` int(3) DEFAULT '1' COMMENT '是否可用 1是 2否',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '关于2017下学年选课通知', '&emsp;&lt;p&gt;选课时间截止6月3号，请没选课的同学尽快选课！&lt;/p&gt;', '1526305531', '3', '1', 'admin');
INSERT INTO `news` VALUES ('2', '我校隆重举行纪念建团96周年五四大合唱比赛暨五四表彰大会', '&lt;p&gt;（校团委信息传媒中心 张可欣报道 刘宇欣摄影）忆五四峥嵘，颂青春华章。5月4日晚，由共青团华东交通大学理工学院委员会主办，校学生会文艺部承办的纪念建团96周年五四大合唱比赛暨五四表彰大会在体育馆举行。学工处处长张国迎、校团委书记廖立平、土建分院副院长王万里、机电分院副院长乔冬敏、经管分院副院长刘名扬及各分院辅导员受邀观看比赛，大赛评委由艺体分院老师张立众、肖丹及各分院团总支书记担任。&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G514304S.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;弘扬五四精神，歌颂红歌经典&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 跨着整齐的步伐，国旗护卫队入场，气宇轩昂举手投足之间，无不体现交理学子奋发向上的青春气息。“我们是五月的花海，用青春拥抱时代……”校学生会带来一首《光荣啊，中国共青团》展现了当代大学生的蓬勃朝气和青春风采，至此比赛正式拉开帷幕。此次比赛共有来自各个分院的11支队伍参加。比赛曲目紧紧围绕主题，呈现风格多样，各参赛队伍在合唱中加入了武术表演、朗诵、器乐演奏、手语操等元素，比赛精彩纷呈。土建分院的《黄河大合唱》气势磅礴，饱含激情；经管分院一首《爱我中华》用民族舞彰显对祖国的热爱，以不同民族的服装博人眼球；文法分院一首振奋人心的《歌唱祖国》，优美的旋律奏响了中华民族伟大复兴的乐章；艺体分院魄力十足，《最美的歌儿唱给妈妈》完美融入琵琶，舞蹈，结尾的高音震撼全场。&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G5354GV.jpg&quot;/&gt;&lt;br/&gt;学生会《光荣啊，共青团》&lt;br/&gt;&lt;br/&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G53U5555.jpg&quot;/&gt;&lt;br/&gt;经管分院《爱我中华》&lt;br/&gt;&lt;br/&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G54019404.jpg&quot;/&gt;&lt;br/&gt;艺体分院《最美的歌儿唱给妈妈》&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;展少年风采，谱青春华章&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;当经管分院的《红旗飘飘》点燃你心中热血，唤起中华儿女的自豪与骄傲。艺体分院的《我爱你中国》那嘹亮的歌声更是以真实的情感感染在场观众。回想中国崛起，电信男儿一首《中国军魂》铿锵有力，血气方刚。犯我中华者，虽远必诛，军官教导队和综治委演唱的《练练练+一切为打赢》，让大家看到了中国新时代青年们的自信与斗志。机电分院的《掀起你的盖头来》以悠扬欢快的曲调诉说着青年的爱恋与欢乐。随着文法分院一首《友谊天长地久》，比赛进入尾声。&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G54304F2.jpg&quot;/&gt;&lt;br/&gt;经管分院《红旗飘飘》&lt;br/&gt;&lt;br/&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G544101Q.jpg&quot;/&gt;&lt;br/&gt;电信分院《中国军魂》&lt;br/&gt;&lt;br/&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G5445Sb.jpg&quot;/&gt;&lt;br/&gt;军官教导队、综治委《练练练+一切为打赢》&lt;br/&gt;&lt;br/&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G54546333.jpg&quot;/&gt;&lt;br/&gt;机电分院《掀起你的盖头来》&lt;br/&gt;&lt;br/&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G54625S6.jpg&quot;/&gt;&lt;br/&gt;文法分院《友谊天长地久》&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 最终，艺体分院凭借《最美的歌儿献给妈妈》《我爱你中国》、经管分院凭借《爱我中华》斩获一等奖；土建分院的《我爱你中国》、经管分院的《红旗飘飘》荣获二等奖；机电分院，土建分院，文法分院分别以《掀起你的盖头来》《黄河大合唱》《歌唱祖国》夺得三等奖；文法分院的雅咏合唱队，机电分院的八分音符合唱队，电信分院的吟唱者、彩虹合唱队把优秀合唱队奖收入囊中；艺体分院的小可爱合唱队、土建分院的追梦韶华合唱队获得优秀指挥奖。&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 此外，大会还对学校共青团工作进行表彰，由校团委书记廖立平宣读《关于表彰华东交通大学理工学院2017年度优秀共青团员、优秀共青团干部、优秀团支部的决定》，学工处处长张国迎为获奖集体和代表颁发荣誉证书。&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G54G4293.jpg&quot;/&gt;&lt;br/&gt;&lt;br/&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180507/2-1P50G54H6318.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1526305587', '18', '1', 'admin');
INSERT INTO `news` VALUES ('4', '关于组织我校师生集中观看纪录影片《厉害了，我的国》的紧急通知', '&lt;p&gt;各基层党组织：&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 为深入学习贯彻习近平新时代中国特色社会主义思想和党的十九大精神，不断加强和改进思想政治工作，充分发挥纪录影片《厉害了，我的国》的思想教育功能，引导广大师生不断增强“四个意识”，坚定“四个自信”，根据教育部有关要求，以及省委教育工委的统一部署，决定在我校组织开展师生集中观看纪录影片《厉害了，我的国》工作。请各基层党组织按照文件要求，组织好观看活动。&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 各基层党组织必须将有关学习观看情况，于2018年5月13日前报送到党委宣传部。&lt;/p&gt;', '1526306900', '3', '1', 'admin');
INSERT INTO `news` VALUES ('5', '【江西教育网】世界微笑日：你的微笑是最美的语言', '&lt;p&gt;马克·吐温说：“人类确有一件有效武器，那就是笑。”微笑似乎有一种魔力，只是嘴角微微上扬，仿佛一切都变得不一样了。世界微笑日来临之际，华东交通大学理工学院学子用镜头记录校园内各式微笑，展示华东交大理工最美的语言。&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180514/0TI04232-0.jpg&quot; width=&quot;500&quot;/&gt;&lt;/p&gt;&lt;p&gt;图为三教门卫樊孝金夫妇及其孙女的微笑照&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;樊孝金夫妇在学校已经工作了八年，日常工作主要是检查三教卫生、教室是否关灯及安全问题等，八年里夫妻两认真负责，待人亲切，樊大爷还写的一手好字。&lt;br/&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180514/0TI04c2-1.jpg&quot; width=&quot;500&quot;/&gt;&lt;/p&gt;&lt;p&gt;图为17电气何戚天同学的微笑照&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;图片由刘伦胜拍摄，刘伦胜说：“当时两人一起在图书馆，转头发现他看着书笑了，那一刻觉得知识和微笑是最有生命力的东西，便随手拍了下来。”&lt;br/&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180514/0TI053N-2.jpg&quot; width=&quot;500&quot;/&gt;&lt;/p&gt;&lt;p&gt;图为机电分院14届毕业生于襄涛与聂文婷的微笑照&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;于襄涛说：“最幸运的事情就是遇见她，最幸福的事情，大概就是在毕业季时，我们两还能站在彼此身边，有说有笑，愿天下有情人终成眷属。”&lt;br/&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180514/0TI03T7-3.jpg&quot; width=&quot;500&quot;/&gt;&lt;/p&gt;&lt;p&gt;图为二食堂一家餐饮店的工作人员李飞飞的微笑照&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;她说：“做服务行业最重要的是亲和力，微笑是最能够展现亲和力的东西，我希望让同学们能够再点餐时感到愉悦。”&lt;br/&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180514/0TI0KF-4.jpg&quot; width=&quot;500&quot;/&gt;&lt;/p&gt;&lt;p&gt;图为勤工外联部成员的微笑照&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 部门成员樊鑫港说：“经常中午部门例会结束后，我们这一群‘单身狗’会一块吃饭，一来可以增进感情，二来大家聚在一起嬉笑打闹，很开心。”&lt;br/&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://www.ecjtuit.com.cn/uploads/allimg/180514/0TI06441-5.jpg&quot; width=&quot;500&quot;/&gt;&lt;/p&gt;&lt;p&gt;图为电信分院宣传部摄影组刘伦胜的微笑照&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;该图由其室友熊健拍摄。熊健说：“室友每天都‘浸泡’在照片里，经常要在上百张照片里选出3-5张照片，也没听到他抱怨。平日里他很热心乐观，笑起来很阳光，以前都是他给别人拍照，今天终于为他拍一次了。”&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 据悉世界微笑日是由世界卫生组织在1948年确定的唯一一个庆祝人类行为表情的节日，日期为每年的5月8日。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1526306951', '1', '1', 'admin');
INSERT INTO `news` VALUES ('6', '关于举办黄家湖讲坛——校园新闻采访与写作专题讲座的通知', '&lt;p&gt;各分院（部门），信息传媒中心、外宣通讯员:&lt;br/&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 本学期第二期黄家湖讲坛即将开讲。应党委宣传部邀请，江西教育网编辑老师将于5月6日本周日下午3时在综合大楼三楼报告厅举行“校园新闻采访与写作”专题讲座，届时请各分院（部门）师生校内通讯员、信息传媒中心全体同学、外宣通讯员准时参加。&lt;br/&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 特此通知！&lt;/p&gt;', '1526307007', '2', '1', 'admin');
INSERT INTO `news` VALUES ('7', '1243', '&lt;p&gt;1234&lt;/p&gt;', '1526820551', '0', '1', '1234');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` bigint(14) DEFAULT NULL COMMENT '学号',
  `major_id` int(11) DEFAULT NULL COMMENT '专业id',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `phone` varchar(11) DEFAULT NULL COMMENT '手机',
  `sex` varchar(10) DEFAULT NULL COMMENT '性别',
  `add_time` int(13) DEFAULT NULL COMMENT '添加时间',
  `email` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `status` int(3) DEFAULT '1' COMMENT '是否启用 1：是，2：否',
  `realname` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `update_time` int(13) DEFAULT NULL COMMENT '更新时间',
  `regis_time` int(13) DEFAULT NULL COMMENT '学生注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='学生表';

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '20140210440218', '1', '96e79218965eb72c92a549dd5a330112', '13755452505', '女', '1521969556', '693438015@qq.com', '1', 'asf', null, '1504224000');
INSERT INTO `student` VALUES ('2', '20140210440219', '1', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1522153306', '693440140@qq.com', '1', '揭锦涛', '1526999988', '1504224000');
INSERT INTO `student` VALUES ('5', '20140210440217', '3', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1524145401', '693440140@qq.com', '1', null, null, '1504224000');
INSERT INTO `student` VALUES ('6', '20140210440215', '3', '96e79218965eb72c92a549dd5a330112', '13755452505', '女', '1526817520', '693440140@qq.com', '1', null, null, '1504224000');
INSERT INTO `student` VALUES ('7', '20140210440211', '1', '96e79218965eb72c92a549dd5a330112', '18270896758', '男', '1526906475', '693440140@qq.com', '1', null, null, '1504224000');
INSERT INTO `student` VALUES ('8', '20140210440210', '7', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1526908260', '693440140@qq.com', '1', null, null, '1504224000');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teach_id` bigint(14) DEFAULT NULL COMMENT '教工号',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `phone` varchar(11) DEFAULT NULL COMMENT '手机号',
  `sex` varchar(10) DEFAULT NULL COMMENT '性别',
  `add_time` int(13) DEFAULT NULL COMMENT '添加时间',
  `email` varchar(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1' COMMENT '是否启用 1：是，2：否',
  `realname` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='教师表';

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', '20180001', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1521969684', '693440146@qq.com', '1', '吴宇鹏', '1527001023');
INSERT INTO `teacher` VALUES ('2', '20180002', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1522241732', '693440140@qq.com', '1', '程志平', '1522246665');
INSERT INTO `teacher` VALUES ('3', '20180003', '96e79218965eb72c92a549dd5a330112', '13755452505', '女', '1522675608', '693440141@qq.com', '1', '李老师', '1522676175');
INSERT INTO `teacher` VALUES ('4', '20180004', '96e79218965eb72c92a549dd5a330112', '18270896758', '男', '1525612455', '693438015@qq.com', '1', '张老师', '1525612816');
INSERT INTO `teacher` VALUES ('5', '20180005', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1525784236', '693440140@qq.com', '1', '肖老师', null);
INSERT INTO `teacher` VALUES ('8', '20180007', '96e79218965eb72c92a549dd5a330112', '13755452505', '男', '1525787253', '693440140@qq.com', '1', '黄老师', null);
