<?php



class CommentAction extends Action
{

    //发帖的关键词
    protected $minganci = "胡的接班人|钦定接班人|习近平|平近习|xjp|习太子|习明泽|老习|温家宝|温加宝|温x|温jia宝|温宝宝|温加饱|温加保|张培莉|温云松|温如春|温jb|胡温|胡x|胡jt|胡boss|胡总|胡王八|hujintao|胡jintao|胡j涛|胡惊涛|胡景涛|胡紧掏|湖紧掏|胡紧套|锦涛|hjt|胡派|胡主席|刘永清|胡海峰|胡海清|江泽民|民泽江|江胡|江哥|江主席|江书记|江浙闽|江沢民|江浙民|择民|则民|茳泽民|zemin|ze民|老江|老j|江core|江x|江派|江zm|jzm|江戏子|江蛤蟆|江某某|江贼|江猪|江氏集团|江绵恒|江绵康|王冶坪|江泽慧|邓小平|平小邓|xiao平|邓xp|邓晓平|邓朴方|邓榕|邓质方|毛泽东|猫泽东|猫则东|chairmanmao|猫贼洞|毛zd|毛zx|z东|ze东|泽d|zedong|毛太祖|毛相|主席画像|改革历程|朱镕基|朱容基|朱镕鸡|朱容鸡|朱云来|李鹏|李peng|里鹏|李月月鸟|李小鹏|李小琳|华主席|华国|国锋|国峰|锋同志|白春礼|薄熙来|薄一波|蔡赴朝|蔡武|曹刚川|常万全|陈炳德|陈德铭|陈建国|陈良宇|陈绍基|陈同海|陈至立|戴秉国|丁一平|董建华|杜德印|杜世成|傅锐|郭伯雄|郭金龙|贺国强|胡春华|耀邦|华建敏|黄华华|黄丽满|黄兴国|回良玉|贾庆林|贾廷安|靖志远|李长春|李春城|李建国|李克强|李岚清|李沛瑶|李荣融|李瑞环|李铁映|李先念|李学举|李源潮|栗智|梁光烈|廖锡龙|林树森|林炎志|林左鸣|令计划|柳斌杰|刘奇葆|刘少奇|刘延东|刘云山|刘志军|龙新民|路甬祥|罗箭|吕祖善|马飚|马恺|孟建柱|欧广源|强卫|沈跃跃|宋平顺|粟戎生|苏树林|孙家正|铁凝|屠光绍|王东明|汪东兴|王鸿举|王沪宁|王乐泉|王洛林|王岐山|王胜俊|王太华|王学军|王兆国|王振华|吴邦国|吴定富|吴官正|无官正|吴胜利|吴仪|奚国华|习仲勋|徐才厚|许其亮|徐绍史|杨洁篪|叶剑英|由喜贵|于幼军|俞正声|袁纯清|曾培炎|曾庆红|曾宪梓|曾荫权|张德江|张定发|张高丽|张立昌|张荣坤|张志国|赵洪祝|紫阳|周生贤|周永康|朱海仑|政治局常委|中纪委|主席像|总书记|中南海|大陆当局|中国当局|北京当局|共产党|党产共|gcd|共贪党|gongchandang|阿共|共一产一党|产党共|公产党|工产党|共c党|共x党|共铲|供产|共惨|供铲党|供铲谠|供铲裆|共残党|共残主义|共产主义的幽灵|拱铲|老共|中共|中珙|中gong|gc党|贡挡|gong党|g产|狗产蛋|共残裆|恶党|邪党|共产专制|共产王朝|裆中央|土共|土g|共狗|g匪|共匪|仇共|communistparty|政府|症腐|政腐|政付|正府|政俯|政一府|政百度府|政f|zhengfu|政zhi|挡中央|档中央|中央领导|中国zf|中央zf|国wu院|中华帝国|gong和|大陆官方|北京政权|爱女人|爱液|按摩棒|拔出来|爆草|包二奶|暴干|暴奸|暴乳|爆乳|暴淫|屄|被操|被插|被干|逼奸|仓井空|插暴|操逼|操黑|操烂|肏你|肏死|操死|操我|厕奴|插比|插b|插逼|插进|插你|插我|插阴|潮吹|潮喷|成人电影|成人论坛|成人色情|成人网站|成人文学|成人小说|艳情小说|成人游戏|吃精|赤裸|抽插|扌由插|抽一插|春药|大波|大力抽送|大乳|荡妇|荡女|盗撮|多人轮|发浪|放尿|肥逼|粉穴|封面女郎|风月大陆|干死你|干穴|肛交|肛门|龟头|裹本|国产av|好嫩|豪乳|黑逼|后庭|后穴|虎骑|花花公子|换妻俱乐部|黄片|几吧|鸡吧|鸡巴|鸡奸|寂寞男|寂寞女|妓女|激情|集体淫|奸情|叫床|脚交|金鳞岂是池中物|金麟岂是池中物|精液|就去日|巨屌|菊花洞|菊门|巨奶|巨乳|菊穴|开苞|口爆|口活|口交|口射|口淫|裤袜|狂操|狂插|浪逼|浪妇|浪叫|浪女|狼友|聊性|流淫|铃木麻|凌辱|漏乳|露b|乱交|乱伦|轮暴|轮操|轮奸|裸陪|买春|美逼|美少妇|美乳|美腿|美穴|美幼|秘唇|迷奸|密穴|蜜穴|蜜液|摸奶|摸胸|母奸|奈美|奶子|男奴|内射|嫩逼|嫩女|嫩穴|捏弄|女优|炮友|砲友|喷精|屁眼|品香堂|前凸后翘|强jian|强暴|强奸处女|情趣用品|情色|拳交|全裸|群交|惹火身材|人妻|人兽|日逼|日烂|肉棒|肉逼|肉唇|肉洞|肉缝|肉棍|肉茎|肉具|揉乳|肉穴|肉欲|乳爆|乳房|乳沟|乳交|乳头|三级片|骚逼|骚比|骚女|骚水|骚穴|色逼|色界|色猫|色盟|色情网站|色区|色色|色诱|色欲|色b|少年阿宾|少修正|射爽|射颜|食精|释欲|兽奸|兽交|手淫|兽欲|熟妇|熟母|熟女|爽片|爽死我了|双臀|死逼|丝袜|丝诱|松岛枫|酥痒|汤加丽|套弄|体奸|体位|舔脚|舔阴|调教|偷欢|偷拍|推油|脱内裤|文做|我就色|无码|舞女|无修正|吸精|夏川纯|相奸|小逼|校鸡|小穴|小xue|写真|性感妖娆|性感诱惑|性虎|性饥渴|性技巧|性交|性奴|性虐|性息|性欲|胸推|穴口|学生妹|穴图|亚情|颜射|阳具|杨思敏|要射了|夜勤病栋|一本道|一夜欢|一夜情|一ye情|阴部|淫虫|阴唇|淫荡|阴道|淫电影|阴阜|淫妇|淫河|阴核|阴户|淫贱|淫叫|淫教师|阴茎|阴精|淫浪|淫媚|淫糜|淫魔|淫母|淫女|淫虐|淫妻|淫情|淫色|淫声浪语|淫兽学园|淫书|淫术炼金士|淫水|淫娃|淫威|淫亵|淫样|淫液|淫照|阴b|应召|幼交|幼男|幼女|欲火|欲女|玉女心经|玉蒲团|玉乳|欲仙欲死|玉穴|援交|原味内衣|援助交际|张筱雨|招鸡|招妓|中年美妇|抓胸|自慰|作爱|18禁|99bb|a4u|a4y|adult|amateur|anal|a片|fuck|gay片|g点|g片|hardcore|h动画|h动漫|incest|porn|secom|sexinsex|sm女王|xiao77|xing伴侣|tokyohot|yin荡|六四|1989北京|64白皮书|64大屠杀|64风波|64纪录片|64事件|64运动|64真相|6月4|5月35|8964|89民运|89年|8pingfang|8square|8平方|98屠杀|八九|八平方|一九八九|吸精瓶|习大大|江贼民|王维林|江绵恒|江绵康|朱云来|朱燕来|彭丽媛|齐巧巧|齐桥桥|陈光诚|习明泽|胡海清|温如春|张蓓莉|温家宏|雪山狮子旗|共產黨|习禁评|習近平|洗尽贫|臺灣獨立|顶贴机|顶帖机|达赖|迷情水|迷情药|迷魂药|翻墙|吸精嫔|狸苛强|愚正生|脏得僵|立刻强|涨得奖|预正升|量云山|望齐山|涨高哩|两秽|淫大|政邪|管理员|版主|超级版主|超版|管理员|游客|超级管理|斑竹|板主|斑主|巡视员|核爆日本|核爆全日本|党中央|共产党|法轮功|宪章|17大|18大|1959拉萨|77元|87sun|9评|bapingfang|big纪元|Dajiyuan|fanghexie|gcd|gong匪|Lihongzhi|wjb|xuhening|罢工|罢课|薄熙来|薄一波|藏独|曹廷|肏屄|陈良宇|大法|大纪元|大江大海|兵变|邓小平|钓鱼岛|丁子霖|东泽毛|发改委|反华|和谐|高智晟|公安|共残党|共惨党|共铲党|共匪|顾顺章|官僚|自焚|国庆舆论|国殇|红朝|胡锦涛|胡主席|胡紧掏|胡紧套|胡温|胡瘟|胡吴温|胡耀邦|黄菊|贾庆林|江书记|江泽民|江主席|江家帮|江青|疆独|截访|九流干部|九评|空椅|赖昌星|李昌平|李洪志|李克强|刘晓波|刘黑手|吕新国|轮子功|毛泽东|毛主席|毛厕东|毛厕洞|毛贼东|民主|明会网|明彗网|聂绀弩|诺贝尔|諾貝爾|任继愈|上访|十八大|十七大|双规|陶驷驹|兲朝|屠华|汪兆钧|王福泉|王洪文|王佩英|网管|网监|维基|维稳办|温宝宝|温加饱|温家宝|温假饱|温云松|温总理|溫傢寶|瘟家|瘟家鸨|瘟假鸨|无帮国|无官正|吴邦国|吴江平|吴中华|吴祖光|习近平|信访|信息办|学潮|亚洲周刊|杨春林|杨继绳|姚文元|一党专政|王立军|一九五九|游行|曾庆红|曾庆鸿|曾慧燕|张春桥|章诒和|赵连海|赵子法|赵紫阳|真理|镇压|政治|中南海|中共|周永康";
    //用户名的关键词
    protected $name_minganci = "网通社|极趣社区|管理员|版主|斑竹|社区|运营人员|工作人员|孙广阔|编辑|小编|六四|1989北京|64白皮书|64大屠杀|64风波|64纪录片|64事件|64运动|64真相|6月4|5月35|8964|89民运|89年|8pingfang|8square|8平方|98屠杀|八九|八平方|一九八九|吸精瓶|习大大|江贼民|王维林|江绵恒|江绵康|朱云来|朱燕来|彭丽媛|齐巧巧|齐桥桥|陈光诚|习明泽|胡海清|温如春|张蓓莉|温家宏|雪山狮子旗|共產黨|习禁评|習近平|洗尽贫|臺灣獨立|顶贴机|顶帖机|达赖|迷情水|迷情药|迷魂药|翻墙|吸精嫔|狸苛强|愚正生|脏得僵|立刻强|涨得奖|预正升|量云山|望齐山|涨高哩|两秽|淫大|政邪|管理员|版主|超级版主|超版|管理员|游客|超级管理|斑竹|板主|斑主|巡视员|核爆日本|核爆全日本|党中央|共产党|法轮功|宪章|17大|18大|1959拉萨|77元|87sun|9评|bapingfang|big纪元|Dajiyuan|fanghexie|gcd|gong匪|Lihongzhi|wjb|xuhening|罢工|罢课|薄熙来|薄一波|藏独|曹廷|肏屄|陈良宇|大法|大纪元|大江大海|兵变|邓小平|钓鱼岛|丁子霖|东泽毛|发改委|反华|和谐|高智晟|公安|共残党|共惨党|共铲党|共匪|顾顺章|官僚|自焚|国庆舆论|国殇|红朝|胡锦涛|胡主席|胡紧掏|胡紧套|胡温|胡瘟|胡吴温|胡耀邦|黄菊|贾庆林|江书记|江泽民|江主席|江家帮|江青|疆独|截访|九流干部|九评|空椅|赖昌星|李昌平|李洪志|李克强|刘晓波|刘黑手|吕新国|轮子功|毛泽东|毛主席|毛厕东|毛厕洞|毛贼东|民主|明会网|明彗网|聂绀弩|诺贝尔|諾貝爾|任继愈|上访|十八大|十七大|双规|陶驷驹|兲朝|屠华|汪兆钧|王福泉|王洪文|王佩英|网管|网监|维基|维稳办|温宝宝|温加饱|温家宝|温假饱|温云松|温总理|溫傢寶|瘟家|瘟家鸨|瘟假鸨|无帮国|无官正|吴邦国|吴江平|吴中华|吴祖光|习近平|信访|信息办|学潮|亚洲周刊|杨春林|杨继绳|姚文元|一党专政|王立军|一九五九|游行|曾庆红|曾庆鸿|曾慧燕|张春桥|章诒和|赵连海|赵子法|赵紫阳|真理|镇压|政治|中南海|中共|周永康|胡的接班人|钦定接班人|习近平|平近习|xjp|习太子|习明泽|老习|温家宝|温加宝|温x|温jia宝|温宝宝|温加饱|温加保|张培莉|温云松|温如春|温jb|胡温|胡x|胡jt|胡boss|胡总|胡王八|hujintao|胡jintao|胡j涛|胡惊涛|胡景涛|胡紧掏|湖紧掏|胡紧套|锦涛|hjt|胡派|胡主席|刘永清|胡海峰|胡海清|江泽民|民泽江|江胡|江哥|江主席|江书记|江浙闽|江沢民|江浙民|择民|则民|茳泽民|zemin|ze民|老江|老j|江core|江x|江派|江zm|jzm|江戏子|江蛤蟆|江某某|江贼|江猪|江氏集团|江绵恒|江绵康|王冶坪|江泽慧|邓小平|平小邓|xiao平|邓xp|邓晓平|邓朴方|邓榕|邓质方|毛泽东|猫泽东|猫则东|chairmanmao|猫贼洞|毛zd|毛zx|z东|ze东|泽d|zedong|毛太祖|毛相|主席画像|改革历程|朱镕基|朱容基|朱镕鸡|朱容鸡|朱云来|李鹏|李peng|里鹏|李月月鸟|李小鹏|李小琳|华主席|华国|国锋|国峰|锋同志|白春礼|薄熙来|薄一波|蔡赴朝|蔡武|曹刚川|常万全|陈炳德|陈德铭|陈建国|陈良宇|陈绍基|陈同海|陈至立|戴秉国|丁一平|董建华|杜德印|杜世成|傅锐|郭伯雄|郭金龙|贺国强|胡春华|耀邦|华建敏|黄华华|黄丽满|黄兴国|回良玉|贾庆林|贾廷安|靖志远|李长春|李春城|李建国|李克强|李岚清|李沛瑶|李荣融|李瑞环|李铁映|李先念|李学举|李源潮|栗智|梁光烈|廖锡龙|林树森|林炎志|林左鸣|令计划|柳斌杰|刘奇葆|刘少奇|刘延东|刘云山|刘志军|龙新民|路甬祥|罗箭|吕祖善|马飚|马恺|孟建柱|欧广源|强卫|沈跃跃|宋平顺|粟戎生|苏树林|孙家正|铁凝|屠光绍|王东明|汪东兴|王鸿举|王沪宁|王乐泉|王洛林|王岐山|王胜俊|王太华|王学军|王兆国|王振华|吴邦国|吴定富|吴官正|无官正|吴胜利|吴仪|奚国华|习仲勋|徐才厚|许其亮|徐绍史|杨洁篪|叶剑英|由喜贵|于幼军|俞正声|袁纯清|曾培炎|曾庆红|曾宪梓|曾荫权|张德江|张定发|张高丽|张立昌|张荣坤|张志国|赵洪祝|紫阳|周生贤|周永康|朱海仑|政治局常委|中纪委|主席像|总书记|中南海|大陆当局|中国当局|北京当局|共产党|党产共|gcd|共贪党|gongchandang|阿共|共一产一党|产党共|公产党|工产党|共c党|共x党|共铲|供产|共惨|供铲党|供铲谠|供铲裆|共残党|共残主义|共产主义的幽灵|拱铲|老共|中共|中珙|中gong|gc党|贡挡|gong党|g产|狗产蛋|共残裆|恶党|邪党|共产专制|共产王朝|裆中央|土共|土g|共狗|g匪|共匪|仇共|communistparty|政府|症腐|政腐|政付|正府|政俯|政一府|政百度府|政f|zhengfu|政zhi|挡中央|档中央|中央领导|中国zf|中央zf|国wu院|中华帝国|gong和|大陆官方|北京政权|爱女人|爱液|按摩棒|拔出来|爆草|包二奶|暴干|暴奸|暴乳|爆乳|暴淫|屄|被操|被插|被干|逼奸|仓井空|插暴|操逼|操黑|操烂|肏你|肏死|操死|操我|厕奴|插比|插b|插逼|插进|插你|插我|插阴|潮吹|潮喷|成人电影|成人论坛|成人色情|成人网站|成人文学|成人小说|艳情小说|成人游戏|吃精|赤裸|抽插|扌由插|抽一插|春药|大波|大力抽送|大乳|荡妇|荡女|盗撮|多人轮|发浪|放尿|肥逼|粉穴|封面女郎|风月大陆|干死你|干穴|肛交|肛门|龟头|裹本|国产av|好嫩|豪乳|黑逼|后庭|后穴|虎骑|花花公子|换妻俱乐部|黄片|几吧|鸡吧|鸡巴|鸡奸|寂寞男|寂寞女|妓女|激情|集体淫|奸情|叫床|脚交|金鳞岂是池中物|金麟岂是池中物|精液|就去日|巨屌|菊花洞|菊门|巨奶|巨乳|菊穴|开苞|口爆|口活|口交|口射|口淫|裤袜|狂操|狂插|浪逼|浪妇|浪叫|浪女|狼友|聊性|流淫|铃木麻|凌辱|漏乳|露b|乱交|乱伦|轮暴|轮操|轮奸|裸陪|买春|美逼|美少妇|美乳|美腿|美穴|美幼|秘唇|迷奸|密穴|蜜穴|蜜液|摸奶|摸胸|母奸|奈美|奶子|男奴|内射|嫩逼|嫩女|嫩穴|捏弄|女优|炮友|砲友|喷精|屁眼|品香堂|前凸后翘|强jian|强暴|强奸处女|情趣用品|情色|拳交|全裸|群交|惹火身材|人妻|人兽|日逼|日烂|肉棒|肉逼|肉唇|肉洞|肉缝|肉棍|肉茎|肉具|揉乳|肉穴|肉欲|乳爆|乳房|乳沟|乳交|乳头|三级片|骚逼|骚比|骚女|骚水|骚穴|色逼|色界|色猫|色盟|色情网站|色区|色色|色诱|色欲|色b|少年阿宾|少修正|射爽|射颜|食精|释欲|兽奸|兽交|手淫|兽欲|熟妇|熟母|熟女|爽片|爽死我了|双臀|死逼|丝袜|丝诱|松岛枫|酥痒|汤加丽|套弄|体奸|体位|舔脚|舔阴|调教|偷欢|偷拍|推油|脱内裤|文做|我就色|无码|舞女|无修正|吸精|夏川纯|相奸|小逼|校鸡|小穴|小xue|写真|性感妖娆|性感诱惑|性虎|性饥渴|性技巧|性交|性奴|性虐|性息|性欲|胸推|穴口|学生妹|穴图|亚情|颜射|阳具|杨思敏|要射了|夜勤病栋|一本道|一夜欢|一夜情|一ye情|阴部|淫虫|阴唇|淫荡|阴道|淫电影|阴阜|淫妇|淫河|阴核|阴户|淫贱|淫叫|淫教师|阴茎|阴精|淫浪|淫媚|淫糜|淫魔|淫母|淫女|淫虐|淫妻|淫情|淫色|淫声浪语|淫兽学园|淫书|淫术炼金士|淫水|淫娃|淫威|淫亵|淫样|淫液|淫照|阴b|应召|幼交|幼男|幼女|欲火|欲女|玉女心经|玉蒲团|玉乳|欲仙欲死|玉穴|援交|原味内衣|援助交际|张筱雨|招鸡|招妓|中年美妇|抓胸|自慰|作爱|18禁|99bb|a4u|a4y|adult|amateur|anal|a片|fuck|gay片|g点|g片|hardcore|h动画|h动漫|incest|porn|secom|sexinsex|sm女王|xiao77|xing伴侣|tokyohot|yin荡|六四|1989北京|64白皮书|64大屠杀|64风波|64纪录片|64事件|64运动|64真相|6月4|5月35|8964|89民运|89年|8pingfang|8square|8平方|98屠杀|八九|八平方|一九八九|吸精瓶|习大大|江贼民|王维林|江绵恒|江绵康|朱云来|朱燕来|彭丽媛|齐巧巧|齐桥桥|陈光诚|习明泽|胡海清|温如春|张蓓莉|温家宏|雪山狮子旗|共產黨|习禁评|習近平|洗尽贫|臺灣獨立|顶贴机|顶帖机|达赖|迷情水|迷情药|迷魂药|翻墙|吸精嫔|狸苛强|愚正生|脏得僵|立刻强|涨得奖|预正升|量云山|望齐山|涨高哩|两秽|淫大|政邪|管理员|版主|超级版主|超版|管理员|游客|超级管理|斑竹|板主|斑主|巡视员|核爆日本|核爆全日本|党中央|共产党|法轮功|宪章|17大|18大|1959拉萨|77元|87sun|9评|bapingfang|big纪元|Dajiyuan|fanghexie|gcd|gong匪|Lihongzhi|wjb|xuhening|罢工|罢课|薄熙来|薄一波|藏独|曹廷|肏屄|陈良宇|大法|大纪元|大江大海|兵变|邓小平|钓鱼岛|丁子霖|东泽毛|发改委|反华|和谐|高智晟|公安|共残党|共惨党|共铲党|共匪|顾顺章|官僚|自焚|国庆舆论|国殇|红朝|胡锦涛|胡主席|胡紧掏|胡紧套|胡温|胡瘟|胡吴温|胡耀邦|黄菊|贾庆林|江书记|江泽民|江主席|江家帮|江青|疆独|截访|九流干部|九评|空椅|赖昌星|李昌平|李洪志|李克强|刘晓波|刘黑手|吕新国|轮子功|毛泽东|毛主席|毛厕东|毛厕洞|毛贼东|民主|明会网|明彗网|聂绀弩|诺贝尔|諾貝爾|任继愈|上访|十八大|十七大|双规|陶驷驹|兲朝|屠华|汪兆钧|王福泉|王洪文|王佩英|网管|网监|维基|维稳办|温宝宝|温加饱|温家宝|温假饱|温云松|温总理|溫傢寶|瘟家|瘟家鸨|瘟假鸨|无帮国|无官正|吴邦国|吴江平|吴中华|吴祖光|习近平|信访|信息办|学潮|亚洲周刊|杨春林|杨继绳|姚文元|一党专政|王立军|一九五九|游行|曾庆红|曾庆鸿|曾慧燕|张春桥|章诒和|赵连海|赵子法|赵紫阳|真理|镇压|政治|中南海|中共|周永康";
    protected $_SERVER_LIST = array(
        array(//img_ftp 4
            'WWW' => 'http://img.news18a.com',
            'STATIC' => '/data/',
            'TEMPLATE' => '/export/home/cms/www/template.img.newsa.com.cn',
            'FTP_CFG' => array(
                array(
                    'FTP_SVR' => '10.15.200.11',
                    'FTP_USER' => "img_ftp",
                    'FTP_PWD' => "PMRcmeN6ZZYNk",
                    'FTP_DIR' => ""
                ),
            ),
        )
    );
    //上传目录
//    protected $upload_dir = './Public/Uploads/cover/';
    protected $upload_dir = '/tmp/';
    protected $ftp_img_path = 'http://img.news18a.com/community/';
    protected $ina_from = 'shequ';
    protected $no_ina_from = array(
        'show',
        'index',
        'column',
        'hot',
        'boutique',
    );

