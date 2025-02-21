# Host: localhost  (Version: 5.7.26)
# Date: 2025-02-20 16:17:05
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "gxl_about"
#

DROP TABLE IF EXISTS `gxl_about`;
CREATE TABLE `gxl_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL COMMENT '资讯类别',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='注册协议';

#
# Data for table "gxl_about"
#

INSERT INTO `gxl_about` VALUES (1,'agreement','注册协议','【首部及导言】<br />\r\n欢迎您使用硕下网媒体平台及服务！<br />\r\n<br />\r\n为使用硕下网媒体平台服务（以下简称“本服务”），您应当阅读并遵守《硕下网媒体平台服务协议》（以下简称“本协议”）。<br />\r\n<br />\r\n请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款，以及开通或使用某项服务的单独协议，并选择接受或不接受。限制、免责条款可能以加粗或其他在页面上突出的形式提示您注意。<br />\r\n<br />\r\n您对本服务的登录、查看、发布信息等行为即视为您已阅读并同意接受本协议所有条款和条件的约束。除非您已阅读并接受本协议所有条款和条件，否则您无权使用本服务。<br />\r\n<br />\r\n如果您未满18周岁，请在法定监护人的陪同下阅读理解本协议及其他相关协议，并特别注意未成年人使用条款。<br />\r\n<br />\r\n一、【协议的范围】<br />\r\n1.1 本协议是您与硕下网(www.sxiaw.com)之间关于您使用硕下网媒体平台服务所订立的协议。“平台用户”是指注册、登录、使用硕下网媒体平台帐号的个人或组织，在本协议中更多地称为“您”。“其他用户”是指包括订阅用户等除平台用户本人外与本服务相关的用户。<br />\r\n<br />\r\n1.2 本服务包括但不限于以硕下网(www.sxiaw.com)网站（http://www.sxiaw.com/）、硕下网(www.sxiaw.com)APP手机软件等业务平台（即“硕下网媒体平台”）为传播渠道,针对个人、企业或其他组织推出的信息发布和品牌推广服务。平台用户注册硕下网媒体平台帐号后可以通过硕下网媒体平台进行发布评论、参与活动等操作;认证用户还可以通过硕下网进行信息发布、订阅用户管理等操作。<br />\r\n<br />\r\n1.3 作为平台用户，您被授予一项非独家的、不可转让的、不可撤销的和有限制的许可以按照本协议进入硕下网媒体平台，使用相关“硕下网媒体平台服务”。硕下网(www.sxiaw.com)可以因任何原因在任何时候全部或部分终止这项许可。该许可使用非为商业性使用，不可转让或转售，也不能被买断独家使用。<br />\r\n<br />\r\n1.4 为提高平台用户的硕下网媒体平台及硕下网媒体平台服务的使用感受和满意度，您同意硕下网(www.sxiaw.com)基于用户的操作行为对用户数据进行调查研究和分析，从而进一步优化硕下网媒体平台及硕下网媒体平台服务<br />\r\n<br />\r\n二、【帐号注册及帐号权限】<br />\r\n2.1 您在使用本服务前需要注册一个硕下网媒体平台帐号，硕下网媒体平台帐号为手机号码注册而成；认证用户还需提供事业单位法人证书、营业执照、运营人身份证号等其他相关资料或信息，硕下网认证服务面向新闻媒体或政府机构、社会组织。<br />\r\n<br />\r\n2.2使用硕下网认证服务，您可获得以下权限：<br />\r\n2.2.1 通过硕下网媒体平台进行消息管理及与订阅用户进行互动；<br />\r\n2.2.2 获取您在硕下网媒体平台帐号的已上线的相关数据服务（如订阅用户量及消息点击次数量）。<br />\r\n<br />\r\n2.3 硕下网媒体平台将对您的注册、认证信息进行审查。您应当对您提供的帐号资料的真实性、合法性、准确性和有效性独立承担责任。硕下网(www.sxiaw.com)有权对您提供的账号资料进行审核，如资料不真实、不准确、不规范、不合法或硕下网(www.sxiaw.com)有理由质疑资料的真实性、合法性时，硕下网(www.sxiaw.com)有权终止您对硕下网媒体平台服务的使用，直至您依硕下网(www.sxiaw.com)要求补充提交真实、准确、合法、有效的资料并经硕下网(www.sxiaw.com)审核通过；如因此给硕下网(www.sxiaw.com)及/或第三方造成伤害的，硕下网(www.sxiaw.com)保留向您追究赔偿责任的权利。您承诺遵守法律法规、社会主义制度、国家利益、公民合法权益、公共秩序、社会道德风尚和信息真实性等底线，不得在账号注册资料中出现违法和不良信息，且应保证其在注册和使用账号时，不得有以下情形：<br />\r\n（1）违反宪法或法律法规规定的；<br />\r\n（2）危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；<br />\r\n（3）损害国家荣誉和利益的，损害公共利益的；<br />\r\n（4）煽动民族仇恨、民族歧视，破坏民族团结的；<br />\r\n（5）破坏国家宗教政策，宣扬邪教和封建迷信的；<br />\r\n（6）散布谣言，扰乱社会秩序，破坏社会稳定的；<br />\r\n（7）散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；<br />\r\n（8）侮辱或者诽谤他人，侵害他人合法权益的；<br />\r\n（9）含有法律、行政法规禁止的其他内容的。<br />\r\n如您违反前述约定，依据相关法律、法规及国家政策要求，硕下网(www.sxiaw.com)有权随时采取不予注册、通知限期改正、注销用户账号、中止或终止用户对硕下网媒体平台服务的使用等措施。如果用户冒用关联机构或社会名人注册账号名称，硕下网(www.sxiaw.com)有权注销用户该账号，并向互联网信息内容主管部门报告，且如因此给硕下网(www.sxiaw.com)或第三方造成损害的，您还应当依法予以赔偿。<br />\r\n<br />\r\n2.4 您有权更改、删除在硕下网媒体平台帐号上的个人资料、注册信息及传送内容等，但需注意，删除有关信息的同时也会删除任何您储存在系统中的文字、图片或视频等信息内容。您需承担该风险。<br />\r\n<br />\r\n2.5 如您同意使用本服务，您注册并认证之后可以将通过硕下网媒体平台所发布的消息（包括但不限于文字、图片、视频、图表等）推送给您的硕下网媒体平台帐号订阅用户。同时硕下网(www.sxiaw.com)亦有权将您通过硕下网媒体平台所发布的消息（包括但不限于文字、图片、视频、图表等）在包括但不限于硕下网(www.sxiaw.com)网站、硕下网(www.sxiaw.com)APP软件等硕下网(www.sxiaw.com)相关业务平台上推送给公众。<br />\r\n<br />\r\n2.6若作为认证用户，您同意自硕下网(www.sxiaw.com)通过站内信通知您认证通过之日起，您的认证账号在硕下网媒体平台上每周应至少发布一次消息，若您未达到前述消息发布频率，则硕下网(www.sxiaw.com)有权终止本服务协议<br />\r\n<br />\r\n三、【平台用户个人信息保护】<br />\r\n3.1 您在申请认证服务的过程中，可能需要提供一些必要的信息（包括但不限于您的移动电话号码、身份证件、营业执照、组织机构代码证等），请保持这些信息的真实、准确、合法、有效并注意及时更新，以便硕下网(www.sxiaw.com)向您提供及时有效的帮助，或更好地为您提供服务。根据相关法律法规和政策，请您填写真实的身份信息。若您填写的信息不完整或不准确，则可能无法使用认证服务或在使用过程中受到限制。<br />\r\n<br />\r\n3.2 硕下网(www.sxiaw.com)与平台用户一同致力于个人信息的保护，保护平台用户个人信息是硕下网(www.sxiaw.com)的一项基本原则。未经您的同意，硕下网(www.sxiaw.com)不会向硕下网(www.sxiaw.com)以外的任何公司、组织或个人披露您的个人信息，但法律法规另有规定的除外。<br />\r\n<br />\r\n3.3 您应对通过本服务了解、接收或可接触到的包括但不限于其他用户在内的任何人的个人信息予以充分尊重，您不应以搜集、复制、存储、传播或以其他任何方式使用其他用户的个人信息，否则，由此产生的后果由您自行承担。<br />\r\n<br />\r\n四、【平台内容规范】<br />\r\n4.1 本条所述平台内容是指您使用本服务过程中所制作、复制、发布、传播的任何内容，包括但不限于硕下网媒体平台帐号头像、名称、平台用户说明等注册信息，或文字、语音、图片、视频、图文等发送、回复或自动回复消息和相关链接页面，以及其他使用硕下网媒体平台帐号或硕下网媒体平台服务所产生的内容。<br />\r\n<br />\r\n4.2 您充分了解并同意，您必须独立地为自己帐号下的一切行为负责，包括您所传送的任何平台内容以及由此产生的任何结果。您在硕下网媒体平台上传或发布的平台内容，若您为著作权人应保证该内容真实准确、客观公正；或您为转载人应保证已取得合法授权，并且该内容不会侵犯任何第三方的合法权益，且保证转发的平台内容完整准确，不得歪曲，并在显著位置注明来源，保证信息来源可追溯；且您对硕下网媒体平台服务的使用必须遵守所有适用于该服务的地方法律、国家法律和国际法律。<br />\r\n您在硕下网媒体平台上发布平台内容或者利用硕下网媒体平台服务时必须符合中国有关法律法规，您不得在硕下网媒体平台上或者利用本服务制作、复制、发布、传播如下法律、法规和政策禁止的内容：<br />\r\n（1）反对宪法所确定的基本原则的；<br />\r\n（2）危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；<br />\r\n（3）损害国家荣誉和利益的；<br />\r\n（4）煽动民族仇恨、民族歧视，破坏民族团结的；<br />\r\n（5）破坏国家宗教政策，宣扬邪教和封建迷信的；<br />\r\n（6）散布谣言，扰乱社会秩序，破坏社会稳定的；<br />\r\n（7）散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；<br />\r\n（8）侮辱或者诽谤他人，侵害他人合法权益的；<br />\r\n（9）煽动非法集会、结社、游行、示威、聚众扰乱社会秩序的；<br />\r\n（10）以非法民间组织名义活动的；<br />\r\n（11）含有法律、法规和政策禁止的其他内容的信息。<br />\r\n<br />\r\n4.3 您理解并同意，硕下网(www.sxiaw.com)一直致力于为平台用户提供文明健康、规范有序的网络环境，您不得以任何方式干扰硕下网媒体平台的运营，包括但不限于利用本服务制作、复制、发布、传播如下干扰运营，以及侵犯其他用户或第三方合法权益的内容：<br />\r\n（1） 含有任何性或性暗示的；<br />\r\n（2） 骚扰、垃圾广告或信息的；<br />\r\n（3） 涉及他人隐私、个人信息或资料的；<br />\r\n（4） 侵害他人名誉权、肖像权、知识产权、商业秘密等合法权利的；<br />\r\n（5）含有其他干扰硕下网媒体平台正常运营和侵犯其他用户或第三方合法权益内容的信息。<br />\r\n<br />\r\n4.4您须对通过硕下网媒体平台所传送信息内容的真实性、合法性、无害性、有效性等全权负责，与您所传播的信息相关的任何法律责任由您自行承担，与硕下网(www.sxiaw.com)无关。您承诺绝不通过硕下网媒体平台与广告商及其他第三方进行任何形式的通讯或商业往来，或参与促销活动，包含相关商品或服务之付款及交付，以及达成的其它任何相关条款、条件、保证或声明等。如有违反，您因前述任何交易或前述广告商及其他第三方而遭受的任何性质的损失或损害，硕下网(www.sxiaw.com)对此不负任何法律责任。<br />\r\n您在硕下网媒体平台服务中或通过硕下网媒体平台所传送的任何内容并不反映硕下网(www.sxiaw.com)的观点或政策，硕下网(www.sxiaw.com)对此不承担任何责任。<br />\r\n<br />\r\n4.5 硕下网(www.sxiaw.com)有权对平台用户使用硕下网媒体平台服务的行为及发布的平台内容进行审查、监督及处理，包括但不限于用户信息（账号信息、个人信息等）、发布内容（位置、文字、图片、音频、视频、商标、专利、出版物等）、用户行为（构建关系、信息、评论、私信、参与话题、参与活动、营销信息发布、举报投诉等）等范畴。如硕下网(www.sxiaw.com)发现、或收到第三方举报或投诉平台用户在使用硕下网媒体平台服务时违反本协议使用规则相关规定的，硕下网(www.sxiaw.com)或其授权主体有权依据其合理要求，不经通知直接采取一切必要措施以减轻或消除该用户不当行为造成的影响，并将尽可能在处理之后对该用户进行通知。上述必要措施包括但不限于更改、屏蔽或删除相关内容，警告违规账号，限制或禁止违规账号部分或全部功能，暂停、终止、注销用户使用硕下网媒体平台服务的权利等，并有权向主管部门报告。<br />\r\n<br />\r\n五、【平台使用规则】<br />\r\n5.1 本条所述平台使用是指您使用本服务所进行的任何行为，包括但不限于注册登录、帐号运营推广以及其他使用硕下网媒体平台帐号或硕下网媒体平台服务所进行的行为。<br />\r\n<br />\r\n5.2 您不得利用硕下网媒体平台帐号或硕下网媒体平台服务进行如下行为：<br />\r\n（1） 提交、发布虚假信息，或冒充、利用他人名义的；<br />\r\n（2） 强制、诱导其他用户关注、点击链接页面或分享信息的；<br />\r\n（3） 虚构事实、隐瞒真相以误导、欺骗他人的；<br />\r\n（4） 侵害他人名誉权、肖像权、知识产权、商业秘密等合法权利的；<br />\r\n（5）未经硕下网(www.sxiaw.com)书面许可利用硕下网(www.sxiaw.com)媒体开放帐号对第三方运营平台进行推广或互相推广的；<br />\r\n（6） 未经硕下网(www.sxiaw.com)书面许可使用插件、外挂或其他第三方工具、服务接入本服务和相关系统；<br />\r\n（7） 利用硕下网(www.sxiaw.com)媒体开放帐号或硕下网媒体平台服务从事任何违法犯罪活动的；<br />\r\n（8） 制作、发布与以上行为相关的方法、工具，或对此类方法、工具进行运营或传播，无论这些行为是否为商业目的；<br />\r\n（9）其他违反法律法规规定、侵犯其他用户合法权益、干扰产品正常运营或硕下网(www.sxiaw.com)未明示授权的行为。<br />\r\n<br />\r\n5.3如果您发现任何人违反本协议规定或以其他不当的方式使用硕下网媒体平台服务，请立即向硕下网媒体平台举报或投诉，硕下网(www.sxiaw.com)将依法进行处理。<br />\r\n<br />\r\n六、【帐号管理】<br />\r\n6.1 硕下网媒体平台帐号的所有权归硕下网(www.sxiaw.com)公司所有，平台用户完成申请注册手续后，获得硕下网媒体平台帐号的使用权，该使用权仅属于初始申请注册人，禁止赠与、借用、租用、转让或售卖。硕下网(www.sxiaw.com)公司因经营需要，有权自行决定终止本服务。<br />\r\n<br />\r\n6.2 硕下网(www.sxiaw.com)仅根据您的帐号和密码确认使用硕下网媒体平台的用户身份。您有责任妥善保管注册帐户信息及帐户密码的安全，并对其使用及其遗失自行承担责任。您充分知晓，硕下网(www.sxiaw.com)账号仅为您进行信息分享、管理的媒介，您需要自行对注册帐户以及密码下的一切行为承担法律责任。您同意在任何情况下不使用其他成员的帐号或密码。您同意在任何情况下不向他人透露帐户或密码信息。在您怀疑他人在使用您的帐户或密码时，您同意立即通知硕下网(www.sxiaw.com)。您在此同意并确认，硕下网(www.sxiaw.com)对因上述情形产生的遗失或损害不负责任。<br />\r\n<br />\r\n6.3 您充分知晓硕下网(www.sxiaw.com)网站（http://www.sxiaw.com/）及硕下网(www.sxiaw.com)客户端软件为注册、登陆、访问本服务的官方渠道，为此，您必须是通过登录硕下网(www.sxiaw.com)网站（http://www.sxiaw.com/）或下载硕下网(www.sxiaw.com)客户端软件、注册账号和密码来访问或者使用硕下网媒体平台帐号，对于通过其他手段登陆、使用所造成的后果，硕下网(www.sxiaw.com)不将不承担任何责任。<br />\r\n<br />\r\n6.4 您应遵守本协议的各项条款，正确、适当地使用本服务，如您违反本协议中的任何条款，硕下网(www.sxiaw.com)公司有权依据本协议终止对您的硕下网媒体平台帐号提供服务。同时，硕下网(www.sxiaw.com)保留在任何时候收回硕下网媒体平台帐号、平台用户名的权利。<br />\r\n<br />\r\n七、【数据的储存】<br />\r\n您理解并同意： 硕下网(www.sxiaw.com)将会尽其商业上的合理努力保障您在硕下网媒体平台及使用其服务中的数据存储安全，但是，并不能就此提供完全保证，包括但不限于以下情形：<br />\r\n<br />\r\n7.1 硕下网(www.sxiaw.com)不对你在本服务中相关数据的删除或储存失败负责。<br />\r\n<br />\r\n7.2 您承认关于硕下网媒体平台服务的使用硕下网(www.sxiaw.com)有关制定一般措施和限制，包括但不限于硕下网(www.sxiaw.com)有权根据实际情况自行决定单个平台用户在本服务中数据的最长储存期限，并在服务器上为其分配数据最大存储空间等。你可根据自己的需要自行备份本服务中的相关数据。您通过硕下网媒体平台发布或传送之任何信息、通讯资料和其它内容，如被删除或未予储存，您同意硕下网(www.sxiaw.com)毋须承担任何责任。您也同意，硕下网(www.sxiaw.com)有权依其自行之考虑，不论通知与否，随时变更这些一般措施及限制。<br />\r\n<br />\r\n7.3 如果你停止使用本服务或服务被终止或取消，硕下网(www.sxiaw.com)可以从服务器上永久地删除你的数据。服务停止、终止或取消后，硕下网(www.sxiaw.com)没有义务向你返还任何数据。<br />\r\n<br />\r\n八、【风险及免责】<br />\r\n7.3 如果你停止使用本服务或服务被终止或取消，硕下网(www.sxiaw.com)可以从服务器上永久地删除你的数据。服务停止、终止或取消后，硕下网(www.sxiaw.com)没有义务向你返还任何数据。<br />\r\n如果你发现任何人违反本协议规定或以其他不当的方式使用硕下网媒体平台服务，请立即向硕下网媒体平台举报或投诉，我们将依法进行处理。<br />\r\n<br />\r\n8.2 您理解并同意，因业务发展需要，硕下网(www.sxiaw.com)保留单方面对本服务的全部或部分服务内容在任何时候不经任何通知的情况下变更、暂停、限制、终止或撤销的权利，平台用户需承担此风险。<br />\r\n<br />\r\n九、【知识产权声明】<br />\r\n9.1 硕下网(www.sxiaw.com)在本服务中提供的内容（包括但不限于网页、文字、图片、音频、视频、图表等）的知识产权归硕下网(www.sxiaw.com)所有，平台用户在使用本服务中所产生的内容的知识产权归平台用户或相关权利人所有。但您同意并确认，您在以公开发布的方式在硕下网媒体平台上发布平台内容时将授予硕下网(www.sxiaw.com)一项全球性的免费许可，允许硕下网(www.sxiaw.com)使用、传播、复制、修改、再许可、翻译、创建衍生作品、出版、表演及展示此等内容。<br />\r\n<br />\r\n9.2 除另有特别声明外，硕下网(www.sxiaw.com)提供本服务时所依托软件的著作权、专利权及其他知识产权均归硕下网(www.sxiaw.com)所有。<br />\r\n<br />\r\n9.3 硕下网(www.sxiaw.com)在本服务中所使用的“硕下网(www.sxiaw.com)”、等商业标识，其著作权或商标权归硕下网(www.sxiaw.com)所有。<br />\r\n<br />\r\n9.4 上述及其他任何本服务包含的内容的知识产权均受到法律保护，未经硕下网(www.sxiaw.com)、平台用户或相关权利人书面许可，任何人不得以任何形式进行使用或创造相关衍生作品。<br />\r\n<br />\r\n十、【法律责任】<br />\r\n10.1 如果硕下网(www.sxiaw.com)发现或收到他人举报或投诉平台用户违反本协议约定的，硕下网(www.sxiaw.com)有权不经通知随时对相关内容进行删除，并视行为情节对违规帐号处以包括但不限于警告、删除部分或全部订阅用户、限制或禁止使用全部或部分功能、帐号封禁直至注销的处罚，并公告处理结果。<br />\r\n<br />\r\n10.2 您理解并同意，硕下网(www.sxiaw.com)有权依合理判断对违反有关法律法规或本协议规定的行为进行处罚，对违法违规的任何人士采取适当的法律行动，并依据法律法规保存有关信息向有关部门报告等，平台用户应独自承担由此而产生的一切法律责任。<br />\r\n<br />\r\n10.3您理解并同意，因您或您注册的硕下网(www.sxiaw.com)账户违反本协议或相关的服务条款的规定，导致或产生的任何第三方主张的任何索赔、要求或损失，包括合理的律师费等，您应当赔偿硕下网(www.sxiaw.com)与硕下网(www.sxiaw.com)合作公司、关联公司，使之免受损害。 十一、【协议的生效与变更】<br />\r\n<br />\r\n11.1 您使用本服务即视为您已阅读并同意受本协议的约束。<br />\r\n<br />\r\n11.2 硕下网(www.sxiaw.com)有权在必要时修改本协议条款。您可以在相关服务页面查阅最新版本的协议条款。<br />\r\n<br />\r\n11.3 本协议条款变更后，如果您继续使用硕下网媒体平台服务，即视为您已接受修改后的协议。如果您不接受修改后的协议，应当停止使用本服务。<br />\r\n<br />\r\n十二、【其他】<br />\r\n12.1本协议项下硕下网(www.sxiaw.com)对于平台用户所有的通知均可通过网页公告、电子邮件、系统通知、管理帐号主动联系、手机短信或常规的信件传送等方式进行；该等通知无论以何种方式传送，均于发送之日视为已送达收件人。<br />\r\n<br />\r\n12.2 本协议的成立、生效、履行、解释及纠纷解决，适用中华人民共和国大陆地区法律（不包括冲突法）。<br />\r\n<br />\r\n12.3 若您和硕下网(www.sxiaw.com)之间发生任何纠纷或争议，首先应友好协商解决；协商不成的，您同意将纠纷或争议提交本协议签订地有管辖权的人民法院管辖。本协议签订地为中华人民共和国北京市海淀区。<br />\r\n<br />\r\n12.4 本协议所有条款的标题仅为阅读方便，本身并无实际涵义，不能作为本协议涵义解释的依据。<br />\r\n<br />\r\n12.5 本协议条款无论因何种原因部分无效或不可执行，其余条款仍有效，对双方具有约束力。（正文完）<br />\r\n<br />\r\n硕下网(www.sxiaw.com)<br />');

#
# Structure for table "gxl_actor"
#

DROP TABLE IF EXISTS `gxl_actor`;
CREATE TABLE `gxl_actor` (
  `actor_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `actor_vid` mediumint(9) NOT NULL,
  `actor_name` varchar(255) NOT NULL,
  `actor_star` varchar(255) NOT NULL,
  `actor_content` text NOT NULL,
  `actor_pic` varchar(255) NOT NULL,
  `actor_hits` mediumint(9) NOT NULL DEFAULT '0',
  `actor_hits_day` mediumint(9) NOT NULL,
  `actor_hits_week` mediumint(9) NOT NULL,
  `actor_hits_month` mediumint(9) NOT NULL,
  `actor_hits_lasttime` int(11) NOT NULL,
  `actor_addtime` int(11) NOT NULL,
  `actor_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`actor_id`),
  KEY `actor_vid` (`actor_vid`),
  KEY `actor_star` (`actor_star`),
  KEY `actor_name` (`actor_name`),
  KEY `actor_addtime` (`actor_addtime`),
  KEY `actor_hits` (`actor_hits`),
  KEY `actor_hits_day` (`actor_hits_day`),
  KEY `actor_hits_week` (`actor_hits_week`),
  KEY `actor_hits_month` (`actor_hits_month`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_actor"
#


#
# Structure for table "gxl_admin"
#

DROP TABLE IF EXISTS `gxl_admin`;
CREATE TABLE `gxl_admin` (
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_pwd` char(32) NOT NULL,
  `admin_count` smallint(6) NOT NULL,
  `admin_ok` varchar(50) NOT NULL,
  `admin_del` bigint(20) NOT NULL,
  `admin_ip` varchar(40) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_logintime` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




#
# Structure for table "gxl_ads"
#

DROP TABLE IF EXISTS `gxl_ads`;
CREATE TABLE `gxl_ads` (
  `ads_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ads_name` varchar(50) NOT NULL,
  `ads_content` text NOT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_ads"
#

INSERT INTO `gxl_ads` VALUES (34,'sssssss','');

#
# Structure for table "gxl_code"
#

DROP TABLE IF EXISTS `gxl_code`;
CREATE TABLE `gxl_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '类型',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `is` tinyint(1) DEFAULT '0' COMMENT '是否使用0未使用',
  `username` varchar(255) DEFAULT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='验证码';

