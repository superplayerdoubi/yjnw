<?php
if (!function_exists('plug_eva_temp')) {
   function plug_eva_temp($name,$nr){
		$return=plug_eva('btzero_YJN',$name);
		if($return==""){plug_eva('btzero_YJN',$name,$nr);$return=plug_eva('btzero_YJN',$name);}
		return $return;
	}
}
$tsz['是否启用CDN加速']=plug_eva_temp("是否启用CDN加速",'否');	
$tsz['登录框大小']=plug_eva_temp("登录框大小",'800');
$tsz['首页介绍']=plug_eva_temp("首页介绍",'一个虚拟主机,圆你一个网站梦立即订购吧~');				
$tsz['版权修改']=plug_eva_temp("版权修改",'写上如你的QQ什么的啊~');
$tsz['网站底部版权']=plug_eva_temp("网站底部版权",'by:YJN');
$tsz['分销主机']=plug_eva_temp("分销主机",'<p>经销商托管计划为您提供所有需要的虚拟主机和支持。廉价易上手！.</p>');
$tsz['服务器租用']=plug_eva_temp("服务器租用",'<p>服务器环境总量控制专为开发者设计！.并采用安全的SSH连接.</p>');	
$tsz['云服务器']=plug_eva_temp("云服务器",'<p>你可以在我们的云计算基础设施购买计算能力的最小单位。云服务器是虚拟机运行Linux或Windows操作系统。</p>');	
$tsz['产品订购修改']=plug_eva_temp("产品订购修改",'green');	
$tsz['客服1QQ']=plug_eva_temp("客服1QQ",'1234');
$tsz['客服2QQ']=plug_eva_temp("客服2QQ",'1234');
$tsz['客服3QQ']=plug_eva_temp("客服3QQ",'1234');
$tsz['客服4QQ']=plug_eva_temp("客服4QQ",'1234');
$tsz['首页购买修改']=plug_eva_temp("首页购买修改",'
<div class="container-fluid app-content-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center app-content-header">购买</h2>
                    <p class="text-center app-content-description">定义你的套餐~</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row no-margin no-gap">
                        <div class="col-md-3 col-sm-6">
                            <div class="pricing-table dark-blue">
                                <div class="pt-header">
                                    <div class="plan-pricing">
                                        <div class="pricing">自定义</div>
                                        <div class="pricing-type">轻</div>
                                    </div>
                                </div>
                                <div class="pt-body">
                                    <h4>自定义的套餐</h4>
                                    <ul class="plan-detail">
                                        <li>1 网页空间</li>
                                        <li>10 GB 流量</li>
                                        <li>更多操作</li>
                                    </ul>
                                </div>
                                <div class="pt-footer">
                                    <a href="/index.php/buy/index/" class="btn btn-primary">订购</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="pricing-table green">
                                <div class="pt-header">
                                    <div class="plan-pricing">
                                        <div class="pricing">自定义</div>
                                        <div class="pricing-type">宜</div>
                                    </div>
                                </div>
                                <div class="pt-body">
                                    <h4>自定义的套餐</h4>
                                    <ul class="plan-detail">
                                        <li>2 网页空间</li>
                                        <li>20 GB 流量</li>
                                        <li>更多操作</li>
                                    </ul>
                                </div>
                                <div class="pt-footer">
                                    <a href="/index.php/buy/index/" class="btn btn-success">订购</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="pricing-table  dark-blue">
                                <div class="pt-header">
                                    <div class="plan-pricing">
                                        <div class="pricing">自定义</div>
                                        <div class="pricing-type">适</div>
                                    </div>
                                </div>
                                <div class="pt-body">
                                    <h4>自定义的套餐</h4>
                                    <ul class="plan-detail">
                                        <li>1 网页空间</li>
                                        <li>30 GB 流量</li>
                                        <li>更多操作</li>
                                    </ul>
                                </div>
                                <div class="pt-footer">
                                    <a href="/index.php/buy/index/" class="btn btn-primary">订购</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="pricing-table dark-blue">
                                <div class="pt-header">
                                    <div class="plan-pricing">
                                        <div class="pricing">自定义</div>
                                        <div class="pricing-type">舒</div>
                                    </div>
                                </div>
                                <div class="pt-body">
                                    <h4>自定义的套餐</h4>
                                    <ul class="plan-detail">
                                        <li>1 网页空间</li>
                                        <li>50 GB 流量</li>
                                        <li>更多操作</li>
                                    </ul>
                                </div>
                                <div class="pt-footer">
                                    <a href="/index.php/buy/index/" class="btn btn-primary">订购</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>');		
    
TEMPLATE::assign('tempsz',$tsz);
$yjing=get_query_val('公告','公告内容','1=1 ORDER BY `公告ID` DESC LIMIT 1');
TEMPLATE::assign('yjngg',$yjing);
$yjingbt=get_query_val('公告','公告标题','1=1 ORDER BY `公告ID` DESC LIMIT 1');
TEMPLATE::assign('yjnggbt',$yjingbt);
$uid=session('uid');
SMACSQL()->select('服务单表', 'count(*)', "(状态='开放' OR 状态='客服回答') AND uid='{$uid}'");
$OpenTickets = SMACSQL()->fetch_assoc();
$OpenTicket=$OpenTickets['count(*)'];
TEMPLATE::assign('OpenTicket',$OpenTicket);
SMACSQL()->select('服务单表', 'count(*)',"uid='{$uid}'");
$SumTickets = SMACSQL()->fetch_assoc();
$SumTicket=$SumTickets['count(*)'];
TEMPLATE::assign('PerTicket',$PerTicket);
SMACSQL()->select('服务', 'count(*)', "(状态='激活' OR 状态='暂停') AND 帐号id='{$uid}'");
$ActiveServices = SMACSQL()->fetch_assoc();
$ActiveService=$ActiveServices['count(*)'];
TEMPLATE::assign('ActiveService',$ActiveService);
SMACSQL()->select('服务', 'count(*)', "帐号id='{$uid}'");
$SumServices = SMACSQL()->fetch_assoc();
$SumService=$SumServices['count(*)'];
TEMPLATE::assign('SumService',$SumService);
TEMPLATE::assign('PerService',$PerService);
SMACSQL()->select('服务', 'count(DATEDIFF(到期时间,开通时间))', "帐号id='{$uid}' AND DATEDIFF(到期时间,开通时间)<15");
$Dates = SMACSQL()->fetch_assoc();
$Date=$Dates['count(DATEDIFF(到期时间,开通时间))'];
TEMPLATE::assign('Date',$Date);
$s=TEMPLATE::assign('s');
$email = $s['登陆邮箱'];
$grav_sm = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 25;
$grav_md = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 40;
$grav_50 = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 50;
$grav_lg = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 138;
TEMPLATE::assign('grav_sm',$grav_sm);
TEMPLATE::assign('grav_md',$grav_md);
TEMPLATE::assign('grav_lg',$grav_lg);
TEMPLATE::assign('grav_50',$grav_50);