    public function __construct()
    {
        parent::__construct();

        $this->assign('action_name', ACTION_NAME);
        $this->assign('module_name', MODULE_NAME);

        //消息数量显示
        $this->hfnum();
    }

    //导航显示
    public function keyword()
    {
        $cc = M('Cat');
        $res = $cc->field('id,name')->where('pid=0 and id in(1,4,999)')->order('id asc')->select();

        $this->assign('cat', $res);
    }

    /**
     *检查来源url后缀，若不存在默认带本站的标识
     */
    public function check_url(){
        $ina_from = I('get.ina_from');
        //具体请求的方法在范围内，加后缀
        //如果带标记,一直以这个标记访问

        //不带标记,默认添加社区标记
        if(in_array(ACTION_NAME,$this->no_ina_from)){
            $referer_host = $_SERVER['HTTP_REFERER'] ? parse_url($_SERVER['HTTP_REFERER']) : false; //来路域名
            $host = 'http://' . $_SERVER['HTTP_HOST'].$_SERVER['DOCUMENT_URI']; //本次请求url
            if($ina_from){
                $_COOKIE['ina_from'] == $ina_from ? '' : cookie('ina_from', $ina_from, 86400);
            }else{
                if($_COOKIE['ina_from']){
                    header('Location: ' . $host . '?ina_from=' . $_COOKIE['ina_from']);
                    exit();
                }else{
                    cookie('ina_from', $this->ina_from, 86400);
                    header('Location: ' . $host . '?ina_from=' . $this->ina_from);
                    exit();
                }

            }

        }
    }