#
# Data for table "gxl_code"
#

INSERT INTO `gxl_code` VALUES (1,'59946','mail',1584522502,1,'2010409646@qq.com',NULL),(2,'61201','mail',1584522555,1,'2010409646@qq.com',NULL),(3,'52799','mail',1584522891,1,'2010409646@qq.com',NULL),(4,'63421','mail',1584590928,1,'2010409646@qq.com',NULL),(5,'58702','mail',1584602376,1,'2010409646@qq.com',NULL),(6,'98030','mail',1584952918,0,'2010409646@qq.com',NULL),(7,'54914','mail',1584952918,0,'2010409646@qq.com',NULL),(8,'10101','mail',1585034811,0,'2010409646@qq.com',NULL),(9,'34029','mail',1585035097,0,'1111@163.com',NULL),(10,'50888','mail',1585035154,0,'2010409646@qq.com',NULL),(11,'34617','mail',1585035272,0,'2010409646@qq.com','修改邮箱'),(12,'50803','mail',1585037070,1,'2010409646@qq.com','修改邮箱'),(13,'24004','mail',1585037139,1,'2010409646@qq.com','修改邮箱'),(14,'45516','mail',1585037502,0,'1111@163.com','修改邮箱'),(15,'33414','mail',1585037547,0,'222@163.com','修改邮箱'),(16,'56362','mail',1585037553,0,'222@163.com','修改邮箱'),(17,'57139','mail',1585037578,0,'gaoxingliang111@163.com','修改邮箱'),(18,'23647','mail',1585128065,1,'251856724@qq.com','修改邮箱'),(19,'36191','mail',1617346561,1,'2010409646@qq.com','找回密码'),(20,'82171','mail',1678444946,1,'874576572@qq.com','修改邮箱'),(21,'19436','mail',1728356494,0,'lmx030421@163.com','找回密码'),(22,'50722','mail',1728356504,0,'lmx030421@163.com','找回密码'),(23,'22119','mail',1728356514,0,'lmx030421@163.com','找回密码'),(24,'19807','mail',1728356538,0,'lmx030421@163.com','找回密码');

#
# Structure for table "gxl_comment"
#

