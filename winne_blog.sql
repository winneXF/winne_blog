/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : winne_blog

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2018-06-11 10:02:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for winne_admin
-- ----------------------------
DROP TABLE IF EXISTS `winne_admin`;
CREATE TABLE `winne_admin` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `adminname` varchar(30) NOT NULL COMMENT '管理员用户名',
  `password` char(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_admin
-- ----------------------------
INSERT INTO `winne_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `winne_admin` VALUES ('14', 'xf', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `winne_admin` VALUES ('15', 'winne', '5354eb6a0c04d9e40de0c2d08ba709fc');

-- ----------------------------
-- Table structure for winne_anchor
-- ----------------------------
DROP TABLE IF EXISTS `winne_anchor`;
CREATE TABLE `winne_anchor` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '锚点主键id',
  `article_id` smallint(6) NOT NULL COMMENT '文章id（主键）',
  `id_name` varchar(100) NOT NULL COMMENT '锚点id名，一篇文章中的id用英文逗号隔开',
  `anchor_name` text NOT NULL COMMENT '锚点标题，一篇文章的锚点标题用英文逗号隔开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_anchor
-- ----------------------------
INSERT INTO `winne_anchor` VALUES ('3', '24', 'web1,web2,web3', '1111111,22222222,3333333');
INSERT INTO `winne_anchor` VALUES ('4', '1', 'html1,html2,html3,html4', '一、什么是HTML语义化？,二、为什么要语义化？,三、写HTML代码时应注意什么？,四、HTML5新增了哪些语义标签');
INSERT INTO `winne_anchor` VALUES ('5', '4', 'jq1,jq2,jq3', '一、简洁的写法,二、支持CSS1到CSS3选择器,三、完善的处理机制');
INSERT INTO `winne_anchor` VALUES ('6', '3', 'js1,js2,js3,js4,js5,js6', '一、 什么是JavaScript解析引擎？,二、 JavaScript解析引擎与ECMAScript是什么关系？,三、 JavaScript解析引擎与浏览器又是什么关系？,四、 深入了解其内部原理的途径有哪些？,五、为什么JavaScript是单线程？,六、 以上几种方式中第一种都很难看明白怎么办？');
INSERT INTO `winne_anchor` VALUES ('7', '27', 'webpack1,webpack2', '一、局部安装介绍：,二、构建项目：');

-- ----------------------------
-- Table structure for winne_article
-- ----------------------------
DROP TABLE IF EXISTS `winne_article`;
CREATE TABLE `winne_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章主键id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `belong_nav` smallint(4) NOT NULL COMMENT '1：学无止境；  5：生活情感',
  `descript` text NOT NULL COMMENT '文章描述',
  `keywords` varchar(100) NOT NULL COMMENT '文章关键字',
  `content` text NOT NULL COMMENT '文章内容',
  `pic` varchar(100) NOT NULL COMMENT '文章缩略图',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '浏览数',
  `article_state` smallint(2) NOT NULL DEFAULT '0' COMMENT '0：不推荐，1：推荐',
  `article_time` date NOT NULL COMMENT '文章发布时间',
  `navid` smallint(6) NOT NULL COMMENT '文章所属导航栏目',
  `author` varchar(30) NOT NULL COMMENT '文章的作者',
  `title_anchor_id` varchar(30) NOT NULL COMMENT '标题的锚点id名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_article
-- ----------------------------
INSERT INTO `winne_article` VALUES ('1', 'HTML标签语义化', '1', 'HTML在刚开始设计出来的时候就是带有一定的「语义」的，包括段落、表格、图片、标题等等，但这些更多地只是方便浏览器等UA对它们作合适的处理。但逐渐地，机器也要借助HTML提供的语义以及自然语言处理的手段来「读懂」它们从网上获取的HTML文档，但它们...', 'HTML', '<h2><a id=\"html1\">一、什么是HTML语义化？</a></h2><p>&lt;基本上都是围绕着几个主要的标签，像标题（h1~h6）、列表（li）、强调（strong&gt;\r\n　　根据内容的结构化（内容语义化），选择合适的标签（代码语义化）便于开发者阅读和写出更优雅的代码的同时让浏览器的爬虫和机器很好地解析。<!--基本上都是围绕着几个主要的标签，像标题（h1~h6）、列表（li）、强调（strong--><!--基本上都是围绕着几个主要的标签，像标题（h1~h6）、列表（li）、强调（strong--></p><h2><a id=\"html2\">二、为什么要语义化？</a></h2><p>1、为了在没有CSS的情况下，页面也能呈现出很好地内容结构、代码结构:为了裸奔时好看；\r\n &nbsp; &nbsp;2、用户体验：例如title、alt用于解释名词或解释图片信息、label标签的活用；\r\n &nbsp; &nbsp;3、有利于SEO：和搜索引擎建立良好沟通，有助于爬虫抓取更多的有效信息：爬虫依赖于标签来确定上下文和各个关键字的权重；\r\n &nbsp; &nbsp;4、方便其他设备解析（如屏幕阅读器、盲人阅读器、移动设备）以意义的方式来渲染网页；\r\n &nbsp; &nbsp;5、便于团队开发和维护，语义化更具可读性，是下一步吧网页的重要动向，遵循W3C标准的团队都遵循这个标准，可以减少差异化。</p><h2><a id=\"html3\">三、写HTML代码时应注意什么？</a></h2><p>1、尽可能少的使用无语义的标签div和span；\r\n &nbsp; &nbsp;2、在语义不明显时，既可以使用div或者p时，尽量用p, 因为p在默认情况下有上下间距，对兼容特殊终端有利；\r\n &nbsp; &nbsp;3、不要使用纯样式标签，如：b、font、u等，改用css设置。\r\n &nbsp; &nbsp;4、需要强调的文本，可以包含在strong或者em标签中（浏览器预设样式，能用CSS指定就不用他们），strong默认样式是加粗（不要用b），em是斜体（不用i）；\r\n &nbsp; &nbsp;5、使用表格时，标题要用caption，表头用thead，主体部分用tbody包围，尾部用tfoot包围。表头和一般单元格要区分开，表头用th，单元格用td；\r\n &nbsp; &nbsp;6、表单域要用fieldset标签包起来，并用legend标签说明表单的用途；\r\n &nbsp; &nbsp;7、 每个input标签对应的说明文本都需要使用label标签，并且通过为input设置id属性，在lable标签中设置for=someld来让说明文本和相对应的input关联起来。</p><h2><a id=\"html4\">四、HTML5新增了哪些语义标签</a></h2><p>在HTML 5出来之前，我们用div来表示页面章节，但是这些div都没有实际意义。（即使我们用css样式的id和class形容这块内容的意义）。这些标签只是我们提供给浏览器的指令，只是定义一个网页的某些部分。但现在，那些之前没“意义”的标签因为因为html5的出现消失了，这就是我们平时说的“语义”。</p>', '/uploads/20180428\\ea824e62e9a64cb3394ca3fe764fe683.png', '215', '1', '2018-04-30', '2', 'winne', 'html-1');
INSERT INTO `winne_article` VALUES ('2', '你所知道的CSS3', '1', 'CSS3是CSS的升级版本，这套新标准提供了更加丰富且实用的规范，如：盒子模型、列表模块、超链接方式、语言模块、背景和边框、文字特效、多栏布局等等，目前有很多浏览器已经相继支持这项升级的规范，如：Firefox、Chrome、Safari、Opera 等等。在Web开发中采用CSS3技术将会...', 'css3', '<pre><code>require(loadList, function ($, angular) {\r\n        $(function () {\r\n            angular.bootstrap(document, [\'blogApp\']);\r\n        });\r\n        hljs.initHighlightingOnLoad();\r\n    });</code></pre>', '/uploads/20180428\\c6dfc5877024a516f10646a872f19359.png', '80', '1', '2018-04-30', '3', 'winne', 'css3-1');
INSERT INTO `winne_article` VALUES ('3', 'javascript解析引擎', '1', 'javascript解析引擎是啥？javascript解析引擎也是程序，而且每个浏览器的编写解析引擎的语言（C或者C++）以及解析原理都不相同，标准的javascript解析引擎会按照 ECMAScript文档来实现，但是因为浏览器的份额，以至于每个浏览器都有自己的一套标准...', 'javascript', '<h2><a id=\"js1\">一、 什么是JavaScript解析引擎？</a></h2><p>简单地说，JavaScript解析引擎就是能够“读懂”JavaScript代码，并准确地给出代码运行结果的一段程序。比方说，当你写了 var a = 1 + 1; 这样一段代码，JavaScript引擎做的事情就是看懂（解析）你这段代码，并且将a的值变为2。</p><p>学过编译原理的人都知道，对于静态语言来说（如Java、C++、C），处理上述这些事情的叫编译器（Compiler），相应地对于JavaScript这样的动态语言则叫解释器（Interpreter）。这两者的区别用一句话来概括就是：编译器是将源代码编译为另外一种代码（比如机器码，或者字节码），而解释器是直接解析并将代码运行结果输出。 比方说，firebug的console就是一个JavaScript的解释器。</p><p>但是，现在很难去界定说，JavaScript引擎它到底算是个解释器还是个编译器，因为，比如像V8（Chrome的JS引擎），它其实为了提高 JS的运行性能，在运行之前会先将JS编译为本地的机器码（native machine code），然后再去执行机器码（这样速度就快很多），相信大家对JIT（Just In Time Compilation）一定不陌生吧。</p><p>我个人认为，不需要过分去强调JavaScript解析引擎到底是什么，了解它究竟做了什么事情我个人认为就可以了。对于编译器或者解释器究竟是如何看懂代码的，翻出大学编译课的教材就可以了。</p><p>这里还要强调的就是，JavaScript引擎本身也是程序，代码编写而成。比如V8就是用C/C++写的。</p><h2><a id=\"js2\">二、 JavaScript解析引擎与ECMAScript是什么关系？</a></h2><p>JavaScript引擎是一段程序，我们写的JavaScript代码也是程序，如何让程序去读懂程序呢？这就需要定义规则。比如，之前提到的var a = 1 + 1;，它表示：</p><p>左边var代表了这是申明（declaration），它申明了a这个变量\r\n &nbsp; &nbsp;右边的+表示要将1和1做加法\r\n &nbsp; &nbsp;中间的等号表示了这是个赋值语句\r\n &nbsp; &nbsp;最后的分号表示这句语句结束了</p><p>上述这些就是规则，有了它就等于有了衡量的标准，JavaScript引擎就可以根据这个标准去解析JavaScript代码了。那么这里的 ECMAScript就是定义了这些规则。其中ECMAScript 262这份文档，就是对JavaScript这门语言定义了一整套完整的标准。其中包括：</p><p>var，if，else，break，continue等是JavaScript的关键词\r\n\r\n &nbsp; &nbsp;abstract，int，long等是JavaScript保留词\r\n\r\n &nbsp; &nbsp;怎么样算是数字、怎么样算是字符串等等\r\n\r\n &nbsp; &nbsp;定义了操作符（+，-，&gt;，&lt;等）\r\n\r\n &nbsp; &nbsp;定义了JavaScript的语法\r\n\r\n &nbsp; &nbsp;定义了对表达式，语句等标准的处理算法，比如遇到==该如何处理\r\n\r\n &nbsp; &nbsp;⋯⋯</p><p>标准的JavaScript引擎就会根据这套文档去实现，注意这里强调了标准，因为也有不按照标准来实现的，比如IE的JS引擎。这也是为什么JavaScript会有兼容性的问题。至于为什么IE的JS引擎不按照标准来实现，就要说到浏览器大战了，这里就不赘述了，自行Google之。</p><h2><a id=\"js3\">三、 JavaScript解析引擎与浏览器又是什么关系？</a></h2><p>简单地说，JavaScript引擎是浏览器的组成部分之一。因为浏览器还要做很多别的事情，比如解析页面、渲染页面、Cookie管理、历史记录 等等。那么，既然是组成部分，因此一般情况下JavaScript引擎都是浏览器开发商自行开发的。比如：IE9的Chakra、Firefox的 TraceMonkey、Chrome的V8等等。</p><p>从而也看出，不同浏览器都采用了不同的JavaScript引擎。因此，我们只能说要深入了解哪个JavaScript引擎。</p><h2><a id=\"js4\">四、 深入了解其内部原理的途径有哪些？</a></h2><p>搞清楚了前面三个问题，那这个问题就好回答了。个人认为，主要途径有如下几种（依次由浅入深）：</p><p>看讲JavaScript引擎工作原理的书 这种方式最方便，不过我个人了解到的这样的书几乎没有，但是Dmitry A.Soshnikov博客上的文章真的是非常的赞，建议直接看英文，实在英文看起来吃力的，可以看译本</p><p>看ECMAScript的标准文档 这种方式相对直接，原汁原味，因为引擎就是根据标准来实现的。目前来说，可以看第五版和第三版，不过要看懂也是不容易的。</p><p>看JS引擎源代码 这种方式最直接，当然也最难了。因为还牵涉到了如何实现词法分析器，语法分析器等等更加底层的东西了，而且并非所有的引擎代码都是开源的。</p><h2><a id=\"js5\">五、为什么JavaScript是单线程？</a></h2><p>JavaScript语言的一大特点就是单线程，也就是说，同一个时间只能做一件事。那么，为什么JavaScript不能有多个线程呢？这样能提高效率啊。</p><p>JavaScript的单线程，与它的用途有关。作为浏览器脚本语言，JavaScript的主要用途是与用户互动，以及操作DOM。这决定了它只能是单线程，否则会带来很复杂的同步问题。比如，假定JavaScript同时有两个线程，一个线程在某个DOM节点上添加内容，另一个线程删除了这个节点，这时浏览器应该以哪个线程为准？</p><p>所以，为了避免复杂性，从一诞生，JavaScript就是单线程，这已经成了这门语言的核心特征，将来也不会改变。</p><p>为了利用多核CPU的计算能力，HTML5提出Web Worker标准，允许JavaScript脚本创建多个线程，但是子线程完全受主线程控制，且不得操作DOM。所以，这个新标准并没有改变JavaScript单线程的本质。</p><h2><a id=\"js6\">六、 以上几种方式中第一种都很难看明白怎么办？</a></h2><p>其实第一种方式中的文章，作者已经将文档中内容提炼出来，用通俗易懂的方式阐述出来了。如果，看起来还觉得吃力，那说明还缺少两块的东西：</p><p>对JavaScript本身还理解的不够深入 如果你刚刚接触JavaScript，或者说以前甚至都没有接触过。那一下子就想要去理解内部工作原理，的确是很吃力的。首先应该多看看书，多实践实践，从知识和实践的方式来了解JavaScript预言特性。这种情况下，你只需要了解现象。比方说，(function(){})() 这样可以直接调用该匿名函数、用闭包可以解决循环中的延迟操作的变量值获取问题等等。要了解这些，都是需要多汲取和实践的。实践这里就不多说了，而知识汲取方面可以多看看书和博客。这个层面的书就相对比较多了，《Professional JavaScript for Web Developers》就是本很好的书（中文版请自行寻找）。</p><p>缺乏相应的领域知识 当JavaScript也达到一定深度了，但是，还是看不大明白，或者没法很深入到内部去一探究竟。那就意味着缺少对 应的领域知识。这里明显的就是编译原理相关的知识。不过，其实对这块了解个大概基本看起来就没问题了。要再继续深入，那需要对编译原理了解的很深入，比如 说词法分析采用什么算法，一般怎么处理。会有什么问题，如何解决，AST生成算法一般有哪几种等等。那要看编译原理方面的书，也有基本经典的书，比如《Compilers: Principles, Techniques, and Tools》这本也是传说中的龙书，还有非常著名的《SICP》和《PLAI》。 不过其实根据个人经验，对于Dmitry的文章，要看懂它，只要你对JavaScript有一定深度的了解，同时你大学计算机的课程都能大致掌握了（尤其 是操作系统），也就是说基础不错，理解起来应该没问题。因为这些文章基本没有涉及底层编译相关的，只是在解释文档的内容，并且其中很多东西都是相通的，比 如：context的切换与CPU的进程切换、函数相关的的局部变量的栈存储、函数退出的操作等等都是一致的。</p>', '/uploads/20180428\\7eca93c9487e53699050e4f4c247b5ea.png', '106', '1', '2018-04-30', '4', 'winne', 'js-1');
INSERT INTO `winne_article` VALUES ('4', 'jQuery选择器的优点', '1', 'jQuery中的选择器完全继承了CSS的风格，利用jquery选择器，可以非常方便地找出特定的DOM元素，然后为它们添加相应的行为，而无需担心浏览器是否支持这一选择器。jquery中涉及操作CSS样式的部分比单纯的CSS功能更为强大，并且拥有跨浏览器的兼容性...', 'jquery', '<p>jquery中的选择器完全继承了CSS的风格，利用jquery选择器，可以非常方便地找出特定的DOM元素，然后为它们添加相应的行为，而无需担心浏览器是否支持这一选择器。jquery中涉及操作CSS样式的部分比单纯的CSS功能更为强大，并且拥有跨浏览器的兼容性。</p><h2><a id=\"jq1\">一、简洁的写法</a></h2><p>$()函数在很多javascript类库中都被作为一个选择器函数来使用，在jquery中也是如此。例如$(&quot;#id&quot;)用来代替document.getElementById()，即通过id获取元素；$(&quot;tagName&quot;)用来代替document.getElementsByTagName()，即通过标签名获取HTML元素。</p><h2><a id=\"jq2\">二、支持CSS1到CSS3选择器</a></h2><p>jquery选择器支持CSS1、CSS2的全部和CSS3的部分选择器，同时它也有少量独有的选择器。CSS选择器需要考虑浏览器的兼容性问题，而jquery选择器拥有跨浏览器的兼容性。</p><h2><a id=\"jq3\">三、完善的处理机制</a></h2><p>使用拥有跨浏览器的兼容性选择器不仅比传统的document.getElementById()和document.getElementsByTagName()简洁得多，而且还能避免某些错误。</p><p>比如使用document.getElementById()获取并操作元素时，如果该元素在页面上并不存在，浏览器就会报错。为了避免这种情况，需要在操作元素之前判断钙元素是否存在，正确的做法是：</p><pre>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type=&quot;text/javascript&quot;&gt;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(document.getElementById(&quot;tt&quot;)){\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;tt&quot;).style.color=&quot;red&quot;;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/script&gt;</pre><p>这样就可以避免浏览器报错，但是对每个要操作的元素进行判断会显得很繁琐。jquery在上述问题的处理上是非常不错的，即使用jquery获取网页中不存在的元素也不会报错，例如</p><pre>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type=&quot;text/javascript&quot;&gt;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(&#39;#tt&#39;).css(&quot;color&quot;,&quot;red&quot;);//这里无需判断$(&#39;#tt&#39;)是否存在\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/script&gt;</pre><p>有了这个预防措施，即使以后因为某种原因删除网页上的某个元素，也不用担心jquery代码会报错。</p><p>需要注意的是，$(&quot;#id&quot;)获取的永远是对象，并且默认是数组，即使网页上没有此元素，因此要用jquery检查某个元素在网页上是否存在时，不能像javascript那样使用对象本身来判断，而应该根据获取到的元素的长度来判断，即：</p><pre>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type=&quot;text/javascript&quot;&gt;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($(&#39;#tt&#39;).length&gt;0){\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//do&nbsp;something\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/script&gt;</pre><p>或者转化为DOM对象来判断：</p><pre>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;script&nbsp;type=&quot;text/javascript&quot;&gt;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($(&#39;#tt&#39;).[0]){\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//do&nbsp;something\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/script&gt;</pre><p>这与javascript中直接判断对象（if(document.getElementById(&quot;tt&quot;))）是不同的，尤其需要注意。</p>', '/uploads/20180428\\5342dd6e56fee2806a82644010fcee31.png', '42', '1', '2018-04-30', '8', 'winne', 'jq-1');
INSERT INTO `winne_article` VALUES ('5', '了解CSS', '1', '在网页制作时采用CSS技术，可以有效地对全站页面有共同性质属性的布局、字体、颜色、背景和其它效果属性实现更加精确的控制。只要对网页HTML里的相应的CSS代码做一些简单的修改，就可以改变同一页面或整站用到此“选择类”的网页的外观和格式样式...', 'css', '<p>割发代首国防生的割发代首更舒服的割发代首国防生的割发代首国防生的果福的栅格数果福是大公司</p>', '/uploads/20180428\\021fb4aedab53896e839f7af6a150580.png', '71', '1', '2018-04-28', '3', 'winne', 'css-1');
INSERT INTO `winne_article` VALUES ('8', '那时候拍的小清新~', '5', '高中的好朋友合美眉，在大学期间爱好摄影，然后在课余时间学了摄影，然后在放寒假之前约了我拍照。虽然是个假模特，但是合美眉的拍照技术和修图技术很不错呢~~整个人都不像我自己了~~O(∩_∩)O嘻嘻嘻~。在那天...', '拍照', '<p>范德萨范德萨范德萨发发发送到股份的股份割发代首割发代首个的割发代首古兜山滚动的割发代首股份大股东是</p>', '/uploads/20180428\\a20deecdaf02e84e02cb50e8fdb6463b.png', '0', '1', '2018-04-28', '6', 'winne', 'university-1');
INSERT INTO `winne_article` VALUES ('10', '律委一家子出游~', '5', '刚进大一的时候还是比较羞涩的，在学长的引导下自己主动去参加学生干部的多个面试，然后最后决定加入了学生自律委员会。因为觉得自己也是一个比较自律的人，什么该做，什么不该做自己都会想得很清楚，所以呢就加入了这律委家族...', '游玩', '<p>割发代首发那个集合计划个很符合规范化股份好好过非农户谷歌火狐韩国国会更符合规范的带好吉他交换机突然</p>', '/uploads/20180428\\1d33dcfacb6dfd18b10379c29b11a9bf.png', '2', '1', '2018-04-28', '6', 'winne', 'university-2');
INSERT INTO `winne_article` VALUES ('11', '舞蹈大赛的那些事~', '5', '兴趣爱好使然~又亦或是自己还年轻..大一下学期过得非常非常的充实。每一年学校都会举办舞蹈大赛，这一次是我遇到的第一次舞蹈大赛。喜欢舞蹈的我拉上了舍友一起去参加了舞蹈大赛。那时候一队人是代表计算机学院去参加的，为了为院争名次，我们...', '舞蹈', '<p>高富帅的高富帅的合同价和规范化阿达发广东省是不V型吃不下购房合同让人核桃仁和浩特 特浩特和他</p>', '/uploads/20180428\\0b3b7b1758133b4f666c8bf90d70218f.png', '0', '1', '2018-04-28', '6', 'winne', 'university-3');
INSERT INTO `winne_article` VALUES ('12', '健走马拉松~', '5', '嗯~？大家说的马拉松应该都是跑步的吧，但是江门这边有健走马拉松喔。连续两年都又去参加了呢，先是要骑行20分钟左右到起点，然后再根据自己选的路程来走，再回到起点（就是终点了）。2016年那次去天空不作美，又刮风又下雨。很多人都放弃去了，而我...', '马拉松', '<p>鬼斧神工发大水割发代首公司那个个栅格浮点数刚发的是鬼斧神工发送到反倒是规范施工方是够是否</p>', '/uploads/20180428\\616d4a711c2efdff8b65a563003e6a0a.png', '4', '1', '2018-04-28', '6', 'winne', 'university-4');
INSERT INTO `winne_article` VALUES ('14', '那些年夏天', '5', '那年夏天，舍友楠陪我度过了很多个眼泪哗哗的夜晚恶性循环，情绪糟糕到极点，是楠一直鼓励我，安慰我，她甚至怕我想不开，时不时跟着我。现在想起来，都能感受到那段时间的焦急，精神快大概就要彻底崩溃了，我不知道如何走出那段不堪的时光...', '夏天', '<p>《那年夏天》平和，优美的歌声中带了一点点淡淡的忧愁，唱歌的人经历了坎坷有点忧愁，可是内心却有一颗平和的心，用她的坚强去包容一切，用她不变的信念去追逐她的音乐梦想。这首歌适合怀旧的人听，可以在歌声中找到那份最初的感动；适合受伤的人听，在歌声中平抚自己那颗受伤的心；适合寂寞的人听，在歌声中找到那年夏天的回忆；适合快乐的人听，在歌声中找到你儿时最纯真的快乐，会让你更加珍惜你身边的人。</p><p>《那年夏天》MV就像一部老电影，勾起我们美好的回忆，有两个可爱的小孩，那是我和你，我们笑的那么天真无邪，，而如今和我嬉戏的伙伴她到哪儿去了？有一个秋千，那就我们共同拥有的玩耍工具，在那里我们留下了太多欢笑，而如今那个秋千到哪儿去了？有一墙的爬山虎，那里是我们童年的留念，而如今那一墙爬山虎又到哪儿去了？有我们的信，那是我们相互的牵挂，而如今我们的信又到哪儿去了？</p><p>我不知道那一切我们要找的，是否还找得到，只知道《那年夏天》让我看到了儿时和我嬉戏的伙伴，看到了我们玩耍的秋千，看到了我们童年的那一墙爬山虎，看到了我们写给对方的一封封充满思念的信。</p><p>当有一天我们都老了，在《那年夏天》的歌声中找寻我们相同的回忆——</p><p>那年夏天，有个女孩安静歌唱着</p><p>那年夏天，有个女孩用心歌唱着</p><p>那年夏天，你我都被她的歌声，她的微笑，她的执着深深感动……</p>', '/uploads/20180430\\6ffbab69cfcc5d28b7346bcf6e29e02b.png', '1', '1', '2018-04-30', '7', 'winne', 'xf');
INSERT INTO `winne_article` VALUES ('16', '好心情', '5', '所谓的每天都有好心情，要么是本性大大咧咧、乐天知足，要么就是学会了和自己的情绪正确相处，让情绪始终处于平稳或者积极的状态...', '心情', '<p>1．你真正喜欢想要的，没有一样是可以轻易得到的。</p><p>2．真心并不值钱，但爱对了人就是无价。</p><p>3．心太软的人快乐是不容易的，别人伤害她，或她伤害别人，都让她在心里病一场。</p><p>4．愿我走过的苦难你不必经历，愿我已有的幸福你正在触及。</p><p>5．他坐在咖啡店等朋友，一位女孩走过来问：你是王阿姨介绍来相亲的吗？他打量一下她，正是自己喜欢的类型。心想何不将错就错，于是忙答应说是。结婚当天他坦白，当时自己不是去相亲的。老婆笑着说：我也不是，只是找个借口和你搭讪。这个事例告诉我们：机会来了，就要毫不犹豫地抓住！</p><p>6．他即使千般不好万般辜负，毕竟是我爱过的人。</p><p>7．打你脸的时候别问我为什么，因为我给你糖的时候你从来不会说谢谢。</p><p>8．习惯这个东西很可怕，特别是你不得不面对改变的时候。</p><p>9．我其实挺骄傲的，你不来哄我，我可以跟你就此别过；我也挺可爱的，你一哄，我一定就跟你走了。</p>', '/uploads/20180430\\6f0978dfa368685e11103ab1cfa828c1.png', '6', '1', '2018-04-30', '7', 'winne', 'www');
INSERT INTO `winne_article` VALUES ('17', 'BOM解析', '1', '发动机各环节国防科技挂靠费挂靠费的结果看风景缸发动机和国际法还是个缸发动机和过分的话建国饭店加空格好的话加空格划分的看合格积分兑换就很过分的空间还是空间', 'BOM', '<p>分三个工人发范德萨范德萨范德萨发顺丰的深V方式大V范德萨给个糖哪一趟一塌糊涂广东佛山粉色发</p>', '/uploads/20180429\\7b63458856343017e0eba22e8764044d.png', '1', '0', '2018-04-29', '4', 'winne', 'bom-1');
INSERT INTO `winne_article` VALUES ('18', 'css中的浏览器兼容', '1', '国际法的快感解放东路就该发动机缸发动机加工费的快感艰苦奋斗来看好钢结构看刚发的看合格金科股份的和宽高放打火机卡和高房价的快感假发票', 'css', '<p>1.div的垂直居中问题 &nbsp;\r\nvertical-align:middle; &nbsp;\r\n将行距增加到和整个DIV一样高 line-height:200px; &nbsp;\r\n然后插入文字，就垂直居中了。缺点是要控制内容不要换行。 \r\n2. margin加倍的问题 &nbsp; &nbsp; &nbsp;\r\n设置为float的div在ie下设置的margin会加倍。这是一个ie6都存在的bug。 \r\n解决方案是在这个div里面加上display:inline;</p>', '/uploads/20180429\\4056ececf766305b7fd25eb9d58cdb13.png', '9', '1', '2018-04-30', '3', 'winne', 'css-2');
INSERT INTO `winne_article` VALUES ('19', '实用bootstrap', '1', '高度较高看风景就更好感觉好巨化股份的客户机看很关键客服电话缸发动机话估计发的好接口话估计发的好加括号缸发动机和进口国和发动机好几个烦得很', 'bootstrap', '<p>分三个工人发范德萨范德萨范德萨发顺丰的深V方式大V范德萨给个糖哪一趟一塌糊涂广东佛山粉色发gfdgfgfd&nbsp;</p><p><br/></p><p>个梵蒂冈</p>', '/uploads/20180429\\6f7468738ab52b254b71d1b119081085.png', '4', '1', '2018-04-29', '9', 'winne', 'bootstrap-1');
INSERT INTO `winne_article` VALUES ('20', 'Sublime Text 3的实用插件', '1', '过段时间个个金风科技驴肝肺肯德基看了估计放得开了健康管理复健科两个凡是加括号复健科几个框复健科了解过款发动机看了国际法登录空间了国际法的离开就管理科分点介绍来看', 'Sublime Text', '<p>分三个工人发范德萨范德萨范德萨发顺丰的深V方式大V范德萨给个糖哪一趟一塌糊涂广东佛山粉色发</p><p>刚发的</p><p>高富帅的</p>', '/uploads/20180429\\396bb9a7602909e05e2b019b69862928.png', '4', '1', '2018-04-29', '9', 'winne', 'plugins-1');
INSERT INTO `winne_article` VALUES ('22', '浅谈前端性能优化', '1', 'fdklgjkl 个梵蒂冈艰苦奋斗金科股份的就了感觉看到房间科技馆放得开加空格复健科几个框放大镜拉控件功夫老勺几个框记得看个恢复大师就', '前端', '<p>sddfdsfdsfdsgdds</p>', '/uploads/20180429\\0b6f58f371490d925c82a2667ccf8b17.png', '2', '1', '2018-04-29', '9', 'winne', 'web-2');
INSERT INTO `winne_article` VALUES ('24', 'Sublime Text 3相关使用', '1', '电话费会计师等哈就开放三四非健康的飒飒恢复健康大厦\r\n就打瞌睡浪费健康的撒谎即可\r\n放假的卡萨进房间看的撒合法即可\r\n放大镜看萨克和发动机啊事件方式', 'Sublime Text', '<p>用webpack的过程，就是一个不断入坑和出坑的过程。回望来时路，一路都是坑啊！现把曾经趟过的那些坑整理出来，各位看官有福了~</p><p>文章末尾有我用到的依赖的版本信息，若你发现某个问题与我在本文中的描述不一致时，可以看看是否版本与我所使用的不同所致。</p><h2><a id=\"web1\">一、1111111</a></h2><h3><a id=\"h3\">1、路径上的差异</a></h3><p>在配置entry选项的时候，我这么配置：</p><pre>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;entry:&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;main:&nbsp;__dirname&nbsp;+&nbsp;&#39;/src/index.js&#39;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</pre><h4><a id=\"h4\">1、容易在presets配置的时候少一层[]。</a></h4><p>如上文这样配置，对于.js、.es、.es6、.jsx等JavaScript文件的转码是不成问题了，但是，这些配置却无法影响到.vue文件。不过，.vue文件在编译的时候，vue-loader会默认去加载.babelrc中的配置。所以，我们应该把这些babel的配置写入.babelrc文件中，以便于与.vue文件的编译共用。使这些配置项在JavaScript文件和.vue文件编译的时候都发生作用。</p><h4><a id=\"h5\">2、容易忽略掉.vue文件中的待转码的babel语句。</a></h4><p>对于未模块化的库，如果直接<span class=\"warn-color weight-color\">import</span>，在webpack打包的时候会报错的。详见：<a class=\"a-color\">https://juejin.im/entry/588ca3018d6d81006c237c85</a></p><h2><a id=\"web2\">二、22222222222</a></h2><h3><a id=\"h7\">1、差异</a></h3><p>在配置entry选项的时候，我这么配置：</p><pre>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;entry:&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;main:&nbsp;__dirname&nbsp;+&nbsp;&#39;/src/index.js&#39;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</pre><h4><a id=\"h8\">1、容易在presets配置的时候少一层[]。</a></h4><p>如上文这样配置，对于.js、.es、.es6、.jsx等JavaScript文件的转码是不成问题了，但是，这些配置却无法影响到.vue文件。不过，.vue文件在编译的时候，vue-loader会默认去加载.babelrc中的配置。所以，我们应该把这些babel的配置写入.babelrc文件中，以便于与.vue文件的编译共用。使这些配置项在JavaScript文件和.vue文件编译的时候都发生作用。</p><h4><a id=\"h9\">2、容易忽略掉.vue文件中的待转码的babel语句。</a></h4><p>对于未模块化的库，如果直接<span class=\"warn-color weight-color\">import</span>，在webpack打包的时候会报错的。详见：<a class=\"a-color\">https://juejin.im/entry/588ca3018d6d81006c237c85</a></p><p>如上文这样配置，对于.js、.es、.es6、.jsx等JavaScript文件的转码是不成问题了，但是，这些配置却无法影响到.vue文件。不过，.vue文件在编译的时候，vue-loader会默认去加载.babelrc中的配置。所以，我们应该把这些babel的配置写入.babelrc文件中，以便于与.vue文件的编译共用。使这些配置项在JavaScript文件和.vue文件编译的时候都发生作用。</p><h4><a id=\"h9\">3、容易忽略掉.vue文件中的待转码的babel语句。</a></h4><p>对于未模块化的库，如果直接<span class=\"warn-color weight-color\">import</span>，在webpack打包的时候会报错的。详见：<a class=\"a-color\">https://juejin.im/entry/588ca3018d6d81006c237c85</a></p><h2><a id=\"web3\">三、33333333333</a></h2><h3><a id=\"h7\">1、差异</a></h3><p>在配置entry选项的时候，我这么配置：</p><pre>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;entry:&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;main:&nbsp;__dirname&nbsp;+&nbsp;&#39;/src/index.js&#39;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</pre><h4><a id=\"h8\">1、容易在presets配置的时候少一层[]。</a></h4><p>如上文这样配置，对于.js、.es、.es6、.jsx等JavaScript文件的转码是不成问题了，但是，这些配置却无法影响到.vue文件。不过，.vue文件在编译的时候，vue-loader会默认去加载.babelrc中的配置。所以，我们应该把这些babel的配置写入.babelrc文件中，以便于与.vue文件的编译共用。使这些配置项在JavaScript文件和.vue文件编译的时候都发生作用。</p><h4><a id=\"h9\">2、容易忽略掉.vue文件中的待转码的babel语句。</a></h4><p>对于未模块化的库，如果直接<span class=\"warn-color weight-color\">import</span>，在webpack打包的时候会报错的。详见：<a class=\"a-color\">https://juejin.im/entry/588ca3018d6d81006c237c85</a></p><p>如上文这样配置，对于.js、.es、.es6、.jsx等JavaScript文件的转码是不成问题了，但是，这些配置却无法影响到.vue文件。不过，.vue文件在编译的时候，vue-loader会默认去加载.babelrc中的配置。所以，我们应该把这些babel的配置写入.babelrc文件中，以便于与.vue文件的编译共用。使这些配置项在JavaScript文件和.vue文件编译的时候都发生作用。</p><h4><a id=\"h9\">3、容易忽略掉.vue文件中的待转码的babel语句。</a></h4><p>对于未模块化的库，如果直接<span class=\"warn-color weight-color\">import</span>，在webpack打包的时候会报错的。详见：<a class=\"a-color\">https://juejin.im/entry/588ca3018d6d81006c237c85</a></p>', '/uploads/20180429\\58d45589cca90de1fccfca1f4de4e852.png', '50', '1', '2018-04-29', '9', 'winne', 'sublime3-1');
INSERT INTO `winne_article` VALUES ('25', '你了解Ajax吗', '1', 'vdfvfdvdfsvdsf', 'Ajax', '<p>vfdvfdvfdvfd</p>', '/uploads/20180429\\2193564123501419f373acb277187b42.png', '6', '1', '2018-04-29', '9', 'winne', 'ajax-1');
INSERT INTO `winne_article` VALUES ('26', 'DOM详解', '1', '呱唧呱唧股日鬼热我钢结构看了发动机国防科技刚发的角度考虑加工费个机房都狂扫赶紧肥点购房款的结果开发的建国饭店利君股份的建国饭店建国饭店了人给个加热我关雎尔看过机房都狂扫了 ', 'DOM', '<p>有核桃仁还挺好听然后他合格后股份</p><p>回顾复和高度</p><p>合格后股份的</p><p>很过分的华国锋</p><p>很过</p><p>很过分国防生股份的</p>', '/uploads/20180429\\342585578d0724e535d4d2919dbbfc93.png', '39', '1', '2018-04-29', '4', 'winne', 'dom-1');
INSERT INTO `winne_article` VALUES ('27', 'webpack入门配置', '1', 'webpack 是一个现代 JavaScript 应用程序的静态模块打包器(module bundler)。当 webpack 处理应用程序时，它会递归地构建一个依赖关系图(dependency graph)，其中包含应用程序需要的每个模块，然后将所有这些模块打包成一个或多个 bundle...', 'webpack', '<h2>\r\n    <a id=\"webpack1\">一、局部安装介绍：</a>\r\n</h2>\r\n<p>\r\n      全局安装会导致不同项目中的webpack锁定到指定版本，也会导致使用不同webpack版本的项目构建失败，丧失了灵活性，因此推荐局部安装。</p>\r\n<p>a. 首先确保安装了Node.js的最新版本。</p>  \r\n<p>b. 写这篇文章的时候，webpack已经到了4.1.0版本；</p> \r\n<p>c. 要安装最新版本或特定版本，请运行以下命令之一：</p>\r\n<p>\r\nnpm install --save-dev webpack\r\nnpm install --save-dev webpack@&lt;version>\r\n</p>\r\n<h2>\r\n    <a id=\"webpack2\">二、构建项目：</a>\r\n</h2>\r\n<p>\r\n   a. 创建项目，初始化npm以及本地安装webpack\r\n</p>\r\n<p>mkdir webpack-test && cd webpack-test</p>  \r\n<p>npm init -y</p> \r\n<p>npm install --save-dev webpack</p>\r\n\r\n<p>\r\n   b. 创建以下项目结构\r\n</p>\r\n<p>\r\nwebpack-test\r\n|-package.json&lt;br/>\r\n|-dist        // 构建后（产生的代码最小化以及优化）输出的分发代码&lt;br/>\r\n  |-index.html&lt;br/>\r\n|-src         // 用于书写和编辑的源代码&lt;br/>\r\n  |-index.js\r\n</p>\r\n<p>\r\n c. 让我们先按照之前的方法来进行编写：\r\n</p>\r\n<p>\r\n/src/index.js\r\n</p>\r\n<pre><code>\r\nfunction createComponent() {\r\n  var ele = document.createElement(\'div\');\r\n  ele.innerHTML = \'hello world\';\r\n  // 此处依赖于jquery\r\n  $(\'#root\').append(ele);\r\n}\r\n\r\ncreateComponent();\r\n</code></pre>\r\n<p>\r\n  /dist/index.html\r\n</p>\r\n\r\n<pre><code>\r\n&lt;!DOCTYPE html>\r\n&lt;html>\r\n  &lt;head>\r\n    &lt;meta charset=\"utf-8\" />\r\n    &lt;title>webpack test&lt;/title>\r\n    &lt;script src=\"http://code.jquery.com/jquery-2.1.1.min.js\">&lt;/script>\r\n  &lt;/head>\r\n  &lt;body>\r\n    &lt;div id=\"root\">&lt;/div>\r\n    &lt;script src=\"../src/index.js\">&lt;/script>\r\n  &lt;/body>\r\n&lt;/html>\r\n</code></pre>\r\n<p>\r\n打开/dist/index.html，会发现页面上出现了 \"hello world\" 字样。\r\n但，此示例中script标签之间存在隐式（假设已经存在jquery全局变量）依赖，index.js的执行必须依赖jquery文件。这种JavaScript的管理方式存在一些问题：\r\n① 如果依赖过多会导致管理混乱，缺乏灵活性；&lt;br/>\r\n② 如果依赖不存在或者引用顺序错误，会导致程序无法执行；&lt;br/>\r\n③ 如果依赖被引入但没有使用，浏览器将被迫下载无用代码；&lt;br/>\r\n</p>\r\n<p>\r\nd. 使用webpack构建项目：\r\n</p>\r\n<p>\r\n保持项目结构不变，将文件做以下修改：\r\n/src/index.js&lt;br/>\r\n\r\n// 通过显示声明依赖，webpack通过这些信息来构建依赖图&lt;br/>\r\n// 然后使用图去生成一个优化过的，按照正确顺序执行的bundle&lt;br/>\r\n+ import $ from \'jquery\';\r\n</p>\r\n<pre><code>\r\nfunction createComponent() {\r\n    var ele = document.createElement(\'div\');\r\n    - ele.innerHTML = \'hello world\';\r\n    + ele.innerHTML = \'hello webpack\';\r\n    // 此处依赖于jquery\r\n    $(\'#root\').append(ele);\r\n  }\r\n\r\n  createComponent();\r\n</code></pre>\r\n<p>\r\n/dist/index.html\r\n由于通过import来引入jquery，所以在index.html中需要将外部引入jquery的&lt;script>删除。而此时应用webpack的打包功能将js打包进一个输出文件bundle.js，因此需要做如下修改：\r\n</p>\r\n<pre><code>\r\n&lt;!DOCTYPE html>\r\n&lt;html>\r\n  &lt;head>\r\n    &lt;meta charset=\"utf-8\" />\r\n    &lt;title>webpack test&lt;/title>\r\n    - &lt;script src=\"http://code.jquery.com/jquery-2.1.1.min.js\">&lt;/script>\r\n  &lt;/head>\r\n  &lt;body>\r\n    &lt;div id=\"root\">&lt;/div>\r\n    - &lt;script src=\"../src/index.js\">&lt;/script>\r\n    + &lt;script src=\"bundle.js\">&lt;/script>\r\n  &lt;/body>\r\n&lt;/html>\r\n</code></pre>\r\n', '/uploads/20180429\\28a7688f09a129eebeef21103e3fc678.png', '85', '1', '2018-04-30', '9', 'winne', 'webpack-1');
INSERT INTO `winne_article` VALUES ('28', 'web前端', '1', '前端即网站前台部分，运行在PC端，移动端等浏览器上展现给用户浏览的网页。随着互联网技术的发展，HTML5，CSS3，前端框架的应用，跨平台响应式网页设计能够适应各种屏幕分辨率，完美的动效设计，给用户带来极高的用户体验。', '', '<p>分为非热热</p><p>告诉过</p><p>果福第三个范德萨</p><p>割发代首割发代首</p><p>割发代首</p><p>dsa</p><p>范德萨</p>', '/uploads/20180514\\f175ac6f9596d89dd772f54f0ecc1c50.png', '8', '1', '2018-05-14', '2', '', 'recommend1');
INSERT INTO `winne_article` VALUES ('29', '精彩推荐css', '1', '前端即网站前台部分，运行在PC端，移动端等浏览器上展现给用户浏览的网页。随着互联网技术的发展，HTML5，CSS3，前端框架的应用，跨平台响应式网页设计能够适应各种屏幕分辨率，完美的动效设计，给用户带来极高的用户体验。', '', '<p>二恶烷群</p><p>范德萨</p><p>范德萨</p><p>高度</p><p>割发代首</p><p>割发代首</p><p>gre&nbsp;</p><p>放到</p>', '/uploads/20180514\\fdeb61cb8737cf19191f90364b6294a7.png', '6', '1', '2018-05-14', '3', '', 'recommend2');
INSERT INTO `winne_article` VALUES ('30', '互联网前端', '1', '前端即网站前台部分，运行在PC端，移动端等浏览器上展现给用户浏览的网页。随着互联网技术的发展，HTML5，CSS3，前端框架的应用，跨平台响应式网页设计能够适应各种屏幕分辨率，完美的动效设计，给用户带来极高的用户体验。', '', '<p>我去热无若翁</p><p>3日4</p><p>丰东股份的</p><p>发的深V地方</p><p>不规范不是</p>', '/uploads/20180514\\f9ce60241a8444bbb5a131b877263ed9.png', '0', '1', '2018-05-14', '2', '', 'recommend3');
INSERT INTO `winne_article` VALUES ('31', '精彩推荐4', '1', '前端即网站前台部分，运行在PC端，移动端等浏览器上展现给用户浏览的网页。随着互联网技术的发展，HTML5，CSS3，前端框架的应用，跨平台响应式网页设计能够适应各种屏幕分辨率，完美的动效设计，给用户带来极高的用户体验。', '', '<p>惹我热无</p><p>VfV放到是</p><p>范德萨</p><p>他让我</p><p>范德萨</p><p>dsa</p>', '/uploads/20180514\\3eba133487662e6be6548f9ff50d52cf.png', '5', '1', '2018-05-14', '3', '', 'recommend4');

-- ----------------------------
-- Table structure for winne_book_recommend
-- ----------------------------
DROP TABLE IF EXISTS `winne_book_recommend`;
CREATE TABLE `winne_book_recommend` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `bookname` varchar(30) NOT NULL COMMENT '书籍名称',
  `content` text NOT NULL COMMENT '书籍内容',
  `state` smallint(4) NOT NULL DEFAULT '0' COMMENT '0：不作为特别推荐； 1：作为特别推荐 ; 2:首页休闲书籍的推荐',
  `book_type` smallint(6) NOT NULL COMMENT '书籍分类；1：html/css;  2 : js  ； 3：休闲书籍',
  `book_time` date NOT NULL COMMENT '推荐书籍时间',
  `pic` varchar(100) NOT NULL COMMENT '推荐书籍图',
  `recommend_num` smallint(2) NOT NULL COMMENT '推荐指数',
  `publish_time` date NOT NULL COMMENT '出版时间',
  `author` varchar(20) NOT NULL COMMENT '作者',
  `page_num` int(11) NOT NULL COMMENT '页数',
  `recommend_desc` text NOT NULL COMMENT '推荐说明',
  `recommend_show_desc` text NOT NULL COMMENT '首页HTML/CSS书籍的简介',
  `top_desc` text NOT NULL COMMENT '首页休闲书籍的简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_book_recommend
-- ----------------------------
INSERT INTO `winne_book_recommend` VALUES ('24', '《HTML与CSS基础教程》', '<p>大杀四方打发大水是</p><p>股份公司</p><p>发达</p><p>供热个人</p>', '1', '1', '2018-04-28', '/uploads/20180428\\d767c3403ed98972300523a72438dc6b.png', '9', '2018-01-01', '', '55', ' ', ' 打发范德萨范德萨范德萨', '');
INSERT INTO `winne_book_recommend` VALUES ('25', '《HTML与CSS进阶教程》', '<p>本书内容结合了作者在前后端大量开发中的实战经验，系统化知识，浓缩精华，用通俗易懂的语言直击学习者的痛点。通过本书，能让你从“野生网页设计师”水平提升达到“真正前端工程师”水平。\r\n全书分为两大部分：首部分是HTML进阶内容，主要介绍HTML高级技巧和HTML语义化；第二部分是CSS进阶内容，主要介绍CSS开发技巧、代码规范、性能优化、属性本质、重要概念（如包含块、BFC和IFC等）。\r\n除了知识讲解，教程还融入了大量的开发案例，更加注重编程思维的培养，并且提供学习者一个流畅的学习思路。</p>', '1', '1', '2018-05-02', '/uploads/20180428\\cd83d491970a98ea1a79738bbd379763.png', '10', '2016-09-01', '莫振杰', '230', '   网络超人气在线教程 针对Web前端新手全新打造 讲透HTML与CSS的核心知识 适合网页开发者新手以及产品经理等非纯技术人员掌握HTML和CSS的基础知识,通俗易懂 案例简洁形象，生动剖析晦涩难懂的知识点。 直击要点 规避思维误区，为初学者打牢基础保驾护航。 全面培养 讲透基础知识，亦注重开发技巧与思维锻炼。 精简浓缩 精炼核心内容，为读者节省学习时间与成本。 在线辅助 结合网站资源，强化书本学习并拓展新知识。 ', '   网络超人气在线教程 针对Web前端新手全新打造 讲透HTML与CSS的核心知识', '');
INSERT INTO `winne_book_recommend` VALUES ('26', '《Head First HTML与CSS、XHTML》', '<p>fefs反而方式方法</p><p>公司规定是</p><p>是的范德萨</p><p>个个</p>', '1', '1', '2018-04-28', '/uploads/20180428\\ff8c4c81d17da554a97ecb15ee1c37e1.png', '9', '2018-01-01', '额', '54', ' 分佛挡杀佛打发', ' 个人热股份大V范德萨范德萨法法', '');
INSERT INTO `winne_book_recommend` VALUES ('27', '《CSS权威指南》', '<p>放大范德萨股份的闪光点</p><p>范德萨</p><p>范德萨</p>', '1', '1', '2018-04-28', '/uploads/20180428\\cf7c208949a2a6325851a3a2c6cbf6b5.png', '9', '2018-01-01', '个哦', '43', ' 分担分担范德萨', ' V的方式打发大水范德萨发的范德萨', '');
INSERT INTO `winne_book_recommend` VALUES ('28', '《CSS设计指南》', '<p>股份的闪光点是</p><p>割发代首</p><p>割发代首</p>', '1', '1', '2018-04-28', '/uploads/20180428\\429a3750f766c7164cc35bbc67aa5c89.png', '0', '2018-01-01', '范德萨', '0', ' ', ' 告诉过范德萨范德萨范德萨果福时光飞逝', '');
INSERT INTO `winne_book_recommend` VALUES ('29', '《JavaScript权威指南（第六版）》', '<p>第一部分关于函数的一章（第8章）进行了扩展，特别强调了嵌套的函数和闭包。新增了自定义类、名字空间、脚本化Java、嵌入JavaScript等内容。</p><p>第二部分最大的改变是增加了如下的大量新内容。包括第19章“cookie和客户端持久性”，第20章“脚本化HTTP”，第21章“JavaScipt和XML”，第22章“脚本化客户端图形”，第23章“脚本化Java Applets和Flash电影”。</p><p>第三部分几乎没有太大变化。而第四部分增加了对DOM API的介绍。</p><p>总体上分为“基础知识点介绍”和“参考指南”两部分，这是本书的一大特色。从之前版本受欢迎的程度来看，这种结构得到了读者相当大的认可，满足了他们学习基础知识和参考查阅难点的双重需要。而这也是其他同类图书所不及的。</p><p><br/></p>', '1', '2', '2018-05-02', '/uploads/20180428\\bf4f10153cbd27476f197347786c25a0.png', '8', '2012-04-01', '[美] David Flanagan', '1019', '   本书主要讲述的内容涵盖JavaScript语言本身，以及Web浏览器所实现的JavaScript API。本书第6版涵盖了HTML5和ECMAScript 5，很多章节完全重写，新增的章节包括jQuery、服务器端JavaScript、图形编程以及 JavaScript式的面向对象。本书不仅适合初学者系统学习，也适合有经验的 JavaScript 开发者随手翻阅。', '', '');
INSERT INTO `winne_book_recommend` VALUES ('30', '《JavaScript编程精解》', '<p>发生发发</p>', '1', '2', '2018-04-28', '/uploads/20180428\\0ff5c18128bd9021bc11f29f86645c78.png', '9', '2018-01-01', '方式', '54', ' ', '', '');
INSERT INTO `winne_book_recommend` VALUES ('31', '《JavaScript设计模式》', '<p>二分二果福第三个范德萨</p>', '1', '2', '2018-04-28', '/uploads/20180428\\75e0e4a9c06a597d73b97a0b965de7c6.png', '9', '2018-01-01', '惹我', '0', '  ', '', '');
INSERT INTO `winne_book_recommend` VALUES ('32', '《JavaScript高级程序设计》', '<p>范德萨发的法法</p><p>范德萨发的</p><p>讽德诵功水电费</p><p>阿发</p>', '1', '2', '2018-04-28', '/uploads/20180428\\05d1355dd3b844f80d5b85a234f0c4a2.png', '8', '2018-01-01', '不发大水', '0', ' ', '', '');
INSERT INTO `winne_book_recommend` VALUES ('33', '《JavaScript DOM编程艺术》', '<p>放大范德萨是范德萨辅导费</p><p>个搜嘎</p><p>个打发范德萨</p>', '1', '2', '2018-04-28', '/uploads/20180428\\19528a1aa60626f4b0e895424ef3cc7e.png', '9', '2018-01-01', '的是非得失', '54', ' ', '', '');
INSERT INTO `winne_book_recommend` VALUES ('34', '《CSS》', '<p>法法三大</p>', '1', '1', '2018-05-09', '/uploads/20180428\\87e318a7ce4f79171ff12642ef2d79b9.png', '0', '2018-01-01', '', '0', '  ', '  范德萨发多少发多少', '');
INSERT INTO `winne_book_recommend` VALUES ('35', '《围城》', '<p>发的范德萨发的</p>', '1', '3', '2018-04-20', '', '0', '2018-01-01', '范德萨', '0', '', '', '');
INSERT INTO `winne_book_recommend` VALUES ('36', '《人生》', '<p>放大范德萨</p><p>发发呆时</p><p>范德萨</p>', '1', '3', '2018-04-20', '', '0', '2018-01-01', '', '0', '', '', '');
INSERT INTO `winne_book_recommend` VALUES ('37', '《唤醒心中的巨人》', '<p>V的深V都是</p>', '1', '3', '2018-04-20', '', '0', '2018-01-01', '', '0', '', '', '');
INSERT INTO `winne_book_recommend` VALUES ('38', '《不能承受的生命之轻》', '<p>范德萨范德萨范德萨发</p>', '1', '3', '2018-04-20', '', '0', '2018-01-01', '', '0', '', '', '');
INSERT INTO `winne_book_recommend` VALUES ('39', '《平凡的世界》', '<p>纷纷为范德萨发生</p>', '1', '3', '2018-04-20', '', '0', '0000-00-00', '', '0', '', '', '');
INSERT INTO `winne_book_recommend` VALUES ('41', '《追风筝的人》', '<p>小说以第一人称的角度讲述了阿米尔的故事。阿米尔生于1963年喀布尔的一个富人社区中的一个富裕家庭。其父亲“爸爸”是普什图人，一名法官的儿子，成功的地毯商人。阿米尔家的仆人阿里的儿子哈桑则出身哈扎拉人。阿米尔和哈桑是好玩伴，哈桑是一个特别忠实，正直，一心只为阿米尔少爷着想的人，两个人经常一起玩耍、游戏。阿米尔是出色的“风筝斗士”，即善于用自己的风筝切断别人的风筝的线；哈桑也是杰出的“风筝追逐者”，因为阿富汗斯坦的传统是线被切断而落下的风筝归追到它的人所有。爸爸对两个孩子都很喜爱，但嫌阿米尔过于怯懦。两个孩子和人打架时总是哈桑出头。阿米尔展露出写作的才华，但爸爸并不看重。爸爸的朋友拉辛汗成了阿米尔的忘年知己。1973年穆罕默德·达乌德·汗等发动政变，在阿富汗斯坦推翻帝制建立共和国。</p>', '2', '3', '2018-05-10', '/uploads/20180428\\0cdc316917ac2c53135c43a0e0812a78.png', '8', '2013-06-01', '卡勒德.胡赛尼', '362', ' 追风筝的人 是追求自由与幸福的人 是追求责任与苦难的人 他们自私自我 忍受烦恼 渴望着金钱与赞美又无怨无悔 卑微至极 畅想着美好的一切 这无关好坏 身份地位 生老病死 本都充满无限的可能 最后 世界和平 永远的愿望', '', '    《追风筝的人》由第一人称视角，讲述了一个身在美国的阿富汗移民童年的往事和他成人后对儿时过错的心灵救赎过程。剧情跨度是20世纪50年代到21世纪，全书类似自传体小说，主人公的经历和背景非常类似作者本人的经历背景。');

-- ----------------------------
-- Table structure for winne_comments
-- ----------------------------
DROP TABLE IF EXISTS `winne_comments`;
CREATE TABLE `winne_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `content` varchar(200) NOT NULL COMMENT '评论内容',
  `user_id` int(10) NOT NULL COMMENT '评论用户id',
  `pic` varchar(100) NOT NULL COMMENT '头像缩略图',
  `up_num` smallint(6) NOT NULL DEFAULT '0' COMMENT '顶的次数(默认为0)',
  `create_time` datetime NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_comments
-- ----------------------------
INSERT INTO `winne_comments` VALUES ('91', '进来踩一踩~~', '25', '', '3', '2018-04-28 15:08:44');
INSERT INTO `winne_comments` VALUES ('92', 'hello', '26', '', '3', '2018-04-28 15:10:42');
INSERT INTO `winne_comments` VALUES ('93', '五四青年节', '26', '', '0', '2018-05-04 09:15:37');
INSERT INTO `winne_comments` VALUES ('94', '签到~~', '27', '', '0', '2018-05-04 10:06:19');
INSERT INTO `winne_comments` VALUES ('95', '到此一游！！', '27', '', '0', '2018-05-04 10:06:57');
INSERT INTO `winne_comments` VALUES ('96', '固定的人生我不要', '27', '', '0', '2018-05-04 10:07:30');
INSERT INTO `winne_comments` VALUES ('97', '为了这个季节，我盛装而来', '27', '', '1', '2018-05-04 10:08:06');
INSERT INTO `winne_comments` VALUES ('98', '我总是试着,用微笑去细数着', '25', '', '0', '2018-05-06 10:00:48');
INSERT INTO `winne_comments` VALUES ('99', '我们因彼此懂得而惺惺相惜,我们因惺惺相惜而心念相应', '25', '', '1', '2018-05-06 10:11:10');
INSERT INTO `winne_comments` VALUES ('100', '没有如果的话,时间是否会为你们停留', '25', '', '0', '2018-05-06 15:07:29');
INSERT INTO `winne_comments` VALUES ('101', '如果没有如果', '25', '', '1', '2018-05-25 17:13:49');

-- ----------------------------
-- Table structure for winne_favorite
-- ----------------------------
DROP TABLE IF EXISTS `winne_favorite`;
CREATE TABLE `winne_favorite` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `uid` int(10) NOT NULL COMMENT '用户id',
  `aid` int(10) NOT NULL COMMENT '文章id',
  `favoriteN` smallint(2) DEFAULT '0' COMMENT '0:不收藏；  1：收藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_favorite
-- ----------------------------
INSERT INTO `winne_favorite` VALUES ('19', '26', '1', '1');
INSERT INTO `winne_favorite` VALUES ('28', '25', '27', '1');
INSERT INTO `winne_favorite` VALUES ('29', '26', '26', '1');
INSERT INTO `winne_favorite` VALUES ('33', '26', '27', '1');
INSERT INTO `winne_favorite` VALUES ('36', '25', '1', '1');

-- ----------------------------
-- Table structure for winne_friend_link
-- ----------------------------
DROP TABLE IF EXISTS `winne_friend_link`;
CREATE TABLE `winne_friend_link` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `link_name` varchar(30) NOT NULL COMMENT '友链名',
  `url` varchar(100) NOT NULL COMMENT '友链地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_friend_link
-- ----------------------------
INSERT INTO `winne_friend_link` VALUES ('1', '绿叶学习网', 'http://www.lvyestudy.com/');
INSERT INTO `winne_friend_link` VALUES ('2', '绿叶论坛', 'http://bbs.lvyestudy.com/');
INSERT INTO `winne_friend_link` VALUES ('3', '七度幻音', 'http://www.acgxt.com/');
INSERT INTO `winne_friend_link` VALUES ('4', '五叶草', 'http://www.lvyestudy.com/fiveleaves/index.html');

-- ----------------------------
-- Table structure for winne_movie
-- ----------------------------
DROP TABLE IF EXISTS `winne_movie`;
CREATE TABLE `winne_movie` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(60) NOT NULL COMMENT '电影标题',
  `recommend_num` smallint(2) NOT NULL COMMENT '推荐指数',
  `create_time` date NOT NULL COMMENT '推荐时间',
  `movie_type` varchar(20) NOT NULL COMMENT '电影类型',
  `language` varchar(20) NOT NULL COMMENT '电影语言',
  `movie_time` varchar(10) NOT NULL COMMENT '片长',
  `movie_content` text NOT NULL COMMENT '电影内容简介',
  `download_desc` text NOT NULL COMMENT '下载说明',
  `download_url` varchar(100) NOT NULL COMMENT '下载url地址',
  `state` smallint(2) NOT NULL DEFAULT '0' COMMENT '0：不推荐；1：推荐 ；2：在首页电影推荐',
  `top_desc` text NOT NULL COMMENT '在首页的电影简介',
  `pic` varchar(100) NOT NULL COMMENT '电影缩略图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_movie
-- ----------------------------
INSERT INTO `winne_movie` VALUES ('1', '千与千寻', '9', '2018-05-10', '剧情、动画、奇幻 ', '日语', '90', '<p>《千与千寻》是日本著名动画大师宫崎骏献给曾经有过10岁和即将进入10岁的观众的一部影片，它以现代的日本社会作为舞台，讲述了10岁的小女孩千寻为了拯救双亲，在神灵世界中经历了友爱、成长、修行的冒险过程后，终于回到了人类世界的故事。</p>', '《千与千寻》找到了当时社会群体的共同欲求，选择了最佳的角度切入，这是它获得广泛认同和赞誉的最基本。', '', '2', '《千与千寻》是日本著名动画大师宫崎骏献给曾经有过10岁和即将进入10岁的观众的一部影片，它以现代的日本社会作为舞台，讲述了10岁的小女孩千寻为了拯救双亲，在神灵世界中经历了友爱、成长、修行的冒险过程后，终于回到了人类世界的故事。', '/uploads/20180502\\1b6d19e5489b27daca46b66ae246c7e7.png');
INSERT INTO `winne_movie` VALUES ('2', '狐妖小红娘', '8', '2018-04-23', '喜剧', '中文', '76', '<p>V方式方式方式犯对身体好个递归方式范德萨范德萨三跟后台然后他</p>', '然后突然襟怀坦荡核桃仁和他', '', '1', '', '');
INSERT INTO `winne_movie` VALUES ('3', '斗罗大陆', '9', '2018-04-23', '科幻', '德语', '5', '<p>V方式方式方式犯对身体好个递归方式范德萨范德萨三跟后台然后他</p>', '然后突然襟怀坦荡核桃仁和他', '', '1', '', '');
INSERT INTO `winne_movie` VALUES ('4', '加勒比海盗', '9', '2018-04-23', '恐怖', '英语', '476', '<p>V方式方式方式犯对身体好个递归方式范德萨范德萨三跟后台然后他</p>', '然后突然襟怀坦荡核桃仁和他', '', '1', '', '');
INSERT INTO `winne_movie` VALUES ('5', '秒速五厘米', '8', '2018-04-23', '动漫', '英语', '76', '<p>V方式方式方式犯对身体好个递归方式范德萨范德萨三跟后台然后他</p>', '然后突然襟怀坦荡核桃仁和他', '', '1', '', '');
INSERT INTO `winne_movie` VALUES ('6', '天空之城', '9', '2018-04-23', '奇幻', '英语', '7', '<p>V方式方式方式犯对身体好个递归方式范德萨范德萨三跟后台然后他</p>', '然后突然襟怀坦荡核桃仁和他', '', '0', '', '');
INSERT INTO `winne_movie` VALUES ('7', '幽灵公主', '9', '2018-04-23', '爱情', '英语', '87', '<p>V方式方式方式犯对身体好rewrewrwe个递归方式范德萨范德萨三跟后台然后他</p>', '然后突然襟怀坦荡核桃仁和他', '', '1', '', '');
INSERT INTO `winne_movie` VALUES ('9', '哈尔的移动城堡', '0', '2018-04-23', '', '', '', '', '', '', '1', '', '');

-- ----------------------------
-- Table structure for winne_nav
-- ----------------------------
DROP TABLE IF EXISTS `winne_nav`;
CREATE TABLE `winne_nav` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '导航主键id',
  `nav_name` varchar(60) NOT NULL COMMENT '导航名称',
  `fatherid` smallint(6) NOT NULL COMMENT '父级导航栏id',
  `url` varchar(100) NOT NULL COMMENT '子导航栏地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_nav
-- ----------------------------
INSERT INTO `winne_nav` VALUES ('1', '学无止境', '0', '');
INSERT INTO `winne_nav` VALUES ('2', 'HTML', '1', '');
INSERT INTO `winne_nav` VALUES ('3', 'CSS/CSS3', '1', '');
INSERT INTO `winne_nav` VALUES ('4', 'JavaScript', '1', '');
INSERT INTO `winne_nav` VALUES ('5', '生活情感', '0', '');
INSERT INTO `winne_nav` VALUES ('6', '大学生活', '5', '');
INSERT INTO `winne_nav` VALUES ('7', '个人情感', '5', '');
INSERT INTO `winne_nav` VALUES ('8', 'jQuery', '1', '');
INSERT INTO `winne_nav` VALUES ('9', '其他工具', '1', '');

-- ----------------------------
-- Table structure for winne_replay
-- ----------------------------
DROP TABLE IF EXISTS `winne_replay`;
CREATE TABLE `winne_replay` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `comment_id` int(10) NOT NULL COMMENT '评论id（和评论表id关联）',
  `replay_content` varchar(200) NOT NULL COMMENT '回复内容',
  `from_uid` int(10) NOT NULL COMMENT '回复用户id',
  `to_uid` int(10) NOT NULL COMMENT '目标用户id',
  `replay_time` datetime NOT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_replay
-- ----------------------------
INSERT INTO `winne_replay` VALUES ('106', '91', '666', '26', '25', '2018-04-28 15:10:56');
INSERT INTO `winne_replay` VALUES ('107', '92', 'emmm', '27', '26', '2018-05-04 10:07:43');
INSERT INTO `winne_replay` VALUES ('108', '94', 'ddddd', '25', '27', '2018-05-06 10:00:23');
INSERT INTO `winne_replay` VALUES ('109', '91', 'dddd', '25', '26', '2018-05-06 10:00:37');
INSERT INTO `winne_replay` VALUES ('110', '99', 'what ??', '26', '25', '2018-05-09 11:03:01');
INSERT INTO `winne_replay` VALUES ('111', '96', '我们不一样！！', '26', '27', '2018-05-10 09:38:13');
INSERT INTO `winne_replay` VALUES ('112', '96', '有什么不一样？？', '30', '26', '2018-05-10 09:58:11');
INSERT INTO `winne_replay` VALUES ('113', '96', 'ssss', '25', '26', '2018-05-25 17:14:19');

-- ----------------------------
-- Table structure for winne_tool_tabcontent
-- ----------------------------
DROP TABLE IF EXISTS `winne_tool_tabcontent`;
CREATE TABLE `winne_tool_tabcontent` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pic` varchar(100) NOT NULL COMMENT '工具图',
  `name` varchar(30) NOT NULL COMMENT '工具名称',
  `tabid` smallint(6) NOT NULL COMMENT '工具所属tabid',
  `state` smallint(4) NOT NULL DEFAULT '0' COMMENT '0: 不推荐 ； 1：推荐',
  `recommend_num` smallint(6) NOT NULL COMMENT '推荐指数',
  `create_time` date NOT NULL COMMENT '更新时间',
  `soft_size` varchar(20) NOT NULL COMMENT '软件大小',
  `download_num` int(11) NOT NULL DEFAULT '0' COMMENT '下载次数',
  `version` varchar(20) NOT NULL COMMENT '软件版本',
  `download_url` varchar(100) NOT NULL COMMENT '下载地址',
  `soft_content` text NOT NULL COMMENT '简介',
  `soft_desc` text NOT NULL COMMENT '下载安装说明',
  `bg_url` varchar(255) DEFAULT NULL COMMENT '工具背景图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_tool_tabcontent
-- ----------------------------
INSERT INTO `winne_tool_tabcontent` VALUES ('14', '/uploads/20180502\\5b594714c29aeb1c35d409980c6ec753.png', 'WebStorm', '1', '1', '9', '2018-05-02', '5.69MB', '0', '3.0', '', '  ', '  ', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('15', '', 'eclipse', '2', '1', '8', '2018-04-24', '54', '0', '12', '', '<p>范德萨时光飞逝广东省</p><p>果福第三个范德萨</p><p>规范化个梵蒂冈</p><p>核桃仁核桃仁</p><p>人的股份的</p>', '  果福第三个范德萨\r\n后台换突然', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('16', '', 'Photoshop', '3', '1', '9', '2018-04-24', '33', '0', 'f3', '', '<p>fbsgfsgds</p><p>供热个人</p><p>如果热热我</p><p>后台换突然</p>', '  个人个个是电风扇范德萨', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('17', '', '金山词霸', '4', '1', '9', '2018-04-24', '32', '0', '3', '', '<p>范德萨发的</p><p>滚滚滚</p><p>个人让我哥</p><p>发的范德萨</p><p>范德萨范德萨</p>', '  热我方认为', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('18', '', 'firebug', '5', '1', '8', '2018-04-24', '43', '0', '3', '', '<p>个人跟我</p><p>仍然特</p><p>范德萨</p><p>发达</p>', '  热热发热的飞洒发的撒', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('21', '', 'Visual Studio', '1', '1', '8', '2018-04-24', '64', '0', '', '', '<p>fngfngfhffd</p>', 'fdfdgd', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('22', '', 'Dreamweaver', '1', '1', '8', '2018-04-24', '', '0', '', '', '', '', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('23', '', 'HBuilder', '1', '1', '9', '2018-04-24', '', '0', '', '', '', '', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('24', '', 'Notepad++', '1', '1', '0', '2018-04-24', '', '0', '', '', '', '', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('25', '/uploads/20180502\\37b4da21e339ed8bb57af09113013294.png', 'sublime text3', '1', '1', '9', '2018-05-02', '8.5MB', '19', '3.0', 'https://pan.baidu.com/s/1iDHNnqgYEYRMtxrs0Dwhzg', '<p>Sublime Text 是一个代码编辑器（Sublime Text 2是收费软件，但可以无限期试用），也是HTML和散文先进的文本编辑器。Sublime Text是由程序员Jon Skinner于2008年1月份所开发出来，它最初被设计为一个具有丰富扩展功能的Vim。</p><p>Sublime Text具有漂亮的用户界面和强大的功能，例如代码缩略图，Python的插件，代码段等。还可自定义键绑定，菜单和工具栏。Sublime Text 的主要功能包括：拼写检查，书签，完整的 Python API ， Goto 功能，即时项目切换，多选择，多窗口等等。Sublime Text 是一个跨平台的编辑器，同时支持Windows、Linux、Mac OS X等操作系统。</p>', '        该软件的安装为了之后能无错误的安装插件，请安装到C盘目录下。', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('26', '', 'Brackets', '1', '1', '0', '2018-04-24', '', '0', '', '', '', '', '');
INSERT INTO `winne_tool_tabcontent` VALUES ('27', '', 'emacs', '1', '1', '0', '2018-04-24', '', '0', '', '', '', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('28', '', 'Vim', '1', '1', '0', '2018-04-24', '', '0', '', '', '', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('29', '', 'IntelliJ IDEA ', '2', '1', '0', '2018-04-24', '', '0', '', '', '', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('30', '', 'WampServer', '2', '1', '8', '2018-04-29', '65', '0', '7', '', '<p>dsafdsafd</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('31', '', 'SQLyog', '2', '1', '9', '2018-04-29', '7', '0', '7', '', '<p>teytreyteytre</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('32', '', 'Packet Tracer', '2', '1', '8', '2018-04-29', '7', '0', '5', '', '<p>dadafdafdsa</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('33', '', 'VMware Workstation Pro', '2', '1', '9', '2018-04-29', '8', '0', '5', '', '<p>bfbfsbfdsbfdsafdasfdsa</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('34', '', 'Adobe Illustrator', '3', '1', '6', '2018-04-29', '5', '0', '3', '', '<p>grewehththrffsdgdageagewqefdsfdafdsa</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('35', '', 'Adobe Audition', '3', '1', '8', '2018-04-29', '4', '0', '2', '', '<p>gesgfdfdsgfsd</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('36', '', 'After Effects', '3', '0', '6', '2018-04-29', '5', '0', '2', '', '<p>grbfdsggregfdfdsgfdsgfsd</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('37', '', '会 声 会 影', '3', '1', '7', '2018-04-29', '4', '0', '2', '', '<p>htjytjytrjyjytjytrjytrjt</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('38', '', '证 照 之 星', '3', '1', '9', '2018-04-29', '5', '0', '2', '', '<p>shgfdhgfdhsgfdgfdsgfdsgfds</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('39', '', 'TeamViewer ', '4', '1', '9', '2018-04-29', '43', '0', '2', '', '<p>fbfgagdsgdsagdagdsa</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('40', '', 'Evernote ', '4', '1', '8', '2018-04-29', '4', '0', '2', '', '<p>gbrgrewgrewgrewgergewrggrewgrwe</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('41', '', 'ColorExpres', '4', '1', '9', '2018-04-29', '43', '0', '2', '', '<p>gfdgfsgfsgfsd</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('42', '', 'picpick ', '4', '1', '8', '2018-04-29', '54', '0', '2', '', '<p>hhgfdhgfdbdngnytnytjjtrehtrtrew</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('43', '', '屏幕录像专家', '4', '1', '6', '2018-04-29', '45', '0', '2', '', '<p>rehthgnyjtnynsgfdxfdassfds</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('44', '', 'ColorZilla', '5', '1', '6', '2018-04-29', '34', '0', '2', '', '<p>432t43rerehtrhtrh</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('45', '', 'ColourLovers', '5', '1', '7', '2018-04-29', '32', '0', '1', '', '<p>hdhffsdgfdsgfdsgfsd3243242</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('46', '', '960 Grid System', '5', '1', '8', '2018-04-29', '432', '0', '2', '', '<p>rhrhttntenfdst4343refdesfd</p>', ' ', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('47', '', 'Em Calculato', '5', '1', '6', '2018-04-29', '45', '0', '2', '', '<p>hhtrrhtrhtrehtehtrhtehtrehrt</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('48', '', 'Icon Finde', '5', '0', '5', '2018-04-29', '3', '0', '1', '', '<p>grgrhtrrhtrwhwrgrwetre</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('49', '', 'FileZilla Client', '5', '0', '8', '2018-04-29', '2', '0', '1', '', '<p>grwgrwgrrbhrttrhehwgtr</p>', '', null);
INSERT INTO `winne_tool_tabcontent` VALUES ('50', '', 'FlashFXP 5', '5', '0', '6', '2018-04-29', '3', '0', '2', '', '<p>yhty4t4rt4h54y54y54h54h54</p>', '', null);

-- ----------------------------
-- Table structure for winne_tool_tabname
-- ----------------------------
DROP TABLE IF EXISTS `winne_tool_tabname`;
CREATE TABLE `winne_tool_tabname` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `tabname` varchar(30) NOT NULL COMMENT '工具栏tab名',
  `bg_url` varchar(100) NOT NULL COMMENT '每类工具下面的背景图（雪碧图形式的）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_tool_tabname
-- ----------------------------
INSERT INTO `winne_tool_tabname` VALUES ('1', '前端代码编辑', '/uploads/20180424/edd7908dc000e3d60b4ed4117912ee0f.png');
INSERT INTO `winne_tool_tabname` VALUES ('2', '后端工具', '/uploads/20180424/58520ae649fd7469b091bf85cd3da273.png');
INSERT INTO `winne_tool_tabname` VALUES ('3', '图像音频处理', '/uploads/20180424/31b452beabd91641828ae1f59fcc3b1e.png');
INSERT INTO `winne_tool_tabname` VALUES ('4', '辅助办公工具', '/uploads/20180424/2b2a600877c218bca1c65abe466a0fa1.png');
INSERT INTO `winne_tool_tabname` VALUES ('5', '其他实用工具', '/uploads/20180424/4fc21edb852aff83597ba9e1cb4fd1cf.png');

-- ----------------------------
-- Table structure for winne_user
-- ----------------------------
DROP TABLE IF EXISTS `winne_user`;
CREATE TABLE `winne_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '用户密码',
  `phone` varchar(30) NOT NULL COMMENT '用户手机号',
  `email` varchar(40) NOT NULL COMMENT '用户邮箱',
  `state` smallint(2) NOT NULL DEFAULT '1' COMMENT '0:禁用，1：可用',
  `time` datetime NOT NULL COMMENT '用户注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_user
-- ----------------------------
INSERT INTO `winne_user` VALUES ('25', 'winne', 'e10adc3949ba59abbe56e057f20f883e', '', '', '1', '2018-04-28 15:07:56');
INSERT INTO `winne_user` VALUES ('26', 'xf', '96e79218965eb72c92a549dd5a330112', '', '', '1', '2018-04-28 15:10:16');
INSERT INTO `winne_user` VALUES ('27', 'qqq', '343b1c4a3ea721b2d640fc8700db0f36', '', '', '1', '2018-05-04 10:05:53');
INSERT INTO `winne_user` VALUES ('28', 'f', '96e79218965eb72c92a549dd5a330112', '', '', '1', '2018-05-09 15:06:55');
INSERT INTO `winne_user` VALUES ('30', 'www', '96e79218965eb72c92a549dd5a330112', '', '', '1', '2018-05-10 09:53:47');

-- ----------------------------
-- Table structure for winne_wonder_recommend
-- ----------------------------
DROP TABLE IF EXISTS `winne_wonder_recommend`;
CREATE TABLE `winne_wonder_recommend` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL COMMENT '文章索引id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winne_wonder_recommend
-- ----------------------------
INSERT INTO `winne_wonder_recommend` VALUES ('1', '28');
INSERT INTO `winne_wonder_recommend` VALUES ('2', '29');
INSERT INTO `winne_wonder_recommend` VALUES ('3', '30');
INSERT INTO `winne_wonder_recommend` VALUES ('4', '31');