    //查询用户的发帖数，关注，粉丝数页面使用
    protected function get_user_info_data($uid)
    {
        //发帖数
        $count_mess = M('Message')->where('status = 1 and uid = ' . $uid)->count();
        $this->assign('count_mess', $count_mess);
        //关注数
        $sql = "select count(*) as counts from cms_app_user as a left join bbs_friend as b on a.id = b.uid where b.uid = " . $uid;
        $count_f_array = M()->query($sql);
        //$count_f = M('Friend')->where('uid = ' . $uid)->count();
        $count_f = $count_f_array[0]['counts'];
        $this->assign('count_f', $count_f);
        $sql = "select count(*) as counts from cms_app_user as a left join bbs_friend as b on a.id = b.uid where b.fid = " . $uid;
        $count_s_array = M()->query($sql);
        //粉丝数
        //$count_s = M('Friend')->where('fid = ' . $uid)->count();
        $count_s = $count_s_array[0]['counts'];
        $this->assign('count_s', $count_s);
    }

    //查询用户的发帖数，关注，粉丝数循环中使用
    protected function get_other_user_info_data($uid)
    {
        $tmp_array = array();
        //发帖数
        $count_mess = M('Message')->where('status = 1 and uid = ' . $uid)->count();
        $tmp_array[] = $count_mess;
        //关注数
        $sql = "select count(*) as counts from cms_app_user as a left join bbs_friend as b on a.id = b.uid where b.uid = " . $uid;
        $count_f_array = M()->query($sql);
        //$count_f = M('Friend')->where('uid = ' . $uid)->count();
        $count_f = $count_f_array[0]['counts'];
        $tmp_array[] = $count_f;
        //粉丝数
        $sql = "select count(*) as counts from cms_app_user as a left join bbs_friend as b on a.id = b.uid where b.fid = " . $uid;
        $count_s_array = M()->query($sql);
        //$count_s = M('Friend')->where('fid = ' . $uid)->count();
        $count_s = $count_s_array[0]['counts'];
        $tmp_array[] = $count_s;
        //帖数，关注，粉丝
        return $tmp_array;
    }