DROP TABLE IF EXISTS `gxl_comment`;
CREATE TABLE `gxl_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `down_id` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `creat_at` int(11) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '评论状态{0:未审核,-1:未通过审核,1:通过审核}',
  `content` varchar(255) DEFAULT NULL,
  `support` mediumint(9) DEFAULT '0' COMMENT '支持数',
  `reply` tinyint(1) DEFAULT '0' COMMENT '是否为回复',
  `oppose` mediumint(9) DEFAULT '0' COMMENT '反对数',
  `pid` int(11) DEFAULT NULL,
  `ispass` int(11) DEFAULT '0' COMMENT '1 通过 0 不通过',
  `rcid` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `reply_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `vod_id` (`down_id`),
  KEY `userid` (`userid`),
  KEY `status` (`status`),
  KEY `ispass` (`ispass`),
  KEY `pid` (`pid`),
  KEY `ip` (`ip`),
  KEY `creat_at` (`creat_at`),
  KEY `rcid` (`rcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_comment"
#


#
# Structure for table "gxl_comment_opinion"
#

DROP TABLE IF EXISTS `gxl_comment_opinion`;
CREATE TABLE `gxl_comment_opinion` (
  `opinion_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `opinion` int(11) DEFAULT NULL COMMENT '0 反对 1同意',
  `creat_date` int(11) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`opinion_id`),
  KEY `comment_id` (`comment_id`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_comment_opinion"
#

INSERT INTO `gxl_comment_opinion` VALUES (1,5,0,1732781601,'1.193.109.196'),(2,7,0,1732782066,'1.193.109.196'),(3,10,1,1732787664,'1.193.109.196');

#
# Structure for table "gxl_down"
#

DROP TABLE IF EXISTS `gxl_down`;
CREATE TABLE `gxl_down` (
  `down_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `down_cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '分类id',
  `down_name` varchar(255) NOT NULL DEFAULT '' COMMENT '软件名称',
  `down_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '标签TAG',
  `down_color` char(8) NOT NULL DEFAULT '' COMMENT '软件字体颜色',
  `down_pic` varchar(255) NOT NULL DEFAULT '' COMMENT '软件图片',
  `down_inputer` varchar(50) NOT NULL DEFAULT '' COMMENT '软件录入作者',
  `down_reurl` varchar(255) NOT NULL DEFAULT '' COMMENT '软件来源',
  `down_remark` text NOT NULL COMMENT '软件简述',
  `down_content` text NOT NULL COMMENT '软件内容',
  `down_hits` mediumint(9) NOT NULL DEFAULT '0' COMMENT '软件总点击',
  `down_hits_day` mediumint(9) NOT NULL DEFAULT '0' COMMENT '软件日点击',
  `down_hits_week` mediumint(9) NOT NULL DEFAULT '0' COMMENT '软件周点击',
  `down_hits_month` mediumint(9) NOT NULL DEFAULT '0' COMMENT '软件日点击',
  `down_hits_lasttime` int(11) NOT NULL,
  `down_stars` tinyint(1) NOT NULL DEFAULT '0' COMMENT '软件推荐级别',
  `down_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '软件是否显示',
  `down_up` mediumint(9) NOT NULL DEFAULT '0' COMMENT '软件顶数量',
  `down_down` mediumint(9) NOT NULL DEFAULT '0' COMMENT '软件踩数量',
  `down_jumpurl` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转url',
  `down_letter` char(2) NOT NULL DEFAULT '' COMMENT '首字母',
  `down_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加或者更新时间',
  `down_skin` varchar(30) NOT NULL DEFAULT '' COMMENT '独立模板',
  `down_gold` decimal(3,1) DEFAULT NULL COMMENT '评分值',
  `down_golder` smallint(6) NOT NULL DEFAULT '0' COMMENT '评分人数',
  `down_down1` varchar(255) DEFAULT NULL COMMENT '下载地址1',
  `down_down2` varchar(255) DEFAULT NULL,
  `down_down3` varchar(255) DEFAULT NULL,
  `down_down4` varchar(255) DEFAULT NULL,
  `down_down5` varchar(255) DEFAULT NULL,
  `down_down6` varchar(255) DEFAULT NULL COMMENT '下载6',
  `down_authorization` varchar(255) DEFAULT NULL COMMENT '授权方式',
  `down_type` varchar(255) DEFAULT NULL COMMENT '软件类型',
  `down_url` varchar(255) DEFAULT NULL COMMENT '软件官网',
  `down_size` varchar(255) DEFAULT NULL COMMENT '软件大小',
  `down_picall` tinytext COMMENT '多图片',
  `down_language` varchar(255) DEFAULT NULL COMMENT '软件语言',
  `down_environment` varchar(255) DEFAULT NULL COMMENT '运行环境',
  `down_money` double(6,2) DEFAULT '0.00',
  `down_input` varchar(255) DEFAULT NULL COMMENT '用户id',
  `down_title` varchar(255) DEFAULT NULL,
  `down_letters` varchar(255) DEFAULT NULL COMMENT '软件拼音',
  `down_icon` varchar(255) DEFAULT NULL COMMENT '小图标',
  `down_version` varchar(255) DEFAULT NULL COMMENT '版本号',
  `jquery_id` int(11) DEFAULT NULL,
  `down_is_pic` tinyint(1) DEFAULT '1',
  `down_dec` varchar(255) DEFAULT NULL COMMENT '版本类型',
  `down_ename` varchar(255) DEFAULT NULL COMMENT '名字拼音',
  PRIMARY KEY (`down_id`),
  KEY `down_cid` (`down_cid`),
  KEY `down_inputer` (`down_inputer`),
  KEY `down_money` (`down_money`),
  KEY `down_hits` (`down_hits`),
  KEY `down_hits_day` (`down_hits_day`),
  KEY `down_status` (`down_status`),
  KEY `down_hits_week` (`down_hits_week`),
  KEY `down_hits_month` (`down_hits_month`),
  KEY `down_addtime` (`down_addtime`),
  KEY `down_name_2` (`down_name`),
  KEY `down_status_2` (`down_status`,`down_cid`,`down_hits_day`),
  KEY `down_cid_2` (`down_status`,`down_cid`,`down_addtime`),
  KEY `down_name` (`down_status`,`down_name`,`down_id`),
  KEY `down_status_3` (`down_status`,`down_cid`,`down_id`),
  KEY `down_status_4` (`down_status`,`down_name`,`down_inputer`),
  KEY `down_status_5` (`down_status`,`down_cid`,`down_addtime`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='下载表';

#
# Data for table "gxl_down"
#

INSERT INTO `gxl_down` VALUES (207,171,'植物大战僵尸：重生','关卡塔防,植物大战僵尸：重生','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/20250113170106_49243.jpg','','','《植物大战僵尸：重生 最新版》这是一款卡通风格的塔防冒险游戏，游戏作者对游戏的重新设计使僵尸更加强大，整合了各种重生内容和变种僵尸，使挑战更加困难。玩家需要制定不同的策略并使用灵活的技术，每种植物都有独特的能力和特点，使游戏更加有趣和具有挑战性。玩家需要使用各种植物的特殊能力来防止不断攻击的僵尸进入房子。这个挑战要求玩家巧妙地选择植物类型和布局，以保护他们的领土免受僵尸攻击，此外还要精心设计关卡和令人兴奋的游戏节奏体验。手游优势1、精美的画面为玩家创造了高清的游戏体验','',2,2,2,2,1740039357,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360064_1','','','','','','64.37MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736758433485789.png','1.0',NULL,1,'最新版',NULL),(208,171,'团队吃鸡对决','飞行射击,团队吃鸡对决','','http://cs.bchongw.com/no.jpg','','','团队吃鸡对决这款游戏拥有丰富的游戏模式和玩法可以选择，让玩家自由开启激烈的射击战斗，还拥有第一人称射击视角和第三人称射击视角的加入，让玩家灵活制定射击战术并展示强大的射击实力，轻松完成困难的射击对决和考验，还能自由完成各种有趣的射击任务来获得奖励，自由开启激烈的射击战斗对决，给玩家带来精彩的射击战斗过程，还拥有丰富的游戏模式也能选择体验，轻松应对各种困难的射击对决，有兴趣的玩家欢迎下载。游戏特色1.场景多样：游戏提供了城市、沙漠荒地、雪山、高原等多种场景。每个场景都有','',0,0,0,0,0,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360066_1','','','','','','45.75MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736758929556757.jpg','8',NULL,1,'',NULL),(209,171,'画线救人','休闲益智,画线救人','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/1736759404397521.jpg','','','画线救人小游戏下载是一款非常有趣的益智游戏，不仅可以让玩家锻炼自己的思维和操作能力，还可以让他们享受游戏带来的乐趣和成就感。游戏的难度会随着游戏的进行而逐渐增加。前几个关卡相对简单，只需要画一条简单的直线去拯救反派。但在后期阶段，需要考虑更多的因素，如重力、障碍物等。感兴趣的朋友们，赶紧下载画线救人体验吧。画线救人画线救人是一款有趣的画线救人游戏。游戏主要以绘制救援线条的玩法为主，玩家可以创造性地绘制线条来面对多种危机场景，合理绘制线条，营救简笔画人物，轻松过','',0,0,0,0,0,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360069_1','','','','','','82.16MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736759408360599.png','1.2',NULL,1,'',NULL),(210,171,'霸总打工记','模拟经营,霸总打工记','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/20250113175354_13236.jpg','','','霸总打工记这是一款趣味十足的模拟游戏，采用简单逼真的2D艺术风格，逼真地再现了农民工的日常生活，从健康状态到情绪波动，反映了生活的起伏。在这个虚拟世界中，玩家将扮演一名新的农民工，在一个全新的城市从事各种职业，逐步建立自己的生活基础，体验社会生存的真正挑战。游戏的故事背景设定在资源稀缺、竞争激烈的环境中，强调即使是那些出生在贫困中的人也可以通过不懈的努力改变自己的命运。手游特色1、霸总打工记游戏之中扮演一个盛气凌人的CEO，体验从低级员工一步步成长为商业巨头的传奇人生','',0,0,0,0,0,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360074_1','','','','','','104.55MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736761820985743.png','1.0.0',NULL,1,'',NULL),(211,171,'神州风闻录','卡牌策略,神州风闻录','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/20250113175627_82377.jpg','','','神州风闻录 最新版是一款以中国传统文化为基础的角色扮演奇幻游戏，其核心玩法主要是探索解谜，结合角色扮演元素，在游戏中玩家需要扮演主角，在广袤的中国大陆上冒险，解决各种神秘事件，同时与其他npc互动，完成各种任务，游戏画面优美，音乐优美，充满了浓郁的中国风，给玩家带来了非常独特的游戏体验，感兴趣的玩家可以下载试一试。游戏基本内容描述1、超萌治仆、青龙、白虎、朱雀玄武岩，通过bond系统，祭拜神话中的山海。2、创新的发展方式，星升段觉醒的命运，高度自由的技能选择，怀念童年','',0,0,0,0,0,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_359767_1','','','','','','428.54MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736762203817455.jpg','1.3.1',NULL,1,'最新版',NULL),(212,171,'像素火影骨架传奇','格斗街机,像素火影骨架传奇','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg','','','像素火影骨架传奇是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。像素火影骨架传奇亮点技能特效','',0,0,0,0,0,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360075_1','','','','','','279.74MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736762311237980.png','1.16',NULL,1,'',NULL),(213,171,'欢乐摩托车特技赛','赛车竞速,欢乐摩托车特技赛','','http://cs.bchongw.com/no.jpg','','','欢乐摩托车特技赛是一款非常耐玩的摩托车竞速游戏，在游戏中可以让玩家自由操控摩托车并自由改装升级，轻松完成困难的赛车竞速对决和比赛，还可以自由拾取地图中的各种道具，灵活自由使用来超越对手完成各种困难的考验，轻松赢得胜利和冠军，还拥有各种独特的地图关卡和赛道，让玩家自由提升赛车实力和技术来应对各种有趣的挑战，自由完成各种精彩的赛车竞速任务，自由获得丰富的奖励，还拥有很多游戏模式也能选择体验。游戏特色1.真实赛道场景：游戏还原了现实世界中的著名赛道，采用高度精细的摩托车模型','',0,0,0,0,0,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360059_1','','','','','','61.15MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736757429103850.png','1.2',NULL,1,'',NULL),(214,171,'粘土彩泥模拟器','模拟经营,粘土彩泥模拟器','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/1736757537962924.jpg','','','粘土彩泥模拟器是一款极其有意思的粘土小游戏！粘土彩泥模拟器游戏提供了各种各样的粘土供你选择，玩法和操作也很简单，没有规则，你可以尝试各种不同的游戏模式，将粘土揉成你最喜欢的形状，并在粘土中添加闪光、微球和其他添加剂，使其看起来更有趣；在挤压粘土时，游戏会发出舒适的ASMR声音，可以有效缓解生活和工作中的压力和焦虑，快来释放你的创造力，创造一个只属于你的精致粘土模型！粘土彩泥模拟器描述1.缓解压力和焦虑2.优美的ASMR音效，适合冥想和睡眠。3.制作自己的粘土：添加不同','',0,0,0,0,0,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360058_1','','','','','','53.25MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736757531643629.png','1.2.7',NULL,1,'',NULL),(215,171,'魔女的商店','模拟经营,魔女的商店','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/20250113164625_78276.jpg','','','魔女的商店需要收集和合成魔法物品，解锁新的配方，提高你的技能，并运行你的商店，每个魔法物品都有独特的属性和效果，你可以将它们组合起来创造出令人惊叹的商品，你的决定会影响顾客的满意度和你的商店的声誉，所以你需要仔细规划和管理你的资源，玩家将商店的老板收集各种魔法物品来合成，卖给有需要的顾客，还可以解锁新的处方，招募各种女巫为你工作，升级商店可以有额外的功能，感兴趣的小伙伴欢迎点击下载下来吧。魔女的商店亮点1、在任务中击败敌人并获得道具，在商店中出售你所获得的道具。2、魔','',4,4,4,4,1740038816,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_360062_1','','','','','','96.67MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736757998500002.jpg','2.0.1',NULL,1,'',NULL),(216,171,'悟饭游戏平台','游戏辅助,悟饭游戏平台','','http://cs.bchongw.com/Uploads/down_pic/ac8df0414de4c47566236bfd36b52fbd/20250113165608_94435.png','','','悟饭游戏平台是专门为用户设计的游戏模拟器，支持街机、GBA、PSP、FC等各种游戏。现在，您可以在电脑上与朋友在线玩《拳王》、《三国演义》或各种GBA游戏。如果你喜欢，现在就下载吧!为了让更多的玩家体验游戏带来的多样化乐趣，除了经典的掌上游戏机和经典游戏外，还有包括手机游戏在内的多个其他兴趣群体。目前，五帆游戏拥有数百万用户和忠实粉丝。他们每天在社区里自由交流。为了回馈粉丝，悟饭游戏平台偶尔会为社区粉丝提供各种周边福利。悟饭游戏平台特色1.最强大的在线战斗平台2.一站','',1,1,1,1,1740037310,0,1,0,0,'','',1740039351,'',0.0,0,'','','','https://down.wsyhn.com/1_204702_1','','','','','','48.73MB',NULL,'中文','安卓',0.00,NULL,NULL,NULL,'http://cs.bchongw.com/Uploads/down_icon/ac8df0414de4c47566236bfd36b52fbd/1736758556986575.png','5.0.5.0',NULL,1,'',NULL);

#
# Structure for table "gxl_down_all"
#

DROP TABLE IF EXISTS `gxl_down_all`;
CREATE TABLE `gxl_down_all` (
  `id` int(10) unsigned NOT NULL,
  `down_id` int(11) NOT NULL DEFAULT '0',
  `down_content` longtext,
  `down_name` varchar(255) DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `down_picall` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "gxl_down_all"
#

INSERT INTO `gxl_down_all` VALUES (0,207,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\">《<strong>植物大战僵尸：重生 最新版</strong>》这是一款卡通风格的塔防冒险游戏，游戏作者对游戏的重新设计使僵尸更加强大，整合了各种重生内容和变种僵尸，使挑战更加困难。玩家需要制定不同的策略并使用灵活的技术，每种植物都有独特的能力和特点，使游戏更加有趣和具有挑战性。玩家需要使用各种植物的特殊能力来防止不断攻击的僵尸进入房子。这个挑战要求玩家巧妙地选择植物类型和布局，以保护他们的领土免受僵尸攻击，此外还要精心设计关卡和令人兴奋的游戏节奏体验。</p><h3>手游优势</h3><p style=\"text-indent:2em;\">1、精美的画面为玩家创造了高清的游戏体验，为经典的塔防游戏带来了全新的元素和挑战，整个策略玩法机制很有趣。</p><p style=\"text-indent:2em;\">2、尝试不同寻常的游戏玩法和故事情节，将比原来更难，加上各种变体和特殊植物解锁，带给玩家最棒塔防对抗体验。</p><p style=\"text-indent:2em;\">3、有很多关卡等着你去挑战，这些关卡都是比较容易的，但是之后会变得比较难，所以这款游戏的体验非常丰富操作。</p><p style=\"text-indent:2em;\">4、策略游戏内容增加了游戏间的可玩性。在玩游戏的时候，整体操作比较流畅，有趣的游戏内容给你完美的游戏体验。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113170106_49243.jpg\" /> </p><h3>手游特点</h3><p style=\"text-indent:2em;\">1、新的内容等着你选择，创意游戏内容为你提供完美的享受，还有很多关卡等着你挑战。一开始，这些级别相对简单。</p><p style=\"text-indent:2em;\">2、这个游戏的操作相对简单，但战略游戏内容增加了游戏之间的可玩性，这里的整体操作相对容易，展现玩家的技巧。</p><p style=\"text-indent:2em;\">3、有趣的游戏内容为您提供完美的游戏体验，全新的转世版本等着您选择。创意游戏内容为您带来完美享受进行对抗。</p><p style=\"text-indent:2em;\">4、玩家可以自由选择要展示的植物，可以自己选择，只需点击即可开始挑战，为早期部署做好准备，并制定相关计划。</p><h3>植物大战僵尸：重生游戏玩法教程</h3><p style=\"text-indent:2em;\">1、进入游戏经典冒险模式，开始关卡</p><p align=\"center\"><img alt=\"\" src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736758891482.png\" /> </p><p style=\"text-indent:2em;\">2、选择植物，这次僵尸是从屋子里出来的</p><p align=\"center\"><img alt=\"\" src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736758891138.png\" /> </p><p style=\"text-indent:2em;\">3、僵尸的类型有了新的改变，注意应对!</p><p align=\"center\"><img alt=\"\" src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736758891273.jpg\" /> </p><p style=\"text-indent:2em;\">4、难度有所提高，在第一关就会出现植物僵尸和撑杆僵尸。</p><p align=\"center\"><img alt=\"\" src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736758891550.png\" /> </p><p style=\"text-indent:2em;\">5、前期当我们遇到下方的植物僵尸时，只能通过窝瓜和炸弹一类的植物来抵挡，最好是提前消灭，不然会破坏我们的阵型</p><p align=\"center\"><img alt=\"\" src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736758891247.jpg\" /> </p><p align=\"center\"><img alt=\"\" src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736758891864.jpg\" /> </p><p style=\"text-indent:2em;\">6、小推车是我们最后的保障，在压力最大的时候合理使用</p><p style=\"text-indent:2em;\">9、随着关卡推进，后面解锁的植物也是各种变种和特殊植物，去游戏里一探究竟吧!</p><h3>手游点评</h3><p style=\"text-indent:2em;\">基于植物大战僵尸原版的修改版本，大大增强了僵尸的特征。僵尸不仅增加了新的装备和技能，而且有些僵尸在被杀死后还会重生。进入冒险级别，其他游戏玩法与植物战士的灵活部署是一致的。游戏具有高度的战略性质，每个战术命令都很重要。你需要展示你的智慧，并与各种卡通僵尸作斗争。</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','植物大战僵尸：重生','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,208,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>团队吃鸡对决</strong>这款游戏拥有丰富的游戏模式和玩法可以选择，让玩家自由开启激烈的射击战斗，还拥有第一人称射击视角和第三人称射击视角的加入，让玩家灵活制定射击战术并展示强大的射击实力，轻松完成困难的射击对决和考验，还能自由完成各种有趣的射击任务来获得奖励，自由开启激烈的射击战斗对决，给玩家带来精彩的射击战斗过程，还拥有丰富的游戏模式也能选择体验，轻松应对各种困难的射击对决，有兴趣的玩家欢迎下载。</p><h3>游戏特色</h3><p style=\"text-indent:2em;\">1.场景多样：游戏提供了城市、沙漠荒地、雪山、高原等多种场景。每个场景都有独特的地形和障碍；</p><p style=\"text-indent:2em;\">2.逼真的战斗体验：逼真的图形和物理效果让您感受到真实的射击和爆炸效果，即时的战斗反应让您沉浸在激烈的战斗中；</p><p style=\"text-indent:2em;\">3.多样化的武器装备：多种武器装备，包括步枪、手枪、狙击枪和榴弹发射器，每种武器装备都有独特的功能和用途。</p><h3>游戏亮点</h3><p style=\"text-indent:2em;\">1.灵活的战斗方式：游戏提供精确的控制和灵活的移动，让玩家可以自由选择近战、伏击、攻城等战斗策略；</p><p style=\"text-indent:2em;\">2.多种模式：除了经典的战斗模式外，游戏还提供了多种模式，玩家可以根据自己的喜好选择不同的体验；</p><p style=\"text-indent:2em;\">3.个性化装扮：玩家可以自定义角色的外观，选择多种时尚服装和装备，展现自己的风格和个性。</p><h3>游戏优势</h3><p style=\"text-indent:2em;\">1.战略战术：想要在游戏中获胜，需要根据不同的战场和敌人的行为制定合理的战术和策略；</p><p style=\"text-indent:2em;\">2.成就和排名系统：游戏中有成就和排名系统。你可以通过挑战更高的成就和排名来展示你的实力和成就；</p><p style=\"text-indent:2em;\">3.画质细腻细腻：游戏采用高清画质和细腻的纹理来表现战后的废墟和贫瘠的土地，给玩家真实的战争景观体验。</p><h3>游戏玩法</h3><p style=\"text-indent:2em;\">1.真实的枪战体验：利用真实的物理引擎技术赋予枪战和战斗场景真实的效果，让您享受真实的枪战体验；</p><p style=\"text-indent:2em;\">2.丰富多样的场景：王牌任务英雄传奇游戏提供了众多的冒险场景，每个场景都有独特的挑战和任务，给你不断的新奇和刺激；</p><p style=\"text-indent:2em;\">3.多样化的武器选择：提供丰富的射击武器，包括手枪、步枪和狙击枪，根据不同的战斗情况选择最适合的武器。</p><h3>编辑测评</h3><p style=\"text-indent:2em;\">这款游戏提供的战斗过程紧张刺激，需要玩家时刻保持警惕，快速反应，展现战术智慧，轻松应对各种困难的考验，给玩家带来激烈的射击战斗对决，还能体验各种有趣的射击战斗内容。</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','团队吃鸡对决','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,209,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>画线救人小游戏下载</strong>是一款非常有趣的益智游戏，不仅可以让玩家锻炼自己的思维和操作能力，还可以让他们享受游戏带来的乐趣和成就感。游戏的难度会随着游戏的进行而逐渐增加。前几个关卡相对简单，只需要画一条简单的直线去拯救反派。但在后期阶段，需要考虑更多的因素，如重力、障碍物等。感兴趣的朋友们，赶紧下载画线救人体验吧。</p><h3>画线救人游戏介绍</h3><p style=\"text-indent:2em;\">画线救人是一款有趣的画线救人游戏。游戏主要以绘制救援线条的玩法为主，玩家可以创造性地绘制线条来面对多种危机场景，合理绘制线条，营救简笔画人物，轻松过关，随时度过休闲时光。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736759404397521.jpg\" width=\"262\" height=\"466\" alt=\"\" /></p><h3>画线救人游戏特色</h3><p style=\"text-indent:2em;\">游戏里包含了海量烧脑关卡等你解谜，在这里玩家的目标只有一个，那就是保护火柴人。</p><p style=\"text-indent:2em;\">具体操作很简单，只要画一条线，就有旋转的齿轮，点燃的炸弹，每一关都有数以万计的危险展开。</p><p style=\"text-indent:2em;\">想要通关全关卡，你需要尝尝逆向思考，使用不同的方式，来使用意料之外的合理方式帮助火柴人。</p><p style=\"text-indent:2em;\">游戏涵盖上百个关卡，迫切需要你用线条画来解决大型创意谜题。</p><h3>画线救人游戏亮点</h3><p style=\"text-indent:2em;\">丰富的游戏内容，让玩家在游戏中享受更多乐趣。</p><p style=\"text-indent:2em;\">这个游戏也很容易操作，可以很快掌握，运行顺利。</p><p style=\"text-indent:2em;\">里面还有很多令人兴奋的地方等着你去探索，同时也面临着各种各样的危险。</p><p style=\"text-indent:2em;\">在游戏过程中，还有有趣的音效，给玩家带来独特而刺激的体验。</p><h3>画线救人游戏说明</h3><p style=\"text-indent:2em;\">游戏的玩法简单，玩家只需要使用手中的画笔，画出线条解救游戏中的人物，即可达成游戏胜利，获得游戏奖励。</p><p style=\"text-indent:2em;\">在游戏里关卡繁多，关卡的难度是逐层递增，玩家需要画好线条，帮助人物躲避危险，要注意用线条完全保护好人物。</p><p style=\"text-indent:2em;\">整体画面清晰，游戏的整体构造全部都是用线条来构造的，让玩家可以体验不同的游戏感官。</p><p style=\"text-indent:2em;\">玩家在关卡挑战中的玩法是不限的，过关方式繁多，不规定玩家闯关方式，玩家可以选择自己喜欢的方式进行闯关。</p><h3>画线救人游戏点评</h3><p style=\"text-indent:2em;\">游戏的整体玩法简单，玩家需要绘制线条，帮助游戏人物来躲避游戏中的危险，从而达成游戏关卡胜利。</p><p style=\"text-indent:2em;\">在游戏中，游戏的关卡繁多，难度是逐层递增的，游戏让玩家体验烧脑的游戏模式。</p><p style=\"text-indent:2em;\">整体画面高清，关卡内的道具繁多，玩家可以利用过关奖励，来换取游戏中的道具，帮助玩家闯关。</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','画线救人','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,210,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>霸总打工记</strong>这是一款趣味十足的模拟游戏，采用简单逼真的2D艺术风格，逼真地再现了农民工的日常生活，从健康状态到情绪波动，反映了生活的起伏。在这个虚拟世界中，玩家将扮演一名新的农民工，在一个全新的城市从事各种职业，逐步建立自己的生活基础，体验社会生存的真正挑战。游戏的故事背景设定在资源稀缺、竞争激烈的环境中，强调即使是那些出生在贫困中的人也可以通过不懈的努力改变自己的命运。</p><h3>手游特色</h3><p style=\"text-indent:2em;\">1、霸总打工记游戏之中扮演一个盛气凌人的CEO，体验从低级员工一步步成长为商业巨头的传奇人生。</p><p style=\"text-indent:2em;\">2、现实还原职场生活，玩家需要面对各种挑战和机遇，体验职场斗争的起起落落。将浪漫的爱情故事融入游戏中，玩家可以遇到不同的角色，体验甜蜜的爱情。</p><p style=\"text-indent:2em;\">3、这里的玩家小伙伴们需要经营自己的公司，招聘员工，开发产品，拓展市场，建立自己的商业帝国。</p><p style=\"text-indent:2em;\">4、通过完成任务、参与活动等方式，玩家可以提升角色的属性和技能，增强公司的竞争力。即使离线，玩家仍然可以轻松赚钱。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175354_13236.jpg\" width=\"300\" height=\"500\" alt=\"\" /></p><h3>手游亮点</h3><p style=\"text-indent:2em;\">1、霸总打工记采用精致的视觉表现，生动地描绘人物、场景、道具等细节，为玩家提供视觉享受。</p><p style=\"text-indent:2em;\">2、音效轻松愉悦，如背景音乐、角色对话和操作音效，营造出轻松随意的游戏氛围，增强玩家的游戏体验。</p><p style=\"text-indent:2em;\">3、拥有丰富的主线故事情节，玩家可以跟随情节的发展来体验激动人心的故事情节。探索隐藏的游戏内容，并获得丰厚的奖励。</p><p style=\"text-indent:2em;\">4、你可以与游戏中的角色互动，比如聊天、送礼、约会等，让我和小伙伴轻松体验不同的情节发展和生活选择。</p><h3>霸总打工记小游戏介绍</h3><p style=\"text-indent:2em;\">一款模拟经营类的角色扮演游戏，在游戏当中面对人生中的各种困难，感受如何经营。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175001_26869.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">解锁逆袭剧本从小摊位开始经营，一步步经商逆袭，积攒资本成功逆袭成为霸总。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175007_96202.jpg\" alt=\"\" /></p><h3>玩家评价</h3><p style=\"text-indent:2em;\">玩家将从街头小贩做起，努力打拼，积累经验和资本，逐步爬上商业大亨之位。每一项任务和决策都会影响未来的发展，随着不断成长，他们可以创办自己的公司，享受豪车和别墅带来的荣耀。游戏提供了多种职业道路，从街头小贩到公司CEO，每种职业都有各自的挑战和机遇，玩家可以根据自己的选择积累经验和财富</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','霸总打工记','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,211,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>神州风闻录 最新版</strong>是一款以中国传统文化为基础的角色扮演奇幻游戏，其核心玩法主要是探索解谜，结合角色扮演元素，在游戏中玩家需要扮演主角，在广袤的中国大陆上冒险，解决各种神秘事件，同时与其他npc互动，完成各种任务，游戏画面优美，音乐优美，充满了浓郁的中国风，给玩家带来了非常独特的游戏体验，感兴趣的玩家可以下载试一试。</p><h3>游戏基本内容描述</h3><p style=\"text-indent:2em;\">1、超萌治仆、青龙、白虎、朱雀玄武岩，通过bond系统，祭拜神话中的山海。</p><p style=\"text-indent:2em;\">2、创新的发展方式，星升段觉醒的命运，高度自由的技能选择，怀念童年飞翔的梦想。</p><p style=\"text-indent:2em;\">3、多种提升路线，昆仑神话探险，日常登陆不再枯燥，突破自我威望。</p><p style=\"text-indent:2em;\">4、神州风闻录 最新版全服务互动系统，实时排位拒绝单机，游戏不在情，爆发中国。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175627_82377.jpg\" width=\"400\" height=\"225\" title=\"丰富的道具等你领取\" alt=\"丰富的道具等你领取\" /> </p><h3>丰富的道具等你领取</h3><p style=\"text-indent:2em;\">1、服装可以提供给玩家角色使用，让角色拥有光鲜亮丽的外表，成为人物的焦点。</p><p style=\"text-indent:2em;\">2、在神州风闻录 最新版游戏中，玩家可以有效地交易数千种道具，从而轻松获得所需道具。</p><p style=\"text-indent:2em;\">3、玩家可以实时与其他具有相似气质的玩家交朋友，并在适当的时候组队迎接挑战。</p><p style=\"text-indent:2em;\">4、指尖灵活的PK挑战方式带来更多惊喜，顶级物理引擎打造流畅的竞技活动。</p><h3>游戏剧情十分精彩</h3><p style=\"text-indent:2em;\">1、玩仙峡三界，垂直九州大陆，实现人生的逆袭，遇到更多的惊喜一起翱翔。</p><p style=\"text-indent:2em;\">2、原版童话故事给你最精彩的体验，有很多职业供你选择，玩法多样，令人惊喜。</p><p style=\"text-indent:2em;\">3、神州风闻录 最新版游戏画面细腻细腻，声音生动优美，为玩家提供了非常好的游戏体验。</p><p style=\"text-indent:2em;\">4、游戏中有大量的免费探索区域，玩家可以自由探索游戏，发现隐藏的宝藏和秘密。</p><h3>神州风闻录 最新版游戏测评</h3><p style=\"text-indent:2em;\">1、神州风闻录 最新版游戏中有多种方式，玩家可以培养和提高角色的能力，使自己在游戏中更加强大。</p><p style=\"text-indent:2em;\">2、游戏以中国古代神话为背景，拥有丰富的故事和人物设定，让玩家深入了解中国传统文化。</p><p style=\"text-indent:2em;\">3、游戏中有大量的英雄供玩家选择，每个英雄都有自己独特的能力和技能，增加了游戏的乐趣。</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','神州风闻录','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,212,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>像素火影骨架传奇</strong>是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。</p><h3>像素火影骨架传奇亮点</h3><p style=\"text-indent:2em;\">技能特效设计炫目，每个技能都有自己独特的光影效果，让玩家在战斗时充分感受到技能释放的震撼。</p><p style=\"text-indent:2em;\">有一个扣人心弦的故事，通过一系列的任务和情节线索，将逐渐揭开游戏世界的秘密，并越来越接近火影忍者骷髅版的真相。</p><p style=\"text-indent:2em;\">游戏中有许多任务、副本和活动等着玩家去挑战。无论你是想挑战强大的敌人还是追求更高水平的战斗力，总有一种方法适合你。</p><p style=\"text-indent:2em;\">像素火影骨架传奇采用独特的像素画风，呈现出独特的游戏世界。简洁精致的画面，带给玩家全新的视觉享受。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg\" /></p><h3>像素火影骨架传奇特色</h3><p style=\"text-indent:2em;\">通过游戏中的挑战和战斗，获得经验和物品来提高你的角色的能力，增强的能力将帮助你更好地应对日益强大的敌人。</p><p style=\"text-indent:2em;\">各种各样的关卡类型，有令人兴奋的战斗关卡，精彩的平台跳跃关卡，解谜关卡等等。每个关卡都有独特的挑战和玩法，不会让你感到无聊。</p><p style=\"text-indent:2em;\">像素火影骨架传奇有许多不同类型的角色供玩家选择，每个角色都有独特的技能和战斗风格，选择最适合你的角色来击败强大的敌人。</p><p style=\"text-indent:2em;\">精心设计的丰富多样的格斗技巧和连击系统，让你享受流畅刺激的格斗体验，通过不同的技能组合，创造无与伦比的连击和杀死敌人。</p><h3>像素火影骨架传奇特点</h3><p style=\"text-indent:2em;\">提供战场模式，与其他玩家进行在线对战，展示自己的格斗技巧，与好友交流，共同进步。</p><p style=\"text-indent:2em;\">震撼的视觉效果让玩家感受顶级的战斗魅力，巧妙的操作感受高品质的实力竞争。</p><p style=\"text-indent:2em;\">丰富的角色和多样的战斗玩法，充分满足不同的战斗需求，巧妙的操作，感受高品质的实力竞争。</p><p style=\"text-indent:2em;\">像素火影骨架传奇合理的操作尝试击败不同的对手，享受在手机上高品质战斗玩法的魅力。</p><h3>像素火影骨架传奇游戏评价</h3><p style=\"text-indent:2em;\">像素火影骨架传奇玩家可以随时享受自由的战斗玩法，具有独特战斗魅力的手游，提供了简单的操作方式，配合易上手易上手的玩法设计，真正让玩家能够时刻感受到高品质独特的战斗体验，玩家可以自由操作喜欢的角色展开横版的动作格斗实力比拼手游。游戏具有高品质的动作操作感，操作简单上手，充分满足不同的格斗需求，可以尝试通过合理的操作完成不同强度的比赛。</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','像素火影骨架传奇','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,213,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>欢乐摩托车特技赛</strong>是一款非常耐玩的摩托车竞速游戏，在游戏中可以让玩家自由操控摩托车并自由改装升级，轻松完成困难的赛车竞速对决和比赛，还可以自由拾取地图中的各种道具，灵活自由使用来超越对手完成各种困难的考验，轻松赢得胜利和冠军，还拥有各种独特的地图关卡和赛道，让玩家自由提升赛车实力和技术来应对各种有趣的挑战，自由完成各种精彩的赛车竞速任务，自由获得丰富的奖励，还拥有很多游戏模式也能选择体验。</p><h3>游戏特色</h3><p style=\"text-indent:2em;\">1.真实赛道场景：游戏还原了现实世界中的著名赛道，采用高度精细的摩托车模型，让玩家沉浸在赛道上飞驰的刺激和乐趣；</p><p style=\"text-indent:2em;\">2.游戏模式丰富多样：游戏提供多种不同的游戏模式，包括竞速模式、追击模式、闯关模式等，满足玩家不同的游戏喜好和挑战需求；</p><p style=\"text-indent:2em;\">3.个性化的车辆和装备系统：可以通过游戏中的进阶系统升级摩托车的性能，解锁更强大的车辆和装备，自由完成各种考验。</p><h3>游戏优势</h3><p style=\"text-indent:2em;\">1.刺激的赛车体验：本游戏采用先进的物理引擎和优化的控制系统，让玩家真正感受到高速驾驶的快感；</p><p style=\"text-indent:2em;\">2.多人在线竞技对战：世界各地的对手激烈角逐，体验真正的PK乐趣，你可以结交更多的朋友，一起组队或互相PK；</p><p style=\"text-indent:2em;\">3.高度自由的定制系统：玩家可以根据自己的喜好自由搭配、装扮。个性化的摩托车速度让玩家在比赛中脱颖而出。</p><h3>游戏玩法</h3><p style=\"text-indent:2em;\">1.操作简单易上手：玩家通过屏幕上的虚拟按钮控制摩托车的加速、制动和转向。简单直观的操作让玩家轻松上手；</p><p style=\"text-indent:2em;\">2.巧妙躲避障碍物：赛道上，玩家需要注意躲避各种障碍物和敌人的攻击，通过灵活的操作和反应能力来保持自己的速度和竞争优势；</p><p style=\"text-indent:2em;\">3.高级驾驶技巧：游戏还有一些特殊的道具和技巧。玩家可以学习并使用这些技能来提高速度、攻击敌人或保护自己。</p><h3>游戏亮点</h3><p style=\"text-indent:2em;\">1.丰富的游戏模式：提供多种不同的游戏模式，包括单人竞速、多人对战、挑战模式等，自由完成各种挑战；</p><p style=\"text-indent:2em;\">2.强大的改装系统：游戏提供了丰富的改装选项。玩家可以根据自己的喜好调整车辆的外观和性能；</p><p style=\"text-indent:2em;\">3.摩托车选择多样：提供多种不同类型的摩托车供玩家选择，包括经典街车、越野车、超级跑车。</p><h3>编辑测评</h3><p style=\"text-indent:2em;\">这款游戏可以自由通过完成特定的动作和技能来获得额外的积分和奖励，还可以表演后空翻、前滚、跳跃等特技来展示自己的驾驶技巧和勇气，轻松完成各种困难的摩托车竞速对决，随时体验各种有趣的赛车内容。</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','欢乐摩托车特技赛','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,214,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>粘土彩泥模拟器</strong>是一款极其有意思的粘土小游戏！粘土彩泥模拟器游戏提供了各种各样的粘土供你选择，玩法和操作也很简单，没有规则，你可以尝试各种不同的游戏模式，将粘土揉成你最喜欢的形状，并在粘土中添加闪光、微球和其他添加剂，使其看起来更有趣；在挤压粘土时，游戏会发出舒适的ASMR声音，可以有效缓解生活和工作中的压力和焦虑，快来释放你的创造力，创造一个只属于你的精致粘土模型！</p><h3>粘土彩泥模拟器描述</h3><p style=\"text-indent:2em;\">1.缓解压力和焦虑</p><p style=\"text-indent:2em;\">2.优美的ASMR音效，适合冥想和睡眠。</p><p style=\"text-indent:2em;\">3.制作自己的粘土：添加不同的产品来实现新的颜色和质地，如食用色素、闪光、泡沫珠、珍珠鱼缸、假雪等!你可以用你的想象力来定制它们!</p><p style=\"text-indent:2em;\">4.添加了许多聚合物粘土棒：添加到粘液中的完美选择!有简单的水果，甚至还有可爱的角色!</p><p style=\"text-indent:2em;\">5.说出你自己的黏液云、彩虹、蓬松、黄油、光滑、金属、泡沫泥的名字!</p><p style=\"text-indent:2em;\">6.满足粘液声音：不同类型的粘液会产生不同的ASMR声音。你可以戳、戳、旋转和按压它们!</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757537962924.jpg\" /></p><h3>粘土彩泥模拟器说明</h3><p style=\"text-indent:2em;\">游戏画面不错，配色也很棒。</p><p style=\"text-indent:2em;\">里面道具竞争模式的游戏玩法非常愉快。快来用道具快速通过关卡。</p><p style=\"text-indent:2em;\">操作模式非常简单易行，任何人都可以轻松上手。</p><p style=\"text-indent:2em;\">图像的极简主义风格，搭配丰富多彩的颜料调整，可以带来出色的视觉效果。</p><p style=\"text-indent:2em;\">体验真实的制作过程，整个游戏玩法也相对免费。</p><p style=\"text-indent:2em;\">在手机上玩，你不必担心弄脏手。</p><h3>粘土彩泥模拟器内容</h3><p style=\"text-indent:2em;\">1.你需要把粘土混合好，用自己的智慧和创造力创造出令人惊叹的作品。</p><p style=\"text-indent:2em;\">2.有很多有趣和具有挑战性的游戏模式，以及各种DIY粘土比赛等着你尽情挑战。</p><p style=\"text-indent:2em;\">3.您可以将制作粘土的短视频发送给朋友，以便更多人可以对您的创作进行评分。</p><p style=\"text-indent:2em;\">4.自由配置和制作粘土的方法很容易用手指操作，揉捏游戏非常正式。</p><h3>粘土彩泥模拟器特色</h3><p style=\"text-indent:2em;\">1.完成各种任务，解锁更多工具，使用更多道具进行模拟。</p><p style=\"text-indent:2em;\">2.你可以自己制作各种类型和形状的粘土，你可以自由地揉捏和压制粘土。</p><p style=\"text-indent:2em;\">3.让你在压碎粘土时发出的声音满足你的听觉，创造全新的粘土并与你的朋友分享。</p><p style=\"text-indent:2em;\">4.游戏中有很多不同颜色的水晶粘土，根据您的喜好选择。</p><h3>粘土彩泥模拟器创建粘土操作方法</h3><p style=\"text-indent:2em;\">1、点击创建粘土；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757544914.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">2、选择搅拌机；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757544730.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">3、选择粘土类型；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757544853.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">4、添加胶水；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545149.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">5、选择粘土颜色；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545753.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">6、添加粘土颜色；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545137.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">7、添加发光颜料；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545758.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">8、选择粘土装饰；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545522.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">9、添加粘土装饰；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545581.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">10、命名并保存粘土；</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545507.jpg\" alt=\"\" /></p><p style=\"text-indent:2em;\">11、选择粘土模式(冻结、缓慢复原、快速复原)和粘土模型后，开始捏粘土吧！</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/1736757545906.jpg\" alt=\"\" /></p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','粘土彩泥模拟器','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,215,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>魔女的商店</strong>需要收集和合成魔法物品，解锁新的配方，提高你的技能，并运行你的商店，每个魔法物品都有独特的属性和效果，你可以将它们组合起来创造出令人惊叹的商品，你的决定会影响顾客的满意度和你的商店的声誉，所以你需要仔细规划和管理你的资源，玩家将商店的老板收集各种魔法物品来合成，卖给有需要的顾客，还可以解锁新的处方，招募各种女巫为你工作，升级商店可以有额外的功能，感兴趣的小伙伴欢迎点击下载下来吧。</p><h3>魔女的商店亮点</h3><p style=\"text-indent:2em;\">1、在任务中击败敌人并获得道具，在商店中出售你所获得的道具。</p><p style=\"text-indent:2em;\">2、魔女的商店这是一个可爱的游戏，你可以在业余时间轻松玩。</p><p style=\"text-indent:2em;\">3、在任务中击败敌人将获得可以在商店中出售的道具。</p><p style=\"text-indent:2em;\">4、掉落可以装备的武器和盔甲，可能会有高价出售的稀有物品。</p><p align=\"center\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113164625_78276.jpg\" /></p><h3>魔女的商店特色</h3><p style=\"text-indent:2em;\">1、魔女的商店用你赚的钱来升级女巫塞蕾娜，让我们来发展你的商店。</p><p style=\"text-indent:2em;\">2、丰富多样的奇幻场景，玩家可以探索神秘的森林、古老的城堡和神奇的湖泊。</p><p style=\"text-indent:2em;\">3、第一家店可以先开，可以买卖自己低端简单的东西。</p><p style=\"text-indent:2em;\">4、随着自己战斗的不断胜利，才能赢得不同高端商品的上架销售。</p><h3>魔女的商店特点</h3><p style=\"text-indent:2em;\">1、通过交易获得的资源可以升级商店，同时不断提高自己的实力，以对抗更强大的敌人。</p><p style=\"text-indent:2em;\">2、包括魔药、魔法道具、魔法卷轴等魔法商品，让大家可以根据自己的喜好定制商品。</p><p style=\"text-indent:2em;\">3、可以研究各种魔术材料，寻找新的魔术配方，提高商品的质量和效果。</p><p style=\"text-indent:2em;\">4、魔女的商店独特的人物，创意的场景设计，邀请好友一起开店，分享游戏的乐趣。</p><h3>魔女的商店游戏评价</h3><p style=\"text-indent:2em;\">魔女的商店每个顾客都有自己的特点，了解他们的需求和偏好，提供他们所需要的商品和服务，需要根据市场需求和资源制定经营策略，才能在激烈的竞争中脱颖而出，游戏中的关卡设计具有挑战性，需要你运用策略和技能才能过关。</p><p style=\"text-indent:2em;\">策略闯关：9.2</p><p style=\"text-indent:2em;\">经营玩法：8.6</p><p style=\"text-indent:2em;\">玩法体验：9.8</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','魔女的商店','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL),(0,216,'\r\n            <span>游戏介绍</span><p style=\"text-indent:2em;\"><strong>悟饭游戏平台</strong>是专门为用户设计的游戏模拟器，支持街机、GBA、PSP、FC等各种游戏。现在，您可以在电脑上与朋友在线玩《拳王》、《三国演义》或各种GBA游戏。如果你喜欢，现在就下载吧!为了让更多的玩家体验游戏带来的多样化乐趣，除了经典的掌上游戏机和经典游戏外，还有包括手机游戏在内的多个其他兴趣群体。目前，五帆游戏拥有数百万用户和忠实粉丝。他们每天在社区里自由交流。为了回馈粉丝，悟饭游戏平台偶尔会为社区粉丝提供各种周边福利。<p style=\"text-align:center;\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113165608_94435.png\" alt=\"\" /></p></p><h3>悟饭游戏平台特色</h3><p style=\"text-indent:2em;\">1.最强大的在线战斗平台</p><p style=\"text-indent:2em;\">2.一站式享受经典电子游戏</p><p style=\"text-indent:2em;\">3.数百万粉丝对质量的信任</p><p style=\"text-indent:2em;\">4.发现大量优质游戏</p><h3>悟饭游戏平台亮点</h3><p style=\"text-indent:2em;\">1.可以随意玩的大量经典免费游戏。</p><p style=\"text-indent:2em;\">2.播放悟饭精选的游戏内容，带您发现越来越多有趣的游戏。</p><p style=\"text-indent:2em;\">3.现在流行的游戏，如《旅行青蛙》和《荒野行动》，都可以免费体验。<p style=\"text-align:center;\"><img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113165615_89328.png\" alt=\"\" /></p></p><h3>悟饭游戏平台优势</h3><p style=\"text-indent:2em;\">1.这是一个基于经典游戏爱好的玩家社区。聚集了大批经典街机、GBA、PSP、FC、PSP等游戏爱好者。</p><p style=\"text-indent:2em;\">2.玩家可以交流游戏体验，互相推荐有趣的游戏。选择一个你感兴趣的游戏主题，并展示你想观看的内容。</p><p style=\"text-indent:2em;\">3.海量经典和流行游戏带你回到童年的快乐，实时在线游戏战斗和PK决斗。</p><p style=\"text-indent:2em;\">4.优化游戏操作体验，享受惊险刺激的冲击感;Wufan社区带来了各种游戏主题，让聊天变得轻松流畅。</p><p style=\"text-indent:2em;\">5.收集大量流行的经典游戏，用于实时在线游戏战斗。优化的游戏控制，愉快的游戏体验。</p><h3>悟饭游戏平台测评</h3><p style=\"text-indent:2em;\">一站式服务，保证让您满意!此外，该软件还支持金手指和一键技能，让玩家享受游戏带来的流畅体验。此外，一键技能大大简化了玩家的操作，使玩家不需要疯狂地点击来摩擦动作，这可以有效地缓解手指疲劳，可以说是非常人性化的。在五凡游戏厅的移动版中，您可以发现属于您的数千款游戏，包括软件支持、独特的战斗系统和自主开发的模拟器工具应用程序，可以为玩家提供非凡的游戏体验!</p>                                                <p style=\"text-indent:2em;\">                                    </p>                ','悟饭游戏平台','2025-02-20 15:36:12','2025-02-20 16:15:51',NULL);

#
# Structure for table "gxl_gb"
#

DROP TABLE IF EXISTS `gxl_gb`;
CREATE TABLE `gxl_gb` (
  `gb_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `gb_cid` mediumint(9) NOT NULL DEFAULT '0',
  `gb_uid` mediumint(9) NOT NULL DEFAULT '1',
  `gb_content` text NOT NULL,
  `gb_intro` text NOT NULL,
  `gb_addtime` int(11) NOT NULL,
  `gb_ip` varchar(20) NOT NULL,
  `gb_oid` tinyint(1) NOT NULL DEFAULT '0',
  `gb_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_gb"
#


#
# Structure for table "gxl_group"
#

DROP TABLE IF EXISTS `gxl_group`;
CREATE TABLE `gxl_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '级别名称',
  `groupid` tinyint(1) DEFAULT NULL COMMENT '管理id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户级别表';

#
# Data for table "gxl_group"
#

INSERT INTO `gxl_group` VALUES (1,'机构号',3),(2,'个人号',2),(3,'普通会员',1);

#
# Structure for table "gxl_guestbook"
#

DROP TABLE IF EXISTS `gxl_guestbook`;
CREATE TABLE `gxl_guestbook` (
  `gb_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `gb_cid` mediumint(9) NOT NULL DEFAULT '0',
  `gb_uid` mediumint(9) NOT NULL DEFAULT '1',
  `nickname` varchar(20) NOT NULL,
  `gb_title` varchar(200) NOT NULL COMMENT '标题',
  `gb_content` text NOT NULL,
  `gb_intro` text NOT NULL,
  `gb_addtime` int(11) NOT NULL,
  `gb_ip` varchar(20) NOT NULL,
  `gb_oid` tinyint(1) NOT NULL DEFAULT '0',
  `gb_status` tinyint(1) NOT NULL DEFAULT '0',
  `gb_down_id` int(11) DEFAULT NULL COMMENT '软件id',
  `gb_type` tinyint(4) DEFAULT '7' COMMENT '报错渠道',
  PRIMARY KEY (`gb_id`),
  KEY `gb_uid` (`gb_uid`),
  KEY `gb_cid` (`gb_cid`),
  KEY `nickname` (`nickname`),
  KEY `gb_addtime` (`gb_addtime`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_guestbook"
#

INSERT INTO `gxl_guestbook` VALUES (67,0,0,'Search Engine','','Hello\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now please visit \r\n\r\nhttps://SearchRegister.org/','',1739033375,'103.135.45.75',0,0,0,7);

#
# Structure for table "gxl_link"
#

DROP TABLE IF EXISTS `gxl_link`;
CREATE TABLE `gxl_link` (
  `link_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) NOT NULL,
  `link_logo` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `link_order` tinyint(4) NOT NULL,
  `link_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_link"
#

INSERT INTO `gxl_link` VALUES (4,'ColorUI','','https://www.txiaw.com/ColorUI/index.html',4,1),(5,'下下网','','http://www.xxiaw.com',5,1),(6,'它下网','','http://www.txiaw.com',6,1);

#
# Structure for table "gxl_list"
#

DROP TABLE IF EXISTS `gxl_list`;
CREATE TABLE `gxl_list` (
  `list_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `list_pid` smallint(6) NOT NULL,
  `list_oid` smallint(6) NOT NULL,
  `list_sid` tinyint(1) NOT NULL,
  `list_name` char(20) NOT NULL,
  `list_skin` char(20) NOT NULL,
  `list_skin_detail` varchar(20) NOT NULL DEFAULT 'pp_vod',
  `list_skin_play` varchar(20) NOT NULL DEFAULT 'pp_play',
  `list_skin_type` varchar(20) NOT NULL DEFAULT 'pp_vodtype',
  `list_dir` varchar(90) NOT NULL,
  `list_status` tinyint(1) NOT NULL DEFAULT '1',
  `list_keywords` varchar(255) NOT NULL,
  `list_title` varchar(50) NOT NULL,
  `list_description` varchar(255) NOT NULL,
  `list_jumpurl` varchar(150) NOT NULL,
  PRIMARY KEY (`list_id`),
  KEY `list_oid` (`list_oid`),
  KEY `list_name` (`list_name`),
  KEY `list_dir` (`list_dir`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_list"
#

INSERT INTO `gxl_list` VALUES (164,0,3,7,'电脑软件','gxl_downlist','gxl_down','pp_play','gxl_type','soft',1,'电脑软件下载,系统工具,绿色软件下载','电脑软件下载_系统工具_绿色软件下载','软件下载栏目精选热门软件,绿色软件下载去广告版,免费软件下载,系统软件下载,破解软件下载等好用的电脑软件！','http://'),(170,0,2,7,'游戏中心','gxl_downlist_yx','gxl_down_yx','pp_play','gxl_type','downgame',1,'单机游戏,独立游戏,游戏补丁,ps4,switch,xbox,模拟器游戏','单机资源下载_一键下载安装游戏资源,辅助工具_硕下网','硕下网资源下载频道有着最新的游戏资源、辅助工具等，提供了高速下载渠道，简单的安装方式，便捷的反馈渠道，玩家可以自由下载、分享、讨论所有的资源','http://'),(171,0,1,7,'安卓游戏','gxl_app_list','gxl_down_app_yx','pp_play','gxl_type','and',1,'安卓app下载，安卓手机游戏下载，安卓应用软件下载','安卓app下载_安卓手机游戏下载_安卓应用软件下载','为用户供最新、最全的安卓软件app和安卓手机游戏，很多app下载下来还需更新才能使用，3DM安卓平台尽量做到把所有的安卓软件和安卓手游更新到最新版本，让用户无需再次下','http://'),(173,0,0,2,'手游攻略','gxl_newslist','gxl_news','pp_play','gxl_type','app_games',1,'手游攻略，攻略教程大全','手游攻略，攻略教程大全','手游攻略为手机游戏玩家提供手机游戏攻略、软件应用教程、网游活动，还有一些游戏视频攻略，希望这些攻略教程可以帮大家解决问题\r\n','http://');

#
# Structure for table "gxl_news"
#

DROP TABLE IF EXISTS `gxl_news`;
CREATE TABLE `gxl_news` (
  `news_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `news_cid` smallint(6) NOT NULL DEFAULT '0',
  `news_name` varchar(255) NOT NULL,
  `news_keywords` varchar(255) NOT NULL,
  `news_color` char(8) NOT NULL,
  `news_pic` varchar(255) NOT NULL,
  `news_inputer` varchar(50) NOT NULL,
  `news_reurl` varchar(255) NOT NULL,
  `news_remark` varchar(255) NOT NULL DEFAULT '',
  `news_hits` mediumint(9) NOT NULL,
  `news_hits_day` mediumint(9) NOT NULL,
  `news_hits_week` mediumint(9) NOT NULL,
  `news_hits_month` mediumint(9) NOT NULL,
  `news_hits_lasttime` int(11) NOT NULL,
  `news_stars` tinyint(1) NOT NULL,
  `news_status` tinyint(1) NOT NULL DEFAULT '1',
  `news_up` mediumint(9) NOT NULL,
  `news_down` mediumint(9) NOT NULL,
  `news_jumpurl` varchar(255) NOT NULL,
  `news_letter` char(2) NOT NULL,
  `news_addtime` int(11) NOT NULL,
  `news_skin` varchar(30) NOT NULL,
  `news_gold` decimal(3,1) NOT NULL,
  `news_golder` smallint(6) NOT NULL,
  `news_input` int(11) DEFAULT NULL,
  `news_ename` varchar(255) DEFAULT NULL COMMENT '名字拼音',
  PRIMARY KEY (`news_id`),
  KEY `news_cid` (`news_cid`),
  KEY `news_up` (`news_up`),
  KEY `news_down` (`news_down`),
  KEY `news_gold` (`news_gold`),
  KEY `news_hits` (`news_hits`,`news_cid`),
  KEY `newslist` (`news_status`,`news_cid`,`news_addtime`),
  KEY `news_cid_list` (`news_status`,`news_cid`),
  KEY `so` (`news_name`,`news_status`)
) ENGINE=InnoDB AUTO_INCREMENT=6711 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_news"
#

INSERT INTO `gxl_news` VALUES (1,173,'《qq飞车》蛇年机甲最划算抽取方法','','颜色','http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg','','https://shouyou.3dmgame.com/gl/552952.html','qq飞车蛇年机甲即将上线，玩家可以通过参与相关充值活动获得这个蛇年机甲，由于部分小伙伴对具体怎么抽比较划算还不太了解，接下来就和小编一起来看看吧。qq飞车蛇年机甲怎么抽最划算参与充值活动抽取最划算。充值福利档位一1、充值金额：648元2、返',19,1,14,18,1739442205,0,1,0,0,'','0',1740037700,'',0.0,0,0,'qqfcsnjjzhscqff'),(2,173,'《维斯塔的餐桌》奶制品购买方法','','颜色','http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg','','https://shouyou.3dmgame.com/gl/552928.html','在维斯塔的餐桌游戏内大家可以通过购买获得各类的食材，奶制品这个食材是后续研发菜品最基础的物品，要想获取奶制品这个食材，需要前往餐厅商店，花费涅索币购买获得，那么奶制品的购买方法是什么呢？下面就让小编给大家带来《维斯塔的餐桌》奶制品购买方法，',20,1,1,18,1739691963,0,1,0,0,'','0',1740037758,'',0.0,0,0,'wstdcznzpgmff'),(3,173,'《ao3》搜索文章方法一览2025','','颜色','http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg','','https://shouyou.3dmgame.com/gl/552951.html','ao3怎么搜索文章？ao3这是一款非常不错的手机阅读软件，相信很多用户都非常喜欢使用这款软件，那么是不是很多用户还不知道如何使用ao3进行文章搜索呢，不知道的用户也没关系，接下来小编就为大家带来ao3怎么搜索文章的详细介绍，希望小编的分享可',25,1,1,22,1739745019,0,1,0,0,'','0',1740037670,'',0.0,0,0,'ao3sswzffyl2025'),(4,173,'情棺3：阴缘（下）第七章攻略','','颜色','http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg','','https://shouyou.3dmgame.com/gl/552942.html','谜境情棺3阴缘下第七章怎么过？第七章是村中往事，这里是多视角解谜，包含林婉儿视角、林馨儿视角、陈月龙视角、陈康视角，下面是“黄小戈的魔法盒子”给大家带来的情棺3：阴缘（下）第七章攻略，感兴趣的小伙伴们一起来看看吧。>>>>情棺3：阴缘（下）',15,1,1,15,1739927844,0,1,0,0,'','Q',1740037691,'',0.0,0,0,'qg3yyxdqzgl'),(5,173,'《寻道大千》管家系统功能介绍','','颜色','http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg','','https://shouyou.3dmgame.com/gl/552927.html','管家系统是寻道大千游戏中的全新系统，这个功能的上线可以帮助玩家达成一些游戏内的日常任务，也就是说每天的任务量会大大减少，都可以交给管家打理了，那么具体怎么样呢？下面小编整理了《寻道大千》管家系统功能介绍，感兴趣的小伙伴一起看看吧。寻道大千管',25,1,1,23,1740037707,0,1,0,0,'','0',1740037661,'',0.0,0,0,'xddqgjxtgnjs'),(6,173,'《最后的起源》内奥迪技能介绍','','颜色','http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg','','https://shouyou.3dmgame.com/gl/552950.html','故事描述由于寄生在机械里的铁虫(鉄虫)的侵害，距人类灭亡已经过100 年，人类所制造的「人工生命体(バイオロイド)」们至今仍坚信着引导着自己的人类存在于世，在全世界徘回着。接下来就由小编给大家带来了详细的《最后的起源》内奥迪技能介绍! 《最',19,2,2,19,1740033682,0,1,0,0,'','0',1740037719,'',0.0,0,0,'zhdqynadjnjs');

#
# Structure for table "gxl_news_all"
#

DROP TABLE IF EXISTS `gxl_news_all`;
CREATE TABLE `gxl_news_all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_content` longtext,
  `news_name` varchar(255) DEFAULT NULL,
  `news_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6712 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_news_all"
#

INSERT INTO `gxl_news_all` VALUES (1,'<span>游戏介绍</span>\r\n<p style=\"text-indent:2em;\">\r\n\t<strong>像素火影骨架传奇</strong>是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇亮点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t技能特效设计炫目，每个技能都有自己独特的光影效果，让玩家在战斗时充分感受到技能释放的震撼。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t有一个扣人心弦的故事，通过一系列的任务和情节线索，将逐渐揭开游戏世界的秘密，并越来越接近火影忍者骷髅版的真相。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t游戏中有许多任务、副本和活动等着玩家去挑战。无论你是想挑战强大的敌人还是追求更高水平的战斗力，总有一种方法适合你。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇采用独特的像素画风，呈现出独特的游戏世界。简洁精致的画面，带给玩家全新的视觉享受。\r\n</p>\r\n<p align=\"center\">\r\n\t<img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg\" />\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特色\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t通过游戏中的挑战和战斗，获得经验和物品来提高你的角色的能力，增强的能力将帮助你更好地应对日益强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t各种各样的关卡类型，有令人兴奋的战斗关卡，精彩的平台跳跃关卡，解谜关卡等等。每个关卡都有独特的挑战和玩法，不会让你感到无聊。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇有许多不同类型的角色供玩家选择，每个角色都有独特的技能和战斗风格，选择最适合你的角色来击败强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t精心设计的丰富多样的格斗技巧和连击系统，让你享受流畅刺激的格斗体验，通过不同的技能组合，创造无与伦比的连击和杀死敌人。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t提供战场模式，与其他玩家进行在线对战，展示自己的格斗技巧，与好友交流，共同进步。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t震撼的视觉效果让玩家感受顶级的战斗魅力，巧妙的操作感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t丰富的角色和多样的战斗玩法，充分满足不同的战斗需求，巧妙的操作，感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇合理的操作尝试击败不同的对手，享受在手机上高品质战斗玩法的魅力。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇游戏评价\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇玩家可以随时享受自由的战斗玩法，具有独特战斗魅力的手游，提供了简单的操作方式，配合易上手易上手的玩法设计，真正让玩家能够时刻感受到高品质独特的战斗体验，玩家可以自由操作喜欢的角色展开横版的动作格斗实力比拼手游。游戏具有高品质的动作操作感，操作简单上手，充分满足不同的格斗需求，可以尝试通过合理的操作完成不同强度的比赛。\r\n</p>','《qq飞车》蛇年机甲最划算抽取方法',1),(2,'<span>游戏介绍</span> \r\n<p style=\"text-indent:2em;\">\r\n\t<strong>像素火影骨架传奇</strong>是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇亮点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t技能特效设计炫目，每个技能都有自己独特的光影效果，让玩家在战斗时充分感受到技能释放的震撼。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t有一个扣人心弦的故事，通过一系列的任务和情节线索，将逐渐揭开游戏世界的秘密，并越来越接近火影忍者骷髅版的真相。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t游戏中有许多任务、副本和活动等着玩家去挑战。无论你是想挑战强大的敌人还是追求更高水平的战斗力，总有一种方法适合你。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇采用独特的像素画风，呈现出独特的游戏世界。简洁精致的画面，带给玩家全新的视觉享受。\r\n</p>\r\n<p align=\"center\">\r\n\t<img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg\" /> \r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特色\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t通过游戏中的挑战和战斗，获得经验和物品来提高你的角色的能力，增强的能力将帮助你更好地应对日益强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t各种各样的关卡类型，有令人兴奋的战斗关卡，精彩的平台跳跃关卡，解谜关卡等等。每个关卡都有独特的挑战和玩法，不会让你感到无聊。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇有许多不同类型的角色供玩家选择，每个角色都有独特的技能和战斗风格，选择最适合你的角色来击败强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t精心设计的丰富多样的格斗技巧和连击系统，让你享受流畅刺激的格斗体验，通过不同的技能组合，创造无与伦比的连击和杀死敌人。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t提供战场模式，与其他玩家进行在线对战，展示自己的格斗技巧，与好友交流，共同进步。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t震撼的视觉效果让玩家感受顶级的战斗魅力，巧妙的操作感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t丰富的角色和多样的战斗玩法，充分满足不同的战斗需求，巧妙的操作，感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇合理的操作尝试击败不同的对手，享受在手机上高品质战斗玩法的魅力。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇游戏评价\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇玩家可以随时享受自由的战斗玩法，具有独特战斗魅力的手游，提供了简单的操作方式，配合易上手易上手的玩法设计，真正让玩家能够时刻感受到高品质独特的战斗体验，玩家可以自由操作喜欢的角色展开横版的动作格斗实力比拼手游。游戏具有高品质的动作操作感，操作简单上手，充分满足不同的格斗需求，可以尝试通过合理的操作完成不同强度的比赛。\r\n</p>','《维斯塔的餐桌》奶制品购买方法',2),(3,'<span>游戏介绍</span>\r\n<p style=\"text-indent:2em;\">\r\n\t<strong>像素火影骨架传奇</strong>是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇亮点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t技能特效设计炫目，每个技能都有自己独特的光影效果，让玩家在战斗时充分感受到技能释放的震撼。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t有一个扣人心弦的故事，通过一系列的任务和情节线索，将逐渐揭开游戏世界的秘密，并越来越接近火影忍者骷髅版的真相。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t游戏中有许多任务、副本和活动等着玩家去挑战。无论你是想挑战强大的敌人还是追求更高水平的战斗力，总有一种方法适合你。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇采用独特的像素画风，呈现出独特的游戏世界。简洁精致的画面，带给玩家全新的视觉享受。\r\n</p>\r\n<p align=\"center\">\r\n\t<img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg\" />\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特色\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t通过游戏中的挑战和战斗，获得经验和物品来提高你的角色的能力，增强的能力将帮助你更好地应对日益强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t各种各样的关卡类型，有令人兴奋的战斗关卡，精彩的平台跳跃关卡，解谜关卡等等。每个关卡都有独特的挑战和玩法，不会让你感到无聊。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇有许多不同类型的角色供玩家选择，每个角色都有独特的技能和战斗风格，选择最适合你的角色来击败强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t精心设计的丰富多样的格斗技巧和连击系统，让你享受流畅刺激的格斗体验，通过不同的技能组合，创造无与伦比的连击和杀死敌人。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t提供战场模式，与其他玩家进行在线对战，展示自己的格斗技巧，与好友交流，共同进步。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t震撼的视觉效果让玩家感受顶级的战斗魅力，巧妙的操作感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t丰富的角色和多样的战斗玩法，充分满足不同的战斗需求，巧妙的操作，感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇合理的操作尝试击败不同的对手，享受在手机上高品质战斗玩法的魅力。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇游戏评价\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇玩家可以随时享受自由的战斗玩法，具有独特战斗魅力的手游，提供了简单的操作方式，配合易上手易上手的玩法设计，真正让玩家能够时刻感受到高品质独特的战斗体验，玩家可以自由操作喜欢的角色展开横版的动作格斗实力比拼手游。游戏具有高品质的动作操作感，操作简单上手，充分满足不同的格斗需求，可以尝试通过合理的操作完成不同强度的比赛。\r\n</p>','《ao3》搜索文章方法一览2025',3),(4,'<span>游戏介绍</span>\r\n<p style=\"text-indent:2em;\">\r\n\t<strong>像素火影骨架传奇</strong>是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇亮点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t技能特效设计炫目，每个技能都有自己独特的光影效果，让玩家在战斗时充分感受到技能释放的震撼。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t有一个扣人心弦的故事，通过一系列的任务和情节线索，将逐渐揭开游戏世界的秘密，并越来越接近火影忍者骷髅版的真相。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t游戏中有许多任务、副本和活动等着玩家去挑战。无论你是想挑战强大的敌人还是追求更高水平的战斗力，总有一种方法适合你。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇采用独特的像素画风，呈现出独特的游戏世界。简洁精致的画面，带给玩家全新的视觉享受。\r\n</p>\r\n<p align=\"center\">\r\n\t<img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg\" />\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特色\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t通过游戏中的挑战和战斗，获得经验和物品来提高你的角色的能力，增强的能力将帮助你更好地应对日益强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t各种各样的关卡类型，有令人兴奋的战斗关卡，精彩的平台跳跃关卡，解谜关卡等等。每个关卡都有独特的挑战和玩法，不会让你感到无聊。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇有许多不同类型的角色供玩家选择，每个角色都有独特的技能和战斗风格，选择最适合你的角色来击败强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t精心设计的丰富多样的格斗技巧和连击系统，让你享受流畅刺激的格斗体验，通过不同的技能组合，创造无与伦比的连击和杀死敌人。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t提供战场模式，与其他玩家进行在线对战，展示自己的格斗技巧，与好友交流，共同进步。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t震撼的视觉效果让玩家感受顶级的战斗魅力，巧妙的操作感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t丰富的角色和多样的战斗玩法，充分满足不同的战斗需求，巧妙的操作，感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇合理的操作尝试击败不同的对手，享受在手机上高品质战斗玩法的魅力。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇游戏评价\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇玩家可以随时享受自由的战斗玩法，具有独特战斗魅力的手游，提供了简单的操作方式，配合易上手易上手的玩法设计，真正让玩家能够时刻感受到高品质独特的战斗体验，玩家可以自由操作喜欢的角色展开横版的动作格斗实力比拼手游。游戏具有高品质的动作操作感，操作简单上手，充分满足不同的格斗需求，可以尝试通过合理的操作完成不同强度的比赛。\r\n</p>','情棺3：阴缘（下）第七章攻略',4),(5,'<span>游戏介绍</span>\r\n<p style=\"text-indent:2em;\">\r\n\t<strong>像素火影骨架传奇</strong>是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇亮点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t技能特效设计炫目，每个技能都有自己独特的光影效果，让玩家在战斗时充分感受到技能释放的震撼。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t有一个扣人心弦的故事，通过一系列的任务和情节线索，将逐渐揭开游戏世界的秘密，并越来越接近火影忍者骷髅版的真相。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t游戏中有许多任务、副本和活动等着玩家去挑战。无论你是想挑战强大的敌人还是追求更高水平的战斗力，总有一种方法适合你。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇采用独特的像素画风，呈现出独特的游戏世界。简洁精致的画面，带给玩家全新的视觉享受。\r\n</p>\r\n<p align=\"center\">\r\n\t<img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg\" />\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特色\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t通过游戏中的挑战和战斗，获得经验和物品来提高你的角色的能力，增强的能力将帮助你更好地应对日益强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t各种各样的关卡类型，有令人兴奋的战斗关卡，精彩的平台跳跃关卡，解谜关卡等等。每个关卡都有独特的挑战和玩法，不会让你感到无聊。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇有许多不同类型的角色供玩家选择，每个角色都有独特的技能和战斗风格，选择最适合你的角色来击败强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t精心设计的丰富多样的格斗技巧和连击系统，让你享受流畅刺激的格斗体验，通过不同的技能组合，创造无与伦比的连击和杀死敌人。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t提供战场模式，与其他玩家进行在线对战，展示自己的格斗技巧，与好友交流，共同进步。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t震撼的视觉效果让玩家感受顶级的战斗魅力，巧妙的操作感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t丰富的角色和多样的战斗玩法，充分满足不同的战斗需求，巧妙的操作，感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇合理的操作尝试击败不同的对手，享受在手机上高品质战斗玩法的魅力。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇游戏评价\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇玩家可以随时享受自由的战斗玩法，具有独特战斗魅力的手游，提供了简单的操作方式，配合易上手易上手的玩法设计，真正让玩家能够时刻感受到高品质独特的战斗体验，玩家可以自由操作喜欢的角色展开横版的动作格斗实力比拼手游。游戏具有高品质的动作操作感，操作简单上手，充分满足不同的格斗需求，可以尝试通过合理的操作完成不同强度的比赛。\r\n</p>','《寻道大千》管家系统功能介绍',5),(6,'<span>游戏介绍</span> \r\n<p style=\"text-indent:2em;\">\r\n\t<strong>像素火影骨架传奇</strong>是一款由Up主U鼬神自制的动作格斗游戏，采用像素画风，为玩家带来全新的游戏体验，你将扮演一个英雄的角色，踏上一段追求武术之路的旅程。通过同样的黑暗世界，你将面对各种邪恶的敌人和挑战，探索隐藏在黑暗中的秘密，每个角色都有不同的特效体验，很多精彩的游戏玩法等着你去感受，精致的像素风格，丰富的玩法和精彩的故事，让玩家在游戏中获得难忘的体验。无论是战斗还是探索，这款游戏都为玩家提供了大量的自由和挑战，喜欢的小伙伴欢迎点击下载下来吧。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇亮点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t技能特效设计炫目，每个技能都有自己独特的光影效果，让玩家在战斗时充分感受到技能释放的震撼。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t有一个扣人心弦的故事，通过一系列的任务和情节线索，将逐渐揭开游戏世界的秘密，并越来越接近火影忍者骷髅版的真相。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t游戏中有许多任务、副本和活动等着玩家去挑战。无论你是想挑战强大的敌人还是追求更高水平的战斗力，总有一种方法适合你。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇采用独特的像素画风，呈现出独特的游戏世界。简洁精致的画面，带给玩家全新的视觉享受。\r\n</p>\r\n<p align=\"center\">\r\n\t<img src=\"http://cs.bchongw.com/Uploads/down/ac8df0414de4c47566236bfd36b52fbd/20250113175819_29132.jpg\" /> \r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特色\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t通过游戏中的挑战和战斗，获得经验和物品来提高你的角色的能力，增强的能力将帮助你更好地应对日益强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t各种各样的关卡类型，有令人兴奋的战斗关卡，精彩的平台跳跃关卡，解谜关卡等等。每个关卡都有独特的挑战和玩法，不会让你感到无聊。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇有许多不同类型的角色供玩家选择，每个角色都有独特的技能和战斗风格，选择最适合你的角色来击败强大的敌人。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t精心设计的丰富多样的格斗技巧和连击系统，让你享受流畅刺激的格斗体验，通过不同的技能组合，创造无与伦比的连击和杀死敌人。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇特点\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t提供战场模式，与其他玩家进行在线对战，展示自己的格斗技巧，与好友交流，共同进步。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t震撼的视觉效果让玩家感受顶级的战斗魅力，巧妙的操作感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t丰富的角色和多样的战斗玩法，充分满足不同的战斗需求，巧妙的操作，感受高品质的实力竞争。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇合理的操作尝试击败不同的对手，享受在手机上高品质战斗玩法的魅力。\r\n</p>\r\n<h3>\r\n\t像素火影骨架传奇游戏评价\r\n</h3>\r\n<p style=\"text-indent:2em;\">\r\n\t像素火影骨架传奇玩家可以随时享受自由的战斗玩法，具有独特战斗魅力的手游，提供了简单的操作方式，配合易上手易上手的玩法设计，真正让玩家能够时刻感受到高品质独特的战斗体验，玩家可以自由操作喜欢的角色展开横版的动作格斗实力比拼手游。游戏具有高品质的动作操作感，操作简单上手，充分满足不同的格斗需求，可以尝试通过合理的操作完成不同强度的比赛。\r\n</p>','《最后的起源》内奥迪技能介绍',6),(5533,'\n            <p style=\"text-indent:2em;\">\n\t《龙息：神寂》是新一代魔兽大世界卡牌RPG，将给你带来更耐玩、更良心、更新奇的游戏体验。这里有原汁原味的西幻冒险，实实在在的降肝减氪，没有定式的卡牌搭配，意想不到的离谱探索，快集结你的屠龙小队，开启冒险吧！\n</p></p><p align=\"center\">\n <iframe src=\"//player.bilibili.com/player.html?aid=113724207666299&bvid=BV1qLCnYvEkK&cid=27628668861&p=1\" allowfullscreen=\"true\" width=\"640\" height=\"498\" frameborder=\"no\">\n </iframe></p>        ','龙息：神寂！打响卡牌内卷第一枪！！',0);

#
# Structure for table "gxl_order"
#

DROP TABLE IF EXISTS `gxl_order`;
CREATE TABLE `gxl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_modtype` varchar(255) DEFAULT NULL COMMENT '模型地址',
  `order_uid` int(11) DEFAULT NULL COMMENT '用户uid',
  `order_type` tinyint(1) DEFAULT '0' COMMENT '0未支付1支付3退款',
  `order_endtime` int(11) DEFAULT NULL COMMENT '订单结束时间',
  `order_addtime` int(11) DEFAULT NULL,
  `order_code` varchar(255) DEFAULT NULL COMMENT '订单号',
  `order_pay_type` tinyint(4) DEFAULT '0' COMMENT '1支付宝2微信',
  `order_type_id` int(11) DEFAULT NULL COMMENT '关联产品id',
  `order_money` float(11,3) DEFAULT '0.000' COMMENT '订单价格',
  `order_pay_code` varchar(255) DEFAULT NULL COMMENT '商户订单号',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

#
# Data for table "gxl_order"
#


#
# Structure for table "gxl_order_msg"
#

DROP TABLE IF EXISTS `gxl_order_msg`;
CREATE TABLE `gxl_order_msg` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_uid` int(11) DEFAULT NULL COMMENT '更新账户id',
  `order_mod` varchar(255) DEFAULT '' COMMENT '增加金额模型',
  `order_type` tinyint(4) DEFAULT '0' COMMENT '1增加2减少',
  `order_code` varchar(255) DEFAULT NULL COMMENT '关联订单号',
  `order_goodid` int(11) DEFAULT NULL COMMENT '商品id号',
  `order_msg` varchar(255) DEFAULT NULL COMMENT '备注',
  `order_addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `order_money` float(11,2) DEFAULT '0.00' COMMENT '交易金额',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收益记录表';

#
# Data for table "gxl_order_msg"
#


#
# Structure for table "gxl_product"
#

DROP TABLE IF EXISTS `gxl_product`;
CREATE TABLE `gxl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_uid` int(11) DEFAULT NULL COMMENT '商品uid',
  `product_mod` varchar(11) DEFAULT NULL COMMENT '商品模型',
  `product_pid` int(11) DEFAULT '0' COMMENT '模型id',
  `product_type` tinyint(1) DEFAULT '0' COMMENT '发货状态0未发货1已发货',
  `product_code` varchar(255) DEFAULT NULL COMMENT '订单id',
  `product_refund_type` tinyint(1) DEFAULT '0' COMMENT '是否退款0否1过程中2退款成功3确认收货',
  `product_addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `product_endtime` int(11) DEFAULT NULL COMMENT '退款时间',
  `product_kefu` tinyint(1) DEFAULT '0' COMMENT '0未接入1介入',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='商品列表';

#
# Data for table "gxl_product"
#

INSERT INTO `gxl_product` VALUES (1,3,'links',98,0,'31665642841',0,1665642841,NULL,0),(2,3,'links',98,0,'31665643260',0,1665643260,NULL,0),(3,3,'links',98,0,'31665643266',0,1665643266,NULL,0),(4,3,'links',98,0,'31665644029',0,1665644029,NULL,0),(5,3,'links',98,0,'31665644033',0,1665644033,NULL,0);

#
# Structure for table "gxl_product_msg"
#

DROP TABLE IF EXISTS `gxl_product_msg`;
CREATE TABLE `gxl_product_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_code` varchar(255) DEFAULT NULL COMMENT '订单编号',
  `msg_uid` int(11) DEFAULT NULL COMMENT '消息发送申请人',
  `msg_addtime` int(11) DEFAULT NULL COMMENT '消息日期',
  `msg_text` text COMMENT '叙述',
  `msg_product_id` int(11) DEFAULT NULL COMMENT '申诉商品id',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='退款理由';

#
# Data for table "gxl_product_msg"
#


#
# Structure for table "gxl_search"
#

DROP TABLE IF EXISTS `gxl_search`;
CREATE TABLE `gxl_search` (
  `search_id` int(11) NOT NULL AUTO_INCREMENT,
  `search_name` varchar(255) DEFAULT NULL,
  `search_tid` int(11) DEFAULT NULL,
  `search_dec` varchar(255) DEFAULT NULL COMMENT '描述',
  `search_type` tinyint(4) DEFAULT '1' COMMENT '1代表新闻2下载',
  `search_addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `search_pic` varchar(255) DEFAULT NULL COMMENT '图片',
  `search_status` tinyint(1) DEFAULT '1' COMMENT '1显示0隐藏',
  PRIMARY KEY (`search_id`),
  KEY `search_name` (`search_name`,`search_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_search"
#


#
# Structure for table "gxl_slide"
#

DROP TABLE IF EXISTS `gxl_slide`;
CREATE TABLE `gxl_slide` (
  `slide_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `slide_oid` tinyint(4) NOT NULL,
  `slide_cid` tinyint(4) NOT NULL DEFAULT '1',
  `slide_name` varchar(255) NOT NULL,
  `slide_logo` varchar(255) NOT NULL,
  `slide_pic` varchar(255) NOT NULL,
  `slide_url` varchar(255) NOT NULL,
  `slide_content` varchar(255) NOT NULL,
  `slide_status` tinyint(1) NOT NULL,
  `slide_vid` mediumint(9) NOT NULL,
  PRIMARY KEY (`slide_id`),
  KEY `slide_status` (`slide_status`),
  KEY `slide_oid` (`slide_oid`),
  KEY `slide_cid` (`slide_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_slide"
#


#
# Structure for table "gxl_special"
#

DROP TABLE IF EXISTS `gxl_special`;
CREATE TABLE `gxl_special` (
  `special_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `special_banner` varchar(150) NOT NULL,
  `special_logo` varchar(150) NOT NULL,
  `special_name` varchar(150) NOT NULL,
  `special_keywords` varchar(150) NOT NULL,
  `special_description` varchar(255) NOT NULL,
  `special_color` char(8) NOT NULL,
  `special_skin` varchar(50) NOT NULL,
  `special_addtime` int(11) NOT NULL,
  `special_hits` mediumint(9) NOT NULL,
  `special_hits_day` mediumint(9) NOT NULL,
  `special_hits_week` mediumint(9) NOT NULL,
  `special_hits_month` mediumint(9) NOT NULL,
  `special_hits_lasttime` int(11) NOT NULL,
  `special_stars` tinyint(1) NOT NULL DEFAULT '1',
  `special_status` tinyint(1) NOT NULL,
  `special_content` text NOT NULL,
  `special_up` mediumint(9) NOT NULL,
  `special_down` mediumint(9) NOT NULL,
  `special_gold` decimal(3,1) NOT NULL,
  `special_golder` smallint(6) NOT NULL,
  `special_letters` varchar(255) DEFAULT NULL,
  `special_mx` varchar(155) NOT NULL,
  PRIMARY KEY (`special_id`),
  UNIQUE KEY `special_letters` (`special_letters`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_special"
#


#
# Structure for table "gxl_tag"
#

DROP TABLE IF EXISTS `gxl_tag`;
CREATE TABLE `gxl_tag` (
  `tag_id` mediumint(9) NOT NULL,
  `tag_sid` mediumint(9) NOT NULL DEFAULT '0',
  `tag_name` varchar(50) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  KEY `tag_sid` (`tag_sid`),
  KEY `tag_name` (`tag_name`),
  KEY `tag_sid_2` (`tag_sid`,`tag_name`)
) ENGINE=InnoDB AUTO_INCREMENT=433 DEFAULT CHARSET=utf8;

#
# Data for table "gxl_tag"
#

INSERT INTO `gxl_tag` VALUES (1,167,'关卡塔防',1),(1,167,'植物大战僵尸：重生',2),(2,167,'飞行射击',3),(2,167,'团队吃鸡对决',4),(3,167,'休闲益智',5),(3,167,'画线救人',6),(4,167,'关卡塔防',7),(4,167,'植物大战僵尸：重生',8),(5,167,'飞行射击',9),(5,167,'团队吃鸡对决',10),(6,167,'休闲益智',11),(6,167,'画线救人',12),(7,167,'霸总打工记',14),(8,167,'卡牌策略',15),(8,167,'神州风闻录',16),(9,167,'格斗街机',17),(9,167,'像素火影骨架传奇',18),(10,167,'欢乐摩托车特技赛',20),(11,167,'粘土彩泥模拟器',22),(12,167,'魔女的商店',24),(13,167,'关卡塔防',25),(13,167,'植物大战僵尸：重生',26),(14,167,'飞行射击',27),(14,167,'团队吃鸡对决',28),(15,167,'休闲益智',29),(15,167,'画线救人',30),(16,167,'关卡塔防',31),(16,167,'植物大战僵尸：重生',32),(17,167,'飞行射击',33),(17,167,'团队吃鸡对决',34),(18,167,'休闲益智',35),(18,167,'画线救人',36),(19,167,'霸总打工记',38),(20,167,'卡牌策略',39),(20,167,'神州风闻录',40),(21,167,'格斗街机',41),(21,167,'像素火影骨架传奇',42),(22,167,'欢乐摩托车特技赛',44),(23,167,'粘土彩泥模拟器',46),(24,167,'魔女的商店',48),(25,167,'悟饭游戏平台',50),(26,167,'摩托飞驰竞速赛',52),(27,167,'关卡塔防',53),(27,167,'植物大战僵尸：重生',54),(28,167,'飞行射击',55),(28,167,'团队吃鸡对决',56),(29,167,'休闲益智',57),(29,167,'画线救人',58),(30,167,'霸总打工记',60),(31,167,'卡牌策略',61),(31,167,'神州风闻录',62),(32,167,'格斗街机',63),(32,167,'像素火影骨架传奇',64),(33,167,'欢乐摩托车特技赛',66),(34,167,'粘土彩泥模拟器',68),(35,167,'魔女的商店',70),(36,167,'关卡塔防',71),(36,167,'植物大战僵尸：重生',72),(37,167,'飞行射击',73),(37,167,'团队吃鸡对决',74),(38,167,'休闲益智',75),(38,167,'画线救人',76),(39,167,'霸总打工记',78),(40,167,'卡牌策略',79),(40,167,'神州风闻录',80),(41,167,'格斗街机',81),(41,167,'像素火影骨架传奇',82),(42,167,'欢乐摩托车特技赛',84),(43,167,'粘土彩泥模拟器',86),(44,167,'魔女的商店',88),(45,167,'悟饭游戏平台',90),(46,167,'摩托飞驰竞速赛',92),(47,167,'休闲益智',93),(47,167,'粉彩少女学院派',94),(48,167,'体育竞技',95),(49,167,'我的完美猫旅馆',98),(50,167,'休闲益智',99),(50,167,'切切你的肥皂',100),(51,167,'角色扮演',101),(51,167,'王牌空姐养成记',102),(52,167,'关卡塔防',103),(52,167,'PvZ苏戏版',104),(53,167,'极限速度',106),(54,167,'疯狂的赛车',108),(55,167,'休闲益智',109),(55,167,'炮轰巨人',110),(56,167,'找物解谜',111),(56,167,'街漓芳传',112),(57,167,'修仙世家模拟器',114),(58,167,'我的世界多玩盒子',116),(59,167,'花草时光',118),(60,167,'空姐模拟器',120),(61,167,'厨神争霸赛',122),(62,167,'休闲益智',123),(62,167,'积木拼装模拟',124),(63,167,'休闲益智',125),(63,167,'愤怒植物反击战',126),(64,167,'休闲益智',127),(64,167,'绚石匹配',128),(65,167,'飞行射击',129),(65,167,'真实飞机驾驶员',130),(66,171,'关卡塔防',131),(66,171,'植物大战僵尸：重生',132),(67,171,'飞行射击',133),(67,171,'团队吃鸡对决',134),(68,171,'休闲益智',135),(68,171,'画线救人',136),(69,171,'霸总打工记',138),(70,171,'卡牌策略',139),(70,171,'神州风闻录',140),(71,171,'格斗街机',141),(71,171,'像素火影骨架传奇',142),(72,171,'欢乐摩托车特技赛',144),(73,171,'粘土彩泥模拟器',146),(74,171,'魔女的商店',148),(75,171,'悟饭游戏平台',150),(76,171,'摩托飞驰竞速赛',152),(77,171,'休闲益智',153),(77,171,'粉彩少女学院派',154),(78,171,'体育竞技',155),(79,171,'我的完美猫旅馆',158),(80,171,'休闲益智',159),(80,171,'切切你的肥皂',160),(81,171,'角色扮演',161),(81,171,'王牌空姐养成记',162),(82,171,'关卡塔防',163),(82,171,'PvZ苏戏版',164),(83,171,'极限速度',166),(84,171,'疯狂的赛车',168),(85,171,'休闲益智',169),(85,171,'炮轰巨人',170),(86,171,'找物解谜',171),(86,171,'街漓芳传',172),(87,171,'修仙世家模拟器',174),(88,171,'我的世界多玩盒子',176),(89,171,'花草时光',178),(90,171,'空姐模拟器',180),(91,171,'厨神争霸赛',182),(92,171,'休闲益智',183),(92,171,'积木拼装模拟',184),(93,171,'休闲益智',185),(93,171,'愤怒植物反击战',186),(94,171,'休闲益智',187),(94,171,'绚石匹配',188),(95,171,'飞行射击',189),(95,171,'真实飞机驾驶员',190),(96,171,'关卡塔防',191),(96,171,'植物大战僵尸：重生',192),(97,171,'飞行射击',193),(97,171,'团队吃鸡对决',194),(98,171,'休闲益智',195),(98,171,'画线救人',196),(99,171,'霸总打工记',198),(100,171,'卡牌策略',199),(100,171,'神州风闻录',200),(101,171,'格斗街机',201),(101,171,'像素火影骨架传奇',202),(102,171,'欢乐摩托车特技赛',204),(103,171,'粘土彩泥模拟器',206),(104,171,'魔女的商店',208),(105,171,'悟饭游戏平台',210),(106,171,'摩托飞驰竞速赛',212),(107,171,'休闲益智',213),(107,171,'粉彩少女学院派',214),(108,171,'体育竞技',215),(109,171,'我的完美猫旅馆',218),(110,171,'休闲益智',219),(110,171,'切切你的肥皂',220),(111,171,'角色扮演',221),(111,171,'王牌空姐养成记',222),(112,171,'关卡塔防',223),(112,171,'PvZ苏戏版',224),(113,171,'极限速度',226),(114,171,'疯狂的赛车',228),(115,171,'休闲益智',229),(115,171,'炮轰巨人',230),(116,171,'找物解谜',231),(116,171,'街漓芳传',232),(117,171,'修仙世家模拟器',234),(118,171,'我的世界多玩盒子',236),(119,171,'花草时光',238),(120,171,'空姐模拟器',240),(121,171,'厨神争霸赛',242),(122,171,'休闲益智',243),(122,171,'积木拼装模拟',244),(123,171,'休闲益智',245),(123,171,'愤怒植物反击战',246),(124,171,'休闲益智',247),(124,171,'绚石匹配',248),(125,171,'飞行射击',249),(125,171,'真实飞机驾驶员',250),(126,171,'关卡塔防',251),(126,171,'植物大战僵尸：重生',252),(127,171,'关卡塔防',253),(127,171,'植物大战僵尸：重生',254),(128,171,'飞行射击',255),(128,171,'团队吃鸡对决',256),(129,171,'休闲益智',257),(129,171,'画线救人',258),(130,171,'霸总打工记',260),(131,171,'卡牌策略',261),(131,171,'神州风闻录',262),(132,171,'格斗街机',263),(132,171,'像素火影骨架传奇',264),(133,171,'欢乐摩托车特技赛',266),(134,171,'粘土彩泥模拟器',268),(135,171,'魔女的商店',270),(136,171,'悟饭游戏平台',272),(137,171,'摩托飞驰竞速赛',274),(138,171,'休闲益智',275),(138,171,'粉彩少女学院派',276),(139,171,'体育竞技',277),(140,171,'我的完美猫旅馆',280),(141,171,'休闲益智',281),(141,171,'切切你的肥皂',282),(142,171,'角色扮演',283),(142,171,'王牌空姐养成记',284),(143,171,'关卡塔防',285),(143,171,'PvZ苏戏版',286),(144,171,'极限速度',288),(145,171,'疯狂的赛车',290),(146,171,'休闲益智',291),(146,171,'炮轰巨人',292),(147,171,'找物解谜',293),(147,171,'街漓芳传',294),(148,171,'修仙世家模拟器',296),(149,171,'我的世界多玩盒子',298),(150,171,'花草时光',300),(151,171,'空姐模拟器',302),(152,171,'厨神争霸赛',304),(153,171,'休闲益智',305),(153,171,'积木拼装模拟',306),(154,171,'休闲益智',307),(154,171,'愤怒植物反击战',308),(155,171,'休闲益智',309),(155,171,'绚石匹配',310),(156,171,'飞行射击',311),(156,171,'真实飞机驾驶员',312),(157,171,'关卡塔防',313),(157,171,'植物大战僵尸：重生',314),(158,171,'飞行射击',315),(158,171,'团队吃鸡对决',316),(159,171,'休闲益智',317),(159,171,'画线救人',318),(160,171,'霸总打工记',320),(161,171,'卡牌策略',321),(161,171,'神州风闻录',322),(162,171,'格斗街机',323),(162,171,'像素火影骨架传奇',324),(163,171,'欢乐摩托车特技赛',326),(164,171,'粘土彩泥模拟器',328),(165,171,'魔女的商店',330),(166,171,'悟饭游戏平台',332),(167,171,'关卡塔防',333),(167,171,'植物大战僵尸：重生',334),(168,171,'飞行射击',335),(168,171,'团队吃鸡对决',336),(169,171,'休闲益智',337),(169,171,'画线救人',338),(170,171,'霸总打工记',340),(171,171,'卡牌策略',341),(171,171,'神州风闻录',342),(172,171,'格斗街机',343),(172,171,'像素火影骨架传奇',344),(173,171,'欢乐摩托车特技赛',346),(174,171,'粘土彩泥模拟器',348),(175,171,'魔女的商店',350),(176,171,'悟饭游戏平台',352),(177,171,'关卡塔防',353),(177,171,'植物大战僵尸：重生',354),(178,171,'飞行射击',355),(178,171,'团队吃鸡对决',356),(179,171,'休闲益智',357),(179,171,'画线救人',358),(180,171,'霸总打工记',360),(181,171,'卡牌策略',361),(181,171,'神州风闻录',362),(182,171,'格斗街机',363),(182,171,'像素火影骨架传奇',364),(183,171,'欢乐摩托车特技赛',366),(184,171,'粘土彩泥模拟器',368),(185,171,'魔女的商店',370),(186,171,'悟饭游戏平台',372),(187,171,'关卡塔防',373),(187,171,'植物大战僵尸：重生',374),(188,171,'飞行射击',375),(188,171,'团队吃鸡对决',376),(189,171,'休闲益智',377),(189,171,'画线救人',378),(190,171,'霸总打工记',380),(191,171,'卡牌策略',381),(191,171,'神州风闻录',382),(192,171,'格斗街机',383),(192,171,'像素火影骨架传奇',384),(193,171,'欢乐摩托车特技赛',386),(194,171,'粘土彩泥模拟器',388),(195,171,'魔女的商店',390),(196,171,'悟饭游戏平台',392),(197,171,'关卡塔防',393),(197,171,'植物大战僵尸：重生',394),(198,171,'飞行射击',395),(198,171,'团队吃鸡对决',396),(199,171,'休闲益智',397),(199,171,'画线救人',398),(200,171,'霸总打工记',400),(201,171,'卡牌策略',401),(201,171,'神州风闻录',402),(202,171,'格斗街机',403),(202,171,'像素火影骨架传奇',404),(203,171,'欢乐摩托车特技赛',406),(204,171,'粘土彩泥模拟器',408),(205,171,'魔女的商店',410),(206,171,'悟饭游戏平台',412),(207,171,'关卡塔防',413),(207,171,'植物大战僵尸：重生',414),(208,171,'飞行射击',415),(208,171,'团队吃鸡对决',416),(209,171,'休闲益智',417),(209,171,'画线救人',418),(210,171,'模拟经营',419),(210,171,'霸总打工记',420),(211,171,'卡牌策略',421),(211,171,'神州风闻录',422),(212,171,'格斗街机',423),(212,171,'像素火影骨架传奇',424),(213,171,'赛车竞速',425),(213,171,'欢乐摩托车特技赛',426),(214,171,'模拟经营',427),(214,171,'粘土彩泥模拟器',428),(215,171,'模拟经营',429),(215,171,'魔女的商店',430),(216,171,'游戏辅助',431),(216,171,'悟饭游戏平台',432);

#
# Structure for table "gxl_topic"
#

DROP TABLE IF EXISTS `gxl_topic`;
CREATE TABLE `gxl_topic` (
  `topic_did` mediumint(9) NOT NULL,
  `topic_tid` mediumint(9) NOT NULL,
  `topic_sid` tinyint(1) NOT NULL,
  `topic_oid` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_topic"
#

INSERT INTO `gxl_topic` VALUES (17070,23870,3,1),(6531,23870,3,2),(53385,193079,3,1),(23401,193079,3,2),(16034,193080,3,2),(18543,193080,3,1),(7192,193080,3,3),(10792,22270,3,1),(20474,178991,3,1),(10957,22270,3,3),(26963,178991,3,2),(10760,22808,3,1),(179695,183980,3,1),(180255,52081,3,1),(229539,50809,3,1);

#
# Structure for table "gxl_user"
#

DROP TABLE IF EXISTS `gxl_user`;
CREATE TABLE `gxl_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `random` varchar(255) DEFAULT NULL COMMENT '随机字符',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `phone` int(11) DEFAULT NULL COMMENT '手机',
  `islock` tinyint(1) DEFAULT '0' COMMENT '1锁定，是否禁止登陆',
  `avatar_img` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `groupid` tinyint(1) DEFAULT '1' COMMENT '用户级别',
  `nickname` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  `remark` varchar(255) DEFAULT NULL COMMENT '会员介绍',
  `addtime` int(11) DEFAULT NULL COMMENT '登录时间',
  `regtime` int(11) DEFAULT NULL COMMENT '注册时间',
  `money` float(11,2) DEFAULT '0.00' COMMENT '价格',
  `cash_money` float(11,2) DEFAULT '0.00' COMMENT '提现中金额',
  `api_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gxl_user"
#


#
# Structure for table "gxl_user_cash"
#

DROP TABLE IF EXISTS `gxl_user_cash`;
CREATE TABLE `gxl_user_cash` (
  `cash_id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_money` float(11,2) DEFAULT '0.00' COMMENT '提现金额',
  `cash_pay_name` varchar(255) DEFAULT NULL COMMENT '提现用户人姓名',
  `cash_type` tinyint(1) DEFAULT '0' COMMENT '0提现中，1提现成功，2提现失败',
  `cash_addtime` int(11) DEFAULT NULL COMMENT '提现时间戳',
  `cash_msg` varchar(255) DEFAULT NULL COMMENT '提现失败说明',
  `cash_code` varchar(255) DEFAULT NULL COMMENT '提现账户',
  `cash_pay_type` tinyint(1) DEFAULT '0' COMMENT '1支付宝2微信3银行卡',
  `cash_uid` int(11) DEFAULT NULL COMMENT '提现用户iD',
  PRIMARY KEY (`cash_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='提现操作表';

#
# Data for table "gxl_user_cash"
#

