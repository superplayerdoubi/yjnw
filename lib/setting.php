<?php
if (!function_exists('templateasz')) {
   function templateasz($name,$nr){
		if($nr==""){$nr=" ";}
		$nr=str_replace('\"','"',$nr);
		$nr=str_replace("\\\\","\\",$nr);
		plug_eva('btzero_YJN',$name,$nr);

	}
}
if (!function_exists('templateadu')) {
   function templateadu($name){
		$return=plug_eva('btzero_YJN',$name);
		return $return;
	}
}




function btzero_YJN(){

	echo '<div id="main-wrapper" class="container"><div class="row"><div class="col-md-12"><div class="panel panel-primary"><div class="panel-body"><form class="form-horizontal form-groups-bordered" method="post"><input type="hidden" name="ok" value="ok">';
	$reset=_GET('reset');
	$ok=_POST('ok');
	if($reset!="" && $ok!="ok"){
		//print_r($reset);
		plug_eva('btzero_YJN',$reset,null);
		$file2=SWAP_TEMPLATES_ROOT.'/lib/main.php';
		if(file_exists($file2)!=false){require($file2);}
	}
	$file=SWAP_TEMPLATES_ROOT.'/lib/setting_config.php';
	
	if(file_exists($file)==false){echo '配置文件不存在';}
	
	require($file);
	if($ok=="ok"){
		foreach( $template_config as $hehehi1 => $hehe){
			templateasz($hehe['name'],_POST($hehe['name']));
		}
		echo '<script type="text/javascript">
		alert("模板设置修改成功");
		</script>';
	}			
	foreach( $template_config as $hehehi1 => $hehe){
		$hehe['value']=templateadu($hehe['name']);
		if($hehe['type']=='text'){
			$nrhtml=<<<sj
			 <input type="{$hehe['type']}" value="{$hehe['value']}" name="{$hehe['name']}" class="form-control">
sj;
		}elseif($hehe['type']=='yesno' ){
			if($hehe['value']=='yes')
			$hehe['yes_yesno']='checked="checked"'; 
			else
			$hehe['no_yesno']='checked="checked"';
			$nrhtml=<<<sj
			<input type="radio" name="{$hehe['name']}" value="yes"{$hehe['yes_yesno']}/ class="form-control">是 
		<input type="radio" name="{$hehe['name']}" value="no" {$hehe['no_yesno']} class="form-control"/>否 
sj;
		}elseif( $hehe['type']=='texts' ){
			$nrhtml=<<<sj
			<textarea name="{$hehe['name']}"  style="height:120px;"  class="form-control">{$hehe['value']}</textarea>
			<a href="?reset={$hehe['name']}">点此恢复默认内容</a> 
sj;
		}elseif($hehe['type']=='txt'){
			$nrhtml="";
		}elseif( $hehe['type']=='a'){
			$nrhtml=<<<sj
			
sj;
		}else{
			$nrhtml=<<<sj
			{$hehe['type']}-{$hehe['value']}
sj;
		}

		$aaddeehtml=<<<sj
		<div class="form-group">
						<label class="col-sm-3 control-label">{$hehe['name']}</label>
						<div class="col-sm-5">
						{$nrhtml}{$hehe['description']}
						</div>
					</div>
sj;

	echo($aaddeehtml);
	}


	
	echo '<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<input type="submit" value="保存更改" class="btn btn-info"/>
						</div>
					</div></form></div></div></div></div></div>';
	
}
add_swap_plug('模版设置','btzero_YJN');


?>

					