    //获取img标签的全部属性
    public function extract_attrib($tag) {
        preg_match_all('/(id|alt|title|src)=("[^"]*")/i', $tag, $matches);
        $ret = array();
        foreach($matches[1] as $i => $v) {
            $ret[$v] = $matches[2][$i];
        }
        return $ret;
    }

    //读取发帖配置
    protected function get_message_config()
    {
        $sql = 'select is_examine from bbs_global_config where id = 1';
        $res = M()->query($sql);
        return $res[0]['is_examine'];
    }

    //获取热门文章列表
    protected function get_hot()
    {
        $model = M('Message');
        $hot_lsit = $model->where('status = 1')->order('show_scan desc')->limit(5)->select();
        if ($hot_lsit) {
            foreach ($hot_lsit as &$v) {
                $v['cover'] = $this->ftp_img_path . $v['cover'];
                $v['cover2'] = $this->ftp_img_path . $v['cover2'];
            }
        }
        $this->assign('hot_lsit', $hot_lsit);
    }

    //时间单位变换方法
    public function get_time_Company($original_time)
    {
        $time = time();
        $result = '';
        if ($time - $original_time < 60) {//秒级
            //$result = $time - $original_time . '秒前';
            $result = '刚刚';
        } else if (($time - $original_time) >= 60 && ($time - $original_time) < 3600) {//分级
            $result = floor(($time - $original_time) / 60) . '分钟前';
        } else if (($time - $original_time) >= 3600 && ($time - $original_time) < 86400) {//小时级
            $result = floor(($time - $original_time) / 3600) . '小时前';
        } else if (($time - $original_time) >= 86400 && ($time - $original_time) < 604800) {//天
            $result = floor(($time - $original_time) / 86400) . '天前';
        } else {
            // $result = floor(($time - $original_time) / 86400) . '天前'; //天
            $result = date('Y-m-d', $original_time);
        }
        return $result;
    }

    //上传
    public function swf_uploadpic()
    {
        if ($_POST['sessionid']) {
            session('[pause]');
            session_id($_POST['sessionid']);
            session('[start]');
        }
        if (!$_SESSION[C('USER_AUTH_KEY')]['id']) {
            echo 1;
            die;
        }
        //执行上传
        $return = $this->uploadpic(150, 150);
        echo $return;

        //}
    }

    //发帖上传图片
    public function add_uploadpic() {

        if ($_POST['sessionid']) {
            session('[pause]');
            session_id($_POST['sessionid']);
            session('[start]');
        }

//        if (!$_SESSION[C('USER_AUTH_KEY')]['id']) {
//            echo 1;
//            die;
//        }

        $sizeproportion = intval($_POST['sizeproportion']);
        if ($sizeproportion == 1) {
            $w = 1000;
        } else if ($sizeproportion == 2) {
            $w = 600;
        } else if ($sizeproportion == 3) {
            $w = 200;
        }
        //执行上传
        $return = $this->uploadpic($w);
        echo $return;

        //}
    }

    //图片上传显示裁剪
    public function uploadpic($w) {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = 10485760; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'bmp', 'png', 'jpeg'); // 设置附件上传类型
        $upload->savePath = $this->upload_dir; // 设置附件上传目录
        if (!$upload->upload()) {
            return $upload->getErrorMsg();
        } else {
            $info = $upload->getUploadFileInfo();
        }
        $picsrc = $info[0]['savename'];
        $path = $this->upload_dir;
        //去压缩
        $update_img = $this->updateImage($picsrc, $path, "s_", $w);
        //$update_img[picname,times]
        //删除最原始的上传图
        unlink($path . $picsrc);
        //返回压缩后的文件名
        $sizeproportion = intval($_POST['sizeproportion']);
        if ($sizeproportion == 1) {

        } else if ($sizeproportion == 2) {//发帖图
            $ftp_path = date('Ymd', time()) . '/';
        } else if ($sizeproportion == 3) {//头像
            $ftp_path = '/portrait/';
        }
        $return_array = array();
        $return_array['pic'] = $ftp_path . $update_img['pic'];
        $return_array['times'] = $update_img['times'];
        return json_encode($return_array);
    }

    //图片缩放
    public function updateImage($picname, $path, $prix = "s_", $w) {
        //导入图片处理类和http处理类
        import("ORG.Net.Http");
        import("ORG.Util.Image.ThinkImage");
        $image = new ThinkImage();
        $flag = 1; //默认图片等比例缩放

        //1. 定义获取基本信息
        $path = rtrim($path, "/"); //去除后面多余的"/"
        //$info = getimagesize($path . "/" . $picname);  //获取图片文件的属性信息
        $image->open($path . "/" . $picname);
        $width = $image->width();
        $height = $image->height();
        //获取原来图片的长宽比例
        $h = intval($height * $width / $w);
        $times = 0;
        $sizeproportion = intval($_POST['sizeproportion']);
        if ($sizeproportion == 1) {
            if ($h < 500) {
                $h = 500;
            }
        } else if ($sizeproportion == 2) {
            if ($width < 600 && $height < 300) {
                echo 99;
                die; //比例不合适
            } elseif ($width >= 600 && $width < 1200) {
                $w = 600;
            } elseif ($width >= 1200 && $width < 1800) {
                $w = 900;
            }elseif ($width >= 1800 && $width < 2400) {
                $w = 900;
            } else {
                $w = 1800;
            }
            //$w = 1000;
//            $h = intval(floatval(sprintf("%.1f", floatval(1000 / $width))) * $height);
            //if ($h < 500) {
//                echo 99;
//                die; //比例不合适
            //$w = intval(500 / $height) * $width;
//            //}
            //图片
            $ftp_path = '/community/' . date('Ymd', time()) . '/';
        } else if ($sizeproportion == 3) {
            if($width != 200){
                echo 'no';
                die;
            }elseif($height != 200){
                echo 'no';
                die;
            }
            $h = intval(floatval(sprintf("%.1f", floatval(150 / $width))) * $height);


//            if ($h < 150) {
//                $h = 150;
//            }
            //头像
            $ftp_path = '/community/portrait';
        } else {
            if ($width >= 900) {
                $w = 900;
                //$h = intval(800 / $width) * $height;
                $h = intval(floatval(sprintf("%.1f", floatval(900 / $width))) * $height);
            } else {
                $w = $width;
                $h = $height;
            }
        }

        //根据原图片类型来创建图片源
        //4. 执行缩放处理

        $image->thumb($w,$h,1)->save( $path . "/" . $prix . $picname);

        if($sizeproportion != 3){

            $image->open( $path . "/" . $prix . $picname);
            $newHeight = $image->height();
            $newWidth = $image->width();

            if($newWidth < 600){
                echo 33;  //比例不合适,要求等比压缩后的图片高度不低于300,宽度不低于600
                die;
            }elseif($newHeight < 300){
                echo 33;
                die;
            } elseif ($newWidth >= 600 && $newWidth < 1200) {
                $times = 1;
            } elseif ($newWidth >= 1200 && $newWidth < 1800) {
                $times = 1;
            }elseif ($newWidth >= 1800 && $newWidth < 2400) {
                $times = 2;
            } else {
                $times = 3;
            }

        }
//        exec("convert " . $path . "/" . $picname . " -resize " . $w . "x " . $path . "/" . $prix . $picname);
//        echo "/export/script/cut_pic.sh " . $path . "/" . $picname . " " . $path . "/" . $prix . $picname . " " . $w . "x" . $h;
//        die;
//        system("/export/script/cut_pic.sh " . $path . "/" . $picname . " " . $path . "/" . $prix . $picname . " " . $w . "x" . $h);
        //5. 输出保存绘画
        //header("Content-Type:".$info['mime']); //设置响应类型为图片格式
        //根据原图片类型来保存新图片
//        switch ($info[2]) {
//            case 1: //gif格式
//                imagegif($newim, $path . "/" . $prix . $picname); //保存
//                //imagegif($newim);//输出
//                break;
//            case 2: //jpeg格式
//                imagejpeg($newim, $path . "/" . $prix . $picname);
//                //imagejpeg($newim);
//                break;
//            case 3: //png格式
//                imagepng($newim, $path . "/" . $prix . $picname);
//                //imagepng($newim);
//                break;
//            case 6: //bmp格式
//                imagebmp($newim, $path . "/" . $prix . $picname);
//                break;
//        }
        //服务器的文件路径
        $aDestination_file[] = $ftp_path . '/' . $prix . $picname;
        //本地的的文件路径
        $aSource_file[] = $path . '/' . $prix . $picname;
        $this->ftp_copy_files($aDestination_file, $aSource_file, 0, FTP_BINARY);
        $return_array = array();
        $return_array['pic'] = $prix . $picname;
        $return_array['times'] = $times;
        //删除裁剪前的图片
        unlink($path . "/" . $prix . $picname);
        return $return_array;
        //6. 销毁资源
//        imageDestroy($newim);
//        imageDestroy($srcim);
    }

    //图片缩放
    public function back_updateImage($picname, $path, $prix = "s_", $w)
    {

        //导入图片处理类和http处理类
        import("ORG.Net.Http");
        import("ORG.Util.Image.ThinkImage");
        $image = new ThinkImage();
        $flag = 1; //默认图片等比例缩放

        //1. 定义获取基本信息
        $path = rtrim($path, "/"); //去除后面多余的"/"
        $newPath = $path . "/" . $prix . $picname;
        $picture = $path . "/" . $picname;

        $image->open($picture);
        $type = $image->type();    //获取图片文件的属性信息
        $width = $image->width(); //原图片的宽度
        $height = $image->height(); //原图片的高度

        //获取原来图片的长宽比例
        $h = intval($height * $width / $w);
        $times = 0;
        $sizeproportion = intval($_POST['sizeproportion']);
        if ($sizeproportion == 1) {
            if($width < 150){ return '';}
            if($height < 150){ return '';}
            if ($h < 500) {
                $h = 500;
            }
        } else if ($sizeproportion == 2) {
            if ($width < 600) {
                echo 99;
                die; //比例不合适
            } elseif($height < 400){
                echo 99;
                die;
            }elseif ($width >= 750 && $width < 1500) {
                $times = 1;
                $w = 800;
            } elseif ($width >= 1500 && $width < 2250) {

                $times = 1;
                $w = 800;
            } else {
                $times = 3;
                $w = 2250;
            }

            //图片
            $ftp_path = '/community/' . date('Ymd', time()) . '/';
        } else if ($sizeproportion == 3) {
            $w = 200;
            $h = intval(floatval(sprintf("%.1f", floatval(150 / $width))) * $height);
            if ($h < 150) {
                $h = 150;
            }
            $flag = 6; //固定尺寸缩放
            //头像
            $ftp_path = '/community/portrait';
        } else {
            if ($width >= 800) {
                $w = 800;
                $h = intval(floatval(sprintf("%.1f", floatval(800 / $width))) * $height);
            } else {
                $w = $width;
                $h = $height;
            }
        }

        $image->thumb($w,$h,$flag)->save($path . "/" . $prix . $picname);

        //服务器的文件路径
        $aDestination_file[] = $ftp_path . '/' . $prix . $picname;
        //本地的的文件路径
        $aSource_file[] = $path . '/' . $prix . $picname;
        $this->ftp_copy_files($aDestination_file, $aSource_file, 0, FTP_BINARY);
        //删除裁剪前的图片
        unlink($path . "/" . $prix . $picname);
        $return_array = array();
        $return_array['pic'] = $prix . $picname;
        $return_array['times'] = $times;
        return $return_array;
        //6. 销毁资源
//        imageDestroy($newim);
//        imageDestroy($srcim);
    }

    //接受裁剪数据
    public function cut_pic_size()
    {
        if ($_POST) {
            if ($_POST['pic_times'] != '' && $_POST['pn'] != '' && $_POST['x'] != '' && $_POST['y'] != '' && $_POST['w'] != '' && $_POST['h'] != '' && $_POST['type'] != '') {
                //header("Content-type:text/html;charset=utf-8");

                $new_x = intval($_POST['x']) * intval($_POST['pic_times']);
                $new_y = intval($_POST['y']) * intval($_POST['pic_times']);
                $new_w = intval($_POST['w']) * intval($_POST['pic_times']);
                $new_h = intval($_POST['h']) * intval($_POST['pic_times']);
                $rel_w = intval($_POST['realW']) * intval($_POST['pic_times']);
                $rel_h = intval($_POST['realH']) * intval($_POST['pic_times']);

                $pn = explode('/', $_POST['pn']);
                echo $this->cut_pic(end($pn), $this->upload_dir, $new_x, $new_y, $new_w, $new_h, "x_", $_POST['type'], $rel_w, $rel_h);
            }
        }
    }

    //根据点位坐标裁剪图片     (图片名称,图片路径,x坐标,y坐标,长度,宽度,前缀,展示宽度，展示高度)
    public function cut_pic($picname, $path, $x, $y, $width, $height, $prix = "x_", $type, $rel_w, $rel_h)
    {
        //导入图片处理类和http处理类
        import("ORG.Net.Http");
        import("ORG.Util.Image.ThinkImage");
        $image = new ThinkImage();
        $http = new Http();

        //去除后面多余的"/"
        $path = rtrim($path, "/");

        //获取图片文件的属性信息
        if ($type == 1) {
            $ftp_path = '/community/portrait';
            $ftp_yuancheng = 'http://img.news18a.com/community/portrait/';
            $save_path = 'portrait/';
        } elseif ($type == 2) {//发帖图
            $ftp_path = '/community/' . date('Ymd', time());
            $ftp_yuancheng = 'http://img.news18a.com/community/' . date('Ymd', time()) . '/';
            $save_path = date('Ymd', time()) . '/';
        }


        $remote_pictrue = $ftp_yuancheng . $picname;    //远程地址
        $local_pictrue = $path . '/' . $picname;    //本地保存路径


        $http->curlDownload($remote_pictrue, $local_pictrue);   //抓取远程图片到本地
        $image->open($local_pictrue);

        $imgwidth = $image->width(); // 返回图片的宽度
        $imgheight = $image->height(); // 返回图片的高度

        //x的比例 = 原图尺寸w/显示尺寸w，y的比例也是如此计算
//        $old_x = ($imgwidth / $rel_w);
//        $old_y = ($imgheight / $rel_h);

//        $x = $x * $old_x;
//        $y = $y * $old_y;

        //将图片裁剪为指定比例并保存
        $image->crop($width, $height,$x,$y,600,300)->save($path . '/' . $prix . $picname);


        //ftp上传路径
        //服务器的文件路径
        $aDestination_file[] = $ftp_path . '/' . $prix . $picname;

        //本地的的文件路径
        $aSource_file[] = $path . '/' . $prix . $picname;

        $this->ftp_copy_files($aDestination_file, $aSource_file, 0, FTP_BINARY);

        //删除裁剪前的图片
//        unlink($path . "/" . $picname);
//        unlink($path . '/' . $prix . $picname);
//        unlink("/tmp/" . $picname);

        return $save_path . $prix . $picname;
    }

    //获取city
    public function getcitybyprovince()
    {
        $province = intval($_POST['province']);
        $province = $province ? $province : 1;
        $cmodel = M('InaCity');
        $city = $cmodel->where('provinceID=' . $province)->field('cityID,cityNameC')->select();
        echo json_encode($city);
    }

    //根据日期获取星座
    public function get_constellation($month=1, $day=1)
    {
        if ($month < 1 || $month > 12 || $day < 1 || $day > 31) {
            return false;
        }
        // 星座名称以及开始日期
        $constellations = array(
            array("20" => "水瓶座"),
            array("19" => "双鱼座"),
            array("21" => "白羊座"),
            array("20" => "金牛座"),
            array("21" => "双子座"),
            array("22" => "巨蟹座"),
            array("23" => "狮子座"),
            array("23" => "处女座"),
            array("23" => "天秤座"),
            array("24" => "天蝎座"),
            array("22" => "射手座"),
            array("22" => "摩羯座")
        );



        list($constellation_start, $constellation_name) = each($constellations[(int)$month - 1]);
        if ($day < $constellation_start)
            list($constellation_start, $constellation_name) = each($constellations[($month - 2 < 0) ? $month = 11 : $month -= 2]);

        return $constellation_name;
    }


    //星座值互换,默认按名称取星座值
    public function get_constellation_value($name, $type = false){
        //星座和对应值互换
        $xingzuo = $this->xingzuo();

        //按值来取星座名称
        if($type){
            $xingzuo = array_flip($xingzuo);
            return $xingzuo[$name];
        }

        return $xingzuo[$name];


    }

    public function xingzuo(){
        $xingzuo = array(
            '处女座' => 1,
            '水瓶座' => 2,
            '天秤座' => 3,
            '射手座' => 4,
            '双子座' => 5,
            '金牛座' => 6,
            '巨蟹座' => 7,
            '天蝎座' => 8,
            '狮子座' => 9,
            '白羊座' => 10,
            '摩羯座' => 11,
            '双鱼座' => 12,
        );
        return $xingzuo;
    }

    //获取头像
    public function get_portrait($picture, $sex)
    {
        if ($picture) {
            //$ftp_img_path
            // $picture_path = $this->ftp_img_path . $picture;
            $picture_path = $picture;
        } else {
            if ($sex == 1) {
                $picture_path = 'http://img.news18a.com/community/image/man.png';
            } else {
                $picture_path = 'http://img.news18a.com/community/image/women.png';
            }
        }
        return $picture_path;
    }

    //消息中心
    public function mynews()
    {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {

            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];

            $IDs = array(
                '2061',
                '1750',
                '830',
                '1413',
                '1914',
                '522'
            );

            //最新贴
            $somewhere =array();
            $somewhere['id'] = array('in',$IDs);
            $somewhere['status'] = '1';

            $activity = M('Message')->where($somewhere)->limit(5)->order('addtime desc')->select();

            foreach ($activity as &$vo) {
                //计算时间差
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);


                //缩略图显示
                $vo['cover'] = $this->ftp_img_path . $vo['cover'];

                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];

            }


            //查看和已查看的
            $where = 'userid=' . $uid . ' and status in(0,1)';
            import("ORG.Util.Page");    //导入分页类
            $count = M('NewsManagement')->where($where)->count();       //获取总数据条数
            //未查看的
            $where2 = 'userid=' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and status = 0';
            $count_w = M('NewsManagement')->where($where2)->count();
            $this->assign('count_w', $count_w);
            $page = new Page($count, 15);  //创建分页对象
            //查询个人的消息数据
            $news_data = M('NewsManagement')->where($where)->order('create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();

            if ($news_data) {
                foreach ($news_data as $key => &$v) {
                    if ($v['act_userid']) {
                        $userInfo = D('Users')->get_user_info($v['act_userid']);
                        $a = "<a href='/index.php/Ucenter/uspace/uid/" . $userInfo['id'] . "'>" . $userInfo['username'] . "</a>";
                    }

                    $v['create_time'] = date('Y-m-d H:i:s', $v['create_time']);
                    $v['message'] = $a . $v['message'];
                    $v['photo'] = $userInfo['photo'] ? $userInfo['photo'] : $userInfo['picture_path'];
                }
            }


            $_M_user = D('Users');
            $user = $_M_user->get_user_info($uid);

            if (empty($user['name'])) {
                $this->redirect('Ucenter/euserinfo');
            }

            //头像显示
            $user['picture_path'] = $this->get_portrait($user['photo'], $user['sex']);

            //用户名
            $user['username'] = $user['name'] ? $user['name'] : $user['phone'];
            $user['introduce'] = $user['introduce'] ? $user['introduce'] : '这个人很懒，什么都没有留下~';

            //热门文章
            $this->get_hot();
            //查询用户的帖子数关注及粉丝数
            $this->get_user_info_data($uid);
            $this->assign('user', $user);
            $this->assign('count', $count > 15 ? true : false);
            $this->assign('news_data', $news_data);
            $this->assign('activity', $activity);
            $this->assign('pageinfo', $page->show());

            $this->display();
        } else {
            $this->redirect('Users/login');
        }
    }

    //增加消息中心数据

    /*
     * $act_userid 操作人的id
     * $message_id 文章的id、
     * $message_content[评论|回复的内容]
     * $message_type 操作的类型[1文章消息|2系统消息]
     * $message_type_str [评论|回复|升级]
     */
    public function add_news_management($act_userid, $message_id, $message_content, $message_type = 1, $message_type_str = '评论')
    {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $mmodel = M('Message');
            $message_info = $mmodel->where('id=' . $message_id)->find();
            if ($message_type == 1) {//评论
                $message_type_con = '文章消息';
                //查询用户信息
                //$umodel = M('Users');
                //$user_info = $umodel->where('id=' . $act_userid)->find();
                $_M_user = D('Users');
                $user_info = $_M_user->get_user_info($act_userid);
                $user_info['username'] = $user_info['name'] ? $user_info['name'] : $user_info['phone'];
                $message_ins = $message_type_str . "了你的帖子 《" . $message_info['title'] . "》，" . $message_type_str . "内容:" . $message_content;
            } elseif ($message_type == 2) {//回复
                $message_type_con = '文章消息';
                //查询用户信息
                //$umodel = M('Users');
                //$user_info = $umodel->where('id=' . $act_userid)->find();
                $_M_user = D('Users');
                $user_info = $_M_user->get_user_info($act_userid);
                $user_info['username'] = $user_info['name'] ? $user_info['name'] : $user_info['phone'];
                $message_ins = $message_type_str . "了你的帖子 《" . $message_info['title'] . "》，" . $message_type_str . "内容:" . $message_content;
            } else {
                $act_userid = 0;
                $message_type_con = '系统消息';
                $message_ins = "恭喜你,你发布的帖子《" . $message_info['title'] . "》被版主选为精华帖，继续努力吧！";
            }
            //查询帖子信息

            $time = time();
            $status = 0;
            $array = array(
                'userid' => $message_info['uid'],
                'act_userid' => $act_userid,
                'message_id' => $message_id,
                'message_type' => $message_type_con,
                'message' => $message_ins,
                'status' => $status,
                'create_time' => $time
            );
            $mod = M('NewsManagement', 'bbs_', 'DB_CONFIG2');
            $res = $mod->add($array);
        }
    }

    //统计消息数量
    public function hfnum()
    {
        if ($_SESSION[C('USER_AUTH_KEY')]) {
            //查询消息数量
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
            $msg = M('NewsManagement');
            $count = $msg->where('userid=' . $uid . ' and status = 0')->count();
            $this->assign('ms_count', $count);
        }
    }

    //删除全部的通知
    public function delete_all()
    {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $id = intval($_POST['id']);
            if ($id) {
                $sql = "update bbs_news_management set status=2 where userid=" . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and id=' . $id;
            } else {
                $sql = "update bbs_news_management set status=2 where userid=" . $_SESSION[C('USER_AUTH_KEY')]['id'];
            }
            $res = M('', 'bbs_', 'DB_CONFIG2')->query($sql);
            if (empty($res)) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }

    //全部标记为已读
    public function is_reade_all()
    {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $id = intval($_POST['id']);
            if ($id) {
                $sql = "update bbs_news_management set status=1 where status=0 and userid=" . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and id=' . $id;
            } else {
                $sql = "update bbs_news_management set status=1 where status=0 and userid=" . $_SESSION[C('USER_AUTH_KEY')]['id'];
            }
//            demo($sql);
            $res = M('', 'bbs_', 'DB_CONFIG2')->query($sql);
            if (empty($res)) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }

    //fpt上传//
    /*
     * 功能:分发文件
     * param 目标文件数组,原文件数组
     * return 如果有失败则返回一个大于0的值
     */
    protected function ftp_copy_files($aDestination_file, $aSource_file, $serverindex, $ftp_mode)
    {
        if (!$aDestination_file || !$aSource_file) {
            return;
        }
        //global $_SERVER_LIST;
        $_SERVER_LIST = $this->_SERVER_LIST;
        if (isset($_SERVER_LIST[$serverindex]['FTP_CFG']) && is_array($_SERVER_LIST[$serverindex]['FTP_CFG']) && count($_SERVER_LIST[$serverindex]['FTP_CFG']) > 0) {
            $aFTP_CFG = $_SERVER_LIST[$serverindex]['FTP_CFG'];
            for ($i = 0; $i < count($aFTP_CFG); $i++) {
                $aFtp_server[] = $aFTP_CFG[$i]['FTP_SVR'];
                $aFtp_user_name[] = $aFTP_CFG[$i]['FTP_USER'];
                $aFtp_user_pass[] = $aFTP_CFG[$i]['FTP_PWD'];
                $aFtp_dir[] = $aFTP_CFG[$i]['FTP_DIR'];
            }
        } else {
            //如果没有配置ftp服务器信息，直接返回，不做分发处理
            return;
        }
        if (isset($aFtp_server) && count($aFtp_server) > 0) {
            for ($y = 0; $y < count($aFtp_server); $y++) {
                $ftp_server = $aFtp_server[$y];
                $ftp_user_name = $aFtp_user_name[$y];
                $ftp_user_pass = $aFtp_user_pass[$y];
                $ftp_dir = $aFtp_dir[$y];
                $conn_id = ftp_connect($ftp_server);
                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                if ((!$conn_id) || (!$login_result)) {
                    $this->errinfo($ftp_server . ":" . $ftp_user_name . ",连接FTP服务器出问题!");
                }
                //循环上传文件
                if (is_array($aDestination_file) && is_array($aSource_file) && count($aDestination_file) > 0 && count($aSource_file) > 0) {
                    for ($x = 0; $x < count($aDestination_file); $x++) {
                        $destination_file = $aDestination_file[$x];
                        $source_file = $aSource_file[$x];

                        //创建目录
                        $aPath = explode("/", $destination_file);
                        array_pop($aPath);
                        if (is_array($aPath) && count($aPath) > 0) {
                            $path = "";
                            foreach ($aPath as $key => $val) {
                                $path .= "/" . $val;
                                @ftp_mkdir($conn_id, $path);
                            }
                        }

                        //上传文件
                        $upload = ftp_put($conn_id, $destination_file, $source_file, $ftp_mode);
                        //unlink($source_file);
                        if (!$upload) {
                            $this->errinfo($ftp_server . ":" . $ftp_user_name . ",上传失败!");
                        }
                    }
                }
                ftp_close($conn_id);
            }
        }
    }

    private function errinfo($err)
    {
        die("<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><font color='red'><b>系统错误:" . $err . "</b></font>");
    }

    //删除ftp服务器文件
    private function ftp_del_files($files, $serverindex)
    {

        $_SERVER_LIST = $this->_SERVER_LIST;

        if (isset($_SERVER_LIST[$serverindex]['FTP_CFG']) && is_array($_SERVER_LIST[$serverindex]['FTP_CFG']) && count($_SERVER_LIST[$serverindex]['FTP_CFG']) > 0) {
            $aFTP_CFG = $_SERVER_LIST[$serverindex]['FTP_CFG'];
            for ($i = 0; $i < count($aFTP_CFG); $i++) {
                $aFtp_server[] = $aFTP_CFG[$i]['FTP_SVR'];
                $aFtp_user_name[] = $aFTP_CFG[$i]['FTP_USER'];
                $aFtp_user_pass[] = $aFTP_CFG[$i]['FTP_PWD'];
                $aFtp_dir[] = $aFTP_CFG[$i]['FTP_DIR'];
            }
        }
        if (isset($aFtp_server) && count($aFtp_server) > 0) {
            for ($y = 0; $y < count($aFtp_server); $y++) {
                $ftp_server = $aFtp_server[$y];
                $ftp_user_name = $aFtp_user_name[$y];
                $ftp_user_pass = $aFtp_user_pass[$y];
                $ftp_dir = $aFtp_dir[$y];
                $conn_id = ftp_connect($ftp_server);
                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                if ((!$conn_id) || (!$login_result)) {
                    $this->errinfo("连接FTP服务器出问题!");
                }
                //循环删除文件
                if (is_array($files) && count($files) > 0 && count($files) > 0) {
                    for ($x = 0; $x < count($files); $x++) {
                        $tmp_file = $files[$x];
                        echo $tmp_file;
                        die;
                        ftp_delete($conn_id, $tmp_file);
                    }
                }
                ftp_close($conn_id);
            }
        }
    }

    /**
     * 过滤emoji表情
     * @param string $str 字符串
     * @return string
     */
    function filterEmoji($str)
    {
        if (empty($str))
            return null;
        $str = preg_replace_callback(
            '/[\xf0-\xf7].{3}/', function ($r) {
            return '@E' . base64_encode($r[0]);
        }, $str);
        $countt = substr_count($str, "@");
        for ($i = 0; $i < $countt; $i++) {
            $c = stripos($str, "@");
            $str = substr($str, 0, $c) . substr($str, $c + 10, strlen($str) - 1);
        }
        $str = preg_replace_callback(
            '/@E(.{6}==)/', function ($r) {
            return base64_decode($r[1]);
        }, $str);
        return $str;
    }

    /**
     * @初始化 redis
     */

    private function _initRedis()
    {
        if ($this->_Redis)
            return true;
        $this->_Redis = new \Redis;
        $this->_Redis->connect('127.0.0.1', '6379');
//        $this->_Redis->connect('10.19.200.56', '6379');
    }

    /**
     * 访问量增加 1
     *
     * @param int $id
     */
    public function _setPageviews($id)
    {
        $key = "bbs_" . $id;
        $this->_initRedis();
        $this->_Redis->incr($key);
    }

    public function _getPageviews($id)
    {
        $key = "bbs_" . $id;
        $this->_initRedis();
        return $this->_Redis->get($key);
    }

    //排序
    public function multi_array_sort(&$multi_array, $sort_key, $sort = SORT_DESC)
    {
        if (is_array($multi_array)) {
            foreach ($multi_array as $row_array) {
                if (is_array($row_array)) {
//把要排序的字段放入一个数组中，
                    $key_array[] = $row_array[$sort_key];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
//对多个数组或多维数组进行排序
        array_multisort($key_array, $sort, $multi_array);
        return $multi_array;
    }


    /**
     * 获取具体的分类名称
     *
     * @param array $classIDS 栏目id
     * @return array|string
     */
    public function getClassName($classIDS, $order = ''){
        if(is_array($classIDS)){
            $className = array();
            $category = $this->dealClass();
            foreach($classIDS as $cid){
                $order ?  $className[] =  $category[$cid] : $className[$order] =  $category[$cid];
            }
            return $className;
        }else{
            return 'format error';
        }
    }

    /**
     * 获取分类返回处理好的格式
     *
     * @return array
     */
    public function dealClass(){
        $newCat = array();
        $cat = M('Cat');
        $res = $cat->field('id,name')->where('status=1')->select();
        foreach($res as $key => $val){
            $newCat[$val['id']] = $val['name'];
        }

        return $newCat;
    }

    /**
     * 获取多个分类的名称和类的样式（class）
     * @param $pid
     * @return array
     */
    public function getClassInfo($pid){
        $class_name = array();
        if ($pid) {
            $pid_str = substr($pid, 1, -1);
            $pid_str_array = explode(',', $pid_str);
            if ($pid_str_array) {
                foreach ($pid_str_array as $kkk => $vvv) {
                    //查询栏目信息
                    $class_info = M('Cat')->where('id=' . $vvv)->find();
                    $class_name[$kkk]['class_name'] = $class_info['name'];
                    $class_name[$kkk]['class_num'] = $class_info['class'];
                    $class_name[$kkk]['id'] = $class_info['id'];
                }
            }
        }
        return $class_name;
    }
}
